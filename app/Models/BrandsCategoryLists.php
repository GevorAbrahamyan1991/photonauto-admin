<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandsCategoryLists extends Model
{
    use HasFactory;
    protected $fillable = ([
        'brand_unique',
        'category_list',
        'category_images'
    ]);
}
