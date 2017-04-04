@extends('main.layout.main')

@section('content')
    <div class="alert alert-info">
        <strong>Note!</strong> These don't work as expected. The import is just for demonstration purposes.
        Simply clicking "Import" will work. No file is actually required. It will just seed in 6 months worth
        of test data. The export button does nothing at all.
    </div>
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

