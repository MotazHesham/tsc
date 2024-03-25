@extends('layouts.app')
@section('content')
    <p class="text-muted">{{ trans('global.reset_password') }}</p>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                name="email" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}"
                value="{{ old('email') }}">

            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        <div > 
            <button type="submit" class="customized-button text-white" style="width: 100%"> 
                <span>{{ trans('global.send_password') }}</span>
            </button> 
        </div>
    </form>
@endsection
