@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <i class="fa fa-dashboard fa-2x mr-3"></i>
            {{ __('لوحة التحكم') }}
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <p>مرحبا {{ Auth::user()->name }}</p>
        </div>
    </div>
@endsection
