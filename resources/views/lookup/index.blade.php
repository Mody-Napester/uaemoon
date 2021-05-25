@extends('_layouts.dashboard')

@section('title') {{ trans('lookups.Lookup') }} @endsection

@section('content')

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                @if(check_authority('create.lookups'))
                    <a href="{{ route('lookup.create') }}" class="btn btn-default waves-effect waves-light"><i class="fa fa-plus"></i> {{ trans('lookups.Add_new') }}</a>
                @endif
            </div>

            <h4 class="page-title">{{ trans('lookups.Lookups') }} ({{ $resources->count() }})</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ trans('lookups.Lookups') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('lookups.Index') }}</li>
            </ol>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="container-fluid">
                    <h4 class="m-t-0 header-title">{{ trans('lookups.List_Of_Lookups') }}</h4>
                    <p class="text-muted font-14">
                        {{ trans('lookups.Parents') }} ({{ $resources->where('parent_id', 0)->count() }}), Childes ({{ $resources->where('parent_id', '<>', 0)->count() }})
                    </p>
                </div>

                <table data-page-length='50' id="datatable-users-buttons" class="table table-responsive table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('lookups.Parent') }}</th>
                        <th>{{ trans('lookups.Key') }}</th>
                        <th>{{ trans('lookups.Parent') }}</th>
                        <th>{{ trans('lookups.Name') }}</th>
                        <th>{{ trans('lookups.Active') }}</th>
                        <th>{{ trans('lookups.Created_by') }}</th>
                        <th>{{ trans('lookups.Updated_by') }}</th>
                        <th>{{ trans('lookups.Created_at') }}</th>
                        <th>{{ trans('lookups.Updated_at') }}</th>
                        <th>{{ trans('lookups.Actions') }}</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($resources as $resource)
                        <tr style="@if($resource->parent_id == 0) background-color:#eeeeee; @endif">
                            <td>{{ $resource->id }}</td>
                            <td>{{ $resource->parent_id }}</td>
                            <td>{{ $resource->key }}</td>
                            <td>
                                @if($resource->parent_id != 0)
                                    {{ getFromJson(\App\Lookup::getOneBy('id', $resource->parent_id)->name , lang()) }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ getFromJson($resource->name , lang()) }}</td>
                            <td>
                                @if($resource->is_active == 1)
                                    <span class="badge badge-success badge-pill">{{ trans('lookups.Yes') }}</span>
                                @else
                                    <span class="badge badge-danger badge-pill">{{ trans('lookups.No') }}</span>
                                @endif
                            </td>
                            <td>{{ ($cb = $resource->created_by_user)? $cb->name : '-' }}</td>
                            <td>{{ ($ub = $resource->updated_by_user)? $ub->name : '-' }}</td>
                            <td>{{ $resource->created_at }}</td>
                            <td>{{ $resource->updated_at }}</td>
                            <td>
{{--                                <a href="{{ route('lookup.edit' , [$resource->uuid]) }}" class="badge badge-sm badge-success mr-2"><i class="fa fa-edit"></i></a>--}}
{{--                                <a href="{{ route('lookup.destroy' , [$resource->uuid]) }}" class="badge badge-sm badge-danger confirm-delete"><i class="fa fa-times"></i></a>--}}
                            </td>
                        </tr>
                        @foreach($resource->child as $child)
                            <tr>
                                <td>{{ $child->id }}</td>
                                <td>{{ $child->parent_id }}</td>
                                <td>{{ $child->key }}</td>
                                <td>
                                    @if($child->parent_id != 0)
                                        {{ getFromJson(\App\Lookup::getOneBy('id', $child->parent_id)->name , lang()) }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>{{ getFromJson($child->name , lang()) }}</td>
                                <td>
                                    @if($child->is_active == 1)
                                        <span class="badge badge-success badge-pill">{{ trans('lookups.Yes') }}</span>
                                    @else
                                        <span class="badge badge-danger badge-pill">{{ trans('lookups.No') }}</span>
                                    @endif
                                </td>
                                <td>{{ ($cb = $child->created_by_user)? $cb->name : '-' }}</td>
                                <td>{{ ($ub = $child->updated_by_user)? $ub->name : '-' }}</td>
                                <td>{{ $child->created_at }}</td>
                                <td>{{ $child->updated_at }}</td>
                                <td>
{{--                                    @if(check_authority('edit.lookups'))--}}
{{--                                        <a href="{{ route('lookup.edit' , [$child->uuid]) }}" class="badge badge-sm badge-success mr-2"><i class="fa fa-edit"></i></a>--}}
{{--                                    @endif--}}
{{--                                    @if(check_authority('delete.lookups'))--}}
{{--                                        <a href="{{ route('lookup.destroy' , [$child->uuid]) }}" class="badge badge-sm badge-danger confirm-delete"><i class="fa fa-times"></i></a>--}}
{{--                                    @endif--}}
                                </td>
                            </tr>
                        @endforeach
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
            "ordering": false,
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                }
            ],
        });
        tableDTUsers.buttons().container().appendTo('#datatable-users-buttons_wrapper .col-md-6:eq(0)');

    </script>
@endsection
