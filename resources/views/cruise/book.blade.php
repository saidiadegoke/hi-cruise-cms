@extends('layouts.cruise')
@php
    $d = [];
    foreach($dates as $value) {
                $d[$value->getDate()] = [
                    'day' => $value->isDay(),
                    'night' => $value->isNight(),
                    'isAvailable' => $value->isAvailable(),
                    'date' => $value->getDate(),
                ];
            }
// strtolower($package->name) != 'royal package'
@endphp
@section('title') Book a reservation @endsection

    @section("styles")
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    @endsection

@section('content')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <section class="pattern1 no-margin pad-10 mid-space" style="margin-top: 200px">
      <div class="container">
        <img src="{{asset('public/assets/img/logo-icon.png')}}" alt="" class="logo-icon-section" />
        <h3 class="all-caps">Make Reservation</h3>
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
                                <p> Price (Per Seat) : &#8358; {{number_format($package->price)}}</p>
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
                            <form id="offline_form" action="{{route('reservation.book')}}" method="post">
                                @csrf
                                <input type="hidden" name="package" value="{{$package->id}}">
                                <input type="hidden" name="amount" value="{{$package->price}}">
                                <input type="hidden" name="yacht" value="{{$package->yacht->id}}">
                                <input type="hidden" name="package-session" value="{{session()->pull('package')}}">
                                <input type="hidden" class="paystack_url" value="{{route('pay')}}">
                                <input type="hidden" class="offline_url" value="{{route('offlines.store')}}">
                                <div class="form-group">
                                @if(count($errors->all()) > 0)
                      @foreach($errors->all() as $error)
                      <p class="alert alert-danger">{{$error}}</p>
                      @endforeach
                    @endif
                    @if(session()->has('seat_limit'))
                        <p class="alert alert-danger">{{ session()->pull('seat_limit') }}</p>
                    @endif
                                </div>
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-md-7">
                                    <label>Full name</label>
                                        <input type="text" value="{{ session()->pull('name')?: old('name') }}" class="form-control" placeholder="Name" name="name">
                                    </div>
                                    <div class="col-md-5">
                                    <label>Phone number</label>
                                        <input type="text" value="{{ session()->pull('phone')?: old('phone') }}" class="form-control" placeholder="Phone number" name="phone">
                                    </div>
                                </div>
                                
                            </div> 
                                    <div class="form-group">
                                <div class="row">
                                <div class="col-md-7">
                                <label>Email address</label>
                                        <input type="email" value="{{ session()->pull('email')?: old('email') }}" class="form-control" placeholder="Email address" name="email">
                                    </div>
                                    @if(true)
                                        <div class="col-md-5">
                                        <label>No of seats</label>
                                            <input type="number" min="0" value="{{ session()->pull('num_seat')?: old('num_seat') }}" class="form-control" placeholder="No of Seat" name="num_seat">
                                        </div>
                                    @else
                                        <input type="hidden" value="1" class="form-control" placeholder="No of Seat" name="num_seat">
                                    @endif
                                </div>
                                
                            </div> 
                            <div class="form-group">
                            <div class="row">
                                    <div class="col-md-7">
                                    <label>Date</label>
                                    <select name="start_date" class="form-control date-selector" style="color: black; background-color: white; padding-left: 2em;">
                                        <option value="">Select date
                                        @foreach($dates as $date)
                                            <option value="{{ $date->getDate() }}" {{ session()->pull('start_date') == $date->getDate() || old('start_date') == $date->getDate()? 'selected': '' }}>{{ $date->getLabel() }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <!--div class="col-md-5">
                                    <label>Cruise Time</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                    Day &nbsp;<input style="color: black;" value="day" type="radio" class="form-control1" name="session" id="session-day"> </div>
                                    <div class="col-md-6">
                                    Night &nbsp;<input style="color: black;" value="night" type="radio" class="form-control1" name="session" id="session-night"></div>
                                </div>
                                    </div-->
                                </div>
                                </div>
                            
                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-0">
                                    <big>Select Preferred Payment Method</big>
                                </div>
                                <div class="row">
                                    <div class="form-check form-check-inline col-md-5 col-md-offset-1">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" {{ session()->pull('payment_method') == 'offline' || old('payment_method') == 'offline'? 'checked': '' }} name="payment_method" id="payment_method_offline" value="offline"> Offline Payment
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-5">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" {{ session()->pull('payment_method') == 'paystack' || old('payment_method') == 'paystack'? 'checked': '' }} name="payment_method" id="payment_method_paystack" value="paystack"> Online Payment
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-0">
                                    <big>Select Preferred Cruise Time {{ session()->get('session') }}</big>
                                </div>
                                <div class="row">
                                    {{--<div class="form-check form-check-inline col-md-10 col-md-offset-1">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" {{ session()->pull('session') == 'day' || old('session') == 'night'? 'checked': '' }} name="session" id="session_day" value="night"> Cruise Time (4:00 PM - 7:00 PM)
                                        </label>
                                    </div>--}}
                                    
                                    <div class="form-check form-check-inline col-md-5 col-md-offset-1 day-checkbox">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" {{ session()->pull('session') == 'day' || old('session') == 'day'? 'checked': '' }} name="session" id="session_day" value="day"> Day Cruise ({{\App\Common\Settings::get('day_from')}} - {{\App\Common\Settings::get('day_to')}})
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline col-md-5 night-checkbox">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" {{ session()->pull('session') == 'night' || old('session') == 'night'? 'checked': '' }} name="session" id="session_night" value="night"> Night Cruise ({{\App\Common\Settings::get('night_from')}} - {{\App\Common\Settings::get('night_to')}})
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
                                    >{{ session()->pull('address')?: old('address') }}</textarea>
                                    </div>
                                </div>
                                </div>

                                <div class="form-group">
                            <div class="row">
                                    <div class="col-md-12">
                                    
                                    <div class="form-check">
  <input class="form-check-input" type="checkbox" {{ session('terms_and_conditions') || old('terms_and_conditions')? 'checked': '' }} name="terms_and_conditions" id="tos">
  <label class="form-check-label" for="tos">
    I have read and accept the <a style="color: #ffcc78;" href="{{ route('toc') }}" target="_blank" >terms and conditions</a> of Hi-Impact Cruise.
  </label>
</div>

                                    </div>
                                </div>
                                </div>
                                <div class="form-group mt-2">
                    <div class="g-recaptcha" data-sitekey="6LfPpK4UAAAAAIZGpMwuCwHWeKzL9LzKnleU_I12"></div>
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
            const dateSelectors = @json(['dates' => $d, 'packageId' => $package->id, 'requestToken' => csrf_token()]);
            $('.day-checkbox').hide();
            $('.night-checkbox').hide();

            ds();

            function ds() {
                var option = $('.date-selector').val();
                console.log(option);
                if(option) {
                    console.log(dateSelectors);
                    let item = dateSelectors['dates'][option];
                    if(item) {
                        if(item.day) {
                            $('.day-checkbox').show();
                        } else {
                            $('.day-checkbox').hide();
                        }

                        if(item.night) {
                            $('.night-checkbox').show();
                        } else {
                            $('.night-checkbox').hide();
                        }
                    }
                } else {
                    $('.day-checkbox').hide();
                    $('.night-checkbox').hide();
                }
            }
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
                console.log(resp)
                let available_days = resp.available_days;
                
                available_days = available_days.map(d => d.name);
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

            $('input[name=payment_method').change( function(e) {
                var url = $(".paystack_url").val();
                if($(this).val() == "offline") {
                    url = $(".offline_url").val();
                } else {
                    url = $(".paystack_url").val();
                }

                //$("#offline_form").attr("action", url);

            });

            $('.date-selector').change(function(e) {
                var option = $(this).val();
                console.log(option, dateSelectors['packageId']);

                if(option) {
                    checkAvailability(option, dateSelectors['packageId'])
                    console.log(dateSelectors);
                    let item = dateSelectors['dates'][option];
                    if(item) {
                        if(item.day) {
                            $('.day-checkbox').show();
                        } else {
                            $('.day-checkbox').hide();
                        }

                        if(item.night) {
                            $('.night-checkbox').show();
                        } else {
                            $('.night-checkbox').hide();
                        }
                    }
                } else {
                    $('.day-checkbox').hide();
                    $('.night-checkbox').hide();
                }
            });

            function checkAvailability($d, $id) {
                let token = @json(['total_available' => $package->total_available]);

                $.ajax({
                    url: $('#baseURL').val() + '/check-availability',
                    type: 'post',
                    contentType: 'application/json',
                    dataType: 'json',
                    data: JSON.stringify({package_id: $id, date: $d}),
                    failure:function(err){
                        console.log("err");
                    },
                    success: function(resp){ 
                        let count = resp;

                        console.log("Received: ", count, " Versus: ", token['total_available'])

                        if(count && count >= token['total_available']) {
                            alert("The selected package is fully booked for " + $d);
                            $('.date-selector').val("");
                            $('.day-checkbox').hide();
                            $('.night-checkbox').hide();
                            return;
                        }
                    }

                });
            }

            /**
            <div class="col-md-7">
                                    <label>Date</label>
                                    <input style="color: black;" value="{{ session()->pull('start_date')?: old('start_date') }}" type="text" class="form-control date pick_date" name1="start_date1" id="start_date" disabled>
                                    </div>
                                    */
        </script>
        
        @endsection