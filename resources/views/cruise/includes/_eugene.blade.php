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
          <img src="{{ asset('public/assets/img/banners/eugene_bn.jpg') }}" />
        </div>
        <div class="listing-cont">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner listings" role="listbox">
                    <div class="item active">
                        <div class="row">
                            <div class="col-md-3 img-holder">
                                <img src="{{ asset('public/assets/img/banners/b1.jpg') }}" alt="" class="thumbs-list">
                            </div>
                            <div class="col-md-3 img-holder">
                                <img src="{{ asset('public/assets/img/banners/b2.jpg') }}" alt="" class="thumbs-list">
                            </div>
                            <div class="col-md-3 img-holder">
                                <img src="{{ asset('public/assets/img/banners/b3.jpg') }}" alt="" class="thumbs-list">
                            </div>
                            <div class="col-md-3 img-holder">
                                <img src="{{ asset('public/assets/img/banners/bn04.jpg') }}" alt="" class="thumbs-list">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                                <div class="col-md-3 img-holder">
                                    <img src="{{ asset('public/assets/img/banners/bn05.jpg') }}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{ asset('public/assets/img/banners/b1.jpg') }}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{ asset('public/assets/img/banners/b2.jpg') }}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{ asset('public/assets/img/banners/b3.jpg') }}" alt="" class="thumbs-list">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
    <section class="primary-color no-margin pad-10 mid-space set-bg-base">
      <div class="container">
        <h4 class="all-caps">Eugene PACKAGES</h4>
        <div class="col-md-12">
          <div class="col-md-6 package-listing">
            <h4 class="center no-float">SILVER PACKAGE</h4>
            <span>&#8358; 300,000 flat</span>
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
            <form class="form-horizontal" action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="3">
            <button class="btn btn-primary" style="width: 100%; margin-top: 1.2em;">Book Now</button>
            </form>
          </div>
          <div class="col-md-6 package-listing">
            <h4 class="center no-float">GOLD PACKAGE</h4>
            <span>&#8358; 500,000 Flat </span>
            <ul>
              <li>MAXIMUM OF 10 GUESTS</li>
              <li>FRIDAY - SUNDAY</li>
              <li>4 hour cruise across Lagos waters.</li>
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
            <form class="form-horizontal" action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="4">
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