<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SocialMedia;
use App\Models\Post;

class BlogController extends Controller
{
    // //
    public function index() {
    $blogs = Post::where('is_published', true)->latest()->paginate(9);
    $setting = Setting::find(1);
    $sosmeds = SocialMedia::where('is_active', true)->get();
    return view('pages.blog.index', compact('blogs', 'setting', 'sosmeds'));
}

public function show($slug) {
    $blog = Post::where('slug', $slug)->firstOrFail();
    $setting = Setting::find(1);
    $sosmeds = SocialMedia::where('is_active', true)->get();
    return view('pages.blog.show', compact('blog', 'setting', 'sosmeds'));
}
}
