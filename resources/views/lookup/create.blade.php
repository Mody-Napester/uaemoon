@extends('_layouts.dashboard')

@section('title') {{ trans('lookups.Lookup') }} @endsection

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">{{ trans('lookups.Add_New_Lookup') }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ trans('lookups.Lookups') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('lookups.Create') }}</li>
            </ol>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <form action="{{ route('lookup.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-col-form-label" for="parent_id">{{ trans('lookups.Parent') }}</label>
                                <select class="select2 form-control {{ $errors->has('parent_id') ? ' is-invalid' : '' }}" id="parent_id" name="parent_id">
                                    <option value="0">{{ trans('lookups.No_Parent') }}</option>
                                    @foreach($parents as $parent)
                                        <option value="{{ $parent->uuid }}">{{ getFromJson($parent->name , lang()) }}</option>
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
                                    <option value="1">{{ trans('lookups.Yes') }}</option>
                                    <option value="0">{{ trans('lookups.No') }}</option>
                                </select>

                                @if ($errors->has('is_active'))
                                    <div class="invalid-feedback">{{ $errors->first('parent_id') }}</div>
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
                                           placeholder="Enter name_{{ $lang }} .." value="{{ old('name_' . $lang) }}">

                                    @if ($errors->has('name_'.$lang))
                                        <div class="invalid-feedback">{{ $errors->first('parent_id') }}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-save"></i> {{ trans('lookups.Save') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
