<?php
   require 'includes/app_config.php'; 
   session_destroy();
   header("location:index.php");
?>