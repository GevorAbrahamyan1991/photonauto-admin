<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnowProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'snow_product_brand',
        'snow_product_title_am',
        'snow_product_title_ru',
        'snow_product_title_en',
        'snow_product_description_am',
        'snow_product_description_ru',
        'snow_product_description_en',
        'snow_product_code',
        'snow_product_image'
    ];
}
