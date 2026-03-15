<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HeroSlide extends Model
{
    //
    protected $fillable = ['title', 'subtitle', 'description', 'image', 'is_active'];
    
    protected static function booted()
{
    parent::booted();

    static::deleted(function ($heroSlide) {
        if ($heroSlide->image) {
            Storage::disk('cloudinary')->delete($heroSlide->image);
        }
    });

    static::updating(function ($heroSlide) {
    if ($heroSlide->isDirty('image')) {
        Storage::disk('cloudinary')->delete($heroSlide->getOriginal('image'));
    }
});
}

    
}
