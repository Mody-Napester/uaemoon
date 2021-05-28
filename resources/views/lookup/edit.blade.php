@extends('_layouts.dashboard')

@section('title') {{ trans('lookups.Lookup') }} @endsection

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">{{ trans('lookups.Edit_Lookup') }} "{{ getFromJson($resource->name , lang()) }}"</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ trans('lookups.Lookups') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('lookups.Edit_Lookup') }} "{{ getFromJson($resource->name , lang()) }}"</li>
            </ol>

        </div>
    </div>

    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <form action="{{ route('lookup.update', $resource->uuid) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="parent_id">{{ trans('lookups.Parent') }}</label>
                                    <select class="select2 form-control {{ $errors->has('parent_id') ? ' is-invalid' : '' }}" id="parent_id" name="parent_id">
                                        <option @if($resource->parent_id == 0) selected @endif value="0">{{ trans('lookups.No_Parent') }}</option>
                                        @foreach($parents as $parent)
                                            <option @if($resource->parent_id == $parent->id) selected @endif value="{{ $parent->uuid }}">{{ getFromJson($parent->name , lang()) }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('parent_id'))
                                        <div class="invalid-feedback">{{ $errors->first('parent_id') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="is_active">{{ trans('lookups.Is_Active') }}</label>
                                    <select class="select2 form-control {{ $errors->has('is_active') ? ' is-invalid' : '' }}" id="is_active" name="is_active">
                                        <option @if($resource->is_active == 1) selected @endif value="1">{{ trans('lookups.Yes') }}</option>
                                        <option @if($resource->is_active == 0) selected @endif value="0">{{ trans('lookups.No') }}</option>
                                    </select>

                                    @if ($errors->has('is_active'))
                                        <div class="invalid-feedback">{{ $errors->first('is_active') }}</div>
                                    @endif
                                </div>
                            </div>

                            @foreach(langs("short_name") as $lang)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="name_{{ $lang }}">{{ trans('lookups.Name') }} ({{ $lang }})</label>
                                        <input class="form-control {{ $errors->has('name_'.$lang) ? ' is-invalid' : '' }}"
                                               id="name_{{ $lang }}"
                                               type="text" name="name_{{ $lang }}"
                                               placeholder="{{ trans('lookups.Enter_name') }} {{ $lang }} .." value="{{ getFromJson($resource->name , $lang) }}">

                                        @if ($errors->has('name_'.$lang))
                                            <div class="invalid-feedback">{{ $errors->first('name_'.$lang) }}</div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-save"></i> {{ trans('lookups.Update') }}</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
