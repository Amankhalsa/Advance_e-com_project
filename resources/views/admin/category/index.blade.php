@extends('admin.admin_master')
@section('title', 'Category')
@section('content')

		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">

<!-- ##################################################### -->  
			  
			<div class="col-lg-8">
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title">Category list</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
				<tr>
					<th width="10%">#</th>
					<th  width="25%">Category name en</th>
					<th  width="25%">Category name hin</th>
					<th  width="10%">Category icon</th>
					<th  width="30%">Action</th>
			
				</tr>
			</thead>
			<tbody>
				@foreach($cat_view as $key => $value)
				<tr>
					<td>{{$key+1}}</td>
					<td>{{$value->category_name_en}} </td>
					<td>{{$value->category_name_hin}}</td>
					<td><span><i class="{{$value->category_icon}}"> </i></span></td>
					<td>
						<a href="{{route('edit.category',$value->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
						<a href="{{route('delete.category',$value->id )}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
<div class="col-lg-4">
	<div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Add Brand</h3>
	  
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="table-responsive">

<form method="post" action="{{route('category.store')}}" >
	@csrf

<div class="form-group">
<h5>Category name English <span class="text-danger">*</span></h5>
<div class="controls">
	<input id="	brand_name_en" type="text"  name="category_name_en"  class="form-control"  > 
		@error('category_name_en')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- =================== -->
<div class="form-group">
<h5>Category name Hindi  <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="text" name="category_name_hin" value="" class="form-control"  > 
		@error('category_name_hin')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- ====================== -->
<div class="form-group">
<h5>Category Icon   <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="text" name="category_icon" value="" class="form-control"  > 
		@error('category_icon')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>

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