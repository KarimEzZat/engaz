<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Elawaael Dashboard') }}</title>
    <link rel="icon" href="{{ asset('public/frontend/img/fav.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('public/dashboard/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dashboard/css/linearicons.css') }}">
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fa fa-globe"></i>
                زيارة الموقع
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخول') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.edit-profile') }}">
                                <i class="fa fa-user"></i>
                                ملفي
                                </a>
                                <a class="dropdown-item logout" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                    {{ __('تسجيل الخروج') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @auth
            <div class="container">
                @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-12">
                        <ul class="list-group mb-5">
                            <li class="list-group-item">
                                <a href="{{ route('dashboard') }}">
                                    <i class="fa fa-home"></i>
                                    الرئيسية</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('companies.index') }}">
                                <i class="fa fa-building-o"></i>
                                عن الشركة</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('users.index') }}">
                                <i class="fa fa-users"></i>
                                المستخدمين</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('galleries.index') }}">
                                <i class="fa fa-photo"></i>
                                معرض الصور
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('articles.index') }}">
                                <i class="fa fa-paragraph"></i>
                                المقالات
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('services.index') }}">
                                    <i class="fa fa-server"></i>
                                    الخدمات
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-lg-10 col-md-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        @endauth
    </main>
</div>
</body>
</html>
