@extends('front._layouts.main')
@section('content')
    <!-- start page-title -->
    <section class="page-title">
        <div class="page-title-container">
            <div class="page-title-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <h2>{{trans('website.my_profile')}}</h2>
                            <ol class="breadcrumb">
                                <li><a href="{{url('/')}}">{{trans('website.home')}}</a></li>
                                <li>{{trans('website.my_profile')}}</li>
                            </ol>
                        </div>
                    </div> <!-- end row -->
                </div> <!-- end container -->
            </div>
        </div>
    </section>
    <!-- end page-title -->

    <!-- start home-pg-prodcut-section -->
    <section class="home-pg-prodcut-section section-padding">
        <div class="container-1410">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Nav tabs -->
                    <div class="tablinks">
                        <ul>
                            <li class="active">
                                <a href="#tab-1" data-toggle="tab">{{trans('website.my_profile')}}</a>
                            </li>
                            <li>
                                <a href="#tab-2" data-toggle="tab">{{trans('website.my_advertises')}}</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane in active" id="tab-1">
                            <div class="col-md-12" style="padding-top: 50px;">
                                <form action="{{ route('front.user.update_profile') }}" method="post"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="woocommerce-billing-fields">

                                        <h3>{{trans('website.update_profile')}}</h3>

                                        <p class="form-row col-md-6">
                                            <label for="name" class="">{{trans('website.name')}} <abbr
                                                    class="required" title="required">*</abbr></label>
                                            <input required id="name" type="text"
                                                   class="input-text {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                   name="name"
                                                   autocomplete="off" value="{{$user['name']}}"/>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </p>

                                        <p class="form-row col-md-6">
                                            <label for="phone" class="">{{trans('website.phone')}} <abbr
                                                    class="required" title="required">*</abbr></label>
                                            <input required id="phone" type="text"
                                                   class="input-text {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                   name="phone"
                                                   autocomplete="off" value="{{$user['phone']}}"/>
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </p>
                                        <p class="form-row col-md-12">
                                            <button type="submit"
                                                    class="woocommerce-button button woocommerce-form-login__submit">{{trans('website.update')}}
                                            </button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-12" style="padding-top: 100px;">
                                <form action="{{ route('front.user.change_password') }}" method="post"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="woocommerce-billing-fields">

                                        <h3>{{trans('website.change_password')}}</h3>

                                        <p class="form-row col-md-6">
                                            <label for="current_password" class="">{{trans('website.current_password')}}
                                                <abbr
                                                    class="required" title="required">*</abbr></label>
                                            <input required id="current_password" type="password"
                                                   class="input-text {{ $errors->has('current_password') ? ' is-invalid' : '' }}"
                                                   name="current_password"
                                                   autocomplete="off"/>
                                            @if ($errors->has('current_password'))
                                                <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('current_password') }}</strong>
                                            </span>
                                            @endif
                                        </p>
                                        <div class="clearfix"></div>

                                        <p class="form-row col-md-6">
                                            <label for="new_password" class="">{{trans('website.new_password')}} <abbr
                                                    class="required" title="required">*</abbr></label>
                                            <input required id="new_password" type="password"
                                                   class="input-text {{ $errors->has('new_password') ? ' is-invalid' : '' }}"
                                                   name="new_password"
                                                   autocomplete="off"/>
                                            @if ($errors->has('new_password'))
                                                <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('new_password') }}</strong>
                                            </span>
                                            @endif
                                        </p>

                                        <p class="form-row col-md-6">
                                            <label for="new_confirm_password"
                                                   class="">{{trans('website.new_confirm_password')}} <abbr
                                                    class="required" title="required">*</abbr></label>
                                            <input required id="new_confirm_password" type="password"
                                                   class="input-text {{ $errors->has('new_confirm_password') ? ' is-invalid' : '' }}"
                                                   name="new_confirm_password"
                                                   autocomplete="off"/>
                                            @if ($errors->has('new_confirm_password'))
                                                <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('new_confirm_password') }}</strong>
                                            </span>
                                            @endif
                                        </p>
                                        <p class="form-row col-md-12">
                                            <button type="submit"
                                                    class="woocommerce-button button woocommerce-form-login__submit">{{trans('website.update')}}
                                            </button>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade woocommerce-cart" id="tab-2">
                            <div class="col col-xs-12">
                                <div class="woocommerce" style="padding-top: 50px;">
                                    <table class="shop_table shop_table_responsive cart">
                                        <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Cover</th>
                                            <th>Status</th>
                                            <th>Status At</th>
                                            <th>Is VIP</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!$resources->isEmpty())
                                            @foreach($resources as $key => $resource)
                                                <tr class="cart_item">
                                                    <td>{{ isset($resource->category->name) ? getFromJson($resource->category->name , lang()) : '-' }}</td>
                                                    <td>{{ lang() == 'ar' ? $resource->title_ar : $resource->title_en }}</td>
                                                    <td>
                                                        <div style="width:50px;height: 50px;overflow: hidden">
                                                            <img style="width:100%;" src="{{ url($resource->cover) }}"
                                                                 alt="">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if($resource->status == 0)
                                                            <span class="badge" style="background-color: orange;">Pending</span>
                                                        @elseif($resource->status == 1)
                                                            <span class="badge" style="background-color: green;">Approved</span>
                                                        @elseif($resource->status == 2)
                                                            <span class="badge" style="background-color: red;">Not Approved</span>
                                                        @elseif($resource->status == 3)
                                                            <span class="badge"
                                                                  style="background-color: red;">Expired</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($resource->status == 0)
                                                            <span
                                                                class="badge">Created At: {{date('Y-m-d h:i A', strtotime($resource->created_at))}}</span>
                                                        @elseif($resource->status == 1)
                                                            <span
                                                                class="badge">Approved At: {{date('Y-m-d h:i A', strtotime($resource->approved_at))}}</span>
                                                        @elseif($resource->status == 2)
                                                            <span
                                                                class="badge">Not Approved At: {{date('Y-m-d h:i A', strtotime($resource->not_approved_at))}}</span>
                                                        @elseif($resource->status == 3)
                                                            <span
                                                                class="badge">Expired At: {{date('Y-m-d h:i A', strtotime($resource->expired_at))}}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($resource->is_featured == 0)
                                                            <span class="badge"
                                                                  style="background-color: orange;">NO</span>
                                                        @elseif($resource->is_featured == 1)
                                                            <span class="badge"
                                                                  style="background-color: green;">YES</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="10" class="text-center">
                                                    {{trans('website.you_dont_have_advertises_yet')}}
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end tab-content -->
                </div>
            </div>
        </div>
    </section>
    <!-- end home-pg-prodcut-section -->
@stop
