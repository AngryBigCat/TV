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
                {{--<div class="box-header">
                    <h3 class="box-title">Data Table With Full Features</h3>
                </div>
                <!-- /.box-header -->--}}
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>用户ID</th>
                            @for($i = 1; $i <= 4; $i++)
                            <th>题{{ $i }}</th>
                            @endfor
                            <th>姓名</th>
                            <th>年龄</th>
                            <th>手机</th>
                            <th>地址</th>
                            <th>提交时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($players as $player)
                        <tr>
                            <td>{{ $player->id }}</td>
                            <td>{{ $player->answer_1 }}</td>
                            <td>{{ $player->answer_2 }}</td>
                            <td>{{ $player->answer_3 }}</td>
                            <td>{{ $player->answer_4 }}</td>
                            <td>{{ $player->name }}</td>
                            <td>{{ $player->age }}</td>
                            <td>{{ $player->phone }}</td>
                            <td>{{ $player->address }}</td>
                            <td>{{ $player->created_at }}</td>
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
                    {{ $players->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@stop