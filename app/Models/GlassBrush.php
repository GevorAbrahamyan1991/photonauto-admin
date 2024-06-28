<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlassBrush extends Model
{
    use HasFactory;
    protected $fillable = [
        'brushes_product_brand',
        'brushes_product_type',
        'brushes_product_title_am',
        'brushes_product_title_ru',
        'brushes_product_title_en',
        'brushes_product_desc_am',
        'brushes_product_desc_ru',
        'brushes_product_desc_en',
        'brushes_product_size',
        'brushes_product_code',
        'brushes_product_image'
    ];
}
