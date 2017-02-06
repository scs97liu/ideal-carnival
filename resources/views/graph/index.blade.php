@extends('layout.main.main')

@push('css')
    <link rel="stylesheet" href="{{ asset('/css/datetime.css') }}">
@endpush

@section('content')
    <input style="margin-bottom: 20px" class="form-control form-control-inline input-large date-picker" size="8" type="text" value="" placeholder="Jump To Date"/>
    <div class="portlet box">
        <div class="portlet-body">
            <div id="chart_1" class="chart" style="height: 500px;"> </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('/js/graphs.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/datetime.js') }}" type="text/javascript"></script>
    <script>
        $('.date-picker').datepicker({
            orientation: "left",
            autoclose: true
        });
        var chart = AmCharts.makeChart("chart_1", {
            "type": "serial",
            "categoryField": "category",
            "categoryAxis": {
                "gridPosition": "start"
            },
            "trendLines": [],
            "graphs": [
                {
                    "balloonText": "[[title]] of [[category]]:[[value]]",
                    "bullet": "round",
                    "id": "AmGraph-1",
                    "title": "Average",
                    "valueField": "column-1"
                }
            ],
            "guides": [
                {
                    "fillAlpha": 0.3,
                    "fillColor": "#E10E0E",
                    "id": "Guide-1",
                    "toValue": 99,
                    "value": 10
                },
                {
                    "fillAlpha": 0.31,
                    "fillColor": "#58A3F9",
                    "id": "Guide-2",
                    "toValue": 4,
                    "value": 0
                }
            ],
            "valueAxes": [
                {
                    "id": "ValueAxis-1",
                    "title": "Blood Sugars (mmol/l)"
                },
                {
                    "id": "ValueAxis-2",
                    "position": "bottom",
                    "title": "Date"
                }
            ],
            "allLabels": [],
            "balloon": {},
            "titles": [
                {
                    "id": "Title-1",
                    "size": 15,
                    "text": "Daily Average Blood Sugars for January 31st-February 6th"
                }
            ],
            "dataProvider": [
                {
                    "category": "Jan 31",
                    "column-1": "5.3"
                },
                {
                    "category": "Feb 1",
                    "column-1": "6.7"
                },
                {
                    "category": "Feb 2",
                    "column-1": "7.3"
                },
                {
                    "category": "Feb 3",
                    "column-1": "11.4"
                },
                {
                    "category": "Feb 4",
                    "column-1": "9.0"
                },
                {
                    "category": "Feb 5",
                    "column-1": "3.6"
                },
                {
                    "category": "Feb 6",
                    "column-1": "6.2"
                }
            ]
        });
    </script>
@endpush