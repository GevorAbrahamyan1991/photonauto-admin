<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interier extends Model
{
    use HasFactory;
    protected $fillable = [
        'interier_title_am',
        'interier_title_ru',
        'interier_title_en',
        'interier_description_am',
        'interier_description_ru',
        'interier_description_en',
        'interier_code',
        'interier_image',
    ];
}
