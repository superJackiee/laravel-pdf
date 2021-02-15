<?php
  require_once "../database/db_config.php";
  require_once '../database/inventory.Class.php';
  error_reporting(false);
  header("content-type:application/json");
  $json = file_get_contents('php://input');
  $data = json_decode($json);
  $json_array  = array();
  $inventory = new Inventory();
  if ($data->action == "delete_inventory") {
    if($inventory->deleteInventory($data->inventory_id)) {
      $json_array = array("msg"=>"Inventory has been deleted successfully.", "action"=>true);
    } else {
      $json_array = array("msg"=>"Wrong user.", "action"=>false);
    }
  } else if ($data->action == "delete_user_inventory") {
    if($inventory->deleteUserFromInventory($data->user,$data->inventory,$data->map_id,$data->room_id)) {
      $name = $data->name;
      $json_array = array("msg"=>$name." has been removed from Inventory successfully.", "action"=>true);
    } else {
      $json_array = array("msg"=>"Wrong Data.", "action"=>false);
    }
  } else if ($data->action == "get_free_inventory_rooms") {
      $arrRooms = $inventory->getInventoryFreeRoomList($data->inventory_id);
      $json_array = array("rooms"=>$arrRooms, "action"=>true);
  } else if ($data->action == "add_rent_end_date") {
      
      $start_date = $inventory->getRentStartDate($data->map_id);

      if (strtotime($data->rent_enddate) <= strtotime($start_date)) {
         die(json_encode(array("msg"=>"Checkout End Date can not be less than Check In Date.", "action"=>false)));
      } else {
        
        if ($inventory->insertCheckoutDate($data->map_id, date("Y-m-d", strtotime($data->rent_enddate)), $data->reason)) {
          $json_array = array("msg"=>"Rent end date has been added successfully.", "action"=>true);
        } else {
          $json_array = array("msg"=>"Something went wrong.", "action"=>false);
        }
      }

      
  }
  echo json_encode($json_array);
?>