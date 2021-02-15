<?php
  require_once "../includes/app_config.php";
  header("content-type:application/json");
  error_reporting(E_ALL);
  $json = file_get_contents('php://input');
  $data = json_decode($json);

  $json_array  = array();
  $objStock = new Stock();
  if ($data->action == "update_stock") {
    if($objStock->updateStock($data->product_id, $data->user_id, $data->quantity)) {
      $json_array = array("msg"=>"Quantity has been updated successfully.", "action"=>true);
    } else {
      $json_array = array("msg"=>"Not Updated.", "action"=>false);
    }
  }  
  echo json_encode($json_array);
?>