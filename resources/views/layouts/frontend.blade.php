<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <!-- Author Meta -->
    <meta name="author" content="شركة الانجاز للخدمات المنزلية بالرياض">
    <!-- Meta Description -->
    <meta property="og:title" content="شركة الانجاز للخدمات المنزلية وخدمات العزل بالفوم والنظافة بالرياض"/>
    <meta name="description" content="شركة الانجاز بالرياض ">
    <meta property="og:description" content="شركة الانجاز للتسويق والخدمات المنزلية بالرياض"/>
    <meta property="og:site_name" content="شركة الانجاز للتسويق والخدمات المنزلية بالرياض"/>
    <meta property="og:image:alt" content="شركة الانجاز للخدمات المنزلية والتسويق بالرياض"/>
    <meta name="twitter:description" content="شركة الانجاز شركة لتقديم الخدمات المنزلية والتسويق الالكتروني بالرياض ">
    <meta name="twitter:title" content="شركة الانجاز شركة خدمات منزلية وتسويق بالرياض">
    <meta name="twitter:description" content="شركة الانجاز للخدمات المنزلية والتسويق بالرياض"/>
    <meta property="og:image"
          content="@if(isset($companies) && $companies->count() > 0){{asset('assets/Images/'.$companies->first()->photo)}} @else {{ asset('assets/Images/about.jpg') }} @endif">
    <meta property="og:url" content="{{ route('engaz') }}"/>
    <meta name="twitter:card" content="summary_large_image">
    <meta property="og:image"
          content="@if(isset($companies) && $companies->count() > 0){{asset('assets/Images/'.$companies->first()->photo)}} @else {{ asset('assets/Images/about.jpg') }} @endif">
    <meta name="twitter:image"
          content="@if(isset($companies) && $companies->count() > 0){{asset('assets/Images/'.$companies->first()->photo)}} @else {{ asset('assets/Images/about.jpg') }} @endif">


    <meta charset="UTF-8">
    <meta property="og:locale" content="ar_AR"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   @yield('seo')

    <link rel="icon" href="{{ asset('public/frontend/img/fav.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap-rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/responsive.css') }}">
</head>


<body>
<header class="main_menu">
    @yield('phone')
    <div class="main_menu_iner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ route('engaz') }}">
                            <img src="{{ asset('public/frontend/img/logo.png') }}" alt="شركة الانجاز للخدمات المنزلية بالرياض">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                             id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('engaz') }}">الرئيسية</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_1"
                                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        الخدمات
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        @if(isset($services) && $services->count() > 0)
                                            @foreach($services as $service)
                                                <a class="dropdown-item"
                                                   href="{{ route('services.show', $service->slug) }}">{{$service->title}}</a>

                                            @endforeach
                                        @endif
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('blog.index') }}">المقالات</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="#footer">اتصل بنا</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer class="footer-area" id="footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="footer-top flex-column">
                    <div class="footer-logo text-center">
                        <a href="{{ route('engaz') }}">
                            <img src="{{ asset('public/frontend/img/footer-logo.png') }}"
                                 alt="شركة الانجاز للخدمات المنزلية بالرياض">
                        </a>
                        <h4>يمكنك متابعتي علي</h4>
                    </div>
                    <div class="footer-social text-center">
                        <a target="_blank" href="{{$companies->count() > 0 ? $companies->first()->facebook : '#'}}"><i
                                class="fa fa-facebook transition"></i></a>
                        <a target="_blank" href="{{$companies->count() > 0 ? $companies->first()->twitter : '#' }}"><i
                                class="fa fa-twitter transition"></i></a>
                       @yield('footer-contact')
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer-bottom text-center justify-content-center">
            <p class="col-lg-8 col-sm-12 footer-text">
                كل الحقوق محفوظة لشركة الإنجاز <i class="fa fa-heart-o" aria-hidden="true"></i> تصميم وبرمجة <a
                    href="https://www.facebook.com/karim.ezzt.31" target="_blank">كريم عزت</a>
            </p>
        </div>
    </div>
</footer>
<script src="{{ asset('public/frontend/js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/custom.js') }}"></script>
</body>
</html>
