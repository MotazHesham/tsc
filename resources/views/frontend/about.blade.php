@extends('layouts.frontend')

@section('content')
    <!-- Begin:: Slider Section -->
    <section class="page_banner" style="background-image: url('{{asset('frontend/assets/images/banner.jpg')}}');">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="banner-title">عن الشركة</h2>
                </div>
                <div class="col-md-6 text-right">
                    <p class="breadcrumbs"><a href="{{ route('home') }}" rel="v:url"><i
                                class="twi-home-alt1"></i>الرئيسية</a><span>/</span>عن الشركة</p>
                </div>
            </div>
        </div>
    </section> 
    <!-- End:: Slider Section -->
    
    <!-- About Start -->
    <section class="aboutSection02 ">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-5">
                    <div class="absThumb">
                        <img src="{{ asset('frontend/assets/images/about_home01.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="absCon">
                        <h2 class="secTitle">مركز الخدمات الفنية المحدودة</h2>
                        <div class="subTitle"><span class="bright"></span>من نحن!!</div>
                        <p class="secDesc">
                            {!! nl2br($about->description) !!}
                        </p> 
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="listItem">
                                    <li>
                                        <i class="twi-check1"></i>الأفضل في مكافحة الحشرات بشهادة عدد من
                                        الهيئات والوزارات الحكومية في المملكة
                                        العربية السعودية
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="listItem">
                                    <li>
                                        <i class="twi-check1"></i>حلول عصرية ومستدامة خلال عملنا بالأربعين
                                        عاماا السابقة لاحظ العملاء فعالية حلول
                                        المكافحة القوية لدينا
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->
    <!-- Word Process Start -->
    <section class="videoFact01 bg_fef4f4">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-xl-6">
                    <div class="video_banner">
                        <img src="{{ asset('frontend/assets/images/video_pic.jpg') }}" alt="">
                        <a href="https://player.vimeo.com/video/213907368?h=3685456d6c" class="popup_video"><i
                                class="twi-play"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="fact_02">
                        <h5>خبرة</h5>
                        <h2><span class="counter" data-count="{{ $about->count_experience }}">{{ $about->count_experience }}</span></h2> 
                        <p>سنة خبرة</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="fact_02">
                        <h5>مشروع</h5>
                        <h2><span class="counter" data-count="{{ $about->count_projects }}">{{ $about->count_projects }}</span></h2> 
                        <p>تم تنفيذه</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Word Process End -->
    <!-- Team Start -->
    <section class="teamSection01 bg_fef4f4">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="subTitle"><span class="bleft"></span>فريق عمل متخصص <span class="bright"></span>
                    </div>
                    <h2 class="secTitle">فريق <span>العمل </span></h2>
                </div>
            </div>
            <div class="row">
                @foreach($team_works as $raw)
                    <div class="col-lg-3 col-md-6">
                        <div class="team_01 text-center">
                            <div class="tm_thumb">
                                <img src="{{ $raw->photo ? $raw->photo->getUrl('preview') : asset('frontend/assets/images/team.jpg') }}" alt="">
                                <div class="tm_social">
                                    <a href="{{ $raw->facebook }}"><i class="twi-facebook-f"></i></a>
                                    <a href="{{ $raw->linkedin }}"><i class="twi-linkedin-in"></i></a>
                                    <a href="{{ $raw->twitter }}"><i class="twi-twitter"></i></a>
                                </div>
                                <a class="tmsToggle" href="javascript:void(0);">+</a>
                            </div>
                            <h3>{{ $raw->name }}</h3>
                            <p>{{ $raw->job }}</p>
                        </div>
                    </div> 
                @endforeach
            </div>
        </div>
    </section>
    <!-- Team End -->
    <!-- Related Service Start -->
    <section class="relatedService">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="serviceITem">
                        <img src="{{ asset('frontend/assets/images/cert03.jpg') }}">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="serviceITem">
                        <img src="{{ asset('frontend/assets/images/cert02.jpg') }}">

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="serviceITem">
                        <img src="{{ asset('frontend/assets/images/cert01.jpg') }}">

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Related Service End -->
@endsection
