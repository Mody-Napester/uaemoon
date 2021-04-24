@extends('_layouts.dashboard')

@section('title') {{ trans('slider.slider') }} @endsection


@section('scripts')
    <script>
        $(function () {

            $(".ask-me").click(function (e) {
                e.preventDefault();
                if (confirm('Are You Sure?')) {
                    window.location.replace($(this).attr('href'));
                }
            });
            $(".editImageOrder").change(function (e) {
                var ref_id = $(this).attr('ref_id')
                var order = $(this).val()
                if (ref_id) {
                    $.ajax({
                        url: '{{route('updatedSliderOrder')}}',
                        method: 'POST',
                        data: {
                            ref_id: ref_id,
                            order: order
                        },
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        },
                        success: function (data) {
                            if (data) {
                                addAlert('success', 'Updated Successfully, Order #' + order, 0);
                            }
                        }
                    });
                }
            });
        })
    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="btn-group pull-right m-t-15">
                @if(check_authority('create.slider'))
                    <a href="{{ route('addSlider') }}" class="btn btn-default waves-effect waves-light"><i
                            class="fa fa-plus"></i> {{ trans('slider.add_new') }}</a>
                @endif
            </div>

            <h4 class="page-title">{{ trans('slider.slider') }} ({{ $resources->count() }})</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="#">{{ trans('slider.slider') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('slider.list') }}</li>
            </ol>

        </div>
    </div>
    <!-- Main page content-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="container-fluid">
                    <h4 class="m-t-0 header-title">{{ trans('slider.list_of_pages') }}</h4>
                </div>
                <table data-page-length='50' class="table table-responsive table-bordered table-sm" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ trans('slider.image') }}</th>
                        <th>{{ trans('slider.order') }}</th>
                        <th>{{ trans('slider.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($resources as $val)
                        <tr>
                            <td>{{$val['id']}}</td>
                            <td><img src="{{asset('public/images/slider/' . $val['image'])}}" height="100" width="300"></td>
                            <td>
                                <input autocomplete="off" type="number" style="width: 50px;" class="editImageOrder"
                                       value="{{$val['order']}}" ref_id="{{$val['uuid']}}">
                            </td>
                            <td>
                                @if(check_authority('edit.slider'))
                                    <a href="{{ route('editSlider' , [$val->uuid]) }}"
                                       class="badge badge-sm badge-success mr-2"><i class="fa fa-edit"></i></a>
                                @endif
                                @if(check_authority('delete.slider'))
                                    <a href="{{ route('deleteSlider' , [$val->uuid]) }}"
                                       class="badge badge-sm badge-danger ask-me"><i class="fa fa-times"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
