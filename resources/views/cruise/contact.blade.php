@extends("layouts.cruise")
@section('title') Contact Information @endsection
@section("content")
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style>
.form-group {
  clear: both;
}

@media(max-width: 992px) {
.no-margin {
  margin-top: 100px !important;
}
.socials {
  margin-bottom: 20px;
}
}

</style>
    <section class="primary-color no-margin pad-10 mid-space">
      <div class="container">
        <div class="col-md-12">
          <div class="col-md-6 floater-img1">
            <!--span class="sp-cap">We will love to hear from you</span>
            <img src="{{asset('public/assets/img/contact.jpg')}}" alt="" class="floater-img" /-->
            <h3 class="center" style="text-align: center;">Contact</h3>
            <h4 class="center">Head Office</h4>
          <div class="lead" style="text-align: center">{!! $contact['address-ilupeju'] !!}</div>

          <h4 class="center">BOARDING TERMINAL</h4>
<p class="lead text-center">Hi-Impact Cruise Boarding Terminal,
opposite Lagos House, outer marina, Lagos.</p>
          <p class="text-center">Or</p>
          <h4 class="center">Corporate Office</h4>
          <div class="lead" style="text-align: center">{!! $contact['address-hiimpact'] !!}</div>
          <div class="lead" style="text-align: center">{!! $contact['admin-email'] !!}</div>
          <div class="lead" style="text-align: center">{!! $contact['phone-numbers'] !!}</div>

          <div class="col-md-61 pull-left socials" style="display: flex;
justify-content: center;
flex-direction: row;
width: 100%;">
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
          <div class="col-md-6">
            <div class="col-md-12 bordered">
              <div class="container">
                <form action="{{ route('contact') }}" class="" method="post">
                  <h4 class="center">Contact Form</h4>
                  @csrf
                  <div>
                    @if(session()->has('submitted'))
                      <p class="alert alert-success">{{ session('submitted') }}</p>
                    @endif

                    @if($errors->all())
                      @foreach($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                      @endforeach
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="">Fullname</label>
                    <input type="text" class="form-control"
                      name="name"
                      id="fullname"
                      value="{{ old('name') }}"
                    />
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email"
                id="email"
                value="{{ old('email') }}" />
                  </div>
                  <div class="form-group">
                    <label for="">Mobile</label>
                    <input type="text" class="form-control" name="phone"
                id="phone"
                value="{{ old('phone') }}" />
                  </div>
                  <div class="form-group">
                    <label for="">Message</label>
                    <textarea
                    class="form-control"
                name="comment"
                id="comment"
                cols="30"
                rows="10"
              >{{ old('comment') }}</textarea>
                  </div>
                  <div class="form-group mt-2">
              <div class="g-recaptcha" data-sitekey="6LfPpK4UAAAAAIZGpMwuCwHWeKzL9LzKnleU_I12"></div>
            </div>
                  <div class="form-group">
                    <input
                      type="submit"
                      class="btn btn-primary"
                      value="Send Message"
                      name="submit"
                    />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection


@section("styles")
<link
      type="text/css"
      href="lib/datepicker/datepicker.css"
      rel="stylesheet"
    />

@endsection