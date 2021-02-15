@extends('layouts.cv')

@section('title')
Personal Info
@endsection

@section('content')


<div class="content mt-3">
    <div class="animated fadeIn">
       <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Templets</strong>
                </div>
                <div class="card-body">
                  <!-- Credit Card -->
                  <div>
                      <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <?php   $lang=  Config::get('app.locale');
                               $name = 'name_'.$lang;
                         $templetid = $cv['cv_cata']->resume_templet_id;
                        ?>
                          <form action="{{ URL::to('/')}}/change-templet/{{ Request::segment(2) }}" method="post" novalidate="novalidate">
                              {{ csrf_field()}}
                              {{ method_field('PUT')}}

                            
                             @foreach($cv['resume_templet'] as $val)
                            <div class="col-lg-4">
                              <input type="radio"   name="resume_templet_id"
                               <?php if( $val->id  ==  $templetid) {
                                echo ' checked="checked" ' ;

                               }?>

                                value="{{ $val->id}}">{{$val->$name}}
                              <p> <img src="{{ url('public/thumbnail/'.$val->image)}}"  width="200" height="200"></p>
                          </div>
                        @endforeach
                        <div class="form-actions form-group"><button type="submit"  name='submit' class="btn btn-success btn-sm">Submit</button></div>
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
<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery(".nav-menu-item").removeClass("active");
  jQuery("#tab-template").addClass("active");
});
</script>
@endsection
