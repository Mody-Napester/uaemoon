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
                                    <li><a href="{{$facebook->social[0]->link}}"><i class="ti-facebook"></i></a></li>
                                @endif
                                @if($twitter && isset($twitter->social[0]->link))
                                    <li><a href="{{$twitter->social[0]->link}}"><i class="ti-twitter-alt"></i></a></li>
                                @endif
                                @if($instagram && isset($instagram->social[0]->link))
                                    <li><a href="{{$instagram->social[0]->link}}"><i class="ti-instagram"></i></a></li>
                                @endif
                                @if($pinterest && isset($pinterest->social[0]->link))
                                    <li><a href="{{$pinterest->social[0]->link}}"><i class="ti-pinterest"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="search-area">
                        <form>
                            <button type="submit"><i class="fi flaticon-search"></i></button>
                            <input type="text" placeholder="Search for..">
                        </form>
                    </div>
                </div>
                <div id="navbar" class="navbar-collapse collapse navigation-holder">
                    <button class="close-navbar"><i class="ti-close"></i></button>
                    <ul class="nav navbar-nav">
                        <li class="menu-item-has-children current-menu-parent">
                            <a href="#">Home</a>
                            <ul class="sub-menu">
                                <li class="current-menu-item"><a href="index.html">Home Default</a></li>
                                <li><a href="index-2.html">Home style 2</a></li>
                                <li><a href="index-3.html">Home style 3</a></li>
                            </ul>
                        </li>
                        <li><a href="about.html">About</a></li>
                        <li class="menu-item-has-children has-mega-menu">
                            <a href="#">Shop</a>
                            <ul class="mega-menu">
                                <li>
                                    <div class="mega-menu-content">
                                        <div class="col col-5">
                                            <span class="mega-menu-box-title">Shop style</span>
                                            <ul class="mega-menu-list-holder">
                                                <li><a href="shop.html">Shop left sidebar</a></li>
                                                <li><a href="shop-right-sidebar.html">Shop right sidebar</a></li>
                                                <li><a href="shop-2.html">Shop full width</a></li>
                                            </ul>
                                        </div>
                                        <div class="col col-5">
                                            <span class="mega-menu-box-title">Shop single</span>
                                            <ul class="mega-menu-list-holder">
                                                <li><a href="shop-single.html">Horizental thumbnail</a></li>
                                                <li><a href="shop-single-vertical-thumbnail.html">Vertical
                                                        thumbnail</a></li>
                                            </ul>
                                        </div>
                                        <div class="col col-5">
                                            <span class="mega-menu-box-title">Product style</span>
                                            <ul class="mega-menu-list-holder">
                                                <li><a href="shop.html">Product style 1</a></li>
                                                <li><a href="shop-right-sidebar.html">Product style 2</a></li>
                                                <li><a href="shop-2.html">Product style 3</a></li>
                                            </ul>
                                        </div>
                                        <div class="col col-5">
                                            <span class="mega-menu-box-title">Other pages</span>
                                            <ul class="mega-menu-list-holder">
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="my-account.html">My account</a></li>
                                            </ul>
                                        </div>
                                        <div class="col col-5">
                                            <span class="mega-menu-box-title">Other pages</span>
                                            <ul class="mega-menu-list-holder">
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="my-account.html">My account</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="404.html">404</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="contact.html">Contact</a></li>

                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-masonary.html">Blog masonry</a></li>
                                <li><a href="blog-single.html">Blog single</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                        @if(lang() == 'en')
                            <li><a href="{{route('language', 'ar')}}">RTL</a></li>
                        @else
                            <li><a href="{{route('language', 'en')}}">LTR</a></li>
                        @endif
                    </ul>
                </div><!-- end of nav-collapse -->
                <div class="header-right">
                    <div class="my-account-link">
                        <a href="my-account.html"><i class="icon-user"></i></a>
                    </div>
                    <div class="wishlist-box">
                        <a href="#"><i class="icon-heart-shape-outline"></i></a>
                    </div>
                    <div class="mini-cart">
                        <button class="cart-toggle-btn"><i class="icon-large-paper-bag"></i> <span
                                class="cart-count">3</span></button>
                        <div class="mini-cart-content">
                            <div class="mini-cart-items">
                                <div class="mini-cart-item clearfix">
                                    <div class="mini-cart-item-image">
                                        <a href="shop-single.html"><img
                                                src="{{ url('assets/front/assets/images/shop/mini-cart/img-1.jpg') }}"
                                                alt></a>
                                    </div>
                                    <div class="mini-cart-item-des">
                                        <a href="shop-single.html">Elegant skirt</a>
                                        <span class="mini-cart-item-quantity">Qty: 1</span>
                                        <span class="mini-cart-item-price">$20.15</span>
                                    </div>
                                </div>
                                <div class="mini-cart-item clearfix">
                                    <div class="mini-cart-item-image">
                                        <a href="shop-single.html"><img
                                                src="{{ url('assets/front/assets/images/shop/mini-cart/img-2.jpg') }}"
                                                alt></a>
                                    </div>
                                    <div class="mini-cart-item-des">
                                        <a href="shop-single.html">Beautiful tops</a>
                                        <span class="mini-cart-item-quantity">Qty: 1</span>
                                        <span class="mini-cart-item-price">$13.25</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mini-cart-action clearfix">
                                <span class="mini-checkout-price">Subtotal: $215.14</span>
                                <a href="cart.html" class="view-cart-btn">View Cart</a>
                                <a href="checkout.html" class="checkout-btn">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end of container -->
        </nav>
    </header>
    <!-- end of header -->

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
                                <p>&copy; 2021 WP Studio , All Rights Reserved</p>
                            </div>
                            <div class="social">
                                <ul class="clearfix">
                                    <li><a href="#" title="Facebook">fb</a></li>
                                    <li><a href="#" title="Twitter">tw</a></li>
                                    <li><a href="#" title="Instagram">ig</a></li>
                                    <li><a href="#" title="Pinterest">pr</a></li>
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

@yield('footer')
</body>
</html>
