@extends('admin.admin_master')
@section('title', 'Home')
@section('content')

		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">

<!-- ##################################################### -->  

<!-- ##################################################### -->
<div class="col-12">
	<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Edit Brand</h3>
	  
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="table-responsive">

<form method="post" action="{{route('update.brand',$edit_brand->id)}}" enctype="multipart/form-data">
	@csrf
<input type="hidden" name="old_image" value="{{$edit_brand->brand_image}}">
<div class="form-group">
<h5>Brand name English <span class="text-danger">*</span></h5>
<div class="controls">
	<input id="	brand_name_en" type="text"  name="brand_name_en" value="{{$edit_brand->brand_name_en}}"  class="form-control"  > 
		@error('brand_name_en')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- =================== -->
<div class="form-group">
<h5>Brand name Hindi  <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="text" name="brand_name_hin" value="{{$edit_brand->brand_name_hin}}" class="form-control"  > 
		@error('brand_name_hin')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- ====================== -->
	<div class="form-group">
		<img src="{{asset($edit_brand->brand_image)}}" width="100">
		</div>
<!-- =============================== -->

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