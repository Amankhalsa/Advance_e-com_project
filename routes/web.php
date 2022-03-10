<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Models\User;
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });





Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
  
Route::get('login',[AdminController::class,'loginform']);
Route::post('/login',[AdminController::class,'store'])->name('admin.login');





});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', 
	function () {
    
    return view('admin.index');
})->name('dashboard');

// ==============admin all routes =============


    //for prefix 
  Route::prefix('admin')->group(function(){

Route::get('logout',[AdminController::class,'destroy'])->name('admin.logout');
// profile view 
Route::get('profile',[AdminProfileController::class,'admin_profile'])->name('admin.profile');
// edit profile 
Route::get('profile/edit',[AdminProfileController::class,'admin_profile_edit'])->name('admin.profile.edit');
// profile store 
Route::post('profile/store',[AdminProfileController::class,'admin_profile_store'])->name('admin.profile.store');

// ========== admin password ============
Route::get('change/password',[AdminProfileController::class,'admin_change_password'])->name('admin.change.password');

// update.admin.password

Route::post('update/password',[AdminProfileController::class,'admin_update_password'])->name('update.admin.password');


});



// ================ admin all routes end ==============

#########################################################################
  //========================== User router ===================

Route::get('/',[IndexController::class,'index']);
Route::get('/logout',[IndexController::class,'user_logout'])->name('user.logout');
Route::get('/profile',[IndexController::class,'user_profile'])->name('user.profile');
Route::post('/profile/update/',[IndexController::class,'update_user_profile'])->name('user.profile.store');
Route::get('/edit/profile',[IndexController::class,'edit_profile'])->name('edit.profile');
Route::get('/change/password',[IndexController::class,'change_password'])->name('change.user.password');
Route::Post('/update/password',[IndexController::class,'update_user_password'])->name('user.password.update');




#########################################################################


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
       	$id = Auth::user()->id;
    	$data['user'] = User::find($id);
    return view('dashboard',$data);
})->name('dashboard');
