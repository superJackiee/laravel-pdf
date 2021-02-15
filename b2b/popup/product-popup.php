<?php require '../includes/app_config.php';
      require '../includes/session.php';
       
?>
   <div class="body-content">
                           <div class="modal-row clearfix">
                           <ul  class="list-unstyled">
                                 <li><span class="list-modalrow">Name</span>  <span class="list-modalrow"><?=stripslashes($profile['first_name']." ".$profile['last_name'])?></span></li>
                                 <li><span class="list-modalrow">Category</span>  <span class="list-modalrow"><?=stripslashes($profile['first_name']." ".$profile['last_name'])?></span></li>
                                 <li><span class="list-modalrow">Description</span>  <span class="list-modalrow"><?=$address?></span></li>
                                 <?php foreach ($inventoryInfo as $invt) {?>
                                    <li><span class="list-modalrow">Apartment</span>  <span class="list-modalrow"><?=stripslashes($invt["name"])?></span></li>
                                 <li><span class="list-modalrow">Room</span>  <span class="list-modalrow"><?=stripslashes($invt["room_name"])?></span></li>
                                 <?php    
                                 }?>
                                 
                                 <li><span class="list-modalrow">Email</span>  <span class="list-modalrow"><?=$profile['email']?></span></li>
                                 <li><span class="list-modalrow">Contact No</span>  <span class="list-modalrow"><?=$profile['contact_no']?></span></li>
                                 <li><span class="list-modalrow">Date of Birth</span>  <span class="list-modalrow"><?=$dob?></span></li>
                                 <li><span class="list-modalrow">About</span>  <span class="list-modalrow"><?=$about?></span></li>
                                 <li><span class="list-modalrow">Interest</span>  <span class="list-modalrow"><?=$interest?></span></li>
                                 <li><span class="list-modalrow">Profile Pic</span>  <span class="list-modalrow"><img class="img-responsive" src="<?=$profile_pic?>"></span></li>
                              </ul>
                           </div>
                        </div>
