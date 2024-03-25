@extends('layouts.frontend')

@section('content')
    <!-- Begin:: Slider Section -->
    <section class="page_banner" style="background-image: url('{{ asset('frontend/assets/images/banner2.jpg') }}');">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="banner-title">مكافحة الحشرات الزاحفة</h2>
                </div>
                <div class="col-md-6 text-right">
                    <p class="breadcrumbs"><a href="{{ route('home') }}" rel="v:url"><i
                                class="twi-home-alt1"></i>الرئيسية</a><span>/</span>مكافحة الحشرات الزاحفة</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Slider Section -->
    <!-- Service Detailss Start -->
    <section class="singleServicePage">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-xl-6">
                    <div class="ssThumb">
                        <img src="{{ asset('frontend/assets/images/single_service.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="ssContent">
                        <div class="subTitle">طرق فعالة وسهلة وامنة لمكافحة الحشرات</div>
                        <h2 class="secTitle">مكافحة الحشرات الزاحفة</h2>
                        <p>
                            الحشرات الزاحفة مثل الصراصير وتنقسم انواع الصراصير الى الصرصور
                            الامريكي وهو كبير الحجم ودائما يكون مصدرها غرف التفتيش في الخارج وتتم
                            اعمال المكافحة بمبيدات ذات رائحة قوية وفعالة يتم رشها في غرف التفتيش
                            الخارجية .
                            النوع الثاني الصرصور الالماني وحجمه صغير وتكون في الداخل وخصوصا
                            في المطابخ ومن هنا يجب التأكد من فحص أي مشتريات خارجية لأنها قد تحمل
                            بيض للصراصير والحشرات وتتم مكافحتها باستخدام مبيدات فعالة وبدون
                            رائحة ويتم التركيز في الرش على المطابخ وفتحات التصريف الداخلية
                            والحمامات ويمكن استخدام مواد جيلاتينية بدون رائحة يتم وضعها في اماكن
                            مخفية تقضى على الصراصير أما بق الفراش فيستخدم لمكافحته مبيدات خاصة
                            تتكفل بالقضاء عليه
                        </p>
                        <div class="ssQuote">
                            <img src="{{ asset('frontend/assets/images/single_service2.jpg') }}" alt="">
                            <p>
                                والحمامات ويمكن استخدام مواد جيلاتينية بدون رائحة يتم وضعها في اماكن
                                مخفية تقضى على الصراصير أما بق الفراش فيستخدم لمكافحته مبيدات خاصة
                                تتكفل بالقضاء عليه
                            </p>
                        </div>
                        <p>
                            الحشرات الزاحفة مثل الصراصير وتنقسم انواع الصراصير الى الصرصور
                            الامريكي وهو كبير الحجم ودائما يكون مصدرها غرف التفتيش في الخارج وتتم
                            اعمال المكافحة بمبيدات ذات رائحة قوية وفعالة يتم رشها في غرف التفتيش
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Details End -->
    <!-- Why Choose Start -->
    <section class="appoinmentSection01">

        <div class="container largeContainer">
            <div class="row">
                <div class="col-xl-6">
                    <div class="appointment_form">
                        <p>يمكنك الان طلب الخدمات بطريقة سهلة وسريعة</p>
                        <h3> طلب خدمة </h3>
                        <form action="#" method="post" class="row" id="contact_form">
                            <div class="input-field col-md-6">
                                <i class="twi-user2"></i>
                                <input class="required" type="text" name="con_name" placeholder="الاسم">
                            </div>
                            <div class="input-field col-md-6">
                                <i class="twi-envelope2"></i>
                                <input class="required" type="email" name="con_email" placeholder="البريد الالكتروني">
                            </div>
                            <div class="input-field col-md-6">
                                <i class="twi-map-marker-alt2"></i>
                                <input type="text" name="con_location" placeholder="المكان">
                            </div>
                            <div class="input-field col-md-6 select-area">
                                <select class="required" name="con_subject" style="display: none;">
                                    <option selected="selected">الخدمة</option>
                                    <option>حشرات الطائرة</option>
                                    <option>القوارض</option>
                                    <option>حيوانات ضالة</option>
                                    <option>تعقيم</option>
                                </select>
                                <div class="nice-select required" tabindex="0"><span class="current">الخدمة</span>
                                    <ul class="list">
                                        <li data-value="الخدمة" class="option selected">الخدمة</li>
                                        <li data-value="حشرات الطائرة" class="option">حشرات الطائرة</li>
                                        <li data-value="القوارض" class="option">القوارض</li>
                                        <li data-value="حيوانات ضالة" class="option">حيوانات ضالة</li>
                                        <li data-value="تعقيم" class="option">تعقيم</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="input-field col-md-12">
                                <i class="twi-comment-lines2"></i>
                                <textarea class="required" name="con_message" placeholder="تفاصيل أضافية"></textarea>
                            </div>
                            <div class="input-field col-md-12">
                                <button type="submit" class="qu_btn">أرسال</button>
                                <div class="con_message"></div>
                            </div>
                        </form>
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
    <!-- Why Choose End -->
@endsection
