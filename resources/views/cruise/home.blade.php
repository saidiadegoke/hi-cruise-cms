@extends('layouts.cruise')
@section("content")
    <section class="banner">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item active">
                    <img src="{{asset('public/assets/img/banners/bn01.jpg')}}">
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
                    <img src="{{asset('public/assets/img/banners/bn02.jpg')}}">
                    <!--div class="carousel-caption downUp">
                <div class="banner-content">
                    <h4 class="fallDown">asset, business and project financing</h4>
                    <p class="downUp">we provide financial support for private individuals and business who require funding for public/assets aquisition, business finance and project financing.</p>
                    <span class="call-to-action"> <a href="about.html"> learn more </a></span> 
                    <span class="call-to-action green-btn"> <a href="about.html"> apply now </a></span>
                </div>
            </div-->
                </div><!-- End Item -->

                <div class="item">
                    <img src="{{asset('public/assets/img/banners/bn03.jpg')}}">
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
                        <option value="">Select Yacht/Event</option>
                        @foreach ($yatchs as $yatch)
                            <option value="{{$yatch->id}}">{{$yatch->name}}</option>
                        @endforeach
                        <option value="event">Event</option>
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
            {{-- {{dd($yatchs)}} --}}
            @foreach ($yatchs as $yatch)
                 <div class="col-md-6">
                <div class="container product-box-cont">
                    <div class="product-box">
                        <h4>{{$yatch->name}}</h4>
                        <p>{!! $yatch->description !!}</p>
                        <a href="{{route('package',['yatch'=>$yatch->id])}}" class="btn btn-primary">Learn more</a>
                    </div>
                    <img src="{{asset('public/assets/img/banners/bn01.jpg')}}" alt="" class="base-pic">
                </div>
            </div>

            @endforeach
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
                                    <img src="{{asset('public/assets/img/banners/b11.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('public/assets/img/banners/b12.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('public/assets/img/banners/bn01.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('public/assets/img/banners/bn02.jpg')}}" alt="" class="thumbs-list">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('public/assets/img/banners/bn03.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('public/assets/img/banners/bn04.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('public/assets/img/banners/bn05.jpg')}}" alt="" class="thumbs-list">
                                </div>
                                <div class="col-md-3 img-holder">
                                    <img src="{{asset('public/assets/img/banners/bn06.jpg')}}" alt="" class="thumbs-list">
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
@endsection

@section("scripts")
    <script>
        $(document).ready(function() {

            $('#selectPackage').change(function(e) {
                const target = $(e.target);
                const package = target.val();

                if(package == ''){
                    const options = "<option value=''>Select Package</option>";
                        $('#listPackage').html(options);
                }
               
                let url = "";
                if(package === "event"){
                    url = "/events";
                }
                else{
                    url = "/packages/" + package;
                }

                $.ajax({
                    type: 'get',
                    url: '/hi-cruise'+url,
                    contentType: 'application/json',
                    dataType: 'json',
                    failure:function(err){
                        const options = "<option value=''>No Package At the Moment</option>";
                        $('#listPackage').html(options);
                    },
                    success: function(resp){
                        let options = "";
                        if(resp.length < 1){
                            options = "<option value=''>No Package At the Moment</option>";
                        }else{
                            options = resp.map(item => '<option value="' + item.id + '">' + item.name + '</option>');
                        }
                        $('#listPackage').html(options);
                    }
                })

                // const options = packages[package].map(item => '<option value="' + item.id + '">' + item.name + '</option>');

            })
        })
    </script>
@endsection