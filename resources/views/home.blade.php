@extends('adminlte::page')

@section('title_prefix', '用户列表 - ')


@section('content_header')
    <h1>
        用户列表
        <small>User List</small>
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                    {{--<h3 class="box-title">Data Table With Full Features</h3>--}}
                    <a href="{{ route('exportAll') }}" class="btn btn-primary pull-right">
                        导出所有 <i class="fa fa-folder-open"></i>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>用户ID</th>
                                <th>姓名</th>
                                <th>年龄</th>
                                <th>手机</th>
                                <th>地址</th>
                                @for($i = 1; $i <= 4; $i++)
                                    <th>题{{ $i }}</th>
                                @endfor
                                <th>提交时间</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@stop

@section('js')
    <script>
        $(function () {
            $('#example1').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('getJson') }}",
                "columns": [
                    { "data": "id" },
                    { "data": "name" },
                    { "data": "age" },
                    { "data": "phone" },
                    { "data": "address" },
                    { "data": "answer_1" },
                    { "data": "answer_2" },
                    { "data": "answer_3" },
                    { "data": "answer_4" },
                    { "data": "created_at" }
                ],
                language: {
                    "sProcessing": "处理中...",
                    "sLengthMenu": "显示 _MENU_ 项结果",
                    "sZeroRecords": "没有匹配结果",
                    "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                    "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                    "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                    "sInfoPostFix": "",
                    "sSearch": "搜索:",
                    "sUrl": "",
                    "sEmptyTable": "表中数据为空",
                    "sLoadingRecords": "载入中...",
                    "sInfoThousands": ",",
                    "oPaginate": {
                        "sFirst": "首页",
                        "sPrevious": "上页",
                        "sNext": "下页",
                        "sLast": "末页"
                    },
                    "oAria": {
                        "sSortAscending": ": 以升序排列此列",
                        "sSortDescending": ": 以降序排列此列"
                    }
                }
            });
        });
    </script>
@stop
