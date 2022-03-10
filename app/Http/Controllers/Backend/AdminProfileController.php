<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Contracts\Encryption\DecryptException;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Crypt;
use Auth;
use Illuminate\Support\Facades\Hash;
class AdminProfileController extends Controller
{
  //============= Admin profile method ====================
	public function admin_profile(){
		$data['admindata'] = Admin::find(1);
		return view('admin.profile.admin_profile',$data);
	}
	// ================== Admin profile edit view page ===============
public function admin_profile_edit(){
			$data['editdata'] = Admin::find(1);
		return view('admin.profile.edit_profile',$data);

}
// ================ profile store ==============
public function admin_profile_store(Request $request){

			$data = Admin::find(1);
			$data->name = $request->name;
			$data->email = $request->email;


	if ($request->file('profile_photo_path')) {
		$file = $request->file('profile_photo_path');
		@unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
		$filename = date('Y_md_hi').'.'.$file->getClientOriginalExtension();
		// $newname = date('Ymdhi');
		// $old_name = $file->getClientOriginalName();

		$file->move(public_path('upload/admin_images'),$filename);
		$data['profile_photo_path'] =$filename;
		# code...
	}
	$data->save();

  		  $notification = array(
        'message' => 'Admin profile Updated successfully',
        'alert-type' => 'success'
    );

return redirect()->route('admin.profile')->with($notification);

}
// ================= change password ===============
public function admin_change_password(){

	return view('admin.profile.change_password');

}
// =================== update admin password ===============
public function admin_update_password(Request $request){

	$validateData = $request->validate([
		'oldpassword' => 'required',
		'password' => 'required|confirmed',
		// 'new_confirm_password' => 'same:new_password',
	]);
	$hashedpassword = Admin::find(1)->password;
	if (Hash::check($request->oldpassword,$hashedpassword)) {
		$admin = Admin::find(1);
		$admin->password = Hash::make($request->password);
		$admin->save();
		Auth::logout();
		return redirect()->route('admin.logout');
	}else{

		return redirect()->back();
	}

}
}
