<!DOCTYPE html>
<html class="scheme_original" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Blog')  }}</title>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<meta content="telephone=no" name="format-detection">
<link href="http://fonts.googleapis.com/css?family=Poppins:300,300italic,400,400italic,500,500italic,600,600italic,700,700italic%7CLora:300,300italic,400,400italic,500,500italic,600,600italic,700,700italic&amp;subset=latin,latin-ext&amp;"
    media="all" property="stylesheet" rel="stylesheet" type="text/css">

<!--begin::Global Theme Styles(used by all pages)
<link href="{{ asset('public/assets-metronic/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets-metronic/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets-metronic/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
--><!--end::Global Theme Styles-->
<!--begin::Layout Themes(used by all pages)
<link href="{{ asset('public/assets-metronic/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets-metronic/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets-metronic/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets-metronic/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
--><!--end::Layout Themes-->
<link href="{{ asset('public/css/fontello/css/fontello.css') }}" media="all" property="stylesheet" rel="stylesheet" type="text/css">
<link href="{{ asset('public/css/style.css') }}" media="all" property="stylesheet" rel="stylesheet" type="text/css">
<link href="{{ asset('public/css/colors.css') }}" media="all" property="stylesheet" rel="stylesheet" type="text/css">
<link href="{{ asset('public/css/bootstrap.css')}}" media="all" property="stylesheet" rel="stylesheet" type="text/css">
<link href="{{ asset('public/css/responsive.css') }}" media="all" property="stylesheet" rel="stylesheet" type="text/css">
<link href="{{ asset('public/images/favi.png') }}') }}" rel="icon" sizes="192x192">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<script src="{{ asset('public/js/vendor/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/vendor/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/vendor/bootstrap.min.js') }}" type="text/javascript"></script>
</head>
<body @if ( Config::get('app.locale') == 'ar') dir="rtl" @endif class="body_style_wide body_filled scheme_original top_panel_show top_panel_over sidebar_hide sidebar_outer_show sidebar_outer_yes top_panel_fixed">
<div id="page_preloader"></div>
<div class="body_wrap">
  <div class="page_wrap">
     <header class="top_panel_wrap top_panel_style_3 scheme_original">
      <div class="top_panel_wrap_inner top_panel_inner_style_3 top_panel_position_over">
        <div class="top_panel_middle">
          <div class="content_wrap">
            <div class="menu_pushy_wrap"> <a class="menu_pushy_button icon-1460034782_menu2" href="#"></a> </div>
            <div class="contact_logo">
              <div class="logo"> <a href="{{ url('/') }}"> <img alt="" class="logo_main" src="{{ asset('public/img/logo-1.png') }}"> <img alt="" class="logo_fixed" src="{{ asset('public/img/logo-2.png') }}"></a> </div>
            </div>
            <div class="menu_main_wrap">
              <nav class="menu_main_nav_area menu_hover_fade">
                <ul class="menu_main_nav" id="menu_main">
                     @guest

                @if (Route::has('register'))

                  <li class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children">
                  <a href="{{ route('register') }}" class="cr"><span>Create Resume </span></a>
                   </li>
                   <li class="menu-item current-menu-ancestor ">
                  <a href="{{ route('login') }}"><span>{{ __('msg.login') }}</span></a>
                    </li>
                   @endif
                   @else
                   <li class="menu-item current-menu-ancestor ">
                  <a href="{{ route('home') }}"><span>{{ __('msg.my_account') }} </span></a>
                    </li>
                     <li class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children">
                     <a href="{{ route('register') }}"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><span>  {{ __('msg.logout') }}</span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                      </li>
                       @if (Config::get('app.locale') == 'ar')  <li class="menu-item"> <a href="lang/en"><span>English</span></a> </li>
                        @elseif (Config::get('app.locale') == 'en')<li class="menu-item"> <a href="lang/ar"><span> العربية</span></a> </li>
                           @endif
                  <li class="menu-item menu-item-has-children"> <a class="social_icons" href="#" target="_blank"><span class="icon-user-light"></span></a> </li>

                       @endguest
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </header>
    <nav class="menu_pushy_nav_area pushy pushy-left scheme_dark">
      <div class="pushy_inner"> <a class="close-pushy" href="#"></a>
        <div class="sidebar_outer widget_area scheme_dark">
          <div class="sidebar_outer_inner widget_area_inner">
            <div class="sidebar_outer_widgets">
              <aside class="widget widget_socials">
                <h5 class="widget_title" style="margin-top:-0.5em;"> <i class="icon-user-light bord"></i> Mr. XYZ </h5>
                <div class="widget_inner">
                  <div class="logo_descr"> <br>
                    <ul class="sc_list sc_list_style_iconed custom_cl_1">
                      <li class="sc_list_item"><a href="#">abc</a></li>
                      <li class="sc_list_item"><a href="#">def</a></li>
                      <li class="sc_list_item"><a href="#">hij</a></li>
                      <li class="sc_list_item"><a href="#">xyz</a></li>
                    </ul>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </nav>

            <div class="site-overlay"></div>
            <div class="header_mobile header_mobile_style_3">
                <div class="content_wrap">
                    <div class="menu_button icon-menu"></div>
                    <div class="logo">
                        <a href="index-2.html"><img alt="" class="logo_main" src="{{ asset('public/img/logo-2.png') }}"></a>
                    </div>
                </div>
                <div class="side_wrap">
                    <div class="close">
                        Close
                    </div>
                    <div class="panel_top">
                        <nav class="menu_main_nav_area">
                            <ul class="menu_main_nav" id="menu_mobile">
                                <li class="menu-item">
                                    <a href="#" class="cr"><span>Create Resume</span></a>
                                </li>
                                <li class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children">
                                    <a href="#"><span>EN</span></a>
                                    <ul class="sub-menu">
                                        <li class="menu-item">
                                          <a href="service.html"><span>French</span></a>
                                        </li>
                                        <li class="menu-item">
                                           <a href="service.html"><span>German</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="service.html"><span>Spanish</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="service.html"><span> العربية</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a href="gallery.html"><span class="icon-user-light"></span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="mask"></div>
            </div>
  @yield('content')

  <div class="container-fluid top-footer">
    <div class="container">
       <div class="row">
            <div class="col-md-2">
              <img class="img-fluid t-center pb-5" src="{{ asset('public/img/cv-footer.png') }}" alt="">
            </div>

            <div class="col-md-10">
              <div class="row">
                <div class="col-md-3">
                  <p> <a href="#" class="orange fs-22">Main Menu</a> </p>
                  <p> <a href="#" class="top-footer-link">Builder</a> </p>
                  <p> <a href="#" class="top-footer-link">Template</a> </p>
                  <p> <a href="#" class="top-footer-link">Examples</a> </p>
                  <p> <a href="#" class="top-footer-link">How to write a Resume</a> </p>
                </div>

                <div class="col-md-3">
                  <p> <a href="#" class="orange fs-22">Resume</a> </p>
                  <p> <a href="#" class="top-footer-link">Builder</a> </p>
                  <p> <a href="#" class="top-footer-link">Template</a> </p>
                  <p> <a href="#" class="top-footer-link">Examples</a> </p>
                  <p> <a href="#" class="top-footer-link">How to write a Resume</a> </p>
                </div>

                <div class="col-md-3">
                  <p> <a href="#" class="orange fs-22">CV</a> </p>
                  <p> <a href="#" class="top-footer-link">Builder</a> </p>
                  <p> <a href="#" class="top-footer-link">Template</a> </p>
                  <p> <a href="#" class="top-footer-link">Examples</a> </p>
                  <p> <a href="#" class="top-footer-link">How to write a Resume</a> </p>
                </div>

                <div class="col-md-3">
                  <p> <a href="#" class="orange fs-22">Cover Letter</a> </p>
                  <p> <a href="#" class="top-footer-link">Builder</a> </p>
                  <p> <a href="#" class="top-footer-link">Template</a> </p>
                  <p> <a href="#" class="top-footer-link">Examples</a> </p>
                  <p> <a href="#" class="top-footer-link">How to write a Resume</a> </p>
                </div>

              </div>
            </div>

      </div>
   </div>
  </div>

  <div class="copyright_wrap copyright_style_soc scheme_dark">
    <div class="copyright_wrap_inner">
      <div class="container">
       <div class="row">
        <div class="col-md-12">
          <div class="leftf fs-14">Copyright © 2020 <a class="social_icons" href="#" target="_blank">CV Website</a></div>
          <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_tiny" style="float:right; display: flex">
            <div class="sc_socials_item"> <a class="social_icons social_facebook" href="#" target="_blank"> <span class="icon-facebook"></span></a> </div>
            <div class="sc_socials_item"> <a class="social_icons social_twitter" href="#" target="_blank"> <span class="icon-twitter"></span></a> </div>
            <div class="sc_socials_item"> <a class="social_icons social_instagramm" href="#" target="_blank"> <span class="icon-instagramm"></span></a> </div>
          </div>
        </div>
       </div>
    </div>
    </div>
  </div>
  </div>
  <!-- /.page_wrap -->
</div>
<!-- /.body_wrap -->

</div>
<!-- /.popup_login -->
<div class="popup_wrap_bg"></div><a class="scroll_to_top icon-up" href="#" title="Scroll to top"></a>
<script src="{{ asset('public/js/custom/custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/vendor/slick.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/vendor/superfish.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/custom/_min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/custom/_utils.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/custom/_init.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/custom/_debug.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/custom/template.init.js') }}" type="text/javascript"></script>
<!--begin::Global Theme Bundle(used by all pages)-->
<!--<script src="{{ asset('public/assets-metronic/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('public/assets-metronic/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('public/assets-metronic/js/scripts.bundle.js') }}"></script>-->
<!--end::Global Theme Bundle-->
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

</body>
</html>
