<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryContoller;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Models\User;
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

// Route::get('/', function () {
//     return view('frontend.index');
// });

Route::get('/phpinfo', function() {
    return phpinfo();
});

Route::get('/migration', function() {
    Artisan::call('migrate');
    return "Migration Done ";
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
})->name('dashboard')->middleware('auth:admin');

// ==============admin all routes =============

Route::middleware('auth:admin')->group(function(){
  
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
});

 #######################  Brands  ####################### 

  	// ============== Admin all brands =============
Route::middleware(['auth:admin'])->group(function(){
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
Route::post('/update/{id}',[CategoryContoller::class, 'update_category'])->name('category.update');
// delete.brand
Route::get('/delete/{id}',[CategoryContoller::class, 'delete_category'])->name('delete.category');

############################# sub category #########################
    //for prefix 



Route::get('/sub-view',[SubCategoryController::class, 'subcategory_view'])->name('view.all.subcategory');


// brand.image.store
Route::post('/sub-store',[SubCategoryController::class, 'store_subcategory'])->name('subcategory.store');
// edit.brand
Route::get('/subedit/{id}',[SubCategoryController::class, 'edit_subcategory'])->name('edit.subcategory');
// update.brand
Route::post('/sub/update/{id}',[SubCategoryController::class, 'update_subcategory'])->name('update.subcategory');
// delete.brand
Route::get('/sub/delete/{id}',[SubCategoryController::class, 'delete_subcategory'])->name('delete.subcategory');


############ admin sub sub category ###################
Route::get('/sub/sub/view',[SubCategoryController::class, 'subsubcategory_view'])->name('view.all.subsubcategory');

Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);

Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'Get_Sub_subCategory']);


Route::post('/sub/subcategory/store',[SubCategoryController::class, 'store_Sub_subCategory'])->name('sub.subcategory.store');

Route::get('/sub/subedit/{id}',[SubCategoryController::class, 'edit_sub_subcategory'])->name('edit.sub.subcategory');

Route::post('/sub/subupdate/{id}',[SubCategoryController::class, 'update_sub_subcategory'])->name('sub.subcategory.update');

Route::get('/sub/subdelete/{id}',[SubCategoryController::class, 'delete_sub_subcategory'])->name('delete.sub.subcategory');

// =============================== sub sub ajax ======================




});
// ================ admin all routes end ==============

################### Manage products ###########################
Route::prefix('product')->group(function(){
Route::get('add/products',[ProductsController::class,'add_products'])->name('add.products');
Route::post('store/products',[ProductsController::class,'store_products'])->name('product.store');
Route::get('manage/products',[ProductsController::class,'manage_products'])->name('manage.products');
Route::get('/edit/{id}',[ProductsController::class, 'edit_product'])->name('edit.product');
Route::post('/update/{id}',[ProductsController::class, 'update_product'])->name('update.product');


// update update.thumbnail.image
Route::post('/thumbnail-image-update/{id}',[ProductsController::class, 'thumbnail_image_update'])->name('update.thumbnail.image');



// update.product.image
Route::post('/image-update/',[ProductsController::class, 'multi_image_update'])->name('update.product.image');

// delete multiple image 
Route::get('/multi-image-delete/{id}',[ProductsController::class, 'multi_image_delete'])->name('del.product.image');
// product view route 

Route::get('/product-detail/{id}',[ProductsController::class, 'product_detail'])->name('product.detail');


// ====================== product active inactive routes 
Route::get('/product-active/{id}',[ProductsController::class, 'active_product'])->name('product.active');
Route::get('/product-inactive/{id}',[ProductsController::class, 'inactive_product'])->name('product.inactive');


// delete thubmnail image 
Route::get('/product-delete/{id}',[ProductsController::class, 'delete_product'])->name('delete.product');

// product delete 

  });
################## product prefix end ###########################
#################### slider prefix start ######################
Route::prefix('slider')->group(function(){
Route::get('slider-view',[SliderController::class,'view_slider'])->name('manage.slider');
Route::post('store/slider',[SliderController::class,'store_slider'])->name('store.slider');

Route::get('/edit/{id}',[SliderController::class, 'edit_slider'])->name('edit.slider');
Route::post('/update/{id}',[SliderController::class, 'update_slider'])->name('update.slider');

// delete.slider
Route::get('/delete/{id}',[SliderController::class, 'delete_slider'])->name('delete.slider');
// active 
Route::get('/inactive/{id}',[SliderController::class, 'active_slider'])->name('slider.active');


Route::get('/active/{id}',[SliderController::class, 'inactive_slider'])->name('slider.inactive');
   });
  });

Route::get('/language/hindi', [LanguageController::class, 'Hindi'])->name('hindi.language');

Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');


#################### slider prefix end ######################

  //========================== User router ===================

Route::get('/',[IndexController::class,'index']);
Route::get('/logout',[IndexController::class,'user_logout'])->name('user.logout');
Route::get('/profile',[IndexController::class,'user_profile'])->name('user.profile');
Route::post('/profile/update/',[IndexController::class,'update_user_profile'])->name('user.profile.store');
Route::get('/edit/profile',[IndexController::class,'edit_profile'])->name('edit.profile');
Route::get('/change/password',[IndexController::class,'change_password'])->name('change.user.password');
Route::Post('/update/password',[IndexController::class,'update_user_password'])->name('user.password.update');

// product/details/

Route::get('/product/details/{id}/{slug}', [IndexController::class, 'product_details'])->name('product.details');



#########################################################################


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
       	$id = Auth::user()->id;
    	$data['user'] = User::find($id);
    return view('dashboard',$data);
})->name('dashboard');
