@extends('layouts.master')

@section('title')
Edit Job Category
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Job Category </h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                     <li><a href="{{URL::to('/')}}/dashbord">Dashboard</a></li>
                     <li><a href="{{URL::to('/')}}/job-category">Job Category  List</a></li>
                    <li class="active">Edit Job Category</li>
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
                    <strong class="card-title">Edit Job Category</strong>
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

                          <form action="{{ URL::to('/')}}/edit-job-category/{{$data->id}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                              {{ csrf_field()}}
                              {{ method_field('PUT')}}
                              <div class="form-group">
                                  <label class="control-label mb-1">Name EN</label>
                                  <input id="name_en" name="name_en"  type="text"  value="{{$data->name_en}}" class="form-control" aria-required="true" aria-invalid="false" >
                              </div>
                              <div class="form-group">
                                  <label class="control-label mb-1">Name AR</label>
                                  <input id="name_en" name="name_ar"  type="text"  value="{{$data->name_ar}}" class="form-control" aria-required="true" aria-invalid="false" >
                              </div>
                        <div class="form-actions form-group"><button type="submit" name="submit" class="btn btn-success btn-sm">Submit</button></div>
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
@endsection
