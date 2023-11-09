@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($gallery) ? 'تعديل صورة' : 'اضافة صورة'}}
        </div>
        <div class="card-body">
            <form action="{{  isset($gallery) ? route('galleries.update', $gallery->id) : route('galleries.store')  }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($gallery))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">العنوان</label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ isset($gallery) ? $gallery->title : '' }}">
                    @if($errors->has('title'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('title')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">وصف صورة المعرض</label>
                    <textarea name="description" id="description" cols="5" rows="5"
                              class="form-control">{{ isset($gallery) ? $gallery->description : '' }}</textarea>
                    @if($errors->has('description'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('description')}}</span>
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
                    @if(isset($gallery))
                        <img width="200px" src="{{ asset('assets/Galleries/'.$gallery->image) }}" alt="صورة المعرض">
                    @endif
                </div>

                <div class="form-group d-flex justify-content-center">
                    <button class="primary-btn transition"
                            data-text="{{ isset($gallery) ? 'تحديث الصورة' : 'رفع الصورة' }}">
                        <span>
                            {{ isset($gallery) ? 'تحديث الصورة' : 'رفع الصورة' }}
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
