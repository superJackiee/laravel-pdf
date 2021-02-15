@extends('layouts.app')
@section('content')
<section class="banner-bg1">
  <div class="fullscreen-container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">{{ __('msg.contact_us') }}</div>
               <ul  >
                @foreach($errors->all() as $e)
                <li class="alert alert-danger">{{$e}}</li>
                 @endforeach
                </ul>
                @if(Session::has('success'))
   <div class="alert alert-success">
       {{Session::get('success')}}
   </div>
@endif
    <div class="card-body">
                  <form action="contactsubmit" method="post">
                    @csrf
                  <div class="form-group row">
                      <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('msg.name') }}</label>
                      <div class="col-lg-6">
                        <input id="name" type="text" name="name" value="" required="required" autocomplete="name" autofocus="autofocus" class="form-control ">
                      </div>

                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('msg.email') }}</label>
                        <div class="col-lg-6">
                          <input id="name" type="text" name="email" value="" required="required" autocomplete="email" autofocus="autofocus" class="form-control ">
                        </div>

                      </div>

                      <div class="form-group row">
                          <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('msg.phone') }}</label>
                          <div class="col-lg-6">
                            <input id="name" type="text" name="phone" value="" required="required" autocomplete="phone" autofocus="autofocus" class="form-control ">
                          </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-lg-4 col-form-label text-md-right">{{ __('msg.message') }}</label>
                            <div class="col-lg-6">
                                <textarea name="message" class="form-control"></textarea>
                              </div>
                          </div>
                          <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">{{ __('msg.submit') }}</button>
                            </div></div>
                      </form>
                </div>
             </div>
            </div>


        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">{{ __('msg.help') }}</div>

                <span class="m-5">Join more than 400,000 users <br>
who got their dream job using our 20+ completly unique templates only on StylingCV</span>
            </div>
      </div>
    </div>
 </div>
</section>
@endsection
