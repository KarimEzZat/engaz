@if (isset($service))
    <div class="sub_menu">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6 col-sm-8">
                    <div class="sub_menu_right_content">
                        <a href="tel:+{{$service->count() > 0 ? $service->phone : null}}"
                           title="الاتصال المباشر"><i
                                class="fa fa-phone"></i>{{$service->count() > 0 ? $service : 'لا يوجد رقم'}}
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
                        {!! WhatsappBtn::make($service->count() > 0 ? $service->phone : ''); !!}
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
