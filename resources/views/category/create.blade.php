@extends('_layouts.dashboard')

@section('title') {{ trans('category.categories') }} @endsection

@section('head')
    <link rel="stylesheet" media="screen" href="{{ url('assets/css/cartzilla.icons.css') }}">
    <script src="{{ url('assets/plugins/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">{{ trans('category.add_new_category') }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('category.index') }}">{{ trans('category.categories') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('category.create') }}</li>
            </ol>

        </div>
    </div>

    <!-- Main page content-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-col-form-label"
                                       for="parent_id">{{ trans('category.parent') }}</label>
                                <select class="select2 form-control @if($errors->has('parent_id')) is-invalid @endif"
                                        id="parent_id" name="parent_id">
                                    <option value="0">No Parent</option>
                                    @foreach($parents as $parent)
                                        <option
                                            value="{{ $parent->uuid }}">{{ getFromJson($parent->name , lang()) }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('parent_id'))
                                    <div class="invalid-feedback">{{ $errors->first('parent_id') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-col-form-label" for="is_active">{{ trans('category.is_active') }}</label>
                                <select class="select2 form-control @if ($errors->has('is_active')) is-invalid @endif"
                                        id="is_active" name="is_active">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>

                                @if ($errors->has('is_active'))
                                    <div class="invalid-feedback">{{ $errors->first('is_active') }}</div>
                                @endif
                            </div>
                        </div>

                        @foreach(langs("short_name") as $lang)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="name_{{ $lang }}">{{ trans('category.name') }} ({{ $lang }})</label>
                                    <input class="form-control @if ($errors->has('name_'.$lang)) is-invalid @endif "
                                           id="name_{{ $lang }}"
                                           type="text" name="name_{{ $lang }}" value="{{ old('name_' . $lang) }}">

                                    @if ($errors->has('name_'.$lang))
                                        <div class="invalid-feedback">{{ $errors->first('name_'.$lang) }}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        @foreach(langs("short_name") as $lang)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="details_{{ $lang }}">{{ trans('category.details') }}
                                        ({{ $lang }})</label>
                                    <textarea
                                        class="form-control @if ($errors->has('details_'.$lang)) is-invalid @endif "
                                        id="details_{{ $lang }}" name="details_{{ $lang }}"></textarea>

                                    @if ($errors->has('details_'.$lang))
                                        <div class="invalid-feedback">{{ $errors->first('details_'.$lang) }}</div>
                                    @endif

                                    <script>
                                        CKEDITOR.replace('details_{{ $lang }}');
                                    </script>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-12">
                            <label class="form-col-form-label" for="icon">{{ trans('category.icon') }}</label>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input class="form-control @if ($errors->has('icon')) is-invalid @endif "
                                               id="icon" type="text" name="icon" value="{{ old('icon') }}">

                                        @if ($errors->has('icon'))
                                            <div class="invalid-feedback">{{ $errors->first('icon') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <span class="btn btn-orange btn-block font_icons_btn">{{ trans('category.fonts') }} &nbsp; <i
                                            class="czi-arrow-down"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 font_icons_container" style="display: none;">
                            @include('category._partials.font_icons')
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-col-form-label" for="picture">{{ trans('category.picture') }}</label>
                                <input class="form-control @if ($errors->has('picture')) is-invalid @endif" id="picture"
                                       type="file" name="picture">

                                @if ($errors->has('picture'))
                                    <div class="invalid-feedback">{{ $errors->first('picture') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-col-form-label" for="cover">{{ trans('category.cover') }}</label>
                                <input class="form-control @if ($errors->has('cover')) is-invalid @endif" id="cover"
                                       type="file" name="cover">

                                @if ($errors->has('cover'))
                                    <div class="invalid-feedback">{{ $errors->first('cover') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-save"></i> {{ trans('category.save') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script !src="">
        $(document).ready(function () {
            $('.font_icons_btn').on('click', function () {
                $('.font_icons_container').slideToggle();
            })
        });
    </script>
@endsection
