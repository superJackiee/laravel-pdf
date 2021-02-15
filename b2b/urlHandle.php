<?php
   require_once "includes/app_config.php";

   $token = getallheaders()["Token"];

   if($_SERVER["REQUEST_METHOD"] == "GET") {

      header('HTTP/1.1 401 Unauthorized', true, 401);
      die();
   }
   header("Access-Control-Allow-Origin: *");
   header("Content-Type: application/json; charset=UTF-8");

   $json = file_get_contents('php://input', 'r');
   $urlData = explode("/",str_replace("/b2b/","",$_SERVER['REQUEST_URI']));
   $endPoint = strtolower($urlData[0]);
   $data = json_decode($json);
   $json_array = array();
    
   if ($endPoint == "signin") {
      $user = new User();
      $result = $user->doUserLogin($data->mobile);
      $json_array = array("data"=>$result, "status"=>true, "msg"=>"Please enter OTP which you received on your device");
   } else if ($endPoint == "verifyotp") {
      $user = new User();
      $row = $user->verifyOTP($data->otp, $data->mobile);
      if($row) {
        $json_array = array("data"=>$row, "status"=>true, "msg"=>"Login successfully");
      } else {
        $json_array = array("data"=>null, "status"=>false, "msg"=>"OTP was wrong");
      }
   } else if ($endPoint == "signup") {
      $user = new User();
      $result = $user->addUser(array($data->first_name, $data->last_name, $data->email, $data->password, 1));
      $json_array = array("data"=>$result[0] , "status"=>$result[1], "msg"=>$result[2]);
   } else if ($endPoint == "categories") {
      $objCategory = new Category();
      $result = $objCategory->getActiveParentCategories();
      if (count($result)) {
         $json_array = array("data"=>$result , "status"=>true, "msg"=>"Categories listed succssfully");
      } else {
         $json_array = array("data"=>null , "status"=>false, "msg"=>"No Categories found");
      }
   } else if ($endPoint == "updateprofile") {

      $objUser = new User();
      if ($objUser->validateJWTToken($token)) {
         $result = $objUser->updateProfile($data);
         if ($result[1]) {
            $json_array = array("data"=>array("user" => $result[0]) , "status"=>true, "msg"=>"Profile updated succssfully");
         } else {
            $json_array = array("data"=>$result[0] , "status"=>false, "msg"=>"Profile not updated");
         }
      } else {
         header('HTTP/1.1 401 Unauthorized', true, 401);
      }
   } else if ($endPoint == "products") {

      $objProd = new Product();
      if (isset($urlData[1])) {
         $result = $objProd->getActiveProducts($urlData[1]);
      } else {
         $result = $objProd->getActiveProducts();
      }
       
      if (count($result)) {
         $json_array = array("data"=>$result , "status"=>true, "msg"=>"Product listed succssfully");
      } else {
         $json_array = array("data"=>null , "status"=>false, "msg"=>"No Products found");
      }
   } else if ($endPoint == "search") {

      $objProd = new Product();
      $searchString = isset($urlData[1]) ? $urlData[1]: "";

      $result = $objProd->searchProducts($searchString);
       
      if (count($result)) {
         $json_array = array("data"=>$result , "status"=>true, "msg"=>"Product searched succssfully");
      } else {
         $json_array = array("data"=>null , "status"=>false, "msg"=>"No Products found");
      }
   }  else if ($endPoint == "refreshtoken") {

      $objUser = new User();
      $user_info = $objUser->refreshToken();
      if (count($user_info) > 0) {
         $json_array = array("data"=>$user_info , "status"=>true, "msg"=>"Token refreshed successfully");
      } else {
         $json_array = array("data"=>null , "status"=>false, "msg"=>"Token did not refresh");
      }
   } else if ($endPoint == "saveaddress") {
      if (empty($data->address)) {
         $json_array = array("data"=>null , "status"=>false, "msg"=>"Address is required");
      } else if (empty($data->state_id) || (int)($data->state_id) == 0) {
         $json_array = array("data"=>null , "status"=>false, "msg"=>"State Id is required");
      } else if (empty($data->city_id) || (int)($data->city_id) == 0) {
         $json_array = array("data"=>null , "status"=>false, "msg"=>"City Id is required");
      } else if (empty($data->pincode) || (int)($data->pincode) == 0) {
         $json_array = array("data"=>null , "status"=>false, "msg"=>"Pincode required");
      } else {
         $objAddress = new Address();
         if ($objAddress->saveAddress($data)) {
            $json_array = array("data"=>null , "status"=>true, "msg"=>"Address saved successfully");
         } else {
            $json_array = array("data"=>null , "status"=>false, "msg"=>"Address not saved");
         }
      }
   } else if ($endPoint == "getaddress") {
      
      $objAddress = new Address();
      $address = $objAddress->getUserAddress();
      $json_array = array("data"=>$address , "status"=>true, "msg"=>"All Address successfully");

   } else if ($endPoint == "updatedefaultaddress") {
      
      $objAddress = new Address();
      if (empty($data->address_id) || (int)($data->address_id) == 0) {
         $json_array = array("data"=>null , "status"=>false, "msg"=>"Address Id is required");
      } else {
         $action = $objAddress->updateDefaultAddress($data->address_id);
         if ($action) {
            $json_array = array("data"=>null , "status"=>true, "msg"=>"Default Address saved successfully");
         } else {
            $json_array = array("data"=>null , "status"=>false, "msg"=>"Default Address not saved successfully");
         }
      }

   } else if ($endPoint == "getstates") {

      $objAddress = new Address();
      $states = $objAddress->getStates();
      $json_array = array("data"=>$states , "status"=>true, "msg"=>"States found.");

   } else if ($endPoint == "getcities") {

      if ($data->state_id > 0) {
         $objAddress = new Address();
         $cities = $objAddress->getCitiesByState($data->state_id);
         $json_array = array("data"=>$cities , "status"=>true, "msg"=>"cities found successfully");

      } else {
         $json_array = array("data"=>null , "status"=>false, "msg"=>"State Id is required");
      }

   } else if ($endPoint == "getproductinstock") {

      if (empty($data->products) || !is_array($data->products)) {
         $json_array = array("data"=>null , "status"=>false, "msg"=>"Product Ids is required");
      } else {

         $objStock = new Stock();
         $stocks = $objStock->getProductStockInformation($data->products);
         $json_array = array("data"=>$stocks , "status"=>true, "msg"=>"Stock Information");
      }
   } else if ($endPoint == "orderdata") {

      $objOrder = new Orders();
      $objUser = new User();
      $user_id = $objUser->getUserIdByToken($token);
      $where_condition = " AND o.user_id = '".$user_id."'";
      $orders = $objOrder->getAllOrders();
      $json_array = array("data"=>$orders , "status"=>true, "msg"=>"Order Information");
   } else {
      header('HTTP/1.1 401 Unauthorized', true, 401);
   }

   echo json_encode($json_array);
?>