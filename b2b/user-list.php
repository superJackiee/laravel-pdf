<?php require 'includes/app_config.php';
      require 'includes/session.php';
      $user = new User();
      $arrUsers = $user->getActiveUsers();
      
      
       
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php include 'includes/head.php'; ?>
      <link rel="stylesheet" href="css/popup.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <title>Manage User</title>
   </head>
   <body>
      <div class="body-dash">
      <div class="top-bg">
         <div class="container cust-container">
          <div class="col-sm-6">
                  <div class="logo-navbar">
                     <div class="icon-logo">
                        <span class="logo-right"><img class="img-responsive" src="images/logo.png"></span> 
                     </div>
                  </div>
               </div>
            <div class="col-sm-6">
               <div class="logo-navbar  text-right">
                  <div class="profile-navbar clearfix">
                     <span class="profile-name ring-notify">
                        <ul class="list-unstyled acc-drop">
                           <li class="dropdown">
                              <a href="JavaScript:void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                              <span class="right-text not-bell"><i class="far fa-bell"></i>  <span class="num-noti"><small>13</small></span></span>
                              </a>
                              <ul class="dropdown-menu">
                                 <li><a href="#">Dashborad</a></li>
                                 <li class="divider"></li>
                                 <li><a href="#">Order</a></li>
                                 <li class="divider"></li>
                                 <li><a href="#">Change Password </a></li>
                                 <li class="divider"></li>
                                 <li><a href="#">Profile</a></li>
                                 <li class="divider"></li>
                                 <li><a href="#">Sign Out </a></li>
                              </ul>
                           </li>
                        </ul>
                     </span>
                     <?php include("includes/menu.php"); ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="container cust-container">
         <div class="row">
            <div class="dashbord-container clearfix">
               <div class="col-sm-2 wdth-define padd-right clearfix">
               <?php include("includes/left-panel.php"); ?>
               </div>
               <div class="col-sm-10 wdth-rght">
                  <div class="bg-white add-mang clearfix">
                     <div class="col-sm-12 padd-left">
                        <div class="prof">Manage Tenant</div>
                        <div class="pull-right"><a href="add-user.php">Add Tenant</a></div>
                        <div class="clearfix"></div>
                        <div class="user-form add-user listing-user clearfix" style="width:98%">
                        <?php
                        $hidden = "";   
                        if (count($arrUsers)) {
                           $hidden = "none";  
                        ?>
                           <div class="table-responsive"> 
                           <table class="table table-cust">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
											<th>Phone</th>
                                 <th>Total Spam</th>
											<th>Edit | Delete</th>
										</tr>
									</thead>
									<tbody id="user_row">
										
                     <?php 
                     $objUser = new User();
                     foreach ($arrUsers as $user) {
                        
                        $row_id = 'user_'.$user['user_id'];
                        $name = stripslashes(ucfirst($user['first_name'])." ".ucfirst($user['last_name']));
                        $total = $objUser->getUserTotalSpam($user['user_id']);
                        $total = ($total != "") ? $total : 0;
                        ?>
                        <tr id='<?=$row_id?>'>
								
											<td><?=stripslashes(ucfirst($user['first_name'])." ".ucfirst($user['last_name']))?></td>
											<td><?=stripslashes($user['email'])?></td>
											<td><?=stripslashes($user['contact_no'])?></td>
                                 <td><h3><i><?=$total?></i></h3></td>
											<td>
                                 <?php if (isset($user['is_block'])) {
                                    $block_text = ($user['is_block'] == 1) ? "UnBlock": "Block";
                                 ?>
                                    <a href="javascript:void(0);" data-user="<?=$name?>" data-user_id="<?=$user['user_id']?>" data-is_ban="<?=$user['is_block']?>" class="ban-user" data-channel_url="<?=$user['channel_url']?>"><?=$block_text?></a>|
                                <?php     
                                 }?>
                                 <a href="javascript:void(0);" class="view-user" data-user="<?=$user['user_id']?>">View</a>|<a href="add-user.php?action=edit&id=<?=$user['user_id']?>">Edit</a><a class="list-ancor" data-name="<?=ucfirst($user['first_name'])." ".ucfirst($user['last_name'])?>" data-user="<?=$user['user_id']?>" href="javascript:void(0)">Delete</a>
                                 |<a href="javascript:void(0);" class="change-password" data-user="<?=$user['user_id']?>" data-name="<?=$name?>">Change Password</a>
                                 </td>
										</tr>
                     <?php }?>		
									</tbody>
                        </table>
                     </div>
                        <?php } else {?>
                        <?php }?>   
  
                        <div class="not-foun" style="display: <?=$hidden?>;">
									<h2>No tenant found.</h2>
								</div>
                           
 </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
          
<div class="modal fade" id="myModal" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-contentcust-modal">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center"><i class="far fa-user"></i> USER DETAIL</h4>
                     </div>
                     <div class="modal-body">
                        
                     </div>
                  </div>
               </div>
            </div>

      </div>
      <?php include 'includes/foot.php'; ?>

      <script>

         $('.ban-user').click(function(){

            var user_id = $(this).data("user_id")
            var json = {user_id: user_id.toString(), "seconds": -1, "description": "Too much talking"}
            var items = $(this).data("channel_url").split(",")
            var user = $(this).data("user")
            var is_ban = $(this).data("is_ban")
            var current_object = $(this)
            //alert(JSON.stringify(json));
            //return;
            var is_block = 0
            var ajax_request = function(channel_url) {
            var deferred = $.Deferred();
               //
               var blockText = ""
               if (is_ban == 1) {
                  is_block = 0
                  blockText = "Block"
                  $.ajax({
                     headers: {
                        'Content-Type': 'application/json',
                        'Api-Token': 'a978622354926807ea957fd68faa3dc694c20dfd'
                     },
                     url: 'https://api-8ECAD3CD-E0FA-436A-877D-4DB3AA8EB60D.sendbird.com/v3/open_channels/'+channel_url+'/ban/'+user_id,
                     dataType: "json",
                     type: 'DELETE',
                     data: JSON.stringify(json),
                     success: function(data) {
                        
                     console.log('Response:::::'+data);
                     deferred.resolve(data);
                     $(current_object).data("is_ban",0)
                     $(current_object).html("Block");
                     banUnBanUser(user_id.toString(), user, is_ban);
                     },
                     error: function(error) {
                     // mark the ajax call as failed
                     console.log('this is error'+error);
                     deferred.reject(error);
                     }
                  });
               } else {
                  blockText = "UnBlock"
                  is_block = 1
                  $.ajax({
                     headers: {
                        'Content-Type': 'application/json',
                        'Api-Token': '<?=$sendbird_api_token?>'
                     },
                     url: 'https://api-<?=$sendbird_app_id?>.sendbird.com/v3/open_channels/'+channel_url+'/ban',
                     dataType: "json",
                     type: 'POST',
                     data: JSON.stringify(json),
                     success: function(data) {
                        
                     console.log('Response:::::'+data);
                     deferred.resolve(data);
                     $(current_object).data("is_ban",1)
                     $(current_object).html("UnBlock");
                     banUnBanUser(user_id.toString(), user, is_ban);
                     },
                     error: function(error) {
                     // mark the ajax call as failed
                     console.log('this is error'+error);
                     deferred.reject(error);
                     }
                  });
               }

               return deferred.promise();
            };

            var looper = $.Deferred().resolve();

            // go through each item and call the ajax function
            $.when.apply($, $.map(items, function(item, i) {
            looper = looper.then(function() {
               return ajax_request(item);
            });

            return looper;
            })).then(function() {
            console.log('Done!');
               
            });

         });                  

         $('.list-ancor').click(function(){
            var txt;
            var r = confirm("Are you sure you want to delete "+$(this).data("name")+"?");
            if (r == true) {
               txt = "Ok";
               $rowObject = $(this).parent().parent();
               $.ajax({
                  url: 'ajax/ajax-user.php',
                  dataType: 'json',
                  type: 'post',
                  contentType: 'application/json',
                  data: JSON.stringify( { "action": 'delete_user', "user_id": $(this).data("user") } ),
                  processData: false,
                  success: function( data, textStatus, jQxhr ){
                     if (data.action == true) {
                        alert(data.msg);
                        $($rowObject).remove();
                        if ($('.table-cust tbody tr').length <= 0) {
                           $('.table-cust').hide()
                           $('.not-foun').show()
                        }
                     }
                  },
                  error: function( jqXhr, textStatus, errorThrown ){
                     console.log( errorThrown );
                  }
               });
            } else {
               txt = "Cancel";
            }
         });
         $(".view-user").on('click',function(){
            
            $('.modal-body').load('popup/user-detail.php?user_id='+$(this).data("user"),function(){
               $('#myModal').modal({show:true});
            });
         });

         $(".change-password").on('click',function(){
            var user_id = $(this).data("user");
            var r = confirm("Are you sure you want to change password for "+$(this).data("name")+"?");
            if (r == true) {
                
                 document.location.href = 'change-password.php?user_id='+user_id
            }
            
         });

         //
         function banUnBanUser(user_id, user, is_block) {
            $.ajax({
                  url: 'ajax/ajax-community.php',
                  dataType: 'json',
                  type: 'post',
                  contentType: 'application/json',
                  data: JSON.stringify( { "action": 'block_action', "block": is_block, "user_id": user_id, "user": user } ),
                  processData: false,
                  success: function( data, textStatus, jQxhr ){
                     if (data.action == true) {
                        
                     } else {
                     }  
                  },
                  error: function( jqXhr, textStatus, errorThrown ){
                     console.log( errorThrown );
                  }
            });
         }

      </script>

   </body>
</html>