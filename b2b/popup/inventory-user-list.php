<?php require '../includes/app_config.php';
      require '../includes/session.php';
      $objInvt = new Inventory();
      $invtData = $objInvt->getInventoryUserList($_GET['invt_id']);

      print_r($data);
?>
<div class="body-content">
                           <div class="modal-row clearfix">
                              <ul  class="list-unstyled">
                                 <?php if (count($invtData)) {?>
                                    <li><span class="list-modalrow heading-popup">Name</span>  <span class="list-modalrow heading-popup">Check In</span>  <span class="list-modalrow heading-popup">Room</span></li>
                                 <?php foreach ($invtData as $data) {?>
                                    <li><span class="list-modalrow data-popup"><?=stripslashes($data["name"])?></span>  <span class="list-modalrow data-popup"><?=date("d-m-Y", strtotime($data["rent_start_date"]))?></span> <span class="list-modalrow data-popup"><?=stripslashes($data["room_name"])?></span></li>
                                 <?php }?>
                                    <?php 
                                 } else {?>
                                 <li><span class="list-modalrow data-popup">No Tenant found</span></li>
                                 <?php }?>
                                 
                              </ul>
                           </div>
                        </div>