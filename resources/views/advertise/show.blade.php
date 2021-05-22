@extends('_layouts.dashboard')

@section('title') {{ trans('advertise.view') }} @endsection

@section('head')
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(".ask-me").click(function (e) {
                e.preventDefault();
                if (confirm('{{trans('advertise.are_you_sure')}}')) {
                    window.location.replace($(this).attr('href'));
                }
            });
        });
    </script>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">{{ trans('advertise.view') }}: {{$resource->title_ar}}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('advertise.list') }}">{{ trans('advertise.advertises') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('advertise.view') }}: {{$resource->title_ar}}</li>
            </ol>

        </div>
    </div>

    <!-- Main page content-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-col-form-label"
                                   for="is_active">{{ trans('advertise.is_vip') }}</label>
                            <div>{!! $resource->is_featured == 1 ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-warning">No</span>' !!}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-col-form-label"
                                   for="is_active">{{ trans('advertise.title') }}</label>
                            <div>{{$resource->title_ar}}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-col-form-label"
                                   for="is_active">{{ trans('advertise.details') }}</label>
                            <div>{!! $resource->details_ar !!}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-col-form-label"
                                   for="is_active">{{ trans('advertise.cover') }}</label>
                            <div>
                                <div style="width:275px;height: 340px;overflow: hidden">
                                    <img style="width:100%;" src="{{ url($resource->cover) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        @if($resource->images)
                            @php
                                $images = explode(',', $resource->images);
                            @endphp
                            <label class="form-col-form-label" for="is_active">{{trans('advertise.images')}}</label>
                            <br>
                            @foreach($images as $key => $val)
                                <div class="col-md-4" style="float: left; padding-bottom: 5px;">
                                    <img style="width:275px;height: 340px;" src="{{ url($val) }}"
                                         alt="">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-12 form-group">
                        <a href="{{ route('advertise.list') }}" class="btn btn-info"><i
                                class="fa fa-fw fa-backward"></i> {{ trans('advertise.back') }}</a>
                        @if($resource->status == 0)
                            <a href="{{ route('advertise.approved' , $resource->uuid) }}" class="ask-me btn btn-success"><i
                                    class="fa fa-fw fa-save"></i> {{ trans('advertise.approved') }}</a>
                            <a href="{{ route('advertise.not_approved' , $resource->uuid) }}" class="ask-me btn btn-danger"><i
                                    class="fa fa-fw fa-times"></i> {{ trans('advertise.not_approved') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
