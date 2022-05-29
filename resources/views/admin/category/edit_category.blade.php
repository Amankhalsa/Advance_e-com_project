@extends('admin.admin_master')
@section('title', 'Edit')
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
	  <h3 class="box-title">Edit Category</h3>
	  
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="table-responsive">

<form method="post" action="{{route('category.update',$edit_data->id)}}" >
	@csrf

<div class="form-group">
<h5>Category name English <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="text"  name="category_name_en"  value="{{$edit_data->category_name_en}}" class="form-control"  > 
		@error('category_name_en')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- =================== -->
<div class="form-group">
<h5>Category name Hindi  <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="text" name="category_name_hin" value="{{$edit_data->category_name_hin}}" class="form-control"  > 
		@error('category_name_hin')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- ====================== -->
<div class="form-group">
<h5>Category Icon   <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="text" name="category_icon" value="{{$edit_data->category_icon}}" class="form-control"  > 
		@error('category_icon')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>

	<div class="text-xs-right">
<input type="submit" name="submit" value="update" class="btn btn-rounded btn-info">
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