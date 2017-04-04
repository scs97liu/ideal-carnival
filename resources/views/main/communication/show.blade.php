@extends('main.layout.main')

@section('content')
    <div class="portlet box">
        <div class="portlet-body form">
            <form role="form">
                <div class="form-body">
                    <h4 class="block">Sent From</h4>
                    <div class="form-group">
                        <h5>{{ $communication->sender->present()->fullName }}</h5>
                    </div>
                    <h4 class="block">At</h4>
                    <div class="form-group">
                        <h5>{{ $communication->created_at }}</h5>
                    </div>
                    <h4 class="block">Message</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <p>{{ $communication->text }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mt-checkbox-list">
                            <label class="mt-checkbox"> Requested An Appointment?
                                <input type="checkbox" value="1" name="request" {{ ($communication->request_appointment) ? 'checked' : null }}>
                                <span></span>
                            </label>
                        </div>
                    </div>
                    @if($communication->log_id)
                        <div class="row">
                            <div class="col-sm-1">
                                <a href="{{ route('log.show', $communication->log_id) }}" class="btn btn-lg blue">
                                    Open Attached Log
                                </a>
                            </div>
                        </div>
                    @endif
                    <br/>
                    <div class="row">
                        <div class="col-sm-1">
                            <a href="{{ route('communication.create', ['id' => $communication->sender->id]) }}" class="btn btn-lg blue">
                                Reply
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection