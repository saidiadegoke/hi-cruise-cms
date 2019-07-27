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

                @if(session()->has('registered'))
                  <div class="alert alert-success">{{ session()->get('registeredMessage') }}</div>
                @endif
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
                          <th>City</th><td>{{ $customer->city }}</td>
                        </tr>
                        <tr>
                          <th>Country</th><td>{{ $customer->country? $customer->country->name: '' }}</td>
                        </tr>
                      </table>
                 </div>
                 <div class="col-md-12">
                  <form action="{{ route('customer.edit', ['customer' => $customer->id]) }}" method="get">
                  <div class="form-group">
                    <input
                      type="submit"
                      class="btn btn-primary"
                      value="Edit profile"
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
    
@endsection
