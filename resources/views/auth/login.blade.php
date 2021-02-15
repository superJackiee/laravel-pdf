@extends('layouts.app')

@section('content')
    <section class="banner-bg1">
      <div class="fullscreen-container">
        <div class="fullscreenbanner" >
          <div class="row">
          	<div class="col-md-7">
                <div class="signin-mar">
             	  <h1 class="signin-h">Welcome back!</h1>
                  <h3 class="signin-pb1">Please Login to you account to create</h3>
                  <h3 class="signin-pb">Online Professional Resume - Quick & Easy</h3>
                  <div class="t-center">
              	    <img src="{{ asset('public/img/group-cv.png') }}" class="img-fluid" alt="">
                  </div>
                </div>
          	</div>
          	<div class="col-md-5">
          	   <div class="signin-box">
          	   	<h3 class="signin-pg">{{ __('msg.login') }}</h3>

          <form class="col-md-12" method="POST" action="{{ route('login') }}">
              @csrf
				  <div class="form-group">
            <input placeholder="{{ __('msg.email') }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
				  <div class="form-group">
            <input placeholder="{{ __('msg.password') }}" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

				  </div>
				  <div class="form-group pb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('msg.remember_me') }}
                </label>

            @if (Route::has('password.request'))
                <a class="orange fs-13 f-right" href="{{ route('password.request') }}">
                    {{ __('msg.forgot_password') }}
                </a>
            @endif
  </div>
				  </div>
				  <div class="col-md-12 p-0 t-center">
					 <input type="submit" class="btn btn-primary" value="{{ __('msg.login') }}">
				  </div>

				  <div class="row">
					<div class="col-md-12 pt-3">
				      <p class="text-center">OR</p>
					  <p class="text-center">Login with</p>
					</div>
					<div class="col-md-2">&nbsp;</div>
					<div class="col-md-4 text-center mob-w49">
          <!--  <a href="{{ url('auth/google') }}" >-->
        <a href="{{ url('/auth/redirect/google') }}" >
					 <img class="img-fluid" src="{{ asset('public/img/google.png') }}" alt=""> </a>
					</div>
					<div class="col-md-4 text-center mob-w49">
					 <a href="{{ url('/auth/redirect/facebook') }}" ><img class="img-fluid" src="{{ asset('public/img/facebook.png') }}" alt=""> </a>
					</div>
					<div class="col-md-2">&nbsp;</div>
					<div class="col-md-12 pt-4"> <p class="text-center">Don't have an account? <a href="{{ route('register') }}" class="orange pl-2">Create new</a> </p> </div>
				  </div>

				</form>
          	   </div>
			</div>
          </div>
        </div>
      </div>
    </section>
  @endsection
