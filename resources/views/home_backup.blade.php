@extends('layouts.app')
@section('title')
Dashbord
@endsection
@section('content')
<section class="banner-bg1">
  <div class="fullscreen-container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Dashboard
                <a   href="#" class="btn btn-primary ml-1 float-right"><i class="fa fa-plus-circle mx-1"></i> New Cover Letter </a>
                <a  href="cv" class="btn btn-primary ml-1 right float-right"><i class="fa fa-plus-circle mx-1"></i> New Resume</a>
             </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <p>Hey ,  {{ Auth::user()->name }}</p>

                    <h3>Resume & Cover Letter Templates Designed with Perfection</h3>
  <span>Getting a professional resume is now a Quick, Smart and Easy process<span>
  <p>Land your dream job with the perfect resume employers are looking for! </p>


                </div>
            </div>
            <br>


    <div class="row">
    @foreach($cvs as $cv)
              <div class="col-lg-4 mb-4">
                <div class="card">
                 <div class="card-body">
                   <p>{{ $cv->resume_name }}</p>
                   <hr>
                   <p>Created on: {{ $cv->created_at }}</p>
                   <p> Template: {{ $cv->name_by_id('resume_templet',$cv->resume_templet_id)}}
                 </p>
                  <p>Type: {{ $cv->name_by_id('job_category',$cv->job_category_id)}} </p>
                    <div class="clearfix">
                     <span class="float-left">
                       <a  href="edit-cv/{{ $cv->id }}" class="btn btn-primary"> Edit </a>
                      </span>
                    <span class="float-right">
                   <form action="{{ url('delete-cv/'.$cv->id)}}" method="post">
                     {{ csrf_field()}}
                     {{ method_field('delete')}}
                   <input type="submit" name="submit" value="Delete" class="btn btn-danger float-right ">
                    </form>
                    </span>
                 </div>

                 </div>
                 </div>
              </div>
                @endforeach




        </div>
      </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">My Plan Free Account</div>

                <div class="card-body">
                  Start downloading your resumes, and land your dream job with the perfect resume employers are looking for!

                 <p>  You created 2 out of 2 Resumes available in your account need more?<p>

                    <button  class="btn btn-primary ml-1 right float-right"><i class="fa fa-plus-circle mx-1"></i> Upgarde My Account</button>
                </div>
            </div>
        </div>
    </div>

</div>
</section>
@endsection
