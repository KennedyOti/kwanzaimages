<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryPageController extends Controller
{
    public function index()
    {
        return view('pages.gallerypage'); // Make sure this matches your view filename
    }
}
