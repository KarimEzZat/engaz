@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($article) ? 'تعديل مقال' : 'اضافة مقال'}}
        </div>
        <div class="card-body">
            <form action="{{  isset($article) ? route('articles.update', $article->slug) : route('articles.store')  }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($article))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">العنوان</label>
                    <input type="text" name="title" id="title" class="form-control"
                           value="{{ isset($article) ? $article->title : '' }}">
                    @if($errors->has('title'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('title')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">وصف المقال</label>
                    <textarea name="description" id="description" cols="5" rows="5"
                              class="form-control">{{ isset($article) ? $article->description : '' }}</textarea>
                    @if($errors->has('description'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('description')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="service_id">نوع المقال</label>
                    <select name="service_id" id="service_id" class="form-control">
                        <option>نوع المقالة</option>
                        @if(isset($services))
                            @foreach($services as $service)
                                <option
                                    value="{{$service->id}}" @if (isset($article, $service, $article->service) && $article->service->title == $service->title) {{'selected'}}@else {{''}} @endif>{{ $service->title }}</option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has('service_id'))
                        <span class="text-danger font-weight-bold">* {{$errors->first('service_id')}}</span>
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
                    @if(isset($article))
                        <img width="200px" src="{{ asset('assets/Articles/'.$article->image) }}" alt="صورة المقال">
                    @endif
                </div>

                <div class="form-group d-flex justify-content-center">
                    <button class="primary-btn transition"
                            data-text="{{ isset($article) ? 'تحديث المقال' : 'رفع المقال' }}">
                        <span>
                            {{ isset($article) ? 'تحديث المقال' : 'رفع المقال' }}
                        </span>
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
