<?php
      $page_array = explode('/', $_SERVER['SCRIPT_NAME']);
      $page = $page_array[count($page_array)-1];
      
      if (!isset($_SESSION["user"])) {

            header("location:index.php");
            die();
      }

      if ($page != "dashboard.php" && $page != 'user-order.php') {

         //header("location:dashboard.php");
         //die();
      }
?>