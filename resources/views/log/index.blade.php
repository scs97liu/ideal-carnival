@extends('layout.main.main')

@push('css')
    <link rel="stylesheet" href="{{ asset('/css/datetime.css') }}">
    <style>
        .log-overview div {
            float: left;
        }
    </style>
@endpush

@section('content')
    <div class="portlet box">
        <div class="portlet-title">
            <div class="tools">
                <input class="form-control form-control-inline input-large date-picker" size="8" type="text" value="" placeholder="Jump To Date"/>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-scrollable">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10%"> Date/Time </th>
                            <th style="width: 50%"> Overview </th>
                            <th style="width: 10%"> Notes </th>
                            <th style="width: 30%"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @each('log.table_overview', $rows, 'row')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('/js/datetime.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
            $('.date-picker').datepicker({
                orientation: "left",
                autoclose: true
            });
    </script>
@endpush
