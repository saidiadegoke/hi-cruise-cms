@extends('layouts.cruise')
@section('content')
    <section class="" style="margin-top: 200px">
      <div class="container styled-border-2">
        <div class="col-md-6">
          <h4 class="all-caps">{{$yacht->name}}</h4>
          <p class="justify-center downUp">
              {!! $yacht->description !!}
          </p>
        </div>
        
        <div class="col-md-6">

          
            @foreach ($yacht->images as $image)
                @if($image->type =='banner')
                  <img src="{{ asset('public/storage/' . $image->filename) }}" />
                @endif
                @php
                  break;    
                @endphp
            @endforeach

        </div>
        <div class="listing-cont">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner listings" role="listbox">
                    <div class="item active">
                        <div class="row">
                          @foreach ($yacht->images as $image)
                              @if(strpos($image->filename,'slides'))
                                  <div class="col-md-3 img-holder">
                                    <img src="{{ asset('public/storage/' . $image->filename) }}" alt="" class="thumbs-list">
                                  </div>
                              @endif

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
        <h4 class="all-caps">{{$yacht->name}} Packages</h4>
        <div class="col-md-12">
          @foreach ($yacht->packages as $package)
              @if($package->publish == 1)
          
          <div class="col-md-6 package-listing">
            <form action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="{{$package->id}}">
            <h4 class="center no-float">{{$package->name}}</h4>
            <span>&#8358; {{$package->price}}</span>
            <ul>
              <li>CAPACITY OF 10 GUESTS</li>
              <li>FRIDAY - SUNDAY</li>
              <li>2 hour cruise across Lagos waters.</li>
              <li>Ideal for:</li>
              <li>Private parties</li>
              <li>Retreats</li>
              <li>Re-unions</li>
              <li>Bridal showers.</li>
              <li>Marriage proposals.</li>
              <li>Honeymoon.</li>
              <li>and Get-together</li>
              <li>Complimentary bottle of Fine wine.</li>
              <li>Top grade sound system</li>
              <li>Serene and secure ambience.</li>
              <li>*Extra cruise time attracts =N=100,000 per hour.</li>
            </ul>
            <button type="submit" class="btn btn-primary">Book Now2</button>
            </form>
          </div>
          @endif
          @endforeach
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