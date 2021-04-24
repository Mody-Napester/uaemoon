@extends('_layouts.dashboard')

@section('title')
    - {{$resources['image'] ? 'Edit' : 'Add'}}  {{trans('slider.slider')}}
@stop

@section('head')
@stop

@section('scripts')
    <script type="text/javascript">
        $(function () {

        });
    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">{{$resources['image'] ? trans('slider.edit') : trans('slider.add')}} {{trans('slider.slider')}}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('listSlider') }}">{{ trans('slider.slider') }}</a></li>
                <li class="breadcrumb-item active">{{ $resources['image'] ? trans('slider.edit') : trans('slider.add') }}</li>
            </ol>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                {{Form::open(array('files' => true))}}

                <div class="form-group col-md-6">
                    <label>{{trans('slider.image')}}</label>
                    <input required class="form-control  @if ($errors->has('image')) is-invalid @endif" type="file" name="image">
                    <small>Recommended dimension 1920x800</small>
                    @if ($errors->has('image'))
                        <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                    @endif
                    <br>
                    @if(!empty($resources['image']))
                        <img src="{{asset('public/images/slider/' . $resources['image'])}}" width="300" height="100">
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label>{{trans('slider.order')}}</label>
                    <input required class="form-control @if ($errors->has('order')) is-invalid @endif" type="number" name="order" value="1">
                    @if ($errors->has('order'))
                        <div class="invalid-feedback">{{ $errors->first('order') }}</div>
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <button class="btn btn-sm btn-info" type="submit">{{trans('slider.save')}}</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@stop
