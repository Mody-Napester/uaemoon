@extends('front._layouts.main')

@section('header')
    <script src="{{ url('assets/plugins/ckeditor/ckeditor.js') }}"></script>
@stop

@section('content')

    <!-- start page-title -->
    <section class="page-title">
        <div class="page-title-container">
            <div class="page-title-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <h2>{{trans('website.add_new_advertise')}}</h2>
                            <ol class="breadcrumb">
                                <li><a href="{{url('/')}}">{{trans('website.home')}}</a></li>
                                <li>{{trans('website.add_new_advertise')}}</li>
                            </ol>
                        </div>
                    </div> <!-- end row -->
                </div> <!-- end container -->
            </div>
        </div>
    </section>
    <!-- end page-title -->

    <!-- start my-account-section -->
    <section class="my-account-section" style="padding-bottom: 50px;">
        <div class="container-1410">
            <div class="row">
                <div class="col-xs-12">
                    <div class="woocommerce">
                        <div class="col2-set" id="customer_details">
                            <div class="col-md-12">
                                <form action="{{ route('front.advertise.create') }}" method="post"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="woocommerce-billing-fields">

                                        <h3>{{trans('website.advertise_details')}}</h3>

                                        <p class="form-row col-md-6">
                                            <label for="title" class="">{{trans('website.category')}} <abbr
                                                    class="required" title="required">*</abbr></label>
                                            <select id="title" required autocomplete="off"
                                                    class="custom-select form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                                    name="category_id">
                                                <option value="">{{trans('website.choose')}}</option>
                                                @foreach($categories as $key => $val)
                                                    <option @if(old('category_id') == $val->uuid) selected
                                                            @endif value="{{$val->uuid}}">{{ getFromJson($val->name , lang()) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                            @endif
                                        </p>

                                        <p class="form-row col-md-6">
                                            <label for="title" class="">{{trans('website.adv_title')}} <abbr
                                                    class="required" title="required">*</abbr></label>
                                            <input required id="title" type="text"
                                                   class="input-text {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                   name="title"
                                                   autocomplete="off" value="{{old('title')}}"/>
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                            @endif
                                        </p>

                                        <div class="clearfix"></div>

                                        <p class="form-row col-md-6">
                                            <label for="cover" class="">{{trans('website.adv_cover')}} <small
                                                    style="color: grey;">(275 x 340) jpeg,jpg,png,gif</small> <abbr
                                                    class="required" title="required">*</abbr>
                                            </label>
                                            <input required id="cover" type="file"
                                                   class="input-text {{ $errors->has('cover') ? ' is-invalid' : '' }}"
                                                   name="cover"
                                                   autocomplete="off" accept="image/*"/>
                                            @if ($errors->has('cover'))
                                                <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('cover') }}</strong>
                                            </span>
                                            @endif
                                        </p>

                                        <p class="form-row col-md-6">
                                            <label for="images" class="">{{trans('website.adv_images')}} <small
                                                    style="color: grey;">(535 x 600) jpeg,jpg,png,gif</small> <abbr
                                                    class="required" title="required">*</abbr></label>
                                            <input required id="images" type="file"
                                                   class="input-text {{ $errors->has('images') ? ' is-invalid' : '' }}"
                                                   name="images[]"
                                                   autocomplete="off" accept="image/*" multiple/>
                                            @if ($errors->has('images'))
                                                <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('images') }}</strong>
                                            </span>
                                            @endif
                                        </p>

                                        <p class="form-row col-md-12">
                                            <label for="details" class="">{{trans('website.adv_details')}} <abbr
                                                    class="required" title="required">*</abbr></label>
                                            <textarea required
                                                      class="input-text {{ $errors->has('details') ? ' is-invalid' : '' }}"
                                                      name="details"
                                                      id="details" placeholder=""
                                                      autocomplete="family-name">{{old('details')}}</textarea>
                                            @if ($errors->has('details'))
                                                <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('details') }}</strong>
                                            </span>
                                            @endif
                                            <script>
                                                CKEDITOR.replace('details');
                                            </script>
                                        </p>

                                        <p class="form-row col-md-6">
                                            <label for="adv_type" class="">{{trans('website.adv_type')}} <abbr
                                                    class="required" title="required">*</abbr></label>
                                            <select id="adv_type" required autocomplete="off"
                                                    class="custom-select form-control {{ $errors->has('adv_type') ? ' is-invalid' : '' }}"
                                                    name="adv_type">
                                                <option @if(old('adv_type') == 1) selected
                                                        @endif value="1">{{trans('website.normal_advertise')}}</option>
                                                <option @if(old('adv_type') == 2) selected
                                                        @endif value="2">{{trans('website.featured_advertise')}}</option>
                                                <option @if(old('adv_type') == 3) selected
                                                        @endif value="3">{{trans('website.vip_advertise')}}</option>
                                            </select>
                                            @if ($errors->has('adv_type'))
                                                <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('adv_type') }}</strong>
                                            </span>
                                            @endif
                                        </p>

                                        <p class="form-row col-md-6">
                                            <label for="title" class="">{{trans('website.youtube_url')}}</label>
                                            <input id="youtube_url" type="url" style="width: 100%"
                                                   class="input-text {{ $errors->has('youtube_url') ? ' is-invalid' : '' }}"
                                                   name="youtube_url"
                                                   autocomplete="off" value="{{old('youtube_url')}}"/>
                                            @if ($errors->has('youtube_url'))
                                                <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('youtube_url') }}</strong>
                                            </span>
                                            @endif
                                        </p>

                                        <p class="form-row col-md-12">
                                            <button type="submit"
                                                    class="woocommerce-button button woocommerce-form-login__submit">{{trans('website.save')}}
                                            </button>
                                        </p>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end my-account-section -->
@stop
