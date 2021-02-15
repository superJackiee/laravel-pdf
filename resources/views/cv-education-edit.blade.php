@extends('layouts.cv')

@section('title')
Education
@endsection

@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
       <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Education </strong>
                </div>
                <div class="card-body">
                  <!-- Credit Card -->
                  <div>
                      <div class="card-body">
                            <form action="{{ URL::to('/')}}/edit-education/{{$cv->id}}" method="post" novalidate="novalidate">
                              {{ csrf_field()}}
                              {{ method_field('PUT')}}
                                <input id="cv_section_id" name="cv_section_id"  type="hidden"  value="{{$cv->cv_section_id}}" class="form-control" >
                              <div class="form-group">
                                  <label class="control-label mb-1"> Field Of Study</label>
                                  <input id="field_of_study" name="field_of_study"  type="text"  value="{{$cv->field_of_study}}" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label class="control-label mb-1"> School Name /University</label>
                                  <input id="school_university" name="school_university"  type="text"  value="{{$cv->school_university}}" class="form-control" >
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
                                  <label class="control-label mb-1"> Description</label>
                                  <textarea id="description" name="description"  class="form-control" >{{$cv->description}}</textarea>
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
  var isChanged=false;
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
    jQuery("#field_of_study").change(function() {
        var field_of_study = jQuery("#field_of_study").val();
        jQuery.ajax({
            type: 'POST',
            url: '{{ URL::to('/')}}/autoupdate-education-ajax/' + id,
            data: {
              field_of_study: field_of_study,
              _token: '{{csrf_token()}}'
            },
            success: function(data) {
                console.log(id);
            }
        });
    });

    jQuery("#school_university").change(function() {
        var school_university = jQuery("#school_university").val();
        jQuery.ajax({
            type: 'POST',
            url: '{{ URL::to('/')}}/autoupdate-education-ajax/' + id,
            data: {
              school_university: school_university,
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
            url: '{{ URL::to('/')}}/autoupdate-education-ajax/' + id,
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
            url: '{{ URL::to('/')}}/autoupdate-education-ajax/' + id,
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
            url: '{{ URL::to('/')}}/autoupdate-education-ajax/' + id,
            data: {
              city_country: city_country,
              _token: '{{csrf_token()}}'
            },
            success: function(data) {
                console.log(id);
            }
        });
    });

    jQuery("#description").change(function() {
        var description = jQuery("#description").val();
        jQuery.ajax({
            type: 'POST',
            url: '{{ URL::to('/')}}/autoupdate-education-ajax/' + id,
            data: {
              description: description,
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
