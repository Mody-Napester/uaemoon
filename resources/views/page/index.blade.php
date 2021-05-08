@extends('_layouts.dashboard')

@section('title') {{ trans('page.pages') }} @endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                @if(check_authority('add.lookups'))
                    <a href="{{ route('page.create') }}" class="btn btn-default waves-effect waves-light"><i
                            class="fa fa-plus"></i> {{ trans('page.add_new') }}</a>
                @endif
            </div>

            <h4 class="page-title">{{ trans('page.pages') }} ({{ $resources->count() }})</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ trans('page.pages') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('page.list') }}</li>
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
                        <th>#</th>
                        <th>Slug</th>
                        <th>Name</th>
                        <th>Picture</th>
                        <th>Cover</th>
                        <th>Active</th>
                        <th>In menu</th>
                        <th>In footer</th>
                        <th>Is Privacy</th>
                        <th>Is Terms</th>
                        <th>order</th>
                        <th>Created by</th>
                        <th>Updated by</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($resources as $resource)
                        <tr>
                            <td>{{ $resource->id }}</td>
                            <td>{{ $resource->slug }}</td>
                            <td>{{ getFromJson($resource->name , lang()) }}</td>
                            <td>
                                <div style="width:50px;height: 50px;overflow: hidden">
                                    <img style="width:100%;"
                                         src="{{ url('public/images/page/picture/'. $resource->picture) }}"
                                         alt="">
                                </div>
                            </td>
                            <td>
                                <div style="width:50px;height: 50px;overflow: hidden">
                                    <img style="width:100%;"
                                         src="{{ url('public/images/page/cover/'. $resource->cover) }}" alt="">
                                </div>
                            </td>
                            <td>
                                @if($resource->is_active == 1)
                                    <span class="badge badge-success badge-pill">Yes</span>
                                @else
                                    <span class="badge badge-danger badge-pill">No</span>
                                @endif
                            </td>
                            <td>
                                @if($resource->in_menu == 1)
                                    <span class="badge badge-success badge-pill">Yes</span>
                                @else
                                    <span class="badge badge-danger badge-pill">No</span>
                                @endif
                            </td>
                            <td>
                                @if($resource->in_footer == 1)
                                    <span class="badge badge-success badge-pill">Yes</span>
                                @else
                                    <span class="badge badge-danger badge-pill">No</span>
                                @endif
                            </td>
                            <td>
                                @if($resource->is_privacy_page == 1)
                                    <span class="badge badge-success badge-pill">Yes</span>
                                @else
                                    <span class="badge badge-danger badge-pill">No</span>
                                @endif
                            </td>
                            <td>
                                @if($resource->is_terms_page == 1)
                                    <span class="badge badge-success badge-pill">Yes</span>
                                @else
                                    <span class="badge badge-danger badge-pill">No</span>
                                @endif
                            </td>
                            <td>
                               {{$resource->order}}
                            </td>
                            <td>{{ ($cb = $resource->created_by_user)? $cb->name : '-' }}</td>
                            <td>{{ ($ub = $resource->updated_by_user)? $ub->name : '-' }}</td>
                            <td>{{ $resource->created_at }}</td>
                            <td>{{ $resource->updated_at }}</td>
                            <td>
                                <a href="{{ route('page.edit' , [$resource->uuid]) }}"
                                   class="badge badge-sm badge-success mr-2"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('page.destroy' , [$resource->uuid]) }}"
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

@section('scripts')
    <script>
        var tableDTUsers = $('#datatable-users-buttons').DataTable({
            lengthChange: false,
            ordering: false,
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 5, 6, 7, 8]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 5, 6, 7, 8]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 5, 6, 7, 8]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 5, 6, 7, 8]
                    }
                }
            ],
        });
        tableDTUsers.buttons().container().appendTo('#datatable-users-buttons_wrapper .col-md-6:eq(0)');

    </script>
@endsection
