@extends('front._layouts.main')
@section('content')
    <!-- start my-account-section -->
    <section class="my-account-section">
        <div class="container-1410">
            <div class="row">
                <div class="col-xs-12">
                    <div class="woocommerce">
                        <div class="woocommerce-notices-wrapper"></div>
                        <div class="u-columns col2-set" id="customer_login">
                            <div class="u-column1 col-1">
                                <h2>{{trans('website.login')}}</h2>
                                <form class="woocommerce-form woocommerce-form-login login" method="post"
                                      action="{{ route('front.user.postLogin') }}">
                                    @csrf
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="email">{{trans('website.email')}}&nbsp;<span
                                                class="required">*</span></label>
                                        <input type="text" value="{{old('email')}}"
                                               class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" id="email" autocomplete="off"/>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="password">{{trans('website.password')}}&nbsp;<span class="required">*</span></label>
                                        <input
                                            class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            type="password" name="password" id="password"
                                            autocomplete="off"/>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="form-row">
                                        <label
                                            class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                            <input class="woocommerce-form__input woocommerce-form__input-checkbox"
                                                   name="rememberme" type="checkbox" id="rememberme" value="forever"/>
                                            <span>&nbsp;{{trans('website.remember_me')}}</span>
                                        </label>
                                        <button type="submit"
                                                class="woocommerce-button button woocommerce-form-login__submit">{{trans('website.login')}}
                                        </button>
                                    </p>
                                </form>
                            </div>
                            <div class="u-column2 col-2">
                                <h2>{{trans('website.register')}}</h2>
                                <form class="woocommerce-form woocommerce-form-register register" method="post"
                                      action="{{ route('front.user.postRegister') }}">
                                    @csrf
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="name">{{trans('website.name')}}&nbsp;<span
                                                class="required">*</span></label>
                                        <input type="text" value="{{old('name')}}"
                                               class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                               name="name" id="name" autocomplete="off"/>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="register_email">{{trans('website.email')}}&nbsp;<span
                                                class="required">*</span></label>
                                        <input type="text" value="{{old('register_email')}}"
                                               class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('register_email') ? ' is-invalid' : '' }}"
                                               name="register_email" id="register_email" autocomplete="off"/>
                                        @if ($errors->has('register_email'))
                                            <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('register_email') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="register_password">{{trans('website.password')}}&nbsp;<span class="required">*</span></label>
                                        <input
                                            class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('register_password') ? ' is-invalid' : '' }}"
                                            type="password" name="register_password" id="register_password"
                                            autocomplete="off"/>
                                        @if ($errors->has('register_password'))
                                            <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('register_password') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="register_password_confirmation">{{trans('website.password_confirmation')}}&nbsp;<span class="required">*</span></label>
                                        <input
                                            class="woocommerce-Input woocommerce-Input--text input-text {{ $errors->has('register_password_confirmation') ? ' is-invalid' : '' }}"
                                            type="password" name="register_password_confirmation" id="register_password_confirmation"
                                            autocomplete="off"/>
                                        @if ($errors->has('register_password_confirmation'))
                                            <span class="invalid-feedback" style="color: red;" role="alert">
                                                <strong>{{ $errors->first('register_password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row form-row">
                                        <button type="submit"
                                                class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit">
                                            {{trans('website.register')}}
                                        </button>
                                    </p>
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
