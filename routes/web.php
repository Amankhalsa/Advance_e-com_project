<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryContoller;
use App\Http\Controllers\Backend\SubCategoryController;



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

Route::get('/phpinfo', function() {
    return phpinfo();
});


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

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


 #######################  Brands  ####################### 

  	// ============== Admin all brands =============

Route::prefix('brand')->group(function(){

Route::get('/view',[BrandController::class, 'brand_view'])->name('all.brand');


// brand.image.store
Route::post('/store',[BrandController::class, 'store_brand_image'])->name('brand.image.store');
// edit.brand
Route::get('/edit/{id}',[BrandController::class, 'edit_brand_image'])->name('edit.brand');
// update.brand
Route::post('/update/{id}',[BrandController::class, 'update_brand_image'])->name('update.brand');
// delete.brand
Route::get('/delete/{id}',[BrandController::class, 'delete_brand_image'])->name('delete.brand');


});
  ########################  Admin all brands end ########################


  #######################  Admin all category #######################


    //for prefix 
  Route::prefix('category')->group(function(){

Route::get('/view',[CategoryContoller::class, 'category_view'])->name('view.all.category');


// brand.image.store
Route::post('/store',[CategoryContoller::class, 'store_category'])->name('category.store');
// edit.brand
Route::get('/edit/{id}',[CategoryContoller::class, 'edit_category'])->name('edit.category');
// update.brand
Route::post('/update/{id}',[CategoryContoller::class, 'update_category'])->name('update.category');
// delete.brand
Route::get('/delete/{id}',[CategoryContoller::class, 'delete_category'])->name('delete.category');

############################# sub category #########################
    //for prefix 



Route::get('/sub-view',[SubCategoryController::class, 'subcategory_view'])->name('view.all.subcategory');


// brand.image.store
Route::post('/store',[CategoryContoller::class, 'store_subcategory'])->name('category.store');
// edit.brand
Route::get('/edit/{id}',[CategoryContoller::class, 'edit_subcategory'])->name('edit.category');
// update.brand
Route::post('/update/{id}',[CategoryContoller::class, 'update_subcategory'])->name('update.category');
// delete.brand
Route::get('/delete/{id}',[CategoryContoller::class, 'delete_subcategory'])->name('delete.category');

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
