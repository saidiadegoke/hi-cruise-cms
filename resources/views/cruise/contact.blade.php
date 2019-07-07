@extends("layouts.cruise")

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
                <li><a href="login.html">Login</a></li>
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
              <li><a href="login.html">Login</a></li>
              <i class="fa fa-times" id="close"></i>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <section class="primary-color no-margin pad-10 mid-space">
      <div class="container">
        <div class="col-md-12">
          <div class="col-md-6 floater-img">
            <span class="sp-cap">We will love to hear from you</span>
            <img src="img/contact.jpg" alt="" class="floater-img" />
          </div>
          <div class="col-md-6">
            <div class="col-md-12 bordered">
              <div class="container">
                <form action="" class="">
                  <h4 class="center">Contact Form</h4>
                  <div class="form-group">
                    <label for="">Fullname</label>
                    <input type="text" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="">Mobile</label>
                    <input type="text" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="">Message</label>
                    <textarea name="" id="" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input
                      type="submit"
                      class="btn btn-primary"
                      value="Send Message"
                    />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
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
@endsection


@section("styles")
<link
      type="text/css"
      href="lib/datepicker/datepicker.css"
      rel="stylesheet"
    />

@endsection