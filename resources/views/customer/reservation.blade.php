@extends('layouts.cruise')
@section('title') {{ $reservation->package->name }} details @endsection
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

                <h4 class="center">Reservation details</h4>
                  <div class="row p-2">
                    <div class="col-md-6 p-1">
                  
                      <table class="table">
                        <tr>
                          <th>Name</th><td>{{ $reservation->name }}</td>
                        </tr>
                        <tr>
                          <th>Email</th><td>{{ $reservation->email }}</td>
                        </tr>
                        <tr>
                          <th>Phone</th><td>{{ $reservation->phone }}</td>
                        </tr>
                        <tr>
                          <th>Address</th><td>{{ $reservation->address }}</td>
                        </tr>
                      </table>
                 </div>
                 <div class="col-md-6 p-1">
                  
                      <table class="table">
                        <tr>
                          <th>Package</th><td>{{ $reservation->package->name }}</td>
                        </tr>
                        <tr>
                          <th>Reservation Code</th><td>{{ $reservation->reference }}</td>
                        </tr>
                        <tr>
                          <th>Cruise Session</th><td>{{ $reservation->getSession($reservation->session) }}</td>
                        </tr>
                        <tr>
                          <th>Description</th><td>{!! $reservation->package->description !!}</td>
                        </tr>
                        <tr>
                          <th>Cruise date</th><td>{{ $reservation->start_date }}</td>
                        </tr>
                        <tr>
                          <th>Payment date</th><td>{{ $reservation->payment->created_at }}</td>
                        </tr>
                        <tr>
                          <th>Price</th><td>{{ $reservation->package->price }}</td>
                        </tr>
                        <tr>
                          <th>Status</th><td>{{ $reservation->user == 0? 'Active': 'Used' }}</td>
                        </tr>
                      </table>
                 </div>
              </div>
              <div style="text-align: center;">
                <a href="{{ url('payments/' . $reservation->payment->reference . '/' . $reservation->id  ) }}">View Ticket</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
@endsection
