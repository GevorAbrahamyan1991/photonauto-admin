<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'location',
        'title_am',
        'title_ru',
        'title_en',
        'description_am',
        'description_ru',
        'description_en',
        'about_images',
    ];
}
