<?php require 'includes/app_config.php';

      $heading = "Add Product";
      if (isset($_GET['id']) && $_GET['id'] != "") {
         $objProduct = new Product();
         $data = $objProduct->getProductById($_GET['id']);
         $formData = $data[0];
          
         $heading = "Edit Product";
      }
      
      if (isset($_SESSION["fields"])) {

         $formData = $_SESSION["fields"];
      } else {
         unset($_SESSION["fields"]);
      }
      
      if (isset($_POST["form"]) && $_POST["form"] == "posted") {

         unset($_SESSION["fields"]);

         $category = isset($_POST['category']) ? trim($_POST['category']) : "";
         $name = isset($_POST['name']) ? trim($_POST['name']) : "";
         $detail = isset($_POST['detail']) ? trim($_POST['detail']) : "";
         $price = isset($_POST['price']) ? trim($_POST['price']) : "";
         $file = $_FILES['product_image']; 
         $fields = array();
         $fields['title'] = $name;
         $fields['desciption'] = $detail;
         $fields['price'] = $price;
         
         $error = array();

         if (empty($category)) {
            $error[] = "Select Category";
         }

         if (empty($name)) {
            $error[] = "Name can not be empty";
         }

         if (empty($detail)) {
            $error[] = "Description can not be empty";
         }

         if ((int)($price) <= 0) {
            $error[] = "Enter Price";
         }

         if (count($error) > 0) {
            $_SESSION["error"] = $error;
            if (isset($_POST["id"]) && $_POST["id"]!= "") {
               header("location:add-product.php?action=edit&id=".$_POST["id"]);
            } else {
               header("location:add-product.php");
            }
            
            $_SESSION["fields"] = $fields;
            die();
         } else {
            $objProduct = new Product();
            if (isset($_POST['id']) && $_POST['id'] > 0) {
               $objProduct->editProduct(array($category, $name, $detail, $price, $_POST['id']));
            } else {
               $objProduct->addProduct(array($category, $name, $detail, $price, 11, ''),
                                       $_FILES["files"]);
            }
            header("location:product-list.php");
            die();
         }
      }

      $objCat = new Category();
      $arr_cat = $objCat->getActiveParentCategories();
      
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php include 'includes/head.php'; ?>
      <style>
         #master-room {
            display: none;
         }
         #common-room {
            display: none;
         }
         input[type="file"] {
 
        display:block;
        }
        .imageThumb {
        max-height: 150px;
        border: 2px solid;
        margin: 10px 10px 0 0;
        padding: 1px;
        }
      </style>
      <script src="http://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
         
      <script type="text/javascript">
      $(document).ready(function() {
       
       if(window.File && window.FileList && window.FileReader) {
          $("#files").on("change",function(e) {
              var files = e.target.files ,
              filesLength = files.length ;
              for (var i = 0; i < filesLength ; i++) {
                  var f = files[i]
                  var fileReader = new FileReader();
                  fileReader.onload = (function(e) {
                      var file = e.target;
                      $("<img></img>",{
                      class : "imageThumb",
                      src : e.target.result,
                      title : file.name
                      }).insertAfter("#files");
                  });
                  fileReader.readAsDataURL(f);
              }
          });
       } else { alert("Your browser doesn't support to File API") }
      });
       
      </script>
      <title><?=$heading?></title>
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
                  <div class="bg-white add-mang clearfix">
                     <div class="col-sm-12 padd-left">
                        <div class="prof"><?=$heading?></div>
                        <div class="user-form add-user">
                           <form name="frmInventory" method="post" enctype="multipart/form-data">
                           <?php if (isset($_GET['id'])) {?>
                                    <input type="hidden" name="id" value="<?=$_GET['id']?>" /> 
                           <?php }?>
                              <div class="form-group clearfix">
                                 <label for="colFormLabelSm" class="col-sm-3 col-xs-4 col-form-label col-form-label-sm size-label">Select Category</label>
                                 <div class="col-sm-9 col-xs-8">
                                    <select class="selectpicker cust-selct_label" name="category" id="category">
                                       <option value="">Select Category</option>
                                       <?php foreach($arr_cat as $option) {?>
                                          <option value="<?=$option["id"]?>" <?php echo ($option["id"] == $formData["category_id"]) ? "selected": ""?>><?=stripslashes($option["title"])?></option>
                                       <?php    
                                       }?>
                                    </select>
                              </div>
                              </div>
                              <div class="form-group clearfix">
                                 <label for="colFormLabelSm" class="col-sm-3 col-xs-4 col-form-label col-form-label-sm size-label">Product Name</label>
                                 <div class="col-sm-9 col-xs-8">
                                 <input type="text" name="name" value="<?=stripslashes($formData['title'])?>" class="form-control form-control-sm fild-border" id="Name" placeholder="Enter Name" /></div>
                              </div>
                              <div class="form-group clearfix">
                                 <label for="colFormLabelSm" class="col-sm-3 col-xs-4 col-form-label col-form-label-sm size-label">Product Description</label>
                                 <div class="col-sm-9 col-xs-8">
                                 <textarea name="detail" class="form-control form-control-sm fild-border" placeholder="Enter Details" rows="5" id="comment"><?=stripslashes($formData['desciption'])?></textarea></div>
                              </div>
                              <div class="form-group clearfix">
                                 <label for="colFormLabelSm" class="col-sm-3 col-xs-4 col-form-label col-form-label-sm size-label">Product Price</label>
                                 <div class="col-sm-9 col-xs-8">
                                 <input type="number" name="price" value="<?=stripslashes($formData['price'])?>" class="form-control form-control-sm fild-border" id="Name" placeholder="Enter Price" /></div>
                              </div>
                              <?php if (!isset($_GET['id'])) {?>
                              <div class="form-group clearfix">
                                 <label for="colFormLabelSm" class="col-sm-3 col-xs-4 col-form-label col-form-label-sm size-label">Select Image</label>
                                 <div class="col-sm-9 col-xs-8">
                                    <input type="file" id="files" name="files[]" multiple />
                                 </div>
                              </div>
                              <?php }?>
                        </div>
                        <div class="form-group clearfix">
                           <div class="col-sm-12 text-center">
                           <input type="hidden" name="form" value="posted" />
                              <button class="pure-material-button-contained">Submit</button>
                           </div>
                        </div>
                        </form>
                        <?php if(isset($_SESSION["error"])) {?>
                           <div id="snackbar"><?php echo getError($_SESSION["error"]);?></div>
                        <?php  }?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include 'includes/foot.php'; ?>
      <script type="text/javascript">
  <?php if(isset($_SESSION["error"])) {?>
      myFunction()
<?php unset($_SESSION["error"]);unset($_SESSION["fields"]);
      }
      ?>
     $('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});

   $("#inventory_type").change(function(){

      var html = ""

      for(var i=0; i < $('option:selected', this).data('master'); i++ ) {
         html = html + '<input type="text" name="master_room[]" value="" class="form-control form-control-sm fild-border" id="master_room_name" placeholder="Enter Master Room '+(i+1)+' Name" required />'
      }
      $("#master-room").show();
      $("#master-room-html").html(html);

      html = ""
      for(var i=0; i < $('option:selected', this).data('common'); i++ ) {
         html = html + '<input type="text" name="common_room[]" value="" class="form-control form-control-sm fild-border" id="common_room_name" placeholder="Enter Common Room '+(i+1)+' Name" required />'
      }

      $("#common-room").show();
      $("#common-room-html").html(html);
   });

  </script>
   </body>
</html>
 