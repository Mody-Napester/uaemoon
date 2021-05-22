@extends('_layouts.dashboard')

@section('title') {{ trans('advertise.advertises') }} @endsection

@section('head')
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">{{ trans('advertise.advertises') }} ({{ $resources->count() }})</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ trans('advertise.advertises') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('advertise.list') }}</li>
            </ol>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="container-fluid">
                    <h4 class="m-t-0 header-title">{{ trans('advertise.List_Of_advertises') }}</h4>
                </div>

                <table data-page-length='50' id="datatable-users-buttons"
                       class="table table-responsive table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Cover</th>
                        <th>Status</th>
                        <th>Status At</th>
                        <th>Is VIP</th>
{{--                        <th>Not Approved Reason</th>--}}
                        <th>Created By</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($resources as $key => $resource)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ isset($resource->category->name) ? getFromJson($resource->category->name , lang()) : '-' }}</td>
                            <td>{{ lang() == 'ar' ? $resource->title_ar : $resource->title_en }}</td>
                            <td>
                                <div style="width:50px;height: 50px;overflow: hidden">
                                    <img style="width:100%;" src="{{ url($resource->cover) }}" alt="">
                                </div>
                            </td>
                            <td>
                                @if($resource->status == 0)
                                    <span class="badge badge-warning badge-pill">Pending</span>
                                @elseif($resource->status == 1)
                                    <span class="badge badge-success badge-pill">Approved</span>
                                @elseif($resource->status == 2)
                                    <span class="badge badge-danger badge-pill">Not Approved</span>
                                @elseif($resource->status == 3)
                                    <span class="badge badge-dark badge-pill">Expired</span>
                                @endif
                            </td>
                            <td>
                                @if($resource->status == 0)
                                    <span
                                        class="badge badge-warning badge-pill">Created At: {{date('Y-m-d h:i A', strtotime($resource->created_at))}}</span>
                                @elseif($resource->status == 1)
                                    <span
                                        class="badge badge-success badge-pill">Approved At: {{date('Y-m-d h:i A', strtotime($resource->approved_at))}}</span>
                                @elseif($resource->status == 2)
                                    <span
                                        class="badge badge-danger badge-pill">Not Approved At: {{date('Y-m-d h:i A', strtotime($resource->not_approved_at))}}</span>
                                @elseif($resource->status == 3)
                                    <span
                                        class="badge badge-dark badge-pill">Expired At: {{date('Y-m-d h:i A', strtotime($resource->expired_at))}}</span>
                                @endif
                            </td>
                            <td>
                                @if($resource->is_featured == 0)
                                    <span class="badge badge-warning badge-pill">NO</span>
                                @elseif($resource->is_featured == 1)
                                    <span class="badge badge-success badge-pill">YES</span>
                                @endif
                            </td>
{{--                            <td>--}}
{{--                                {{$resource->not_approved_reason}}--}}
{{--                            </td>--}}
                            <td>
                                {{isset($resource->created_by_user->name) ? $resource->created_by_user->name : '-'}}
                            </td>
                            <td>
                                <a href="{{ route('advertise.show' , $resource->uuid) }}"
                                   class="badge badge-sm badge-info mr-2" title="{{trans('advertise.show')}}"><i class="fa fa-eye"></i></a>
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
                        columns: [0, 1, 2, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 4, 5, 6, 7]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 4, 5, 6, 7]
                    }
                }
            ],
        });
        tableDTUsers.buttons().container().appendTo('#datatable-users-buttons_wrapper .col-md-6:eq(0)');

    </script>
@endsection
