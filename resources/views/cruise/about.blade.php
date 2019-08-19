@extends("layouts.cruise")

@section("title") About Us @endsection

@section("content")
<section class="banner-inner">
  <img src="{{asset('public/assets/img/banners/b11.jpg')}}" class="flyInLeft" />
</section>
<section class="page marg-Top-Off-200">
  <div class="container styled-border dropdown">
    <h4 class="all-caps">About us</h4>
    <div class="justify-center downUp">
      {!! $about['about-us'] !!}
    </div>
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
<section class="pattern1 no-margin pad-10 mid-space">
  <div class="container">
    <img src="{{asset('public/assets/img/logo-icon.png')}}" alt="" class="logo-icon-section" />
    <h3 class="all-caps">Dream, Discover, Explore</h3>
  </div>
</section>
@endsection