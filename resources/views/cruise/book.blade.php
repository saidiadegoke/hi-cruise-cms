@extends('layouts.cruise')
@section('content')
    <section class="" style="margin-top: 200px">
      <div class="container styled-border-2">
        <div class="col-md-6">
          <h4 class="all-caps">Eugene</h4>
          <p class="justify-center downUp">
              Eugene is a private luxurious yacht with a capacity of 8 to 10 people.The
              beautiful leather interior piece sailing at 8 to 10 knots cruising speed has a
              black water tank capacity of 220litres and fully air conditioned with 8000
              BTU with bathroom shower and kitchenette. This is solely A PRIVATE
              CRUISE
          </p>
        </div>
        <div class="col-md-6">
          <img src="{{asset('assets/img/banners/eugene_bn.jpg')}}" />
        </div>
        <div class="listing-cont">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner listings" role="listbox">
                    <div class="item active">
                        <div class="row">
                            <div class="col-md-3 img-holder">
                                <img src="{{asset('assets/img/banners/b1.jpg')}}" alt="" class="thumbs-list">
                            </div>
                            <div class="col-md-3 img-holder">
                                <img src="{{asset('assets/img/banners/b2.jpg')}}" alt="" class="thumbs-list">
                            </div>
                            <div class="col-md-3 img-holder">
                                <img src="{{asset('assets/img/banners/b3.jpg')}}" alt="" class="thumbs-list">
                            </div>
                            <div class="col-md-3 img-holder">
                                <img src="{{asset('assets/img/banners/bn04.jpg')}}" alt="" class="thumbs-list">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('assets/img/banners/bn05.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('assets/img/banners/b1.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('assets/img/banners/b2.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('assets/img/banners/b3.jpg')}}" alt="" class="thumbs-list">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
    <section class="pattern1 no-margin pad-10 mid-space">
      <div class="container">
        <img src="{{asset('assets/img/logo-icon.png')}}" alt="" class="logo-icon-section" />
        <h3 class="all-caps">Make Reservations</h3>
        
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
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
    </section>
        @endsection