@extends('layouts.cruise')
@section('title') Eugene 1 Packages @endsection
@php
  $slides = $yacht->slides();
  $banner = $yacht->banner();
  // dd($slides)
  // dd($slides[0]->file->filename);
@endphp
@section('content')

<style>
    .announce {
        width: 60%;
        margin: 0 auto;
    }  
    .subprice {
      font-size: 14px; 
      position: absolute; 
      top: 45px; 
      display: block; 
      width: 100%;
      font-style: normal;
    }  

    .package-listing:hover .span-price .subprice {
      font-size: 13px; 
      position: absolute; 
      top: 35px; 
      display: block; 
      width: 100%;
      font-style: normal;
    } 
    @media(max-width: 992px) {
        .announce {
            width: 100%;
        }
         
    }
  </style>

<section class="" style="margin-top: 200px">
    <div class="container styled-border-2">
        <div class="col-md-6">

          <h4 class="all-caps"> {{$yacht->name}} </h4>

          <div class="justify-center downUp">
            {!! $yacht->description !!}
          </div>

        </div>
        <div class="col-md-6">
          <img src="{{ asset('public/storage/'.$banner->file->filename) }}" />
        </div>
        <div class="listing-cont">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner listings" role="listbox">
                    <div class="item active">
                        <div class="row">
                          @foreach ($slides as $slide)
                            <div class="col-md-3 img-holder">
                              <img src="{{ asset('public/storage/'.$slide->file->filename) }}" alt="" class="thumbs-list">
                            </div>  
                          @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </section>
  <section class="no-margin pad-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <p class="text-center lead announce fallDown">
                
            
                Our regular cruises come up every Friday, Saturday, and Sunday on Eugene 1.
Why not join us on this adventure of a lifetime.
Booking is secure, fast and easy and is just a click away.
                <br /><br />
                Our yachts can also serve as the perfect luxury venue for your private
parties, weddings, birthdays, photo shoots, get togethers, and corporate
events.<br /><br />
Our Social or Corporate packages can be tailored to fit your requirements.
Please <a style="color: #ffcc78;" href="{{ route('details') }}"
                          onclick="event.preventDefault();
                                          document.getElementById('event-form').submit();">
                          {{ __('click here') }}
                      </a> to start planning your event with us!
<form style="    display: flex;
    justify-content: center;
    margin: 2em auto;
}" action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="7"><input type="submit" class="btn btn-link" style="display:inline;color: #ffcc78;padding: 8px 40px" value="click here" /> 

            </form>
            
  </p>
                </div>
            </div>
        </div>
    </section>
 <section class="primary-color no-margin pad-10 mid-space set-bg-base">
      <div class="container">
        <h4 class="all-caps">{{$yacht->name}} PACKAGES</h4>
        <div class="col-md-12">
          <div class="col-md-4 package-listing">
            <h4 class="center no-float">PRESTIGE PACKAGE</h4>
            <!--span>&#8358; 30,000 p/head</span-->
            <span class="span-price" style="position: relative">&#8358; 30,000,00 <em class="subprice">
            (per person)</em></span>
            {!! $yacht->packages[0]->description !!}
            <form class="form-horizontal" action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="1">
            <button class="btn btn-primary" style="width: 100%; margin-top: 1.2em;">Book Now</button>
            </form>
          </div>
          <div class="col-md-4 package-listing">
            <h4 class="center no-float">DELUXE PACKAGE</h4>
            <span class="span-price" style="position: relative">&#8358; 35,000,00 <em class="subprice">
            (per person)</em></span>
            {!! $yacht->packages[1]->description !!}
            <form class="form-horizontal" action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="2">
            <button class="btn btn-primary" style="width: 100%; margin-top: 1.2em;">Book Now</button>
            </form>
          </div>
          <div class="col-md-4 package-listing">
            <h4 class="center no-float">ROYAL PACKAGE</h4>
            <span class="span-price" style="position: relative">&#8358; 1,000,000 Flat <em class="subprice">
            (For 20 Guests)</em></span>
            {!! $yacht->packages[2]->description !!}
            <form class="form-horizontal" action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="3">
            <button class="btn btn-primary" style="width: 100%; margin-top: 1.2em;">Book Now</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="primary-color no-margin pad-10">
      <div class="container">
        <div class="col-md-12">
          <div class="col-md-6 event-item package-listing">
            <h4 class="center no-float">SOCIAL EVENTS</h4>
            <ul>
            <li>
            We are the one stop luxury destination for your social functions such as weddings, 
            birthday bash, soirees, bridal shower, hen party, photo shoots, video shoots, and get-togethers.
            </li>
            </ul>
            <form class="form-horizontal" action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="6">
            <button class="btn btn-primary" style="width: 100%; margin-top: 1.2em;">Book Now</button>
            </form>
          </div>
          <div class="col-md-6 event-item package-listing">
            <h4 class="center no-float">CORPORATE EVENTS</h4>
            <ul>
            <li>Take a change from the norm, our venue is ideal for all corporate events like retreats, Anniversaries, 
            AGMs, End of year parties, Team building, Award ceremonies, many games, e.t.c 
            </li>
            </ul>
            <form class="form-horizontal" action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="7">
            <button class="btn btn-primary" style="width: 100%; margin-top: 1.2em;">Book Now</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  <section class="pattern1 no-margin pad-10 mid-space">
    <div class="container">
      <img src="{{ asset('public/assets/img/logo-icon.png') }}" alt="" class="logo-icon-section" />
      <h3 class="all-caps">Dream, Discover, Explore</h3>
    </div>
  </section>

  
    <form id="event-form" action="{{ route('details') }}" method="POST" style="display: none;">
    <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="7"><input type="submit" class="btn btn-link" style="display:inline;color: #ffcc78;padding: 8px 40px" value="click here" /> 

        @csrf
    </form>

@endsection