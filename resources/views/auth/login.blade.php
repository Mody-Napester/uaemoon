@extends('auth._layout')

@section('page_title') {{ trans('login.Login') }} @endsection

@section('content')

    <div class="wrapper-page">
        <div class="card-box">
            <div class="panel-heading">
{{--                <div class="text-center" style="position: absolute;top: -40%;left: -10%;">--}}
{{--                    <img src="{{asset('public/images/logo.png')}}" width="500" height="400">--}}
{{--                </div>--}}
                <h4 class="text-center">
                    {{ trans('login.Login_to') }} <strong>{{ config('app.name') }}</strong>
                </h4>
            </div>

            <div class="p-20">
                <form class="form-horizontal" method="post" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label class="control-label" for="email">{{ trans('login.Username') }}</label><i class="bar"></i>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"/>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="user-password">{{ trans('login.Password') }}</label><i class="bar"></i>
                        <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required/>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    {{--                    <div class="form-group ">--}}
                    {{--                        <div class="col-12">--}}
                    {{--                            <div class="checkbox checkbox-primary">--}}
                    {{--                                <input name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox">--}}
                    {{--                                <label for="checkbox-signup"> Remember me </label>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <div class="form-group text-center m-t-20">
                        <button class="btn btn-purple btn-block text-uppercase waves-effect waves-light" type="submit">
                            {{ trans('login.login') }}
                        </button>
                    </div>

                    {{--                    <div class="form-group m-t-20 m-b-0">--}}
                    {{--                        <div class="col-12">--}}
                    {{--                            <a href="{{ route('password.request') }}" class="text-dark"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="form-group m-t-40 m-b-0">--}}
                    {{--                        <div class="col-12 text-center">--}}
                    {{--                            <h5 class="font-18"><b>Sign in with</b></h5>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="form-group m-b-0 text-center">--}}
                    {{--                        <div class="col-12">--}}
                    {{--                            <button type="button" class="btn btn-sm btn-facebook waves-effect waves-light m-t-20">--}}
                    {{--                                <i class="fa fa-facebook m-r-5"></i> Facebook--}}
                    {{--                            </button>--}}

                    {{--                            <button type="button" class="btn btn-sm btn-twitter waves-effect waves-light m-t-20">--}}
                    {{--                                <i class="fa fa-twitter m-r-5"></i> Twitter--}}
                    {{--                            </button>--}}

                    {{--                            <button type="button" class="btn btn-sm btn-googleplus waves-effect waves-light m-t-20">--}}
                    {{--                                <i class="fa fa-google-plus m-r-5"></i> Google+--}}
                    {{--                            </button>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p class="">
{{--                    Don't have an account? <a href="{{ route('register') }}" class=" m-l-5"><b>Sign Up</b></a>--}}
                </p>
            </div>
        </div>

    </div>
@endsection
