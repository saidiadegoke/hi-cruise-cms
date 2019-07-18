@extends('layouts.cruise')
@php
  $slides = $yacht->slides();
  $banner = $yacht->banner();
  // dd($slides)
  // dd($slides[0]->file->filename);
@endphp
@section('content')



<section class="" style="margin-top: 200px">
    <div class="container styled-border-2">
        <div class="col-md-6">

          <h4 class="all-caps"> {{$yacht->name}} </h4>

          <p class="justify-center downUp">
            {!! $yacht->description !!}
          </p>

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

          @foreach ($yacht->packages as $package)
              
          
          <div class="col-md-4 package-listing">
            <form action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="{{$package->id}}">
            <h4 class="center no-float">{{$package->name}}</h4>
            <span>&#8358; {{$package->price}}</span>
            <ul>
              <li>CAPACITY OF 450 GUESTS</li>
              <li>Lower and middle Deck</li>
              <li>FRIDAY - SUNDAY</li>
              <li>Spectacular ambient lighting and sound.</li>
              <li>Thrilling 4 hour cruise across Lagos waters.</li>
              <li>Sumptuous 3 course meal and drinks</li>
              <li>Fun games on deck</li>
              <li>High grade sound from DJ or Live band</li>
              <li>Serene and secure ambience.</li>
            </ul>
            <button type="submit" class="btn btn-primary">Book Now</button>
            </form>
          </div>
          @endforeach
          
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