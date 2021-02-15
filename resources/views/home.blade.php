@extends('layouts.app')
@section('title')
Dashbord
@endsection
@section('content')
<style>
  .banner-bg1{
    padding-top: 200px;
    background-color: #EEF0F8;
    background-size: auto;
    background-image: url(../public/img/bg2.jpg);
  }
  .card{
    box-shadow: 0 6px 0 0 rgba(0,0,0,.01), 0 15px 32px 0 rgba(0,0,0,.06);
    border-radius: 4px;
    border: 0;
  }
  .card .card-header{
    padding: 1.5rem;
    border-bottom: none;
    background-color: transparent;
  }
  .card h4.card-title{
    text-transform: capitalize;
    font-weight: 500;
    letter-spacing: .05rem;
    font-size: 1.25rem;
    margin-bottom: .25rem;
    display: inline;
  }
  .d-flex{
    float: right;
  }
  .ml-1{
    margin-left: 1.5rem!important;
  }
  .scheme_original a {
    color: white;
  }
  .card-header .d-flex a:hover{
    color: white;
  }
  h1, h2, h3, h4, h5, h6 {
    line-height: 1.4;
    margin-bottom: .75rem;
    font-weight: 500;
  }
  .card .card-subtitle {
    margin-top: 10px;
    margin-bottom: 10px;
  }
  .text-muted {
    color: #6c757d!important;
  }
  .h4, h4 {
    font-size: 1.5rem;
  }
  .h6, h6 {
    font-size: 1rem;
    font-weight: 300;
  }
  .card-text:last-child {
    margin-bottom: 0;
  }
  .badge {
    padding: 5px 10px;
    font-size: 90%;
    font-weight: 500;
    letter-spacing: .3px;
  }
  .bg-yellow {
    background-color: #feb516!important;
  }
  .bg-green {
    background-color: #4caf50!important;
  }
  .text-center {
    text-align: center!important;
  }
  .shadow {
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
  }
  constructed stylesheet
  .rounded-circle {
      border-radius: 50%!important;
  }
  constructed stylesheet
  img {
      vertical-align: middle;
      border-style: none;
  }
  .text-primary {
    color: #08aedb!important;
  }
  .mb-2, .my-2 {
    margin-bottom: .75rem!important;
    margin-top: .75rem!important;
    font-size: .8rem;
  }
  .font-small-2 {
    font-size: .8rem!important;
  }
  .primary {
    color: #08aedb!important;
  } 
</style>
<section class="banner-bg1">
  <div class="fullscreen-container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Hey ,  {{ Auth::user()->name }}</h4>
                  <div class="d-flex flex-wrap">
                    <a href="#" class="btn btn-primary ml-1 float-right"><i class="fa fa-plus-circle mx-1"></i> New Cover Letter </a>
                    <a href="cv" class="btn btn-info ml-1 right float-right"><i class="fa fa-plus-circle mx-1"></i> New Resume</a>
                  </div>                
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <!--<p>Hey ,  {{ Auth::user()->name }}</p>-->
                    <h4>Resume & Cover Letter Templates Designed with Perfection</h4>
                    <h6 class="card-subtitle text-muted">Getting a professional resume is now a Quick, Smart and Easy process<h6>
                    <p class="card-text">Land your dream job with the perfect resume employers are looking for! </p>
                </div>
            </div>
            <br>

            <div class="row">
            @foreach($cvs as $cv)
              <div class="col-lg-4 mb-4">
                <div class="card">
                  <div class="card-header text-center">
                    <img class="rounded-circle shadow" width="130" height="130" src="{{ asset('public/img/rebbo.png') }}">
                  </div>
                  <div class="card-body  text-center" style="padding-top:0px">
                   <h4 class="card-title text-primary"><strong>{{ $cv->resume_name }}</strong></h4>
                    <div class="text-center mb-2">
                      <span>
                        <a href="edit-cv/{{ $cv->id }}" class="btn btn-primary font-small-2">
                          <i class="fa fa-edit"></i>
                        </a>
                      </span>
                      <span>
                        <a href="javascript:ItemDelete({{ $cv->id }});" class="btn btn-danger font-small-2">
                          <i class="fa fa-trash"></i>
                        </a>
                      </span>
                    </div>
                    <form action="{{ url('delete-cv/'.$cv->id)}}" method="post" id="form-delete-{{ $cv->id }}">
                      {{ csrf_field()}}
                      {{ method_field('delete')}}
                      <!--<input type="submit" name="submit" value="Delete" class="btn btn-danger float-right ">-->
                    </form>
                    <p class="font-small-2">Created on: <span class="primary">{{ $cv->created_at }}</span></p>
                  <?php /*<p> Template: {{ //$cv->name_by_id('resume_templet',$cv->resume_templet_id)}}
                 </p>
               <p>Type: {{ $cv->name_by_id('job_category',$cv->job_category_id) }} </p> */ ?>  
                 </div>
                </div>
              </div>
                @endforeach
            </div>
      </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                  <h4 class="card-title">
                    My Plan 
                    <span class="badge bg-yellow">Free Account</span>
                  </h4>
                </div>

                <div class="card-body">
                  <p>Start downloading your resumes, and land your dream job with the perfect resume employers are looking for!</p>

                  <h6 class="card-text">  You created
                    <span class="badge bg-yellow">2</span>
                    out of 
                    <span class="badge bg-green">2</span>
                    Resumes available in your account need more?
                  <h6>
                  
                  <button  class="btn btn-primary ml-1 right float-right"><!--<i class="fa fa-plus-circle mx-1"></i>--> Upgarde My Account</button>
                </div>
            </div>
        </div>
    </div>

</div>
</section>
<script type="text/javascript">
function ItemDelete(id){
  $("#form-delete-"+id).submit();
}
</script>
@endsection
