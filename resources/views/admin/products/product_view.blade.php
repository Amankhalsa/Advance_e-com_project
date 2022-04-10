@extends('admin.admin_master')
@section('title', 'Category')
@section('content')

		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">

<!-- ##################################################### -->  
			  
			<div class="col-lg-12">
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title">Product list</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
				<tr>
			
					<th  width="15%">Image  </th>
					<th  width="25%">Product en</th>
					<th  width="10%"> Qyt</th>
					<th  width="10%"> price</th>
					
					<th  width="10%"> Discount</th>
					<th  width="10%"> Status</th>
					<th  width="30%">Action</th>
			
				</tr>
			</thead>
			<tbody>
				@foreach($products as $key => $value)
				<tr>
			
					<td><img src="{{asset($value->product_thambnail)}}" width="100"></td>

					<td>{{$value->product_name_en}} </td>
					
					<td>{{$value->product_qty}}</td>
					<td>{{$value->selling_price}} </td>
					<td>{{$value->discount_price}} </td>
					<td>
					@if($value->status == 1)

						<span class="badge badge-pill badge-success">Active</span>
					@else
						<span class="badge badge-pill badge-danger">Inactive</span>

					@endif

					</td>


				
					<td>
						<a href="{{route('product.detail',$value->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
						<a href="{{route('edit.product',$value->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
						<a href="{{route('delete.category',$value->id )}}" class="btn btn-danger" id="delete" ><i class="fa fa-trash"></i></a>
					@if($value->status == 1)

						<a href="{{route('product.active',$value->id)}}" class="btn btn-success" title="Active"> <i class="fa fa-thumbs-up"></i></a>
					@else
						<a href="{{route('product.inactive',$value->id)}}" class="btn btn-danger" title="Inactive"><i class="fa fa-thumbs-down"></i></a>

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

<!-- ##################################################### -->

			</div>

		

	

			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
@endsection