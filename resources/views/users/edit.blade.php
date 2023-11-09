@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="fa fa-user fa-2x mr-3"></i>
            ملفي الشخصي
        </div>

        <div class="card-body">
            <form action="{{ route('users.update-profile', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">الاسم</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                    @if($errors->has('name'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">الايميل</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                    @if($errors->has('email'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">كلمة السر الجديدة</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @if($errors->has('password'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('password')}}</span>
                    @endif
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="primary-btn transition" data-text="تحديث الملف الشخصي">
                        <span>تحديث الملف الشخصي</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
