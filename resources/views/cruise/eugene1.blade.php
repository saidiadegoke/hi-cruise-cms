@extends('layouts.cruise')
    <header id="header">
      <div class="container">
        <div id="ini">
          <div class="col-md-4 main-menu">
            <img class="logo" src="img/logo.png" />
          </div>
          <div class="col-md-8 main-menu">
            <nav>
              <ul>
                <li><a href="index.html">home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li>
                  <a href="packages.html"
                    >Packages <i class="fa fa-angle-down"></i>
                    <ul class="dropdown downUp">
                      <li><a href="eugene1.html">Eugene 1</a></li>
                      <li><a href="eugene.html">Eugene </a></li>
                    </ul>
                  </a>
                </li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="contact.html">contact</a></li>
                <li><a href="register.html">register</a></li>
                <li><a href="login.html">Login</a></li>
              </ul>
              <!--a href="#" class="book-btn">Bookings &amp; Reservations</a-->
            </nav>
          </div>
        </div>
        <div id="scrl">
          <div class="col-md-4 main-menu">
            <img class="logo" src="img/logo.png" />
          </div>
          <div class="col-md-8 main-menu">
            <nav class="scrolled">
              <ul>
                <li><a href="index.html">home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li>
                  <a href="packages.html"
                    >Packages <i class="fa fa-angle-down"></i>
                    <ul class="dropdown downUp">
                      <li><a href="eugene1.html">Eugene 1</a></li>
                      <li><a href="eugene.html">Eugene </a></li>
                    </ul>
                  </a>
                </li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="contact.html">contact</a></li>
                <li><a href="register.html">register</a></li>
                <li><a href="register.html">Login</a></li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="mobile-menu">
          <div class="col-md-4">
            <img class="logo" src="img/logo.png" />
          </div>
          <i class="fa fa-bars bar-open"></i>
          <i class="fa fa-bars bar-close"></i>
          <div class="menu">
            <ul class="mbl-menu">
              <li><a href="index.html">home</a></li>
              <li><a href="about.html">About Us</a></li>
              <li>
                <a href="packages.html"
                  >Packages <i class="fa fa-angle-down"></i>
                  <ul class="dropdown downUp">
                    <li><a href="eugene1.html">Eugene 1</a></li>
                    <li><a href="eugene.html">Eugene </a></li>
                  </ul>
                </a>
              </li>
              <li><a href="gallery.html">Gallery</a></li>
              <li><a href="contact.html">contact</a></li>
              <li><a href="register.html">register</a></li>
              <li><a href="register.html">Login</a></li>
              <i class="fa fa-times" id="close"></i>
            </ul>
          </div>
        </div>
      </div>
    </header>
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
          <img src="img/banners/eugene1_bn.jpg" />
        </div>
        <div class="listing-cont">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner listings" role="listbox">
                    <div class="item active">
                        <div class="row">
                            <div class="col-md-3 img-holder">
                                <img src="img/banners/b11.jpg" alt="" class="thumbs-list">
                            </div>
                            <div class="col-md-3 img-holder">
                                <img src="img/banners/b12.jpg" alt="" class="thumbs-list">
                            </div>
                            <div class="col-md-3 img-holder">
                                <img src="img/banners/bn01.jpg" alt="" class="thumbs-list">
                            </div>
                            <div class="col-md-3 img-holder">
                                <img src="img/banners/bn02.jpg" alt="" class="thumbs-list">
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                                <div class="col-md-3 img-holder">
                                    <img src="img/banners/bn03.jpg" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="img/banners/b9.jpg" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="img/banners/b10.jpg" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="img/banners/b4.jpg" alt="" class="thumbs-list">
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
            <a href="#" class="btn btn-primary">Book Now</a>
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
            <a href="#" class="btn btn-primary">Book Now</a>
          </div>
          <div class="col-md-4 package-listing">
            <h4 class="center no-float">ROYAL PACKAGE</h4>
            <span>&#8358; 1,000,000 Flat </span>
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
            <a href="#" class="btn btn-primary">Book Now</a>
          </div>
        </div>
      </div>
    </section>
    <section class="pattern1 no-margin pad-10 mid-space">
      <div class="container">
        <img src="img/logo-icon.png" alt="" class="logo-icon-section" />
        <h3 class="all-caps">Dream, Discover, Explore</h3>
      </div>
    </section>
    <footer>
      <div class="container" style="padding:30px 0px;">
        <div class="col-md-12">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.7763434619374!2d3.359796114683554!3d6.549898224673285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8d9460a7be7b%3A0x64caf3a2460e953e!2s32+Coker+Rd%2C+Ilupeju%2C+Lagos!5e0!3m2!1sen!2sng!4v1562360908061!5m2!1sen!2sng"
            width="100%"
            height="300"
            frameborder="0"
            style="border:0"
            allowfullscreen
          ></iframe>
          <h4 class="center">Contact</h4>
          <p style="text-align: center">32, Coker road, Ilupeju, Lagos.</p>
          <p style="text-align: center">info@hi-impactcruise.com</p>
          <p style="text-align: center">0818 8245 734, 0806 4831 491</p>
        </div>
      </div>
      <div class="footer">
        <div class="container">
          <div class="col-md-6">
            Copyright &copy; 2019 All rights reserved
            <a href="#"> | Privacy Policy </a>
            <a href="#"> | Terms and Condition</a>
          </div>
          <div class="col-md-6 pull-right socials">
            <li>
              <a href="#"> <i class="fab fa-facebook-f"></i></a>
            </li>
            <li>
              <a href="#"> <i class="fab fa-twitter"></i></a>
            </li>
            <li>
              <a href="#"> <i class="fab fa-instagram"></i></a>
            </li>
          </div>
        </div>
      </div>
    </footer>
    
    
