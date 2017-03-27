@extends('main.layout.main')

@push('css')
    <link rel="stylesheet" href="{{ asset('/css/datetime.css') }}">
@endpush

@section('content')
    <div class="portlet box">
        <div class="portlet-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group" id="defaultrange">
                        <input type="text" class="form-control" placeholder="Change Date Range">
                        <span class="input-group-btn">
                        <button class="btn default date-range-toggle" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                    </div>
                </div>
            </div>
            <hr>
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
    <form id="range-form">
        <input type="hidden" id="range-start" name="start">
        <input type="hidden" id="range-end" name="end">
    </form>
@endsection

@push('js')
    <script src="{{ asset('/js/graphs.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/datetime.js') }}" type="text/javascript"></script>
    <script>
        $('#defaultrange').daterangepicker({
                opens: (App.isRTL() ? 'left' : 'right'),
                format: 'DD/MM/YYYY',
                separator: ' to ',
                startDate: moment().subtract('days', 29),
                endDate: moment(),
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                },
            },
            function (start, end) {
                $('#range-start').val(start.format('YYYY-MM-DD'))
                $('#range-end').val(end.format('YYYY-MM-DD'))
                $('#range-form').submit()
            }
        )
    </script>
    @include('main.graph._' . $type)
@endpush