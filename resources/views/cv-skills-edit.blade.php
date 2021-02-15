@extends('layouts.cv')

@section('title')
skills
@endsection

@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
       <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">skills </strong>
                </div>
                <div class="card-body">
                  <!-- Credit Card -->
                  <div>
                      <div class="card-body">
                            <form action="{{ URL::to('/')}}/edit-skills/{{$cv->id}}" method="post" novalidate="novalidate">
                              {{ csrf_field()}}
                              {{ method_field('PUT')}}
                              <div class="form-group">
                                  <label class="control-label mb-1">Skill Name</label>
                                  <input id="name" name="name"  type="text"  value="{{$cv->name}}" class="form-control" >
                                </div>
                                <div class="form-group rating">
                                  <label class="control-label mb-1">Rating</label>

                                  <label class="control-label mb-1">Rating</label>
                                  <span><input type="radio" name="ratingstr" id="str5" value="5"><label for="str5"></label></span>
                                  <span><input type="radio" name="ratingstr" id="str4" value="4"><label for="str4"></label></span>
                                  <span><input type="radio" name="ratingstr" id="str3" value="3"><label for="str3"></label></span>
                                  <span><input type="radio" name="ratingstr" id="str2" value="2"><label for="str2"></label></span>
                                  <span><input type="radio" name="ratingstr" id="str1" value="1"><label for="str1"></label></span>
                                  <input id="rating" name="rating"  type="hidden"  value="{{$cv->rating}}" class="form-control" >

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script >
var id;
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
        jQuery.ajax({
            type: 'POST',
            url: '{{ URL::to('/')}}/autoupdate-skills-ajax/' + id,
            data: {
              rating: $('#rating').val(),
              _token: '{{csrf_token()}}'
            },
            success: function(data) {
                console.log(id);
            }
        });
    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    id = "{{$cv->id}}";
    jQuery("#name").change(function() {
        var name = jQuery("#name").val();
        jQuery.ajax({
            type: 'POST',
            url: '{{ URL::to('/')}}/autoupdate-skills-ajax/' + id,
            data: {
              name: name,
              _token: '{{csrf_token()}}'
            },
            success: function(data) {
                console.log(id);
            }
        });
    });
});
</script>

<link rel="stylesheet" href="{{ URL::to('/')}}/public/assets/css/rating.css">
@endsection
