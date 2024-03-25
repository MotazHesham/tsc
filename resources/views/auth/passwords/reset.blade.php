@extends('layouts.app')
@section('content')
    <p class="text-muted">{{ trans('global.reset_password') }}</p>
    
    @if ($errors->count() > 0)
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.request') }}">
        @csrf

        <input name="token" value="{{ $token }}" type="hidden">

        <div class="form-group">
            <input id="email" type="email" name="email"
                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus
                placeholder="{{ trans('global.login_email') }}" value="{{ $email ?? old('email') }}">

            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <input id="password" type="password" name="password" class="form-control" required
                placeholder="{{ trans('global.login_password') }}">

            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <input id="password-confirm" type="password" name="password_confirmation" class="form-control" required
                placeholder="{{ trans('global.login_password_confirmation') }}">
        </div>

        <div> 
            <button type="submit" class="customized-button text-white" style="width: 100%"> 
                <span>{{ trans('global.reset_password') }}</span>
            </button> 
        </div>
    </form>
@endsection
