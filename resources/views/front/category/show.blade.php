@extends('front._layouts.main')

@section('content')
    <!-- start page-title -->
    <section class="page-title">
        <div class="page-title-container">
            <div class="page-title-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <h2>{{getFromJson($resource->name , lang())}}</h2>
                            <ol class="breadcrumb">
                                <li><a href="{{url('/')}}">{{trans('website.home')}}</a></li>
                                <li>{{getFromJson($resource->name , lang())}}</li>
                            </ol>
                        </div>
                    </div> <!-- end row -->
                </div> <!-- end container -->
            </div>
        </div>
    </section>
    <!-- end page-title -->


    <!-- start shop-section -->
    <section class="shop-section section-padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="shop-area clearfix">
                        <ul class="products">
                            @php
                            $advertises = $resource->advertises()->get();
                            @endphp
                            @foreach($advertises as $key => $val)
                                <li class="product">
                                    <div class="product-holder text-center">
                                        {{--                                    <div class="product-badge discount">-27%</div>--}}
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
    </section>
    <!-- end trendy-product-section -->
@stop
