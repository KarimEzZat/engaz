<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'location' => 'required',
            'keywords' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'phone' => 'required|numeric',
        ]);
        $input = $request->all();
        $file = $request->file('photo');
        if ($request->hasFile('photo')) {
            $oldImage = 'assets/Images/' . $company->photo;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $name = $file->getClientOriginalName();
            $file->move('assets/Images', $name);
            $input['photo'] = $name;
        }
        $company->update($input);
        session()->flash('success', 'تم تحديث وصف الشركة بنجاح');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
