@extends('main.layout.main')

@section('content')
    <div class="portlet box">
        <div class="portlet-body">
            <div class="row widget-row">
                @if($log->bg)
                    <div class="col-md-3">
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                            <h4 class="widget-thumb-heading">Blood Sugar</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-green fa fa-tint"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">{{ $user->getSetting('preferred_units', 'mmol/l') }}</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $log->bg->bg }}">0</span>
                                    @if(count($log->bg->notes))
                                        <p><strong>Note: </strong>{{ $log->bg->notes[0]->text }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if($log->carb)
                    <div class="col-md-3">
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                            <h4 class="widget-thumb-heading">Carbohydrates</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-blue fa fa-cutlery"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">Grams</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $log->carb->carbs }}">0</span>
                                    @if(count($log->carb->notes))
                                        <p><strong>Note: </strong>{{ $log->carb->notes[0]->text }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @foreach($log->medications as $medication)
                    <div class="col-md-3">
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                            <h4 class="widget-thumb-heading">Insulin</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-yellow-lemon fa fa-medkit"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">{{ $medication->type }} Units</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $medication->amount }}">0</span>
                                    @if(count($medication->notes))
                                        <p><strong>Note: </strong>{{ $medication->notes[0]->text }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if($log->exercise)
                    <div class="col-md-3">
                        <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                            <h4 class="widget-thumb-heading">Exercise</h4>
                            <div class="widget-thumb-wrap">
                                <i class="widget-thumb-icon bg-red fa fa-bicycle"></i>
                                <div class="widget-thumb-body">
                                    <span class="widget-thumb-subtitle">{{ $log->exercise->difficulty }} Minutes</span>
                                    <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $log->exercise->minutes }}">0</span>
                                    @if(count($log->exercise->notes))
                                        <p><strong>Note: </strong>{{ $log->exercise->notes[0]->text }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @if(count($log->notes))
                <div class="well">
                    <h4>Additional Notes</h4> {{ $log->notes[0]->text }}
                </div>
            @endif
            <h3>Daily Summary</h3>
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
@endsection

@push('js')

    <script src="{{ asset('/js/graphs.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/datetime.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/dashboard.js') }}" type="text/javascript"></script>
    @include('main.graph._bloodsugars')
@endpush
