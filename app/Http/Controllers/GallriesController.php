<?php

namespace App\Http\Controllers;

use App\Http\Requests\Galleries\CreateGalleryRequest;
use App\Http\Requests\Galleries\UpdateGalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GallriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $galleries = Gallery::latest()->get();
        return view('galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGalleryRequest $request)
    {
        //
        $input = $request->all();
        $file = $request->file('image');

        if ($request->hasFile('image')) {
            $name = $file->getClientOriginalName();
            $file->move('assets/Galleries', $name);
            $input['image'] = $name;
        }
        Gallery::create($input);
        session()->flash('success', 'تم اضافة الصورة الي المعرض بنجاح');

        return redirect()->route('galleries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
        return view('galleries.create', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        //
        $input = $request->all();
        $file = $request->file('image');

        if ($request->hasFile('image')){
            $name = $file->getClientOriginalName();
            $oldImage = 'assets/Galleries/' . $gallery->image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $file->move('assets/Galleries', $name);
            $input['image'] = $name;
        }
        dd($input);
        //$gallery->update($input);
       //session()->flash('success', 'تم تحديث صورة المعرض بنجاح');

        //return redirect()->route('galleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        //
        $gallery->delete();
        $oldImage = 'assets/Galleries/' . $gallery->image;
        if ($oldImage) {
            unlink($oldImage);
        }
        session()->flash('success', 'تم حذف صورة المعرض بنجاح');

        return redirect()->route('galleries.index');
    }
}
