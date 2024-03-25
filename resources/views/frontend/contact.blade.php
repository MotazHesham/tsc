@extends('layouts.frontend')

@section('content')
    <!-- Begin:: Slider Section -->
    <section class="page_banner" style="background-image: url('{{ asset('frontend/assets/images/banner.jpg') }}');">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="banner-title"> طلب خدمة</h2>
                </div>
                <div class="col-md-6 text-right">
                    <p class="breadcrumbs"><a href="{{ route('home') }}" rel="v:url"><i
                                class="twi-home-alt1"></i>الرئيسية</a><span>/</span> طلب خدمة </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Slider Section -->

    <!-- Contact Form Start -->
    <section class="contactSection">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-8">
                    <div class="appointment_form">
                        <p>Your email address will not be published*</p>
                        <h3> طلب خدمة</h3>
                        @include('frontend.partials.request-service')
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="chatNow">
                        <h4>طلب خدمة</h4>
                        <p> لطلب الخدمات او تحديد موعد رجاء اضغط هنا</p>
                        <a href="#" class="qu_btn">اضغط هنا</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Form End -->
@endsection
