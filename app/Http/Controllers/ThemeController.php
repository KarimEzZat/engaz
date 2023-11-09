<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Service;

class ThemeController extends Controller
{
    //
    public function index()
    {
        return view('theme.landing', [
            'galleries' => Gallery::latest()->get(),
            'articles' => Article::latest()->take(10)->get(),
            'services' => Service::latest()->get()
        ]);
    }
}
