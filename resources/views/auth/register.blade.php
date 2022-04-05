@extends('layouts.cruise')
@section('title') Signup Form @endsection
@section('styles')
    <link
      type="text/css"
      href="lib/datepicker/datepicker.css"
      rel="stylesheet"
    />
@endsection

@section('content')
<script src="https://www.google.com/recaptcha/api.js" async defer></script> 
<style>
.form-group {
  clear: both;
}
<style>
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
  right: 30px;
  cursor: pointer;
  color: black;
  top: -20px;
}
  </style>
<section class="primary-color no-margin pad-10 mid-space marg-Top-60">
    <div class="container">
        <div class="col-md-12">
          <div class="col-md-6 floater-img">
              <img src="{{ asset('public/assets/img/login-bg.jpeg') }}" alt="" class="floater-img" />
          </div>
          <div class="col-md-6">
              <div class="col-md-12 bordered">
                  <div class="container">
                  <h4 class="center">Registration Form</h4>
                      <form action="{{route('register')}}" method="post">
                            @csrf
                            
                            <div class="row">
                              @include('layouts.partials.errors')
                            </div>
                  <div class="form-group">
                    <div class="col-md-6">
                    <label for="fname" class="col-form-label">{{ __('First Name') }}</label>
                                <input id="fname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="name" autofocus>
                            <div>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                    <label for="lname" class="col-form-label">{{ __('Last Name') }}</label>
                                <input id="lname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="name" autofocus>
                            <div>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                  </div>

                  <div class="form-group">
                      <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    <div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="phone">{{__('Mobile Number')}}</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" ) name="phone" required autocomplete="phone"/>
                  </div>

                  <div class="form-group">
                        
                        <label for="password" class="col-form-label text-md-right" style="width: 100%;">{{ __('Password') }}(<span style="font-size: 10px;display: inline-block;float: none;">Minimun of 6 characters</span>)</label>
                            <input id="password-field" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            <div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>
                  <div class="form-group mt-2">
                    <div class="g-recaptcha" data-sitekey="6LfPpK4UAAAAAIZGpMwuCwHWeKzL9LzKnleU_I12"></div>
                  </div>
                  <div class="form-group">
                    <input
                      type="submit"
                      class="btn btn-primary"
                      value="Register Now"
                    />
                  </div>
                  <div class="form-group">
                <p class="text-center">Already registered ? Click here to <a style="color: #ffbc2e;" href="{{ route('login') }}">login</a></p>
              </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
@endsection

@section('scripts')
<script>
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
@endsection
