@extends('frontend.home_master')
@section('title', 'login' )
@section('content')


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>forgot password</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in --> 

        

<div class="col-md-6 col-sm-6 sign-in">
    <h4 class="">Forgot password </h4>

<div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

   @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
  <form method="POST" class="register-form outer-top-xs"  action="{{ route('password.email') }}">
        
            @csrf
        <div class="form-group">
            <label class="info-title" for="email">Email Address <span>*</span></label>
            <input  id="email" type="email" name="email"  class="form-control unicase-form-control text-input" >
        </div>

        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
    </form>                 
</div>
<!-- Sign-in -->


<!-- create a new account -->           </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

        <div class="logo-slider-inner"> 
            <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                <div class="item m-t-15">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item m-t-10">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->

                <div class="item">
                    <a href="#" class="image">
                        <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
                    </a>    
                </div><!--/.item-->
            </div><!-- /.owl-carousel #logo-slider -->
        </div><!-- /.logo-slider-inner -->
    
</div><!-- /.logo-slider -->
 @include('frontend.body.brand')
<!-- ============================================== BRANDS CAROUSEL : END 
    ============================================== -->    </div><!-- /.container -->
</div>

@endsection
