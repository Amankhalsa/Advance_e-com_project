<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;
     protected $fillable = [
        'category_id',
        'subcategory_name_en',
        'subcategory_name_hin',
        'subcategory_slug_en',
        'subcategory_slug_hin',
  
    ];
    public function category(){
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
