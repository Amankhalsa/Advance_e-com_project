@extends('frontend.home_master')
@section('title', 'Dashboard' )
@section('content')
<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="col-md-2 "><br>
<img src="{{(!empty($edituser->profile_photo_path)) ? url('upload/user_images/'.$edituser->profile_photo_path):url('upload/no_image.jpg')}}" class="card-img-top my-5 py-5" style="border-radius: 50%;" height="100%" width="100%" id="output"><br><br>
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
							Hi <strong>{{Auth::user()->name}}</strong> Update Your Password
						</span>
					</h3>
					<div class="card-body">
<form method="post" action="{{route('user.password.update')}}" >
							@csrf
<div class="form-group">
<h5>Current password <span class="text-danger">*</span></h5>
<div class="controls">
	<input id="current_password" type="password"  name="oldpassword"  class="form-control" required="" > 
	
</div>
</div>
<!-- =================== -->
<div class="form-group">
<h5>New password <span class="text-danger">*</span></h5>
<div class="controls">
	<input id="password" type="password" name="password" value="" class="form-control" required="" > 
	
</div>
</div>
<!-- ====================== -->
<div class="form-group">
<h5>Confirm password <span class="text-danger">*</span></h5>
<div class="controls">
	<input id="password_confirmation" type="password" name="password_confirmation" value="" class="form-control" required="" > 
	
</div>
</div>
   
         

             <div class="form-group">
            <button type="submit" class="btn btn-danger">
            	Submit
            </button>
                </div>

						</form>
						
					</div>

					
				</div>
				
			</div> <!-- end col md 2  -->
		</div>  <!-- end row -->
		
	</div>
	
</div>

@endsection