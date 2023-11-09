@extends('layouts.app')

@section('content')
    <div class="mb-3 mt-3 mt-lg-0">
        <a href="{{ route('services.create') }}" class="primary-btn transition" data-text="اضافة خدمة">
            <span>اضافة خدمة</span>
        </a>
    </div>
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="fa fa-server fa-2x mr-3"></i>
            الخدمات
        </div>
        <div class="card-body">
            @if($services->count() > 0)
                <table class="table articles-table">
                    <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>العنوان</th>
                        <th>الوصف</th>
                        <th>التليفون</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>
                                <img width="200px" src="{{ asset('assets/Services/'.$service->image) }}" alt="article image">
                            </td>
                            <td>{{ $service->title }}</td>
                            <td>{{ $service->description }}</td>
                            <td>{{ $service->phone }}</td>
                            <td>
                                <a href="{{ route('services.edit', $service->slug) }}" class="primary-btn transition"
                                   data-text="تعديل">
                                    <span>تعديل</span>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('services.destroy', $service->slug) }}" method="POST">
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
                    لا يوجد اي خدمات هنا
                </h3>
            @endif
        </div>
    </div>
@endsection
