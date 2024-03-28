@extends('layouts.frontend')

@section('content')
    <ul id="demo1">  
        @foreach($sliders as $slider)
            <li>
                <img src="{{ $slider->image ? $slider->image->getUrl() : '' }}" />
                <div class="slide-desc">
                    <h1>{{$slider->title}}</h1>
                    <p>
                        {!! nl2br($slider->body) !!}
                    </p>

                    <a href="{{ $slider->link}}" class="qu_btn">{{ $slider->button_name }}</a>
                </div>
            </li>
        @endforeach
    </ul>
    <script>
        (function(i, s, o, g, r, a, m) {
            i["GoogleAnalyticsObject"] = r;
            (i[r] =
                i[r] ||
                function() {
                    (i[r].q = i[r].q || []).push(arguments);
                }),
            (i[r].l = 1 * new Date());
            (a = s.createElement(o)), (m = s.getElementsByTagName(o)[0]);
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m);
        })(
            window,
            document,
            "script",
            "//www.google-analytics.com/analytics.js",
            "ga"
        );

        ga("create", "UA-3415878-12", "dandywebsolution.com");
        ga("send", "pageview");
    </script>
    <!-- About Start -->
    <section class="aboutSection02">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-5">
                    <div class="absThumb">
                        <img src="{{ asset('frontend/assets/images/about_home01.png') }}" alt="" />
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
                                        <i class="twi-check1"></i>الأفضل في مكافحة الحشرات بشهادة
                                        عدد من الهيئات والوزارات الحكومية في المملكة العربية
                                        السعودية
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="listItem">
                                    <li>
                                        <i class="twi-check1"></i>حلول عصرية ومستدامة خلال عملنا
                                        بالأربعين عاماا السابقة لاحظ العملاء فعالية حلول المكافحة
                                        القوية لدينا
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
    <section class="serviceSection02">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="subTitle">
                        <span class="bleft"></span>يسعدنا تقديم جميع الخدمات التالية<span class="bright"></span>
                    </div>
                    <h2 class="secTitle">خدماتــنا</h2>
                </div>
            </div>
            <div class="row">
                @foreach($services as $service)
                <div class="col-xl-3 col-md-6">
                    <div class="icon_box_07 text-center">
                        <div class="ib_box">
                            <img src="{{ $service->icon ? $service->icon->getUrl('preview') : '' }}" width="80" />
                        </div>
                        <h3><a href="{{ route('frontend.services.show',$service->id) }}">{{ $service->name }}</a></h3>
                        <p>
                            {{ $service->short_description }}
                        </p>
                        <a class="sm" href="{{ route('frontend.services.show',$service->id) }}">المزيد<i class="twi-arrow-left"></i></a>
                    </div>
                </div> 
                @endforeach
            </div>
        </div>
    </section>

    <section class="videoFact01">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="subTitle white">
                        <span class="bleft white"></span>فيديو تعريفي
                    </div>
                    <h2 class="secTitle white">كيف نعمل</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="video_banner">
                        <img src="{{ asset('frontend/assets/images/video_pic.jpg') }}" alt="" />
                        <a href="https://player.vimeo.com/video/213907368?h=3685456d6c" class="popup_video"><i class="twi-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Appoinment Start -->
    <section class="appoinmentSection01">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-xl-6">
                    <div class="appointment_form"> 
                        <h3>طلب خدمة</h3>
                        @include('frontend.partials.request-service')
                    </div>
                </div>
                <div class="col-xl-6 pdAcc">
                    <div class="subTitle"><span class="bleft"></span> اسئلة متكررة</div>
                    <h2 class="secTitle">لديك اي استفسار <span>إجابتك هنا</span></h2>
                    <div class="accordion quAccordion" id="quAccordion01">
                        @foreach($faqs as $faq)
                            <div class="card">
                                <div class="card-header" id="ma_ac_{{ $faq->id }}">
                                    <h2 class="mb-0">
                                        <button @if(!$loop->first) class="collapsed" @endif type="button" data-toggle="collapse" data-target="#ma_collapes_{{ $faq->id }}"
                                            data-aria-expanded="true" data-aria-controls="ma_collapes_{{ $faq->id }}">
                                            <span></span>
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                </div>
                                <div id="ma_collapes_{{ $faq->id }}" class="collapse @if($loop->first) show @endif" aria-labelledby="ma_ac_{{ $faq->id }}"
                                    data-parent="#quAccordion01">
                                    <div class="card-body">
                                        {!! nl2br($faq->answer) !!}
                                    </div>
                                </div>
                            </div> 
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Appoinment End -->
    <!-- Client Logo Start -->
    <section class="clientLogo01">
        <div class="container largeContainer">
            <div class="row" style="direction: ltr">
                <div class="col-xl-12 col-md-12">
                    <div class="client-slider owl-carousel">
                        @foreach($about->partners as $key => $media)  
                            <a href="{{ $media->getUrl() }}" target="_blank"><img src="{{ $media->getUrl() }}"
                                alt="" /></a> 
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Logo End -->
@endsection
