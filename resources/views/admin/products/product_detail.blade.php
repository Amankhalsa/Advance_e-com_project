@extends('admin.admin_master')
@section('title', 'Product Detail')
@section('content')
<section class="content">
	<style type="text/css">

.box-body ul li {
    line-height: 24px;
    margin-inline-start: 25px;
    display: inline;
    font-size: 20px;
}

	</style>

		  <!-- Default box -->
		  <div class="row">
		  <div class="col-lg-4">

		  	<div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">Product  Images </h4>
				</div>
				<div class="box-body">
					<div id="carousel-example-generic-captions" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						  <ol class="carousel-indicators">
							<li data-target="#carousel-example-generic-captions" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic-captions" data-slide-to="1" class=""></li>
							<li data-target="#carousel-example-generic-captions" data-slide-to="2" class=""></li>
						  </ol>                      
					  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
						  <img src="{{asset($product_detail->product_thambnail)}}" class="img-fluid" alt="slide-1">
						 
						</div>
						@foreach($multi_images as $img)
						<div class="carousel-item">
						  <img src="{{asset($img->photo_name)}}" class="img-fluid" alt="slide-2">
						  
						</div>
						@endforeach
					
					  </div>
					  <!-- Controls -->
					  <a class="carousel-control-prev" href="#carousel-example-generic-captions" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#carousel-example-generic-captions" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					  </a>
					</div>               
				</div>
			  </div>
		  </div>
		 <!-- col-lg 4 end   -->
		 <div class="col-lg-8">
		 	<div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">Product Detail </h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table class="table table-striped mb-0">
						  <thead class="thead-light">
							<tr>
							
							  <th scope="col" width="30%">Name</th>
							  <th scope="col" width="70%">Detail</th>
									
							</tr>
						  </thead>
						  <tbody>
							
							<tr>
							<td>Product Name </td> <td>{{$product_detail->product_name_en}}</td>
							</tr>
								<tr>
							<td>Product Name Hin</td> <td>{{$product_detail->product_name_hin}}</td>
							</tr>
							
						
							<tr>
							<td>Product Avilablity </td> <td>
								@if($product_detail->product_qty != null)
									<span class="badge badge-pill text-bold badge-success  ">Avialblle</span>
								@else
									<span class="badge badge-pill badge-danger ">Not Avialblle</span>

								@endif
							</td>
							</tr>
							<tr>
							<td>Product Selling Price </td> <td>${{$product_detail->selling_price}}  </td>
							</tr>
								<tr>
							<td>Product Discount Price </td> <td>
								@if($product_detail->discount_price == null)
<span class="badge badge-pill badge-danger ">No discount</span>
							@else
@php
$amount = $product_detail->selling_price -$product_detail->discount_price ;
$discount = ($amount /$product_detail->selling_price)*100;
@endphp
							{{round($discount)}} % off
							@endif
							 </td>
							</tr>	
							<tr>
							<td>Short Description English </td> <td>{{$product_detail->short_descp_en}}</td>
							</tr>	
							<tr>
							<td>Long Description </td> <td>{{$product_detail->long_descp_en}}</td>
							</tr>
							
					
						
						  </tbody>
						</table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
		 </div>
		  		  </div>
		  		  <!-- row end  -->
		  		  <div class="box box-outline-primary">
<div class="box-header with-border">

				  <div class="box-body">
					<ul class="custom">
						<li>Hot Deal :
							@if($product_detail->hot_deals == 1)
								<span>Yes</span>
							@else
								<span class="text-bold text-danger">No</span>

							@endif
						 </li>
						<li>Featured :
							@if($product_detail->featured == 1)
							<span>Yes</span>
							@else
							<span class="text-bold text-danger">No</span>

							@endif

							 </li>
						<li>Special Offer :
								@if($product_detail->special_offer == 1)
							<span>Yes</span>
							@else
							<span class="text-bold text-danger">No</span>

							@endif
							 </li>
						<li>Special Deal :		
							@if($product_detail->special_deals == 1)
							<span>Yes</span>
							@else
							<span class="text-bold text-danger">No</span>
							@endif

							 </li>
						<li>Status : 	
							@if($product_detail->status == 1)
						
							  <span class="text-bold text-success">Active</span>
	
							@else
							<span class="text-bold text-danger">Inactive</span>

							@endif
				</li>

					</ul>
				  </div>
				</div>
				</div>

		</section>
@endsection

