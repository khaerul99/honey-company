<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

class SocialMedia extends Model
{
    //
    protected $fillable = ['platform_name', 'url', 'icon', 'is_active'];

        protected function icon(): Attribute
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

        static::updating(function ($socialMedia) {
            if ($socialMedia->isDirty('icon')) {
                Storage::disk('cloudinary')->delete($socialMedia->getOriginal('icon'));
            }
        });

        static::deleted(function ($socialMedia) {
            if ($socialMedia->getRawOriginal('icon')) { 
                Storage::disk('cloudinary')->delete($socialMedia->getRawOriginal('icon'));
            }
        });
    }
}
