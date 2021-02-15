<?php
   require '../includes/app_config.php';
   $objOrder = new Orders();
    
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php include 'includes/head.php'; ?>     
      <title>Dashborad</title>
   </head>
   <body>
   <table>
      <form action="razor-start-payment.php" method="post">
         <textarea style="width: 500px; height: 500px;" name="data">{\r\n  \"data\": {\r\n    \"cart\": {\r\n      \"total\": 200,\r\n      \"discount\": 50,\r\n      \"tax\": 20,\r\n      \"grand_total\": 170,\r\n      \"user_id\": 5,\r\n      \"item\": [\r\n        {\r\n          \"product_id\": 1,\r\n          \"price\": 50,\r\n          \"tax\": 5,\r\n          \"discount\": 1,\r\n          \"total\": 54,\r\n          \"grand_total\": 10,\r\n          \"quantity\": 1\r\n        },\r\n        {\r\n          \"product_id\": 2,\r\n          \"price\": 50,\r\n          \"tax\": 5,\r\n          \"discount\": 1,\r\n          \"total\": 54,\r\n          \"grand_total\": 10,\r\n          \"quantity\": 11\r\n        }\r\n      ]\r\n    }\r\n  },\r\n  \"token\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE1OTYzNjY4MTgsImlzcyI6IlRyYWRlIEFQUCIsImV4cCI6MTYyNzkwMjgxOCwidXNlcklkIjoiMiJ9.6CcBkVhEPHTswzX9G4H00cbsqEC0CKevaeLRj-AJFs8\"\r\n}</textarea>
         <input type = "submit" value = "Pay Now" />
   </form>
   </table>
   
</body>
</html>