@extends('layouts.cruise')
@section('content')
    
      
    <section class="pattern1 no-margin pad-10 mid-space" style="margin-top: 200px">
      <div class="container">
        <img src="{{asset('assets/img/logo-icon.png')}}" alt="" class="logo-icon-section" />
        <h3 class="all-caps">Make Reservations</h3>
        
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="col-md-6">
                            <h4>Selection Details</h4>
                            <div class="card">
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li>Leisure Cruise</li>
                                        <li>Free Lunch</li>
                                        <li>4 Hours Cruise</li>
                                        <li>Complementary Wine</li>
                                        <li>Up to 20 Guests</li>
                                    </ul>        
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <form action="{{route('pay')}}" method="post">
                            @csrf
                                <input type="hidden" name="package" value="{{$yatch_info['package']}}">
                                <input type="hidden" name="amount" value="{{$yatch_info['amount']}}">
                                <input type="hidden" name="yatch" value="{{$yatch_info['yatch']}}">
                                    <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="number" class="form-control" placeholder="No of Seat" name="num_seat">
                                    </div>

                                    <div class="col-md-5">
                                        <input type="date" class="form-control" placeholder="Reservation Date" name="start_date">
                                    </div>
                                </div>
                            </div>   
                            
                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <h4>Select Preferred Payment Method</h4>
                                </div>
                                <div class="row">
                                    <div class="form-check form-check-inline col-md-5 col-md-offset-1">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="offline"> Offline Payment
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-5">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="payment_method" id="payment_method" value="paystack"> Paystack
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <button type="submit" class="btn btn-primary">Book Reservation</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    
                    </div>
                </div>
                    
            </div>
      </div>
    </section>
        @endsection