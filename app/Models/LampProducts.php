<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LampProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        'lamp_product_brand',
        'lamp_product_type',
        'lamp_product_slot',
        'lamp_product_title_am',
        'lamp_product_title_ru',
        'lamp_product_title_en',
        'lamp_product_desc_am',
        'lamp_product_desc_ru',
        'lamp_product_desc_en',
        'lamp_product_code',
        'lamp_product_image',
    ];
}
