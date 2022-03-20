@extends('admin.admin_master')
@section('title', 'Sub subCategory')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<!-- Content Header (Page header) -->
		<!-- Main content -->
		<section class="content">
		  <div class="row">
<!-- ##################################################### -->  
			<div class="col-lg-8">
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title">Sub subCategory list</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
				<tr>
					<th width="10%">#</th>
					<th  width="10%">Category id</th>
					<th  width="20%">Sub Cat id</th>
					<th  width="20%">Sub subCat name Eng</th>
					<th  width="20%">Sub subCat name hin</th>
					<th  width="30%">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($get_subsubdata as $key => $value)
				<tr>
					<td>{{$key+1}}</td>
					<td>{{$value['category']['category_name_en']}}</td>
					<td>{{$value['subcategory']['subcategory_name_en']}}</td>
					<td>{{$value->sub_subcategory_name_en}} </td>
					<td>{{$value->sub_subcategory_name_hin}}</td>
					<td>
						<a href="{{route('edit.sub.subcategory',$value->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
						<a href="{{route('delete.sub.subcategory',$value->id )}}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
	  <h3 class="box-title">Add Sub subCat</h3>  
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<div class="table-responsive">
<form method="post" action="{{route('sub.subcategory.store')}}" >
	@csrf
<div class="form-group">
<h5>Category Select <span class="text-danger">*</span></h5>
<div class="controls">
<select name="category_id"   class="form-control" aria-invalid="false">
	<option selected="" disabled="">Select Your Category</option>
	@foreach($get_catdata as  $value)
	<option value="{{$value->id}}">{{$value->category_name_en}}</option>
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
			<option value="" selected="" disabled="">Select SubCategory</option>

		</select>
	@error('subcategory_id') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror 
	 </div>
		 </div>
<!-- =====================select  Sub sub Category end =================== -->
<!-- ################################################### -->
<!-- ======== Sub Category name Eng=========== -->
<div class="form-group">
<h5>Sub subcategory name Eng  <span class="text-danger">*</span></h5>
<div class="controls">
<input  type="text" name="sub_subcategory_name_en" value="" class="form-control"  > 
		@error('sub_subcategory_name_en')
		<span class="text-danger"> {{$message}}</span>
		@enderror
</div>
</div>
<!-- ========== Sub Category name Hindi ============ -->
<div class="form-group">
<h5>Sub subcategory name Hindi  <span class="text-danger">*</span></h5>
<div class="controls">
	<input  type="text" name="sub_subcategory_name_hin" value="" class="form-control"  > 
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
 <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            console.log(category_id);
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
    </script>

@endsection