<?php

namespace App\Http\Controllers;

use App\Models\Article;

class BlogPageController extends Controller
{
    //
    function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('theme.blog', compact('articles'));
    }
}
