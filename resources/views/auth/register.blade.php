@extends('layouts.app')

@section('content')
    <section class="banner-bg1">
      <div class="fullscreen-container">
        <div class="fullscreenbanner" >
          <div class="row">
          	<div class="col-md-7">
                <div class="signup-mar">
             	  <h1 class="signup-h">Let’s Build Something Special</h1>
                  <h3 class="signup-pb">Create Your Account & Start Building The Standout Resume You Deserve.</h3>
                  <div class="t-center">
              	    <img src="{{ asset('public/img/group-cv.png') }}" class="img-fluid" alt="">
                  </div>
                </div>
          	</div>
          	<div class="col-md-5">
          	   <div class="signup-box">
          	   	<h3 class="signup-pg">{{ __('msg.register') }}</h3>
                <form class="col-md-12" method="POST" action="{{ route('register') }}">
                    @csrf

				  <div class="form-group">
					<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="{{ __('msg.name') }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          </div>
          <div class="form-group">
            <input placeholder="{{ __('msg.phone') }}" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

         </div>
            <div class="form-group">
          <input  placeholder="{{ __('msg.email') }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
           </div>

 <div class="form-group">
          <input placeholder="{{ __('msg.password') }}" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
<div class="form-group">

				  <input placeholder="{{ __('msg.confirm_password') }}" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
				  </div>
				  <div class="col-md-12 p-0 t-center">
            <input type="submit" class="btn btn-primary" value="  {{ __('msg.register') }}">
				  </div>
				  <div class="row">
					<div class="col-md-12 pt-3"> <p class="text-center">Sign Up with</p> </div>
					<div class="col-md-2">&nbsp;</div>
					<div class="col-md-4 text-center mob-w49">
						<a href="#"> <img class="img-fluid" src="{{ asset('public/img/google.png') }}" alt=""> </a>
					</div>
					<div class="col-md-4 text-center mob-w49">
						<a href="#"> <img class="img-fluid" src="{{ asset('public/img/facebook.png') }}" alt=""> </a>
					</div>
					<div class="col-md-2">&nbsp;</div>
					<div class="col-md-12 pt-4"> <p class="text-center">Already have and account? <a href="{{ route('login') }}" class="orange pl-2">Login</a> </p> </div>
				  </div>

				</form>
          	   </div>
			</div>
          </div>
        </div>
      </div>
    </section>
  @endsection
