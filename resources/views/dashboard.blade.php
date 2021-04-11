@extends('_layouts.dashboard')

@section('title') {{ trans('dashboard.Dashboard') }} @endsection

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">{{ trans('dashboard.Dashboard') }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('dashboard.Dashboard') }}</li>
            </ol>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xl-4">
            <div class="card-box">
                <div class="bar-widget">
                    <div class="table-box">
                        <div class="table-detail">
                            <div class="iconbox bg-info">
                                <i class="icon-user-unfollow"></i>
                            </div>
                        </div>

                        <div class="table-detail">
                            <h4 class="m-t-0 m-b-5"><b>{{ \App\PermissionGroup::count() }}</b></h4>
                            <h5 class="text-muted m-b-0 m-t-0">{{ trans('dashboard.User_Actions') }}</h5>
                        </div>
                        <div class="table-detail text-right">
                            <span data-plugin="peity-pie" data-colors="#5fbeaa,#ebeff2" data-width="50" data-height="45">1/5</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-4">
            <div class="card-box">
                <div class="bar-widget">
                    <div class="table-box">
                        <div class="table-detail">
                            <div class="iconbox bg-info">
                                <i class="icon-user-following"></i>
                            </div>
                        </div>

                        <div class="table-detail">
                            <h4 class="m-t-0 m-b-5"><b>{{ \App\Permission::count() }}</b></h4>
                            <h5 class="text-muted m-b-0 m-t-0">{{ trans('dashboard.Data_Entry_Screens') }}</h5>
                        </div>
                        <div class="table-detail text-right">
                            <span data-plugin="peity-pie" data-colors="#5fbeaa,#ebeff2" data-width="50" data-height="45">1/5</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-4">
            <div class="card-box">
                <div class="bar-widget">
                    <div class="table-box">
                        <div class="table-detail">
                            <div class="iconbox bg-info">
                                <i class="icon-user-follow"></i>
                            </div>
                        </div>

                        <div class="table-detail">
                            <h4 class="m-t-0 m-b-5"><b>{{ \App\Role::count() }}</b></h4>
                            <h5 class="text-muted m-b-0 m-t-0">{{ trans('dashboard.Users_Groups') }}</h5>
                        </div>
                        <div class="table-detail text-right">
                            <span data-plugin="peity-pie" data-colors="#5fbeaa,#ebeff2" data-width="50" data-height="45">1/5</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-4">
            <div class="card-box">
                <div class="bar-widget">
                    <div class="table-box">
                        <div class="table-detail">
                            <div class="iconbox bg-info">
                                <i class="icon-user"></i>
                            </div>
                        </div>

                        <div class="table-detail">
                            <h4 class="m-t-0 m-b-5"><b>{{ \App\User::count() }}</b></h4>
                            <h5 class="text-muted m-b-0 m-t-0">{{ trans('dashboard.Users') }}</h5>
                        </div>
                        <div class="table-detail text-right">
                            <span data-plugin="peity-pie" data-colors="#5fbeaa,#ebeff2" data-width="50" data-height="45">1/5</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-4">
            <div class="card-box">
                <div class="bar-widget">
                    <div class="table-box">
                        <div class="table-detail">
                            <div class="iconbox bg-custom">
                                <i class="icon-user"></i>
                            </div>
                        </div>

                        <div class="table-detail">
                            <h4 class="m-t-0 m-b-5"><b>{{ \App\User::count() }}</b></h4>
                            <h5 class="text-muted m-b-0 m-t-0">{{ trans('dashboard.users') }}</h5>
                        </div>
                        <div class="table-detail text-right">
                            <span data-plugin="peity-pie" data-colors="#5fbeaa,#ebeff2" data-width="50" data-height="45">1/5</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-4">
            <div class="card-box">
                <div class="bar-widget">
                    <div class="table-box">
                        <div class="table-detail">
                            <div class="iconbox bg-danger">
                                <i class="icon-layers"></i>
                            </div>
                        </div>

                        <div class="table-detail">
                            <h4 class="m-t-0 m-b-5"><b>{{ \App\User::count() }}</b></h4>
                            <h5 class="text-muted m-b-0 m-t-0">{{ trans('dashboard.users') }}</h5>
                        </div>
                        <div class="table-detail text-right">
                            <span data-plugin="peity-pie" data-colors="#5fbeaa,#ebeff2" data-width="50" data-height="45">1/5</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
