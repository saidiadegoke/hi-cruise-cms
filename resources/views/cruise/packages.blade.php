@extends('layouts.cruise')

@section("content")
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
    <section class="set-bg-base">
      <div class="container">
        <h4 class="all-caps">Packages</h4>
        <!--h4 class="center">Our Yatchs</h4-->
        <div class="col-md-6 flyInRight">
          <div class="container product-box-cont">
            <div class="product-box">
              <h4>Eugene 1</h4>
              <img src="img/banners/eugene1_bn.jpg" alt="" />
              <p class="opaque">
                Eugene 1 is our luxury 140ft three-storey yacht which comes with
                top of the range features such as; Exquisite interior design,
                Fully air-conditioned interior with chilling capacity of
                528,000BTU, Guest capacity: 600 (Banquet) & 1000 (standing),
                Automated sunroof, In-built 32 CCTV Cameras, Automated Sensor
                Doors, Hygienic Toilets, 230KW power generation, 4 Cabin rooms
                and so much more...
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
              <a href="eugene1.html" class="btn btn-primary">view packages</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 flyInLeft">
          <div class="container product-box-cont">
            <div class="product-box">
              <h4>Eugene</h4>
              <img src="img/banners/eugene_bn.jpg" alt="" />
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
              <a href="eugene.html" class="btn btn-primary">view packages</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--section class="set-bg-base">
      <div class="container">
        <h4 class="all-caps">Packages</h4>
        <div class="col-md-6">
          <div class="container product-box-cont">
            <div class="product-box">
              <h4>Eugene 1</h4>
              <p class="opaque">
                Eugene 1 is our luxury 140ft three-storey yacht which comes with
                top of the range features such as; Exquisite interior design,
                Fully air-conditioned interior with chilling capacity of
                528,000BTU, Guest capacity: 600 (Banquet) & 1000 (standing),
                Automated sunroof, In-built 32 CCTV Cameras, Automated Sensor
                Doors, Hygienic Toilets, 230KW power generation, 4 Cabin rooms
                and so much more...
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
              <a href="#" class="btn btn-primary">view packages</a>
            </div>
            <img src="img/banners/bn01.jpg" alt="" class="base-pic" />
          </div>
        </div>
        <div class="col-md-6">
          <div class="container product-box-cont">
            <div class="product-box">
              <h4>Eugene</h4>
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
              <a href="#" class="btn btn-primary">view packages</a>
            </div>
            <img src="img/banners/b1.jpg" alt="" class="base-pic" />
          </div>
        </div>
      </div>
    </section-->
    <section class="pattern1 no-margin pad-10 mid-space">
      <div class="container">
        <img src="img/logo-icon.png" alt="" class="logo-icon-section" />
        <h3 class="all-caps">Dream, Discover, Explore</h3>
      </div>
    </section>
    <footer>
      <div class="container" style="padding:30px 0px;">
        <div class="col-md-12">
          <h4 class="center">Contact</h4>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.7763434619374!2d3.359796114683554!3d6.549898224673285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8d9460a7be7b%3A0x64caf3a2460e953e!2s32+Coker+Rd%2C+Ilupeju%2C+Lagos!5e0!3m2!1sen!2sng!4v1562360908061!5m2!1sen!2sng"
            width="100%"
            height="300"
            frameborder="0"
            style="border:0"
            allowfullscreen
          ></iframe>
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
    <div id="loader">
      <div class="loading"></div>
      <span>loading..</span>
    </div>
    <!-- Including Jquery so All js Can run -->
    
    @endsection