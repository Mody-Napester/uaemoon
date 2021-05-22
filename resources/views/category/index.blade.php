@extends('_layouts.dashboard')

@section('title') {{ trans('category.categories') }} @endsection

@section('head')
    <link rel="stylesheet" media="screen" href="{{ url('assets/css/cartzilla.icons.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                @if(check_authority('add.lookups'))
                    <a href="{{ route('category.create') }}" class="btn btn-default waves-effect waves-light"><i
                            class="fa fa-plus"></i> {{ trans('category.add_new') }}</a>
                @endif
            </div>

            <h4 class="page-title">{{ trans('category.categories') }} ({{ $resources->count() }})</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ trans('category.categories') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('category.list') }}</li>
            </ol>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="container-fluid">
                    <h4 class="m-t-0 header-title">{{ trans('category.List_Of_categories') }}</h4>
                </div>

                <table data-page-length='50' id="datatable-users-buttons"
                       class="table table-responsive table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
{{--                        <th>Parent id</th>--}}
                        <th>Slug</th>
{{--                        <th>Parent</th>--}}
                        <th>Name</th>
{{--                        <th>Icon</th>--}}
                        <th>Picture</th>
{{--                        <th>Cover</th>--}}
                        <th>Active</th>
                        <th>In menu</th>
                        <th>Order</th>
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
{{--                            <td>{{ $resource->parent_id }}</td>--}}
                            <td>{{ $resource->slug }}</td>
{{--                            <td>--}}
{{--                                @if($resource->parent_id != 0)--}}
{{--                                    {{ ($parent = \App\Category::getOneBy('id', $resource->parent_id)) ? getFromJson($parent->name , lang()) : '-' }}--}}
{{--                                @else--}}
{{--                                    ---}}
{{--                                @endif--}}
{{--                            </td>--}}
                            <td>{{ getFromJson($resource->name , lang()) }}</td>
{{--                            <td style="text-align: center"><i class="{{ $resource->icon }}"></i></td>--}}
                            <td>
                                <div style="width:50px;height: 50px;overflow: hidden">
                                    <img style="width:100%;"
                                         src="{{ url('public/images/category/picture/'. $resource->picture) }}"
                                         alt="">
                                </div>
                            </td>
{{--                            <td>--}}
{{--                                <div style="width:50px;height: 50px;overflow: hidden">--}}
{{--                                    <img style="width:100%;"--}}
{{--                                         src="{{ url('public/images/category/cover/'. $resource->cover) }}"--}}
{{--                                         alt="">--}}
{{--                                </div>--}}
{{--                            </td>--}}
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
                            <td>{{ $resource->order }}</td>
                            <td>{{ ($cb = $resource->created_by_user)? $cb->name : '-' }}</td>
                            <td>{{ ($ub = $resource->updated_by_user)? $ub->name : '-' }}</td>
                            <td>{{ $resource->created_at }}</td>
                            <td>{{ $resource->updated_at }}</td>
                            <td>
                                <a href="{{ route('category.edit' , [$resource->uuid]) }}"
                                   class="badge badge-sm badge-success mr-2"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('category.destroy' , [$resource->uuid]) }}"
                                   class="badge badge-sm badge-danger confirm-delete"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $resources->links() }}
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
                        columns: [0, 1, 2, 3, 4, 5, 8, 9, 10]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 8, 9, 10]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 8, 9, 10]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 8, 9, 10]
                    }
                }
            ],
        });
        tableDTUsers.buttons().container().appendTo('#datatable-users-buttons_wrapper .col-md-6:eq(0)');

    </script>
@endsection
