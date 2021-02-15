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
        <style>
        #main-container, #page-footer {
   overflow-x: scroll!important;
}
     </style>

    </head>

    <body>
        <!-- Page Container -->
        <div id="page-container" class="side-scroll page-header-modern main-content-boxed">

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
                      <div class="block">
                        <button type="button" class="btn btn-orange ml15" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Save As PDF <i class="fa fa-caret-down ml-5"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                          <!-- <a class="dropdown-item fs-15" href="#"> One Page </a> -->
                           <a class="dropdown-item fs-15" href="{{ URL::to('/')}}/download-resume/{{ Request::segment(2) }}"> A4 Size </a>
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
                        <div class="content-header content-header-fullrow px-15">
                            <!-- Mini Mode -->
                            <div class="content-header-section sidebar-mini-visible-b">
                                <!-- Logo -->
                                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                                </span>
                                <!-- END Logo -->
                            </div>
                            <!-- END Mini Mode -->

                            <!-- Normal Mode -->
                            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                                <!-- Close Sidebar, Visible only on mobile screens -->
                                <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                                	<!--<button type="button" class="btn side-btn f-right mob-dis" data-toggle="layout" data-action="sidebar_close">
                                    X
                                </button>-->
                                <!-- END Close Sidebar -->

                                <!-- Logo -->
                                <div class="content-header-item">
                                    <h3 class="side-h3">Resume Customizer</h3>
                                    <h4 class="side-h4">Customize & Preview in Real Time</h4>
                                </div>
                                <!-- END Logo -->
                            </div>
                            <!-- END Normal Mode -->
                        </div>
                        <!-- END Side Header -->
                        <!-- Side Navigation -->
                        <div class="content-side content-side-full">
							<div class="row sp15">
							  <div class="col-md-12">
								<h3 class="side-h3 mt34">Template</h3>
							  </div>
							  <div class="col-md-6 d-in">
								<a href="#" class="side-a">
                  <?php  $resume_templet = DB::table('resume_templet')->where('id',$cv['personal_info']->resume_templet_id)->get();  ?>
                  {{ $resume_templet[0]->name_en }}</a><br>
								<a href="#" class="side-a">
                 <?php if($cv['personal_info']->resume_language_id =='1'){ echo 'English';} else{ echo 'Arabic';}?>
                </a>
							  </div>
							  <div class="col-md-6 d-in">
								<a href="{{ URL::to('/')}}/change-templet/{{ Request::segment(2) }}" class="side-btn f-right"><span>Change Template</span></a>
							  </div>
						    </div>
                <div class="row sp15"> <div class="col-md-12"> <p class="side-line"></p> </div> </div>
                <div class="row sp15">
							  <div class="col-md-12">
								<h3 class="side-h3">Color</h3>
							  </div>
							</div>
            <div class="row pt-15 sp15">

              <?php // echo '<pre>'; // print_r($cv_colors); exit;?>

            </div>

    <div class="row sp15"> <div class="col-md-12"> <p class="side-line"></p> </div> </div>
        <div class="row sp15">
              <div class="col-md-12">
              <h3 class="side-h3">Layout</h3>
              </div>
            </div>

            <div class="row sp15">
              <div class="col-md-12">
              <h3 class="column-h pb-3">Column</h3>
              </div>
            </div>
              <div class="row sp15">
              <div class="col-md-6 d-in">
                <label class="container1">
                <input type="radio" id="layout" name="layout" value="2" >
                <span class="colu-bor colu-active"> <span><img src="{{ URL::to('/')}}/public/assets2/img/cv/two-column.png" class="img-fluid mt-5i" alt=""></span> <span class="column-otline">Two Column</span> </span>
              </label>
              </div>
              <div class="col-md-6 d-in">
              <label class="container1">
                <input type="radio" id="layout"  name="layout" value="1" >
                <span class="colu-bor"> <span><img src="{{ URL::to('/')}}/public/assets2/img/cv/one-column.png" class="img-fluid mt-5i" alt=""></span> <span class="column-otline">One Column</span> </span>
              </label>
              </div>
            </div>

            <div class="row sp15">
            <div class="col-md-12 pt36">
            <h3 class="column-h">Change Section Order</h3>
            <p class="fs-12h fw500 gray">Drag and Move section up and down or left and right</p>
            </div>
          </div>
          <?php $cv_id = Request::segment(2) ;
           $cv_section = DB::table('cv_section')->where('cv_id',$cv_id)->orderByRaw('order_by ASC')->get();   ?>
               <div class="row sp15">
          @foreach ($cv_section as $cv_sec)
            <div class="col-md-6 d-in row">
            <span class="fs-13 fw500 gray pr-3">{{$cv_sec->name}} </span>
            <a href="#" class="text-center"> <img src="{{ URL::to('/')}}/public/assets/img/cv/move.png" class="img-fluid" alt=""> </a>
            </div>
              @endforeach
        </div>

            <div class="row sp15"> <div class="col-md-12"> <p class="side-line"></p> </div> </div>
                <div class="row sp15">
                      <div class="col-md-12">
                      <h3 class="side-h3">Font Family</h3>
                      </div>
                    </div>

                      <div class="row sp15">
                      <div class="col-md-3 d-in">
                        <label class="container1">
                        <input type="radio" id="font_style" name="font_style" value="Roboto">
                        <span class="colu-bor colu-active">  <span class="column-otline">Roboto</span></span>
                      </label>
                      </div>
                      <div class="col-md-3 d-in">
                      <label class="container1">
                        <input type="radio" id="font_style"  name="font_style" value="Helvetica Neue" >
                        <span class="colu-bor"><span class="column-otline">Helvetica</span></span>
                      </label>
                      </div>
                      <div class="col-md-2 d-in">
                      <label class="container1">
                        <input type="radio" id="font_style"  name="font_style" value="Arial" >
                        <span class="colu-bor"><span class="column-otline">Arial</span></span>
                      </label>
                      </div>
                      <div class="col-md-4 d-in">
                      <label class="container1">
                        <input type="radio" id="font_style"  name="font_style" value="sans-serif" >
                        <span class="colu-bor"><span class="column-otline">Sans serif</span></span>
                      </label>
                      </div>
                    </div>
                    <div class="row sp15"> <div class="col-md-12"> <p class="side-line"></p> </div> </div>
                        <div class="row sp15">
                              <div class="col-md-12">
                              <h3 class="side-h3">Font Size</h3>
                              </div>
                            </div>

                              <div class="row sp15">
                                <?php for($i=10;$i<=21;$i++){?>
                              <div class="col-md-1 d-in">
                                <label class="container1">
                                <input type="radio" id="font_size" name="font_size" value="<?php echo $i;?>">
                                <span class="colu-bor colu-active">  <span class="column-otline"><?php echo $i;?></span></span>
                              </label>
                              </div>
                                <?php } ?>
                             </div>
               <div class="col-md-2">&nbsp;</div>
            </div>
          <!-- END Side Navigation -->
      </div>
    <!-- Sidebar Content -->
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
                        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                           <img src="{{ URL::to('/')}}/public/assets2/img/cv/brush.png" class="img-fluid" alt="">
                        </button>

                        <button type="button" class="btn btn-circle btn-dual-secondary desk-dis" data-toggle="layout1">
                            <a href="{{ URL::to('/')}}/edit-cv/{{ Request::segment(2) }}" class="">Content</a>
                        </button>

                        <button type="button" class="btn btn-circle btn-dual-secondary desk-dis" data-toggle="modal" data-target="#template">
                             <a href="{{ URL::to('/')}}/change-templet/{{ Request::segment(2) }}" class="">Change Template</a>
                        </button>

                        <button type="button" class="btn btn-circle btn-dual-secondary desk-dis">
                             <a href="#" class="orange">Preview & Download</a>
                        </button>
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="content-header-section">
                        <!-- User Dropdown -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-orange desk-dis" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Save As PDF<i class="fa fa-caret-down ml-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                                <a class="dropdown-item fs-15" href="{{ URL::to('/')}}/download-resume/{{ Request::segment(2) }}">A4 Size </a>
                                <!-- <a class="dropdown-item fs-15" href="#"> A4 Size </a> -->
                            </div>
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
                <div class="content w70">

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
