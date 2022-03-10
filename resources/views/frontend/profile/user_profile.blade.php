@extends('frontend.home_master')
@section('title', 'Dashboard' )
@section('content')
<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="col-md-2 "><br>
<img src="{{(!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" class="card-img-top my-5 py-5" style="border-radius: 50%;" height="100%" width="100%" id="output"><br><br>


<!-- common sidebar  -->
@include('frontend.body.sidebar')

<!-- common sidebar  -->
			</div> <!-- end col md 2  -->

			<div class="col-md-2">


				
			</div> <!-- end col md 2  -->

			<div class="col-md-6">
					<h3 class="text-center">
						<span class="text-danger">
							Hi <strong>{{Auth::user()->name}}</strong> Update Your Profile
						</span>
					</h3>
					<a href="{{route('edit.profile')}}" class="btn btn-success">Edit profile</a>
<table class="table table-hover">
  <thead>
    <tr> <th scope="col">Name</th> <th scope="col">{{$user->name}}</th></tr>
      <tr> <th scope="col">Email</th> <th scope="col">{{$user->email}}</th></tr>
       <tr><th scope="col">Phone</th> <th scope="col">{{$user->phone}}</th></tr>
       <tr><th scope="col">Address</th><th scope="col">Name</th>
    </tr>
  </thead>

</table>
				
			</div> <!-- end col md 2  -->
		</div>  <!-- end row -->
		
	</div>
	
</div>

@endsection