@extends('layout.main.main')

@push('css')
    <link rel="stylesheet" href="{{ asset('/css/datetime.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/modals.css') }}">
@endpush

@section('content')
    <div class="portlet box">
        <div class="portlet-body form">
            <form role="form">
                <div class="form-body">
                    <h4 class="block">Date/Time</h4>
                    <div class="form-group">
                        <div class="input-group input-group-lg input-xlarge date form_datetime">
                            <input type="text" size="16" readonly class="form-control">
                            <span class="input-group-btn">
                                <button class="btn default date-set" type="button"  data-target="#full-width" data-toggle="modal">
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
                                    <input type="number" min="0" step="0.1" class="form-control">
                                    <span class="input-group-addon" id="sizing-addon1">mmol/l</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-lg green" type="button"  data-target="#full-width" data-toggle="modal"><i class="fa fa-pencil"></i></button>
                        </div>
                    </div>
                    <h4 class="block">Carbohydrates</h4>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="number" min="0" step="1" class="form-control">
                                    <span class="input-group-addon" id="sizing-addon1">Grams</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-lg green" type="button"  data-target="#full-width" data-toggle="modal"><i class="fa fa-pencil"></i></button>
                        </div>
                    </div>
                    <h4 class="block">Insulin</h4>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="number" min="0" step="1" class="form-control" placeholder="">
                                    <span class="input-group-addon" id="sizing-addon1">U</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <select class="form-control input-lg">
                                    <option disabled selected>Type</option>
                                    <option>Fast</option>
                                    <option>Slow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-lg green" type="button"  data-target="#full-width" data-toggle="modal"><i class="fa fa-pencil"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="number" min="0" step="1" class="form-control" placeholder="">
                                    <span class="input-group-addon" id="sizing-addon1">U</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <select class="form-control input-lg">
                                    <option disabled selected>Type</option>
                                    <option>Fast</option>
                                    <option>Slow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-lg green" type="button"  data-target="#full-width" data-toggle="modal"><i class="fa fa-pencil"></i></button>
                        </div>
                    </div>
                    <h4 class="block">Exercise</h4>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="number" min="0" step="1" class="form-control" placeholder="">
                                    <span class="input-group-addon" id="sizing-addon1">min</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <select class="form-control input-lg">
                                    <option disabled selected>Intensity</option>
                                    <option>Fast</option>
                                    <option>Slow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <button class="btn btn-lg green" type="button"  data-target="#full-width" data-toggle="modal"><i class="fa fa-pencil"></i></button>
                        </div>
                    </div>
                    <h4 class="block">Additional Notes</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <textarea class="form-control" style="width:100%" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions left">
                    <button type="button" class="btn btn-lg default">Cancel</button>
                    <button type="submit" class="btn btn-lg green">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div id="full-width" class="modal container fade" tabindex="-1">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Note For Blood Sugar</h4>
        </div>
        <div class="modal-body">
            <textarea style="width:100%; height: 300px"></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
            <button type="button" class="btn green">Save changes</button>
        </div>
    </div>
@endsection

@push('js')
<script src="{{ asset('/js/datetime.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/modals.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    ;$(".form_datetime").datetimepicker({
        autoclose: true,
        isRTL: false,
        format: "dd MM yyyy - hh:ii",
        pickerPosition: "bottom-left"
    });
</script>
@endpush
