<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;
class IndexController extends Controller
{
    //=============== home page view =========
    public function index(){
    	return view('frontend.index');
    }
    // ============== logout =================
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
}
