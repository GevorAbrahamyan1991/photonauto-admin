<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Lamps extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_am',
        'title_ru',
        'title_en',
        'text_am',
        'text_ru',
        'text_en',
        'cover_image',
        'gallery_images',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($lamps) {
            $lamps->slug = strtolower(str_replace(' ', '-', $lamps->title_en));
        });

        static::deleting(function ($lamps) {
            $images = $lamps->images()->get();
            $lamps->images()->delete();
            foreach ($images as $image) {
                File::delete(public_path('uploads/' . $image->gallery_images));
            }
        });
    }
    public function images()
    {
        return $this->hasMany(LampsImages::class);
    }
}