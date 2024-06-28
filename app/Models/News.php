<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
      'title_am',
      'title_ru',
      'title_en',
      'description_am',
      'description_ru',
      'description_en',
      'news_unqiue',
      'news_images'
    ];
}
