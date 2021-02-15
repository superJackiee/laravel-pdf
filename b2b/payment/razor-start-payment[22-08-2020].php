<?php
   require '../includes/app_config.php';
   require_once "razorpay-php/Razorpay.php";
   use Razorpay\Api\Api;
   
   $data = json_decode($_POST["data"]);
   if (isset($data->data->token)) {

      $user = new User();
      if ($user->validateJWTToken($data->data->token)) {

         $cart = $data->data->cart;
         $objOrder = new Orders();
         $order_id = $objOrder->saveOrder($cart, $data->data->token);
         
         startPayment($cart, $data->data->token, $order_id);
      } else {
         header('HTTP/1.1 401 Unauthorized', true, 401);
      }
   } else {
       
      header('HTTP/1.1 401 Unauthorized', true, 401);
   }

function startPayment($cart, $token, $order_id) {

   
   $user = new User();
   $userInfo = $user->getUserByToken($token);
   $api = new Api(RAZOR_KEY_ID, RAZOR_SECRET_ID);
   $CUSTOMER_NAME = stripslashes($userInfo["first_name"])." ".stripslashes($userInfo["last_name"]);
   $CUSTOMER_EMAIL = $userInfo["email"];
   $CUSTOMER_MOBILE = $userInfo["mobile"];
   $grand_total = (($cart->total - $cart->discount) + $cart->tax) * 100;
   $order = $api->order->create(array(
   'receipt' => rand(1000, 9999). 'ORD',
   'amount' => $grand_total,
   'payment_capture' => 1,
   'currency' => 'INR',
   ));

   echo '
      <meta name="viewport" content="width=device-width">
         <form action="razor-payment-success.php" method="post">
            <script
               src="https://checkout.razorpay.com/v1/checkout.js"
               data-key="'.RAZOR_KEY_ID.'"
               data-amount="'.$grand_total.'"
               data-currency="INR"
               data-order-id="'.$order->id.'"
               data-buttontext="Pay with Razor Pay"
               data-name="B2B"
               data-description="Testing"
               data-image=""
               data-prefill.name="'.$CUSTOMER_NAME.'"
               data-prefill.email="'.$CUSTOMER_EMAIL.'"
               data-prefill.contact="'.$CUSTOMER_MOBILE.'"
               data-theme.name="#cecece"
            ></script>
            <input type="hidden" custom="Hidden element" value="'.$order_id.'" name="order_id" />
            <input type="hidden" custom="Hidden element" value="'.$token.'" name="token" />
         </form>';
}
?>