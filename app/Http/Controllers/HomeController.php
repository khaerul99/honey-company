<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Setting;
use App\Models\HeroSlide;
use App\Models\Content;
use App\Models\Testimony;
use App\Models\SocialMedia;
use App\Models\Faq;



class HomeController extends Controller
{
    //
   public function index()
    {
        // 1. Ngambil data banner (Content) yang aktif
        $heros = HeroSlide::where('is_active', true)->get();

        // 2. Ngambil data produk terbaru (misal 4 saja)
        $products = Product::latest()->take(4)->get();

        $setting = Setting::first();

        $contents = Content::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        $testimonies = Testimony::where('is_published', true)->latest()->get();

        $sosmeds = SocialMedia::where('is_active', true)->get();

        $faqs = Faq::where('is_active', true)->orderBy('sort_order', 'asc')->get();

        // 4. Kirim semua data ke file welcome.blade.php
        return view('pages.home.index', compact('heros', 'products', 'setting', 'contents', 'testimonies', 'sosmeds', 'faqs'));
    }

 }
