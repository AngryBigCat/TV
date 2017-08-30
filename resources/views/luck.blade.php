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
    <div class="row">

        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    {{--<h3 class="box-title">一等奖获得者</h3>--}}
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                        抽取一等奖幸运用户 <i class="fa fa-refresh"></i>
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
                        @foreach($honor1 as $player)
                            <tr>
                                <td>{{ $player->id }}</td>
                                <td>{{ $player->name }}</td>
                                <td>{{ $player->phone }}</td>
                                <td>{{ $player->address }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $honor1->appends(['sort' => 'votes'])->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box">
                <div class="box-header">
                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-success">
                        抽取二等奖幸运用户 <i class="fa fa-refresh"></i>
                    </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>用户ID</th>
                            <th>姓名</th>
                            <th>手机</th>
                            <th>地址</th>
                        </tr>
                        </thead>
                            <tbody>
                            @foreach($honor2 as $player)
                                <tr>
                                    <td>{{ $player->id }}</td>
                                    <td>{{ $player->name }}</td>
                                    <td>{{ $player->phone }}</td>
                                    <td>{{ $player->address }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $honor2->render() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box">
                <div class="box-header">
                    <button class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                        抽取三等奖幸运用户 <i class="fa fa-refresh"></i>
                    </button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>用户ID</th>
                            <th>姓名</th>
                            <th>手机</th>
                            <th>地址</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($honor3 as $player)
                            <tr>
                                <td>{{ $player->id }}</td>
                                <td>{{ $player->name }}</td>
                                <td>{{ $player->phone }}</td>
                                <td>{{ $player->address }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{--<tfoot>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                        </tfoot>--}}
                    </table>
                    {!! $honor3->render() !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        {{--@foreach(range(1,10) as $value)
        <div class="col-lg-2 col-xs-6">
            --}}{{-- 一等奖box --}}{{--
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>一等奖</h3>
                    <p>姓名：刘康</p>
                    <p>手机：18910434780</p>
                    <p>地址：陕西省西安市新城区胡家庙长缨东路长缨新座A座907号</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
            </div>
        </div>
        @endforeach--}}
    </div>

    {{-- 二等奖 --}}{{--
    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-success" style="margin-bottom: 10px;">
        抽取二等奖幸运用户 <i class="fa fa-refresh"></i>
    </button>
    <div class="row">
        @foreach(range(1, 10) as $value)
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>二等奖</h3>
                    <p>姓名：刘康</p>
                    <p>手机：18910434780</p>
                    <p>地址：陕西省西安市新城区胡家庙长缨东路长缨新座A座907号</p>
                    <p>问题1：A</p>
                    <p>问题2：B</p>
                    <p>问题3：C</p>
                    <p>问题4：这是一个问题的描述</p>
                    <p>提交时间：2017-4-17 20:08:40</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
            </div>
        </div>
        @endforeach;--}}

        {{-- model --}}
        <div class="modal modal-danger fade" id="modal-danger">
            <div class="modal-dialog">
                <form action="{{ route('drawLucky') }}" method="post" class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-circle-o-notch fa-spin"></i> 抽取一等奖幸运用户</h4>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="honor_id" value="1">
                            <input class="form-control" type="text" name="num" placeholder="请输入您需要随机抽取的人数">
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
        {{-- model --}}
        <div class="modal modal-success fade" id="modal-success">
            <div class="modal-dialog">
                <form action="{{ route('drawLucky') }}" method="post" class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-circle-o-notch fa-spin"></i> 抽取二等奖幸运用户</h4>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="honor_id" value="2">
                            <input class="form-control" type="text" name="num" placeholder="请输入您需要随机抽取的人数">
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
        {{-- model --}}
        <div class="modal modal-info fade" id="modal-info">
            <div class="modal-dialog">
                <form action="{{ route('drawLucky') }}" method="post" class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-circle-o-notch fa-spin"></i> 抽取三等奖幸运用户</h4>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="honor_id" value="3">
                            <input class="form-control" type="text" name="num" placeholder="请输入您需要随机抽取的人数">
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