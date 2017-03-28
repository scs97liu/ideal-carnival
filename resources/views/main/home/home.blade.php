@extends('main.layout.main')

@push('css')
    <style>
        .scroller .feeds li .col2 {
            width: 150px;
            margin-left: -150px;
        }
    </style>
@endpush

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
                        <i class="fa fa-tint"></i>
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
                        <i class="fa fa-medkit"></i>
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
                            @each('main.home._recent', $recent, 'row')
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
                    <div id="container" style="height: 200px; margin: 0 auto"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('/js/dashboard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/graphs.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/datetime.js') }}" type="text/javascript"></script>
    @include('main.graph._averages')

@endpush
