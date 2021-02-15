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
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Summary</strong>
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

                          <form action="{{ URL::to('/')}}/edit-summary/{{$cv->id}}" method="post" novalidate="novalidate">
                              {{ csrf_field()}}
                              {{ method_field('PUT')}}

                              <div class="form-group">
                                <label class="control-label mb-1"> Summary</label>
                                <textarea name="summary" id="summary" class="form-control">{{$cv->summary}}</textarea>

                            </div>


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
    var cv_id;
    jQuery(document).ready(function() {
        cv_id = "{{$cv->id}}";
        
        jQuery.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          }
        });
    
        jQuery("#summary").change(function() {
            var summary = jQuery("#summary").val();
            if (summary == '') return;
            jQuery.ajax({
                type: 'POST',
                url: '{{ URL::to('/')}}/autosave-summary-ajax/' + cv_id,
                data: {
                    summary: summary,
                     _token: '{{csrf_token()}}'
                },
                success: function(data) {
                    console.log(cv_id);
                }
            });
        });
    });
</script>
@endsection
