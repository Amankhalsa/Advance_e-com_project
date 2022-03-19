@extends('admin.admin_master')
@section('title', 'Edit Sub Category')
@section('content')

		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">
<!-- ##################################################### -->
<div class="col-lg-12">
	<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Edit Sub Cat</h3>
	  
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="table-responsive">

<form method="post" action="{{route('update.subcategory',$edit_subcategory->id)}}" >
	@csrf

<div class="form-group">
<h5>Category Select <span class="text-danger">*</span></h5>
<div class="controls">
<select name="category_id"   class="form-control" aria-invalid="false">
	<option selected="" disabled="">Select Your Category</option>

@foreach($get_catdata as $key => $value)
	<option value="{{$value->id}}" {{ ($value->id ==  $edit_subcategory->category_id) ? 'selected' : ''}}> {{$value->category_name_en}}</option>
@endforeach

</select>
	@error('category_id')
		<span class="text-danger"> {{$message}}</span>
		@enderror

</div>


<!-- ======== Sub Category name Eng=========== -->
<div class="form-group">
<h5>Sub Category name Eng  <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="text" name="subcategory_name_en" value="{{$edit_subcategory->subcategory_name_en}}" class="form-control"  > 
		@error('subcategory_name_en')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- ========== Sub Category name Hindi ============ -->
<div class="form-group">
<h5>Sub Category name Hindi  <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="text" name="subcategory_name_hin" value="{{$edit_subcategory->subcategory_name_hin}}" class="form-control"  > 
		@error('subcategory_name_hin')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- ============================ -->


	<div class="text-xs-right">
<input type="submit" name="submit" value="Update" class="btn btn-rounded btn-info">
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