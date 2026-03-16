<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Gallery extends Model
{
    //
    protected $fillable = ['title', 'image', 'is_active'];

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

        static::deleted(function ($gallery) {
            if ($gallery->image) {
                Storage::disk('cloudinary')->delete($gallery->image);
            }
        });

        static::updating(function ($gallery) {
            if ($gallery->isDirty('image')) {
                Storage::disk('cloudinary')->delete($gallery->getOriginal('image'));
            }
        });
    }
}
