@extends('layouts.app')

@section('content')
    <div class="mb-3 mt-3 mt-lg-0">
        <a href="{{ route('articles.create') }}" class="primary-btn transition" data-text="اضافة مقال">
            <span>اضافة مقال</span>
        </a>
    </div>
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="fa fa-paragraph fa-2x mr-3"></i>
            المقالات
        </div>
        <div class="card-body">
            @if($articles->count() > 0)
                <table class="table articles-table">
                    <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>العنوان</th>
                        <th>الوصف</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>
                                <img width="200px" src="{{ asset('assets/Articles/'.$article->image) }}" alt="article image">
                            </td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->description }}</td>
                            <td>
                                <a href="{{ route('articles.edit', $article->slug) }}" class="primary-btn transition"
                                   data-text="تعديل">
                                    <span>تعديل</span>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('articles.destroy', $article->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="primary-btn transition red" data-text="حذف">
                                        <span>حذف</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-danger d-flex align-items-center justify-content-center">
                    <i class="fa fa-frown-o fa-2x mr-3"></i>
                    لا يوجد اي مقالات هنا
                </h3>
            @endif
        </div>
    </div>
@endsection
