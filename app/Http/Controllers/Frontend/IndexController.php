<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Product;
use App\Models\MultiImg;


use Hash;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    //=============== home page view =========
    public function index(){

        $categories['category'] = Category::orderBy('category_name_en','ASC')->get();
       
        $categories['slider_data'] = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $categories['get_products'] = Product::where('status',1)->orderBy('id','DESC')->limit(3)->get();
 $categories['featured'] = Product::where('featured',1)->orderBy('id','DESC')->limit(3)->get();
  $categories['hotdeals'] = Product::where('hot_deals',1)->orderBy('id','DESC')->limit(3)->get();
$categories['specialoffer'] = Product::where('special_offer',1)->orderBy('id','DESC')->limit(3)->get();
$categories['specialdeals'] = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();


$skip_category_0 = Category::skip(0)->first();
 $skip_product_0 = Product::where('status',1)->where('category_id', $skip_category_0->id)->orderBy('id','DESC')->get();



    	return view('frontend.index',$categories,compact('skip_product_0','skip_category_0'));
    }
    // ============ logout =================
    public function user_logout(Request $request){

		Auth::logout();
		return redirect()->route('login');
    }
    // ============= profile ===========
 		public function edit_profile(){
 				$id = Auth::user()->id;
    			$data['edituser'] = User::find($id);
    		  	$notification = array(
        'message' => 'Edit  profile page open',
        'alert-type' => 'success'
    );
	return view('frontend.profile.edit_user_profile',$data)->with($notification);
 		}

    public function user_profile(){
    	$id = Auth::user()->id;
    	$data['user'] = User::find($id);
    	return view('frontend.profile.user_profile',$data);
    }
    // ========== update_user_profile ===========
    public function update_user_profile(Request $request){

			$data = User::find(Auth::user()->id);
			$data->name = $request->name;
			$data->email = $request->email;
			$data->phone = $request->phone;



	if ($request->file('profile_photo_path')) {
		$file = $request->file('profile_photo_path');
		// @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
		$filename = date('Y_md_hi').'.'.$file->getClientOriginalExtension();
		// $newname = date('Ymdhi');
		// $old_name = $file->getClientOriginalName();

		$file->move(public_path('upload/user_images'),$filename);
		$data['profile_photo_path'] =$filename;
		# code...
	}
	$data->save();

  		  $notification = array(
        'message' => 'User profile Updated successfully',
        'alert-type' => 'success'
    );


return redirect()->route('dashboard')->with($notification);
    }
    // ========================== change user paSSWORD ==========
    public function change_password(){
    	return view('frontend.password.change_user_psw');

    }
    // ================ user password update =============
    public function update_user_password(Request $request){
    		$validateData = $request->validate([
		'oldpassword' => 'required',
		'password' => 'required|confirmed',
		// 'new_confirm_password' => 'same:new_password',
	]);
	$hashedpassword = Auth::user()->password;
	if (Hash::check($request->oldpassword,$hashedpassword)) {
		$user = User::find(Auth::id());
		$user->password = Hash::make($request->password);
		$user->save();
		Auth::logout();
			  $notification = array(
        'message' => 'Password Updated successfully',
        'alert-type' => 'success'
    );
		return redirect()->route('user.logout')->with($notification);
	}else{

		return redirect()->back();
	}


    }
    // Product details 
    public function product_details($id,$slug){

    		$product_data['product'] = Product::find($id);
    			$product_data['multiimg'] = MultiImg::where('product_id',$id )->get();
    	return view('frontend.product.product_details',$product_data);

    }
}
