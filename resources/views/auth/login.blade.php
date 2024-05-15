@extends('auth.layouts.master')

@section('content')
@if (session()->has('login'))
<p class="login-box-msg text-danger">{{session('login')}}</p>
@endif
<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="mb-3">
        <div class="input-group @error('email') is-invalid @enderror">
            <input id="email" type="email" placeholder="{{ __('Email Address') }}"
                class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                required autocomplete="email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <div class="input-group @error('password') is-invalid @enderror">
            <input id="password" placeholder="{{ __('Password') }}" type="password" class="form-control "
                name="password" required autocomplete="current-password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
        </div>
        <!-- /.col -->
    </div>
</form>
@endsection