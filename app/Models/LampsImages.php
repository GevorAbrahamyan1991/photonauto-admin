<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LampsImages extends Model
{
    use HasFactory;
    protected $fillable=[
        'gallery_images',
        'post_id',
    ];
    public function tours(){
        return $this->belongsTo(Lamps::class);
    }
}