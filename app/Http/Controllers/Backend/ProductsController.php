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
    	return view('admin.products.product_view',$data);

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
		}

	}
//================ Multi image store ===================
	MultiImg::insert([
		'product_id' => $product_id,
		'photo_name' => $uploadpath,
			'created_at'  => Carbon::now(),

	]);
			 	$notification = array(
        'message' => 'Product Inserted  successfully',
        'alert-type' => 'success'
    );
		return redirect()->back()->with($notification);
    }


}
