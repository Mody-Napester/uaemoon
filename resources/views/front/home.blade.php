@extends('front._layouts.main')

@section('content')
    <!-- start of hero -->
    <section class="hero-slider hero-style-1">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($slider as $val)
                    <div class="swiper-slide">
                        <div class="slide-inner slide-bg-image"
                             data-background="{{ asset('public/images/slider/' . $val->image) }}">
                            <div class="container-1410">
                                {{--                                <div data-swiper-parallax="400" class="slide-text">--}}
                                {{--                                    <p>Stylish shop</p>--}}
                                {{--                                </div>--}}
                                {{--                                <div data-swiper-parallax="300" class="slide-title">--}}
                                {{--                                    <h2>Great Lookbook 2021</h2>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="clearfix"></div>--}}
                                {{--                                <div data-swiper-parallax="500" class="slide-btns">--}}
                                {{--                                    <a href="shop.html" class="theme-btn-s7">Shop Now</a>--}}
                                {{--                                </div>--}}
                            </div>
                        </div> <!-- end slide-inner -->
                    </div> <!-- end swiper-slide -->
                @endforeach
            </div>
            <!-- end swiper-wrapper -->

            <!-- Control -->
            <div class="control-slider swiper-control">
                <div></div>
                <div class="swiper-pagination"></div>
                <div>
                    <div class="swiper-button-next">
                        <svg class="slider-nav slider-nav-progress" viewBox="0 0 46 46">
                            <g class="slider-nav-path-progress-color">
                                <path d="M0.5,23a22.5,22.5 0 1,0 45,0a22.5,22.5 0 1,0 -45,0"/>
                            </g>
                        </svg>
                        <svg class="slider-nav slider-nav-transparent sw-ar-rt" viewBox="0 0 46 46">
                            <circle class="slider-nav-path" cx="23" cy="23" r="22.5"/>
                        </svg>
                    </div>
                    <div class="swiper-button-prev">
                        <svg class="slider-nav slider-nav-transparent sw-ar-lf" viewBox="0 0 46 46">
                            <circle class="slider-nav-path" cx="23" cy="23" r="22.5"/>
                        </svg>
                    </div>
                </div>
            </div>
            <!-- /Control -->
        </div>
    </section>
    <!-- end of hero slider -->

    <!-- start trendy-product-section -->
    <section class="trendy-product-section section-padding" style="padding: 80px 0 0 0;">
        <div class="container-1410">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="section-title-s2">
                        <h2>{{trans('website.featured_ads')}}</h2>
                    </div>
                    <a href="#" class="more-products">{{trans('website.see_all')}}</a>
                </div>
            </div>
            <div class="row">
                <div class="col col-xs-12">
                    <div class="products-wrapper">
                        <ul class="products product-row-slider">
                            <li class="product">
                                <div class="product-holder">
                                    <div class="product-badge discount">-27%</div>
                                    <a href="shop-single.html"><img loading=lazy
                                                                    src="{{ url('assets/front/assets/images/shop/img-1.jpg') }}"
                                                                    alt></a>
                                    <div class="shop-action-wrap">
                                        <ul class="shop-action">
                                            <li><a href="#" title="Quick view!"><i class="fi flaticon-view"></i></a>
                                            </li>
                                            {{--                                            <li><a href="#" title="Add to Wishlist!"><i--}}
                                            {{--                                                        class="fi icon-heart-shape-outline"></i></a></li>--}}
                                            {{--                                            <li><a href="#" title="Add to cart!"><i--}}
                                            {{--                                                        class="fi flaticon-shopping-cart"></i></a></li>--}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4><a href="shop-single.html">Fashion tops</a></h4>
                                    <span class="woocommerce-Price-amount amount">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>79</bdi>
                                            </span>
                                        </ins>
                                        <del>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>129</bdi>
                                            </span>
                                        </del>
                                    </span>
                                </div>
                                <div class="quick-view-single-product">
                                    <div class="view-single-product-inner clearfix">
                                        <button class="btn quick-view-single-product-close-btn"><i
                                                class="pe-7s-close-circle"></i></button>
                                        <div class="img-holder">
                                            <img loading=lazy
                                                 src="{{ url('assets/front/assets/images/shop/img-1.jpg') }}" alt>
                                        </div>
                                        <div class="product-details">
                                            <h4>Fashion tops</h4>
                                            <div class="price">
                                                <span class="current">$45.00</span>
                                                <span class="old">$55.00</span>
                                            </div>
                                            <div class="rating">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star-social-favorite-middle-full"></i>
                                                <span>(2 Customer review)</span>
                                            </div>
                                            <p>Gregor Samsa woke from troubled dreams, he found himself transformed
                                                in his bed into a horrible vermin. He lay on his armour-like back,
                                                and if he lifted his head a little he could see his brown belly</p>
                                            <div class="product-option">
                                                <form class="form">
                                                    <div class="product-row">
                                                        <div>
                                                            <input id="product-count" class="product-count"
                                                                   type="text" value="1" name="product-count">
                                                        </div>
                                                        <div>
                                                            <button type="submit">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="thb-product-meta-before">
                                                <div class="add-to-wishlist">
                                                    <a href="#" class="add_to_wishlist">
                                                        <i class="pe-7s-like"></i>
                                                        <span>Add To Wishlist</span>
                                                    </a>
                                                </div>
                                                <div class="product_meta">
                                                    <span class="sku_wrapper">SKU: <span
                                                            class="sku">71236-1</span></span>
                                                    <span class="posted_in">Categories: <a href="#">Clothing</a>, <a
                                                            href="#">Tops</a>, <a href="#">Women</a></span>
                                                    <span class="tagged_as">Tags: <a href="#">Button</a>, <a
                                                            href="#">Red</a>, <a href="#">Tshirt</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end quick-view-single-product -->
                            </li>
                            <li class="product">
                                <div class="product-holder">
                                    <a href="shop-single.html"><img loading=lazy
                                                                    src="{{ url('assets/front/assets/images/shop/img-2.jpg') }}"
                                                                    alt></a>
                                    <div class="shop-action-wrap">
                                        <ul class="shop-action">
                                            <li><a href="#" title="Quick view!"><i class="fi flaticon-view"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to Wishlist!"><i
                                                        class="fi icon-heart-shape-outline"></i></a></li>
                                            <li><a href="#" title="Add to cart!"><i
                                                        class="fi flaticon-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4><a href="shop-single.html">Women's T-shirt</a></h4>
                                    <span class="woocommerce-Price-amount amount">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>150</bdi>
                                            </span>
                                        </ins>
                                    </span>
                                </div>
                                <div class="quick-view-single-product">
                                    <div class="view-single-product-inner clearfix">
                                        <button class="btn quick-view-single-product-close-btn"><i
                                                class="pe-7s-close-circle"></i></button>
                                        <div class="img-holder">
                                            <img loading=lazy
                                                 src="{{ url('assets/front/assets/images/shop/img-2.jpg') }}" alt>
                                        </div>
                                        <div class="product-details">
                                            <h4>Women's T-shirt</h4>
                                            <div class="price">
                                                <span class="current">$45.00</span>
                                                <span class="old">$55.00</span>
                                            </div>
                                            <div class="rating">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star-social-favorite-middle-full"></i>
                                                <span>(2 Customer review)</span>
                                            </div>
                                            <p>Gregor Samsa woke from troubled dreams, he found himself transformed
                                                in his bed into a horrible vermin. He lay on his armour-like back,
                                                and if he lifted his head a little he could see his brown belly</p>
                                            <div class="product-option">
                                                <form class="form">
                                                    <div class="product-row">
                                                        <div>
                                                            <input class="product-count" type="text" value="1"
                                                                   name="product-count-2">
                                                        </div>
                                                        <div>
                                                            <button type="submit">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="thb-product-meta-before">
                                                <div class="add-to-wishlist">
                                                    <a href="#" class="add_to_wishlist">
                                                        <i class="pe-7s-like"></i>
                                                        <span>Add To Wishlist</span>
                                                    </a>
                                                </div>
                                                <div class="product_meta">
                                                    <span class="sku_wrapper">SKU: <span
                                                            class="sku">71236-1</span></span>
                                                    <span class="posted_in">Categories: <a href="#">Clothing</a>, <a
                                                            href="#">Tops</a>, <a href="#">Women</a></span>
                                                    <span class="tagged_as">Tags: <a href="#">Button</a>, <a
                                                            href="#">Red</a>, <a href="#">Tshirt</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end quick-view-single-product -->
                            </li>
                            <li class="product">
                                <div class="product-holder">
                                    <a href="shop-single.html"><img loading=lazy
                                                                    src="{{ url('assets/front/assets/images/shop/img-3.jpg') }}"
                                                                    alt></a>
                                    <div class="shop-action-wrap">
                                        <ul class="shop-action">
                                            <li><a href="#" title="Quick view!"><i class="fi flaticon-view"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to Wishlist!"><i
                                                        class="fi icon-heart-shape-outline"></i></a></li>
                                            <li><a href="#" title="Add to cart!"><i
                                                        class="fi flaticon-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4><a href="shop-single.html">Short Sleeve</a></h4>
                                    <span class="woocommerce-Price-amount amount">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>147</bdi>
                                            </span>
                                        </ins>
                                        <del>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>200</bdi>
                                            </span>
                                        </del>
                                    </span>
                                </div>
                                <div class="quick-view-single-product">
                                    <div class="view-single-product-inner clearfix">
                                        <button class="btn quick-view-single-product-close-btn"><i
                                                class="pe-7s-close-circle"></i></button>
                                        <div class="img-holder">
                                            <img loading=lazy
                                                 src="{{ url('assets/front/assets/images/shop/img-3.jpg') }}" alt>
                                        </div>
                                        <div class="product-details">
                                            <h4>Short Sleeve</h4>
                                            <div class="price">
                                                <span class="current">$45.00</span>
                                                <span class="old">$55.00</span>
                                            </div>
                                            <div class="rating">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star-social-favorite-middle-full"></i>
                                                <span>(2 Customer review)</span>
                                            </div>
                                            <p>Gregor Samsa woke from troubled dreams, he found himself transformed
                                                in his bed into a horrible vermin. He lay on his armour-like back,
                                                and if he lifted his head a little he could see his brown belly</p>
                                            <div class="product-option">
                                                <form class="form">
                                                    <div class="product-row">
                                                        <div>
                                                            <input class="product-count" type="text" value="1"
                                                                   name="product-count-3">
                                                        </div>
                                                        <div>
                                                            <button type="submit">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="thb-product-meta-before">
                                                <div class="add-to-wishlist">
                                                    <a href="#" class="add_to_wishlist">
                                                        <i class="pe-7s-like"></i>
                                                        <span>Add To Wishlist</span>
                                                    </a>
                                                </div>
                                                <div class="product_meta">
                                                    <span class="sku_wrapper">SKU: <span
                                                            class="sku">71236-1</span></span>
                                                    <span class="posted_in">Categories: <a href="#">Clothing</a>, <a
                                                            href="#">Tops</a>, <a href="#">Women</a></span>
                                                    <span class="tagged_as">Tags: <a href="#">Button</a>, <a
                                                            href="#">Red</a>, <a href="#">Tshirt</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end quick-view-single-product -->
                            </li>
                            <li class="product">
                                <div class="product-holder">
                                    <a href="shop-single.html"><img loading=lazy
                                                                    src="{{ url('assets/front/assets/images/shop/img-4.jpg') }}"
                                                                    alt></a>
                                    <div class="shop-action-wrap">
                                        <ul class="shop-action">
                                            <li><a href="#" title="Quick view!"><i class="fi flaticon-view"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to Wishlist!"><i
                                                        class="fi icon-heart-shape-outline"></i></a></li>
                                            <li><a href="#" title="Add to cart!"><i
                                                        class="fi flaticon-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4><a href="shop-single.html">Stylish coat</a></h4>
                                    <span class="woocommerce-Price-amount amount">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>79</bdi>
                                            </span>
                                        </ins>
                                    </span>
                                </div>
                                <div class="quick-view-single-product">
                                    <div class="view-single-product-inner clearfix">
                                        <button class="btn quick-view-single-product-close-btn"><i
                                                class="pe-7s-close-circle"></i></button>
                                        <div class="img-holder">
                                            <img loading=lazy
                                                 src="{{ url('assets/front/assets/images/shop/img-4.jpg') }}" alt>
                                        </div>
                                        <div class="product-details">
                                            <h4>Stylish coat</h4>
                                            <div class="price">
                                                <span class="current">$45.00</span>
                                                <span class="old">$55.00</span>
                                            </div>
                                            <div class="rating">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star-social-favorite-middle-full"></i>
                                                <span>(2 Customer review)</span>
                                            </div>
                                            <p>Gregor Samsa woke from troubled dreams, he found himself transformed
                                                in his bed into a horrible vermin. He lay on his armour-like back,
                                                and if he lifted his head a little he could see his brown belly</p>
                                            <div class="product-option">
                                                <form class="form">
                                                    <div class="product-row">
                                                        <div>
                                                            <input class="product-count" type="text" value="1"
                                                                   name="product-count-4">
                                                        </div>
                                                        <div>
                                                            <button type="submit">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="thb-product-meta-before">
                                                <div class="add-to-wishlist">
                                                    <a href="#" class="add_to_wishlist">
                                                        <i class="pe-7s-like"></i>
                                                        <span>Add To Wishlist</span>
                                                    </a>
                                                </div>
                                                <div class="product_meta">
                                                    <span class="sku_wrapper">SKU: <span
                                                            class="sku">71236-1</span></span>
                                                    <span class="posted_in">Categories: <a href="#">Clothing</a>, <a
                                                            href="#">Tops</a>, <a href="#">Women</a></span>
                                                    <span class="tagged_as">Tags: <a href="#">Button</a>, <a
                                                            href="#">Red</a>, <a href="#">Tshirt</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end quick-view-single-product -->
                            </li>
                            <li class="product">
                                <div class="product-holder">
                                    <a href="shop-single.html"><img loading=lazy
                                                                    src="{{ url('assets/front/assets/images/shop/img-5.jpg') }}"
                                                                    alt></a>
                                    <div class="shop-action-wrap">
                                        <ul class="shop-action">
                                            <li><a href="#" title="Quick view!"><i class="fi flaticon-view"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to Wishlist!"><i
                                                        class="fi icon-heart-shape-outline"></i></a></li>
                                            <li><a href="#" title="Add to cart!"><i
                                                        class="fi flaticon-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4><a href="shop-single.html">Women Modern Shot Pant</a></h4>
                                    <span class="woocommerce-Price-amount amount">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>179</bdi>
                                            </span>
                                        </ins>
                                    </span>
                                </div>
                                <div class="quick-view-single-product">
                                    <div class="view-single-product-inner clearfix">
                                        <button class="btn quick-view-single-product-close-btn"><i
                                                class="pe-7s-close-circle"></i></button>
                                        <div class="img-holder">
                                            <img loading=lazy
                                                 src="{{ url('assets/front/assets/images/shop/img-5.jpg') }}" alt>
                                        </div>
                                        <div class="product-details">
                                            <h4>Two Colure Hoodie</h4>
                                            <div class="price">
                                                <span class="current">$45.00</span>
                                                <span class="old">$55.00</span>
                                            </div>
                                            <div class="rating">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star-social-favorite-middle-full"></i>
                                                <span>(2 Customer review)</span>
                                            </div>
                                            <p>Gregor Samsa woke from troubled dreams, he found himself transformed
                                                in his bed into a horrible vermin. He lay on his armour-like back,
                                                and if he lifted his head a little he could see his brown belly</p>
                                            <div class="product-option">
                                                <form class="form">
                                                    <div class="product-row">
                                                        <div>
                                                            <input class="product-count" type="text" value="1"
                                                                   name="product-count-5">
                                                        </div>
                                                        <div>
                                                            <button type="submit">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="thb-product-meta-before">
                                                <div class="add-to-wishlist">
                                                    <a href="#" class="add_to_wishlist">
                                                        <i class="pe-7s-like"></i>
                                                        <span>Add To Wishlist</span>
                                                    </a>
                                                </div>
                                                <div class="product_meta">
                                                    <span class="sku_wrapper">SKU: <span
                                                            class="sku">71236-1</span></span>
                                                    <span class="posted_in">Categories: <a href="#">Clothing</a>, <a
                                                            href="#">Tops</a>, <a href="#">Women</a></span>
                                                    <span class="tagged_as">Tags: <a href="#">Button</a>, <a
                                                            href="#">Red</a>, <a href="#">Tshirt</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end quick-view-single-product -->
                            </li>
                            <li class="product">
                                <div class="product-holder">
                                    <a href="shop-single.html"><img loading=lazy
                                                                    src="{{ url('assets/front/assets/images/shop/img-6.jpg') }}"
                                                                    alt></a>
                                    <div class="shop-action-wrap">
                                        <ul class="shop-action">
                                            <li><a href="#" title="Quick view!"><i class="fi flaticon-view"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to Wishlist!"><i
                                                        class="fi icon-heart-shape-outline"></i></a></li>
                                            <li><a href="#" title="Add to cart!"><i
                                                        class="fi flaticon-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4><a href="shop-single.html">Blue Jeans Pant for Men</a></h4>
                                    <span class="woocommerce-Price-amount amount">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>179</bdi>
                                            </span>
                                        </ins>
                                    </span>
                                </div>
                                <div class="quick-view-single-product">
                                    <div class="view-single-product-inner clearfix">
                                        <button class="btn quick-view-single-product-close-btn"><i
                                                class="pe-7s-close-circle"></i></button>
                                        <div class="img-holder">
                                            <img loading=lazy
                                                 src="{{ url('assets/front/assets/images/shop/img-6.jpg') }}" alt>
                                        </div>
                                        <div class="product-details">
                                            <h4>Two Colure Hoodie</h4>
                                            <div class="price">
                                                <span class="current">$45.00</span>
                                                <span class="old">$55.00</span>
                                            </div>
                                            <div class="rating">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star-social-favorite-middle-full"></i>
                                                <span>(2 Customer review)</span>
                                            </div>
                                            <p>Gregor Samsa woke from troubled dreams, he found himself transformed
                                                in his bed into a horrible vermin. He lay on his armour-like back,
                                                and if he lifted his head a little he could see his brown belly</p>
                                            <div class="product-option">
                                                <form class="form">
                                                    <div class="product-row">
                                                        <div>
                                                            <input class="product-count" type="text" value="1"
                                                                   name="product-count-6">
                                                        </div>
                                                        <div>
                                                            <button type="submit">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="thb-product-meta-before">
                                                <div class="add-to-wishlist">
                                                    <a href="#" class="add_to_wishlist">
                                                        <i class="pe-7s-like"></i>
                                                        <span>Add To Wishlist</span>
                                                    </a>
                                                </div>
                                                <div class="product_meta">
                                                    <span class="sku_wrapper">SKU: <span
                                                            class="sku">71236-1</span></span>
                                                    <span class="posted_in">Categories: <a href="#">Clothing</a>, <a
                                                            href="#">Tops</a>, <a href="#">Women</a></span>
                                                    <span class="tagged_as">Tags: <a href="#">Button</a>, <a
                                                            href="#">Red</a>, <a href="#">Tshirt</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end quick-view-single-product -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- end container-1410 -->
    </section>
    <!-- end trendy-product-section -->

    <!-- start featured-proeducts-section-s2 -->
    <section class="featured-proeducts-section-s2 section-padding">
        <div class="container-1410">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="section-title-s2">
                        <h2>{{trans('website.all_categories')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-xs-12">
                    @php
                        $chunks = array_chunk($categories->toArray(), 3);
                    @endphp
                    @foreach($chunks as $key => $val)
                        <div class="product-grids clearfix">
                            @foreach($val as $key2 => $val2)
                                <div class="grid">
                                    <div class="img-holder">
                                        <a href="#"><img loading="lazy" height="400" width="400"
                                                         src="{{ url('public/images/category/picture/'. $val2['picture']) }}"
                                                         alt></a>
                                    </div>
                                    <div class="details" style="padding: 15px;">
                                        <h3>{!! getFromJson($val2['name'] , lang()) !!}</h3>
                                        <a href="#" class="shop-btn">{{trans('website.see_more')}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div> <!-- end container-1410 -->
    </section>
    <!-- end featured-proeducts-section-s2 -->

    <!-- start trendy-product-section -->
    <section class="trendy-product-section section-padding" style="padding: 80px 0 80px 0;">
        <div class="container-1410">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="section-title-s2">
                        <h2>{{trans('website.random_ads')}}</h2>
                    </div>
                    <a href="#" class="more-products">{{trans('website.see_all')}}</a>
                </div>
            </div>
            <div class="row">
                <div class="col col-xs-12">
                    <div class="products-wrapper">
                        <ul class="products product-row-slider">
                            <li class="product">
                                <div class="product-holder">
                                    <div class="product-badge discount">-27%</div>
                                    <a href="shop-single.html"><img loading=lazy
                                                                    src="{{ url('assets/front/assets/images/shop/img-1.jpg') }}"
                                                                    alt></a>
                                    <div class="shop-action-wrap">
                                        <ul class="shop-action">
                                            <li><a href="#" title="Quick view!"><i class="fi flaticon-view"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to Wishlist!"><i
                                                        class="fi icon-heart-shape-outline"></i></a></li>
                                            <li><a href="#" title="Add to cart!"><i
                                                        class="fi flaticon-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4><a href="shop-single.html">Fashion tops</a></h4>
                                    <span class="woocommerce-Price-amount amount">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>79</bdi>
                                            </span>
                                        </ins>
                                        <del>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>129</bdi>
                                            </span>
                                        </del>
                                    </span>
                                </div>
                                <div class="quick-view-single-product">
                                    <div class="view-single-product-inner clearfix">
                                        <button class="btn quick-view-single-product-close-btn"><i
                                                class="pe-7s-close-circle"></i></button>
                                        <div class="img-holder">
                                            <img loading=lazy
                                                 src="{{ url('assets/front/assets/images/shop/img-1.jpg') }}" alt>
                                        </div>
                                        <div class="product-details">
                                            <h4>Fashion tops</h4>
                                            <div class="price">
                                                <span class="current">$45.00</span>
                                                <span class="old">$55.00</span>
                                            </div>
                                            <div class="rating">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star-social-favorite-middle-full"></i>
                                                <span>(2 Customer review)</span>
                                            </div>
                                            <p>Gregor Samsa woke from troubled dreams, he found himself transformed
                                                in his bed into a horrible vermin. He lay on his armour-like back,
                                                and if he lifted his head a little he could see his brown belly</p>
                                            <div class="product-option">
                                                <form class="form">
                                                    <div class="product-row">
                                                        <div>
                                                            <input id="product-count" class="product-count"
                                                                   type="text" value="1" name="product-count">
                                                        </div>
                                                        <div>
                                                            <button type="submit">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="thb-product-meta-before">
                                                <div class="add-to-wishlist">
                                                    <a href="#" class="add_to_wishlist">
                                                        <i class="pe-7s-like"></i>
                                                        <span>Add To Wishlist</span>
                                                    </a>
                                                </div>
                                                <div class="product_meta">
                                                    <span class="sku_wrapper">SKU: <span
                                                            class="sku">71236-1</span></span>
                                                    <span class="posted_in">Categories: <a href="#">Clothing</a>, <a
                                                            href="#">Tops</a>, <a href="#">Women</a></span>
                                                    <span class="tagged_as">Tags: <a href="#">Button</a>, <a
                                                            href="#">Red</a>, <a href="#">Tshirt</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end quick-view-single-product -->
                            </li>
                            <li class="product">
                                <div class="product-holder">
                                    <a href="shop-single.html"><img loading=lazy
                                                                    src="{{ url('assets/front/assets/images/shop/img-2.jpg') }}"
                                                                    alt></a>
                                    <div class="shop-action-wrap">
                                        <ul class="shop-action">
                                            <li><a href="#" title="Quick view!"><i class="fi flaticon-view"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to Wishlist!"><i
                                                        class="fi icon-heart-shape-outline"></i></a></li>
                                            <li><a href="#" title="Add to cart!"><i
                                                        class="fi flaticon-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4><a href="shop-single.html">Women's T-shirt</a></h4>
                                    <span class="woocommerce-Price-amount amount">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>150</bdi>
                                            </span>
                                        </ins>
                                    </span>
                                </div>
                                <div class="quick-view-single-product">
                                    <div class="view-single-product-inner clearfix">
                                        <button class="btn quick-view-single-product-close-btn"><i
                                                class="pe-7s-close-circle"></i></button>
                                        <div class="img-holder">
                                            <img loading=lazy
                                                 src="{{ url('assets/front/assets/images/shop/img-2.jpg') }}" alt>
                                        </div>
                                        <div class="product-details">
                                            <h4>Women's T-shirt</h4>
                                            <div class="price">
                                                <span class="current">$45.00</span>
                                                <span class="old">$55.00</span>
                                            </div>
                                            <div class="rating">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star-social-favorite-middle-full"></i>
                                                <span>(2 Customer review)</span>
                                            </div>
                                            <p>Gregor Samsa woke from troubled dreams, he found himself transformed
                                                in his bed into a horrible vermin. He lay on his armour-like back,
                                                and if he lifted his head a little he could see his brown belly</p>
                                            <div class="product-option">
                                                <form class="form">
                                                    <div class="product-row">
                                                        <div>
                                                            <input class="product-count" type="text" value="1"
                                                                   name="product-count-2">
                                                        </div>
                                                        <div>
                                                            <button type="submit">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="thb-product-meta-before">
                                                <div class="add-to-wishlist">
                                                    <a href="#" class="add_to_wishlist">
                                                        <i class="pe-7s-like"></i>
                                                        <span>Add To Wishlist</span>
                                                    </a>
                                                </div>
                                                <div class="product_meta">
                                                    <span class="sku_wrapper">SKU: <span
                                                            class="sku">71236-1</span></span>
                                                    <span class="posted_in">Categories: <a href="#">Clothing</a>, <a
                                                            href="#">Tops</a>, <a href="#">Women</a></span>
                                                    <span class="tagged_as">Tags: <a href="#">Button</a>, <a
                                                            href="#">Red</a>, <a href="#">Tshirt</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end quick-view-single-product -->
                            </li>
                            <li class="product">
                                <div class="product-holder">
                                    <a href="shop-single.html"><img loading=lazy
                                                                    src="{{ url('assets/front/assets/images/shop/img-3.jpg') }}"
                                                                    alt></a>
                                    <div class="shop-action-wrap">
                                        <ul class="shop-action">
                                            <li><a href="#" title="Quick view!"><i class="fi flaticon-view"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to Wishlist!"><i
                                                        class="fi icon-heart-shape-outline"></i></a></li>
                                            <li><a href="#" title="Add to cart!"><i
                                                        class="fi flaticon-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4><a href="shop-single.html">Short Sleeve</a></h4>
                                    <span class="woocommerce-Price-amount amount">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>147</bdi>
                                            </span>
                                        </ins>
                                        <del>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>200</bdi>
                                            </span>
                                        </del>
                                    </span>
                                </div>
                                <div class="quick-view-single-product">
                                    <div class="view-single-product-inner clearfix">
                                        <button class="btn quick-view-single-product-close-btn"><i
                                                class="pe-7s-close-circle"></i></button>
                                        <div class="img-holder">
                                            <img loading=lazy
                                                 src="{{ url('assets/front/assets/images/shop/img-3.jpg') }}" alt>
                                        </div>
                                        <div class="product-details">
                                            <h4>Short Sleeve</h4>
                                            <div class="price">
                                                <span class="current">$45.00</span>
                                                <span class="old">$55.00</span>
                                            </div>
                                            <div class="rating">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star-social-favorite-middle-full"></i>
                                                <span>(2 Customer review)</span>
                                            </div>
                                            <p>Gregor Samsa woke from troubled dreams, he found himself transformed
                                                in his bed into a horrible vermin. He lay on his armour-like back,
                                                and if he lifted his head a little he could see his brown belly</p>
                                            <div class="product-option">
                                                <form class="form">
                                                    <div class="product-row">
                                                        <div>
                                                            <input class="product-count" type="text" value="1"
                                                                   name="product-count-3">
                                                        </div>
                                                        <div>
                                                            <button type="submit">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="thb-product-meta-before">
                                                <div class="add-to-wishlist">
                                                    <a href="#" class="add_to_wishlist">
                                                        <i class="pe-7s-like"></i>
                                                        <span>Add To Wishlist</span>
                                                    </a>
                                                </div>
                                                <div class="product_meta">
                                                    <span class="sku_wrapper">SKU: <span
                                                            class="sku">71236-1</span></span>
                                                    <span class="posted_in">Categories: <a href="#">Clothing</a>, <a
                                                            href="#">Tops</a>, <a href="#">Women</a></span>
                                                    <span class="tagged_as">Tags: <a href="#">Button</a>, <a
                                                            href="#">Red</a>, <a href="#">Tshirt</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end quick-view-single-product -->
                            </li>
                            <li class="product">
                                <div class="product-holder">
                                    <a href="shop-single.html"><img loading=lazy
                                                                    src="{{ url('assets/front/assets/images/shop/img-4.jpg') }}"
                                                                    alt></a>
                                    <div class="shop-action-wrap">
                                        <ul class="shop-action">
                                            <li><a href="#" title="Quick view!"><i class="fi flaticon-view"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to Wishlist!"><i
                                                        class="fi icon-heart-shape-outline"></i></a></li>
                                            <li><a href="#" title="Add to cart!"><i
                                                        class="fi flaticon-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4><a href="shop-single.html">Stylish coat</a></h4>
                                    <span class="woocommerce-Price-amount amount">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span class="woocommerce-Price-currencySymbol">$</span>79</bdi>
                                            </span>
                                        </ins>
                                    </span>
                                </div>
                                <div class="quick-view-single-product">
                                    <div class="view-single-product-inner clearfix">
                                        <button class="btn quick-view-single-product-close-btn"><i
                                                class="pe-7s-close-circle"></i></button>
                                        <div class="img-holder">
                                            <img loading=lazy
                                                 src="{{ url('assets/front/assets/images/shop/img-4.jpg') }}" alt>
                                        </div>
                                        <div class="product-details">
                                            <h4>Stylish coat</h4>
                                            <div class="price">
                                                <span class="current">$45.00</span>
                                                <span class="old">$55.00</span>
                                            </div>
                                            <div class="rating">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star-social-favorite-middle-full"></i>
                                                <span>(2 Customer review)</span>
                                            </div>
                                            <p>Gregor Samsa woke from troubled dreams, he found himself transformed
                                                in his bed into a horrible vermin. He lay on his armour-like back,
                                                and if he lifted his head a little he could see his brown belly</p>
                                            <div class="product-option">
                                                <form class="form">
                                                    <div class="product-row">
                                                        <div>
                                                            <input class="product-count" type="text" value="1"
                                                                   name="product-count-4">
                                                        </div>
                                                        <div>
                                                            <button type="submit">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="thb-product-meta-before">
                                                <div class="add-to-wishlist">
                                                    <a href="#" class="add_to_wishlist">
                                                        <i class="pe-7s-like"></i>
                                                        <span>Add To Wishlist</span>
                                                    </a>
                                                </div>
                                                <div class="product_meta">
                                                    <span class="sku_wrapper">SKU: <span
                                                            class="sku">71236-1</span></span>
                                                    <span class="posted_in">Categories: <a href="#">Clothing</a>, <a
                                                            href="#">Tops</a>, <a href="#">Women</a></span>
                                                    <span class="tagged_as">Tags: <a href="#">Button</a>, <a
                                                            href="#">Red</a>, <a href="#">Tshirt</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end quick-view-single-product -->
                            </li>
                            <li class="product">
                                <div class="product-holder">
                                    <a href="shop-single.html"><img loading=lazy
                                                                    src="{{ url('assets/front/assets/images/shop/img-5.jpg') }}"
                                                                    alt></a>
                                    <div class="shop-action-wrap">
                                        <ul class="shop-action">
                                            <li><a href="#" title="Quick view!"><i class="fi flaticon-view"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to Wishlist!"><i
                                                        class="fi icon-heart-shape-outline"></i></a></li>
                                            <li><a href="#" title="Add to cart!"><i
                                                        class="fi flaticon-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4><a href="shop-single.html">Women Modern Shot Pant</a></h4>
                                    <span class="woocommerce-Price-amount amount">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>179</bdi>
                                            </span>
                                        </ins>
                                    </span>
                                </div>
                                <div class="quick-view-single-product">
                                    <div class="view-single-product-inner clearfix">
                                        <button class="btn quick-view-single-product-close-btn"><i
                                                class="pe-7s-close-circle"></i></button>
                                        <div class="img-holder">
                                            <img loading=lazy
                                                 src="{{ url('assets/front/assets/images/shop/img-5.jpg') }}" alt>
                                        </div>
                                        <div class="product-details">
                                            <h4>Two Colure Hoodie</h4>
                                            <div class="price">
                                                <span class="current">$45.00</span>
                                                <span class="old">$55.00</span>
                                            </div>
                                            <div class="rating">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star-social-favorite-middle-full"></i>
                                                <span>(2 Customer review)</span>
                                            </div>
                                            <p>Gregor Samsa woke from troubled dreams, he found himself transformed
                                                in his bed into a horrible vermin. He lay on his armour-like back,
                                                and if he lifted his head a little he could see his brown belly</p>
                                            <div class="product-option">
                                                <form class="form">
                                                    <div class="product-row">
                                                        <div>
                                                            <input class="product-count" type="text" value="1"
                                                                   name="product-count-5">
                                                        </div>
                                                        <div>
                                                            <button type="submit">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="thb-product-meta-before">
                                                <div class="add-to-wishlist">
                                                    <a href="#" class="add_to_wishlist">
                                                        <i class="pe-7s-like"></i>
                                                        <span>Add To Wishlist</span>
                                                    </a>
                                                </div>
                                                <div class="product_meta">
                                                    <span class="sku_wrapper">SKU: <span
                                                            class="sku">71236-1</span></span>
                                                    <span class="posted_in">Categories: <a href="#">Clothing</a>, <a
                                                            href="#">Tops</a>, <a href="#">Women</a></span>
                                                    <span class="tagged_as">Tags: <a href="#">Button</a>, <a
                                                            href="#">Red</a>, <a href="#">Tshirt</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end quick-view-single-product -->
                            </li>
                            <li class="product">
                                <div class="product-holder">
                                    <a href="shop-single.html"><img loading=lazy
                                                                    src="{{ url('assets/front/assets/images/shop/img-6.jpg') }}"
                                                                    alt></a>
                                    <div class="shop-action-wrap">
                                        <ul class="shop-action">
                                            <li><a href="#" title="Quick view!"><i class="fi flaticon-view"></i></a>
                                            </li>
                                            <li><a href="#" title="Add to Wishlist!"><i
                                                        class="fi icon-heart-shape-outline"></i></a></li>
                                            <li><a href="#" title="Add to cart!"><i
                                                        class="fi flaticon-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4><a href="shop-single.html">Blue Jeans Pant for Men</a></h4>
                                    <span class="woocommerce-Price-amount amount">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi><span
                                                        class="woocommerce-Price-currencySymbol">$</span>179</bdi>
                                            </span>
                                        </ins>
                                    </span>
                                </div>
                                <div class="quick-view-single-product">
                                    <div class="view-single-product-inner clearfix">
                                        <button class="btn quick-view-single-product-close-btn"><i
                                                class="pe-7s-close-circle"></i></button>
                                        <div class="img-holder">
                                            <img loading=lazy
                                                 src="{{ url('assets/front/assets/images/shop/img-6.jpg') }}" alt>
                                        </div>
                                        <div class="product-details">
                                            <h4>Two Colure Hoodie</h4>
                                            <div class="price">
                                                <span class="current">$45.00</span>
                                                <span class="old">$55.00</span>
                                            </div>
                                            <div class="rating">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star-social-favorite-middle-full"></i>
                                                <span>(2 Customer review)</span>
                                            </div>
                                            <p>Gregor Samsa woke from troubled dreams, he found himself transformed
                                                in his bed into a horrible vermin. He lay on his armour-like back,
                                                and if he lifted his head a little he could see his brown belly</p>
                                            <div class="product-option">
                                                <form class="form">
                                                    <div class="product-row">
                                                        <div>
                                                            <input class="product-count" type="text" value="1"
                                                                   name="product-count-6">
                                                        </div>
                                                        <div>
                                                            <button type="submit">Add to cart</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="thb-product-meta-before">
                                                <div class="add-to-wishlist">
                                                    <a href="#" class="add_to_wishlist">
                                                        <i class="pe-7s-like"></i>
                                                        <span>Add To Wishlist</span>
                                                    </a>
                                                </div>
                                                <div class="product_meta">
                                                    <span class="sku_wrapper">SKU: <span
                                                            class="sku">71236-1</span></span>
                                                    <span class="posted_in">Categories: <a href="#">Clothing</a>, <a
                                                            href="#">Tops</a>, <a href="#">Women</a></span>
                                                    <span class="tagged_as">Tags: <a href="#">Button</a>, <a
                                                            href="#">Red</a>, <a href="#">Tshirt</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end quick-view-single-product -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- end container-1410 -->
    </section>
    <!-- end trendy-product-section -->
@stop
