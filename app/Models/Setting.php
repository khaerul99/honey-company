<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Setting extends Model
{
    //
   protected $fillable = [
        'site_name', 
        'logo', 
        'about_us', 
        'about_us_image',
        'whatsapp', 
        'email', 
        'address'
    ];

        protected function logo(): Attribute
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
    
        protected function aboutUsImage(): Attribute
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

        static::deleted(function ($setting) {
            if ($setting->logo) {
                Storage::disk('cloudinary')->delete($setting->logo);
            }
            if ($setting->about_us_image) {
                Storage::disk('cloudinary')->delete($setting->about_us_image);
            }
        });

        static::updating(function ($setting) {
            if ($setting->isDirty('logo') && $setting->getOriginal('logo')) { 
                Storage::disk('cloudinary')->delete($setting->getOriginal('logo'));
            }
           if ($setting->isDirty('about_us_image') && $setting->getOriginal('about_us_image')) { 
                Storage::disk('cloudinary')->delete($setting->getOriginal('about_us_image'));
            }
        });
    }
}
