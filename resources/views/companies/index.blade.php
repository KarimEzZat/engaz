@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="fa fa-building-o fa-2x mr-3"></i>
            عن الشركة
        </div>
        <div class="card-body">
            @if($companies->count() > 0)
                <form action="{{ route('companies.update', $companies->first()->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">اسم الشركة</label>
                        <input type="text" name="name" id="name" class="form-control"
                               value="{{ $companies->first()->name }}">
                        @if($errors->has('name'))
                            <span class="text-danger font-weight-bold">* {{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="location">موقع الشركة</label>
                        <input type="text" name="location" id="location" class="form-control"
                               value="{{ $companies->first()->location }}">
                        @if($errors->has('location'))
                            <span class="text-danger font-weight-bold">* {{$errors->first('location')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="short_description">وصف قصير</label>
                        <input type="text" name="short_description" id="short_description" class="form-control"
                               value="{{ $companies->first()->short_description }}">
                        @if($errors->has('short_description'))
                            <span class="text-danger font-weight-bold">* {{$errors->first('short_description')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">وصف الشركة</label>
                        <textarea name="description" id="description" cols="5" rows="5"
                                  class="form-control">{{ $companies->first()->description }}</textarea>
                        @if($errors->has('description'))
                            <span class="text-danger font-weight-bold">* {{$errors->first('description')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="facebook">فيس بوك</label>
                        <input class="form-control" type="text" id="facebook" name="facebook"
                               value="{{ $companies->first()->facebook }}">
                        @if($errors->has('facebook'))
                            <span class="text-danger font-weight-bold">* {{$errors->first('facebook')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="twitter">تويتر</label>
                        <input class="form-control" type="text" id="twitter" name="twitter"
                               value="{{ $companies->first()->twitter }}">
                        @if($errors->has('twitter'))
                            <span class="text-danger font-weight-bold">* {{$errors->first('twitter')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">رقم الهاتف</label>
                        <input class="form-control" type="text" id="phone" name="phone"
                               value="{{ $companies->first()->phone }}">
                        @if($errors->has('phone'))
                            <span class="text-danger font-weight-bold">* {{$errors->first('phone')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="keywords">كلمات البحث</label>
                        <textarea name="keywords" id="keywords" cols="5" rows="5"
                                  class="form-control">{{ $companies->first()->keywords }}</textarea>
                        @if($errors->has('keywords'))
                            <span class="text-danger font-weight-bold">* {{$errors->first('keywords')}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="photo">الصورة الخاصة بوصف الشركة</label>
                        <input type="file" id="photo" name="photo" class="form-control">
                        @if($errors->has('photo'))
                            <span class="text-danger font-weight-bold">* {{$errors->first('photo')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        @if(isset($companies->first()->photo))
                            <img width="200" class="img-fluid" src="{{ asset('assets/Images/'. $companies->first()->photo) }}" alt="شركة الانجاز للخدمات المنزلية والتسويق بالرياض">
                        @endif
                    </div>

                    <div class="form-group d-flex justify-content-center">
                        <button class="primary-btn transition"
                                data-text="تحديث الوصف">
                            <span>تحديث الوصف</span>
                        </button>
                    </div>

                </form>
            @else
                <h3 class="text-danger d-flex align-items-center justify-content-center">
                    <i class="fa fa-frown-o fa-2x mr-3"></i>
                    لا يوجد معلومات هنا
                </h3>
            @endif
        </div>
    </div>
@endsection
