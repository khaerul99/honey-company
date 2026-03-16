<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Content extends Model
{
    //
    protected $fillable = [
        'image', 
        'title', 
        'description', 
        'is_active', 
        'sort_order'
    ];

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

        static::deleted(function ($content) {
            if ($content->image) {
                Storage::disk('cloudinary')->delete($content->image);
            }
        });

        static::updating(function ($content) {
            if ($content->isDirty('image')) {
                Storage::disk('cloudinary')->delete($content->getOriginal('image'));
            }
        });
    }
}
