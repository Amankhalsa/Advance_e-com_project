@extends('admin.admin_master')
@section('title', 'Slider')
@section('content')

		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">

<!-- ##################################################### -->  

			<div class="col-lg-8">
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title">Slider</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
				<thead>
				<tr>
				
					<th width="15%">Image</th>
					<th width="10%">Title</th>
					<th width="30%">Descriptions</th>
					<th width="10%">Status</th>
					<th width="30%">Action</th>
			
				</tr>
			</thead>
			<tbody>
				@foreach($getslider as $key => $value)
				<tr>

	<td><img src="{{asset($value->slider_image)}}"  width="100"> </td>
	<td>{{$value->title}}</td>
	<td>{{$value->description}}</td>
	<td>	@if($value->status == 1)

						<span class="badge badge-pill badge-success">Active</span>
					@else
						<span class="badge badge-pill badge-danger">Inactive</span>

					@endif</td>
		<td>
		<a href="{{route('edit.slider',$value->id)}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
		<a href="{{route('delete.slider',$value->id)}}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>



				@if($value->status == 1)

						<a href="{{route('slider.active',$value->id)}}" class="btn btn-success  btn-sm" title="Inactive"> <i class="fa fa-thumbs-up"></i></a>
					@else
						<a href="{{route('slider.inactive',$value->id)}}" class="btn btn-danger  btn-sm" title="Active"><i class="fa fa-thumbs-down"></i></a>

					@endif
		</td>
					
				</tr>
			@endforeach

			</tbody>				  				  

		</table>
		</div>              
	</div>
	<!-- /.box-body -->
  </div>
  <!-- /.box -->          
</div>


<!-- ##################################################### -->
<div class="col-4">
	<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Add Slider</h3>
	  
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="table-responsive">

<form method="post" action="{{route('store.slider')}}" enctype="multipart/form-data">
	@csrf

<div class="form-group">
<h5>Title <span class="text-danger">*</span></h5>
<div class="controls">
	<input id="title" type="text"  name="title"  class="form-control"  > 
		@error('title')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- =================== -->
<div class="form-group">
<h5>Description  <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="text" name="description" value="" class="form-control"  > 
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
<img src="" id="output" width="100">
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