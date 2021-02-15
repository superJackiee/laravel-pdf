<?php

	class Address extends User {

		  public function getStates()
		  {
			  global $DB;
			  return $DB->query("SELECT id, name FROM states WHERE 1");
		  }

		  public function getCitiesByState($state_id)
		  {
			  global $DB;
			  return $DB->query("SELECT id, city FROM cities WHERE state_id = ?", array($state_id));
		  }

		  public function saveAddress($data)
		  {
			  global $DB, $token;
			  $user_id = $this->getUserIdByToken($token);
			  return $DB->query("INSERT INTO `user_addresses` (`user_id`, `address`, `city_id`, `state_id`, `pincode`) 
			  			  		 VALUES (?,?,?,?,?)", array($user_id, addslashes($data->address), $data->city_id, $data->state_id, $data->pincode));
		  }

		  public function getUserAddress()
		  {
			  global $DB, $token;
			  return $DB->query("SELECT ua.id, ua.`address`, c.city , s.name AS state, ua.pincode, is_default
						  		 FROM user_addresses ua
						  		 INNER JOIN states s ON s.id = ua.state_id
						  		 INNER JOIN cities c ON c.id = ua.city_id
						  		 WHERE ua.user_id = ? AND ua.status = 1 AND ua.deleted = 0", array($this->getUserIdByToken($token)));
		  }

		  public function updateDefaultAddress($address_id)
		  {
			 global $DB, $token;
			 $DB->query("UPDATE user_addresses SET is_default = 0 WHERE user_id = ?", array($this->getUserIdByToken($token)));
			 return $DB->query("UPDATE user_addresses SET is_default = 1 WHERE id = ? AND user_id = ?", array($address_id, $this->getUserIdByToken($token)));
		  }
	}
?>