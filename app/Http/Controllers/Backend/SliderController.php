<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\carbon;
use Image;
class SliderController extends Controller
{
    //
    public function view_slider(){
    		$get_data['getslider'] =Slider::latest()->get();
    	return view('admin.slider.index',$get_data);

    }
    //================  store slider ================ 
    public function store_slider(Request $request ){
    		$request->validate([
    		'title' =>'required',
    		'description'=>'required',
    		'slider_image' =>'required',
    	],[
    		
    		'slider_image.required' => 'Slider image required',

    	]);
if ($request->file('slider_image')) {

$sliderimage = $request->file('slider_image');
$name_genrate =hexdec(uniqid()).'.'.$sliderimage->getClientOriginalExtension();
Image::make($sliderimage)->resize(870,370)->save('upload/slider/'.$name_genrate);
// ->resize(300,300)
$save_url = 'upload/slider/'.$name_genrate;
}
		$saveslider =	new Slider();
		$saveslider->title = $request->title;
		$saveslider->description =$request->description;
		$saveslider->slider_image =$save_url;
		$saveslider->save();
		$notification = array(
		'message' => 'Slider Inserted  successfully',
		'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);
    }
    //================   edit slider  ================ 
    public function edit_slider($id){
    	   $edit_data['editslider'] =Slider::find($id);
    	return view('admin.slider.edit',$edit_data);

    }

    //================  update method for slider ================ 
    public function update_slider(Request $request,$id ){

    	$old_image = $request->old_image;

 if ($request->file('slider_image')) {

$sliderimg = $request->file('slider_image');
$name_genrate =hexdec(uniqid()).'.'.$sliderimg->getClientOriginalExtension();
Image::make($sliderimg)->resize(870,370)->save('upload/slider/'.$name_genrate);

$save_url = 'upload/slider/'.$name_genrate;
if (file_exists($old_image)) {
	unlink($old_image);
	# code...
}
		$saveslider = Slider::find($id);
		$saveslider->title = $request->title;
		$saveslider->description =$request->description;
		$saveslider->slider_image =$save_url;
		$saveslider->save();
			$notification = array(
			'message' => 'Slider image  successfully',
			'alert-type' => 'info'
			);
			return redirect()->route('manage.slider')->with($notification);
}else{

		$saveslider = Slider::find($id);
		$saveslider->title = $request->title;
		$saveslider->description =$request->description;

		$saveslider->save();
			$notification = array(
			'message' => 'Slider updated   successfully',
			'alert-type' => 'success'
			);
			return redirect()->route('manage.slider')->with($notification);
			}

    }

    //================ delete slider  ================ 
    public function delete_slider($id){
		$slider_del = Slider::find($id);
		$get_image = $slider_del->slider_image;
		if (file_exists($get_image)) {
			unlink($get_image);
			# code...
		}
		Slider::find($id)->delete();
				$notification = array(
		'message' => 'Slider Deleted  successfully',
		'alert-type' => 'error'
		);
		return redirect()->route('manage.slider')->with($notification);


    }
    public function  inactive_slider($id){
		$slider_status = Slider::find($id);
		$slider_status->status = 1;
		$slider_status->save();

				$notification = array(
		'message' => 'Slider Active  successfully',
		'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);

    }

    // inactive_slider
        public function active_slider($id){
		$slider_inactive = Slider::find($id);
		$slider_inactive->status = 0;
		$slider_inactive->save();
				$notification = array(
		'message' => 'Slider inActive  successfully',
		'alert-type' => 'success'
		);
		return redirect()->back()->with($notification);

    }
}
