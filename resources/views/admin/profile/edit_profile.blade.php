@extends('admin.admin_master')
@section('title', 'Edit Profile')
@section('content')
<section class="content">
<div class="row">

<div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Profile Edit </h4>
			
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
<form method="post" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
	@csrf
<div class="row">
<div class="col-12">

	<div class="row">  
		<div class="col-md-6">
			<div class="form-group">
<h5>Name <span class="text-danger">*</span></h5>
<div class="controls">
	<input type="text" name="name" value="{{$editdata->name}}" class="form-control" required="" > 
	
</div>
</div>

		</div> <!-- col md 6 end  -->
									

<!-- ============================ -->

<div class="col-md-6">
			<div class="form-group">
		<h5>Email <span class="text-danger">*</span></h5>
		<div class="controls">
			<input type="email" name="email" value="{{$editdata->email}}" class="form-control" required="" >
			 </div>
		</div>
</div> <!-- col md 6 end  -->


<div class="col-md-6">
<div class="form-group">
<h5>File Input Field <span class="text-danger">*</span></h5>
<div class="controls">
	<input type="file" name="profile_photo_path" class="form-control" required=""  accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"> 
	<div class="help-block"></div></div>
</div>
</div>  <!-- col md 6 end  -->
<div class="col-md-6">
<img id="output" src="{{(!empty($editdata->profile_photo_path)) ? url('upload/admin_images/'.$editdata->profile_photo_path):url('upload/no_image.jpg')}}" width="100" height="100">


</div> <!-- col md 6 end  -->
</div>	<!-- row end  -->		
</div>
  </div>
	<div class="text-xs-right">
<input type="submit" name="submit" class="btn btn-rounded btn-info">
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
</div>
</section>
@endsection