<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

class HeroSlide extends Model
{
    //
    protected $fillable = ['title', 'subtitle', 'description', 'image', 'is_active'];

     protected function image(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                
                if (!$value) return null;
                if (str_starts_with($value, 'http')) {
                    return $value;
                }

                return Storage::disk('cloudinary')->url($value);
            },
        );
    }
    
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
