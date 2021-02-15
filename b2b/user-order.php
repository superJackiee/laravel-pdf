<?php require 'includes/app_config.php';
      require 'includes/session.php';
      $order = new Orders();
      $parent = $_GET['parent'];
      $searchText = $_GET['search'];
      $status = $_GET['status'];
      $order_complete_status = $_GET['order_complete_status'];
      $arrOrder = $order->getAllOrders();
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
      <style>
         .user-form.add-user {
            width: 98%;
         }
      </style>
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
                        <div class="prof">Order Report</div>
                        <div class="clearfix"></div>
                        <div class="user-form add-user listing-user clearfix">
                        <div class="tbl-search">   
                         
                                       </div>   
                        <?php
                        $hidden = "";   
                        if (count($arrOrder)) {
                           $hidden = "none";  
                        ?>
                           <div class="table-responsive">
                            
                           <table class="table table-cust">
									<thead>
										<tr>
											<th>Order ID</th>
                                 <th>Razor Payment ID</th>
											<th>Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Order Date</th>
										</tr>
									</thead>
									<tbody id="user_row">
										
                     <?php foreach ($arrOrder as $user) {
                        $row_id = 'order_'.$user['order_id'];
                     ?>
                        <tr style="cursor: pointer;" data-row="<?=$row_id?>" class="order-row">
								
											<td><?=$user['order_number']?></td>
                                 <td><?=$user['razor_payment_id']?></td>
											<td><?=$user['user_name']?></td>
											<td><?=stripslashes($user['email'])?></td>
											<td><?=stripslashes($user['mobile'])?></td>
											<td><?=stripslashes($user['updated_at'])?></td>
								</tr>
                        <tr style="display: none;" class="product-row" id='<?=$row_id?>'>
                           <td colspan="6">
                              <table class="table table-cust">
                              <thead>
										<tr>
											<th>Product</th>
                                 <th>Qty</th>
											<th>Total</th>
											<th>Tax</th>
											<th>Discount</th>
											<th>Grand Total</th>
										</tr>
									</thead>
                              <?php foreach ($user["products"] as $product) {
                                 $row_id = 'user_'.$user['order_id'];
                              ?>
                                 <tbody id="user_row">
                                 <tr>
                                    <td><?=$product["title"]?></td>
                                    <td><?=$product["quantity"]?></td>
                                    <td><?=$product["total"]?></td>
                                    <td><?=$product["tax"]?></td>
                                    <td><?=$product["discount"]?></td>
                                    <td><?=$product["grand_total"]?></td>
                                 </tr>
                                 </tbody>
                              
                              <?php }?>
                           </table>  
                           </td>
                        </tr>
                     <?php }?>		
									</tbody>
                        </table>
                     </div>
                        <?php } else {?>
                        <?php }?>   
  
                        <div class="not-foun" style="display: <?=$hidden?>;">
									<h2>No Orders found.</h2>
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
         $('.order-row').click(function() {
            $('.product-row').hide();
            if ($('#'+$(this).data("row")).css("display") == "none") {
               $('#'+$(this).data("row")).show();
            } else {
               $('#'+$(this).data("row")).hide();
            }
            
         });
      </script>
       

   </body>
</html>