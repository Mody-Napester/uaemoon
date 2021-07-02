@extends('front._layouts.main')

@section('content')
    @if(!$slider->isEmpty())
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
    @endif

    @if(!$categories->isEmpty())
        <!-- start featured-proeducts-section-s2 -->
        <section class="trendy-product-section section-padding" style="padding: 80px 0 0 0;">
            <div class="container-1410">
                <div class="cm-card-box">
                    <div class="row">
                        <div class="col col-xs-12">
                            <div class="section-title-s2">
                                <h2>{{trans('website.all_categories')}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-xs-12">
                            <div class="products-wrapper ">
                                <ul class="products product-row-slider">
                                    @foreach($categories as $key => $val)
                                        <li class="product">
                                            <div class="product-holder">
                                                {{--                                    <div class="product-badge discount">-27%</div>--}}
                                                <center>
                                                    <a href="{{route('front.category.show', $val->uuid)}}">
                                                        <img style="width: 215px;height: 215px;"
                                                             loading=lazy src="{{ getCategoryImage($val->picture) }}"
                                                             alt>
                                                    </a>
                                                </center>
                                            </div>
                                            <div class="product-info">
                                                <h4>
                                                    <a href="{{route('front.category.show', $val->uuid)}}">{{getFromJson($val['name'] , lang())}}</a>
                                                </h4>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            {{--                        <div class="all-cat">--}}
                            {{--                            <ul class="clearfix product-row-slider" style="text-align: center !important;">--}}
                            {{--                                @foreach($categories as $key => $val)--}}
                            {{--                                    <li style="margin: 0 20px;text-align: center !important;height: 230px;">--}}
                            {{--                                        <a style="padding-bottom: 30px;" class="fontawesome5x"--}}
                            {{--                                           href="{{route('front.category.show', $val['uuid'])}}">--}}
                            {{--                                            <span style="color: #20255D;">{!! $val['icon'] !!}</span>--}}
                            {{--                                            <span--}}
                            {{--                                                style="padding-top: 20px;">{{getFromJson($val['name'] , lang())}}</span>--}}
                            {{--                                        </a>--}}
                            {{--                                    </li>--}}
                            {{--                                @endforeach--}}
                            {{--                            </ul>--}}
                            {{--                        </div>--}}
                        </div>
                    </div>
                </div>
            </div> <!-- end container-1410 -->
        </section>
        <!-- end featured-proeducts-section-s2 -->
    @endif

    @if(!$categoriesWithVipAdv->isEmpty())
        @foreach($categoriesWithVipAdv as $key => $val)
            <!-- start trendy-product-section -->
            <section class="trendy-product-section section-padding" style="padding: 80px 0 0 0;">
                <div class="container-1410">
                    <div class="cm-card-box">
                        <div class="row">
                            <div class="col col-xs-12">
                                <div class="section-title-s2">
                                    <h2>{{getFromJson($val['name'] , lang())}} ({{trans('website.vip')}})</h2>
                                </div>
                                {{--                    <a href="#" class="more-products">{{trans('website.see_all')}}</a>--}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-xs-12">
                                <div class="products-wrapper">
                                    <ul class="products product-row-slider">
                                        @foreach($val->advertisesVipAndActive as $key2 => $val2)
                                            <li class="product">
                                                <div class="product-holder">
                                                    {{--                                    <div class="product-badge discount">-27%</div>--}}
                                                    <center>
                                                        <a href="{{route('front.advertise.show', $val2->uuid)}}">
                                                            <img loading=lazy src="{{ url($val2->cover) }}"
                                                                 alt style="width: 275px;height: 340px;"></a>
                                                        <div class="shop-action-wrap">
                                                            <ul class="shop-action">
                                                                <li>
                                                                    <a href="{{route('front.advertise.show', $val2->uuid)}}"
                                                                       title="{{trans('website.view')}}"><i
                                                                            class="fi flaticon-view"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </center>
                                                </div>
                                                <div class="product-info">
                                                    <h4>
                                                        <a href="{{route('front.advertise.show', $val2->uuid)}}">{{lang() == 'ar' ? $val2->title_ar : $val2->title_en}}</a>
                                                    </h4>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container-1410 -->
            </section>
            <!-- end trendy-product-section -->
        @endforeach
    @endif

    @if($random_adv && !$random_adv->isEmpty())
        <!-- start trendy-product-section -->
        <section class="trendy-product-section section-padding" style="padding: 80px 0 80px 0">
            <div class="container-1410">
                <div class="cm-card-box">
                    <div class="row">
                        <div class="col col-xs-12">
                            <div class="section-title-s2">
                                <h2>{{trans('website.random_ads')}}</h2>
                            </div>
                            {{--                    <a href="#" class="more-products">{{trans('website.see_all')}}</a>--}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-xs-12">
                            <div class="products-wrapper">
                                <ul class="products product-row-slider">
                                    @foreach($random_adv as $key => $val)
                                        <li class="product">
                                            <div class="product-holder">
                                                {{--                                    <div class="product-badge discount">-27%</div>--}}
                                                <center>
                                                    <a href="{{route('front.advertise.show', $val->uuid)}}">
                                                        <img loading=lazy src="{{ url($val->cover) }}"
                                                             alt style="width: 275px;height: 340px;"></a>
                                                    <div class="shop-action-wrap">
                                                        <ul class="shop-action">
                                                            <li>
                                                                <a href="{{route('front.advertise.show', $val->uuid)}}"
                                                                   title="{{trans('website.view')}}"><i
                                                                        class="fi flaticon-view"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </center>
                                            </div>
                                            <div class="product-info">
                                                <h4>
                                                    <a href="{{route('front.advertise.show', $val->uuid)}}">{{lang() == 'ar' ? $val->title_ar : $val->title_en}}</a>
                                                </h4>
                                                <span class="woocommerce-Price-amount amount">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>{!! getFromJson($val->category->name , lang()) !!}</bdi>
                                            </span>
                                        </ins>

                                    </span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container-1410 -->
        </section>
        <!-- end trendy-product-section -->
    @endif
@stop
