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
							Hi <strong>{{Auth::user()->name}}</strong> Update Your Profile
						</span>
					</h3>
					<div class="card-body">
<form method="post" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
							@csrf
<div class="form-group">
            <label class="info-title" for="email">Email Address <span>*</span></label>
            <input type="email" name="email"  class="form-control unicase-form-control text-input" value="{{$edituser->email}}" >
            
        </div>
        <div class="form-group">
            <label class="info-title" for="name">Name <span>*</span></label>
            <input  type="text" name="name" class="form-control unicase-form-control text-input" value="{{$edituser->name}}"  >
          
        </div>
        <div class="form-group">
            <label class="info-title" for="phone">Phone Number <span>*</span></label>
            <input type="text"  name="phone"  class="form-control unicase-form-control text-input" value="{{$edituser->phone}}">
          
        </div>
         




         <div class="form-group">
            <label class="info-title" for="profile_photo_path">Profile image <span>*</span></label>
            <input type="file"  name="profile_photo_path"  class="form-control unicase-form-control text-input"  accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" >
       
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