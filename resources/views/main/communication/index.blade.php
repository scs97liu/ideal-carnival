@extends('main.layout.main')


@section('content')
    <div class="portlet box">
        <div class="portlet-body form">
            <form role="form">
                <div class="form-body">
                    <h4 class="block">Send To</h4>
                    <div class="form-group">
                        <select class="form-control input-lg input-xlarge">
                            <option disabled selected>-- Select Medical Professional --</option>
                            <option>Fast</option>
                            <option>Slow</option>
                        </select>
                    </div>
                    <h4 class="block">Message</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <textarea class="form-control" style="width:100%" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mt-checkbox-list">
                            <label class="mt-checkbox"> Request An Appointment?
                                <input type="checkbox" value="1" name="test">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <h4 class="block">Link To Log(s)</h4>
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="form-group">
                                <a href="javascript:;" class="btn btn-lg blue">
                                    <i class="fa fa-search"></i>
                                    Open Log Selector
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions left">
                    <button type="button" class="btn btn-lg default">Cancel</button>
                    <button type="submit" class="btn btn-lg green">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection
