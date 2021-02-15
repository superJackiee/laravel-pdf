<?php require 'includes/app_config.php';
      require 'includes/session.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
      <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="css/dropdown.css" type="text/css" rel="stylesheet" /> 
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="css/bootstrap-select.min.css">
      <link href="css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
      <link href="css/style.css" rel="stylesheet">    
        <title>Dashborad</title>
   </head>
   <body>
      <div class="body-dash">
           <div class="top-bg">
            <div class="container cust-container">
               <div class="col-sm-6 col-xs-8">
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
                                 <span class="right-text not-bell"><i class="far fa-bell"></i>  <span class="num-noti"><small>3</small></span></span>
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
                     
                     <div class="bg-white padd-newd clearfix">
                  <div class="mrg-center">
                   <h2>Welcome</h2>
                </div>
                     </div>
           
        
                
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include 'includes/foot.php'; ?>
      
   </body>
</html>