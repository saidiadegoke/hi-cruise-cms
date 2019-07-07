@extends("layouts.cruise")

@section("content")
<header id="header">
  <div class="container">
    <div id="ini">
      <div class="col-md-4 main-menu">
        <img class="logo" src="{{asset('assets/img/logo.png')}}" />
      </div>
      <div class="col-md-8 main-menu">
        <nav>
          <ul>
            <li><a href="index.html">home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li>
              <a href="packages.html">Packages <i class="fa fa-angle-down"></i>
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
        <img class="logo" src="{{asset('assets/img/logo.png')}}" />
      </div>
      <div class="col-md-8 main-menu">
        <nav class="scrolled">
          <ul>
            <li><a href="index.html">home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li>
              <a href="packages.html">Packages <i class="fa fa-angle-down"></i>
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
        </nav>
      </div>
    </div>
    <div class="mobile-menu">
      <div class="col-md-4">
        <img class="logo" src="{{asset('assets/img/logo.png')}}" />
      </div>
      <i class="fa fa-bars bar-open"></i>
      <i class="fa fa-bars bar-close"></i>
      <div class="menu">
        <ul class="mbl-menu">
          <li><a href="index.html">home</a></li>
          <li><a href="about.html">About Us</a></li>
          <li>
            <a href="packages.html">Packages <i class="fa fa-angle-down"></i>
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
          <i class="fa fa-times" id="close"></i>
        </ul>
      </div>
    </div>
  </div>
</header>
<section class="banner-inner">
  <img src="{{asset('assets/img/banners/b11.jpg')}}" class="flyInLeft" />
</section>
<section class="page marg-Top-Off-200">
  <div class="container styled-border dropdown">
    <h4 class="all-caps">About us</h4>
    <p class="justify-center downUp">
      Solution Media and Infotech Ltd, the owners of Nigeria’s largest
      amusement park (Hi-Impact Planet) and Nigeria’s first full HD TV
      station (Hi- Impact TV), presents another brilliant addition to the
      Hi-Impact family -Hi- Impact Cruise.
    </p>
    <p class="justify-center downUp">
      Building on years of experience as the leading force in the
      entertainment/recreation industry, we have consistently provided
      memorable moments for our customers. We continue the good work through
      our unequalled luxury cruise line. Hi-Impact Cruise is a product of
      years of careful research and planning centered on the entertainment
      and tourism sectors in Nigeria.
    </p>
  </div>
</section>
<section class="primary-color no-margin pad-10 mid-space">
  <div class="container">
    <div class="col-md-12">
      <div class="col-md-4">
        <h4 class="center no-float">our vision</h4>
        <i class="fa fa-eye"></i>
        <p class="justify-center-2">
          To create a distinct and memorable leisure experience for each
          client through exceptional service delivery.
        </p>
      </div>
      <div class="col-md-4">
        <h4 class="center no-float">our profile</h4>
        <i class="fa fa-folder"></i>
        <p class="justify-center-2">
          Hi Impact Cruise currently operates two high grade luxury yachts
          in her fleet. Both vessels are solidly designed with lavish
          interiors. Whatever your needs, we have something that will excite
          your senses. If you love freedom, privacy, a wide variety of
          choices, and the feeling that goes with star treatment, Hi-Impact
          Cruise is right for you with an option of Eugene or Eugene 1 to
          select from.
        </p>
      </div>
      <div class="col-md-4">
        <h4 class="center no-float">our mission</h4>
        <i class="fa fa-road"></i>
        <p class="justify-center-2">
          To display expertise and distinctiveness in all exchanges with
          both indigenous, international, existing, and prospective clients.
        </p>
      </div>
    </div>
  </div>
</section>
<section class="pattern1 no-margin pad-10 mid-space">
  <div class="container">
    <img src="{{asset('assets/img/logo-icon.png')}}" alt="" class="logo-icon-section" />
    <h3 class="all-caps">Dream, Discover, Explore</h3>
  </div>
</section>
<footer>
  <div class="container" style="padding:30px 0px;">
    <div class="col-md-12">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.7763434619374!2d3.359796114683554!3d6.549898224673285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8d9460a7be7b%3A0x64caf3a2460e953e!2s32+Coker+Rd%2C+Ilupeju%2C+Lagos!5e0!3m2!1sen!2sng!4v1562360908061!5m2!1sen!2sng" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
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

@endsection