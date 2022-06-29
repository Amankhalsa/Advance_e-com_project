@extends('admin.admin_master')
@section('title', 'Add Products')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<!-- Content Header (Page header) -->
		<!-- Main content -->
		<section class="content">
		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Products</h4>
			</div>
<!-- /.box-header -->
<div class="box-body">
  <div class="row">
	<div class="col">
		<form method="post" action="{{route('update.product',$edit_product->id)}}"  enctype="multipart/form-data"  >
			@csrf
		  <div class="row">
			<div class="col-12">						

<div class="row"> <!-- start 1st row -->
	<div class="col-md-4"> <!-- col md 4 start -->
		<div class="form-group">
			<h5>Brand select <span class="text-danger">*</span></h5>
			<div class="controls">
			<select name="brand_id"   class="form-control" aria-invalid="false" required="">
			<option selected="" disabled="">Select Your Brand</option>
				@foreach($edit_brand as  $value)
				<option value="{{$value->id}}" {{$value->id == $edit_product->id ? 'selected' :''}} >{{$value->brand_name_en}}</option>
				@endforeach
				</select>
				@error('brand_id')
				<span class="text-danger"> {{$message}}</span>
				@enderror
			</div>
		</div>
	</div> <!-- col md 4 end -->

		<div class="col-md-4"> <!-- col md 4 start -->
		<div class="form-group">
				<h5>Category Select <span class="text-danger">*</span></h5>
				<div class="controls">
				<select name="category_id"   class="form-control" aria-invalid="false" required="">
				<option selected="" disabled="">Select Your Category</option>
					@foreach($edit_category as  $value)
					<option value="{{$value->id}}" {{$value->id == $edit_product->category_id ? 'selected' :''}} >{{$value->category_name_en}}</option>
					@endforeach
					</select>
					@error('category_id')
					<span class="text-danger"> {{$message}}</span>
					@enderror
				</div>
		</div>
		</div> <!-- col md 4 end -->
		<div class="col-md-4"> <!-- col md 4 start -->
			<div class="form-group">
				<h5>Sub Category Select <span class="text-danger">*</span></h5>
				<div class="controls">
				<select name="subcategory_id"   class="form-control" aria-invalid="false" required="">
				<option selected="" disabled="">Select Your Category</option>
				@foreach($edit_subcategory as  $subvalue)
					<option value="{{$subvalue->id}}" {{$subvalue->id == $edit_product->subcategory_id ? 'selected' :''}} >{{$subvalue->subcategory_name_en}}</option>
					@endforeach
				</select>
						@error('subcategory_id')
						<span class="text-danger"> {{$message}}</span>
						@enderror
				</div>
			</div>
		</div> <!-- col md 4 end -->
	
</div><!--  end 1st row  -->


<!-- =================================== -->
<div class="row"> <!-- start 1st row -->
		<div class="col-md-4"> <!-- col md 4 start -->
	 		<div class="form-group">
				<h5>SubSubCategory Select <span class="text-danger">*</span></h5>
				<div class="controls">
				<select name="subsubcategory_id" class="form-control"  required="">
		<option value="" selected="" disabled="">Select SubSubCategory</option>
			@foreach($edit_subsubcat as  $subsub)
					<option value="{{$subvalue->id}}" {{$subsub->id == $edit_product->subcategory_id ? 'selected' :''}} >{{$subsub->sub_subcategory_name_en}}</option>
					@endforeach
				</select>
					@error('subsubcategory_id') 
					<span class="text-danger">{{ $message }}</span>
					@enderror 
				</div>
		 	</div>
		</div> <!-- col md 4 end -->

		<div class="col-md-4"> <!-- col md 4 start -->
			<div class="form-group">
			<h5>Product Name En <span class="text-danger">*</span></h5>
			<div class="controls">
			<input type="text" name="product_name_en" value="{{$edit_product->product_name_en}}" class="form-control" required="">
					@error('product_name_en') 
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
			</div>
		</div> <!-- col md 4 end -->
		<div class="col-md-4"> <!-- col md 4 start -->
			<div class="form-group">
			<h5>Product Name Hin <span class="text-danger">*</span></h5>
			<div class="controls">
			<input type="text" name="product_name_hin" value="{{$edit_product->product_name_hin}}" class="form-control" required="">
			@error('product_name_hin') 
			<span class="text-danger">{{ $message }}</span>
			@enderror
			</div>
			</div>
		</div> <!-- col md 4 end -->
</div><!--  end 1st row  -->
<!-- ======================2nd end ========================== -->
<!-- ===========3 rd start =============== -->
<div class="row"> <!-- start 3RD row  -->
			<div class="col-md-4">
				<div class="form-group">
				<h5>Product Code <span class="text-danger">*</span></h5>
				<div class="controls">
				<input type="text" name="product_code" value="{{$edit_product->product_code}}" class="form-control" required="">
				@error('product_code') 
				<span class="text-danger">{{ $message }}</span>
				@enderror
				</div>
				</div>

			</div> <!-- end col md 4 -->
			<div class="col-md-4">
				<div class="form-group">
				<h5>Product Quantity <span class="text-danger">*</span></h5>
				<div class="controls">
				<input type="text" name="product_qty" value="{{$edit_product->product_qty}}" class="form-control" required="">
				@error('product_qty') 
				<span class="text-danger">{{ $message }}</span>
				@enderror
				</div>
				</div>
			</div> <!-- end col md 4 -->
			<div class="col-md-4">
				<div class="form-group">
				<h5>Product Tags En <span class="text-danger">*</span></h5>
				<div class="controls">
				<input type="text" name="product_tags_en" value="{{$edit_product->product_tags_en}}" class="form-control"  data-role="tagsinput" required="">
					@error('product_tags_en') 
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				</div>

			</div> <!-- end col md 4 -->

</div> <!-- end 3RD row  -->

<!-- ============= 3rd end ======================= -->

<div class="row"> <!-- start 4th row  -->
			<div class="col-md-4">
				<div class="form-group">
				<h5>Product Tags Hin <span class="text-danger">*</span></h5>
		
				<input type="text" name="product_tags_hin" value="{{$edit_product->product_tags_hin}}"   class="form-control"  data-role="tagsinput">
				@error('product_tags_hin') 
				<span class="text-danger">{{ $message }}</span>
				@enderror
				</div>
			</div> <!-- end col md 4 -->

		

			<div class="col-md-4">
				<div class="form-group">
				<h5>Product Size En <span class="text-danger">*</span></h5>
				<div class="controls">
				<input type="text" name="product_size_en" class="form-control" value="{{$edit_product->product_size_en}}" data-role="tagsinput" required="">
					@error('product_size_en') 
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				</div>
			</div> <!-- end col md 4 -->


			<div class="col-md-4">

				<div class="form-group">
				<h5>Product Size Hin <span class="text-danger">*</span></h5>
				<div class="controls">
				<input type="text" name="product_size_hin" class="form-control" 
				value="{{$edit_product->product_size_hin}}"  data-role="tagsinput">
					@error('product_size_hin') 
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				</div>

			</div> <!-- end col md 4 -->
		</div> <!-- end 4th row  -->


<div class="row"> <!-- start 5th row  -->
			<div class="col-md-4">

				<div class="form-group">
				<h5>Product Color En <span class="text-danger">*</span></h5>
				<div class="controls">
				<input type="text" name="product_color_en" class="form-control" value="{{$edit_product->product_color_en}}" data-role="tagsinput" required="">
					@error('product_color_en') 
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				</div>

			</div> <!-- end col md 4 -->

			<div class="col-md-4">
				<div class="form-group">
				<h5>Product Color Hin <span class="text-danger">*</span></h5>
				<div class="controls">
				<input type="text" name="product_color_hin" class="form-control" value="{{$edit_product->product_color_hin}}" data-role="tagsinput" required="">
					@error('product_color_hin') 
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				</div>	
			</div> <!-- end col md 4 -->


			<div class="col-md-4">
				<div class="form-group">
				<h5>Product Selling Price <span class="text-danger">*</span></h5>
				<div class="controls">
				<input type="text" value="{{$edit_product->selling_price}}" name="selling_price" class="form-control" required="">
					@error('selling_price') 
					<span class="text-danger">{{ $message }}</span>
					@enderror
				</div>
				</div>
			</div> <!-- end col md 4 -->
			
		</div> <!-- end 5th row  -->



		<div class="row"> <!-- start 6th row  -->
			<div class="col-md-4">
				<div class="form-group">
				<h5>Product Discount Price <span class="text-danger">*</span></h5>
				<div class="controls">
				<input type="text" name="discount_price" value="{{$edit_product->discount_price}}" class="form-control"  >
				@error('discount_price') 
				<span class="text-danger">{{ $message }}</span>
				@enderror
				</div>
				</div>
			</div> <!-- end col md 4 -->

		<div class="col-md-4">


 
				
		</div> <!-- end col md 4 -->


	 <!-- end col md 4 -->
			
		</div> <!-- end 6th row  -->



<div class="row"> <!-- start 7th row  -->
			<div class="col-md-6">
				<div class="form-group">
				<h5>Short Description English <span class="text-danger">*</span></h5>
				<div class="controls">
				<textarea name="short_descp_en"  id="textarea" class="form-control" required placeholder="Textarea text">{{$edit_product->short_descp_en}}</textarea>     	 
				</div>
				</div>
			</div> <!-- end col md 6 -->

			<div class="col-md-6">
				<div class="form-group">
				<h5>Short Description Hindi <span class="text-danger">*</span></h5>
				<div class="controls">
				<textarea name="short_descp_hin" id="textarea" class="form-control" required placeholder="Textarea text" >{{$edit_product->short_descp_hin}} </textarea>     
				</div>
				</div>
					
			</div> <!-- end col md 6 -->		 
			
		</div> <!-- end 7th row  -->

		
		 


<div class="row"> <!-- start 8th row  -->
			<div class="col-md-12">

				<div class="form-group">
				<h5>Long Description English <span class="text-danger">*</span></h5>
				<div class="controls">
				<textarea id="editor1" name="long_descp_en" rows="5" cols="50" required="">
				{{$edit_product->long_descp_en}} 
				</textarea>  
				</div>
				</div>
				
			</div> <!-- end col md 6 -->

		<div class="col-md-12">

				<div class="form-group">
				<h5>Long Description Hindi <span class="text-danger">*</span></h5>
				<div class="controls">
				<textarea id="editor2" name="long_descp_hin" rows="5" cols="50" required="">
				{{$edit_product->long_descp_hin}} 
				</textarea>  
				</div>
				</div>
			
		</div> <!-- end col md 6 -->		 
</div> <!-- end 8th row  -->

<div class="row">

			<div class="col-md-6">
				<div class="form-group">
				<div class="controls">
				<fieldset>
				<input type="checkbox" id="checkbox_2" name="hot_deals" value="1"
				{{$edit_product->hot_deals == 1 ?"checked" :""}}
				>
				<label for="checkbox_2">Hot Deals</label>
				</fieldset>
				<fieldset>
				<input type="checkbox" id="checkbox_3" name="featured" value="1"
				{{$edit_product->featured == 1 ?"checked" :""}}>
				<label for="checkbox_3">Featured</label>
				</fieldset>
				</div>
				</div>
			</div>



		<div class="col-md-6">
			<div class="form-group">

			<div class="controls">
			<fieldset>
			<input type="checkbox" id="checkbox_4" name="special_offer" value="1"
			{{$edit_product->special_offer == 1 ?"checked" :""}}
			>
			<label for="checkbox_4">Special Offer</label>
			</fieldset>
			<fieldset>
			<input type="checkbox" id="checkbox_5" name="special_deals" value="1"
			{{$edit_product->special_deals == 1 ?"checked" :""}}
			>
			<label for="checkbox_5">Special Deals</label>
			</fieldset>
			</div>
			</div>
		</div>
</div>



	<!-- end col md 4 -->







	
			</div>
		  </div>

					
						
						<div class="text-xs-right">
<input type="submit" name="submit" value="Add Product" class="btn btn-rounded btn-info">
							</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>



<!-- ========= image update section ================== -->

<section class="content"> 
	<div class="row"> 
		<div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Product Thubmnail Image update <strong>Top</strong></h4>
				  </div>
<form method="post" action="{{route('update.thumbnail.image',$edit_product->id)}}" enctype="multipart/form-data">
	@csrf

<input type="hidden" name="old_thumb_img" value="{{$edit_product->product_thambnail}}">
	<div class="row row-sm">

		<div class="col-md-3">
			<div class="card" >
  <img src="{{asset($edit_product->product_thambnail)}}" class="card-img-top" height="130" width="280">
  <div class="card-body">
    <h5 class="card-title">
 
    </h5>
    <p class="card-text">
    	<!-- start form group  -->
    	<div class="form-group">
    		<label class="form-control-level">
    			Change image <span class="text-danger">*</span>
    		</label>
		<input type="file" name="product_thambnail" class="form-control" multiple="" id="multiImg"  >
				@error('product_thambnail') 
				<span class="text-danger">{{ $message }}</span>
				@enderror
    	</div>
    	<!-- end form group  -->
    </p>

  </div>
</div>
		</div> <!-- end col md 3 -->
	
	</div>
			<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
		 </div>
<br><br>
</form>
				</div>
			  </div>

	</div>  <!--  end row -->
</section>
<!-- image updation section end  -->


<!-- ========================= Multiple image update section ========================== -->

<section class="content"> 
	<div class="row"> 
		<div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Product Multiple Image update <strong>Top</strong></h4>
				  </div>
<form method="post" action="{{route('update.product.image')}}" enctype="multipart/form-data">
	@csrf

	<div class="row row-sm">
		@foreach($multi_images as $img)
		<div class="col-md-3">
			<div class="card" >
  <img src="{{asset($img->photo_name)}}" class="card-img-top" height="130" width="280">
  <div class="card-body">
    <h5 class="card-title">
    	<a href="{{route('del.product.image',$img->id)}}" class="btn btn-sm btn btn-danger" id="delete" title="delete data"> <i class="fa fa-trash"></i></a>
    </h5>
    <p class="card-text">
    	<!-- start form group  -->
    	<div class="form-group">
    		<label class="form-control-level">
    			Change image <span class="text-danger">*</span>
    		</label>
		<input type="file" name="multi_img[{{$img->id}}]" class="form-control" multiple="" id="multiImg"  >
				@error('multi_img') 
				<span class="text-danger">{{ $message }}</span>
				@enderror
    	</div>
    	<!-- end form group  -->
    </p>

  </div>
</div>
		</div> <!-- end col md 3 -->
		@endforeach
	</div>
			<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
		 </div>
<br><br>
</form>
				</div>
			  </div>

	</div>  <!--  end row -->
</section>
<!-- multiple image updation section end  -->



















		<!-- /.content -->
<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {

                    	$('select[name="subsubcategory_id"]').html('')
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
 		$('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
            	console.log(subcategory_id);
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {


                       var d = $('select[name="subsubcategory_id"]').empty();

                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.sub_subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
 
    });
</script>


<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>


<script>
 
		$(document).ready(function(){
		$('#multiImg').on('change', function(){ //on file input change
		if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
      var data = $(this)[0].files; //this file data    
       $.each(data, function(index, file){ //loop though each file
          if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
       var fRead = new FileReader(); //new filereader
       fRead.onload = (function(file){ //trigger function on successful read
       return function(e) {
       var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
</script>
@endsection

