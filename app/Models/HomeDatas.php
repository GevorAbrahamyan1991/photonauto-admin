<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeDatas extends Model
{
    use HasFactory;
    protected $fillable = [
        "tel",
        "email",
        "address_am",
        "address_ru",
        "address_en",
        'insta_link',
        'face_link',
        'youtube_link',
        'telegram_link',
        'vk_link',
    ];
}