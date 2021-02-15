<?php
      function getError($error) {
            return implode("<br />", $error);
      }

      function isValid($email) {
            if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email)) { 
                  return false;
            } else {
                return true;
            }
      }

      function isValidToken($token) {
            global $token;
            $user = new User();
            if ($token == NULL || $token == "") {
              http_response_code(401);
              die(json_encode(array("data"=>$null, "status"=>false, "msg"=>"Token is missing.")));
            } else if($user->isValidToken($token) == false) {
              http_response_code(401);    
              die(json_encode(array("data"=>$null, "status"=>false, "msg"=>"Invalid Token.")));
            }
          }

      function isBlockUser()
      {
      $user = new User();
      if ($user->isUserBlock()) {
            die(json_encode(array("data"=>null, "status"=>false, "msg"=>"You are block.")));
      }
      }

      function isSuperAdmin()
      {
        return $_SESSION['user'][0]['is_master'];
      }

      function getOrderNotes($dicInfo)
      {
            return "Hi, <b>".$dicInfo["first_name"]." ".$dicInfo["last_name"]."</b><br /> Your rent of <b>".date("M Y")."</b> of your Room <b>".$dicInfo['room_name']. "</b> in apartment <b>".$dicInfo['name']."</b>";
      }
?>