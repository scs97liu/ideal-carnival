@extends('main.layout.main')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2">
                <div class="display">
                    <div class="number">
                        <h3 class="font-green-sharp">
                            <span data-counter="counterup" data-value="{{ $average }}">0</span>
                            <small class="font-green-sharp">mmol/l</small>
                        </h3>
                        <small>14 Day Average</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-life-ring"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: {{ $percentage }}%;" class="progress-bar progress-bar-success green-sharp">
                            <span class="sr-only">{{ $percentage }}% progress</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> Low Target </div>
                        <div class="status-number"> High Target </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-red-haze">
                            <span data-counter="counterup" data-value="{{ $insulin_total }}">0</span>
                            <small class="font-red-haze">U</small>
                        </h3>
                        <small>Yesterday's Insulin Totals</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-balance-scale"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                            <span class="sr-only">100% change</span>
                        </span>
                        <span style="width: 0%;" class="progress-bar progress-bar-success purple-wisteria">
                            <span class="sr-only">0% change</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> Fast Acting </div>
                        <div class="status-number"> Long Acting </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-blue-sharp">
                            <span data-counter="counterup" data-value="{{ $low_count }}">0</span>
                        </h3>
                        <small>LOW BG THIS WEEK</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-search-minus"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: {{ $low_percentage }}%;" class="progress-bar progress-bar-success blue-sharp">
                            <span class="sr-only">{{ $low_percentage }}% grow</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> Amount </div>
                        <div class="status-number"> {{ $low_percentage }}% </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat2 ">
                <div class="display">
                    <div class="number">
                        <h3 class="font-purple-soft">
                            <span data-counter="counterup" data-value="{{ $high_count }}">0</span>
                        </h3>
                        <small>HIGH BG THIS WEEK</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-search-plus"></i>
                    </div>
                </div>
                <div class="progress-info">
                    <div class="progress">
                        <span style="width: {{ $high_percentage }}%;" class="progress-bar progress-bar-success purple-soft">
                            <span class="sr-only">{{ $high_percentage }}% change</span>
                        </span>
                    </div>
                    <div class="status">
                        <div class="status-title"> Amount </div>
                        <div class="status-number"> {{ $high_percentage }}% </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-dark bold uppercase">Recent Logs</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="scroller" style="height: 230px;" data-always-visible="1" data-rail-visible="0">
                        <ul class="feeds">
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-tint"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> 5.4 mmol/l </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-danger">
                                                <i class="fa fa-bicycle"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> 40 min </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 24 mins </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-cutlery"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> 80g </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 30 mins </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-tint"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> 5.4 mmol/l </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-tint"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> 5.4 mmol/l </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-danger">
                                                <i class="fa fa-bicycle"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> 40 min </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 24 mins </div>
                                </div>
                            </li>
                            <li>
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-cutlery"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> 80g </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 30 mins </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject font-dark bold uppercase">Daily Averages</span>
                        <span class="caption-helper">mmol/l</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="site_activities_loading">
                        <img src="{{ asset('/layout/img/loading.gif') }}" alt="loading" />
                    </div>
                    <div id="site_activities_content" class="display-none">
                        <div id="site_activities" style="height: 228px;"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('/js/dashboard.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        if ($('#site_activities').size() != 0) {
            var previousPoint2 = null;
            $('#site_activities_loading').hide();
            $('#site_activities_content').show();

            var data1 = [
                ['Jan 31', 5.8],
                ['Feb 1', 6.2],
                ['Feb 2', 7.8],
                ['Feb 3', 5.2],
                ['Feb 4', 12.3],
                ['Feb 5', 6.1],
                ['Feb 6', 5.7],
            ];


            var plot_statistics = $.plot($("#site_activities"),
                    [{
                        data: data1,
                        lines: {
                            fill: 0.2,
                            lineWidth: 0,
                        },
                        color: ['#BAD9F5']
                    }, {
                        data: data1,
                        points: {
                            show: true,
                            fill: true,
                            radius: 4,
                            fillColor: "#9ACAE6",
                            lineWidth: 2
                        },
                        color: '#9ACAE6',
                        shadowSize: 1
                    }, {
                        data: data1,
                        lines: {
                            show: true,
                            fill: false,
                            lineWidth: 3
                        },
                        color: '#9ACAE6',
                        shadowSize: 0
                    }],

                    {

                        xaxis: {
                            tickLength: 0,
                            tickDecimals: 0,
                            mode: "categories",
                            min: 0,
                            font: {
                                lineHeight: 18,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        yaxis: {
                            ticks: 5,
                            tickDecimals: 0,
                            tickColor: "#eee",
                            font: {
                                lineHeight: 14,
                                style: "normal",
                                variant: "small-caps",
                                color: "#6F7B8A"
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#eee",
                            borderColor: "#eee",
                            borderWidth: 1
                        }
                    });

            $("#site_activities").bind("plothover", function(event, pos, item) {
                $("#x").text(pos.x.toFixed(2));
                $("#y").text(pos.y.toFixed(2));
                if (item) {
                    if (previousPoint2 != item.dataIndex) {
                        previousPoint2 = item.dataIndex;
                        $("#tooltip").remove();
                        var x = item.datapoint[0].toFixed(2),
                                y = item.datapoint[1].toFixed(2);
                        showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + 'M$');
                    }
                }
            });

            $('#site_activities').bind("mouseleave", function() {
                $("#tooltip").remove();
            });
        }

    </script>
@endpush
