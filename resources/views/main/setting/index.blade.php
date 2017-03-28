@extends('main.layout.main')

@section('content')
    <div class="portlet box">
        <div class="portlet-body form">
            <form role="form">
                <div class="form-body">
                    <h4 class="block">High Target</h4>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="number" min="0" step="0.1" class="form-control" value="{{ $user->getSetting('high_target', 8) }}">
                                    <span class="input-group-addon" id="sizing-addon1">{{ $user->getSetting('preferred_units', 'mmol/l') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="block">Low Target</h4>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="number" min="0" step="0.1" class="form-control" value="{{ $user->getSetting('low_target', 8) }}">
                                    <span class="input-group-addon" id="sizing-addon1">{{ $user->getSetting('preferred_units', 'mmol/l') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="block">Units</h4>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <select class="form-control input-lg">
                                    <option {{ $user->getSetting('preferred_units', null) === 'mmol/l' ? 'selected' : '' }}>mmol/l</option>
                                    <option {{ $user->getSetting('preferred_units', null) === 'mg/dl' ? 'selected' : '' }}>mg/dl</option>
                                </select>
                            </div>
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

