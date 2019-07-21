@extends('layouts.cruise')
@section('title') Verify your email @endsection

@section('content')
<section class="set-margTop-100">
      <div class="container">
        <img src="{{ asset('public/assets/img/logo-icon.png') }}" alt="" class="iconic" />
        <div class="col-md-4 middle-place">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
@endsection
