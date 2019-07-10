<header id="header">
      <div class="container">
        <div id="ini">
          <div class="col-md-4 main-menu">
            <img class="logo" src="{{asset('public/assets/img/logo.png')}}" />
          </div>
          <div class="col-md-8 main-menu">
            <nav>
              <ul>
                <li><a href="{{route('home')}}">home</a></li>
                <li><a href="{{route('about')}}">About Us</a></li>
                <li>
                  <a href="{{route('packages')}}"
                    >Packages <i class="fa fa-angle-down"></i>
                    <ul class="dropdown downUp">
                      <li><a href="{{route('eugene1')}}">Eugene 1</a></li>
                      <li><a href="{{route('eugene')}}">Eugene </a></li>
                    </ul>
                  </a>
                </li>
                <li><a href="{{route('gallery')}}">Gallery</a></li>
                <li><a href="{{route('contact')}}">contact</a></li>
                @auth
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>    
                    <li>
                      <a href="{{route('contact')}}"
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                      </a>
                    </li>
                @endauth

                @guest
                    <li><a href="{{route('register')}}">register</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
                @endguest
              </ul>
              <!--a href="#" class="book-btn">Bookings &amp; Reservations</a-->
            </nav>
          </div>
        </div>
        <div id="scrl">
          <div class="col-md-4 main-menu">
            <img class="logo" src="{{asset('public/assets/img/logo.png')}}" />
          </div>
          <div class="col-md-8 main-menu">
            <nav class="scrolled">
              <ul>
                <li><a href="{{route('home')}}">home</a></li>
                <li><a href="{{route('about')}}">About Us</a></li>
                <li>
                  <a href="{{route('packages')}}"
                    >Packages <i class="fa fa-angle-down"></i>
                    <ul class="dropdown downUp">
                      <li><a href="{{route('eugene1')}}">Eugene 1</a></li>
                      <li><a href="{{route('eugene')}}">Eugene </a></li>
                    </ul>
                  </a>
                </li>
                <li><a href="{{route('gallery')}}">Gallery</a></li>
                <li><a href="{{route('contact')}}">contact</a></li>
                <li><a href="{{route('register')}}">register</a></li>
                <li><a href="{{route('login')}}">Login</a></li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="mobile-menu">
          <div class="col-md-4">
            <img class="logo" src="{{asset('public/assets/img/logo.png')}}" />
          </div>
          <i class="fa fa-bars bar-open"></i>
          <i class="fa fa-bars bar-close"></i>
          <div class="menu">
            <ul class="mbl-menu">
              <li><a href="{{route('home')}}">home</a></li>
              <li><a href="{{route('about')}}">About Us</a></li>
              <li>
                <a href="{{route('packages')}}"
                  >Packages <i class="fa fa-angle-down"></i>
                  <ul class="dropdown downUp">
                    <li><a href="{{route('eugene1')}}">Eugene 1</a></li>
                    <li><a href="{{route('eugene')}}">Eugene </a></li>
                  </ul>
                </a>
              </li>
              <li><a href="{{route('gallery')}}">Gallery</a></li>
              <li><a href="{{route('contact')}}">contact</a></li>
              <li><a href="{{route('register')}}">register</a></li>
              <li><a href="{{route('register')}}">Login</a></li>
              <i class="fa fa-times" id="close"></i>
            </ul>
          </div>
        </div>
      </div>
</header>