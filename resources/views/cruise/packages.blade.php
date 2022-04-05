  @extends('layouts.cruise')
  @section('title') Yacht Packages @endsection
@section("content")

<section class="set-bg-base">
      <div class="container">
        <h4 class="all-caps">Packages</h4>
        <!--h4 class="center">Our Yatchs</h4-->
        @foreach($yachts as $yacht)
        @if($yacht->publish == 1 && $yacht->purpose == 'yacht')
        <div class="col-md-6 col-md-offset-3 flyInRight">
          <div class="container product-box-cont">
            <div class="product-box">
              <h4>Eugene 1</h4>
              <img src="{{ $yacht->yachtphoto()? 'public'. \Illuminate\Support\Facades\Storage::url($yacht->yachtphoto()->file->filename): asset('public/assets/img/banners/eugene1_bn.jpg') }}" alt="" />
              {!! $yacht->description !!}
              <a href="{{route('package',['yacht'=> 1])}}" class="btn btn-primary">view packages</a>
            </div>
          </div>
        </div>
        @endif
        @endforeach
        {{-- <!--div class="col-md-6 flyInLeft">
          <div class="container product-box-cont">
            <div class="product-box">
              <h4>Eugene</h4>
              <img src="{{ asset('public/assets/img/banners/eugene_bn.jpg') }}" alt="" />
              <p class="opaque">
                Eugene is a private luxurious yacht with a capacity of 8 to 10
                people.The beautiful leather interior piece sailing at 8 to 10
                knots cruising speed has a black water tank capacity of
                220litres and fully air conditioned with 8000 BTU with bathroom
                shower and kitchenette.This is solely A PRIVATE CRUISE
              </p>
              <ul>
                <li>Exquisite interior design.</li>
                <li>Exclusive private cruises for adventure</li>
                <li>Family cruise</li>
                <li>Couple cruise and lots more</li>
                <li>Family of up to 10</li>
                <li>
                  Honeymoon cruise for 4hrs in private enclosed en-suite cabin
                </li>
                <li>Bridal showers for 10</li>
                <li>Private disco party with Superb Music system</li>
              </ul>
              <a href="{{route('package',['yacht'=> 2])}}" class="btn btn-primary">view packages</a>
            </div>
          </div>
        </div--> --}}
      </div>
    </section>
   
    <section class="pattern1 no-margin pad-10 mid-space">
      <div class="container">
        <img src="{{ asset('public/assets/img/logo-icon.png') }}" alt="" class="logo-icon-section" />
        <h3 class="all-caps">Dream, Discover, Explore</h3>
      </div>
    </section>
   
    <div id="loader">
      <div class="loading"></div>
      <span>loading..</span>
    </div>
    <!-- Including Jquery so All js Can run -->
    
    @endsection