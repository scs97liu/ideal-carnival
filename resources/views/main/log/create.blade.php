@extends('main.layout.main')

@push('css')
    <link rel="stylesheet" href="{{ asset('/css/datetime.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/modals.css') }}">
@endpush

@section('content')
    <div class="portlet box">
        <div class="portlet-body form">
            <form role="form" action="{{ route('log.store') }}" method="POST">
                <div class="form-body">
                    <h4 class="block">Date/Time</h4>
                    <div class="form-group">
                        <div class="input-group input-group-lg input-xlarge date form_datetime">
                            <input type="text" size="16" name="datetime" readonly class="form-control" value="{{ date('d F Y - H:i') }}">
                            <span class="input-group-btn">
                                <button class="btn default date-set" type="button">
                                    <i class="fa fa-calendar"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <h4 class="block">Blood Sugar</h4>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="number" min="0" step="0.1" name="bg" class="form-control">
                                    <span class="input-group-addon" id="sizing-addon1">{{ $user->getSetting('preferred_units', null) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-lg green modal-button" type="button" data-note="bg-note" data-note-title="Blood Sugar"><i class="fa fa-pencil"></i></button>
                        </div>
                    </div>
                    <h4 class="block">Carbohydrates</h4>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="number" min="0" step="0.5" name="carbs" class="form-control">
                                    <span class="input-group-addon" id="sizing-addon1">Grams</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-lg green modal-button" type="button" data-note="carb-note" data-note-title="Carbohydrates"><i class="fa fa-pencil"></i></button>
                        </div>
                    </div>
                    <h4 class="block">Insulin</h4>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="number" min="0" step="1" name="insulin[]" class="form-control" placeholder="">
                                    <span class="input-group-addon" id="sizing-addon1">U</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <select class="form-control input-lg" name="insulin-types[]">
                                    <option disabled selected>Type</option>
                                    <option>Fast</option>
                                    <option>Slow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-lg green modal-button" type="button" data-note="medication-note" data-note-title="Insulin"><i class="fa fa-pencil"></i></button>
                        </div>
                    </div>
                    <h4 class="block">Exercise</h4>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="number" min="0" step="1" name="exercise" class="form-control" placeholder="">
                                    <span class="input-group-addon" name="exercise-type">min</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <select class="form-control input-lg" name="exercise-intensity">
                                    <option disabled selected>Intensity</option>
                                    <option>Hard</option>
                                    <option>Medium</option>
                                    <option>Easy</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-lg green modal-button" type="button" data-note="exercise-note" data-note-title="Exercise"><i class="fa fa-pencil"></i></button>
                        </div>
                    </div>
                    <h4 class="block">Additional Notes</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <textarea class="form-control" name="additional-notes" style="width:100%" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions left">
                    <button type="button" class="btn btn-lg default">Cancel</button>
                    <button type="submit" class="btn btn-lg green">Submit</button>
                </div>
                @include('main.log._modal')
            </form>
        </div>
    </div>
@endsection

@push('js')
<script src="{{ asset('/js/datetime.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/modals.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        autoclose: true,
        isRTL: false,
        format: "dd MM yyyy - hh:ii",
        pickerPosition: "bottom-left"
    });

    $('.modal-button').click(function(){
        $('.log-note').hide()
        var target = '#' + $(this).data('note')
        $('#note-title').html($(this).data('note-title'))
        $(target).show()
        $('#full-width').modal('show')
    })
</script>
@endpush
