@extends('layouts.cruise')
@section("content")
    
    <section class="banner">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item active">
                    <img src="{{asset('assets/img/banners/bn01.jpg')}}">
                    <!--div class="carousel-caption downUp">
                <div class="banner-content">
                    <h4 class="fallDown">get business credit and financing for your company</h4>
                    <p class="downUp">we finance both local and international trades. Our robust loan packages are designed to adapt and enable swift and smooth trading both locally and internationally</p>
                    <span class="call-to-action"> <a href="about.html"> learn more </a></span> 
                    <span class="call-to-action green-btn"> <a href="about.html"> apply now </a></span>
                </div>
            </div-->
                </div><!-- End Item -->

                <div class="item">
                    <img src="{{asset('assets/img/banners/bn02.jpg')}}">
                    <!--div class="carousel-caption downUp">
                <div class="banner-content">
                    <h4 class="fallDown">asset, business and project financing</h4>
                    <p class="downUp">we provide financial support for private individuals and business who require funding for assets aquisition, business finance and project financing.</p>
                    <span class="call-to-action"> <a href="about.html"> learn more </a></span> 
                    <span class="call-to-action green-btn"> <a href="about.html"> apply now </a></span>
                </div>
            </div-->
                </div><!-- End Item -->

                <div class="item">
                    <img src="{{asset('assets/img/banners/bn03.jpg')}}">
                    <div class="carousel-caption downUp">
                        <!--div class="banner-content">
                    <h4 class="fallDown">fund management</h4>
                    <p class="downUp">with years of experience managing our own funds, we also help businesses manage their funding as well. by employing proven methodologies, you are guaranteed to succeed.</p>
                    <span class="call-to-action"> <a href="about.html"> learn more </a></span> 
                    <span class="call-to-action green-btn"> <a href="about.html"> apply now </a></span>
                </div-->
                    </div>
                </div><!-- End Item -->

            </div><!-- End Carousel Inner -->

            <!-- Controls -->
            <div class="carousel-controls">
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>

        </div><!-- End Carousel -->
    </section>
    <section class="no-margin">
        <div class="container">
            <form action="{{route('details')}}" class="bookings" method="POST">
                @csrf
                
                <div class="col-md-4 form-group">
                    <select class="form-control" name="type" id="selectPackage" required>
                        <option value="">Select Yacht</option>
                        <option value="eugene1">Eugene 1</option>
                        <option value="eugene">Eugene</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <select class="form-control" name="package" id="listPackage" required>
                        <option value="">Select Package</option>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <input type="submit" class="btn btn-primary" value="Book Reservation" name="" id="">
                </div>
            </form>
        </div>
    </section>
    <section class="">
        <div class="container">
            <h4 class="all-caps">Our Yachts</h4>
            <!--h4 class="center">Our Yatchs</h4-->
            <div class="col-md-6">
                <div class="container product-box-cont">
                    <div class="product-box">
                        <h4>Eugene 1</h4>
                        <p>Eugene 1 is our luxury 140ft three-storey yacht which comes with top of the range features such as; Exquisite interior design, Fully air-conditioned interior with chilling capacity of 528,000BTU, Guest capacity: 600 (Banquet) & 1000 (standing), Automated sunroof, In-built 32 CCTV Cameras, Automated Sensor Doors, Hygienic Toilets, 230KW power generation, 4 Cabin rooms and so much more...</p>
                        <a href="#" class="btn btn-primary">Learn more</a>
                    </div>
                    <img src="{{asset('assets/img/banners/bn01.jpg')}}" alt="" class="base-pic">
                </div>
            </div>
            <div class="col-md-6">
                <div class="container product-box-cont">
                    <div class="product-box">
                        <h4>Eugene </h4>
                        <p>Eugene is a private luxurious yacht with a capacity of 8 to 10 people.The beautiful leather interior piece sailing at 8 to 10 knots cruising speed has a black water tank capacity of 220litres and fully air conditioned with 8000 BTU with bathroom shower and kitchenette.</p>
                        <a href="#" class="btn btn-primary">Learn more</a>
                    </div>
                    <img src="{{asset('assets/img/banners/b1.jpg')}}" alt="" class="base-pic">
                </div>
            </div>
        </div>
    </section>
    <section class="primary-color no-margin pad-10 mid-space">
        <div class="container">
            <div class="col-md-12">
                <div class="col-md-4">
                    <h4 class="center no-float">our vision</h4>
                    <i class="fa fa-eye"></i>
                    <p class="justify-center-2">To create a distinct and memorable leisure experience for each client through exceptional service delivery.</p>
                </div>
                <div class="col-md-4">
                    <h4 class="center no-float">our profile</h4>
                    <i class="fa fa-folder"></i>
                    <p class="justify-center-2">Hi Impact Cruise currently operates two high grade luxury yachts in her fleet. Both vessels are solidly designed with lavish interiors. Whatever your needs, we have something that will excite your senses. If you love freedom, privacy, a wide variety of choices, and the feeling that goes with star treatment, Hi-Impact Cruise is right for you with an option of Eugene or Eugene 1 to select from.</p>
                </div>
                <div class="col-md-4">
                    <h4 class="center no-float">our mission</h4>
                    <i class="fa fa-road"></i>
                    <p class="justify-center-2">To display expertise and distinctiveness in all exchanges with both indigenous, international, existing, and prospective clients.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="no-margin pad-5 mid-space bg-1">
        <div class="container">
            <h4 class="all-caps">Our Services</h4>
            <div class="col-md-3 icon-box">
                <span class="icon"> <i class="fa fa-ship"></i></span>
                <a href="#" class="icon-a">Weekend Cruise</a>
                <div class="icon-detail">
                    <p>Take a break, relax, unwind and binge on delicious meals and superb entertainment on our weekend luxurious cruise. You have earned it!</p>
                </div>
            </div>
            <div class="col-md-3 icon-box">
                <span class="icon"> <i class="fa fa-wine-glass"></i></span>
                <a href="#" class="icon-a">Social Events</a>
                <div class="icon-detail">
                    <p>We are the one stop luxury destination for your social functions such as weddings, birthday bash, soirees, bridal shower, hen party, photo shoots, video shoots, get- togethers.</p>
                </div>
            </div>
            <div class="col-md-3 icon-box">
                <span class="icon"> <i class="fa fa-briefcase"></i></span>
                <a href="#" class="icon-a">Corporate Events</a>
                <div class="icon-detail">
                    <p>Take a change from the norm, our venue is ideal for all corporate events like retreats, Anniversaries, AGMs, End of year parties, Team building, Award ceremonies, e.t.c </p>
                </div>
            </div>
            <div class="col-md-3 icon-box">
                <span class="icon"> <i class="fa fa-cocktail"></i></span>
                <a href="#" class="icon-a">TGIF lounge</a>
                <div class="icon-detail">
                    <p>Get your groove on with friends and loved ones at our exclusive TGIF lounge every last Friday of each month, see you there!</p>
                </div>
            </div>
        </div>
    </section>
    <section class="no-margin bg-white">
        <div class="container">
            <div class="listing-cont">
                <h4 class="center" style="color: #333">Mini Gallery</h4>
                <div class="controls-btn">
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner listings" role="listbox">
                        <div class="item active">
                            <div class="row">
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('assets/img/banners/b11.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('assets/img/banners/b12.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('assets/img/banners/bn01.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('assets/img/banners/bn02.jpg')}}" alt="" class="thumbs-list">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('assets/img/banners/bn03.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('assets/img/banners/bn04.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('assets/img/banners/bn05.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('assets/img/banners/bn06.jpg')}}" alt="" class="thumbs-list">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pattern1 no-margin pad-10 mid-space">
        <div class="container">
            <img src="img/logo-icon.png" alt="" class="logo-icon-section">
            <h3 class="all-caps">Dream, Discover, Explore</h3>
        </div>
    </section>
    <section class="no-margin padded gold-background">
        <div class="container">
            <div class="col-md-4">
                <h4>receive deals / discount info</h4>
            </div>
            <div class="col-md-8">
                <form action="">
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control" name="" placeholder="Please, enter your email address">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="Subscribe">
                    </div>
                </form>
            </div>
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
                    Copyright &copy; 2019 All rights reserved <a href="#"> | Privacy Policy </a> <a href="#"> | Terms and Condition</a>
                </div>
                <div class="col-md-6 pull-right socials">
                    <li><a href="#"> <i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"> <i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"> <i class="fab fa-instagram"></i></a></li>
                </div>
            </div>
        </div>
    </footer>
@endsection

@section("scripts")
    <script>
        $(document).ready(function() {

            $('#selectPackage').change(function(e) {
                const target = $(e.target);
                const package = target.val();

                const packages = {
                    'eugene1': [{
                        id: '',
                        name: "Select Package"
                    }, {
                        id: 1,
                        name: "Prestige Package"
                    }, {
                        id: 2,
                        name: "Deluxe Package"
                    }, {
                        id: 3,
                        name: "Royal Package"
                    }],
                    'eugene': [{
                        id: '',
                        name: "Select Package"
                    }, {
                        id: 1,
                        name: "Silver Package"
                    }, {
                        id: 2,
                        name: "Gold Package"
                    }],
                }

                const options = packages[package].map(item => '<option value="' + item.id + '">' + item.name + '</option>');

                $('#listPackage').html(options);
            })
        })
    </script>
@endsection