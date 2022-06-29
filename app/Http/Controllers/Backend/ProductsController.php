<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\Brand;
use App\Models\MultiImg;
use Carbon\carbon;
use Image;
class ProductsController extends Controller
{
    //================= Add products page view ===========
    public function add_products(){
    	$data['get_catdata'] = Category::latest()->get();
    	$data['brands'] =Brand::orderBy('brand_name_en')->get();
    	return view('admin.products.product_index',$data);

    }

    // store product 
    public function store_products(Request $request){
if ($request->file('product_thambnail')) {
	# code...

	$image = $request->file('product_thambnail');
	$name_gen =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
	Image::make($image)->resize(917,1000)->save('upload/product/thambnail/'.$name_gen);
	$save_url = 'upload/product/thambnail/'.$name_gen;
}

 				$product_id	= Product::insertGetId([
			'brand_id'  =>$request->brand_id,
			'category_id'  => $request->category_id,
			'subcategory_id'  => $request->subcategory_id,
			'subsubcategory_id'  => $request->subsubcategory_id,
			'product_name_en'  => $request->product_name_en,
			'product_name_hin'  => $request->product_name_hin,
			'product_slug_en'  => strtolower(str_replace(' ', '-',$request->product_name_en)),

		'product_slug_hin'  => str_replace(' ', '-',$request->product_name_hin),
			'product_code'  => $request->product_code,
			'product_qty'  => $request->product_qty,
			'product_tags_en' => $request->product_tags_en,
			'product_tags_hin'  => $request->product_tags_hin,
			'product_size_en'  => $request->product_size_en,
			'product_size_hin'  => $request->product_size_hin,
			'product_color_en'  => $request->product_color_en,
			'product_color_hin'  =>$request->product_color_hin,
			'selling_price'  => $request->selling_price,
			'discount_price'  => $request->discount_price,
			'short_descp_en'  => $request->short_descp_en,
			'short_descp_hin'  =>$request->short_descp_hin,
			'long_descp_en'  => $request->long_descp_en,
			'long_descp_hin'  => $request->long_descp_hin,
			'product_thambnail'  => $save_url,
			'hot_deals'  => $request->hot_deals,
			'featured'  => $request->featured,
			'special_offer'  => $request->special_offer,
			'special_deals'  => $request->special_deals,
			'status'  => 1,
			'created_at'  => Carbon::now(),
	]);	
 				
 				// return dd($product_id);
			
//================ Multi image store ===================
if ($request->file('multi_img')) {
		$images = $request->file('multi_img');
		foreach ($images as  $value) {
	
$make_name =hexdec(uniqid()).'.'.$value->getClientOriginalExtension();
Image::make($value)->resize(917,1000)->save('upload/product/multi_images/'.$make_name);
$uploadpath = 'upload/product/multi_images/'.$make_name;

	MultiImg::insert([
		'product_id' => $product_id,
		'photo_name' => $uploadpath,
			'created_at'  => Carbon::now(),

	]);
		}

	}
//================ Multi image store ===================

		$notification = array(
        'message' => 'Product Inserted  successfully',
        'alert-type' => 'success'
    );
		return redirect()->route('manage.products')->with($notification);
    }

// manage_products
    public function manage_products(){
    	$data['products'] = Product::latest()->get();
    	return view('admin.products.product_view',$data);
    	 


    }
    // edit product 
    public function edit_product($id){

    	// show multiple image on edit page
    	$data['multi_images'] =  MultiImg::where('product_id',$id)->get();

			$data['edit_category']	=  Category::latest()->get();
			$data['edit_subcategory']	=  SubCategory::latest()->get();
			$data['edit_subsubcat']	=  SubSubCategory::latest()->get();
			$data['edit_brand']	=  Brand::latest()->get();
			$data['edit_product']	=  Product::find($id);
    	return view('admin.products.product_edit',$data);



    }
    public function update_product(Request $request, $id){





    		Product::find($id)->update([
			'brand_id'  =>$request->brand_id,
			'category_id'  => $request->category_id,
			'subcategory_id'  => $request->subcategory_id,
			'subsubcategory_id'  => $request->subsubcategory_id,
			'product_name_en'  => $request->product_name_en,
			'product_name_hin'  => $request->product_name_hin,
			'product_slug_en'  => strtolower(str_replace(' ', '-',$request->product_name_en)),

		'product_slug_hin'  => str_replace(' ', '-',$request->product_name_hin),
			'product_code'  => $request->product_code,
			'product_qty'  => $request->product_qty,
			'product_tags_en' => $request->product_tags_en,
			'product_tags_hin'  => $request->product_tags_hin,
			'product_size_en'  => $request->product_size_en,
			'product_size_hin'  => $request->product_size_hin,
			'product_color_en'  => $request->product_color_en,
			'product_color_hin'  =>$request->product_color_hin,
			'selling_price'  => $request->selling_price,
			'discount_price'  => $request->discount_price,
			'short_descp_en'  => $request->short_descp_en,
			'short_descp_hin'  =>$request->short_descp_hin,
			'long_descp_en'  => $request->long_descp_en,
			'long_descp_hin'  => $request->long_descp_hin,
			// 'product_thambnail'  => $save_url,
			'hot_deals'  => $request->hot_deals,
			'featured'  => $request->featured,
			'special_offer'  => $request->special_offer,
			'special_deals'  => $request->special_deals,
			'status'  => 1,
			'created_at'  => Carbon::now(),
	]);

		$notification = array(
        'message' => 'Product Updated  successfully',
        'alert-type' => 'success'
    );
		return redirect()->route('manage.products')->with($notification);	
    }

// ===================== Thumnail image update 
    public function thumbnail_image_update(Request  $request,$id){
    			$data = Product::find($id);
			$old_thm_img	= $request->old_thumb_img;
			
    			if ($request->file('product_thambnail')) {
	$thumb_image_name = $request->file('product_thambnail');
	$name_gen =hexdec(uniqid()).'.'.$thumb_image_name->getClientOriginalExtension();
	Image::make($thumb_image_name)->resize(917,1000)->save('upload/product/thambnail/'.$name_gen);
	$save_thumb_img = 'upload/product/thambnail/'.$name_gen;

			}
			// end if 
			if (file_exists($old_thm_img)) {
				unlink($old_thm_img);
				# code...
			}
		$thmb_image	= Product::find($id);
		$thmb_image->product_thambnail = $save_thumb_img;
		$thmb_image->save();

			$notification = array(
        'message' => 'Thumbnail  Image  successfully',
        'alert-type' => 'success'
    );
		return redirect()->route('manage.products')->with($notification);	
			// end if

    }
    // ====================== Thubm nail image delete method =============
    public function thumbnail_image_delete($id){
    			$get_image	= Product::find($id);

    			$del_image = $get_image->product_thambnail;
    			// dd($del_image);
    			// if condition start 
    				if (file_exists($del_image)) {
				unlink($del_image);
				# code...
			}
			// end if condition
    			$thmb_image	= Product::find($id)->delete();
    $notification = array(
         'message' => 'Thumbnail delete successfully ',
         'alert-type' => 'error'
            );
        return redirect()->back()->with($notification);
       

    }


//================== multiple image update  ===============
    public function multi_image_update(Request $request ){

    			$multi_img = $request->multi_img;
    			foreach ($multi_img as $id => $img) {
    				// =============== image unlink ============
    				$img_del = MultiImg::find($id);
						if (file_exists($img_del->photo_name)) 
						{ 
						unlink($img_del->photo_name); 
						}
    				// =============== image unlink ============
$name_gen =hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
Image::make($img)->resize(917,1000)->save('upload/product/multi_images/'.$name_gen);
$upload_path = 'upload/product/multi_images/'.$name_gen;
		// object method 
		$image_update	= MultiImg::find($id);
		$image_update->photo_name = $upload_path;
		$image_update->save();
		// object method 

    			}  	// end foreach 

	$notification = array(
        'message' => 'Product Image  successfully',
        'alert-type' => 'info'
    );
		return redirect()->back()->with($notification);	
    

    } //ednmethod 

    // ================================= delete multiple image ==================
    public function multi_image_delete($id){

    		$old_multi_img = MultiImg::find($id);
    		if (file_exists($old_multi_img->photo_name)) {
    			unlink($old_multi_img->photo_name);
    		
    		}
    		// end if condition 
    		$multi_img = MultiImg::find($id)->delete();
    			$notification = array(
        'message' => 'Product Image  deleted successfully',
        'alert-type' => 'error'
    );
		return redirect()->back()->with($notification);	
    

    }
    // ======================Active inactive =================
public function active_product($id){

	$active_product	= Product::find($id);
	$active_product->status = 0;
	$active_product->save();
	    			$notification = array(
        'message' => 'Product  inactive successfully',
        'alert-type' => 'error'
    );
		return redirect()->back()->with($notification);	
    

}
public function inactive_product($id)
{
	$inactive_product	= Product::find($id);
	$inactive_product->status = 1;
	$inactive_product->save();
	    			$notification = array(
        'message' => 'Product  Active successfully',
        'alert-type' => 'success'
    );
		return redirect()->back()->with($notification);	
    

}
// ================== Product detail ==========================
public function product_detail($id){
		$detaildata['product_detail']	=  Product::find($id);
    	$detaildata['multi_images'] =  MultiImg::where('product_id',$id)->get();


    	return view('admin.products.product_detail',$detaildata);




}

//delete product 
public function delete_product($id){
	
	$delete_product	= Product::find($id);
	$thumbnail_img =$delete_product->product_thambnail;
	// dd($thumbnail_img);
	// ============= start if ================

	if (file_exists($thumbnail_img)) {
		
		unlink($thumbnail_img);
	}
	 Product::find($id)->delete();

	// ============= end if ================

    		$multi_imgs = MultiImg::where('product_id',$id)->get();
    		foreach ($multi_imgs as  $img) {
			if (file_exists($img->photo_name)) {
					unlink($img->photo_name);
				}
    	 MultiImg::where('product_id',$id)->delete();

		    			// dd($img->photo_name);
    		 }  //end foreach
	$notification = array(
			'message' => 'Product Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
} 

}
