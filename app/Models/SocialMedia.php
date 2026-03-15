<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SocialMedia extends Model
{
    //
    protected $fillable = ['platform_name', 'url', 'icon', 'is_active'];

    protected static function booted()
    {
        parent::booted();

        static::deleted(function ($socialMedia) {
            if ($socialMedia->icon) {
                Storage::disk('cloudinary')->delete($socialMedia->icon);
            }
        });

        static::updating(function ($socialMedia) {
            if ($socialMedia->isDirty('icon')) {
                Storage::disk('cloudinary')->delete($socialMedia->getOriginal('icon'));
            }
        });
    }
}
