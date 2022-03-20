<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;
use Redirect,Response;


class SubCategoryController extends Controller
{
    //
        ############################ sub catmethods #####################
    public function subcategory_view(){
	$data['get_catdata'] = Category::orderBy('category_name_en', 'ASC')->get();
	$data['get_subcatdata'] = SubCategory::latest()->get();
    	return view('admin.Subcategory.index',$data);


    }
##################### sub cat store #################
    public function store_subcategory(Request $request){


    	$request->validate([
    		'category_id' =>'required',
    		'subcategory_name_en' =>'required',
    		'subcategory_name_hin'=>'required',
    	],[
    		'subcategory_name_en.required' => 'Input sub category name English',
    		'subcategory_name_hin.required' => 'Input sub category name Hindi',

    	]);


$data =	new SubCategory();
$data->category_id =$request->category_id;
$data->subcategory_name_en = $request->subcategory_name_en;
$data->subcategory_name_hin =$request->subcategory_name_hin;
$data->subcategory_slug_en = strtolower(str_replace(' ', '-',$request->subcategory_name_en));
$data->subcategory_slug_hin =str_replace(' ', '-',$request->subcategory_name_hin);
$data->save();
		 	$notification = array(
        'message' => 'Sub Category Inserted  successfully',
        'alert-type' => 'success'
    );
		return redirect()->back()->with($notification);

    }
######################## edit sub category #####################
    public function edit_subcategory($id){	
	$data['get_catdata'] = Category::orderBy('category_name_en', 'ASC')->get();

	$data['edit_subcategory'] = SubCategory::find($id);
    	return view('admin.Subcategory.edit_sub_cat',$data);


    }

    ###################### update_subcategory ##################
    public function update_subcategory(Request $request,$id){

$request->validate([
    		'category_id' =>'required',
    		'subcategory_name_en' =>'required',
    		'subcategory_name_hin'=>'required',
    	],[
    		'subcategory_name_en.required' => 'Input sub category name English',
    		'subcategory_name_hin.required' => 'Input sub category name Hindi',

    	]);


$data = SubCategory::find($id);
$data->category_id =$request->category_id;
$data->subcategory_name_en = $request->subcategory_name_en;
$data->subcategory_name_hin =$request->subcategory_name_hin;
$data->subcategory_slug_en = strtolower(str_replace(' ', '-',$request->subcategory_name_en));
$data->subcategory_slug_hin =str_replace(' ', '-',$request->subcategory_name_hin);
$data->save();
		 	$notification = array(
        'message' => 'Sub Category Updated  successfully',
        'alert-type' => 'success'
    );
		return redirect()->route('view.all.subcategory')->with($notification);
    }
    ###################### Delete Sub category ##################################

        public function delete_subcategory($id){
    	$data = SubCategory::find($id)->delete();
    			 	$notification = array(
        'message' => 'Category Deleted  successfully',
        'alert-type' => 'error'
    );
		return redirect()->route('view.all.subcategory')->with($notification);

    }
// ========================================================================
 ######################### sub sub category Methods ####################   
// ========================================================================
// ===================== sub catmethods =====================
        public function subsubcategory_view(){
    $data['get_catdata'] = Category::orderBy('category_name_en', 'ASC')->get();
    $data['get_subsubdata'] = SubSubCategory::latest()->get();
        return view('admin.sub_Subcategory.index',$data);

        }
        // ========================== select sub cat with ajax ================
 public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
     }

##################### sub cat store #################
    public function store_Sub_subCategory(Request $request){


        $request->validate([
            'category_id' =>'required',
            'subcategory_id' =>'required',
            'sub_subcategory_name_en' =>'required',
            'sub_subcategory_name_hin'=>'required',
        ],[
            'category_id.required' => 'Please select any one option',
            'subcategory_name_hin.required' => 'Input sub subcategory name Hindi',

        ]);


$data = new SubSubCategory();
$data->category_id =$request->category_id;
$data->subcategory_id =$request->subcategory_id;
$data->sub_subcategory_name_en = $request->sub_subcategory_name_en;
$data->sub_subcategory_name_hin =$request->sub_subcategory_name_hin;
$data->sub_subcategory_slug_en = strtolower(str_replace(' ', '-',$request->sub_subcategory_name_en));

$data->sub_subcategory_slug_hin =str_replace(' ', '-',$request->sub_subcategory_name_hin);
// dd($data);
$data->save();
                $notification = array(
                    'message' => 'Sub SubCategory Inserted  successfully',
                    'alert-type' => 'success'
                );
        return redirect()->back()->with($notification);
}
// ================== edit sub sub category ===============
            public function edit_sub_subcategory($id){
    $data['get_catdata'] = Category::orderBy('category_name_en', 'ASC')->get();
    $data['get_subcatdata'] = SubCategory::latest()->get();
    $data['get_subsubdata'] = SubSubCategory::find($id);
        return view('admin.sub_Subcategory.edit_sub_subcategory',$data);

            }

            // =================update_sub_subcategory ==================
            public function update_sub_subcategory(Request $request,$id){

$data =  SubSubCategory::find($id);
$data->category_id =$request->category_id;
$data->subcategory_id =$request->subcategory_id;
$data->sub_subcategory_name_en = $request->sub_subcategory_name_en;
$data->sub_subcategory_name_hin =$request->sub_subcategory_name_hin;
$data->sub_subcategory_slug_en = strtolower(str_replace(' ', '-',$request->sub_subcategory_name_en));

$data->sub_subcategory_slug_hin =str_replace(' ', '-',$request->sub_subcategory_name_hin);
// dd($data);
$data->save();
                $notification = array(
                    'message' => 'Sub SubCategory updated   successfully',
                    'alert-type' => 'success'
                );
        return redirect()->route('view.all.subsubcategory')->with($notification);
            }

// ================= delete_sub_subcategory===============
            public function delete_sub_subcategory($id){
            $data = SubSubCategory::find($id)->delete();
            $notification = array(
                'message' => 'Sub subcategory Deleted  successfully',
                'alert-type' => 'error'
    );
        return redirect()->route('view.all.subsubcategory')->with($notification);

            }

}
