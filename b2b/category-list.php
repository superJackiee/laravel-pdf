<?php require 'includes/app_config.php';
      require 'includes/session.php';
      $objCat = new Category();
      $cat_array = $objCat->getAllCategories();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php include 'includes/head.php'; ?>
      <link rel="stylesheet" href="css/popup.css">
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
                        <div class="prof">Manage Categories</div>
                        <div class="pull-right"><a href="add-inventory.php">Add Category</a></div>
                        <div class="clearfix"></div>
                        <div class="user-form add-user listing-user clearfix">
                        <?php
                        $hidden = "";   
                        if (count($cat_array)) {
                           $hidden = "none";   
                              
                           
                           ?>
                           <div class="table-responsive"> 
                           <table class="table table-cust">
									<thead>
										<tr>
                                 <th>Name</th>
											<th>Edit | Delete</th>
										</tr>
									</thead>
									<tbody id="user_row">
										
                     <?php foreach ($cat_array as $category) {
                        
                        $row_id = 'user_'.$user['user_id'];
                        
                        ?>
                        <tr id='<?=$row_id?>'>
                                 <td><?=stripslashes($category['title'])?></td>
											<td>
                                 <a href="javascript:void(0);" class="view-user" data-category="<?=$category['id']?>" data-thumbnail="<?=$category['thumbnail']?>">View</a> <span>|</span>
                                 <a href="add-category.php?action=edit&id=<?=$category['id']?>">Edit</a><a class="list-ancor" href="javascript:void(0)" data-title="<?=stripslashes($category['title'])?>" data-category="<?=$category['id']?>">Delete</a></td>
										</tr>
                     <?php }?>		
									</tbody>
                        </table>
                     </div>
                        <?php } else {?>
                        <?php }?>   
  
                        <div class="not-foun" style="display: <?=$hidden?>;">
									<h2>No Category found.</h2>
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
                        <h4 class="modal-title text-center"><i class="far fa-user"></i> Category Image</h4>
                     </div>
                     <div class="modal-body">
                        
                     </div>
                  </div>
               </div>
            </div>

      </div>
      </div>
      <?php include 'includes/foot.php'; ?>

      <script>

         $('.list-ancor').click(function(){
            var txt;
            var r = confirm("Are you sure you want to delete "+$(this).data("title")+"?");
            if (r == true) {
               txt = "Ok";
               $rowObject = $(this).parent().parent();
               $.ajax({
                  url: 'ajax/ajax-category.php',
                  dataType: 'json',
                  type: 'post',
                  contentType: 'application/json',
                  data: JSON.stringify( { "action": 'delete_category', "category_id": $(this).data("category") } ),
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
            var thumbnail = $(this).data("thumbnail")
            $('.modal-body').load('popup/category-popup.php?thumbnail='+thumbnail,function(){
               $('#myModal').modal({show:true});
            });
         });
      </script>

   </body>
</html>