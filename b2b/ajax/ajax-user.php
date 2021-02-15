<?php
  require_once "../database/db_config.php";
  require_once '../database/user.Class.php';
  header("content-type:application/json");
  $json = file_get_contents('php://input');
  $data = json_decode($json);
  $json_array  = array();
  $user = new User();
  if ($data->action == "delete_user") {
    if($user->delete($data->user_id)) {
      $json_array = array("msg"=>"User has been deleted successfully.", "action"=>true);
    } else {
      $json_array = array("msg"=>"Wrong user.", "action"=>false);
    }
  } else if ($data->action == "change_password") {
    if ($user->changePasswordEmail($data->user_id)) {
      $json_array = array("msg"=>"Password has been changed successfully.", "action"=>true);
    } else {
      $json_array = array("msg"=>"Something went wrong.", "action"=>false);
    }
  }
  echo json_encode($json_array);
?>