<style>
    .announce {
        width: 60%;
        margin: 0 auto;
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
          <h4 class="all-caps">Eugene 1</h4>
          <p class="justify-center downUp">
            Eugene 1 is our luxury 140ft three-storey yacht which comes with top
            of the range features such as; Exquisite interior design, Fully
            air-conditioned interior with chilling capacity of 528,000BTU, Guest
            capacity: 600 (Banquet) & 1000 (standing), Automated sunroof,
            In-built 32 CCTV Cameras, Automated Sensor Doors, Hygienic Toilets,
            230KW power generation, 4 Cabin rooms and so much more...
          </p>
        </div>
        <div class="col-md-6">
          <img src="{{ asset('public/assets/img/banners/eugene1_bn.jpg') }}" />
        </div>
        <div class="listing-cont">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner listings" role="listbox">
                    <div class="item active">
                        <div class="row">
                            <div class="col-md-3 img-holder">
                                <img src="{{ asset('public/assets/img/banners/b11.jpg') }}" alt="" class="thumbs-list">
                            </div>
                            <div class="col-md-3 img-holder">
                                <img src="{{ asset('public/assets/img/banners/b12.jpg') }}" alt="" class="thumbs-list">
                            </div>
                            <div class="col-md-3 img-holder">
                                <img src="{{ asset('public/assets/img/banners/bn01.jpg') }}" alt="" class="thumbs-list">
                            </div>
                            <div class="col-md-3 img-holder">
                                <img src="{{ asset('public/assets/img/banners/bn02.jpg') }}" alt="" class="thumbs-list">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                                <div class="col-md-3 img-holder">
                                    <img src="{{ asset('public/assets/img/banners/bn03.jpg') }}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{ asset('public/assets/img/banners/b9.jpg') }}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{ asset('public/assets/img/banners/b10.jpg') }}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{ asset('public/assets/img/banners/b4.jpg') }}" alt="" class="thumbs-list">
                                </div>
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
                <p class="text-center lead announce">
                
            
                Our regular cruises come up every Friday, Saturday, and Sunday on Eugene 1.
Why not join us on this adventure of a lifetime.
Booking is secure, fast and easy and is just a click away.
                <br /><br />
                Our yachts can also serve as the perfect luxury venue for your private
parties, weddings, birthdays, photo shoots, get togethers, and corporate
events.<br /><br />
Our Social or Corporate packages can be tailored to fit your requirements.
Please click here to start planning your event with us!
<form style="    display: flex;
    justify-content: center;
    margin: 2em auto;
}" action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="7"><input class="btn btn-link" style="display:inline;color: #ffcc78" value="click here" /> 

            </form>
            
  </p>
                </div>
            </div>
        </div>
    </section>
    <section class="primary-color no-margin pad-10 mid-space set-bg-base">
      <div class="container">
        <h4 class="all-caps">Eugene 1 PACKAGES</h4>
        <div class="col-md-12">
          <div class="col-md-4 package-listing">
            <h4 class="center no-float">PRESTIGE PACKAGE</h4>
            <span>&#8358; 30,000 p/head</span>
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
            <form class="form-horizontal" action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="1">
            <button class="btn btn-primary" style="width: 100%; margin-top: 1.2em;">Book Now</button>
            </form>
          </div>
          <div class="col-md-4 package-listing">
            <h4 class="center no-float">DELUXE PACKAGE</h4>
            <span>&#8358; 35,000 p/head</span>
            <ul>
              <li>EXCLUSIVE TO 100 GUESTS</li>
              <li>Upper Deck</li>
              <li>FRIDAY - SUNDAY</li>
              <li>Stunning balcony view of Lagos waters</li>
              <li>Thrilling 4 hour cruise across Lagos waters.</li>
              <li>Exquisite and luxurious decor suitable for lounging</li>
              <li>3 course meal and a bottle of wine</li>
              <li>Exclusive fully stocked Deluxe Bar</li>
              <li>Fun games on deck.</li>
              <li>High grade sound from DJ or Live band.</li>
              <li>Serene and secured ambience Automated sunroof..</li>
            </ul>
            <form class="form-horizontal" action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="2">
            <button class="btn btn-primary" style="width: 100%; margin-top: 1.2em;">Book Now</button>
            </form>
          </div>
          <div class="col-md-4 package-listing">
            <h4 class="center no-float">ROYAL PACKAGE</h4>
            <span>&#8358; 1,000,000 Flat (For 20 Guests)</span>
            <ul>
              <li>MAXIMUM OF 20 GUESTS</li>
              <li>Exclusive Royal Lounge</li>
              <li>FRIDAY - SUNDAY</li>
              <li>Breath-taking rooftop view of Lagos from the sea</li>
              <li>Thrilling 4 hour cruise across Lagos waters.</li>
              <li>Meet and greet with artistes on board</li>
              <li>
                Exquisite and luxurious decor Suitable for top executives
                artistes and lovers of luxury
              </li>
              <li>
                Exclusive fully stocked Royal Bar 3 course meal with two bottles
                of special champagne
              </li>
              <li>Good music with super sound quality from DJ or Live band</li>
              <li>Lush terrace with reclining seats</li>
              <li>Private and exclusive ambience.</li>
            </ul>
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
    <section class="primary-color no-margin pad-10">
      <div class="container">
        <div class="col-md-12">
          <div class="col-md-6 package-listing">
            <h4 class="center no-float">SOCIAL EVENT</h4>
            <p>
            We are the one stop luxury destination for your social functions such as weddings, 
            birthday bash, soirees, bridal shower, hen party, photo shoots, video shoots, get- togethers.
            </p>
            <form class="form-horizontal" action="{{route('details')}}" method="post">
              @csrf
            <input type="hidden" name="type" value="{{$yacht->id}}">
            <input type="hidden" name="package" value="6">
            <button class="btn btn-primary" style="width: 100%; margin-top: 1.2em;">Book Now</button>
            </form>
          </div>
          <div class="col-md-6 package-listing">
            <h4 class="center no-float">CORPORATE EVENT</h4>
            <p>
            Take a change from the norm, our venue is ideal for all corporate events like retreats, Anniversaries, 
            AGMs, End of year parties, Team building, Award ceremonies, e.t.c 
            </p>
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