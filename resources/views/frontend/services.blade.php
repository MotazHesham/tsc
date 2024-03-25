@extends('layouts.frontend')

@section('content')
    <!-- Begin:: Slider Section -->
    <section class="page_banner" style="background-image: url('{{asset('frontend/assets/images/banner2.jpg')}}');">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="banner-title">خدماتنا</h2>
                </div>
                <div class="col-md-6 text-right">
                    <p class="breadcrumbs"><a href="{{ route('home') }}" rel="v:url"><i
                                class="twi-home-alt1"></i>الرئيسية</a><span>/</span>خدماتنا</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Slider Section -->
    <!-- Services Start -->
    <section class="servicePage01">
        <div class="container largeContainer">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="icon_box_09 text-center">
                            <h2>{{ $service->id }}</h2>
                            <div class="ib_box"><img src="{{ $service->icon ? $service->icon->getUrl('preview') : '' }}" width="40" /></div>
                            <div class="srThumb"><img src="{{ $service->image ? $service->image->getUrl('preview') : '' }}" alt=""></div>
                            <h3><a href="{{ route('frontend.services.show',$service->id) }}">{{ $service->name }}</a></h3>
                            <p>{!! $service->short_description !!}</p>
                        </div>
                    </div> 
                @endforeach
            </div>
            {{ $services->links() }}
        </div>
    </section>
    <!-- Services End -->

@endsection
