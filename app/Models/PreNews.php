<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreNews extends Model
{
    use HasFactory;
    protected $fillable = ([
        'pre_unique',
        'desc_am',
        'desc_ru',
        'desc_en',
        'pre_images'
    ]);
}
