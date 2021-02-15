@extends('layouts.app')
@section('content')
<style>
  .banner-bg, .banner-bg-o {
    background-image: linear-gradient(to right bottom,#20b0a8,#3bc1b5,#63d0aa,#8ddc9e,#b9e793);
    background-image: url(./public/img/triangles.png),linear-gradient(to right top,#2490d9,#00d685);
  }
  .center{
    text-align: center;
  }
  .fullscreen-container {
    margin-top: 100px;
  }
  .sc1 {
    color: black!important;
    font-weight: 800!important;
  }
  .sc2 {
    font-size: 55px!important;
  }
  .sc2, .sc3 {
    text-shadow: 0px 2px 2px rgba(0,0,0,.16);
  }
  .cyrn{
    background-color: #feb516;
    font-size: 18px!important;
    color: darkslategray!important;
    border-radius: 3px !important;
  }
  .feturehp3{
    padding-bottom: 0px;
    font-family: "ProbaPro-Regular";
    font-size: 18px!important;
  }
  .feturehpp3{
    padding-bottom: 0px;
    font-family: "ProbaPro-Regular";
    font-size: 18px!important;
  }
  .container {
    width: 100%!important;
    max-width: none;
  }
  .img-fluid1 {
    max-width: 60px!important;
  }
  .fetureh1 {
    color: #2490d9;
    background-image: linear-gradient(-90deg,#03d288 0%,#2490d9 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }
  .first-block-side {
    padding: 0px 20px;
  }
  .flo-rd, .flo-ld {
    margin: 20px 0px;
  }
  .feturehad3, .feturehadd3, .fetureh2 {
    color: #2490d9!important;
    background-image: linear-gradient(-90deg,#03d288 0%,#2490d9 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }
  .flo-l, .flo-ld {
    float: left;
  }
  .personality-bor {
    border: 4px solid bisque;
  }
  @keyframes bottomFadeOut1 {
    0% {
      position: absolute;
      top: 20%;
      opacity: 0;
    }

    75% {
      position: absolute;
      top: 5%;
      opacity: 1;
    }

    100% {
      opacity: 1;
    }
  }
  @keyframes bottomFadeOut2 {
    0% {
      position: absolute;
      top: 25%;
      opacity: 0;
    }

    75% {
      position: absolute;
      top: 10%;
      opacity: 1;
    }

    100% {
      opacity: 1;
    }
  }
  @keyframes bottomFadeOut3 {
    0% {
      position: absolute;
      top: 35%;
      opacity: 0;
    }

    75% {
      position: absolute;
      top: 22%;
      opacity: 1;
    }

    100% {
      opacity: 1;
    }
  }
  @keyframes bottomFadeOut4 {
    0% {
      position: absolute;
      top: 55%;
      opacity: 0;
    }

    75% {
      position: absolute;
      top: 42%;
      opacity: 1;
    }

    100% {
      opacity: 1;
    }
  }
  @keyframes bottomFadeOut5 {
    0% {
      position: absolute;
      top: 75%;
      opacity: 0;
    }

    75% {
      position: absolute;
      top: 62%;
      opacity: 1;
    }

    100% {
      opacity: 1;
    }
  }
  @keyframes bottomFadeOut6 {
    0% {
      opacity: 0;
    }

    75% {
      opacity: 1;
    }

    100% {
      opacity: 1;
    }
  }
  .first-text {
    position: absolute;
    width: 100%;
    opacity: 0;
    top: 5%;
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    animation-name: bottomFadeOut1;
    animation-delay: 0.2s;
    animation-duration: 0.3s;
    animation-fill-mode: forwards;
  }
  .second-text {
    position: absolute;
    width: 100%;
    opacity: 0;
    top: 10%;
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    animation-name: bottomFadeOut2;
    animation-delay: 0.4s;
    animation-duration: 0.3s;
    animation-fill-mode: forwards;
  }
  .third-text {
    position: absolute;
    width: 100%;
    opacity: 0;
    top: 22%;
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    animation-name: bottomFadeOut3;
    animation-delay: 0.6s;
    animation-duration: 0.3s;
    animation-fill-mode: forwards;
  }
  .fourth-text {
    position: absolute;
    width: 100%;
    opacity: 0;
    top: 42%;
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    animation-name: bottomFadeOut4;
    animation-delay: 0.8s;
    animation-duration: 0.3s;
    animation-fill-mode: forwards;
  }
  .fifth-text {
    position: absolute;
    opacity: 0;
    top: 62%;
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    animation-name: bottomFadeOut5;
    animation-delay: 1s;
    animation-duration: 0.3s;
    animation-fill-mode: forwards;
  }
  .img-animation {
    opacity: 0;
    animation-name: bottomFadeOut6;
    animation-delay: 1s;
    animation-duration: 1s;
    animation-fill-mode: forwards;
  }
</style>
<section class="banner-bg">
  <div class="fullscreen-container">
    <div class="fullscreenbanner" style="height:600px">
      <div class="row">
        <div class="col-md-4 center" style="position:relative;">
            <h3 class="sc1 first-text">Online Resume Builder</h3>
            <h1 class="sc2 second-text">Quit hunting.</h1>
            <h1 class="sc2 third-text">Get hired faster.</h1>
            <h3 class="sc3 fourth-text">We’re here to help create your standout<br />resume in minutes and get you hired.</h3>
            <a href="#" class="cyrn fifth-text">Create Your Resume Now</a>
        </div>
        <div class="col-md-8" data-scroll-reveal="enter right move 100px over 1s after 1s"
          data-scroll-reveal-id="1" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
           <img src="{{ asset('public/img/resume-cv.png') }}" class="mt50m img-animation" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<div class="page_row page_paddings_no">
  <div class="container" style="padding:0px">
    <div class="row" style="background-color: white;">
      <div style="max-width: 1600px; margin: auto;">
        <div class="col-md-12 text-center">
          <h1 class="fetureh1">You Want to Make a Big Impression</h1>
          <h3 class="fetureh3">Fast and easy way to create a resume that will get you noticed.</h3>
        </div>

        <div class="col-md-12 row">
          <div class="col-md-4 first-block-side" data-scroll-reveal="enter left move 100px over 0.5s after 0.5s"
            data-scroll-reveal-id="2" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
            <div class="row col-md-12 flo-rd">
              <div class="col-md-2 flo-r">
                <span><img src="{{ asset('public/img/icon-1.png') }}" class="img-fluid1" alt=""></span>
              </div>
              <div class="col-md-10 flo-r">
                <h4 class="feturehad3">HR Pro Approved</h4>
                <p class="feturehp3">
                  Trust the professionals. Our resume builder was developed in consultation with HR and recruitment experts
                </p>
              </div>
            </div>

            <div class="row col-md-12 flo-rd">
              <div class="col-md-2 flo-r">
                <span><img src="{{ asset('public/img/icon-3.png') }}" class="img-fluid1" alt=""></span>
              </div>
              <div class="col-md-10 flo-r">
                <h4 class="feturehad3">Customizable Templates</h4>
                <p class="feturehp3">
                  Choose from 20+ templates. Tailor your resume design to suit you
                </p>
              </div>
            </div>

            <div class="row col-md-12 flo-rd">
              <div class="col-md-2 flo-r">
                <span><img src="{{ asset('public/img/icon-5.png') }}" class="img-fluid1" alt=""></span>
              </div>
              <div class="col-md-10 flo-r">
                <h4 class="feturehad3">Smart Platform</h4>
                <p class="feturehp3">
                  No need to spend hours inputting text or formatting your layout. Paste your text into the template and click to select options
                </p>
              </div>
            </div>

            <div class="row col-md-12 flo-rd">
              <div class="col-md-2 flo-r">
                <span><img src="{{ asset('public/img/icon-7.png') }}" class="img-fluid1" alt=""></span>
              </div>
              <div class="col-md-10 flo-r">
                <h4 class="feturehad3">Data Protection</h4>
                <p class="feturehp3">
                  Your personal data is secure. We do not share your details with third parties
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4 center">
            <img src="{{ asset('public/img/cv-preview-min.png') }}" alt="">
          </div>

          <div class="col-md-4 first-block-side" data-scroll-reveal="enter right move 100px over 0.5s after 0.5s"
            data-scroll-reveal-id="2" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
            <div class="row col-md-12 flo-ld">
              <div class="col-md-2 flo-l">
                <span><img src="{{ asset('public/img/icon-2.png') }}" class="img-fluid1" alt=""></span>
              </div>
                <div class="col-md-10 flo-l">
                <h4 class="feturehadd3">Multi-lingual Convenience</h4>
                <p class="feturehpp3">
                  English, French, Spanish, Portuguese, German, Arabic? The resume builder allows you to select from a variety of languages.
                </p>
              </div>
            </div>

            <div class="row col-md-12 flo-ld">
              <div class="col-md-2 flo-l">
                <span><img src="{{ asset('public/img/icon-4.png') }}" class="img-fluid1" alt=""></span>
              </div>
              <div class="col-md-10 flo-l">
                <h4 class="feturehadd3">Take-anywhere Accessibility</h4>
                <p class="feturehpp3">
                  Manage your resume in PDF format on any device. Share with employers instantly.
                </p>
              </div>
            </div>

            <div class="row col-md-12 flo-ld">
              <div class="col-md-2 flo-l">
                <span><img src="{{ asset('public/img/icon-6.png') }}" class="img-fluid1" alt=""></span>
              </div>
              <div class="col-md-10 flo-l">
                <h4 class="feturehadd3">Single-click Functionality</h4>
                <p class="feturehpp3">
                  Just click to modify your resume design. No complex technical work.
                </p>
              </div>
            </div>

            <div class="row col-md-12 flo-ld">
              <div class="col-md-2 flo-l">
                <span><img src="{{ asset('public/img/icon-8.png') }}" class="img-fluid1" alt=""></span>
              </div>
              <div class="col-md-10 flo-l">
                <h4 class="feturehadd3">5-minute Process</h4>
                <p class="feturehpp3" style="margin-top:30px">
                  <a href="#" class="cyrn">Create Your Resume Now</a>
                </p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row" style="max-width: 1200px; margin: 40px auto;">
      <div class="col-md-12 text-center">
      <h1 class="fetureh2 text-center">Fast and Easy Resume Builder</h1>
        <h3 class="fetureh3">Effortlessly build a job-worthy resume that gets you hired faster</h3>
      </div>

      <div class="col-md-8 text-center">
        <span><img src="{{ asset('public/img/cesar.png') }}" alt=""></span>
      </div>
      <div class="col-md-4 text-center mt50m">
          <span class="bilder-num">1</span><br/>
          <h3 class="bilder-p">Get noticed with a resume that reflects you.</h3><br/>

          <span class="bilder-numb">2</span><br/>
          <h3 class="bilder-p">Customize your style and layout.</h3><br/>

          <span class="bilder-numb">3</span><br/>
          <h3 class="bilder-p">Pick the color-scheme you know will impress..</h3>
      </div>

      <div class="col-md-12 pt-5 pb-5 text-center">
          <a href="#" class="cyrn">Create Your Resume Now</a>
      </div>

    </div>

    <div class="row banner-bg-o">
        <div style="max-width: 1200px; margin: 40px auto;">
          <div class="col-md-12 text-center">
            <h1 class="sc2 text-center">You’ve Got Personality</h1>
            <h3 class="sc3 text-center">Don’t Let Your Resume Say ‘dull’</h3>
          </div>

          <div class="row personality-mar">
          <div class="col-md-4 text-center">
            <div class="personality-bor">
              <div class="personality-img"><img src="{{ asset('public/img/avery-s.png') }}" alt=""></div>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div class="personality-bor">
              <div class="personality-img"><img src="{{ asset('public/img/ndemi-s.png') }}" alt=""></div>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div class="personality-bor">
              <div class="personality-img"><img src="{{ asset('public/img/olivia-s.png') }}" alt=""></div>
            </div>
          </div>
          </div>

          <div class="col-md-12 pt-5 pb-5 text-center mt-100m">
              <a href="#" class="cyrn">It's Free & Easy! Let's Get Started</a>
          </div>
        </div>
    </div>

    <div class="row" style="max-width: 1200px; margin: 40px auto;">
      <div class="col-md-6">
        <div class="pick-mar">
        <h1 class="pick-h fetureh2">Take Your Pick</h1>
          <h3 class="pick-pg">We Have The Perfect Resume Template For You.</h3>
          <h3 class="pick-pb">Choose from over 25 templates designed in consultation with HR experts.</h3>
          <div class="pt-5 pb-5 t-center">
            <a href="#" class="cyrn">Create a Resume Now</a>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner slider-padd">
            <div class="carousel-item active">
              <img class="d-block" src="{{ asset('public/img/timothy-slider.png') }}" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block" src="{{ asset('public/img/avery-slider.png') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block" src="{{ asset('public/img/ndemi-slider.png') }}" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block" src="{{ asset('public/img/olivia-slider.png') }}" alt="Forth slide">
            </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
          </div>
          <div class="text-center pt-2 t-center">
            <h3 class="fetureh3">Professional Resume Template</h3>
          </div>
        </div>
      </div>
    </div>

    <div class="row pt-5"  style="max-width: 1600px; margin: 40px auto;">
      <div class="col-md-12 text-center">
        <h3 class="fetureh3 pl-5 pr-5 pb-5">Build your Resume with our 25+ templates and get attention from Major Local
          and Global Companies across the globe</h3>
      </div>

      <div class="col-md-12">
        <section class="customer-logos slider">
          <div class="slide"><img src="{{ asset('public/img/client-sid-1.png') }}"></div>
          <div class="slide"><img src="{{ asset('public/img/client-sid-2.png') }}"></div>
          <div class="slide"><img src="{{ asset('public/img/client-sid-3.png') }}"></div>
          <div class="slide"><img src="{{ asset('public/img/client-sid-4.png') }}"></div>
          <div class="slide"><img src="{{ asset('public/img/client-sid-5.png') }}"></div>
          <div class="slide"><img src="{{ asset('public/img/client-sid-6.png') }}"></div>
          <div class="slide"><img src="{{ asset('public/img/client-sid-1.png') }}"></div>
          <div class="slide"><img src="{{ asset('public/img/client-sid-2.png') }}"></div>
          <div class="slide"><img src="{{ asset('public/img/client-sid-3.png') }}"></div>
          <div class="slide"><img src="{{ asset('public/img/client-sid-4.png') }}"></div>
          <div class="slide"><img src="{{ asset('public/img/client-sid-5.png') }}"></div>
          <div class="slide"><img src="{{ asset('public/img/client-sid-6.png') }}"></div>
        </section>
      </div>
    </div>

    <div class="row mt120" style="max-width: 1200px; margin: 40px auto;">
      <div class="col-md-6">
        <img class="d-block" src="{{ asset('public/img/job-appli.png') }}" alt="">
      </div>

      <div class="col-md-6">
        <div class="talent-mar">
        <h1 class="talent-h fetureh2">You’ve Got The Talent</h1>
          <h3 class="talent-pg">Get Hired Faster With Our Resume Builder</h3>
          <h3 class="talent-pb">Create outstanding resumes and cover letters in a matter of minutes.</h3>
          <div class="pt-5 pb-5 f-right t-center">
            <a href="#" class="cyrn">Get Your Free Resume NOW!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
