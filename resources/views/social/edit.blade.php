@extends('_layouts.dashboard')

@section('title') {{ trans('social.socials') }} @endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">{{ trans('social.edit_social') }} "{{ $resource->name }}"</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('social.index') }}">{{ trans('social.socials') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('social.edit_social') }}
                    "{{ $resource->name }}"
                </li>
            </ol>

        </div>
    </div>
    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="row">
            <div class="col-md-12">

                <div class="card-box">
                    <form action="{{ route('category.update', $resource->uuid) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="provider_id">{{ trans('social.provider') }}</label>
                                    <select class="form-control @if($errors->has('provider_id')) is-invalid @endif"
                                            id="provider_id" name="provider_id">
                                        @foreach($providers as $provider)
                                            <option @if($resource->provider_id == $provider->id) selected
                                                    @endif value="{{ $provider->id }}">{{ $provider->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('provider_id'))
                                        <div class="invalid-feedback">{{ $errors->first('provider_id') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="name">{{ trans('social.name') }}</label>
                                    <input class="form-control @if($errors->has('name')) is-invalid @endif"
                                           id="name" type="text" name="name" value="{{ $resource->name }}">

                                    @if ($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-col-form-label" for="link">{{ trans('social.link') }}</label>
                                    <input class="form-control @if($errors->has('link')) is-invalid @endif"
                                           id="link" type="text" name="link" value="{{ $resource->link }}">

                                    @if ($errors->has('link'))
                                        <div class="invalid-feedback">{{ $errors->first('link') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit"><i
                                class="fa fa-fw fa-save"></i> {{ trans('social.update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
