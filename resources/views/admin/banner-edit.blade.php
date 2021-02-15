@extends('layouts.master')

@section('title')
Edit Banner
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Banner</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                     <li><a href="{{URL::to('/')}}/dashbord">Dashboard</a></li>
                     <li><a href="{{URL::to('/')}}/banner">Banner List</a></li>
                    <li class="active">Edit Banner</li>
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
                    <strong class="card-title">Edit Banner</strong>
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

                          <form action="{{ URL::to('/')}}/save-edit-banner/{{$banner->id}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                              {{ csrf_field()}}
                              {{ method_field('PUT')}}
                              <div class="form-group">
                                  <label class="control-label mb-1">Title</label>
                                  <input id="title" name="title"  type="text"  value="{{$banner->title}}" class="form-control" aria-required="true" aria-invalid="false" >
                              </div>

                              <div class="form-group">
                                  <label class="control-label mb-1">Description</label>
                                  <textarea id="description" name="description"  class="form-control" >{{$banner->description}}</textarea>
                              </div>

                              <div class="form-group">
                                  <label class="control-label mb-1">Image</label>
                                  <input type="file" name="image">
                                  <input type="hidden" name="old_image" value="{{$banner->image}}">

                              </div>

                        <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Submit</button></div>
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
