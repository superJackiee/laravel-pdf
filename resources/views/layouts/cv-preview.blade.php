<!doctype html>
 <html lang="en" class="no-focus">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title')</title>
      <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ URL::to('/')}}/public/assets2/img/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ URL::to('/')}}/public/assets2/img/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::to('/')}}/public/assets2/img/favicons/apple-touch-icon-180x180.png">

    <link rel="stylesheet" id="css-main" href="{{ URL::to('/')}}/public/assets2/css/codebase.min.css">
    <link rel="stylesheet" id="css-main" href="{{ URL::to('/')}}/public/assets2/css/style.css">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v4.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>
      #main-container, #page-footer {
        overflow-x: scroll!important;
      }
      .nav-item{
        margin-right: 10px;
        font-size: 1.1rem;
      }
      .nav-item.active{
        border-bottom: 5px solid #08aedb;
        background: #f3f4f4;
        border-radius: 4px 4px 0 0;
      }
      .nav-item.active a{
        color: #08aedb;
        font-weight: bold;
      }
      .preview{
        padding: 40px;
      }
      .sidebar-content {
        background-color: #f5f6f7;
      }
      .center{
        text-align: center;
      }
      .card{
        background-color: white;
        box-shadow: 0 6px 0 0 rgba(0,0,0,.01), 0 15px 32px 0 rgba(0,0,0,.06);
        border-radius: 4px;
        border: 0;
        padding: 20px;
        margin-top: 20px;
      }
      .card-title {
        padding: 10px 0px;
        background-color: #f5f6f7;
      }
      #page-container.page-header-modern #sidebar {
          box-shadow: 5px 0 10px rgba(0,0,0,.05);
      }
      .sub-title{
        font-size: 18px;
      }
      .primary {
          color: #08aedb!important;
      }
      .text-bold-500 {
          font-weight: 500;
      }
      .thanksHolder {
        background-image: url(../public/img/thankyou.gif);
        background-size: 90%;
        background-position-y: -35px;
        left: -10px;
        margin-right: -10px;
        border-radius: 0 0 0 10px;
        background-position-x: 20px;
        -webkit-transform: scale(.7);
        transform: scale(.7);
        position: relative;
        z-index: 1;
        height: 120px;
        padding: 0;
        margin-top: -40px;
        margin-bottom: -25px;
    }
    .text-left {
        text-align: left!important;
    }
    .btn-primary.btn-fab, .btn-primary.btn-raised {
        background-color: #08aedb;
        color: #fff!important;
        border-color: #08aedb;
        font-size: 15px;
    }
    .d-block {
        display: block!important;
    }

    .container1 p{
      margin-bottom: 0px;
    }
    .section-item{
      padding: 10px;
      background-color: #f5f6f7;
      margin: 5px 10px;
    }
    .section-item a{
      float: right;
      font-size: 15px!important;
    }
    .section-item span{
      font-size: 15px!important;
    }
    </style>
  </head>
  <body>
    <!-- Page Container -->
    <div id="page-container" class="side-scroll page-header-modern main-content-boxed sidebar-o">

      <!-- Side Overlay-->
      <aside id="side-overlay">
          <!-- Side Overlay Scroll Container -->
          <div id="side-overlay-scroll">
              <!-- Side Header -->
              <div class="content-header content-header-fullrow">
                  <div class="content-header-section align-parent">
                      <!-- Close Side Overlay -->
                      <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                          <span class="orange"><strong>x</strong></span>
                      </button>
                      <!-- END Close Side Overlay -->
                  </div>
              </div>
              <!-- END Side Header -->

              <div class="content-side">
                <div class="block">
                  <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout1">
                      <a href="#" class="">Content</a>
                  </button><hr class="mt-0">
                </div>
                <div class="block">
                  <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="modal" data-target="#template">
                      <a href="#" class="">Change Template</a>
                  </button><hr class="mt-0">
                </div>
                <div class="block">
                  <button type="button" class="btn btn-circle btn-dual-secondary">
                      <a href="cv-dashboard1.html" class="">Preview &amp; Download</a>
                  </button><hr class="mt-0">
                </div>
                
                <div class="block"> <a class="btn btn-orange ml15" href="{{ URL::to('/')}}/download-resume/{{ Request::segment(2) }}"> A4 Size </a>
                  <button type="button" class="btn btn-orange ml15" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Save As PDF <i class="fa fa-caret-down ml-5"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                    <!-- <a class="dropdown-item fs-15" href="#"> One Page </a> -->

                  </div>
                </div>
              </div>
          </div>
          <!-- END Side Overlay Scroll Container -->
      </aside>
      <!-- END Side Overlay -->

      <nav id="sidebar">
          <!-- Sidebar Scroll Container -->
        <div id="sidebar-scroll">
            <!-- Sidebar Content -->
          <div class="sidebar-content">
              <!-- Side Header -->
            <div class="content-header content-header-fullrow px-15" style="background-color: white;">
              <!-- Mini Mode -->
              <div class="content-header-section center">
                  <!-- Logo -->
                  <div class="logo">
                    <a href="{{ url('/') }}">
                      <img alt="" class="logo_fixed" src="{{ asset('public/img/logo-2.png') }}">
                    </a>
                  </div>
                  <!-- END Logo -->
              </div>
              <!-- END Mini Mode -->
            </div>
            <!-- END Side Header -->
            <!-- Side Navigation -->
            <div class="content-side content-side-full">
              <div class="card">
                <div class="card-header">
                  <h4 class="center">
                    RESUME CUSTOMIZER
                  </h4>
                  <p class="center sub-title">Customize & Preview in Real Time</p>
                </div>

                <div class="card-body center">
                  <div class="thanksHolder"></div>

                  <span class="sub-title text-bold-500">
                    YOUR RESUME LOOKS <span class="primary">AWESOME</span>
                  <span>
                </div>
              </div>

              <div class="card">
                <div class="card-header">
                  <h4 class="center card-title">
                    TEMPLATE
                  </h4>
                </div>

                <div class="card-body center">
                  <div class="resume-currenct-template row">
                    <div class="flex-grow-1 text-left col-sm-6">
                        <h4 class="media-heading sub-title text-bold-500">
                        <a href="#">
                          <?php  $resume_templet = DB::table('resume_templet')->where('id',$cv['personal_info']->resume_templet_id)->get();  ?>
                          {{ $resume_templet[0]->name_en }}
                        </a>
                        </h4>
                        <p><a href="#">
                          <?php if($cv['personal_info']->resume_language_id =='1'){ echo 'English';} else{ echo 'Arabic';}?>
                        </a></p>
                    </div>
                    <div class="col-sm-6 center">  
                      <a href="{{ URL::to('/')}}/change-templet/{{ Request::segment(2) }}" class="side-btn f-right"><span>Change Template</span></a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header">
                  <h4 class="center card-title">
                    COLOR
                  </h4>
                </div>

                <div class="card-body">
                  <div class="row pt-15 sp15">
                    @foreach ($cv['colors'] as $color)
                    <div class="d-block col-md-2 d-flex">
                      <label class="container1">
                        <input type="radio" id="{{ $color->name }}" <?php if($cv['personal_info']->color == $color->main_code.','.$color->sub_code){ echo 'checked';}?> name="color" value="{{ $color->main_code }},{{ $color->sub_code }}" >
                        <span class="box3d">
                          <span style="color: {{ $color->main_code }}; padding: 2px 5px; background-color: {{ $color->main_code }};">.</span>
                          <span style="color: {{ $color->sub_code }}; padding: 2px 5px; background-color: {{ $color->sub_code }}; margin-left: -5px">.</span>
                        </span>
                      </label>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header">
                  <h4 class="center card-title">
                    LAYOUT
                  </h4>
                </div>

                <div class="card-body">
                  <div style="margin-bottom:20px">
                    <h4 class="media-heading sub-title text-bold-500"><i class="fa fa-angle-down"></i> Column</h4>
                    <div class="row sp15">
                      <div class="col-md-6 d-in center" style="padding:10px">
                        <label class="container1 colu-active" style="height: auto;">
                          <input type="radio" id="layout" name="layout" value="2" >
                          <img src="{{ URL::to('/')}}/public/assets2/img/cv/two-column.png" class="img-fluid mt-5i" alt="">
                          <p class="column-otline">Two Column</p>
                        </label>
                      </div>
                      <div class="col-md-6 d-in center"  style="padding:10px">
                        <label class="container1 colu-active" style="height: auto;">
                          <input type="radio" id="layout"  name="layout" value="1" >
                          <img src="{{ URL::to('/')}}/public/assets2/img/cv/one-column.png" class="img-fluid mt-5i" alt="">
                          <p class="column-otline">One Column</p>
                        </label>
                      </div>
                    </div>
                  </div>

                  <div>
                    <h4 class="media-heading sub-title text-bold-500" style="margin-bottom: 10px;"><i class="fa fa-angle-down"></i> Change Section Order</h4>
                    <p class="fs-12h fw500 gray">Drag and Move section up and down or left and right</p>
                  </div>
                  <div>
                    <?php $cv_id = Request::segment(2) ;
                    $cv_section = DB::table('cv_section')->where('cv_id',$cv_id)->orderByRaw('order_by ASC')->get();   ?>
                    <div class="row sp15" id="sortable">
                      @foreach ($cv_section as $cv_sec)
                      <div class="col-md-5 d-in section-item" id="item_<?php echo $cv_sec->id; ?>">
                        <span class="fs-13 fw500 gray pr-3">{{$cv_sec->name}} </span>
                        <a href="#" class="text-center">
                          <!--<img src="{{ URL::to('/')}}/public/assets/img/cv/move.png" class="img-fluid" alt="">-->
                          <i class="fa fa-arrows-alt"></i>
                        </a>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header">
                  <h4 class="center card-title">
                    FONT
                  </h4>
                </div>

                <div class="card-body">
                  <div style="margin-bottom:20px">
                    <h4 class="media-heading sub-title text-bold-500"><i class="fa fa-angle-down"></i> Font Family</h4>
                    <div class="row sp15" style="display: flex;">
                      <div class="d-in">
                        <label class="container1">
                          <input type="radio" id="font_style" name="font_style" value="Roboto">
                          <span class="colu-bor colu-active">  <span class="column-otline">Roboto</span></span>
                        </label>
                      </div>
                      <div class="d-in">
                        <label class="container1">
                          <input type="radio" id="font_style"  name="font_style" value="Helvetica Neue" >
                          <span class="colu-bor"><span class="column-otline">Helvetica</span></span>
                        </label>
                      </div>
                      <div class="d-in">
                        <label class="container1">
                          <input type="radio" id="font_style"  name="font_style" value="Arial" >
                          <span class="colu-bor"><span class="column-otline">Arial</span></span>
                        </label>
                      </div>
                      <div class="d-in">
                        <label class="container1">
                          <input type="radio" id="font_style"  name="font_style" value="sans-serif" >
                          <span class="colu-bor"><span class="column-otline">Sans serif</span></span>
                        </label>
                      </div>
                    </div>
                  </div>

                  <div>
                    <h4 class="media-heading sub-title text-bold-500" style="margin-bottom: 10px;"><i class="fa fa-angle-down"></i> Font Size</h4>
                  </div>
                  <div>
                    <div class="row sp15">
                      <?php for($i=10;$i<=21;$i++){?>
                        <label class="container1">
                          <input type="radio" id="font_size" name="font_size" value="<?php echo $i;?>">
                          <span class="colu-bor colu-active">  <span class="column-otline"><?php echo $i;?></span></span>
                        </label>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            <!-- END Side Navigation -->
            </div>
          <!-- Sidebar Content -->
          </div>
        </div>
        <!-- END Sidebar Scroll Container -->
      </nav>
    <!-- END Sidebar -->

      <!-- Header -->
      <header id="page-header">
          <!-- Header Content -->
          <div class="content-header ch1">
              <!-- Left Section -->
              <div class="content-header-section">
                  <!--<button type="button" class="btn btn-circle btn-dual-secondary desk-dis" data-toggle="layout1">
                      <a href="{{ URL::to('/')}}/edit-cv/{{ Request::segment(2) }}" class="">Content</a>
                  </button>

                  <button type="button" class="btn btn-circle btn-dual-secondary desk-dis" data-toggle="modal" data-target="#template">
                        <a href="{{ URL::to('/')}}/change-templet/{{ Request::segment(2) }}" class="">Change Template</a>
                  </button>

                  <button type="button" class="btn btn-circle btn-dual-secondary desk-dis">
                        <a href="#" class="orange">Preview & Download</a>
                  </button>-->
                  <ul class="nav">
                    <li class="nav-item">
                      <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle" style="cursor: pointer; padding:10px">
                        <!--<img src="{{ URL::to('/')}}/public/assets2/img/cv/brush.png" class="img-fluid" alt="" style="cursor: pointer;">-->
                        <i class="fa fa-list"></i>
                      </button>
                    </li>
                    <li class="nav-item nav-menu-item active" id="tab-content">
                      <a class="nav-link" href="{{ URL::to('/')}}/edit-cv/{{ Request::segment(2) }}">
                        <i class="fa fa-pencil"></i> Content
                      </a>
                    </li>
                    <li class="nav-item nav-menu-item" id="tab-template">
                      <a class="nav-link" href="{{ URL::to('/')}}/change-templet/{{ Request::segment(2) }}">
                        <i class="fa fa-address-card"></i> Change Template
                      </a>
                    </li>
                    <li class="nav-item nav-menu-item" id="tab-preview">
                      <a class="nav-link" href="{{ URL::to('/')}}/preview-resume/{{ Request::segment(2) }}">
                        <i class="fa fa-cloud-download"></i> Preview & Download
                      </a>
                    </li>
                  </ul>
              </div>
              <!-- END Left Section -->

              <!-- Right Section -->
              <div class="content-header-section">
                  <!-- User Dropdown -->
                  <div class="btn-group" role="group">
                      <a class="btn btn-orange fs-15" href="{{ URL::to('/')}}/download-resume/{{ Request::segment(2) }}">
                      <i class="fa fa-download"></i>
                        Save As PDF 
                      </a>
                      <!--<button type="button" class="btn btn-orange desk-dis" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Save As PDF<i class="fa fa-caret-down ml-5"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                          <a class="dropdown-item fs-15" href="{{ URL::to('/')}}/download-resume/{{ Request::segment(2) }}">A4 Size </a>
                            <a class="dropdown-item fs-15" href="#"> A4 Size </a>
                      </div>-->
                      <!-- Toggle Side Overlay -->
                        <button type="button" class="btn p-0 mob-dis" data-toggle="layout" data-action="side_overlay_toggle">
                          <img src="{{ URL::to('/')}}/public/assets2/img/cv/menu-bar.png" alt="">
                        </button>
                      <!-- END Toggle Side Overlay -->
                  </div>
                  <!-- END User Dropdown -->
              </div>
              <!-- END Right Section -->
          </div>
          <!-- END Header Content -->

          <!-- Header Search -->
          <div id="page-header-search" class="overlay-header">
              <div class="content-header content-header-fullrow">
                  <form action="be_pages_generic_search.html" method="post">
                      <div class="input-group">
                          <span class="input-group-btn">
                              <!-- Close Search Section -->
                              <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                              <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                  <i class="fa fa-times"></i>
                              </button>
                              <!-- END Close Search Section -->
                          </span>
                          <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                          <span class="input-group-btn">
                              <button type="submit" class="btn btn-secondary">
                                  <i class="fa fa-search"></i>
                              </button>
                          </span>
                      </div>
                  </form>
              </div>
          </div>
          <!-- END Header Search -->

          <!-- Header Loader -->
          <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
          <div id="page-header-loader" class="overlay-header bg-primary">
              <div class="content-header content-header-fullrow text-center">
                  <div class="content-header-item">
                      <i class="fa fa-sun-o fa-spin text-white"></i>
                  </div>
              </div>
          </div>
          <!-- END Header Loader -->
      </header>
      <!-- END Header -->

      <!-- Main Container -->
      <main id="main-container">
          <!-- Page Content -->
          <div class="content w70 preview">

              <!-- CV Tabel -->

              <div class="block block-rounded marcelinecv-bg">
                @yield('content')


              </div>
              <!-- END Orders -->
          </div>
          <!-- END Page Content -->
      </main>
          <!-- END Main Container -->

          <!-- Footer -->
          <!--<footer id="page-footer" class="opacity-0" style="opacity: 1;">
              <div class="content py-20 font-size-xs clearfix">
                  <div class="float-right">
                      Design by : <a class="font-w600" href="#" target="_blank">SSAK</a>
                  </div>
                  <div class="float-left">
                      <a class="font-w600" href="#" target="_blank">CV</a> ©
                      <span class="js-year-copy">2020</span>
                  </div>
              </div>
          </footer>-->
          <!-- END Footer -->
    </div>
    <!-- END Page Container -->

      <!--/ Select Template Model -->
		<div class="modal fade text-left" id="template" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
			  <div class="modal-content">
				<div class="modal-header">
					<h3 class="text-center mcv-had">Template</h3>
					<button type="button" class="close gray" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
				  <div class="row">
					<div class="col-md-4 text-center">
					  <img src="{{ URL::to('/')}}/public/assets2/img/cv/mcv1.png" class="img-fluid mcv-img" alt="">
					  <h3 class="mcv-h">Template Name</h3>
					  <a href="#" class="mcv-btn"><span>Use this template</span></a> <br/> <br/> <br/>
					</div>
					<div class="col-md-4 text-center">
					  <img src="{{ URL::to('/')}}/public/assets2/img/cv/mcv2.png" class="img-fluid mcv-img" alt="">
					  <h3 class="mcv-h">Template Name</h3>
					  <a href="#" class="mcv-btn"><span>Use this template</span></a> <br/> <br/> <br/>
					</div>
					<div class="col-md-4 text-center">
					  <img src="{{ URL::to('/')}}/public/assets2/img/cv/mcv3.png" class="img-fluid mcv-img" alt="">
					  <h3 class="mcv-h">Template Name</h3>
					  <a href="#" class="mcv-btn"><span>Use this template</span></a> <br/> <br/> <br/>
					</div>
				  </div>

				  <div class="row pt-5">
					<div class="col-md-4 text-center">
					  <img src="{{ URL::to('/')}}/public/assets2/img/cv/mcv4.png" class="img-fluid mcv-img" alt="">
					  <h3 class="mcv-h">Template Name</h3>
					  <a href="#" class="mcv-btn"><span>Use this template</span></a> <br/> <br/> <br/>
					</div>
					<div class="col-md-4 text-center">
					  <img src="{{ URL::to('/')}}/public/assets2/img/cv/mcv5.png" class="img-fluid mcv-img" alt="">
					  <h3 class="mcv-h">Template Name</h3>
					  <a href="#" class="mcv-btn"><span>Use this template</span></a> <br/> <br/> <br/>
					</div>
					<div class="col-md-4 text-center">
					  <img src="{{ URL::to('/')}}/public/assets2/img/cv/mcv6.png" class="img-fluid mcv-img" alt="">
					  <h3 class="mcv-h">Template Name</h3>
					  <a href="#" class="mcv-btn"><span>Use this template</span></a> <br/> <br/> <br/>
					</div>
				  </div>
				</div>
			</div>
		  </div>
		</div>

        <!-- Codebase Core JS -->
        @yield('script')

          <script>
          //$('input:radio:checked').attr('name'),

           jQuery(document).ready(function(){
                 $.ajaxSetup({headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                      $('input[type="radio"]').click(function(e){
                          //e.preventDefault();
                           var input_name = $(this).attr('name');
                           var input_val = $(this).attr('value');
                           $.ajax({
                           type:'POST',
                           url:'{{ URL::to('/')}}/update-resume/{{ Request::segment(2) }}',
                          data:{input_name:input_name,input_val:input_val},
                         success:function(data){
                           window.location.reload();
                         //alert(data.success);
                       }
                     });

               });
           });
         </script>
    </body>
</html>
