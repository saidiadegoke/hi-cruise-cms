@extends('layouts.cruise')

@section("content")


    <section class="set-bg-base">
      <div class="container">
        <h4 class="all-caps">Packages</h4>
        <!--h4 class="center">Our Yatchs</h4-->

        @foreach ($yachts as $yacht)
        
        <div class="col-md-6 flyInRight">
          <div class="container product-box-cont">
            <div class="product-box">
              <h4>{{$yacht->name}}</h4>
              {{-- {{ dd($yacht->images)}} --}}
            <img src="/storage/{{ $yacht->images}}" alt="" />
              {{-- <img src="{{asset('/assets/img/banners/eugene1_bn.jpg')}}" alt="" /> --}}
              <p class="opaque">
                {!! $yacht->description !!}
              </p>
              <ul>
                <li>Exquisite interior design.</li>
                <li>
                  Fully air-conditioned interior with chilling capacity of
                  528,000BTU.
                </li>
                <li>Guest capacity: 600 (Banquet) & 1000 (standing)</li>
                <li>Automated sunroof</li>
                <li>In-built 32 CCTV Cameras</li>
                <li>Automated Sensor Doors</li>
                <li>Hygienic Toilets</li>
                <li>4 Cabin rooms and so much more</li>
              </ul>
              <a href="{{route('package',['yatch'=>$yacht->id])}}" class="btn btn-primary">view packages</a>
            </div>
          </div>
        </div>

        @endforeach
        
      </div>
    </section>
   
    <section class="pattern1 no-margin pad-10 mid-space">
      <div class="container">
        <img src="img/logo-icon.png" alt="" class="logo-icon-section" />
        <h3 class="all-caps">Dream, Discover, Explore</h3>
      </div>
    </section>
   
    <div id="loader">
      <div class="loading"></div>
      <span>loading..</span>
    </div>
    <!-- Including Jquery so All js Can run -->
    
    @endsection