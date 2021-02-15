<!DOCTYPE html>
<html class="scheme_original" lang="en-US">
<head>
<title>CV</title>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<meta content="telephone=no" name="format-detection">
<link href="http://fonts.googleapis.com/css?family=Poppins:300,300italic,400,400italic,500,500italic,600,600italic,700,700italic%7CLora:300,300italic,400,400italic,500,500italic,600,600italic,700,700italic&amp;subset=latin,latin-ext&amp;"
    media="all" property="stylesheet" rel="stylesheet" type="text/css">
<link href="{{ URL::to('/')}}/public/css/fontello/css/fontello.css" media="all" property="stylesheet" rel="stylesheet" type="text/css">
<link href="{{ URL::to('/')}}/public/css/style.css" media="all" property="stylesheet" rel="stylesheet" type="text/css">
<link href="{{ URL::to('/')}}/public/css/colors.css" media="all" property="stylesheet" rel="stylesheet" type="text/css">
<link href="{{ URL::to('/')}}/public/css/bootstrap.css" media="all" property="stylesheet" rel="stylesheet" type="text/css">
<link href="{{ URL::to('/')}}/public/css/responsive.css" media="all" property="stylesheet" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/67208f24c7.css">
<link href="{{ URL::to('/')}}/public/images/favi.png" rel="icon" sizes="192x192">




</head>
<body class="body_style_wide body_filled scheme_original top_panel_show top_panel_over sidebar_hide sidebar_outer_show sidebar_outer_yes top_panel_fixed">


<div id="page_preloader"></div>
<form id="regForm" action="save-cv" method="post">
    @csrf
<div class="body_wrap popup-wrap">
<div  class="ng-tns-c5-0">
   <div class="bck-home"><a href="home">Close - <i class="fa fa-times"></i></a>   </div>
 <div class="tab">
   <div  class="row">

      <div  class="col-md-6 col-sm-12 offset-md-3 offset-lg-3 ng-tns-c5-0  ">
         <div  class="d-block text-center mt-5">
            <img  class="ng-tns-c5-0" alt="" src="{{ URL::to('/')}}/public/img/job-icon.png" width="66px">
            <div  class="clearfix"></div>
            <span  class="pick-pb mt-3 d-inline-block"> Your Job Functionality </span>
         </div>
         <?php   $lang=  Config::get('app.locale');
                $name = 'name_'.$lang;
         ?>
         <div  class="buttons-holder">
             @foreach($cv['job_category'] as $val)
              <div  class="job-colum"><a href="javascript:void(0);"  class="btn mr-1 btn-round button_click"  data_value='{{ $val->id}}' data_name='job_category_id'> {{ $val->$name}}</a></div>
               @endforeach
              <input type="hidden" name="job_category_id" id="job_category_id" value="">
         </div>
      </div>
   </div>
    </div>
</div>

<div class="tab">
<div  class="col-md-6 col-sm-12 offset-md-3 offset-lg-3">

      <div  class="d-block text-center mt-5">
         <h4  class="head-wLine"><span  class="ng-tns-c7-4"> {{ __('msg.resume_name') }}</span></h4>
         <p  class="ng-tns-c7-4"> A well-composed resume can <strong  class="ng-tns-c7-4">literally change your life</strong>  </p>
      </div>
      <div  class="form-body">
         <div  class="text-center mx-auto" style="max-width: 530px;">
            <div  class="form-group text-left">
               <label  class="ng-tns-c7-4" for="resName">Resume Name</label>
               <div  class="input-group">
                  <input  class="form-control bg-white" autofocus="" id="resName" name="resume_name" placeholder="ex: Resume-Marketing" required="" style="background: #fff !important;" type="text">
  <div  class="input-group-append"><p  class="btn btn-raised  btn-org px-3 button_click"  data_value='1' data_name='resume_name_dummuy' ><i  class="fa fa-arrow-right"></i> Lets Start </p></div>
               </div>
            </div>
         </div>
      </div>
      <div  class="form-actions center"></div>

</div>
</div>

<div class="tab">
<div  class="col-md-6 col-sm-12 offset-md-3 offset-lg-3">
   <div  class="d-block text-center mt-5">
      <h4  class="head-wLine"><span  class="ng-tns-c5-0">{{ __('msg.resume_language') }}</span></h4>
      <p  class="ng-tns-c5-0"></p>
   </div>
   <div  class="d-block text-center">
      <div  class="row  justify-content-center">
         <div  class="col-md-4 col-6 mt-2 pointer button_click"  data_value='1' data_name='resume_language_id'>
            <div  class="fonticon-container border border-2 p-2  bg-white card text-center">
              <a href="javascript:void(0);">
               <label  class="fonticon-classname">English</label>
               <div  class="fonticon-wrap d-block float-none text-center w-100"><img  class="langimg"  alt="English" src="{{ URL::to('/')}}/public/img/us.svg"></div>
             </a>
            </div>
         </div>
         <div  class="col-md-4 col-6 mt-2 pointer button_click"  data_value='2' data_name='resume_language_id'>
            <div  class="fonticon-container border border-2 p-2  bg-white card  text-center">
               <a href="javascript:void(0);">
               <label  class="fonticon-classname">العربية</label>
               <div  class="fonticon-wrap d-block float-none text-center w-100"><img  class="langimg"  alt="French" src="{{ URL::to('/')}}/public/img/sa.svg"></div>
             </a>
            </div>
         </div>

      </div>
      <input type="hidden"   name="resume_language_id" id="resume_language_id" value="">
   </div>
</div>
</div>
<div class="tab">
 <div  class="container">
   <div  class="row">
      <div  class="col-md-12">
         <div  class="d-block text-center mt-5">
            <h4  class="head-wLine"><span  class="ng-tns-c7-2"> {{ __('msg.select_design') }}</span></h4>
            <p  class="alert alert-dark text-center" role="alert" type="dark">You can change the template at any time without having to rewrite the content</p>
         </div>
         <div  class="row mt-4 resLang">
           @foreach($cv['resume_templet'] as $val)

            <div  class="col col-12 col-lg-4 ng-tns-c7-2">
               <div  class="page-section">
                  <div  class="border border-2 bg-white card">
                     <div  class="card-body">
                       <img  class="card-img-top img-fluid ng-tns-c7-2" alt="Awesome" src="{{ url('public/thumbnail/'.$val->image)}}">
                     </div>
                  </div>
                  <div  class="card-block  text-center py-1 light">
                     <h4  class="card-title m-0">{{ $val->$name}}</h4>
                     <a  class="btn btn-raised m-0 w-100 btn-primary pointer button_click"  data_value='{{ $val->id}}' data_name='resume_templet_id'>Use this template</a>
                  </div>
               </div>
            </div>
               @endforeach
                 <input type="hidden"  name="resume_templet_id"  id="resume_templet_id" value="" >
         </div>
      </div>
   </div>
</div>
</div>
<div class="tab">
<div class="container">
   <div class="row ">
      <div class="col-md-12">
         <div class="d-block text-center mt-5">
            <h4 class="head-wLine"><span class="ng-tns-c5-1"> {{ __('msg.experience_level') }}</span></h4>
            <div class="clearfix"></div>
            <p class="ng-tns-c5-1">&nbsp;</p>
         </div>
      </div>
   </div>
   <div class="row resLang level-card">
       @foreach($cv['experience_level'] as $val)
      <div class="col col-12 col-lg-4 button_click"  data_value='{{ $val->id}}' data_name='experience_level_id'>
         <div class="border border-2   bg-white card">
            <div class="card-body text-center my-3">
               <img class="img-fluid exp-img mb-2" src="{{ url('public/img/'.$val->img)}}" width="">
               <div class="card-block  text-center">
                  <h4 class="card-title">{{$val->$name}}</h4>
                <p class="ng-tns-c5-1">{{$val->experience_range}} Years </p>
               </div>
            </div>
         </div>
      </div>
        @endforeach
        <input type="hidden" name="experience_level_id"  id="experience_level_id" value="">



   </div>
</div>
</div>
 <!--<div >
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
  </div>
</div> -->
<!-- Circles which indicates the steps of the form: -->

      </form>
<!-- /.popup_login -->
<div class="popup_wrap_bg"></div><a class="scroll_to_top icon-up" href="#" title="Scroll to top"></a>
<script src="{{ URL::to('/')}}/public/js/vendor/jquery.js" type="text/javascript"></script>
<script src="{{ URL::to('/')}}/public/js/custom/custom.js" type="text/javascript"></script>
<script src="{{ URL::to('/')}}/public/js/vendor/jquery.min.js" type="text/javascript"></script>
<script src="{{ URL::to('/')}}/public/js/vendor/slick.js" type="text/javascript"></script>
<script src="j{{ URL::to('/')}}/public/s/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ URL::to('/')}}/public/js/vendor/superfish.js" type="text/javascript"></script>
<script src="{{ URL::to('/')}}/public/js/custom/_min.js" type="text/javascript"></script>
<script src="{{ URL::to('/')}}/public/js/custom/_utils.js" type="text/javascript"></script>
<script src="{{ URL::to('/')}}/public/js/custom/_init.js" type="text/javascript"></script>
<script src="{{ URL::to('/')}}/public/js/custom/_debug.js" type="text/javascript"></script>
<script src="{{ URL::to('/')}}/public/js/custom/template.init.js" type="text/javascript"></script>
<script>
  $(document).ready(function(){
     $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
     });
  });
</script>

<script>
$(function() {
 $('.button_click').on('click', function() {
    var data_name = $(this).attr('data_name');
    var data_value = $(this).attr('data_value');
    $('#'+data_name).val(data_value);
  n=1;
  var x = document.getElementsByClassName("tab");
    x[currentTab].style.display = "none";
    //if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
 });
})
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:

}

/* function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");

  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
} */

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}


</script>
</body>
</html>
