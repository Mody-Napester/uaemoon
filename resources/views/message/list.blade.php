@extends('layout/main')

@section('title')
    - Messages
@stop

@section('header')
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
@stop

@section('footer')
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script>
        $('#example1').DataTable({
            "paging": false,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true
        });
        $(function () {
            $(".ask-me").click(function (e) {
                e.preventDefault();
                if (confirm('Are You Sure?')) {
                    window.location.replace($(this).attr('href'));
                }
            });
        })
    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!--Top header start-->
            <h3 class="ls-top-header">Messages</h3>
            <!--Top header end -->

            <!--Top breadcrumb start -->
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                <li class="active">Messages</li>
            </ol>
            <!--Top breadcrumb start -->
        </div>
    </div>
    <!-- Main Content Element  Start-->
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Search</h3>
                    <ul class="panel-control">
                        <li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    {{Form::open(array('role'=>"form", 'method' => 'GET'))}}
                    <div class="form-group col-md-3">
                        <label>Un Read Only</label>
                        <br>
                        <input class="checkbox-inline" name="un_seen"
                               type="checkbox" autocomplete="off" @if(Input::has('un_seen')) checked @endif>
                    </div>
                    <div class="form-group col-md-12">
                        <button class="btn btn-sm btn-info" type="submit">Search</button>
                        <a class="btn btn-sm btn-default" href="{{route('listMessage')}}">Clear</a>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        &nbsp;
                    </h3>
                    <ul class="panel-control">
                        <li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <!--Table Wrapper Start-->
                    <div class="table-responsive ls-table">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th style="width: 15px">#</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Page</th>
                                <th>Message</th>
                                <th>Read?</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($message as $val)
                                <tr>
                                    <td>{{$val['id']}}</td>
                                    <td>{{$val['name']}}</td>
                                    <td>{{$val['company_name']}}</td>
                                    <td>{{$val['phone']}}</td>
                                    <td>{{$val['email']}}</td>
                                    <td>{{$val['from_page']}}</td>
                                    <td>
                                        <?php $text = Functions::getWords($val['message'], 3); ?>
                                        <div @if($text['haveMore']) data-toggle="tooltip" data-html="true" title="{{$val['message']}}" @endif>
                                            {{$text['text']}}
                                        </div>
                                    </td>
                                    <td>{{$val['seen'] ? 'Yes' : 'No'}}</td>
                                    <td>
                                        @if($c_user->user_type_id == 1 && $val['seen'] == 0)
                                            <a class="btn btn-xs btn-info"
                                               data-toggle="tooltip" title="Read It"
                                               href="{{route('statusMessage', $val['id'])}}">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        @endif
                                        @if($c_user->user_type_id == 1 )
                                            <a class="btn btn-xs btn-danger ask-me"
                                               data-toggle="tooltip" title="Delete"
                                               href="{{route('deleteMessage', $val['id'])}}"><i class="fa fa-times"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$message->appends(Input::except('_token'))->links()}}
                    </div>
                    <!--Table Wrapper Finish-->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">اغلاق</span></button>
                    <h4 class="modal-title" id="myModalLabel">تغير كلمه المرور</h4>
                </div>
                {{Form::open(array('role'=>"form", 'route' => 'changePassword'))}}
                <div class="modal-body">
                    <div class="form-group">
                        <label>كلمه المرور</label>
                        <input required name="password" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>تاكيد كلمه المرور</label>
                        <input required name="password_confirmation" class="form-control"/>
                        <input name="user_id" id="user_id" type="hidden"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@stop