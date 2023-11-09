@extends('layouts.frontend')
@section('seo')
    <meta name="keywords" content="@if(isset($service)){{$service->keywords}}@elseif(isset($article)){{$article->service->keywords}}@else{{$companies->first()->keywords}}@endif">
    <title>@if(isset($service))شركة {{ $service->title }} بالرياض{{' '.$service->phone }}@elseif(isset($article))شركة {{$article->service->title}} بالرياض{{' '.$article->service->phone }}@else شركة الانجاز - للخدمات المنزلية والتسويق الالكتروني بالرياض@endif</title>
@endsection
@section('phone')
    @if(isset($service))
        <div class="sub_menu">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-6 col-sm-8">
                        <div class="sub_menu_right_content">
                            <a href="tel:+{{$service->phone}}"
                               title="الاتصال المباشر"><i
                                    class="fa fa-phone"></i>{{$service->phone}}
                            </a>
                            <span>|</span>
                            <div>
                                <i class="fa fa-map-marker"></i>{{ $companies->count() > 0 ? $companies->first()->location : 'لا يوجد موقع للشركة بعد'}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-4">
                        <div class="sub_menu_social_icon d-flex justify-content-end">
                            <a target="_blank"
                               href="{{ $companies->count() > 0 ? $companies->first()->facebook : '#' }}"><i
                                    class="fa fa-facebook"></i></a>
                            <a target="_blank"
                               href="{{ $companies->count() > 0 ? $companies->first()->twitter : '#' }}"><i
                                    class="fa fa-twitter"></i></a>
                            {!! WhatsappBtn::make($service->phone, $service->title . ' ' . $service->title . 'بالرياض'); !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @elseif(isset($article))
        <div class="sub_menu">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-6 col-sm-8">
                        <div class="sub_menu_right_content">
                            <a href="tel:+{{$article->service->phone}}"
                               title="الاتصال المباشر"><i
                                    class="fa fa-phone"></i>{{$article->service->phone}}
                            </a>
                            <span>|</span>
                            <div>
                                <i class="fa fa-map-marker"></i>{{ $companies->count() > 0 ? $companies->first()->location : 'لا يوجد موقع للشركة بعد'}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-4">
                        <div class="sub_menu_social_icon d-flex justify-content-end">
                            <a target="_blank"
                               href="{{ $companies->count() > 0 ? $companies->first()->facebook : '#' }}"><i
                                    class="fa fa-facebook"></i></a>
                            <a target="_blank"
                               href="{{ $companies->count() > 0 ? $companies->first()->twitter : '#' }}"><i
                                    class="fa fa-twitter"></i></a>
                            {!! WhatsappBtn::make($article->service->phone, $article->service->title . 'بالرياض'); !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
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
    @endif
@endsection

@section('footer-contact')
   @if(isset($service))
       <a target="_blank" href="tel:+{{$service->phone}}"
          title="الاتصال المباشر">
           <i class="fa fa-phone transition"></i>
       </a>
       {!! WhatsappBtn::make($service->phone, $service->title . ' ' . $service->title . 'بالرياض'); !!}
       @elseif(isset($article))
       <a target="_blank" href="tel:+{{$article->service->phone}}"
          title="الاتصال المباشر">
           <i class="fa fa-phone transition"></i>
       </a>
       {!! WhatsappBtn::make($article->service->phone, $article->service->title . ' ' . 'بالرياض'); !!}
       @else
       <a target="_blank" href="tel:+{{$companies->count() > 0 ? $companies->first()->phone : null}}"
          title="الاتصال المباشر">
           <i class="fa fa-phone transition"></i>
       </a>
       {!! WhatsappBtn::make($companies->count() > 0 ? $companies->first()->phone : null); !!}
   @endif
@endsection

@section('content')
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            @if(isset($service))
                                <h1>{{ $service->title.' '. 'بالرياض'}}</h1>
                            @elseif(isset($article))
                                <h1>{{ $article->title.' '. 'بالرياض' }}</h1>
                            @else
                                <h1>المدونة</h1>
                            @endif
                            <p><a href="{{ route('engaz') }}">الرئيسية</a> <span>-</span>المدونة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-area section-padding">
        <!-- start section title -->
        <div class="section-title">
            <h2>المقالات</h2>
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
                                                 alt="شركة الانجاز للخدمات المنزلية بالرياض">
                                        </a>
                                        <div class="blog_item_date gradient-bg">
                                            <h4>{{ $article->created_at }}</h4>
                                        </div>
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


                                <!-- start blog pagination-->
                                <nav class="blog-pagination justify-content-center d-flex">
                                    {{ $articles->links() }}
                                </nav>
                                <!-- end blog pagination -->

                        @endforeach

                    @elseif(isset($article))
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
                                    <img class="card-img rounded-0"
                                         src="{{ asset('assets/Articles/'.$article->image) }}"
                                         alt="شركة الانجاز للخدمات المنزلية بالرياض">
                                    <div class="blog_item_date gradient-bg">
                                        <h4>{{ $article->created_at }}</h4>
                                    </div>
                                </div>
                                <!-- end blog item image -->
                                <!-- start blog details -->
                                <div class="blog_details">
                                    <div class="d-inline-block">
                                        <h3>{{ $article->title }}</h3>
                                    </div>
                                    <p>{{ $article->description }}</p>
                                </div>
                                <!-- end blog details -->

                            </article>
                            <!-- end blog item -->
                        @else
                            <h2 class="text-center text-danger mb-3">لا يوجد مقالات بعد</h2>
                        @endif


                    </div>
                    <!-- end blog left sidebar -->

                </div>
            </div>
        </div>
    </section>
@endsection
