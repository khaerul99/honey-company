<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    //
    protected $fillable = ['title', 'image', 'is_active'];

 
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
