<?php 
      require 'includes/app_config.php';
      require 'includes/session.php';
      $user = new User();
      $user->changePasswordEmail($_GET['user_id']);
      $_SESSION["error"] = array("Password has been changed successfully.");
      header("location:user-list.php");
      die();
?>      