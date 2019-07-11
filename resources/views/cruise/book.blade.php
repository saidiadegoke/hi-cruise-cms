@extends('layouts.cruise')


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
                                    <p>Yatch : {{ $package->yatch->name}}</p>
                                        {{$package->description}} 
                                <p> Price (Per Seat) : {{$package->price}}</p>
                                    {{-- <ul class="list-group">
                                        <li>{{$package->yatch->name}}</li>
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
                                <input type="hidden" name="yatch" value="{{$package->yatch->id}}">
                                    <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-1">
                                        <input type="number" class="form-control" placeholder="No of Seat" name="num_seat">
                                    </div>

                                    <div class="col-md-5">
                                        <input type="text" class="form-control date" name="start_date" id="start_date" disabled>
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


        @section("scripts")
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
               
        <script>
            $(function(){            
        $.ajax({
            url: '/hi-cruise/package_details/{{$package->id}}',
            type: 'get',
            contentType: 'application/json',
            dataType: 'json',
            failure:function(err){
                console.log("err");
            },
            success: function(resp){
                let available_days = resp.available_days;
                available_days = available_days.split(" to ");
                let daysMap = {
                    "Sunday": 0,
                    "Monday" : 1,
                    "Tuesday" : 2,
                    "Wednesday": 3,
                    "Thursday" : 4,
                    "Friday" : 5,
                    "Saturday" : 6
                }
                let start_date = daysMap[available_days[0]], end_date = daysMap[available_days[1]];
                // console.log(start_date);
                available_days = [];
                if(end_date == 0){
                    available_days.push(end_date);
                    for(let i = start_date; i <= 6; i++){    
                        available_days.push(i);
                    }
                }else{
                    for(let i = start_date; i <= end_date; i++){
                    available_days.push(i);
                    }
                }
                
                $('.date').flatpickr({
            mode: 'single',
			minDate: 'today',
            dateFormat: 'Y-m-d',
            enable: [
                function(date) {
                    // return true to disable
                    return (available_days.includes(date.getDay()));
                    
                }
            ]
                
            });
            $('#start_date').attr("disabled",false);
            }
        })

        });
        </script>
        @endsection