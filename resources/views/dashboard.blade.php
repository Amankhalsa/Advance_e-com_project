@extends('frontend.home_master')
@section('title', 'Dashboard' )
@section('content')
<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="col-md-2 "><br>
				<img src="{{(!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" class="card-img-top my-5 py-5" style="border-radius: 50%;" height="100%" width="100%"><br><br>
<!-- common sidebar  -->
@include('frontend.body.sidebar')

<!-- common sidebar  -->

			</div> <!-- end col md 2  -->

			<div class="col-md-2">


				
			</div> <!-- end col md 2  -->

			<div class="col-md-6">
				<div class="card">
					<h3 class="text-center">
						<span class="text-danger">
							Hi <strong>{{Auth::user()->name}}</strong> Welcome to easy online shop
						</span>
					</h3>
					
				</div>
				
			</div> <!-- end col md 2  -->
		</div>  <!-- end row -->
		
	</div>
	
</div>

@endsection