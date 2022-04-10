@extends('admin.admin_master')
@section('title', 'Edit Slider')
@section('content')

		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">

<!-- ##################################################### -->  

<div class="col-12">
	<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Edit Slider</h3>
	  
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="table-responsive">

<form method="post" action="{{route('update.slider',$editslider->id)}}" enctype="multipart/form-data">
	@csrf
<input type="hidden" name="old_image" value="{{$editslider->slider_image}}">
<div class="form-group">
<h5>Title <span class="text-danger">*</span></h5>
<div class="controls">
	<input id="title" type="text"  name="title"  value="{{$editslider->title}}" class="form-control"  > 
		@error('title')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- =================== -->
<div class="form-group">
<h5>Description  <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="text" name="description"  value="{{$editslider->description}}" class="form-control"  > 
		@error('description')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- ====================== -->

		<div class="form-group">
<h5>	Slider image <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="file" name="slider_image" value="" class="form-control"  onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"> 
		@error('slider_image')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>

<div class="form-group">

<div class="controls">
<img src="{{asset($editslider->slider_image)}}" id="output" width="100">
</div>
</div>
	




		
	<div class="text-xs-right">
<input type="submit" name="submit" class="btn btn-rounded btn-info">
						</div>
					</form>

		</div>              
	</div>
	<!-- /.box-body -->
  </div>
  <!-- /.box -->          
</div>
<!-- ##################################################### -->

			</div>

		

	

			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
@endsection