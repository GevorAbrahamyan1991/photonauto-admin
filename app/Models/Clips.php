<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clips extends Model
{
    use HasFactory;
    protected $fillable = [
        'clips_title',
        'clips_code',
        'clips_image',
    ];
}
