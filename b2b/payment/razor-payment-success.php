<?php
   require '../includes/app_config.php';

   if (isset($_POST['order_id'])) {

      $user = new User();
      if ($user->validateJWTToken($_POST['token'])) {
         $objOrder = new Orders();
         $objOrder->updateOrder($_POST['order_id'], $_POST['razorpay_payment_id']);
         echo json_encode(array("data" => array("order" => $objOrder->getOrder($_POST['order_id']), "status" => true, "msg" => "Order information")));
      } else {
         header('HTTP/1.1 401 Unauthorized', true, 401);
      }
   } else {
      header('HTTP/1.1 401 Unauthorized', true, 401);
   }  
?>