<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    //
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }

    public function edit()
    {
        return view('users.edit')->with('user', auth()->user());
    }
    public function update(UpdateProfileRequest $request)
    {
        $input = $request->all();
        $user = auth()->user();
        $input['password'] = Hash::make($request->password);
        $user->update($input);

        session()->flash('success', 'تم تحديث المستخدم بنجاح');
        return redirect()->back();

    }
}
