@extends('layouts.cruise')

@section('title') Eugene Packages @endsection
@php
  $slides = $yacht->slides();
  $banner = $yacht->banner();
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
          <h4 class="all-caps">{{$yacht->name}}</h4>
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
  <section class="primary-color no-margin pad-10 mid-space set-bg-base">
      <div class="container">
        <h4 class="all-caps">{{$yacht->name}} PACKAGES</h4>
        <div class="col-md-12">
          <div class="col-md-6 package-listing">
            <h4 class="center no-float">SILVER PACKAGE</h4>
            <span class="span-price" style="position: relative">&#8358; 300,000 <em class="subprice">
            (For 2-hour dry hire)</em></span>
            {!! $yacht->packages[0]->description !!}
            <form class="form-horizontal" action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="4">
            <button class="btn btn-primary" style="width: 100%; margin-top: 1.2em;">Book Now</button>
            </form>
          </div>
          <div class="col-md-6 package-listing">
            <h4 class="center no-float">GOLD PACKAGE</h4>
            <span class="span-price" style="position: relative">&#8358; 500,000 <em class="subprice">
            (For 4-hour dry hire)</em></span>
            {!! $yacht->packages[1]->description !!}
            <form class="form-horizontal" action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="5">
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

@endsection