<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ URL::to('/')}}/public/assets/css/normalize.css">
    <link rel="stylesheet" href="{{ URL::to('/')}}/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::to('/')}}/public/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::to('/')}}/public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{ URL::to('/')}}/public/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ URL::to('/')}}/public/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ URL::to('/')}}/public/assets/scss/style.css">
    <link href="{{ URL::to('/')}}/public/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v4.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>
      .logo {
        background: #00a5a9bf;
        position: relative;
        padding: 20px 15px;
        z-index: 4;
      }
      .navbar-brand, .navbar-brand:hover {
          background: transparent;
          display: block;
          position: relative;
          z-index: 2;
          color: #fff;
          text-align: center;
          margin: 0;
      }
      .menutoggle {
        z-index: 5;
      }
      .btn-round {
          border-radius: 30px;
          background: linear-gradient(#fcd801,#ffae00)!important;
          color: #000!important;
          border: 1px solid #ffae00!important;
          padding-left: 1.5rem!important;
          padding-right: 1.5rem!important;
      }
      .right-panel header.header {
        padding-top: 30px;
      }
      .user-area .user-menu {
        border: 1px solid darkgrey;
      }
      .left-panel{
        background: #00a5a9;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.29);
      }
      .navbar {
        height: auto;
      }
      .nav-item{
        margin-right: 10px;
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
    </style>
  </head>
<body>
<?php   $active_url = explode("/", request()->path())[0];?>
        <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <div class="logo">  
          <a class="navbar-brand thin-none" href="{{ URL::to('/')}}"><img class="img-fluid" src="http://cv.cpixels.me/public/img/logo-1.png"></a>
          <a class="navbar-brand hidden" href="{{ URL::to('/')}}">CV</a>
        </div>
        <nav class="navbar navbar-expand-sm navbar-default" >
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class={{'dashbord' == request()->path() ? 'active' : ''}}>
                        <a href="{{ URL::to('/')}}/home"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                  <!-- /.menu-title -->
                  <li class="menu-item-has-children dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Tabrez</a>
                      <ul class="sub-menu children dropdown-menu">
                          <li class={{'role-register' == request()->path() ? 'active' : ''}}><i class="menu-icon fa fa-map-o"></i><a href="{{ URL::to('/')}}/home">My Resumes</a></li>
                          <li class={{'add-register' == request()->path() ? 'active' : ''}}><i class="menu-icon fa fa-street-view"></i><a href="{{ URL::to('/')}}/preview-resume/{{ Request::segment(2) }}">Download</a></li>
                            <li class={{'add-register' == request()->path() ? 'active' : ''}}><i class="menu-icon fa fa-street-view"></i><a href="{{ URL::to('/')}}/">Upgrade</a></li>
                      </ul>
                  </li>
                  <?php
                    if(Request::segment(1)=='edit-cv')
                    {
                      $cv_id = Request::segment(2);
                      Request::session()->put('cv_id', $cv_id);
                    }
                   $cv_id_session =  session('cv_id');
                   $sections = DB::table('section')->where('status','1')->get();  ?>
                  <li class={{'edit-cv' == $active_url ? 'active' : ''}}>
                      <a href="{{ URL::to('/')}}/edit-cv/{{ $cv_id_session }}"> <i class="menu-icon fa fa-user"></i>Personal Info </a>
                  </li>
                  <li class={{'edit-summary' == $active_url ? 'active' : ''}}>
                      <a href="{{ URL::to('/')}}/edit-summary/{{ $cv_id_session }}"> <i class="menu-icon fa fa-file-text"></i>Summary</a>
                  </li>
                    <?php $cv_id = Request::segment(2) ;
                     $cv_section = DB::table('cv_section')->where('cv_id',$cv_id_session)->orderByRaw('name ASC')->get();   ?>
                    @foreach ($cv_section as $cv_sec)
                      <li class={{ $cv_sec->url == $active_url ? 'active' : ''}}>
                      <a href="{{ URL::to('/')}}/{{$cv_sec->url}}/{{$cv_id_session }}?cv_section_id={{$cv_sec->id}}"> <i class="menu-icon fa {{$cv_sec->icon}}"></i> {{$cv_sec->name}} </a>
                  </li>
                      @endforeach
                                <li class={{'skills' == request()->path() ? 'active' : ''}}>
                <a  href="javascript:void(0)"  class="btn btn-primary drk-bg  float-left" data-toggle="modal" data-target="#sectionModal"><i class="fa fa-plus"></i> Add New  Section </a>
                  </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
        <!--<div class="sidebar-background" style="background-image: url(https://demos.creative-tim.com/material-dashboard/assets/img/sidebar-1.jpg);"></div>-->
    </aside><!-- /#left-panel -->
    <!-- Left Panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
          <div class="header-menu">
            <div class="col-sm-7">
              <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
              <div class="header-left">
                <!--<i class=" fa-file-edit"></i>  <a  href="{{ URL::to('/')}}/change-templet/{{ $cv_id_session  }}" class="btn btn-primary  ml-1 float-left">  Change Templet</a>
                <i class="fal fa-file-edit"></i>
                  <a  href="{{ URL::to('/')}}/preview-resume/{{ $cv_id_session  }}" class="btn btn-primary btn-blue ml-1 float-left">  Preview &amp; Download </a>-->
                <ul class="nav">
                  <li class="nav-item nav-menu-item active" id="tab-content">
                    <a class="nav-link" href="{{ URL::to('/')}}/edit-cv/{{ $cv_id_session }}">
                      <i class="fa fa-pencil"></i> Content
                    </a>
                  </li>
                  <li class="nav-item nav-menu-item" id="tab-template">
                    <a class="nav-link" href="{{ URL::to('/')}}/change-templet/{{ $cv_id_session }}">
                      <i class="fa fa-address-card"></i> Change Template
                    </a>
                  </li>
                  <li class="nav-item nav-menu-item" id="tab-preview">
                    <a class="nav-link" href="{{ URL::to('/')}}/preview-resume/{{ $cv_id_session }}">
                      <i class="fa fa-cloud-download"></i> Preview & Download
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-sm-5">
              <div class="user-area dropdown float-right" style="margin-left: 30px; line-height: 2.5">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>&nbsp;
                    {{ Auth::user()->name }}
                  </a>
                  <div class="user-menu dropdown-menu">
                          <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ URL::to('/')}}/home"><i class="fa fa- user"></i>Dashbord</a>
                            <a class="nav-link" href="{{ URL::to('/')}}/profile"><i class="fa fa- user"></i>My Profile</a>
                            <a class="nav-link" href="{{ URL::to('/')}}/contact"><i class="fa fa- user"></i>Contact Us </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                          <a class="nav-link" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="fa fa-power -off"></i>  {{ __('Logout') }}</a>
                                            @if (Config::get('app.locale') == 'en') <a class="nav-link"  href="{{ URL::to('/')}}/lang/ar">العربية</a>
                                          @elseif (Config::get('app.locale') == 'ar')<a class="nav-link"  href="{{ URL::to('/')}}/lang/en"> English</a>
                                            @endif
                      </li>
                  </div>
              </div>
              <button class="btn btn-success  ml-5 float-right btn-round">Upgrade <i class="fa fa-rocket"></i></button>
            </div>
          </div>
        </header><!-- /header -->
        <!-- Header-->
        <form action="{{ URL::to('/')}}/save-experience" method="post" novalidate="novalidate">
            {{ csrf_field()}}
            {{ method_field('PUT')}}
        <div class="modal fade" id="sectionModal" tabindex="-1" role="dialog" aria-labelledby="sectionModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document2">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="sectionModalLabel">ADD  new  section </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body flex-box">
                <?php  $sections = DB::table('section')->where('status','1')->get();  ?>
                  @foreach ($sections as $section)
                   <div class="col-md-6 border">
                   <a href="{{ URL::to('/')}}/{{$section->url}}/{{ Request::segment(2) }}?section_id={{ $section->id }}">
                     <label  class="col-form-label"> <i class="menu-icon fa {{$section->icon}}"></i> {{ $section->name_en}} </label>
                     <p  class="col-para"> {{ $section->description_en}}</p>
                   </a>
                  </div>
                  @endforeach
              </div>
            </div>
          </div>
        </div>
        </form>
  @yield('content')
       <!-- .content -->
    <!-- /#right-panel -->
    <!-- Right Panel -->
  @yield('script')
</body>
</html>
