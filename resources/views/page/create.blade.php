@extends('_layouts.dashboard')

@section('title') {{ trans('page.pages') }} @endsection

@section('head')
    <script src="{{ url('assets/plugins/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">{{ trans('page.add_new_page') }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('page.index') }}">{{ trans('page.pages') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('page.create') }}</li>
            </ol>

        </div>
    </div>

    <!-- Main page content-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <form action="{{ route('page.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-col-form-label" for="is_active">{{ trans('page.is_active') }}</label>
                                <select class="select2 form-control @if ($errors->has('is_active')) is-invalid @endif"
                                        id="is_active"
                                        name="is_active">
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
                                    <label class="form-col-form-label" for="name_{{ $lang }}">{{ trans('page.name') }}
                                        ({{ $lang }})</label>
                                    <input required class="form-control @if ($errors->has('name_'.$lang)) is-invalid @endif "
                                           id="name_{{ $lang }}"
                                           type="text" name="name_{{ $lang }}"
                                           value="{{ old('name_' . $lang) }}">

                                    @if ($errors->has('name_'.$lang))
                                        <div class="invalid-feedback">{{ $errors->first('name_'.$lang) }}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        @foreach(langs("short_name") as $lang)
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-col-form-label"
                                           for="details_{{ $lang }}">{{ trans('page.details') }}
                                        ({{ $lang }})</label>
                                    <textarea
                                        class="form-control @if ($errors->has('details_'.$lang)) is-invalid @endif "
                                        id="details_{{ $lang }}" name="details_{{ $lang }}">{{old('details_' . $lang)}}</textarea>

                                    @if ($errors->has('details_'.$lang))
                                        <div class="invalid-feedback">{{ $errors->first('details_'.$lang) }}</div>
                                    @endif

                                    <script>
                                        CKEDITOR.replace('details_{{ $lang }}');
                                    </script>
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group col-md-3">
                            <label for="in_menu">{{ trans('page.in_menu') }}</label>
                            <br>
                            <input class="checkbox-inline" name="in_menu" id="in_menu"
                                   type="checkbox" autocomplete="off" value="1"
                                {{old('in_menu') ? 'checked' : ''}}>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="in_footer">{{ trans('page.in_footer') }}</label>
                            <br>
                            <input class="checkbox-inline" name="in_footer" id="in_footer"
                                   type="checkbox" autocomplete="off" value="1"
                                {{old('in_footer') ? 'checked' : ''}}>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="is_privacy_page">{{ trans('page.is_privacy_page') }}</label>
                            <br>
                            <input class="checkbox-inline" name="is_privacy_page" id="is_privacy_page"
                                   type="checkbox" autocomplete="off" value="1"
                                {{old('is_privacy_page') ? 'checked' : ''}}>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="is_terms_page">{{ trans('page.is_terms_page') }}</label>
                            <br>
                            <input class="checkbox-inline" name="is_terms_page" id="is_terms_page"
                                   type="checkbox" autocomplete="off" value="1"
                                {{old('is_terms_page') ? 'checked' : ''}}>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ trans('page.order') }}</label>
                            <input required type="number" value="{{old('order')}}" name="order" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-col-form-label" for="picture">{{ trans('page.picture') }}</label>
                                <input class="form-control @if ($errors->has('picture')) is-invalid @endif" id="picture"
                                       type="file" name="picture">

                                @if ($errors->has('picture'))
                                    <div class="invalid-feedback">{{ $errors->first('picture') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-col-form-label" for="cover">{{ trans('page.cover') }}</label>
                                <input class="form-control @if ($errors->has('cover')) is-invalid @endif" id="cover"
                                       type="file" name="cover">

                                @if ($errors->has('cover'))
                                    <div class="invalid-feedback">{{ $errors->first('cover') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit"><i
                            class="fa fa-fw fa-save"></i> {{ trans('page.save') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
