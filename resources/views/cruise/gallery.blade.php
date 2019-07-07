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
    <section class="pattern1 no-margin pad-10 mid-space marg-Top-60">
      <div class="container">
        <h4 class="all-caps">Our Gallery</h4>
        <div class="marg-Top-30" id="main-gallery">
          <a
            href="1"
            class="btn profile-btn col-md-3 "
            onclick="return maxPic(this)"
          >
            <div class="col">
              <div class="blog">
                <img src="img/banners/bn01.jpg" />
              </div>
            </div>
          </a>
          <a
            href="2"
            class="btn profile-btn col-md-3 "
            onclick="return maxPic(this)"
          >
            <div class="col">
              <div class="blog">
                <img src="img/banners/bn02.jpg" />
              </div>
            </div>
          </a>
          <a
            href="3"
            class="btn profile-btn col-md-3 "
            onclick="return maxPic(this)"
          >
            <div class="col">
              <div class="blog">
                <img src="img/banners/bn03.jpg" />
              </div>
            </div>
          </a>
          <a
            href="4"
            class="btn profile-btn col-md-3 "
            onclick="return maxPic(this)"
          >
            <div class="col">
              <div class="blog">
                <img src="img/banners/bn04.jpg" />
              </div>
            </div>
          </a>
          <a
            href="1"
            class="btn profile-btn col-md-3 "
            onclick="return maxPic(this)"
          >
            <div class="col">
              <div class="blog">
                <img src="img/banners/bn01.jpg" />
              </div>
            </div>
          </a>
          <a
            href="2"
            class="btn profile-btn col-md-3 "
            onclick="return maxPic(this)"
          >
            <div class="col">
              <div class="blog">
                <img src="img/banners/bn02.jpg" />
              </div>
            </div>
          </a>
          <a
            href="3"
            class="btn profile-btn col-md-3 "
            onclick="return maxPic(this)"
          >
            <div class="col">
              <div class="blog">
                <img src="img/banners/bn03.jpg" />
              </div>
            </div>
          </a>
          <a
            href="4"
            class="btn profile-btn col-md-3 "
            onclick="return maxPic(this)"
          >
            <div class="col">
              <div class="blog">
                <img src="img/banners/bn04.jpg" />
              </div>
            </div>
          </a>
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
    <div id="modal" class="modal" style="display: none;">
      <i class="fa fa-times" id="clsModal" onclick="clsModal()"></i>
      <div class="pic-holder" id="holder">
        <img
          src="img/banners/bn01.jpg"
          class="galImg"
          alt=""
          data-id="1"
          style="display: none;"
        />
        <img
          src="img/banners/bn02.jpg"
          class="galImg current"
          alt=""
          data-id="2"
          style="display: none;"
        />
        <img
          src="img/banners/bn03.jpg"
          class="galImg"
          alt=""
          data-id="3"
          style="display: none;"
        />
        <img
          src="img/banners/bn04.jpg"
          class="galImg current"
          alt=""
          data-id="4"
          style="display: none;"
        />
      </div>
      <a href="#" onclick="backImg()" class="pointers"
        ><i class="fa fa-angle-left pointers"></i
      ></a>
      <a href="#" onclick="nextImg()" class="pointers right-align"
        ><i class="fa fa-angle-right pointers"></i
      ></a>
    </div>

@endsection
    <!-- Including Jquery so All js Can run -->
@section("scripts")
    <script>
      function maxPic(obj) {
        event.preventDefault();

        var galID = obj.getAttribute("href");
        var targetDiv = document.querySelectorAll(".galImg");
        for (var i = 0; i < targetDiv.length; i++) {
          if (
            obj.getAttribute("href") == targetDiv[i].getAttribute("data-id")
          ) {
            targetDiv[i].style.display = "block";
            targetDiv[i].className += " current";
          }
        }
        document.getElementById("modal").style.display = "block";
      }

      //function to move the form pages left and right for easy user access
      var slideIndex = 1;

      function nextImg() {
        event.preventDefault();

        var i;
        var slides = document.getElementsByClassName("galImg");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
          slides[i].classList.remove("current");
        }
        slideIndex++;
        if (slideIndex > slides.length) {
          slideIndex = 1;
        }
        slides[slideIndex - 1].style.display = "block";
        slides[slideIndex - 1].className += " current";
      }

      function backImg() {
        event.preventDefault();

        var i;
        var slides = document.getElementsByClassName("galImg");
        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
          slides[i].classList.remove("current");
        }
        slideIndex--;
        if (slideIndex == 0 || slideIndex == 1) {
          slideIndex = slides.length;
        }
        slides[slideIndex - 1].style.display = "block";
        slides[slideIndex - 1].className += " current";
      }
      function clsModal(){
          document.getElementById("modal").style.display='none';
          var targetDiv = document.querySelectorAll(".galImg");
          for( var i = 0; i < targetDiv.length; i++){
            targetDiv[i].style.display="none";
          }        
      }	      
    </script>
@endsection
