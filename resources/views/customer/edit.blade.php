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
<section class="primary-color no-margin pad-10 mid-space marg-Top-60">
    <div class="container">
        <div class="col-md-12">
          <div class="col-md-3">
          </div>
          <div class="col-md-6 col-offset-md-3">
              <div class="col-md-12 bordered">
                  <div class="container">
                  <h4 class="center">Profile page</h4>
                      <form action="{{route('customer.update', ['customer' => $customer->id])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                              @include('layouts.partials.errors')
                            </div>
                  <div class="form-group">
                    <div class="col-md-6">
                    <label for="fname" class="col-form-label">{{ __('First Name') }}</label>
                                <input id="fname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname')?: $customer->firstname }}" required autocomplete="name" autofocus>
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
                                <input id="lname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname')?: $customer->lastname }}" required autocomplete="lastname" autofocus>
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
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')?: $customer->email }}" required autocomplete="email">

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
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" ) name="phone" required autocomplete="phone" value="{{ old('phone')?: $customer->phone }}" />
                  </div>

                  <div class="form-group">
                    <label for="address">{{__('Address')}}</label>
                    <textarea class="form-control" name="address" >{{ old('address')?: $customer->address }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="phone">{{__('City')}}</label>
                    <input type="text" class="form-control name="address" value="{{ old('city')?: $customer->city }}"/>
                  </div>

                  <div class="form-group">
                    <label for="phone">{{__('State')}}</label>
                    <select class="form-control" name="state_id" style="color: white;">
                      <option value="">Please select</option>
                      @foreach(\App\Models\State::all() as $state)
                        <option value="{{ $state->id }}" {{ $state->id == old('state_id') || $state->id == $customer->state_id? 'selected': '' }}>{{ $state->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="phone">{{__('Country')}}</label>
                    <select class="form-control" name="country_id" style="color: white;">
                      <option value="">Please select</option>
                      @foreach(\App\Models\Country::all() as $country)
                        <option value="{{ $country->id }}" {{ $country->id == old('country_id') || $country->id == $customer->country_id? 'selected': '' }}>{{ $country->name }}</option>
                      @endforeach
                    </select>
                  </div>


                  <div class="form-group">
                    <input
                      type="submit"
                      class="btn btn-primary"
                      value="Update"
                    />
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="pattern1 no-margin pad-10 mid-space">
      <div class="container">
        <img src="{{asset('public/assets/img/logo-icon.png')}}" alt="" class="logo-icon-section" />
        <h3 class="all-caps">Dream, Discover, Explore</h3>
      </div>
    </section>
    <footer>
      <div class="container" style="padding:30px 0px;">
        <div class="col-md-12">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.7763434619374!2d3.359796114683554!3d6.549898224673285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8d9460a7be7b%3A0x64caf3a2460e953e!2s32+Coker+Rd%2C+Ilupeju%2C+Lagos!5e0!3m2!1sen!2sng!4v1562360908061!5m2!1sen!2sng"
            width="100%"
            height="300"
            frameborder="0"
            style="border:0"
            allowfullscreen
          ></iframe>
          <h4 class="center">Contact</h4>
          <p style="text-align: center">32, Coker road, Ilupeju, Lagos.</p>
          <p style="text-align: center">info@hi-impactcruise.com</p>
          <p style="text-align: center">0818 8245 734, 0806 4831 491</p>
        </div>
      </div>
      <div class="footer">
        <div class="container">
          <div class="col-md-6">
            Copyright &copy; 2019 All rights reserved
            <a href="#"> | Privacy Policy </a>
            <a href="#"> | Terms and Condition</a>
          </div>
          <div class="col-md-6 pull-right socials">
            <li>
              <a href="#"> <i class="fab fa-facebook-f"></i></a>
            </li>
            <li>
              <a href="#"> <i class="fab fa-twitter"></i></a>
            </li>
            <li>
              <a href="#"> <i class="fab fa-instagram"></i></a>
            </li>
          </div>
        </div>
      </div>
    </footer>
@endsection
