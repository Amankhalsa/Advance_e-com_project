<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryContoller extends Controller
{
    //############## View Category  ###############
    public function category_view(){
    	$data['cat_view'] = Category::latest()->get();
    	return view('admin.Category.index',$data);
    }
    public function store_category(Request $request){
    		$request->validate([
    		'category_name_en' =>'required',
    		'category_name_hin'=>'required',
    		'category_icon' =>'required',
    	],[
    		'category_name_en.required' => 'Input category name English',
    		'category_name_hin.required' => 'Input category name Hindi',

    	]);


$data =	new Category();
$data->category_name_en = $request->category_name_en;
$data->category_name_hin =$request->category_name_hin;
$data->category_slug_en = strtolower(str_replace(' ', '-',$request->category_name_en));
$data->category_slug_hin =str_replace(' ', '-',$request->category_name_hin);
$data->category_icon =$request->category_icon;
$data->save();
		 	$notification = array(
        'message' => 'Category Inserted  successfully',
        'alert-type' => 'success'
    );
		return redirect()->back()->with($notification);
    }
    ###################### edit Category ###########################
    public function edit_category($id){

    			$data['edit_data'] = Category::find($id);
    			return view('admin.Category.edit_category',$data);
    }

    public function update_category(Request $request,$id ){
    	$request->validate([
    		'category_name_en' =>'required',
    		'category_name_hin'=>'required',
    		'category_icon' =>'required',
    	],[
    		'category_name_en.required' => 'Input category name English',
    		'category_name_hin.required' => 'Input category name Hindi',

    	]);


$data =Category::find($id);
$data->category_name_en = $request->category_name_en;
$data->category_name_hin =$request->category_name_hin;
$data->category_slug_en = strtolower(str_replace(' ', '-',$request->category_name_en));
$data->category_slug_hin =str_replace(' ', '-',$request->category_name_hin);
$data->category_icon =$request->category_icon;
$data->save();
		 	$notification = array(
        'message' => 'Category Updated  successfully',
        'alert-type' => 'info'
    );
		return redirect()->route('view.all.category')->with($notification);

    }

############################# delete function of category ###############
    public function delete_category($id){
    	$data = Category::find($id)->delete();
    			 	$notification = array(
        'message' => 'Category Deleted  successfully',
        'alert-type' => 'error'
    );
		return redirect()->route('view.all.category')->with($notification);

    }


}
