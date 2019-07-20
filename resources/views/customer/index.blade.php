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
<style>
.p-2 {
  padding: 20px;
}
.p-1 {
  padding: 10px;
  }
  
@media(max-width: 992px) {
  .p-2 {
  padding: 10px;
}
.p-1 {
  padding: 0px;
  }
}
</style>
<section class="primary-color no-margin pad-10 mid-space marg-Top-60">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="col-md-12 bordered">

                <h4 class="center">Profile page</h4>
                  <div class="row p-2">
                    <div class="col-md-6 p-1">
                  
                      <table class="table">
                        <tr>
                          <th>Firstname</th><td>{{ $customer->firstname }}</td>
                        </tr>
                        <tr>
                          <th>Lastname</th><td>{{ $customer->lastname }}</td>
                        </tr>
                        <tr>
                          <th>Firstname</th><td>{{ $customer->firstname }}</td>
                        </tr>
                        <tr>
                          <th>Email</th><td>{{ $customer->email }}</td>
                        </tr>
                        <tr>
                          <th>Phone number</th><td>{{ $customer->phone }}</td>
                        </tr>
                      </table>
                 </div>
                 <div class="col-md-6 p-1">
                    <table class="table">
                        <tr>
                          <th>Address</th><td>{{ $customer->address }}</td>
                        </tr>
                        <tr>
                          <th>State</th><td>{{ $customer->state? $customer->state->name: '' }}</td>
                        </tr>
                        <tr>
                          <th>City/th><td>{{ $customer->city }}</td>
                        </tr>
                        <tr>
                          <th>Country</th><td>{{ $customer->country? $customer->country->name: '' }}</td>
                        </tr>
                      </table>
                 </div>
                 <div class="col-md-12">
                  <form>
                  <div class="form-group">
                    <input
                      type="submit"
                      class="btn btn-primary"
                      value="Register Now"
                    />
                  </div>
                </form>
                </div>
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
