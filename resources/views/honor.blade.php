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
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>用户ID</th>
                            <th>姓名</th>
                            <th>手机</th>
                            <th>地址</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($honor as $player)
                            <tr>
                                <td>{{ $player->id }}</td>
                                <td>{{ $player->name }}</td>
                                <td>{{ $player->phone }}</td>
                                <td>{{ $player->address }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $honor->links() }}
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
                        <input class="form-control" type="text" name="num" placeholder="请输入您需要随机抽取的人数，注意：需要在已参与的人数之内">
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