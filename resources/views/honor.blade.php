@extends('adminlte::page')

@section('title_prefix', '幸运抽奖 - ')

@section('content_header')
    <h1>
        幸运抽奖
        <small>Lucky Draw</small>
    </h1>
@stop

@section('content')
    {{-- 一等将 --}}
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> 错误</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> 警告</h4>
            {{ session('error') }}
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    {{--<h3 class="box-title">一等奖获得者</h3>--}}
                    <button class="btn btn-{{ $var }}" data-toggle="modal" data-target="#modal-{{ $var }}">
                        抽取{{ $str }}等奖幸运用户 <i class="fa fa-refresh"></i>
                    </button>
                    <div class="pull-right">
                        <a href="{{ route('export', 'all') }}" class="btn btn-primary">
                            导出所有 <i class="fa fa-folder-open"></i>
                        </a>
                        <a href="{{ route('export', $id) }}" class="btn btn-warning">
                            导出{{ $str }}等奖 <i class="fa fa-folder-open"></i>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>用户ID</th>
                            <th>奖品</th>
                            <th>姓名</th>
                            <th>手机</th>
                            <th>地址</th>
                            @for($i = 1; $i <= 4; $i++)
                                <th>题{{ $i }}</th>
                            @endfor
                            <th>抽奖时间</th>
                            <th>提交时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($players as $player)
                            <tr>
                                <td>{{ $player->id }}</td>
                                <td>{{ $player->honor->first()->name }}</td>
                                <td>{{ $player->name }}</td>
                                <td>{{ $player->phone }}</td>
                                <td>{{ $player->address }}</td>
                                <td>{{ $player->answer_1 }}</td>
                                <td>{{ $player->answer_2 }}</td>
                                <td>{{ $player->answer_3 }}</td>
                                <td>{{ $player->answer_4 }}</td>
                                <td>{{ $player->pivot->created_at }}</td>
                                <td>{{ $player->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    {{-- model --}}
    <div class="modal modal-{{ $var }} fade" id="modal-{{ $var }}">
        <div class="modal-dialog">
            <form action="{{ route('drawLucky') }}" method="post" class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-circle-o-notch fa-spin"></i> 抽取{{ $str }}等奖幸运用户</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" name="honor_id" value="{{ $id }}">
                        <input class="form-control" type="text" name="num" placeholder="请输入您需要随机抽取的人数，注意：需要在规定的人数之内">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">取消</button>
                    <input type="submit" class="btn btn-primary" value="确认">
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    </div>
@stop

@section('js')
    <script>
        $('#example2').DataTable({
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
    </script>
@stop