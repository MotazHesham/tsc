@extends('layouts.frontend')

@section('content')
    <!-- Begin:: Slider Section -->
    <section class="page_banner" style="background-image: url('{{ asset('frontend/assets/images/banner.jpg') }}');">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="banner-title">عملاؤنا </h2>
                </div>
                <div class="col-md-6 text-right">
                    <p class="breadcrumbs"><a href="{{ route('home') }}" rel="v:url"><i
                                class="twi-home-alt1"></i>الرئيسية</a><span>/</span>تواصل معنا</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Slider Section -->
    <div class="container singleServicePage">
        <div class="row">

            <div class="col-md-12 col-lg-12">
                <div class="widget gallery">
                    <div class="galleryShots">

                        <div class="row">
                            @foreach($about->partners as $key => $media)  
                                <div class="col-md-3">
                                    <a class="popup_img" href="{{ $media->getUrl() }}"><img src="{{ $media->getUrl() }}"
                                            alt=""></a> 
                                </div>  
                            @endforeach
                        </div> 
                    </div>

                </div>
            </div>
        </div> 
    </div> 
@endsection
