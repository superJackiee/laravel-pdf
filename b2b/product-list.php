<?php require 'includes/app_config.php';
      require 'includes/session.php';
      $objProd = new Product();
      $product_array = $objProd->getProducts();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php include 'includes/head.php'; ?>
      <link rel="stylesheet" href="css/popup.css">
      <title>Manage Products</title>
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
                        <div class="prof">Manage Products</div>
                        <div class="pull-right"></div>
                        <div class="clearfix"></div>
                        <div class="user-form add-user listing-user clearfix" style="width: 98%">
                        <?php
                        $hidden = "";   
                        if (count($product_array)) {
                           $hidden = "none";   
                              
                           
                           ?>
                           <div class="table-responsive"> 
                           <table class="table table-cust">
									<thead>
										<tr>
                                 <th>Name</th>
                                 <th>Category</th>
                                 <th>Seller</th>
                                 <th>Price</th>
                                 <th>Edit | Delete</th>
										</tr>
									</thead>
									<tbody id="user_row">
										
                     <?php foreach ($product_array as $product) {
                        
                        $row_id = 'user_'.$user['user_id'];
                        
                        ?>
                        <tr id='<?=$row_id?>'>
                                 <td><?=stripslashes($product['title'])?></td>
                                 <td><?=stripslashes($product['category_name'])?></td>
                                 <td><?=stripslashes($product['seller'])?></td>
                                 <td><?=number_format($product['price']);?></td>
											<td>
                                 <a href="javascript:void(0)" class="edit-btn" data-product="<?=($product['id'])?>">View</a>
                                 <a href="add-product.php?id=<?=($product['id'])?>" class="edit-btn" data-product="<?=($product['id'])?>">Edit</a>
                                 <a class="list-ancor" href="javascript:void(0)" data-title="<?=stripslashes($product['title'])?>" data-product="<?=$product['id']?>" data-user="<?=$product['user_id']?>">Delete</a></td>
										</tr>
                     <?php }?>		
									</tbody>
                        </table>
                     </div>
                        <?php } else {?>
                        <?php }?>   
  
                        <div class="not-foun" style="display: <?=$hidden?>;">
									<h2>No Product found.</h2>
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
                        <h4 class="modal-title text-center"><i class="far fa-user"></i> Product List</h4>
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

         $('.edit-btn').click(function(){
            var input_id = "input_"+$(this).data("product")
            $("#"+input_id).removeAttr("disabled").focus()
            $(this).next().removeAttr("disabled")
         });                  

         $('.list-ancor').click(function(){
            var txt;
            var product_name = $(this).data("title")
            var r = confirm("Are you sure you want to edit "+product_name+" quantity? ");
            if (r == true) {
               txt = "Ok";
               var input_id = "input_"+$(this).data("product")
               var quantity = $("#"+input_id).val()
               console.log("quantity:::", quantity); 
               $.ajax({
                  url: 'ajax/ajax-stock.php',
                  dataType: 'json',
                  type: 'post',
                  contentType: 'application/json',
                  data: JSON.stringify( { "action": 'update_stock', "product_id": $(this).data("product"), "user_id": $(this).data("user"), "quantity": quantity } ),
                  processData: false,
                  success: function( data, textStatus, jQxhr ){
                     console.log(data.action);
                     if (data.action == true) {
                        alert(data.msg);
                     } else {
                        alert("Please change quantity of " + product_name);   
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
            var invt_id = $(this).data("inventory")
            $('.modal-body').load('popup/inventory-user-list.php?invt_id='+invt_id,function(){
               $('#myModal').modal({show:true});
            });
         });
      </script>

   </body>
</html>