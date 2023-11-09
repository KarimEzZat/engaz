@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($service) ? 'تعديل الخدمة' : 'اضافة خدمة'}}
        </div>
        <div class="card-body">
            <form action="{{  isset($service) ? route('services.update', $service->slug) : route('services.store')  }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($service))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">العنوان</label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ isset($service) ? $service->title : '' }}">
                    @if($errors->has('title'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('title')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">وصف الخدمة</label>
                    <textarea name="description" id="description" cols="5" rows="5"
                              class="form-control">{{ isset($service) ? $service->description : '' }}</textarea>
                    @if($errors->has('description'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('description')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">رقم الموبايل</label>
                    <input type="number" name="phone" id="phone" class="form-control"
                           value="{{ isset($service) ? $service->phone : '' }}">
                    @if($errors->has('phone'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('phone')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="keywords">كلمات البحث</label>
                    <textarea name="keywords" id="keywords" cols="5" rows="5"
                              class="form-control">{{ isset($service) ? $service->keywords : '' }}</textarea>
                    @if($errors->has('keywords'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('keywords')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="image">رفع صورة</label>
                    <input type="file" id="image" name="image" class="form-control">
                    @if($errors->has('image'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('image')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    @if(isset($service))
                        <img width="200px" src="{{ asset('assets/Services/'.$service->image) }}" alt="صورة المقال">
                    @endif
                </div>

                <div class="form-group d-flex justify-content-center">
                    <button class="primary-btn transition"
                            data-text="{{ isset($service) ? 'تحديث الخدمة' : 'رفع الخدمة' }}">
                        <span>
                            {{ isset($service) ? 'تحديث الخدمة' : 'رفع الخدمة' }}
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
