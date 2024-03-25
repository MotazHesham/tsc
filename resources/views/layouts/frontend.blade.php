<!DOCTYPE html>
<html lang="en">

<head>
    <title>TSC</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />

    <!-- Start Include All CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/themewar-font.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/quera-icon.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/lightcase.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/fonts/stylesheet.css') }}" />

    <!-- Revolution Slider Setting CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/settings.css') }}" />

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/preset.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/ignore_for_wp.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}" />
    <script src="https://kit.fontawesome.com/e0387e9a75.js"></script>
    <!-- End Include All CSS -->
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/assets/images/favicon.png') }}" />
    <!-- Favicon Icon -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="{{ asset('frontend/src/skdslider.min.js') }}"></script>
    <link href="{{ asset('frontend/src/skdslider.css') }}" rel="stylesheet" />
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery("#demo1").skdslider({
                delay: 5000,
                animationSpeed: 2000,
                showNextPrev: true,
                showPlayButton: true,
                autoSlide: true,
                animationType: "sliding"
            });

            jQuery("#responsive").change(function() {
                $("#responsive_wrapper").width(jQuery(this).val());
            });
        });
    </script>
</head>

<body> 
    <!-- Preloading -->
    <div class="preloader clock text-center">
        <div class="">
            <div class="loaderO">
                <img src="{{ asset('frontend/assets/images/loader.gif') }}" />
            </div>
        </div>
    </div>
    <!-- Preloading -->

    <!-- Header Start -->
    <header class="header01 isSticky">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('frontend/assets/images/logo.png') }}" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="topbar">
                        <p><i class="fa fa-mobile" aria-hidden="true"></i> {{ $about->phone ?? '' }}</p>
                        <p>
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            {{ $about->email ?? '' }}
                        </p>
                    </div>
                    <div class="navbar01">
                        <nav class="mainMenu">
                            <ul>
                                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                                <li><a href="{{ route('frontend.about') }}">من نحن </a></li>
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">خدمات مكافحة الحشرات</a>
                                    <ul class="sub-menu"> 
                                        @foreach($services as $service)
                                            <li><a href="{{ route('frontend.services.show',$service->id) }}">{{ $service->name }} </a></li> 
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route('frontend.sterilization') }}">التعقيم</a></li>
                                <li><a href="{{ route('frontend.clients') }}">عملاؤنا</a></li>

                                <li><a href="{{ route('frontend.contactus.index') }}">تواصل معنا </a></li>
                            </ul>
                        </nav>
                        <div class="accessNav">
                            <a href="javascript:void(0);" class="menuToggler"><i class="twi-bars1"></i></a>

                            <a href="{{ route('frontend.contact') }}" class="qu_btn">طلب خدمة</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Begin:: Popup Menu -->
    <section class="sidebarMenu">
        <div class="sidebarMenuOverlay"></div>
        <div class="SMArea">
            <div class="SMAHeader">
                <h3><i class="twi-bars1"></i> القائمة</h3>
                <a href="javascript:void(0);" class="SMACloser"><i class="twi-times2"></i></a>
            </div>
            <div class="SMABody">
                <ul>
                    <li><a href="{{ route('home') }}">الرئيسية</a></li>
                    <li><a href="{{ route('frontend.about') }}">من نحن </a></li>

                    <li class="menu-item-has-children">
                        <a href="javascript:void(0);">خدمات مكافحة الحشرات</a>
                        <ul class="sub-menu">
                            @foreach($services as $service)
                                <li><a href="{{ route('frontend.services.show',$service->id) }}">{{ $service->name }} </a></li> 
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('frontend.sterilization') }}">التعقيم</a></li>
                    <li><a href="{{ route('frontend.clients') }}">عملاؤنا</a></li>

                    <li><a href="{{ route('frontend.contactus.index') }}">تواصل معنا </a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End:: Popup Menu -->

    @yield('content')

    <!-- Footer Section -->
    <footer class="footer_01">
        <div class="container largeContainer">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="aboutWidget">
                        <h3 class="widget_title">نبذة عنا</h3>

                        <p>
                            {!! $about->footer_description !!}
                        </p>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="widget PL28">
                        <h3 class="widget_title">روابط سريعة</h3>
                        <ul class="menu">
                            <li><a href="{{ route('frontend.about') }}">من نحن</a></li>
                            <li><a href="{{ route('frontend.contact') }}">طلب خدمة</a></li>
                            <li><a href="{{ route('frontend.services.index') }}">خدماتنا</a></li>
                            <li><a href="{{ route('frontend.clients') }}">شركاؤنا</a></li>
                            <li><a href="{{ route('frontend.contactus.index') }}">تواصل معنا</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="widget PL28">
                        <h3 class="widget_title">خدماتنا</h3>
                        <ul class="menu"> 
                            @foreach($services as $service)
                                <li><a href="{{ route('frontend.services.show',$service->id) }}">{{ $service->name }} </a></li> 
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3">
                    <div class="aboutWidget">
                        <h5>تواصل معنا</h5>
                        <div class="phone"><i class="twi-phone"></i>{{ $about->phone }}</div>
                        <p>{{ $about->address }}</p>
                        <a href="mailto:{{ $about->email }}">{{ $about->email }}</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section -->

    <!-- Copyright Section -->
    <section class="fcopyright">
        <div class="container largeContainer text-center">
            <div class="row">
                <div class="col-md-12">
                    <p>جميـع الحقــوق محفــوظة © 2024 - تصميم وبرمجة تكامل الرؤى</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Copyright Section -->

    <!-- Bact To Top -->
    <a href="javascript:void(0);" id="backtotop"><i class="twi-arrow-to-top1"></i></a>
    <!-- Bact To Top -->
    
    @include('sweetalert::alert')


    <!-- Start Include All JS ---
    <script src="assets/js/jquery.js"></script>--->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/shuffle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/lightcase.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/circle-progress.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/gmaps.js') }}"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBJtPMZ_LWZKuHTLq5o08KSncQufIhPU3o"></script>

    <!-- Slider Revolution Main Files -->
    <script src="{{ asset('frontend/assets/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- Slider Revolution Extension -->
    <script src="{{ asset('frontend/assets/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/extensions/revolution.extension.video.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/theme.js') }}"></script>
    <!-- End Include All JS -->
</body>

</html>
