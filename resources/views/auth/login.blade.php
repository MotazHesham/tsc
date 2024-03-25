@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="py-3 text-center mb-3" style="display: none" id="form-logo">
            <img src="{{ asset('imgs/logo.png') }}" alt="">
        </div>

        <h1 class="text-center" style="font-size: 26px;font-weight: 600;" id="h1-login">تسجيل الدخول </h1>
        <div class="form-group ">
            {{-- <img src="{{ asset('imgs/icons/email.png') }}" alt="" class="h-5 w-5"> --}}
            <input type="text" name="email" id="email"
                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }} w-full mx-auto my-5 pl-10 pr-16  py-4 border rounded-md"
                placeholder="البريد الالكتروني*" dir="rtl" required autocomplete="email" autofocus
                value="{{ old('email', null) }}">
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="form-group ">
            {{-- <img src="{{ asset('imgs/icons/password.png') }}" alt="" class="h-5 w-5"> --}}
            <input type="password" name="password" id="password" dir="rtl"
                class=" form-control {{ $errors->has('password') ? ' is-invalid' : '' }} w-full mx-auto my-5 pl-10 pr-16  py-4 border rounded-md"
                placeholder="كلمة السر*">
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            @endif
            {{-- <a href="#" class="m-auto">
                            <img src="{{ asset('imgs/icons/expand_compound.png') }}" alt=""
                                class="h-3 w-5 absloute left-14">
                        </a>  --}}
        </div>
        <div>
            <a href="{{ route('password.request') }}" style="color: #025376;text-decoration: underline;">!هل نسيت كلمة
                المرور</a>
            <div style="text-align:right">
                <label for="remember" style="padding-right: 9px;">تذكرني</label>
                <input type="checkbox" name="remember" id="remember" class="mr-20 my-auto">
            </div>
        </div>
        <div style="text-align:center">
            <button type="submit" class="text-white my-4 customized-button">
                <span >تسجيل الدخول</span>
            </button>
        </div>
    </form>
@endsection
