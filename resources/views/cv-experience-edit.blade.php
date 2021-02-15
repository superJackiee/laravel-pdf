@extends('layouts.cv')

@section('title')
experience
@endsection

@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
       <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">experience </strong>
                </div>
                <div class="card-body">
                  <!-- Credit Card -->
                  <div>
                      <div class="card-body">
                            <form action="{{ URL::to('/')}}/edit-experience/{{$cv->id}}" method="post" novalidate="novalidate">
                              {{ csrf_field()}}
                              {{ method_field('PUT')}}
                              <div class="form-group">
                                  <label class="control-label mb-1">Position/Job Title</label>
                                  <input id="position_or_job_title" name="position_or_job_title"  type="text"  value="{{$cv->position_or_job_title}}" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label class="control-label mb-1">Company Name</label>
                                  <input id="company_name" name="company_name"  type="text"  value="{{$cv->company_name}}" class="form-control" >
                              </div>
                              <div class="form-group">
                                  <label class="control-label mb-1"> Start Date</label>
                                  <input id="start_date" name="start_date"  type="text"  value="{{$cv->start_date}}" class="form-control"  >
                                </div>
                                <div class="form-group">
                                  <label class="control-label mb-1">End Date </label>
                                  <input id="end_date" name="end_date"  type="text"  value="{{$cv->end_date}}" class="form-control"  >
                              </div>
                              <div class="form-group">
                                  <label class="control-label mb-1">City , Country</label>
                                  <input id="city_country" name="city_country"  type="text"  value="{{$cv->city_country}}" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label class="control-label mb-1"> responsibilities</label>
                                  <textarea id="responsibilities" name="responsibilities"  class="form-control" >{{$cv->responsibilities}}</textarea>
                              </div>

                        <div class="form-actions form-group">
                          <input hidden name="cv_id" value="{{$cv->cv_id}}">
                          <button type="submit" name='submit' class="btn btn-success btn-sm">Submit</button>
                        </div>
                          </form>
                      </div>
                  </div>

                </div>
            </div> <!-- .card -->

          </div><!--/.col-->


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
<link rel="stylesheet" href="{{ URL::to('/')}}/public/assets/css/jquery-ui.css">
<script src="{{ URL::to('/')}}/public/assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="{{ URL::to('/')}}/public/assets/js/jquery-ui.js"></script>
  <script>
  var id;
  $( function() {
    $( "#start_date" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
    $( "#end_date" ).datepicker({
      changeMonth: true,
      changeYear: true
    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    id = "{{$cv->id}}";
    jQuery("#position_or_job_title").change(function() {
        var position_or_job_title = jQuery("#position_or_job_title").val();
        jQuery.ajax({
            type: 'POST',
            url: '{{ URL::to('/')}}/autoupdate-experience-ajax/' + id,
            data: {
              position_or_job_title: position_or_job_title,
              _token: '{{csrf_token()}}'
            },
            success: function(data) {
                console.log(id);
            }
        });
    });

    jQuery("#company_name").change(function() {
        var company_name = jQuery("#company_name").val();
        jQuery.ajax({
            type: 'POST',
            url: '{{ URL::to('/')}}/autoupdate-experience-ajax/' + id,
            data: {
              company_name: company_name,
              _token: '{{csrf_token()}}'
            },
            success: function(data) {
                console.log(id);
            }
        });
    });

    jQuery("#start_date").change(function() {
        var start_date = jQuery("#start_date").val();
        jQuery.ajax({
            type: 'POST',
            url: '{{ URL::to('/')}}/autoupdate-experience-ajax/' + id,
            data: {
              start_date: start_date,
              _token: '{{csrf_token()}}'
            },
            success: function(data) {
                console.log(id);
            }
        });
    });

    jQuery("#end_date").change(function() {
        var end_date = jQuery("#end_date").val();
        jQuery.ajax({
            type: 'POST',
            url: '{{ URL::to('/')}}/autoupdate-experience-ajax/' + id,
            data: {
              end_date: end_date,
              _token: '{{csrf_token()}}'
            },
            success: function(data) {
                console.log(id);
            }
        });
    });

    jQuery("#city_country").change(function() {
        var city_country = jQuery("#city_country").val();
        jQuery.ajax({
            type: 'POST',
            url: '{{ URL::to('/')}}/autoupdate-experience-ajax/' + id,
            data: {
              city_country: city_country,
              _token: '{{csrf_token()}}'
            },
            success: function(data) {
                console.log(id);
            }
        });
    });

    jQuery("#responsibilities").change(function() {
        var responsibilities = jQuery("#responsibilities").val();
        jQuery.ajax({
            type: 'POST',
            url: '{{ URL::to('/')}}/autoupdate-experience-ajax/' + id,
            data: {
              responsibilities: responsibilities,
              _token: '{{csrf_token()}}'
            },
            success: function(data) {
                console.log(id);
            }
        });
    });
  } );
  </script>
@endsection
