<?php
  require_once "../database/db_config.php";
  require_once '../database/event.Class.php';
  header("content-type:application/json");
  $json = file_get_contents('php://input');
  $data = json_decode($json);
  $json_array  = array();
  if ($data->action == "delete_event") {
    $event = new Event();
    if($event->delete($data->event_id)) {
      if (file_exists("../media/event/".$data->image) && $data->image != "") {
        unlink("../media/event/".$data->image);
      }
      $json_array = array("msg"=>"Event has been deleted successfully.", "action"=>true);
    } else {
      $json_array = array("msg"=>"Wrong Event.", "action"=>false);
    }
  }
  echo json_encode($json_array);
?>