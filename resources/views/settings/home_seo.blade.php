@extends('_layouts.dashboard')

@section('title')
    SEO
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('settings.page_seo') }}</li>
            </ol>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {{Form::open(array('files' => true, 'route' => 'updateSettings'))}}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{trans('settings.page_seo_title_ar')}}</label>
                        <input type="text" value="{{$settings['home_seo_title_ar']}}" name="home_seo_title_ar"
                               class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label>{{trans('settings.page_seo_title_en')}}</label>
                        <input type="text" value="{{$settings['home_seo_title_en']}}" name="home_seo_title_en"
                               class="form-control">
                    </div>

                    <div class="form-group col-md-12">
                        <label>{{trans('settings.meta_keywords_ar_with_comma_separated')}}</label>
                        <input type="text" value="{{$settings['home_seo_keywords_ar']}}"
                               name="home_seo_keywords_ar"
                               class="form-control">
                    </div>

                    <div class="form-group col-md-12">
                        <label>{{trans('settings.meta_keywords_en_with_comma_separated')}}</label>
                        <input type="text" value="{{$settings['home_seo_keywords_en']}}"
                               name="home_seo_keywords_en"
                               class="form-control">
                    </div>

                    <div class="form-group col-md-12">
                        <label>{{trans('settings.meta_description_ar')}}</label>
                        <input type="text" value="{{$settings['home_seo_desc_ar']}}" name="home_seo_desc_ar"
                               class="form-control">
                    </div>

                    <div class="form-group col-md-12">
                        <label>{{trans('settings.meta_description_en')}}</label>
                        <input type="text" value="{{$settings['home_seo_desc_en']}}" name="home_seo_desc_en"
                               class="form-control">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <button class="btn btn-sm btn-info" type="submit">{{trans('settings.save')}}</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@stop
