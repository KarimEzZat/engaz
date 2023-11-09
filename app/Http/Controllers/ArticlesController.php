<?php

namespace App\Http\Controllers;

use App\Http\Requests\Articles\CreateArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Service;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }
    public function index()
    {
        //
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $services = Service::all();
        return view('articles.create', compact('services'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {
        //
        $input = $request->all();
        $file = $request->file('image');

        if ($request->hasFile('image')) {
            $name = preg_replace('/\s+/', '_', time() . '_' . $file->getClientOriginalName());
            $file->move('assets/Articles', $name);
            $input['image'] = $name;
        }
        $input['slug'] = $this->slug($request->title);
        Article::create($input);
        session()->flash('success', 'تم اضافة المقال بنجاح');

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
        return view('theme.blog', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
        $services = Service::all();
       return view('articles.create', compact(['services', 'article']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
        //
        $input = $request->all();
        $file = $request->file('image');

        if ($request->hasFile('image')){
            $name = preg_replace('/\s+/', '_', time() . '_' . $file->getClientOriginalName());
            $oldImage = 'assets/Articles/' . $article->image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $file->move('assets/Articles', $name);
            $input['image'] = $name;
        }
        $input['slug'] = $this->slug($request->title);
        $article->update($input);
        session()->flash('success', 'تم تحديث المقال بنجاح');

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
        $article->delete();
        $oldImage = 'assets/Articles/' . $article->image;
        if ($oldImage) {
            unlink($oldImage);
        }
        session()->flash('success', 'تم حذف المقال بنجاح');

        return redirect()->route('articles.index');
    }
}
