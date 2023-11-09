<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::latest()->get();

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required|unique:services',
            'description' => 'required',
            'phone' => 'required|numeric',
            'keywords' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $input = $request->all();
        $file = $request->file('image');

        if ($request->hasFile('image')) {
            $name = preg_replace('/\s+/', '_', time() . '_' . $file->getClientOriginalName());
            $file->move('assets/Services', $name);
            $input['image'] = $name;
        }
        $input['slug'] = $this->slug($request->title);
        Service::create($input);
        session()->flash('success', 'تم اضافة الخدمة بنجاح');

        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
        $articles = $service->articles()->paginate();

        return view('theme.blog', compact('articles', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view('services.create', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'keywords' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        $input = $request->all();
        $file = $request->file('image');

        if ($request->hasFile('image')){
            $name = preg_replace('/\s+/', '_', time() . '_' . $file->getClientOriginalName());

            $oldImage = 'assets/Services/' . $service->image;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $file->move('assets/Services', $name);
            $input['image'] = $name;
        }
        $input['slug'] = $this->slug($request->title);
        $service->update($input);
        session()->flash('success', 'تم تحديث الخدمة بنجاح');

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
        $service->delete();
        $oldImage = 'assets/Services/' . $service->image;
        if ($oldImage) {
            unlink($oldImage);
        }
        session()->flash('success', 'تم حذف الخدمة بنجاح');

        return redirect()->route('services.index');
    }
}
