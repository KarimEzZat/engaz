@extends('layouts.app')
@section('content')
    <div class="mb-3 mt-3 mt-lg-0">
        <a href="{{ route('galleries.create') }}" class="primary-btn transition" data-text="اضافة صورة">
            <span>اضافة صورة</span>
        </a>
    </div>
    <div class="card card-default">
        <div class="card-header d-flex align-items-center">
            <i class="fa fa-photo fa-2x mr-3"></i>
            معرض الصور
        </div>
        <div class="card-body">
            @if($galleries->count() > 0)
                <table class="table">
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
                    @foreach($galleries as $gallery)
                        <tr>
                            <td>
                                <img width="200px" src="{{ asset('assets/Galleries/'.$gallery->image) }}" alt="Gallery image">
                            </td>
                            <td>{{ $gallery->title }}</td>
                            <td>{{ $gallery->description }}</td>
                            <td>
                                <a href="{{ route('galleries.edit', $gallery->id) }}" class="primary-btn transition"
                                   data-text="تعديل">
                                    <span>تعديل</span>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST">
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
                    لا يوجد بيانات هنا .
                </h3>
            @endif
        </div>
    </div>
@endsection
