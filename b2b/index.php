<?php require 'includes/app_config.php'; 
      
      if (isset($_SESSION["user"])) {
         header("location:dashboard.php");
         die();
      }

      if (isset($_POST["email"])) {

         $user = new User();
         $row = $user->doAdminLogin($_POST["email"], $_POST["password"]);
         if ($row) {
            $_SESSION["user"] = $row;
            header("location:dashboard.php");
         } else {
            $_SESSION["error"] = "Invalid email or password";
            header("location:index.php");
         }
         die();
      }?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php include 'includes/head.php'; ?>     
      <title>Dashborad</title>
   </head>
   <body>
      <body class="bg_login">
   <section class="sr_login_container">
      <div class="container_login">
         <div class="title_logo text-center">
          <span><img class="img-responsive" src="images/b2b-logo.png"></span> 
         </div>
   <div class="icon-top"><img class="img-responsive" src="images/pass-key.png"></div>
  
  <form class="login-form" method="post">
   

      
    <div class="group">      
      <input type="text" name="email" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
    </div>


    <div class="group">      
      <input type="password" name="password" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Password</label>
    </div>

<div class="text-center btn-mat">
<button class="pure-material-button-contained">Login</button>
</div>
      <div class="foot"><p class="copyright_login_text">Copyright <?=date("Y")?> B2B. All Rights Reserved.</p></div>

  </form>
  <div id="snackbar"><?php echo $_SESSION["error"]?></div>
      <div class="clearfix"></div>


      </div>
   </section>
   <?php include 'includes/foot.php'; ?>
   <?php if (isset($_SESSION["error"])) {?>
      <script>myFunction()</script>
<?php unset($_SESSION["error"]);
      }
      ?>

   </body>
</html>