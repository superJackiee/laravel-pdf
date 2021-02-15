@extends('layouts.cv')
@section('title')
languages
@endsection
@section('content')

        <div class="content mt-3">
           <div class="animated fadeIn">
              <div class="row">
                <div class="col-md-12">  <form action="{{ url('delete-section/'.Request::segment(2))}}" method="post">
                     {{ csrf_field()}}
                     {{ method_field('delete')}}
                      <input type="hidden" name="cv_section_id" value="{{ app('request')->input('cv_section_id') }}">
                     <input type="hidden" name="url" value="languages">
                  <span class="float-right"> <input type="submit" name="submit" value="Delete" class="btn btn-danger float-right m-1"></span>
                </form>
                    <?php      $current_id=Request::segment(1);
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
                      <div class="card-header"><strong class="card-title">Languages</strong> </div>
                        <div class="card-body">
                          @if (session('success'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('success') }}
                              </div>
                          @endif
                          <?php $i=1; ?>
                            <style>.checked { color: orange;}</style>
                          @foreach ($languages as $languages)
                          <div class="clearfix">
                              <span class="float-left m-1">
                                  {{ $i }} - <b>  {{ $languages->name}}</b>
                                  <?php for($j=1; $j<=5;$j++){
                                    $checked='';
                                     if($j <= $languages->rating){
                                     $checked ='checked';
                                     }
                                      echo '<span class="fa fa-circle  '.$checked.'" ></span>  ';

                                  }?>


                              </span>
                              <hr>

                              <form action="{{ url('delete-languages/'.$languages->id)}}" method="post">
                                {{ csrf_field()}}
                                {{ method_field('delete')}}
                                <input type="hidden" name="cv_id" value="{{ $languages->cv_id }}"
                             <span class="float-right">  <input type="submit" name="submit" value="Delete" class="btn btn-danger float-right m-1"></span>
                           </form>

                             <span class="float-right m-1"><a href="{{ URL::to('/')}}/edit-languages/{{ $languages->id }}" class="btn btn-primary "> Edit </a></span>
                          </div>
                         <?php $i++ ?>
                          @endforeach
                </div>


              </div>
              <div>
                             <button type="button" class="fa fa-plus btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" >Add(languages)</button>

              </div>
            </div><!-- .animated -->
        </div><!-- .content -->
      </div>

      <form action="{{ URL::to('/')}}/save-languages" method="post" novalidate="novalidate">
          {{ csrf_field()}}
          {{ method_field('PUT')}}
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ADD -Languages</h5>
              <button type="button" class="close btn_close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label  class="col-form-label">Language Name:</label>
                  <input type="text" class="form-control" id="name" name="name"  required>
                <br>
                  <div class="rating form-group">
                    <label  class="col-form-label">Rating:</label>
                      <span><input type="radio" name="ratingstr" id="str5" value="5"><label for="str5"></label></span>
                      <span><input type="radio" name="ratingstr" id="str4" value="4"><label for="str4"></label></span>
                      <span><input type="radio" name="ratingstr" id="str3" value="3"><label for="str3"></label></span>
                      <span><input type="radio" name="ratingstr" id="str2" value="2"><label for="str2"></label></span>
                      <span><input type="radio" name="ratingstr" id="str1" value="1"><label for="str1"></label></span>
                  </div>
               <input type="hidden" class="form-control" id="rating" name="rating" value="0">
            </form>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="cv_id" id="cv_id" value="{{ Request::segment(2) }}">
              <button type="button" class="btn btn-secondary btn_close" data-dismiss="modal">Close</button>
              <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>
          </div>
        </div>
      </div>

      </form>
      @endsection
      @section('script')
      <script src="{{ URL::to('/')}}/public/assets/js/vendor/jquery-2.1.4.min.js"></script>
      <script src="{{ URL::to('/')}}/public/assets/js/popper.min.js"></script>
      <script src="{{ URL::to('/')}}/public/assets/js/plugins.js"></script>
      <script src="{{ URL::to('/')}}/public/assets/js/main.js"></script>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script>
      var isChanged=false;
      var cv_id;
      $(document).ready(function(){
          // Check Radio-box
          $(".rating input:radio").attr("checked", false);
          $('.rating input').click(function () {
              $(".rating span").removeClass('checked');
              $(this).parent().addClass('checked');
          });
          $('input:radio').change(
            function(){
              $('#rating').val(this.value);
              isChanged=true;
          });

          jQuery("#name").change(function() {
              var name = jQuery("#name").val();
              if (name == '') return;
              isChanged=true;
          });

          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          cv_id =  $('#cv_id').val();
          jQuery(".btn_close").click(function(){
            if(!isChanged) return;
            jQuery.ajax({
                type: 'POST',
                url: '{{ URL::to('/')}}/autosave-languages-ajax/' + cv_id,
                data: {
                  name: jQuery("#name").val(),
                  rating: jQuery("#rating").val(),
                  _token: '{{csrf_token()}}'
                },
                success: function(data) {
                    console.log(cv_id);
                }
            });
          });
      });</script>

<link rel="stylesheet" href="{{ URL::to('/')}}/public/assets/css/rating.css">

      @endsection
