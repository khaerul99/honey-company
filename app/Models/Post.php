<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;



class Post extends Model
{
    //
    protected $fillable = ['title', 'slug', 'image', 'author', 'content', 'is_published'];

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

        static::deleted(function ($post) {
            if ($post->image) {
                Storage::disk('cloudinary')->delete($post->image);
            }
        });

        static::updating(function ($post) {
            if ($post->isDirty('image')) {
                Storage::disk('cloudinary')->delete($post->getOriginal('image'));
            }
        });
    }
}
