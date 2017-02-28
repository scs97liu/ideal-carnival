@extends('main.layout.main')

@push('css')
<link rel="stylesheet" href="{{ asset('/css/modals.css') }}">
<link rel="stylesheet" href="{{ asset('/css/code.css') }}">
<style>
    .CodeMirror {
        height: auto;
    }
</style>
@endpush

@section('content')
    <div class="portlet box">
        <div class="portlet-body form">
            <form role="form">
                <div class="form-body">
                    <button class="btn green" type="button"  data-target="#full-width" data-toggle="modal">Data</button>
                    <h4 class="block">Date/Time</h4>
                    <div class="form-group">
                        <p class="form-control-static">{{ $log->time }}</p>
                    </div>
                    @if($log->bg)
                        <h4 class="block">Blood Sugar</h4>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="input-group input-group-lg">
                                        <p class="form-control-static">{{ $log->bg->bg }}</p>
                                        @if(count($log->bg->notes))
                                            <p>{{ $log->bg->notes[0]->text }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($log->carb)
                        <h4 class="block">Carbohydrates</h4>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="input-group input-group-lg">
                                        <p class="form-control-static">{{ $log->carb->carbs }} mmol/l</p>
                                        @if(count($log->carb->notes))
                                            <p>{{ $log->carb->notes[0]->text }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($log->medications)
                        <h4 class="block">Insulin</h4>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="input-group input-group-lg">
                                        @foreach($log->medications as $medication)
                                            <p class="form-control-static">{{ $medication->amount }}U - {{ $medication->type }}</p>
                                            @if(count($medication->notes))
                                                <p>{{ $medication->notes[0]->text }}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($log->exercise)
                        <h4 class="block">Exercise</h4>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="input-group input-group-lg">
                                        <p class="form-control-static">{{ $log->exercise->minutes }} mins - {{ $log->exercise->difficulty }}</p>
                                        @if(count($log->exercise->notes))
                                            <p>{{ $log->exercise->notes[0]->text }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($log->notes)
                        <h4 class="block">Additional Notes</h4>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <p class="form-control-static">{{ $log->notes[0]->text }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <div id="full-width" class="modal container fade" tabindex="-1">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Data Dump</h4>
        </div>
        <div class="modal-body" style="height: 800px">
            <textarea id="code-editor"></textarea>
        </div>
        {{--<div class="modal-footer">--}}
            {{--<button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>--}}
            {{--<button type="button" class="btn green">Save changes</button>--}}
        {{--</div>--}}
    </div>
@endsection

@push('js')
<script src="{{ asset('/js/modals.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/code.js') }}" type="text/javascript"></script>
<script>
    var json = '{!! $log->toJson() !!}'.split('\\').join('\\\\')
    json = JSON.parse(json)
    $('#code-editor').html(JSON.stringify(json, null, ' '))

    var myTextArea = document.getElementById('code-editor');
    var myCodeMirror = CodeMirror.fromTextArea(myTextArea, {
        lineNumbers: false,
        matchBrackets: true,
        styleActiveLine: true,
        theme:"ambiance",
        mode: 'javascript'
    });
</script>
@endpush
