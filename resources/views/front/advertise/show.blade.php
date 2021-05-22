@extends('front._layouts.main')

@section('content')
    <!-- start page-title -->
    <section class="page-title">
        <div class="page-title-container">
            <div class="page-title-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <h2>{{lang() == 'ar' ? $resource->title_ar : $resource->title_en}}</h2>
                            <ol class="breadcrumb">
                                <li><a href="{{url('/')}}">{{trans('website.home')}}</a></li>
                                <li>{{lang() == 'ar' ? $resource->title_ar : $resource->title_en}}</li>
                            </ol>
                        </div>
                    </div> <!-- end row -->
                </div> <!-- end container -->
            </div>
        </div>
    </section>
    <!-- end page-title -->


    <!-- start shop-single-section -->
    <section class="shop-single-section shop-single-vertical-thumb">
        <div class="container-1410">
            <div class="row">
                <div class="col col-md-12">
                    <div class="product">
                        <h2>{{lang() == 'ar' ? $resource->title_ar : $resource->title_en}}</h2>
                        <div class="thb-product-meta-before">
                            <div class="product_meta">
                                <span class="posted_in">{{trans('website.category')}}: <a
                                        href="{{route('front.category.show', $resource->category->uuid)}}">{{getFromJson($resource->category->name , lang())}}</a></span>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
                @if($resource->images)
                    <div class="col-md-12">
                        <div class="shop-single-slider" style="padding-left: 20%;">
                            @php
                                $images = explode(',', $resource->images);
                            @endphp
                            <div class="slider-for" style="float: left;">
                                @foreach($images as $key => $val)
                                    <div><img style="width: 535px;height: 600px;" src="{{asset($val)}}" alt></div>
                                @endforeach
                            </div>
                            <div class="slider-nav" >
                                @foreach($images as $key => $val)
                                    <div><img style="height: 80px;" src="{{asset($val)}}" alt></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div> <!-- end row -->

            <div class="row">
                <div class="col col-xs-12">
                    <div class="single-product-info">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#01" data-toggle="tab">{{trans('website.details')}}</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="01">
                                {!! lang() == 'ar' ? $resource->details_ar : $resource->details_en !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end of container -->
    </section>
    <!-- end of shop-single-section -->
@stop
