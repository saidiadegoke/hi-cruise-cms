@extends('layouts.cruise')
@section('title') Book a reservation @endsection

    @section("styles")
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

        
    @endsection

@section('content')
    <section class="pattern1 no-margin pad-10 mid-space" style="margin-top: 200px">
      <div class="container">
        <img src="{{asset('public/assets/img/logo-icon.png')}}" alt="" class="logo-icon-section" />
        <h3 class="all-caps">Make Reservations</h3>
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="col-md-6">
                            <h4>Package Description</h4>
                            <div class="card">
                                <div class="card-body">
                                    <p>Package: {{$package->name}}</p>
                                    <p>Yacht : {{ $package->yacht->name}}</p>
                                        {!! $package->description !!} 
                                <p> Price (Per Seat) : {{$package->price}}</p>
                                    {{-- <ul class="list-group">
                                        <li>{{$package->yacht->name}}</li>
                                        <li>Free Lunch</li>
                                        <li>4 Hours Cruise</li>
                                        <li>Complementary Wine</li>
                                        <li>Up to 20 Guests</li>
                                    </ul>         --}}
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <form action="{{route('pay')}}" method="post">
                            @csrf
                                <input type="hidden" name="package" value="{{$package->id}}">
                                <input type="hidden" name="amount" value="{{$package->price}}">
                                <input type="hidden" name="yacht" value="{{$package->yacht->id}}">
                                <div class="form-group">
                                @if(count($errors->all()) > 0)
		              @foreach($errors->all() as $error)
		              <p class="alert alert-danger">{{$error}}</p>
		              @endforeach
		            @endif
                                </div>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                    <label>Full name</label>
                                        <input type="text" value="{{ old('name') }}" class="form-control" placeholder="Name" name="name">
                                    </div>
                                    <div class="col-md-5">
                                    <label>Phone number</label>
                                        <input type="text" value="{{ old('phone') }}" class="form-control" placeholder="Phone number" name="phone">
                                    </div>
                                </div>
                                
                            </div> 
                                    <div class="form-group">
                                <div class="row">
                                <div class="col-md-7">
                                <label>Email address</label>
                                        <input type="email" value="{{ old('email') }}" class="form-control" placeholder="Email address" name="email">
                                    </div>
                                    <div class="col-md-5">
                                    <label>No of seats</label>
                                        <input type="number" value="{{ old('num_seat') }}" class="form-control" placeholder="No of Seat" name="num_seat">
                                    </div>
                                </div>
                                
                            </div> 
                            <div class="form-group">
                            <div class="row">
                                    <div class="col-md-7">
                                    <label>Start date</label>
                                    <input style="color: black;" value="{{ old('start_date') }}" type="text" class="form-control date pick_date" name="start_date" id="start_date" disabled>
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
                                            <input class="form-check-input" type="radio" {{ old('payment_method') == 'offline'? 'checked': '' }} name="payment_method" id="payment_method" value="offline"> Offline Payment
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-5">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" {{ old('payment_method') == 'paystack'? 'checked': '' }} name="payment_method" id="payment_method" value="paystack"> Online Payment
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="row">
                                    <div class="col-md-12">
                                    <label>Address</label>
                                    <textarea
                                        class="form-control"
                                        name="address"
                                        id="address"
                                        cols="30"
                                        rows="10"
                                    >{{ old('address') }}</textarea>
                                    </div>
                                </div>
                                </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                <input type="hidden" name="baseURL" value="{{url('/')}}" id="baseURL" />
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


        @section("scripts")
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
               
        <script>
            $(function(){            
        $.ajax({
            url: $('#baseURL').val() + '/package_details/{{$package->id}}',
            type: 'get',
            contentType: 'application/json',
            dataType: 'json',
            failure:function(err){
                console.log("err");
            },
            success: function(resp){
                let available_days = resp.available_days;
                
                available_days = available_days.split(" , ");
                let daysMap = {
                    "Sunday": 0,
                    "Monday" : 1,
                    "Tuesday" : 2,
                    "Wednesday": 3,
                    "Thursday" : 4,
                    "Friday" : 5,
                    "Saturday" : 6
                }

                let daysMapEquiv = []
                available_days.forEach(function(day){
                    daysMapEquiv.push(daysMap[day]);
                });

                // let start_date = daysMap[available_days[0]], end_date = daysMap[available_days[1]];
                // console.log(start_date);
                // available_days = [];
                // if(end_date == 0){
                //     available_days.push(end_date);
                //     for(let i = start_date; i <= 6; i++){    
                //         available_days.push(i);
                //     }
                // }else{
                //     for(let i = start_date; i <= end_date; i++){
                //     available_days.push(i);
                //     }
                // }
                
                $('.date').flatpickr({
            mode: 'single',
			minDate: 'today',
            dateFormat: 'Y-m-d',
            enable: [
                function(date) {
                    // return true to disable
                    return (daysMapEquiv.includes(date.getDay()));
                    
                }
            ]
                
            });
            $('.pick_date').attr("disabled",false);
            }
        })

        });
        </script>
        @endsection