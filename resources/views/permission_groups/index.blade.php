@extends('_layouts.dashboard')

@section('title') {{ trans('user_actions.User_Actions') }} @endsection

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">

            <h4 class="page-title">{{ trans('user_actions.User_Actions') }}</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ trans('user_actions.User_Actions') }}</a></li>
                <li class="breadcrumb-item active">Index</li>
            </ol>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title">All {{ trans('user_actions.User_Actions') }}</h4>
                <p class="text-muted font-14 m-b-30">
                    Here you will find all the resources to make actions on them.
                </p>

                <table id="datatable" class="table table-striped table-responsive table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created by</th>
                        <th>Updated by</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Control</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($resources as $resource)
                        <tr>
                            <td>{{ $resource->id }}</td>
                            <td>{{ $resource->name }}</td>
                            <td>{{ $resource->createdBy->name }}</td>
                            <td>{{ $resource->updatedBy->name }}</td>
                            <td>{{ $resource->created_at }}</td>
                            <td>{{ $resource->updated_at }}</td>
                            <td>
{{--                                <a href="{{ route('permission-groups.edit', [$resource->uuid]) }}" class="update-modal btn btn-sm btn-success">--}}
{{--                                    <i class="fa fa-edit"></i>--}}
{{--                                </a>--}}
{{--                                <a href="{{ route('permission-groups.destroy', [$resource->uuid]) }}" class="confirm-delete btn btn-sm btn-danger">--}}
{{--                                    <i class="fa fa-times"></i>--}}
{{--                                </a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <!-- Create new -->
                <h4 class="m-t-0 header-title">Create new {{ trans('user_actions.User_Actions') }}</h4>
                <p class="text-muted font-14 m-b-30">
                    Create new resource from here.
                </p>

                @include('permission_groups.create')
            </div>
        </div>
        <!-- end card-box -->
        </div>
    <!-- end row -->

@endsection
