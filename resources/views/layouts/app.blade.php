<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@3.2/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <style>
        @media only screen and (max-width: 1150px) {
            #left-banner {
                display: none
            }

            #right-banner {
                width: 100vw !important;
            }

            #right-banner-div {
                width: 80% !important
            }

            .c-app {
                background: linear-gradient(90deg, #9AD4BB 0%, #ACDCB1 50%, #B5E0AB 100%) !important;
            }

            #h1-login {
                text-align: right !important;
                font-size: 20px !important;
            }

            #form-logo {
                display: block !important;
            }
        }
        .customized-button{
            background: linear-gradient(200deg, #9f9f9f 0%, #9d1311 50%, #000000 100%);width: 62%;
                                    height: 75px;border-radius: 5px;border: none;
        }
        .customized-button span{ font-size:20px}
    </style>
    @yield('styles')
</head>

<body class="header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden login-page">
    <div class="c-app flex-row align-items-center" style="background: white;">

        <div style="display: flex;align-items: center;" class="w-full">
            <div style="width: 44vw;" id="left-banner">
                <div
                    style="background: linear-gradient(200deg, #9f9f9f 0%, #9d1311 50%, #000000 100%);height:100vh;
                                display:flex;flex-direction: column;justify-content: space-between; align-items: center;">
                    <div class="py-5">
                        <img src="{{ asset('imgs/logo.png') }}" alt="">
                    </div>

                    <div style="height: 55vh;margin-right: 35px;">
                        <h1 class="text-end font-extrabold text-4xl text-white m-2" style="text-align: right;">إدارة
                            النظام </h1>
                        <p class="text-end text-white m-2" style="text-align: right;font-size:18px">
                            ...حِرصًا منّا على المساهمة في خلق مجتمع واعي ماليًا يواكب التغيرات بالتقنية المالية
                        </p>
                    </div>

                    <div class="text-white" style="margin-bottom: 23px;">
                        @CopyRight by
                        Integrated
                        Vision | تكامل الرؤي
                    </div>

                    <div style="position: absolute;bottom:0;left:0">
                        <img src="{{ asset('imgs/Group 2.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div style="width: 56vw" id="right-banner">
                <div style="background:white;width: 50%;margin: auto;box-shadow: 0px 0px 4px #D2D2D2;border-radius: 25px;"
                    id="right-banner-div" class="p-4">
                    @if (session('message'))
                        <div class="alert alert-info" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @yield('scripts')
</body>

</html>
