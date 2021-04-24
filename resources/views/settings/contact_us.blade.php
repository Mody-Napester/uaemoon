@extends('_layouts.dashboard')

@section('title')
    {{trans('contact_us.contact_us')}}
@stop

@section('head')
    <script src="{{ url('assets/plugins/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">{{trans('contact_us.contact_us')}}</li>
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
{{--                        <input type="file" name="contact_us_image" class="form-control">--}}
{{--                        <small>Recommended dimension 1170x400</small>--}}
{{--                        <br>--}}
{{--                        @if(!empty($settings['contact_us_image']))--}}
{{--                            <img src="{{asset($settings['contact_us_image'])}}" width="100" height="100">--}}
{{--                        @endif--}}
{{--                    </div>--}}

                    <div class="form-group col-md-12">
                        <label>{{trans('contact_us.description_ar')}}</label>
                        <textarea
                            name="contact_us_ar"
                            class="form-control ckeditor">{{$settings['contact_us_ar']}}</textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label>{{trans('contact_us.description_en')}}</label>
                        <textarea
                            name="contact_us_en"
                            class="form-control ckeditor">{{$settings['contact_us_en']}}</textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label>{{trans('contact_us.google_map')}} [Embed Only]</label>
                        <textarea
                            name="embed_map"
                            class="form-control">{{$settings['embed_map']}}</textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <button class="btn btn-sm btn-info" type="submit">{{trans('settings.save')}}</button>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@stop
