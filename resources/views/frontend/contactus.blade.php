@extends('layouts.frontend')

@section('content')
    <!-- Begin:: Slider Section -->
    <section class="page_banner" style="background-image: url('{{ asset('frontend/assets/images/banner.jpg') }}');">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="banner-title">تواصل معنا</h2>
                </div>
                <div class="col-md-6 text-right">
                    <p class="breadcrumbs"><a href="{{ route('home') }}" rel="v:url"><i
                                class="twi-home-alt1"></i>الرئيسية</a><span>/</span>تواصل معنا</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Slider Section -->
    <!-- Icon Box Start -->
    <section class="coniconboxPage">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="icon_box_10">
                        <div class="ib_box"><i class="icons-location-pin"></i></div>
                        <h3>العنوان:</h3>
                        <p>
                            {{ $about->address }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon_box_10">
                        <div class="ib_box"><i class="icons-telephone"></i></div>
                        <h3>الجوال</h3>
                        <p>{{$about->phone}},<br> {{ $about->phone_2 }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="icon_box_10">
                        <div class="ib_box"><i class="icons-envelope-1"></i></div>
                        <h3>البريد الالكتروني</h3>
                        <p>{{ $about->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Icon Box End -->
    <!-- Contact Form Start -->
    <section class="contactSection">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-8">
                    <div class="appointment_form">
                        <p>Your email address will not be published*</p>
                        <h3>إرسال رسالة</h3>
                        <form action="{{ route('frontend.contactus.store') }}" method="post" class="row" >
                            @csrf
                            <div class="input-field col-md-6">
                                <i class="twi-user2"></i>
                                <input class="required" type="text" name="name" placeholder="الاسم" required>
                            </div>
                            <div class="input-field col-md-6">
                                <i class="twi-envelope2"></i>
                                <input class="required" type="email" name="email" placeholder="البريد الالكتروني" required>
                            </div>
                            <div class="input-field icRight col-md-12">
                                <select class="required" name="subject" required>
                                    <option selected="selected">اختر الموضوع</option>
                                    @foreach(App\Models\Contactu::SUBJECT_SELECT as $key => $label)
                                        <option value="{{ $key }}" {{ old('subject', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-field col-md-12">
                                <i class="twi-pen2"></i>
                                <textarea class="required" name="message" placeholder="الرسالة"></textarea>
                            </div>

                            <div class="input-field col-md-12">
                                <button type="submit" class="qu_btn">إرسال</button>
                                <div class="con_message"></div>
                            </div>
                        </form>
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
    <!-- Contact Map Start -->
    {{-- <section class="mapSection">
        <div class="google_map" id="google_map"></div>
    </section> --}}
    <!-- Contact Map End -->
@endsection
