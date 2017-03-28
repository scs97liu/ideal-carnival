@extends('main.layout.main')

@section('content')
    <div class="portlet box">
        <div class="portlet-body form">
            <form role="form">
                <div class="form-body">
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
                    @if(count($log->notes))
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
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('/js/graphs.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/datetime.js') }}" type="text/javascript"></script>
    @include('main.graph._bloodsugars')
@endpush
