<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreshProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'fresh_product_brand',
        'fresh_product_type',
        'fresh_product_smell',
        'fresh_product_title_am',
        'fresh_product_title_ru',
        'fresh_product_title_en',
        'fresh_product_desc_am',
        'fresh_product_desc_ru',
        'fresh_product_desc_en',
        'fresh_product_code',
        'fresh_product_image',
    ];
}
