@extends('layouts.cruise')
@section('title') Cruise in Luxury @endsection
@section("content")
<style>

.announce {
        width: 60%;
        margin: 0 auto;
    }
    .countdown {
        margin-bottom: 10px;color: gold; font-size: 4em; font-weight: 700;
    }  
    @media(max-width: 992px) {
        .announce {
            width: 100%;
        }
        .countdown {
        margin-bottom: 1em;color: gold; font-size: 2em; font-weight: 500;
    } 
    }

    </style>
    <section class="banner">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">


                @foreach ($slides as $slide)
                    <div class="item {{ $slides->pluck('order')->max() == $slide->order ? 'active' : ''}}">
                        <img src="{{ asset('public/storage/'.$slide->file->filename) }}">
                        <div class="carousel-caption downUp">
                            <div class="banner-content">
                                {{--<h4 class="fallDown">{{ $slide->title }}</h4>
                                <p class="downUp">{{ $slide->description }}</p>--}}
                                <!--span class="call-to-action"> <a href="about.html"> learn more </a></span> 
                                <span class="call-to-action green-btn"> <a href="about.html"> apply now </a></span-->
                            </div>
                        </div>
                    </div>        
                @endforeach
</div>
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
                        @foreach ($yachts as $yacht)
                            <option value="{{ $yacht->id }}">{{ $yacht->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <select class="form-control" name="package" id="listPackage" required>
                        <option value="">Select Package</option>
                        {{-- @foreach ($yachts as $yacht)
                            <option value="{{$yacht->id}}">{{$yacht->name}}</option>
                        @endforeach --}}
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <input type="submit" class="btn btn-primary" value="Book Reservation" name="" id="">
                </div>
            </form>
        </div>
    </section>
    <section class="no-margin pad-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 id="getting-started" class="text-center countdown" style=""></h2>
                    <p class="lead text-center" style="margin-bottom: 50px; color: #ffd700;">to official launch on October 1st, 2019</p>
                <div class="text-center lead announce fallDown">
                        {!! \App\Models\Page::getContent('intro-text') !!}
                </p>
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <div class="container">
            <h4 class="all-caps">Our Yachts</h4>
            @foreach ($yachts as $yacht)
                 <div class="col-md-6">
                <div class="container product-box-cont">
                    <div class="product-box">
                        <h4>{{$yacht->name}}</h4>
                        <p>{!! $yacht->description !!}</p>
                        <a href="{{route('package',['yacht'=>$yacht->id])}}" class="btn btn-primary">Learn more</a>
                    </div>
                    @if($yacht->id == 1)
                    <img src="{{asset('public/assets/img/banners/bn01.jpg')}}" alt="" class="base-pic">
                    @else
                    <img src="{{asset('public/assets/img/banners/b1.jpg')}}" alt="" class="base-pic">
                    @endif
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
                    <div class="justify-center-2">{!! $about['our-vision'] !!}</div>
                </div>
                <div class="col-md-4">
                    <h4 class="center no-float">our profile</h4>
                    <i class="fa fa-folder"></i>
                    <div class="justify-center-2">{!! $about['profile-statement'] !!}</div>
                </div>
                <div class="col-md-4">
                    <h4 class="center no-float">our mission</h4>
                    <i class="fa fa-road"></i>
                    <div class="justify-center-2">{!! $about['our-mission'] !!}</div>
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
            <img src="{{ asset('public/assets/img/logo-icon.png') }}" alt="" class="logo-icon-section">
            <h3 class="all-caps">Dream, Discover, Explore</h3>
        </div>
    </section>
    <section class="no-margin padded gold-background">
        <div class="container">
            <div class="col-md-4">
                <h4>Recieve latest info on deals/discounts</h4>
            </div>
            <div class="col-md-8">
                <form action="{{ route('subscribe') }}" method="post">
                @csrf
                    <div class="form-group col-md-8">
                        <input type="email" class="form-control" name="email" placeholder="Please, enter your email address" required>
                    </div>
                    <div>
                    <input type="hidden" name="baseURL" value="{{url('/')}}" id="baseURL" />
                        <input type="submit" class="btn btn-primary" value="Subscribe">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section("scripts")
    <script>
    let url = '';
        $(function() {
            $('#listPackage').change(function(e) {
                const selected = $(e.target).val();
                if( +selected === 6 || +selected === 7 ) {
                    url = 'event/'+selected;
                }

                console.log(url); 
            })
            $('#selectPackage').change(function(e) {
                    const target = $(e.target);
                    let package = target.val();
                    baseURL = $("#baseURL").val();
                    url = '/packages/'+package;
                    console.log(package, url); 

                    if(null !== package && package.length > 0){
                    $.ajax({
                        type: 'get',
                        url: baseURL+url,
                        contentType: 'application/json',
                        dataType: 'json',
                        failure:function(err){
                            console.log(err);
                            const options = "<option value=''>No Package At the Moment</option>";
                            $('#listPackage').html(options);
                        },
                        success: function(resp) {
                            let options = "";
                            if(resp.length < 1) {
                                options = "<option value=''>No Package At the Moment</option>";
                            } else {
                                options = resp.map(item => '<option value="' + item.id + '">' + item.name + '</option>');
                            }
                            $('#listPackage').html(options);
                        }
                    });
                }else{
                            options = "<option value=''>Select Package</option>";
                        $('#listPackage').html(options);
                }
            });

            

        });

    </script>
    <script src="{{ asset('public/assets/js/jquery.countdown.min.js') }}"></script>
<script type="text/javascript">
  $("#getting-started")
  .countdown("2019/10/01", function(event) {
    $(this).text(
      event.strftime('%D days %H:%M:%S')
    );
  });
</script>
@endsection