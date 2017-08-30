@extends('adminlte::page')

@section('title_prefix', '统计信息 - ')

@section('css')
    <style>
        .chart-tips div {
            display: inline-block;
            margin-left: 10px;
        }
    </style>
@stop

@section('content_header')
    <h1>
        统计信息
        <small>Statistical Information</small>
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $players->count() }}</h3>

                    <p>已参与人数</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                {{--<a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>--}}
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $toDrawPlayers->count() }}</h3>

                    <p>待抽奖人数</p>
                </div>
                <div class="icon">
                    <i class="fa fa-star"></i>
                </div>
                {{--<a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>--}}
            </div>
        </div>
    </div>
    <div class="row">
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
            <!-- BAR CHART -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-bar-chart"></i> 回答统计</h3>
                    <div class="box-tools pull-right chart-tips">
                        <div>
                            <i class="fa fa-square" style="color: #F56954;"></i> 选项A
                        </div>
                        <div>
                            <i class="fa fa-square" style="color: #00A65A;"></i> 选项B
                        </div>
                        <div>
                            <i class="fa fa-square" style="color: #F39C12;"></i> 选项C
                        </div>
                        <div>
                            <i class="fa fa-square" style="color: #00C0EF;"></i> 选项D
                        </div>
                        {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>--}}
                    </div>
                </div>
                <div class="box-body">
                    <div class="chart">
                        <canvas id="barChart" style="height:230px"></canvas>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
    </div>
@stop

@push('js')
    <script src=" {{ asset('vendor/adminlte/plugins/ChartJs/Chart.min.js') }}"></script>
@endpush

@section('js')
    <script>
        //Get context with jQuery - using jQuery's .get() method.
        var ctx = $("#barChart").get(0).getContext("2d");
        //This will get the first returned node in the jQuery collection.

        var data = {
            labels : ["问题1","问题2","问题3"],
            datasets : [
                {
                    //选项A
                    fillColor : "#F56954",
//                    strokeColor : "rgba(151,187,205,1)",
                    data : {{ json_encode($chartsData[0]) }}
                },
                {
                    //选项B
                    fillColor : "#00A65A",
//                    strokeColor : "rgba(151,187,205,1)",
                    data : {{ json_encode($chartsData[1]) }}
                },
                {
                    //选项C
                    fillColor : "#F39C12",
//                    strokeColor : "rgba(151,187,205,1)",
                    data : {{ json_encode($chartsData[2]) }}
                },
                {
                    //选项D
                    fillColor : "#00C0EF",
//                    strokeColor : "rgba(151,187,205,1)",
                    data : {{ json_encode($chartsData[3]) }}
                }
            ]
        };
        new Chart(ctx).Bar(data);
    </script>
@endsection
