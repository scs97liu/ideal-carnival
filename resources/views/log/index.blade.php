@extends('layout.main.main')

@push('css')
    <link rel="stylesheet" href="{{ asset('/css/datetime.css') }}">
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
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10%"> Date/Time </th>
                            <th style="width: 70%"> Overview </th>
                            <th style="width: 20%"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> 1 </td>
                            <td> Mark </td>
                            <td>
                                <span class="label label-sm label-success"> Approved </span>
                            </td>
                        </tr>
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
