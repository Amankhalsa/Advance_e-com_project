@extends('frontend.home_master')
@section('title', 'login' )
@section('content')


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Reset password</li>
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
    <h4 class="">Reset password </h4>


        <form method="POST" class="register-form outer-top-xs"  action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">
        
    
        <div class="form-group">
            <label class="info-title" for="email">Email  <span>*</span></label>
            <input  id="email" type="email" name="email"  class="form-control unicase-form-control text-input" >
        </div>
               <div class="form-group">
            <label class="info-title" for="password">Password  <span>*</span></label>
            <input  id="password" type="password" name="password"  class="form-control unicase-form-control text-input" >
        </div>
               <div class="form-group">
            <label class="info-title" for="password">Confirm Password  <span>*</span></label>
            <input  id="password_confirmation" type="password" name="password_confirmation"  class="form-control unicase-form-control text-input" >
        </div>

        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
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
