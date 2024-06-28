<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForHomes extends Model
{
    use HasFactory;
    protected $fillable = [
      'for_home_title_am',
      'for_home_title_ru',
      'for_home_title_en',
      'for_home_description_am',
      'for_home_description_ru',
      'for_home_description_en',
      'for_home_code',
      'for_home_image',
    ];
}
