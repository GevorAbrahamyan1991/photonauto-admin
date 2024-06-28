<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCarouselImages extends Model
{
    use HasFactory;
    protected $fillable = [
        "carousel_images","carousel_images_title"
    ];
}
