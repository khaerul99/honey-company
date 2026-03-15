<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    //
   protected $fillable = ['name', 'photo', 'job', 'rating', 'content', 'is_published'];
}
