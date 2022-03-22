<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\Brand;


class ProductsController extends Controller
{
    //================= Add products page view ===========
    public function add_products(){
    	$data['get_catdata'] = Category::latest()->get();
    	$data['brands'] =Brand::orderBy('brand_name_en')->get();
    	return view('admin.products.product_view',$data);

    }

}
