<?php
  require '../includes/app_config.php';
  require '../includes/session.php';
  

  if ($_GET['action']  == "user_list") {
    $user = new User();
    $inventory = new Inventory();
    $arrUsers = $user->getActiveUsers();
    $arrRooms = $inventory->getInventoryFreeRoomList($_GET['inventory_id']);
    if (count($arrRooms) <= 0) {
       die("No Rooms Available.");
    }
    foreach ($arrRooms as $room) {
    
      $datefield = "common_room_start_date[]";
      $room_type = "common_room[]";
      $user_type = "common_room_user[]";  
      if($room['room_type'] == 'MASTER') {
        $room_type = "master_room[]";
        $user_type = "master_room_user[]";
        $datefield = "master_room_start_date[]";
      }

      $room_id = "room_".$room['inventory_room_id'];
      
    ?>
    
    
<div class="form-group clearfix">
                                 <label for="Role" class="col-sm-3 col-form-label col-form-label-sm size-label">
                                  <?=$room['room_name']?>
                                  
                                 </label>
                                 <div class="col-sm-6">
                                    <select id="select_id_<?=$room['inventory_room_id']?>" data-start="date_<?=$room_id?>" class="selectpicker cust-selct_label renter" data-date="date_<?=$room_id?>" name="<?=$user_type?>" onChange="selectUser(this)" data-room="<?=$room_id?>">
                                       <option value="0">Select User</option>
                                       <?php
                                          $counter = 0;
                                          $selected = ""; 
                                          foreach($arrUsers as $objUser) {
                                          ?>
                                          <option value="<?=$objUser['user_id']?>"><?=$objUser['first_name']." ".$objUser['last_name']?></option>

<?php 
                                          }
                                       ?>
                                    </select>
                                    </div>
                                    <div class="col-sm-3">
                                    <input data-select="select_id_<?=$room['inventory_room_id']?>" data-room="<?=$room_id?>" data-inventory="<?=$room['inventory_room_id']?>" class="calendar-design" type="text" id="date_<?=$room_id?>" name="<?=$datefield?>" require  value="<?=date("m/d/Y")?>" />
                                    </div>
                                    <input type="hidden" id="<?=$room_id?>" name="<?=$room_type?>" data-inventory="<?=$room['inventory_room_id']?>" value="<?=$room['inventory_room_id']?>" />
                                 
                              </div>
                        

 <?php    
  }
  ?>
  <?php } else if ($_GET['action']  == "community_user_list") {

     $objCommunity = new Community();
     $arrUser = $objCommunity->getusersNotMaptoCommunity($_GET['community_id']);
     if (count($arrUser) <= 0) {
       die("No Users found.");
     }
     ?>

   <div class="form-group clearfix">
                                 <label for="Role" class="col-sm-3 col-form-label col-form-label-sm size-label">
                                  Select User
                                  
                                 </label>
                                 <div class="col-sm-9">
                                    <select multiple class="selectpicker cust-selct_label renter" name="user[]">
                                       <option value="0">Select User</option>
                                       <?php
                                          $counter = 0;
                                          $selected = ""; 
                                          foreach($arrUser as $objUser) {
                                          ?>
                                          <option value="<?=$objUser['user_id']?>"><?=stripslashes($objUser['name'])?></option>

<?php 
                                          }
                                       ?>
                                    </select>
                                 </div>
                              </div>

  <?php  

                                       
}?>