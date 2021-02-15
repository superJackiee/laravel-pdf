<?php
  require_once "../database/db_config.php";
  require_once '../database/community.Class.php';
  error_reporting(false);
  header("content-type:application/json");
  $json = file_get_contents('php://input');
  $data = json_decode($json);
  $json_array  = array();
  $community = new Community();
  if ($data->action == "delete_community") {
    if($community->deleteCommunity($data->community_id)) {
      unlink("../media/community/".$data->image);
      $json_array = array("msg"=>"Community has been deleted successfully.", "action"=>true);
    } else {
      $json_array = array("msg"=>"Wrong Community.", "action"=>false);
    }
  } else if ($data->action == "block_action") {
      $block = $data->block;
      $map_id = $data->map_id;
      $user_id = $data->user_id;
      $blockedText = "";
      if ($block == 0) {
          $block = 1;
          $blockedText = "blocked";
      } else {
          $block = 0;
          $blockedText = "unblocked";
      }

      if ($community->blockUser($block, $user_id)) {
        $user = $data->user;
        $community = $data->community;
        $json_array = array("msg"=>$user." has been ".$blockedText, "action"=>true);
      } else {
        $json_array = array("msg"=>"Something went wrong.", "action"=>false);
      }
  } 
  echo json_encode($json_array);
?>