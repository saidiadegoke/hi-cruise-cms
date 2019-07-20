<header id="header">
      <div class="container">
        <div id="ini">
          <div class="col-md-4 main-menu">
            <a href="{{ url('/') }}"><img class="logo" src="{{asset('public/assets/img/logo.png')}}" /></a>
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
                      @foreach ($yachts as $yacht)
                      <li><a href="{{route('package',['yacht'=>$yacht->id])}}">{{$yacht->name}}</a></li>
                      @endforeach
                    </ul>
                  </a>
                </li>
                <li><a href="{{route('gallery')}}">Gallery</a></li>
                <li><a href="{{route('contact')}}">contact</a></li>
                @auth
                
                <li>
                  <a href="#">My Account <i class="fa fa-angle-down"></i>
                    <ul class="dropdown downUp">
                      <li><a href="{{route('customer.index')}}">My Profile</a></li>
                      <li><a href="{{route('customer.reservations')}}">Reservations</a></li>
                      <li><a href="{{route('customer.support')}}">Contact Support</a></li>
                      <li><a href="{{route('customer.notifications')}}">Notifications</a></li>
                    </ul>
                  </a>
                </li>   
                    <li>
                      <a class="" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><i class="fa fa-user-lock"></i>
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
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
          <a href="{{ url('/') }}"><img class="logo" src="{{asset('public/assets/img/logo.png')}}" /></a>
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
                      @foreach ($yachts as $yacht)
                      <li><a href="{{route('package',['yacht'=>$yacht->id])}}">{{$yacht->name}}</a></li>
                      @endforeach
                    </ul>
                  </a>
                </li>
                <li><a href="{{route('gallery')}}">Gallery</a></li>
                <li><a href="{{route('contact')}}">contact</a></li>
                @auth
                <li>
                  <a href="#">My Account <i class="fa fa-angle-down"></i>
                    <ul class="dropdown downUp">
                      <li><a href="{{route('customer.index')}}">My Profile</a></li>
                      <li><a href="{{route('customer.reservations')}}">Reservations</a></li>
                      <li><a href="{{route('customer.support')}}">Contact Support</a></li>
                      <li><a href="{{route('customer.notifications')}}">Notifications</a></li>
                    </ul>
                  </a>
                </li>  
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>    
                    <li>
                      <a class="" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><i class="fa fa-user-lock"></i>
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </li>
                @endauth

                @guest
                    <li><a href="{{route('register')}}">register</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
                @endguest
              </ul>
            </nav>
          </div>
        </div>
        <div class="mobile-menu">
          <div class="col-md-4">
          <a href="{{ url('/') }}"><img class="logo" src="{{asset('public/assets/img/logo.png')}}" /></a>
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
              @auth
                <li><a href="{{route('support')}}">Contact Support</a></li>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>    
                    <li>
                      <a class="" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><i class="fa fa-user-lock"></i>
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </li>
                @endauth

                @guest
                    <li><a href="{{route('register')}}">register</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
                @endguest
              <i class="fa fa-times" id="close"></i>
            </ul>
          </div>
        </div>
      </div>
</header>