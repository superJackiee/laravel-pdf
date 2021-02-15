@extends('layouts.cv')
@section('title')
Education
@endsection
@section('content')
        <div class="content mt-3">
           <div class="animated fadeIn">

              <div class="row">
                <div class="col-md-12">  <form action="{{ url('delete-section/'.Request::segment(2))}}" method="post">
                     {{ csrf_field()}}
                     {{ method_field('delete')}}
                      <input type="hidden" name="cv_section_id" value="{{ app('request')->input('cv_section_id') }}">
                     <input type="hidden" name="url" value="education">
                  <span class="float-right"> <input type="submit" name="submit" value="Delete" class="btn btn-danger float-right m-1"></span>
                </form>
                    <?php     $current_id=Request::segment(1);
                    foreach ($cv_section as $cv_section){    $array[]=$cv_section->url; }
                    // Find the index of the current item
                      $current_index = array_search($current_id, $array);
                     // Find the index of the next/prev items
                     $next = $current_index + 1;
                     $prev = $current_index - 1;
                     if ($prev > 0): ?>
                      <a class="btn btn-primary" href="{{ URL::to('/')}}/<?= $array[$prev] ?>/{{ Request::segment(2) }}?cv_section_id={{ app('request')->input('cv_section_id') }}"><< Previous</a>
                    <?php endif; ?><?php if ($next < count($array)): ?>
                   <a  class="btn btn-primary"  href="{{ URL::to('/')}}/<?= $array[$next] ?>/{{ Request::segment(2) }}?cv_section_id={{ app('request')->input('cv_section_id') }}">Next >></a>
                 <?php endif; ?>
  </div>
                 <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <strong class="card-title">Education</strong> </div>
                        <div class="card-body">
                          @if (session('success'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('success') }}
                              </div>
                          @endif
                          <?php $i=1; ?>
                          @foreach ($education as $education)
                          <div class="clearfix">
                              <span class="float-left m-1">
                                  {{$i}}- <b>  {{ $education->field_of_study }}</b>, {{ $education->school_university }}<br>
                                      {{ $education->start_date }} TO {{ $education->end_date }}  |  {{ $education->city_country }}
                              </span>
                              <hr>

                              <form action="{{ url('delete-education/'.$education->id)}}" method="post">
                                {{ csrf_field()}}
                                {{ method_field('delete')}}
                                 <input type="hidden" name="cv_id" value="{{ $education->cv_id }}">
                                <input type="hidden" name="cv_section_id" value="{{ app('request')->input('cv_section_id') }}">

                             <span class="float-right">  <input type="submit" name="submit" value="Delete" class="btn btn-danger float-right m-1"></span>
                           </form>

                             <span class="float-right m-1"><a href="{{ URL::to('/')}}/edit-education/{{ $education->id }}?cv_section_id={{ app('request')->input('cv_section_id') }}" class="btn btn-primary "> Edit </a></span>
                          </div>
                         <?php $i++ ?>
                          @endforeach
                </div>


              </div>
              <div>
                             <button type="button" class="fa fa-plus btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" >Add(Education)</button>

              </div>
            </div><!-- .animated -->
        </div><!-- .content -->
      </div>

      <form action="{{ URL::to('/')}}/save-education" method="post" novalidate="novalidate">
          {{ csrf_field()}}
          {{ method_field('PUT')}}
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD - Education</h5>
              <button type="button" class="close btn_close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <input type="hidden" name="cv_section_id" id="cv_section_id" value="{{ app('request')->input('cv_section_id') }}">
                  <label  class="col-form-label">Field of study:</label>
                  <input type="text" class="form-control" id="field_of_study" name="field_of_study">
                </div>
                <div class="form-group">
                  <label  class="col-form-label">School Name or University:</label>
                <input type="text" class="form-control" id="school_university" name="school_university">
              </div>
              <div >
                <label class="col-form-label">Start Date:</label>
               <input type="text" class="form-control" id="start_date" name="start_date">
               <label class="col-form-label">End Date:</label>
               <input type="text" class="form-control" id="end_date" name="end_date">
            </div>

          <div class="form-group">
            <label class="col-form-label">City/Country:</label>
          <input type="text" class="form-control" id="city_country" name="city_country">
        </div>
        <div class="form-group">
          <label class="col-form-label">Description:</label>
          <textarea class="form-control" id="description"  name="description"></textarea>
        </div>
              </form>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="cv_id" value="{{ Request::segment(2) }}">
              <button type="button" class="btn btn-secondary btn_close" data-dismiss="modal">Close</button>
              <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>
          </div>
        </div>
      </div>
      <link rel="stylesheet" href="{{ URL::to('/')}}/public/assets/css/jquery-ui.css">
      <script src="{{ URL::to('/')}}/public/assets/js/vendor/jquery-2.1.4.min.js"></script>
        <script src="{{ URL::to('/')}}/public/assets/js/jquery-ui.js"></script>
        <script>
        $( function() {
          $( "#start_date" ).datepicker({
            changeMonth: true,
            changeYear: true
          });
          $( "#end_date" ).datepicker({
            changeMonth: true,
            changeYear: true
          });
        } );
        </script>
      </form>
      @endsection
      @section('script')
      <script src="{{ URL::to('/')}}/public/assets/js/vendor/jquery-2.1.4.min.js"></script>
      <script src="{{ URL::to('/')}}/public/assets/js/popper.min.js"></script>
      <script src="{{ URL::to('/')}}/public/assets/js/plugins.js"></script>
      <script src="{{ URL::to('/')}}/public/assets/js/main.js"></script>
      <script type="text/javascript">
      var cv_id;
      var isChanged=false;
      jQuery(document).ready(function() {
          cv_id = "{{ $education->cv_id }}";

          jQuery(".btn_close").click(function(){
            if(!isChanged) return;
            jQuery.ajax({
                type: 'POST',
                url: '{{ URL::to('/')}}/autosave-education-ajax/' + cv_id,
                data: {
                  cv_section_id: jQuery("#cv_section_id").val(),
                  field_of_study: jQuery("#field_of_study").val(),
                  school_university: jQuery("#school_university").val(),
                  start_date: jQuery("#start_date").val(),
                  end_date: jQuery("#end_date").val(),
                  city_country: jQuery("#city_country").val(),
                  description: jQuery("#description").val(),
                  _token: '{{csrf_token()}}'
                },
                success: function(data) {
                    console.log(cv_id);
                }
            });
          });

          jQuery("#field_of_study").change(function() {
              var field_of_study = jQuery("#field_of_study").val();
              if (field_of_study == '') return;
              isChanged=true;
          });

          jQuery("#school_university").change(function() {
              var school_university = jQuery("#school_university").val();
              if (school_university == '') return;
              isChanged=true;
          });

          jQuery("#start_date").change(function() {
              var start_date = jQuery("#start_date").val();
              if (start_date == '') return;
              isChanged=true;
          });

          jQuery("#end_date").change(function() {
              var end_date = jQuery("#end_date").val();
              if (end_date == '') return;
              isChanged=true;
          });

          jQuery("#city_country").change(function() {
              var city_country = jQuery("#city_country").val();
              if (city_country == '') return;
              isChanged=true;
          });

          jQuery("#description").change(function() {
              var description = jQuery("#description").val();
              if (description == '') return;
              isChanged=true;
          });
 
      });
      </script>
      @endsection
