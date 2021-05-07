<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="irstheme">

    <title> Uaemoon @yield('title')</title>

    <link href="{{ url('assets/front/assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ url('assets/front/assets/css/icomoon.css') }}" rel="stylesheet">
    <link href="{{ url('assets/front/assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet">
    <link href="{{ url('assets/front/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ url('assets/front/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/front/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('assets/front/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ url('assets/front/assets/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ url('assets/front/assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ url('assets/front/assets/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ url('assets/front/assets/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/front/assets/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ url('assets/front/assets/css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ url('assets/front/assets/css/jquery-ui.css') }}" rel="stylesheet">

    <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/alerts.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ url('assets/front/assets/css/style.css') }}" rel="stylesheet">
    @if(lang() == 'ar')
        {{--RTL css--}}
        <link href="{{ url('assets/front/assets/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets/front/assets/css/style-rtl.css') }}" rel="stylesheet">
    @endif
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
    <![endif]-->
    <style>
        .is-invalid {
            border: 1px solid red !important;
        }
    </style>
    @yield('header')
</head>

<body>

<!-- start page-wrapper -->
<div class="page-wrapper">

    <div class="body-overlay"></div>

    <!-- start preloader -->
    <div class="preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>
    <!-- end preloader -->

    <!-- Start header -->
    <header id="header" class="site-header header-style-1">

        <nav class="navigation navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="open-btn">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url('/')}}"><img
                            src="{{ url('public/images/logo.png') }}" alt="Logo"></a>
                </div>
                <div class="header-left">
                    <div class="side-info-bars">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="side-info-content">
                        <button class="btn side-info-close-btn"><i class="ti-close"></i></button>
                        <div class="logo">
                            <img src="{{ url('public/images/logo.png') }}" alt>
                        </div>
                        <div class="text">
                            <p>{{$settings['address_' . lang()]}}</p>
                            <ul class="info">
                                <li>{{trans('website.contact_us')}}: {{$settings['mobile']}}</li>
                                <li>{{trans('website.mail_us')}}: {{$settings['email']}}</li>
                            </ul>
                            <ul class="social-links">
                                @php
                                    $facebook = \App\Provider::getByName('facebook');
                                    $twitter = \App\Provider::getByName('twitter');
                                    $instagram = \App\Provider::getByName('instagram');
                                    $pinterest = \App\Provider::getByName('pinterest');
                                @endphp
                                @if($facebook && isset($facebook->social[0]->link))
                                    <li><a target="_blank" href="{{$facebook->social[0]->link}}"><i
                                                class="ti-facebook"></i></a></li>
                                @endif
                                @if($twitter && isset($twitter->social[0]->link))
                                    <li><a target="_blank" href="{{$twitter->social[0]->link}}"><i
                                                class="ti-twitter-alt"></i></a></li>
                                @endif
                                @if($instagram && isset($instagram->social[0]->link))
                                    <li><a target="_blank" href="{{$instagram->social[0]->link}}"><i
                                                class="ti-instagram"></i></a></li>
                                @endif
                                @if($pinterest && isset($pinterest->social[0]->link))
                                    <li><a target="_blank" href="{{$pinterest->social[0]->link}}"><i
                                                class="ti-pinterest"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    {{--                    <div class="search-area">--}}
                    {{--                        <form>--}}
                    {{--                            <button type="submit"><i class="fi flaticon-search"></i></button>--}}
                    {{--                            <input type="text" placeholder="Search for..">--}}
                    {{--                        </form>--}}
                    {{--                    </div>--}}
                </div>
                <div id="navbar" class="navbar-collapse collapse navigation-holder">
                    <button class="close-navbar"><i class="ti-close"></i></button>
                    <ul class="nav navbar-nav">
                        {{--                        <li class="menu-item-has-children current-menu-parent">--}}
                        {{--                            <a href="#">Home</a>--}}
                        {{--                            <ul class="sub-menu">--}}
                        {{--                                <li class="current-menu-item"><a href="index.html">Home Default</a></li>--}}
                        {{--                                <li><a href="index-2.html">Home style 2</a></li>--}}
                        {{--                                <li><a href="index-3.html">Home style 3</a></li>--}}
                        {{--                            </ul>--}}
                        {{--                        </li>--}}
                        <li><a href="{{url('/')}}">{{trans('website.home')}}</a></li>
                        <li><a href="about.html">{{trans('website.about_us')}}</a></li>
                        <li><a href="contact.html">{{trans('website.contact_us')}}</a></li>
                        @if(lang() == 'en')
                            <li><a href="{{route('language', 'ar')}}">Arabic</a></li>
                        @else
                            <li><a href="{{route('language', 'en')}}">الإنجليزية</a></li>
                        @endif
                    </ul>
                </div><!-- end of nav-collapse -->
                <div class="header-right">
                    @if (Auth::user())
                        @php
                            $user = Auth::user()
                        @endphp
                        <div class="my-account-link">
                            <a title="{{trans('website.profile')}}" href=""> <i class="icon-user"></i></a>
                            &nbsp;
                            <a title="{{trans('website.logout')}}" href="{{route('front.user.getLogout')}}"> <i class="fa fa-sign-out"></i></a>
                        </div>
                    @else
                        <div class="my-account-link">
                            <a title="{{trans('website.login_or_register')}}"
                               href="{{route('front.user.login_or_register')}}"><i class="icon-user"></i></a>
                        </div>
                    @endif

                </div>
            </div><!-- end of container -->
        </nav>
    </header>
    <!-- end of header -->

    @if(session('message'))
        <div class="float-alert">
            <div class="row alert-div alert alert-{{ session('message')['type'] }} clearfix">
                <div class="col-md-10 p-0 m-0">{{ session('message')['text'] }}</div>
                <div class="col-md-2 p-0 m-0 text-right">
                    <i class="alert-close fa fa-fw fa-close"></i>
                </div>
            </div>
        </div>
    @endif
@yield('content')

<!-- start site-footer -->
    <footer class="site-footer">
        <div class="container-1410">
            <div class="row widget-area">
                <div class="col-lg-4 col-xs-6  widget-col about-widget-col">
                    <div class="widget newsletter-widget">
                        <div class="inner">
                            <h3>Sign Up Now & Get 10% Off</h3>
                            <p>Get timely updates from your favorite products</p>
                            <form>
                                <div class="input-1">
                                    <input type="email" class="form-control" placeholder="Email Address *" required>
                                </div>
                                <div class="submit clearfix">
                                    <button type="submit">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6 widget-col">
                    <div class="widget contact-widget">
                        <h3>Contact info</h3>
                        <ul>
                            <li>Phone: 888-999-000-1425</li>
                            <li>Email: azedw@mail.com</li>
                            <li>Address: 22/1 natinoal city austria, dreem land, Huwai</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-xs-6 widget-col">
                    <div class="widget company-widget">
                        <h3>Company</h3>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Best services</a></li>
                            <li><a href="#">Recent insight</a></li>
                            <li><a href="#">Shipping guid</a></li>
                            <li><a href="#">Privacy policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-xs-6 widget-col">
                    <div class="widget payment-widget">
                        <h3>Payment & Shipping</h3>
                        <ul>
                            <li><a href="#">Payment method</a></li>
                            <li><a href="#">Tearms of use</a></li>
                            <li><a href="#">Shipping policy</a></li>
                            <li><a href="#">Shipping guide</a></li>
                            <li><a href="#">Return policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->

        <div class="lower-footer">
            <div class="container-1410">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lower-footer-inner clearfix">
                            <div>
                                <p>ROBITSCO &copy; {{ date('Y') }} , All Rights Reserved</p>
                            </div>
                            <div class="social">
                                <ul class="clearfix social-links">
                                    @php
                                        $facebook = \App\Provider::getByName('facebook');
                                        $twitter = \App\Provider::getByName('twitter');
                                        $instagram = \App\Provider::getByName('instagram');
                                        $pinterest = \App\Provider::getByName('pinterest');
                                    @endphp
                                    @if($facebook && isset($facebook->social[0]->link))
                                        <li><a target="_blank" href="{{$facebook->social[0]->link}}"><i
                                                    class="ti-facebook"></i></a></li>
                                    @endif
                                    @if($twitter && isset($twitter->social[0]->link))
                                        <li><a target="_blank" href="{{$twitter->social[0]->link}}"><i
                                                    class="ti-twitter-alt"></i></a></li>
                                    @endif
                                    @if($instagram && isset($instagram->social[0]->link))
                                        <li><a target="_blank" href="{{$instagram->social[0]->link}}"><i
                                                    class="ti-instagram"></i></a></li>
                                    @endif
                                    @if($pinterest && isset($pinterest->social[0]->link))
                                        <li><a target="_blank" href="{{$pinterest->social[0]->link}}"><i
                                                    class="ti-pinterest"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="extra-link">
                                <ul>
                                    <li><a href="#">Privacy </a></li>
                                    <li><a href="#">Terms</a></li>
                                    <li><a href="#">Promo T&amp;Cs Apply</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end site-footer -->

</div>
<!-- end of page-wrapper -->


<!-- All JavaScript files
================================================== -->
<script src="{{ url('assets/front/assets/js/jquery.min.js') }}"></script>
<script src="{{ url('assets/front/assets/js/bootstrap.min.js') }}"></script>

<!-- Plugins for this template -->
<script src="{{ url('assets/front/assets/js/jquery-plugin-collection.js') }}"></script>

<!-- Custom script for this template -->
<script src="{{ url('assets/front/assets/js/script.js') }}"></script>

<script>
    $('body').on('click', '.alert-close', function () {
        $(this).parents('.alert-div').hide(500, function () {
            $(this).remove();
        });
    });
</script>
@yield('footer')
</body>
</html>
