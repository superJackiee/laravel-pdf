<?php
  require_once "../database/db_config.php";
  require_once '../database/order.Class.php';
  require_once '../database/pushNotification.Class.php';
  require_once '../database/cms.Class.php';
  require_once '../database/user.Class.php';
  header("content-type:application/json");
  $json = file_get_contents('php://input');
  $data = json_decode($json);
  $json_array  = array();
  if ($data->action == "pay_order") {
    $order = new Orders();
    if($order->updateOrder($data->order_id, $data->status)) {
      
      $json_array = array("msg"=>"Order has been updated successfully.", "action"=>true);
      if ($data->status == 0) {
        $info = $order->getUserofOrder($data->order_id);
        if ($info["parent"] == "Rentel Fee" || $info["parent"] == "Rental Fee") {

          $objPN = new PushNotification();
          $objPN->sendUnpaidtoPaidNotification($info["device_token"], $info["device_type"], $info["NAME"]);
        }
      }
    } else {
      $json_array = array("msg"=>"Wrong order.", "action"=>false);
    }
  } else if ($data->action == "order_completed") {
    $order = new Orders();
    if($order->completeOrder($data->order_id, $data->complete)) {
      
      if ($data->complete == "Yes") {
          $info = $order->getUserofOrder($data->order_id);
          if (in_array(strtolower($info["parent"]), array("repair & services", "housekeeping"))) {

            $objPN = new PushNotification();
            $objPN->sendCompleteOrderNotification($info["device_token"], $info["device_type"], $info["NAME"]);
          }
          
      }
      $json_array = array("msg"=>"Order has been updated successfully.", "action"=>true);
    } else {
      $json_array = array("msg"=>"Wrong order.", "action"=>false);
    }
  } else if ($data->action == "get_categories") {
    error_reporting(E_ALL);
    $order = new Orders();
    $user = new User();
    $categories = $order->getOrderSubcategories($data->parent);
    $types = $order->getOrderType($data->parent);
    $categories_options = "<select name='category'>";
    $types_options = "<select name='order_type'>";;
    foreach ($categories as $category) {
      $categories_options .= "<option value='".$category."'>".$category."</option>";
    }
    $categories_options .= "</select>";
    foreach ($types as $type) {
      $types_options .= "<option value='".$type."'>".$type."</option>";
    }
    $types_options .= "</select>";
    $inventory_options = "";
    if ($data->parent == "Rental Fee") {
      $arrInventory = $user->getUserandInventoryInformationByUserId($data->user_id, true);
      $inventory_options = "<select name='inventory_id' id='inventory_id'><option value='0'>Select Inventory</option>";
      foreach ($arrInventory as $inventory) {
        $inventory_options .= "<option value='".$inventory["inventory_id"]."'>".$inventory["name"]."</option>";
      }
      $inventory_options .= "</select>"; 
      $json_array = array("inventory"=>$inventory_options, "action"=>true);
    } else {
      $json_array = array("categories"=>$categories_options, "types"=>$types_options , "action"=>true);
    }

    
  }  else if ($data->action == "get_inventory_room") {
    $user = new User();
    $arrInventory = $user->getUserandInventoryInformationByUserId($data->user_id, false, $data->inventory_id);
    $inventory_options = "<select name='inventory_room_id' id='inventory_room_id'><option value='0'>Select Inventory Room</option>";
    foreach ($arrInventory as $inventory) {
      $inventory_options .= "<option value='".$inventory["inventory_room_id"]."'>".$inventory["room_name"]."</option>";
    }
    $inventory_options .= "</select>"; 
    $json_array = array("inventory_rooms"=>$inventory_options, "action"=>true);
  }
  echo json_encode($json_array);
?>