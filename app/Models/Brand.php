<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
              
class Brand extends Model
{
    use SoftDeletes;
 protected $fillable = [
        'brand_name_en',
        'brand_name_hin',
        'brand_slug_en',
        'brnad_slug_hin',
        'brand_image',
    ];
}
