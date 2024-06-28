<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandSingle extends Model
{
    use HasFactory;
    protected $fillable = ([
        'brand_name',
        'desc_am',
        'desc_ru',
        'desc_en',
        'brand_unique'
    ]);
}
