@extends('admin.admin_master')
@section('title', 'Edit Sub subCategory')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<!-- Content Header (Page header) -->
		<!-- Main content -->
		<section class="content">
		  <div class="row">

<!-- ############# col md 12 start #################### -->
<div class="col-lg-12">
	<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Add Sub subCat</h3>  
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="table-responsive">
<form method="post" action="{{route('sub.subcategory.update',$get_subsubdata->id)}}}" >
	@csrf
<div class="form-group">
<h5>Category Select <span class="text-danger">*</span></h5>
<div class="controls">
<select name="category_id"   class="form-control" aria-invalid="false">
	<option selected="" disabled="">Select Your Category</option>
	@foreach($get_catdata as  $value)
	<option value="{{$value->id}}" {{($value->id ==  $get_subsubdata->category_id) ?'selected':'' }}>{{$value->category_name_en}}</option>
	@endforeach
</select>
		@error('category_id')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- ======================= select  category selection end =============== -->
		  <div class="form-group">
	<h5>SubCategory Select <span class="text-danger">*</span></h5>
	<div class="controls">
		<select name="subcategory_id" class="form-control"  >
			<option  selected="" disabled="">Select SubCategory</option>
	@foreach($get_subcatdata as  $value)
	<option value="{{$value->id}}" {{($value->id ==  $get_subsubdata->subcategory_id) ?'selected':'' }}>{{$value->subcategory_name_en}}</option>
	@endforeach
		</select>
	@error('subcategory_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
<!-- =====================select  Sub sub Category end =================== -->
<!-- ======== Sub Category name Eng=========== -->
<div class="form-group">
<h5>Sub subcategory name Eng  <span class="text-danger">*</span></h5>
<div class="controls">
<input  type="text" name="sub_subcategory_name_en" value="{{$get_subsubdata->sub_subcategory_name_en}}" class="form-control"  > 
		@error('sub_subcategory_name_en')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- ========== Sub Category name Hindi ============ -->
<div class="form-group">
<h5>Sub subcategory name Hindi  <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="text" name="sub_subcategory_name_hin" value="{{$get_subsubdata->sub_subcategory_name_hin}}" class="form-control"  > 
		@error('sub_subcategory_name_hin')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- ============================ -->
	<div class="text-xs-right">
<input type="submit" name="submit" value="Add New" class="btn btn-rounded btn-info">
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