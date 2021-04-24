@extends('_layouts.dashboard')

@section('title')
    {{trans('about_us.about_us')}}
@stop

@section('head')
    <script src="{{ url('assets/plugins/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">{{trans('about_us.about_us')}}</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                {{Form::open(array('files' => true, 'route' => 'updateSettings'))}}
                <div class="row">
{{--                    <div class="form-group col-md-4">--}}
{{--                        <label>Page Image</label>--}}
{{--                        <input type="file" name="about_us_image" class="form-control">--}}
{{--                        <small>Recommended dimension 1170x400</small>--}}
{{--                        <br>--}}
{{--                        @if(!empty($settings['about_us_image']))--}}
{{--                            <img src="{{asset($settings['about_us_image'])}}" width="100" height="100">--}}
{{--                        @endif--}}
{{--                    </div>--}}

                    <div class="form-group col-md-12">
                        <label>{{trans('about_us.description_ar')}}</label>
                        <textarea
                            name="about_us_ar"
                            class="form-control ckeditor">{{$settings['about_us_ar']}}</textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label>{{trans('about_us.description_en')}}</label>
                        <textarea
                            name="about_us_en"
                            class="form-control ckeditor">{{$settings['about_us_en']}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-info" type="submit">{{trans('settings.save')}}</button>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@stop
