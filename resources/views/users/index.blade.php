@extends('layouts.app')
@section('content')
    <div class="card card-default">
        <div class="card-header d-flex align-items-center">
            <i class="fa fa-users fa-2x mr-3"></i>
            المستخدمين
        </div>
        <div class="card-body">
            @if($users->count() > 0)
                <table class="table">
                    <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الايميل</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-danger d-flex align-items-center justify-content-center">
                    <i class="fa fa-frown-o fa-2x mr-3"></i>
                    لا يوجد أي مستخدم.
                </h3>
            @endif
        </div>
    </div>
@endsection
