<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class CareProducts extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = [
        'care_product_brand',
        'care_product_title_am',
        'care_product_title_ru',
        'care_product_title_en',
        'care_product_description_am',
        'care_product_description_ru',
        'care_product_description_en',
        'care_product_code',
        'care_product_image'
    ];

    public function searchableAs()
    {
        return 'care_products';
    }
}

