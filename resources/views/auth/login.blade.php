@extends('layouts.cruise')
@section('title') Login Form @endsection
@section('content')

<section class="set-margTop-100">
      <div class="container">
        <img src="{{ asset('public/assets/img/logo-icon.png') }}" alt="" class="iconic" />
        <div class="col-md-4 middle-place bordered">
          <div class="container">
             <form method="POST" action="{{ route('login') }}">
                @csrf
              <h4>LOGIN</h4>
              <div class="form-group">
                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                
                <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                
              </div>
              {{--<div class="form-group">
                  @if (Request::has('previous'))
                      <input type="hidden" name="previous" value="{{ Request::get('previous') }}">
                  @else
                      <input type="hidden" name="previous" value="{{ URL::previous() }}">
                  @endif
              </div>--}}
              <div class="form-group">
                <input type="submit" value="Login" class="btn btn-primary" />
              </div>
              <div class="form-group">
                <p class="text-center">Not registered yet? Click here to <a style="color: #ffbc2e;" href="{{ route('register') }}">register</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    

@endsection