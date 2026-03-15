<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    //
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);

        return view('pages.gallery.index', compact('galleries'));
    }
}
