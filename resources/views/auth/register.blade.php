@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <h1>{{ trans('panel.site_title') }}</h1>
        <p class="text-muted">{{ trans('global.register') }}</p>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fa fa-user fa-fw"></i>
                </span>
            </div>
            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required
                autofocus placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fa fa-envelope fa-fw"></i>
                </span>
            </div>
            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fa fa-lock fa-fw"></i>
                </span>
            </div>
            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                required placeholder="{{ trans('global.login_password') }}">
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>

        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fa fa-lock fa-fw"></i>
                </span>
            </div>
            <input type="password" name="password_confirmation" class="form-control" required
                placeholder="{{ trans('global.login_password_confirmation') }}">
        </div> 
        <div style="text-align:center">
            <button type="submit" class="text-white customized-button" style="width: 100%; height: 40px;">
                <spa>{{ trans('global.register') }}</span>
            </button>
        </div>
    </form>
@endsection
