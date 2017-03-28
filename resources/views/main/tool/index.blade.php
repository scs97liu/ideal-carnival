@extends('main.layout.main')

@section('content')
    <div class="portlet light">
        <div class="portlet-title">
            <span class="caption-subject font-dark bold uppercase">Import</span>
        </div>
        <div class="portlet-body">
            <input type="file" />
            <br>
            <a href="{{ route('tool.import') }}" class="btn btn-lg green">Import</a>
        </div>
    </div>
    <div class="portlet light">
        <div class="portlet-title">
            <span class="caption-subject font-dark bold uppercase">Export</span>
        </div>
        <div class="portlet-body">
            <a href="#" class="btn btn-lg green">Export</a>
        </div>
    </div>
@endsection

