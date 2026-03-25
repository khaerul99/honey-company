<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    //
    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 
        'price', 'weight', 'image', 'is_active'
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

   
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected static function booted()
{
    parent::booted();

    static::updating(function ($product) {
        if ($product->isDirty('image') && $product->getOriginal('image')) {
            Storage::disk('cloudinary')->delete($product->getOriginal('image'));
        }
    });

   static::deleted(function ($product) {
        if ($product->getRawOriginal('image')) { 
            Storage::disk('cloudinary')->delete($product->getRawOriginal('image'));
        }
    });
}
}
