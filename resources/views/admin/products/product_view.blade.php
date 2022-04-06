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
			
					<th  width="25%">Image  </th>

					<th  width="25%">Product  name en</th>
					<th  width="25%">Product name hin</th>
					<th  width="10%"> Qyt</th>
					<th  width="30%">Action</th>
			
				</tr>
			</thead>
			<tbody>
				@foreach($products as $key => $value)
				<tr>
			
					<td><img src="{{asset($value->product_thambnail)}}" width="100"></td>

					<td>{{$value->product_name_en}} </td>
					<td>{{$value->product_name_hin}}</td>
					<td>{{$value->product_qty}}</td>
					<td>
						<a href="{{route('edit.product',$value->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
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

<!-- ##################################################### -->

			</div>

		

	

			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
@endsection