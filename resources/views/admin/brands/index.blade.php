@extends('admin.admin_master')
@section('title', 'Home')
@section('content')

		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">

<!-- ##################################################### -->  
<div class="col-8">
	<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Brand list:</h3>
	 
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="table-responsive">
		  <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
			<thead>
				<tr>
					<th>#</th>
					<th>Brand name En</th>
					<th>Brand name Hin</th>
					<th>Image</th>
					<th>Action</th>
			
				</tr>
			</thead>
			<tbody>
				@foreach($brands as $key => $value)
				<tr>
					<td>{{$key+1}}</td>
					<td>{{$value->brand_name_en}} </td>
					<td>{{$value->brand_name_hin}}</td>
					<td><img src="{{asset($value->brand_image)}}" width="100"></td>
					<td>
						<a href="{{route('edit.brand',$value->id)}}" class="btn btn-info">Edit</a>
						<a href="{{route('delete.brand',$value->id)}}" class="btn btn-danger" id="delete">Delete</a>
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
	  <h3 class="box-title">Add Brand</h3>
	  
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="table-responsive">

<form method="post" action="{{route('brand.image.store')}}" enctype="multipart/form-data">
	@csrf

<div class="form-group">
<h5>Brand name English <span class="text-danger">*</span></h5>
<div class="controls">
	<input id="	brand_name_en" type="text"  name="brand_name_en"  class="form-control"  > 
		@error('brand_name_en')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- =================== -->
<div class="form-group">
<h5>Brand name Hindi  <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="text" name="brand_name_hin" value="" class="form-control"  > 
		@error('brand_name_hin')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- ====================== -->

		<div class="form-group">
<h5>	Brand image <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="file" name="brand_image" value="" class="form-control"  onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"> 
		@error('brand_image')
		<span class="text-danger"> {{$message}}</span>
		@enderror
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