<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    //
    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 
        'price', 'weight', 'image', 'is_active'
    ];

   
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected static function booted()
{
    parent::booted();

    static::deleted(function ($product) {
        if ($product->image) {
            Storage::disk('cloudinary')->delete($product->image);
        }
    });

    static::updating(function ($product) {
        if ($product->isDirty('image')) {
            Storage::disk('cloudinary')->delete($product->getOriginal('image'));
        }
    });
}
}
