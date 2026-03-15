<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SocialMedia;

class ProductController extends Controller
{
    //
    public function index()
{
    $products = Product::where('is_active', true)->latest()->paginate(9);
    $setting = Setting::find(1);
    $sosmeds = SocialMedia::where('is_active', true)->get();
    return view('pages.products.index', compact('products', 'setting', 'sosmeds'));
}

public function show($slug)
{
    $product = Product::where('slug', $slug)->firstOrFail();
    $setting = Setting::find(1);
    $sosmeds = SocialMedia::where('is_active', true)->get();
    return view('pages.products.show', compact('product', 'setting', 'sosmeds'));
}
}
