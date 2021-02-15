<?php require '../includes/app_config.php';
      require '../includes/session.php';
      $user = new User();
      $objInvt = new Inventory();
      $profile = $user->getProfile($_GET['user_id'])[0];
      $arrInterest = $profile["interest"];
      $arr = array();
      foreach ($arrInterest as $interest) {
         $arr[] = $interest["name"];
      }
      $interest = "N/A";
      if (count($arr)) {
         $interest = implode(",&nbsp;", $arr);
      }
      $about = ($profile['about'] == "" || $profile['about'] == NULL) ? "N/A" : stripslashes($profile['about']);
      $address = ($profile['address'] == "" || $profile['address'] == NULL) ? "N/A" : stripslashes($profile['address']);
      $profile_pic = ($profile['profile_pic'] == "") ? PROFILE_PIC_PATH."guest-200x200.jpg"  : $profile['profile_pic']; 
      $dob = ($profile['date_of_birth'] == "" || $profile['date_of_birth'] == NULL || $profile['date_of_birth'] == "0000-00-00") ? "N/A" : date("d-m-Y", strtotime($profile['date_of_birth'])) ;
      $inventoryInfo = $objInvt->getUserInventoryInformation($_GET['user_id']);
      ;
?>
   <div class="body-content">
                           <div class="modal-row clearfix">
                              <ul  class="list-unstyled">
                                 <li><span class="list-modalrow">Name</span>  <span class="list-modalrow"><?=stripslashes($profile['first_name']." ".$profile['last_name'])?></span></li>
                                 <li><span class="list-modalrow">Address</span>  <span class="list-modalrow"><?=$address?></span></li>
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
