@extends('_layouts.dashboard')

@section('title') {{ trans('social.socials') }} @endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                @if(check_authority('add.lookups'))
                    <a href="{{ route('social.create') }}" class="btn btn-default waves-effect waves-light"><i
                            class="fa fa-plus"></i> {{ trans('social.add_new') }}</a>
                @endif
            </div>

            <h4 class="page-title">{{ trans('social.socials') }} ({{ $resources->count() }})</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ trans('social.socials') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('social.list') }}</li>
            </ol>

        </div>
    </div>

    <!-- Main page content-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="container-fluid">
                    <h4 class="m-t-0 header-title">{{ trans('page.list_of_pages') }}</h4>
                </div>

                <table data-page-length='50' id="datatable-users-buttons"
                       class="table table-responsive table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Provider</th>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($resources as $resource)
                        <tr>
                            <td>{{ $resource->provider->name }}</td>
                            <td>{{ $resource->name }}</td>
                            <td>{{ $resource->link }}</td>
                            <td>{{ $resource->created_at }}</td>
                            <td>
                                <a href="{{ route('social.edit' , [$resource->id]) }}"
                                   class="badge badge-sm badge-success mr-2"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('social.destroy' , [$resource->id]) }}"
                                   class="badge badge-sm badge-danger confirm-delete"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
