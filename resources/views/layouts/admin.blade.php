
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- begin::Head -->
    <head>

        <!--begin::Base Path (base relative path for assets of this page) --
        <base href="/" -->

        <!--end::Base Path -->
        <meta charset="utf-8" />
        <title>Hi-Impact Studios | Dashboard</title>
        <meta name="description" content="First HD Television in Nigeria">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--begin::Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {
                    "families": ["Poppins:300,400,500,600,700"]
                },
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>

        <script src="https://cdn.tiny.cloud/1/wf68j1npm9x4p5oefuw9kc4pzj24cqu7vbhnkd4o145b953m/tinymce/5/tinymce.min.js"></script>
        <script>tinymce.init({selector:'textarea'});</script>

        <!--end::Fonts -->

        <!--begin::Page Vendors Styles(used by this page) -->
        <link href="{{ asset('public/portal/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

        <!--end::Page Vendors Styles -->

        <!--begin:: Global Mandatory Vendors -->
        <link href="{{ asset('public/portal/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />

        <!--end:: Global Mandatory Vendors -->

        <!--begin:: Global Optional Vendors -->
        <link href="{{ asset('public/portal/vendors/general/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/nouislider/distribute/nouislider.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/custom/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/custom/vendors/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/custom/vendors/flaticon2/flaticon.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/vendors/general/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />

        <!--end:: Global Optional Vendors -->

        <!--begin::Global Theme Styles(used by all pages) -->
        <link href="{{ asset('public/portal/css/demo2/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/portal/css/admin.css') }}" rel="stylesheet">

        <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->

        <!--end::Layout Skins -->
        <link rel="shortcut icon" href="{{ asset('public/portal/media/logos/favicon.ico') }}" />
    </head>

    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="kt-page--loading-enabled kt-page--loading kt-page--fixed kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">

        <!-- begin::Page loader -->

        <!-- end::Page Loader -->

        <!-- begin:: Page -->

        <!-- begin:: Header Mobile -->
        <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
            <div class="kt-header-mobile__logo">
                <a href="{{ route('admin') }}">
                    <img alt="Logo" style="width: 120px;" src="{{ asset('public/portal/images/logo.png') }}" />
                </a>
            </div>
            <div class="kt-header-mobile__toolbar">
                <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
                <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
            </div>
        </div>

        <!-- end:: Header Mobile -->
        <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper " id="kt_wrapper">

                    <!-- begin:: Header -->
                    <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
                        <div class="kt-header__top">
                            <div class="kt-container">

                                <!-- begin:: Brand -->
                                <div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
                                    <div class="kt-header__brand-logo">
                                        <a href="{{ route('admin') }}">
                                            <img alt="Logo" style="width: 200px;" src="{{ asset('public/portal/images/logo.png') }}" class="kt-header__brand-logo-default" />
                                            <img alt="Logo" style="width: 200px;" src="{{ asset('public/portal/images/logo.png') }}" class="kt-header__brand-logo-sticky" />
                                        </a>
                                    </div>
                                </div>

                                <!-- end:: Brand -->

                                <!-- begin:: Header Topbar -->
                                <div class="kt-header__topbar">

                                    <!--begin: Search -->
                                    <div class="kt-header__topbar-item kt-header__topbar-item--search dropdown kt-hidden-desktop" id="kt_quick_search_toggle">
                                        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,10px">
                                            <span class="kt-header__topbar-icon">

                                                <!--<i class="flaticon2-search-1"></i>-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--info">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect id="bound" x="0" y="0" width="24" height="24" />
                                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" id="Path" fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg> </span>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
                                            <div class="kt-quick-search kt-quick-search--inline" id="kt_quick_search_inline">
                                                <form method="get" class="kt-quick-search__form">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
                                                        <input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
                                                        <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                                    </div>
                                                </form>
                                                <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end: Search -->

                                    <!--begin: User bar -->
                                    @auth
                                    <div class="kt-header__topbar-item kt-header__topbar-item--user">
                                        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,10px" aria-expanded="false">
                                            <span class="kt-header__topbar-welcome">Hi,</span>
                                            <span class="kt-header__topbar-username">Admin</span>
                                            <img class="kt-hidden" alt="Pic" src="{{ asset('public/portal/media/users/300_21.jpg') }}">

                                            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                            <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden-">S</span>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

                                            <!--begin: Head -->
                                            <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{ asset('public/portal/media/misc/bg-1.jpg') }}">
                                                <div class="kt-user-card__avatar">
                                                    <img class="kt-hidden" alt="Pic" src="{{ asset('public/portal/media/users/300_25.jpg') }}" />

                                                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                                    <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span>
                                                </div>
                                                <div class="kt-user-card__name">
                                                    Site Administrator
                                                </div>
                                            </div>

                                            <!--end: Head -->

                                            <!--begin: Navigation -->
                                            <div class="kt-notification">
                                                <div class="kt-notification__custom kt-space-between">
                                                    <a href="demo2/custom/user/login-v2.html" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
                                                </div>
                                            </div>

                                            <!--end: Navigation -->
                                        </div>
                                    </div>
                                    @endauth

                                    <!--end: User bar -->
                                </div>

                                <!-- end:: Header Topbar -->
                            </div>
                        </div>
                        <div class="kt-header__bottom">
                            <div class="kt-container">

                                <!-- begin: Header Menu -->
                                <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                                <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                                    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">
                                        <ul class="kt-menu__nav ">
                                            <li class="kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Home</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                                <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                                                    <ul class="kt-menu__subnav">
                                                        <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true"><a href="{{ route('admin') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Dashboard</span></a></li>
                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="{{ url('/') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Home</span></a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li class="kt-menu__item"><a href="{{ route('slides.index') }}" class="kt-menu__link"><span class="kt-menu__link-text">Slides</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                            </li>
                                            <li class="kt-menu__item"><a href="#" class="kt-menu__link"><span class="kt-menu__link-text">Media files</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                            </li>

                                            <li class="kt-menu__item"><a href="{{route('yatchs.index')}} " class="kt-menu__link"><span class="kt-menu__link-text">Yatch</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                            </li>


                                        <li class="kt-menu__item"><a href="{{route('events.index')}}" class="kt-menu__link"><span class="kt-menu__link-text">Event</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                            </li>


                                        </ul>
                                    </div>
                                    <div class="kt-header-toolbar">
                                        <div class="kt-quick-search" id="kt_quick_search_default">
                                            <form method="get" class="kt-quick-search__form">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
                                                    <input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
                                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                                                </div>
                                            </form>
                                            <div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="0px,10px"></div>
                                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
                                                <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end: Header Menu -->
                            </div>
                        </div>
                    </div>

                    <!-- end:: Header -->
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
                        <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
                            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                                <!-- begin:: Content Head -->
                                <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                                    <div class="kt-subheader__main">
                                        <h3 class="kt-subheader__title">Dashboard</h3>
                                        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                        <a href="{{ route('slides.create') }}" class="btn btn-label-primary btn-bold btn-icon-h kt-margin-l-10">
                                            Add New Slide
                                        </a>
                                    </div>
                                    <div class="kt-subheader__toolbar">
                                        <div class="kt-subheader__wrapper">
                                            <a href="#" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" title="Select dashboard daterange" data-placement="left">
                                                <span class="kt-subheader__btn-daterange-title" id="kt_dashboard_daterangepicker_title">Today</span>&nbsp;
                                                <span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date">Aug 16</span>
                                                <i class="flaticon2-calendar-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- end:: Content Head -->

                                <!-- begin:: Content -->
                                <div class="kt-content kt-grid__item kt-grid__item--fluid">

                                    <!--Begin::Dashboard 2-->
                                    @yield('content')
                                    <!--Begin::Section-->
                                </div>

                                <!-- end:: Content -->
                            </div>
                        </div>
                    </div>

                    <!-- begin:: Footer -->
                    <div class="kt-footer  kt-footer--extended  kt-grid__item" id="kt_footer">
                        <div class="kt-footer__top">
                            <div class="kt-container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="kt-footer__section">
                                            <h3 class="kt-footer__title">About</h3>
                                            <div class="kt-footer__content">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="kt-footer__section">
                                            <h3 class="kt-footer__title">Quick Links</h3>
                                            <div class="kt-footer__content">
                                                <div class="kt-footer__nav">
                                                    <div class="kt-footer__nav-section">
                                                        <a href="{{ route('about') }}">About</a>
                                                        <a href="{{ route('about') }}">Our Mission</a>
                                                        <a href="{{ route('about') }}">Our Vision</a>
                                                        <a href="{{ route('about') }}">Our Core Values</a>
                                                    </div>
                                                    <div class="kt-footer__nav-section">
                                                        <a href="#">Site Settings</a>
                                                        <a href="#">Site Pages</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="kt-footer__section">
                                            <h3 class="kt-footer__title">Get In Touch</h3>
                                            <div class="kt-footer__content">
                                                <form action="" class="kt-footer__subscribe">
                                                    <div class="input-group">
                                                        <!--input type="text" class="form-control" placeholder="Enter Your Email"-->
                                                        <div class="input-group-append">
                                                            <a href="{{ route('contact') }}" class="btn btn-brand" type="button">Subscribe</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-footer__bottom">
                            <div class="kt-container">
                                <div class="kt-footer__wrapper">
                                    <div class="kt-footer__logo">
                                        <a href="demo2/index.html">
                                            <img alt="Logo" style="width: 150px;" src="{{ asset('public/portal/images/logo.png') }}">
                                        </a>
                                        <div class="kt-footer__copyright">
                                            2019&nbsp;&copy;&nbsp;
                                            <a href="http://www.hi-impactstudios.com">Hi-Impact Studios</a>
                                        </div>
                                    </div>
                                    <div class="kt-footer__menu">
                                        <a href="{{ url('/') }}" target="_blank">Homepage</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end:: Footer -->
                </div>
            </div>
        </div>

        <!-- end:: Page -->
        <!-- begin::Scrolltop -->
        <div id="kt_scrolltop" class="kt-scrolltop">
            <i class="fa fa-arrow-up"></i>
        </div>

        <!-- end::Scrolltop -->
        @section('scripts')
        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {
                "colors": {
                    "state": {
                        "brand": "#374afb",
                        "light": "#ffffff",
                        "dark": "#282a3c",
                        "primary": "#5867dd",
                        "success": "#34bfa3",
                        "info": "#36a3f7",
                        "warning": "#ffb822",
                        "danger": "#fd3995"
                    },
                    "base": {
                        "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                        "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                    }
                }
            };
        </script>

        <!-- end::Global Config -->

        <!--begin:: Global Mandatory Vendors -->
        <script src="{{ asset('public/portal/vendors/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/moment/min/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/sticky-js/dist/sticky.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/wnumb/wNumb.js') }}" type="text/javascript"></script>

        <!--end:: Global Mandatory Vendors -->

        <!--begin:: Global Optional Vendors -->
        <script src="{{ asset('public/portal/vendors/general/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/custom/js/vendors/bootstrap-datepicker.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/custom/js/vendors/bootstrap-timepicker.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/custom/js/vendors/bootstrap-switch.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/ion-rangeslider/js/ion.rangeSlider.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/handlebars/dist/handlebars.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/inputmask/dist/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/nouislider/distribute/nouislider.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/autosize/dist/autosize.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/clipboard/dist/clipboard.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/summernote/dist/summernote.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/markdown/lib/markdown.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/custom/js/vendors/bootstrap-markdown.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/custom/js/vendors/bootstrap-notify.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/jquery-validation/dist/additional-methods.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/custom/js/vendors/jquery-validation.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/raphael/raphael.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/morris.js/morris.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/chart.js/dist/Chart.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/waypoints/lib/jquery.waypoints.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/counterup/jquery.counterup.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/es6-promise-polyfill/promise.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/custom/js/vendors/sweetalert2.init.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/general/dompurify/dist/purify.js') }}" type="text/javascript"></script>

        <!--end:: Global Optional Vendors -->

        <!--begin::Global Theme Bundle(used by all pages) -->
        <script src="{{ asset('public/portal/js/demo2/scripts.bundle.js') }}" type="text/javascript"></script>

        <!--end::Global Theme Bundle -->

        <!--begin::Page Vendors(used by this page) -->
        <script src="{{ asset('public/portal/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
        <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
        <script src="{{ asset('public/portal/vendors/custom/gmaps/gmaps.js') }}" type="text/javascript"></script>

        <!--end::Page Vendors -->

        <!--begin::Page Scripts(used by this page) -->
        <script src="{{ asset('public/portal/js/demo2/pages/dashboard.js') }}" type="text/javascript"></script>

        @show


        <!--end::Page Scripts -->
    </body>

    <!-- end::Body -->
</html>
