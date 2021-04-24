@extends('_layouts.dashboard')

@section('title') {{ trans('category.categories') }} @endsection

@section('head')
    <script src="{{ url('assets/plugins/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">{{ trans('page.edit_page') }} "{{ getFromJson($resource->name , lang()) }}"</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('page.index') }}">{{ trans('page.pages') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('page.edit_page') }}
                    "{{ getFromJson($resource->name , lang()) }}"
                </li>
            </ol>

        </div>
    </div>

    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <form action="{{ route('page.update', $resource->uuid) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="is_active">{{ trans('page.is_active') }}</label>
                                    <select class="select2 form-control @if ($errors->has('is_active')) is-invalid @endif"
                                            id="is_active"
                                            name="is_active">
                                        <option @if($resource->is_active == 1) selected @endif value="1">Yes</option>
                                        <option @if($resource->is_active == 0) selected @endif value="0">No</option>
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
                                        <input class="form-control @if ($errors->has('name_'.$lang)) is-invalid @endif "
                                               id="name_{{ $lang }}"
                                               type="text" name="name_{{ $lang }}"
                                               value="{{ getFromJson($resource->name , $lang) }}">

                                        @if ($errors->has('name_'.$lang))
                                            <div class="invalid-feedback">{{ $errors->first('name_'.$lang) }}</div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            @foreach(langs("short_name") as $lang)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label"
                                               for="details_{{ $lang }}">{{ trans('page.details') }}
                                            ({{ $lang }})</label>
                                        <textarea class="form-control @if ($errors->has('details_'.$lang)) is-invalid @endif "
                                            id="details_{{ $lang }}" name="details_{{ $lang }}">{{ getFromJson($resource->details , $lang) }}</textarea>

                                        @if ($errors->has('details_'.$lang))
                                            <div class="invalid-feedback">{{ $errors->first('details_'.$lang) }}</div>
                                        @endif

                                        <script>
                                            CKEDITOR.replace('details_{{ $lang }}');
                                        </script>
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group col-md-4">
                                <label for="in_menu">{{ trans('page.in_menu') }}</label>
                                <br>
                                <input class="checkbox-inline" name="in_menu" id="in_menu"
                                       type="checkbox" autocomplete="off" value="1"
                                    {{$resource->in_menu ? 'checked' : ''}}>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="in_footer">{{ trans('page.in_footer') }}</label>
                                <br>
                                <input class="checkbox-inline" name="in_footer" id="in_footer"
                                       type="checkbox" autocomplete="off" value="1"
                                    {{$resource->in_footer ? 'checked' : ''}}>
                            </div>

                            <div class="form-group col-md-4">
                                <label>{{ trans('page.order') }}</label>
                                <input type="number" value="{{$resource->order}}" name="order" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="picture">{{ trans('page.picture') }}</label>
                                    <input class="form-control @if ($errors->has('picture')) is-invalid @endif" id="picture"
                                           type="file" name="picture">

                                    @if ($errors->has('picture'))
                                        <div class="invalid-feedback">{{ $errors->first('picture') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
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
                        <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-save"></i> {{ trans('category.update') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

