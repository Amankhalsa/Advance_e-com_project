<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubSubCategory extends Model
{

        use SoftDeletes;
     protected $fillable = [
        'category_id',
        'subcategory_id',
        'sub_subcategory_name_en',
        'sub_subcategory_name_hin',
        'sub_subcategory_slug_en',
        'sub_subcategory_slug_hin',
  
    ];
    public function category(){
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }
        public function subcategory(){
    	return $this->belongsTo(SubSubCategory::class, 'subcategory_id', 'id');
    }
}
