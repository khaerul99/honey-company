<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    //
    protected $fillable = ['title', 'slug', 'image', 'author', 'content', 'is_published'];

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
