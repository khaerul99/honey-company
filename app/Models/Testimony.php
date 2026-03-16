<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    //
   protected $fillable = ['name', 'photo', 'job', 'rating', 'content', 'is_published'];

   protected function photo(): Attribute
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
}
