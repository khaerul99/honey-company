<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
