<?php

	class User {

		public function doAdminLogin($email, $password)
		{
			global $DB;
			$row = $DB->query("SELECT * FROM users WHERE email=? and password=? AND type_id = 3",array($email,md5($password)));
			if ($row) {
				return $row;
			} else {
				return null;
			}
		}

		public function delete($user_id) {
			global $DB;
			if ($DB->query("UPDATE user SET `deleted` = 1, `status` = 0, `update_date` = NOW() WHERE user_id = ?", array($user_id))) {
				return true;
			} else {
				return false;
			}
		}

		public function doUserLogin($mobile) {

			global $DB, $webPath;
			$row = $DB->query("SELECT `id`, `first_name`, `last_name`, `mobile`, `email`, `status`, `deleted` FROM `users` 
							   WHERE `mobile` = ?", array($mobile));
			
			if (count($row) > 0) {
				$this->sendAndUpdateOTP($mobile);
				return array("sign_up" => false);
			} else {
				if (count($row) > 0) {
					if ($row[0]["status"] == 0) {
						$DB->query("UPDATE users SET `deleted` = 0, updated_at = NOW()	WHERE mobile = ?", array($mobile));
					} else if ($row[0]["deleted"] == 1) {
						$DB->query("UPDATE users SET `deleted` = 0, `status` = 0, updated_at = NOW() WHERE mobile = ?", array($mobile));
					}
				} else {
					$DB->query("INSERT INTO `users` (`first_name`, `last_name`, `type_id`, `email`, `mobile`, `otp`, `status`) VALUES ('', '', '1', NULL, ?, '', 0)", array($mobile));
				}
				$this->sendAndUpdateOTP($mobile);
				return array("sign_up" => true);
			}				   
		}

		private function sendAndUpdateOTP($mobile)
		{
			global $DB;
			$DB->query("UPDATE users SET otp = md5('1234') WHERE mobile = ?", array($mobile));
		}


		public function verifyOTP($otp, $mobile)
		{
			global $DB;
			$DB->query("UPDATE users SET `deleted` = 0, `status` = 1, updated_at = NOW() WHERE mobile = ?", array($mobile));
			$row = $DB->query("SELECT `id`, `first_name`, `last_name`, `mobile`, `email` FROM `users` 
							   WHERE `mobile` = ? AND `otp` = md5(?) AND `status` = 1 AND `deleted` = 0", array($mobile, $otp));

			if (count($row)) {
				return array("user" => $row[0], "token" => $this->generateJWT($row[0]["id"]));
			} else {
				return null;
			}				   
		}

		private function generateJWT($user_id)
		{
			global $DB;
			$payload = [
				'iat' => time(),
				'iss' => ISSUER,
				'exp' => time()+365*24*60*60,
				'userId' => $user_id
			];
			return JWT::encode($payload, SECRET_KEY);
		}

		public function validateJWTToken($app_token)
		{
			try {
				$jwt = JWT::decode($app_token, SECRET_KEY, ['HS256']);
				$user_id = $jwt->userId;
				if ($user_id > 0) {
					return true;
				} else {
					return false;
				}
			} catch (\Throwable $th) {

				return false;
			}
		}

		public function getUserIdByToken($app_token)
		{
			try {
				$jwt = JWT::decode($app_token, SECRET_KEY, ['HS256']);
				$user_id = $jwt->userId;
				if ($user_id > 0) {
					return $user_id;
				} else {
					return null;
				}
			} catch (\Throwable $th) {
				return null;
			}
		}

		public function updateProfile($data) {

			global $DB, $token;
			if (trim($data->first_name) == "") {
				$error[] = "First name is required.";
			}

			if (trim($data->last_name) == "") {
				$error[] = "Last name is required.";
			}

			$is_img_uploaded = false;
			if ($data->profile_pic != "") {

				$img = str_replace('data:image/png;base64,', '', $data->profile_pic);
				$img = str_replace(' ', '+', $img);
				$data = base64_decode($img);
				$img_name = $this->getUserIdByToken($token) . '.png';
				$file = DIR_USER_PATH . $img_name;
				if (file_put_contents($file, $data)) {
					$is_img_uploaded = true;
				}
			}

			if (count($error) > 0) {
				return array($error, false, "Error found");
			} else {
				if ($is_img_uploaded) {
					$result = $DB->query("UPDATE `users` SET `profile_pic` = ?, first_name = ?, last_name = ?, updated_at = NOW() 
						WHERE `id` = ?", array($img_name, addslashes($userInfo["first_name"]), addslashes($userInfo["last_name"]), $this->getUserIdByToken($token)));
				} else {
					$result = $DB->query("UPDATE `users` SET first_name = ?, last_name = ?, updated_at = NOW() 
						WHERE `id` = ?", array(addslashes($userInfo["first_name"]), addslashes($userInfo["last_name"]), $this->getUserIdByToken($token)));
				}
				return array($this->getUserByToken(), true);		
			}
		}

		public function getUserByToken($app_token)
		{
				
			global $DB;
			
			$row = $DB->query("SELECT `id`, `first_name`, `last_name`, `mobile`, `email`, CONCAT('".WS_USER_PATH."', `profile_pic`) AS profile_pic FROM `users` 
							   WHERE `id` = ?", array($this->getUserIdByToken($app_token)));
			if (count($row)) {
				return $row[0];
			} else {
				return null;
			}				   
		}

		public function getUserById($id)
		{
			global $DB, $token;

			$row = $DB->query("SELECT `id`, `first_name`, `last_name`, `mobile`, `email`, CONCAT('".WS_USER_PATH."', `profile_pic`) AS profile_pic FROM `users` 
							   WHERE `id` = ?", array($id));

			if (count($row)) {
				return $row[0];
			} else {
				return null;
			}				   
		}

		public function refreshToken()
		{
			global $DB, $token;
			
			try {
				$jwt = JWT::decode($token, SECRET_KEY, ['HS256']);
				$user_id = $jwt->userId;
				if ($user_id > 0) {
					return array("user" => $this->getUserById($user_id), "token" => $this->generateJWT($user_id)) ;
				} else {
					return null;
				}
			} catch (\Throwable $th) {

				return null;
			}
		}

		public function updatePassword($current_password, $new_password, $token) {
			global $DB;

			$row = $DB->query("SELECT `password`, email, user_id FROM user WHERE user_token = ?", array($token))[0];

			if (md5($current_password) != $row["password"]) {
				return array("result"=> false, "msg"=> "Current Password is wrong");
			} else {
				$user_token = md5($row["email"]."-".$new_password);
				$result = $DB->query("UPDATE user SET password = ?, user_token = ?,  update_date = NOW() 
						WHERE user_id = ?", array(md5($new_password), $user_token, $row["user_id"]));
				if ($result) {
					return array("result"=> true, "msg"=> "Password has been changed successfully", "token"=> $user_token);
				} else {
					return array("result"=> false, "msg"=> "Password has been changed successfully");
				}	
			}
		}
	}

	function uploadBase64Image($encoded_string) {

		global $token;

		$img = str_replace('data:image/png;base64,', '', $encoded_string);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = DIR_USER_PATH . $this->getUserIdByToken($token) . '.png';
		return file_put_contents($file, $data);
	}
?>
