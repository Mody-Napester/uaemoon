@extends('front._layouts.main')

@section('content')
    <!-- start page-title -->
    <section class="page-title">
        <div class="page-title-container">
            <div class="page-title-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <h2>{{trans('website.contact_us')}}</h2>
                            <ol class="breadcrumb">
                                <li><a href="{{url('/')}}">{{trans('website.home')}}</a></li>
                                <li>{{trans('website.contact_us')}}</li>
                            </ol>
                        </div>
                    </div> <!-- end row -->
                </div> <!-- end container -->
            </div>
        </div>
    </section>
    <!-- end page-title -->

    <section class="featured-proeducts-section-s2 section-padding">
        <div class="container-1410">
            <div class="row">
                <div class="col col-xs-12">
                    @if(lang() == 'en')
                        {!! $settings['contact_us_en'] !!}
                    @else
                        {!! $settings['contact_us_ar'] !!}
                    @endif
                </div>
            </div>
        </div>
    </section>
@stop
