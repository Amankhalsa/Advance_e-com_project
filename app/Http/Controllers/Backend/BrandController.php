<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
class BrandController extends Controller
{
    //============ brand view =========
    public function brand_view(){
    	$data['brands'] = Brand::latest()->get();
    	return view('admin.brands.index',$data);
    }
    // ============= store_brand_image ===============
    public function store_brand_image(Request $request ){
    	$request->validate([
    		'brand_name_en' =>'required',
    		'brand_name_hin'=>'required',
    		'brand_image' =>'required',
    	],[
    		'brand_name_en.required' => 'Input Brand name English',
    		'brand_name_hin.required' => 'Input Brand name Hindi',

    	]);

$image = $request->file('brand_image');
$name_gen =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
$save_url = 'upload/brand/'.$name_gen;

$data =	new Brand();
$data->brand_name_en = $request->brand_name_en;
$data->brand_name_hin =$request->brand_name_hin;
$data->brand_slug_en = strtolower(str_replace(' ', '-',$request->brand_name_en));
$data->brand_slug_hin =str_replace(' ', '-',$request->brand_name_hin);
$data->brand_image =$save_url;
$data->save();
		 	$notification = array(
        'message' => 'Brand Inserted  successfully',
        'alert-type' => 'success'
    );
		return redirect()->back()->with($notification);
    }
    // ===========================edit ===========================
    public function edit_brand_image($id){
    	$data['edit_brand'] =Brand::findOrFail($id);
    	return view('admin.brands.edit_brand',$data);

    }
    // ======================= update_brand_image ================
    public function update_brand_image(Request $request, $id){

    		$old_image = $request->old_image;
			// dd($old_image);
			if ($request->file('brand_image')) {
			
$image = $request->file('brand_image');
$name_gen =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
$save_url = 'upload/brand/'.$name_gen;
unlink($old_image);
$data =	Brand::find($id);
$data->brand_name_en = $request->brand_name_en;
$data->brand_name_hin =$request->brand_name_hin;
$data->brand_slug_en = strtolower(str_replace(' ', '-',$request->brand_name_en));
$data->brand_slug_hin =str_replace(' ', '-',$request->brand_name_hin);
$data->brand_image =$save_url;
$data->save();
		 	$notification = array(
        'message' => 'Brand updated  successfully',
        'alert-type' => 'info'
    );
		return redirect()->route('all.brand')->with($notification);

			}else{

$data =	Brand::find($id);
$data->brand_name_en = $request->brand_name_en;
$data->brand_name_hin =$request->brand_name_hin;
$data->brand_slug_en = strtolower(str_replace(' ', '-',$request->brand_name_en));
$data->brand_slug_hin =str_replace(' ', '-',$request->brand_name_hin);
$data->save();
		 	$notification = array(
        'message' => 'Brand Name updated successfully',
        'alert-type' => 'info'
    );
		return redirect()->route('all.brand')->with($notification);

			}



    }
    			// delete_brand_image
			public function delete_brand_image($id){

				$image = Brand::find($id);
				$old_image =$image->brand_image;
				// dd(	$old_image);
				Brand::find($id)->delete();
					$notification = array(
        'message' => 'Brand delete successfully',
        'alert-type' => 'error'
    );
		return redirect()->route('all.brand')->with($notification);
			}

}
