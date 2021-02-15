<?php
  require_once "../database/db_config.php";
  require_once '../database/admin.Class.php';
  header("content-type:application/json");
  $json = file_get_contents('php://input');
  $data = json_decode($json);
  $json_array  = array();
  if ($data->action == "delete_user") {
    $user = new AdminManagement();
    if($user->deleteSupervisor($data->id)) {
      $json_array = array("msg"=>"User has been deleted successfully.", "action"=>true);
    } else {
      $json_array = array("msg"=>"Wrong user.", "action"=>false);
    }
  }
  echo json_encode($json_array);
?>