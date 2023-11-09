@extends('layouts.frontend')
@section('seo')
    <meta name="keywords" content="{{$companies->first()->keywords}}">
    <title>شركة الانجاز - للخدمات المنزلية والتسويق الالكتروني بالرياض</title>

@endsection

@section('phone')
    <div class="sub_menu">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6 col-sm-8">
                    <div class="sub_menu_right_content">
                        <a href="tel:+{{$companies->count() > 0 ? $companies->first()->phone : null}}"
                           title="الاتصال المباشر"><i
                                class="fa fa-phone"></i>{{$companies->count() > 0 ? $companies->first()->phone : 'لا يوجد رقم'}}
                        </a>
                        <span>|</span>
                        <div>
                            <i class="fa fa-map-marker"></i>{{ $companies->count() > 0 ? $companies->first()->location : 'لا يوجد موقع للشركة بعد'}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4">
                    <div class="sub_menu_social_icon d-flex justify-content-end">
                        <a target="_blank" href="{{ $companies->count() > 0 ? $companies->first()->facebook : '#' }}"><i
                                class="fa fa-facebook"></i></a>
                        <a target="_blank" href="{{ $companies->count() > 0 ? $companies->first()->twitter : '#' }}"><i
                                class="fa fa-twitter"></i></a>
                        {!! WhatsappBtn::make($companies->count() > 0 ? $companies->first()->phone : ''); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-contact')
    <a target="_blank" href="tel:+{{$companies->count() > 0 ? $companies->first()->phone : null}}"
       title="الاتصال المباشر">
        <i class="fa fa-phone transition"></i>
    </a>
    {!! WhatsappBtn::make($companies->count() > 0 ? $companies->first()->phone : null); !!}
@endsection

@section('content')
    <!-- Banner Section -->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="banner_text text-center">
                        <div class="banner_text_iner">
                            <h5>أهلا بكم في<span> !</span></h5>
                            <h1>{{ $companies->count() > 0 ? $companies->first()->name : "لم تقم بتسمية الشركة بعد " }}</h1>
                            <div>{{ $companies->count() > 0 ? $companies->first()->short_description : "لا يوجد وصف قصير للشركة" }}</div>
                            <a href="#footer" class="btn_1">تواصل معي</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Section -->

    <!-- Start Services Area -->
    <section class="services-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(isset($services) && $services->count() > 0)
                        @foreach($services as $service)
                            <div class="single-service {{$loop->last ? 'mb-0' : 'mb-5'}}">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-4 mb-md-0">
                                        <div class="service-image">
                                            <img class="img-fluid" src="{{ asset('assets/Services/'.$service->image) }}"
                                                 alt="{{$service->title}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="service-description">
                                            <h2 class="mb-3">{{ $service->title }}</h2>
                                            <p>{{ $service->description }}</p>

                                            <div class="sub_menu_social_icon d-flex justify-content-end mt-3">
                                                <a class="ml-5 text-white" href="tel:+{{$service->phone}}"
                                                   title="الاتصال المباشر"><i
                                                        class="fa fa-phone"></i>
                                                </a>
                                                {!! WhatsappBtn::make($service->phone, $service->title.' '."بالرياض"); !!}
                                            </div>

                                            <a class="btn_1" href="{{ route('services.show', $service->slug) }}">اقرا
                                                المزيد</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h2 class="text-danger text-center">لا توجد خدمات حاليا</h2>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Area -->

    <!-- About Section -->
    <section class="about-area section-padding" id="about">
        <!-- start section title -->
        <div class="section-title">
            <h2>عن الشركة</h2>
            <span></span>
        </div>
        <!-- end section title -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 mb-3 mb-lg-0">
                    <span
                        class="subheading">{{ $companies->count() > 0 ? $companies->first()->name : 'لم تقم بتسمية الشركة بعد '}}</span>
                    <p class="about-description">
                        {!! $companies->count() > 0 ? $companies->first()->description : "لا يوجد وصف للشركة" !!}
                    </p>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-img">
                        @if($companies->count() > 0)
                            <img class="img-fluid" src="{{ asset('assets/Images/'.$companies->first()->photo) }}"
                                 alt="شركة الانجاز للخدمات المنزلية والتسويق بالرياض">
                        @else
                            <h2>لا يوجد صورة</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Gallery Area -->
    {{--    <section class="gallery-area section-padding">--}}
    {{--        <div class="container">--}}
    {{--            @if(isset($galleries) && $galleries->count() > 0)--}}
    {{--                <div id="demo" class="carousel slide" data-ride="carousel">--}}
    {{--                    <ul class="carousel-indicators">--}}
    {{--                        @foreach($galleries as $gallery)--}}
    {{--                            <li data-target="#demo" data-slide-to="{{ $loop->index }}"--}}
    {{--                                class="{{ $loop->first ? 'active' : '' }}"></li>--}}
    {{--                        @endforeach--}}
    {{--                    </ul>--}}
    {{--                    <div class="carousel-inner">--}}
    {{--                        @foreach($galleries as $gallery)--}}
    {{--                            <div class="carousel-item {{ $loop->first ? ' active' : '' }}">--}}
    {{--                                <img src="{{ asset('assets/Galleries/') }}/{{ $gallery->image }}"--}}
    {{--                                     alt="افضل شركة لكشف تسربات المياه بالرياض شركة الاوائل" width="1100" height="500">--}}
    {{--                                <div class="carousel-caption">--}}
    {{--                                    <h3>{{ $gallery->title }}</h3>--}}
    {{--                                    <p>{{ $gallery->description }}</p>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        @endforeach--}}
    {{--                    </div>--}}
    {{--                    <a class="carousel-control-prev" href="#demo" data-slide="prev">--}}
    {{--                        <span class="carousel-control-prev-icon"></span>--}}
    {{--                    </a>--}}
    {{--                    <a class="carousel-control-next" href="#demo" data-slide="next">--}}
    {{--                        <span class="carousel-control-next-icon"></span>--}}
    {{--                    </a>--}}
    {{--                </div>--}}
    {{--            @else--}}
    {{--                <h2 class="text-center text-danger">المعرض فارغ حاليا</h2>--}}
    {{--            @endif--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- End Gallery Area -->

    <!-- Blog Area -->
    <section class="blog-area section-padding" id="blog">
        <!-- start section title -->
        <div class="section-title">
            <h2>أحدث المقالات</h2>
            <span></span>
        </div>
        <!-- end section title -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- start blog left sidebar -->
                    <div class="blog_left_sidebar">

                    @if(isset($articles) && $articles->count() > 0)
                        @foreach($articles as $article)
                            <!-- start blog item -->
                                <article class="blog_item">
                                    <div class="sub_menu_social_icon d-flex justify-content-end mt-3">
                                        <a class="ml-5 text-white" href="tel:+{{$article->service->phone}}"
                                           title="الاتصال المباشر"><i
                                                class="fa fa-phone"></i>
                                        </a>
                                        {!! WhatsappBtn::make($article->service->phone, $article->service->title.' '."بالرياض"); !!}
                                    </div>

                                    <!-- start blog item image -->
                                    <div class="blog_item_img">
                                        <a href="{{ route('articles.show', $article->slug) }}">
                                            <img class="card-img rounded-0"
                                                 src="{{ asset('assets/Articles/'.$article->image) }}"
                                                 alt="شركة الانجاز للخدمات المنزلية والتسويق بالرياض">
                                        </a>
                                        <div class="blog_item_date gradient-bg">
                                            <h4>{{ $article->created_at }}</h4>
                                        </div>
                                        {{--                                        <a class="btn_1" href="{{ route('services.show', $service->slug) }}">اقرا--}}
                                        {{--                                            المزيد</a>--}}
                                    </div>
                                    <!-- end blog item image -->
                                    <!-- start blog details -->
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="{{ route('articles.show', $article->slug) }}">
                                            <h3>{{ $article->title }}</h3>
                                        </a>
                                        <p>{{ $article->description }}</p>
                                    </div>
                                    <!-- end blog details -->

                                </article>
                                <!-- end blog item -->
                            @endforeach
                        @else
                            <h2 class="text-center text-danger mb-3">لا يوجد مقالات بعد</h2>
                        @endif
                    </div>
                    <!-- end blog left sidebar -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Area -->
@endsection
