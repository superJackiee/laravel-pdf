@extends('layouts.cv')
@section('title')
Personal Info
@endsection
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Let’s start with your header</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{URL::to('/')}}/dashbord">Dashboard</a></li>
                    <li class="active">Personal Info</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><i class="menu-icon fa fa-user"></i> Personal Info</div>
                    </div>
                    <form action="{{ URL::to('/')}}/edit-personal-info/{{$cv->id}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="card-body">
                            <!-- Credit Card -->

                            <div>

                                <div class="card-body">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" onchange="readURL(this)" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <?php
                                            if ($cv->photo != '') {
                                                $url_photo = URL::to('/public/thumbnail/' . $cv->photo);
                                            } else {
                                                $url_photo = URL::to('/public/thumbnail/rsz_profile-placeholder.png');
                                            } ?>
                                            <div id="imagePreview" style="background-image: url(<?php echo $url_photo; ?>);">
                                            </div>
                                        </div>
                                        <div class="text-center mt-4"><span class="font-medium-2 text-uppercase"> {{$cv->name}} </span>
                                            <p class="grey font-small-3">{{$cv->job_tittle}}</p>
                                        </div>
                                    </div>
                                    @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                    @endif


                                    {{ csrf_field()}}
                                    {{ method_field('PUT')}}
                                    <input type="hidden" name="cv_id" id="cv_id" value="{{$cv->id}}" />
                                    <div class="row info-fld_group">
                                        <div class="form-group col-md-6">
                                            <label class="control-label mb-1"> Name</label>
                                            <input id="name" name="name" type="text" value="{{$cv->name}}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label mb-1"> Email</label>
                                            <input id="email" name="email" type="text" value="{{$cv->email}}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label mb-1"> Professional Title</label>
                                            <input id="job_tittle" name="job_tittle" type="text" value="{{$cv->job_tittle}}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label mb-1">Nationality </label>
                                            <input id="nationality" name="nationality" type="text" value="{{$cv->nationality}}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label mb-1"> Date of Birth</label>
                                            <input id="dob" name="dob" type="text" value="{{$cv->dob}}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label mb-1"> Marital Status</label>
                                            <input id="marital_status" name="marital_status" type="text" value="{{$cv->marital_status}}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label mb-1"> Phone Numbe</label>
                                            <input id="mobile_number" name="mobile_number" type="text" value="{{$cv->mobile_number}}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label mb-1"> Address</label>
                                            <input id="address" name="address" type="text" value="{{$cv->address}}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label mb-1"> URL</label>
                                            <input id="ulr" name="ulr" type="text" value="{{$cv->ulr}}" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Submit</button></div>

                                </div>
                            </div>

                        </div>
                    </form>
                </div> <!-- .card -->

            </div>
            <!--/.col-->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><i class="fa fa-file-image-o"></i> TEMPLATE: </div>
                    </div>
                    <div class="card-body">
                        <p> Templete Name </p>
                        <a href="{{ URL::to('/')}}/change-templet/{{ Request::segment(2) }}" class="btn btn-primary m-1 "> Change Template </a>
                        <a href="{{ URL::to('/')}}/preview-resume/{{ Request::segment(2) }}" class="btn btn-primary btn-blue   "> Preview & Download </a>



                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->


</div>
@endsection
@section('script')
<script src="{{ URL::to('/')}}/public/assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="{{ URL::to('/')}}/public/assets/js/popper.min.js"></script>
<script src="{{ URL::to('/')}}/public/assets/js/plugins.js"></script>
<script src="{{ URL::to('/')}}/public/assets/js/main.js"></script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                jQuery('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                jQuery('#imagePreview').hide();
                jQuery('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // jQuery(window).bind('beforeunload', function(event){
    //     event.preventDefault();
    //     return "If you leave this page, you will lose any unsaved changes.";
    //     // var cv_id = jQuery('#cv_id').val();
    //     // jQuery.ajax({
    //     //   type:'POST',
    //     //   url:'/edit-personal-info-ajax/'+cv_id,
    //     //   data:{ _token: '{{csrf_token()}}' },
    //     //   success:function(data) {
    //     //         console.log(cv_id);
    //     //   }
    //     // });
    // });

    /*$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });*/

    var cv_id;
    jQuery(document).ready(function() {
        jQuery(".nav-menu-item").removeClass("active");
        jQuery("#tab-content").addClass("active");

        cv_id = jQuery('#cv_id').val();

        jQuery("#name").change(function() {
            var name = jQuery("#name").val();
            jQuery.ajax({
                type: 'POST',
                url: '{{ URL::to('/')}}/autosave-personal-info-ajax/' + cv_id,
                data: {
                    name: name,
                },
                success: function(data) {
                    console.log(cv_id);
                }
            });
        });

        jQuery("#email").change(function() {
            var email = jQuery("#email").val();
            jQuery.ajax({
                type: 'POST',
                url: '{{ URL::to('/')}}/autosave-personal-info-ajax/' + cv_id,
                data: {
                    email: email,
                },
                success: function(data) {
                    console.log(cv_id);
                }
            });
        });

        jQuery("#job_tittle").change(function() {
            var job_tittle = jQuery("#job_tittle").val();
            jQuery.ajax({
                type: 'POST',
                url: '{{ URL::to('/')}}/autosave-personal-info-ajax/' + cv_id,
                data: {
                    job_tittle: job_tittle,
                },
                success: function(data) {
                    console.log(cv_id);
                }
            });
        });

        jQuery("#nationality").change(function() {
            var nationality = jQuery("#nationality").val();
            jQuery.ajax({
                type: 'POST',
                url: '{{ URL::to('/')}}/autosave-personal-info-ajax/' + cv_id,
                data: {
                    nationality: nationality,
                },
                success: function(data) {
                    console.log(cv_id);
                }
            });
        });

        jQuery("#dob").change(function() {
            var dob = jQuery("#dob").val();
            jQuery.ajax({
                type: 'POST',
                url: '{{ URL::to('/')}}/autosave-personal-info-ajax/' + cv_id,
                data: {
                    dob: dob,
                },
                success: function(data) {
                    console.log(cv_id);
                }
            });
        });

        jQuery("#marital_status").change(function() {
            var marital_status = jQuery("#marital_status").val();
            jQuery.ajax({
                type: 'POST',
                url: '{{ URL::to('/')}}/autosave-personal-info-ajax/' + cv_id,
                data: {
                    marital_status: marital_status,
                },
                success: function(data) {
                    console.log(cv_id);
                }
            });
        });

        jQuery("#mobile_number").change(function() {
            var mobile_number = jQuery("#mobile_number").val();
            jQuery.ajax({
                type: 'POST',
                url: '{{ URL::to('/')}}/autosave-personal-info-ajax/' + cv_id,
                data: {
                    mobile_number: mobile_number,
                },
                success: function(data) {
                    console.log(cv_id);
                }
            });
        });

        jQuery("#address").change(function() {
            var address = jQuery("#address").val();
            jQuery.ajax({
                type: 'POST',
                url: '{{ URL::to('/')}}/autosave-personal-info-ajax/' + cv_id,
                data: {
                    address: address,
                },
                success: function(data) {
                    console.log(cv_id);
                }
            });
        });

        jQuery("#ulr").change(function() {
            var ulr = jQuery("#ulr").val();
            jQuery.ajax({
                type: 'POST',
                url: '{{ URL::to('/')}}/autosave-personal-info-ajax/' + cv_id,
                data: {
                    ulr: ulr,
                },
                success: function(data) {
                    console.log(cv_id);
                }
            });
        });

    });
</script>

@endsection