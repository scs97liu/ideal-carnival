@extends('main.layout.main')

@push('css')
    <link rel="stylesheet" href="{{ asset('/css/datetime.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/modals.css') }}">
    <style>
        #selected-log strong {
            float: left;
            padding-right: 10px;
        }
    </style>
@endpush

@section('content')
    <div class="portlet box">
        <div class="portlet-body form">
            <form role="form" action="{{ route('communication.store') }}" method="POST">
                <div class="form-body">
                    <h4 class="block">Send To</h4>
                    <div class="form-group">
                        <select name="to" class="form-control input-lg input-xlarge">
                            <option disabled {{ ($id == 0) ? 'selected' : null }}>-- Select Recipient --</option>
                            @if($user->type === 'professional')
                                @foreach($connections as $connection)
                                    <option value="{{ $connection->id }}"  {{ ($id == $connection->id) ? 'selected' : null }}>{{ $connection->present()->fullName }}</option>
                                @endforeach
                            @else
                                @foreach($connections as $connection)
                                    <option value="{{ $connection->user->id }}" {{ ($id == $connection->user->id) ? 'selected' : null }}>{{ $connection->user->present()->fullName }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <h4 class="block">Message</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <textarea name="message" class="form-control" style="width:100%" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mt-checkbox-list">
                            <label class="mt-checkbox"> Request An Appointment?
                                <input type="checkbox" value="1" name="request">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    @if($user->type != 'professional')
                    <div class="row">
                        <div class="col-sm-1">
                            <h4 class="block">Link To Log</h4>
                            <button  data-target="#log-selector" data-toggle="modal" class="btn btn-lg blue">
                                <i class="fa fa-search"></i>
                                Open Log Selector
                            </button>
                        </div>
                    </div>
                    @endif
                    <div id="selected-log" class="row" style="display:none">
                        <div class="col-sm-3">
                            <h4>Currently Selected Log - <a id="remove-selected" href="javascript:;">Remove</a></h4>
                            <span id="selected-time">
                                <strong>Time: </strong>
                                <p></p>
                            </span>
                            <span id="selected-bg">
                                <strong>BG: </strong>
                                <p></p>
                            </span>
                            <span id="selected-carb">
                                <strong>Carbs: </strong>
                                <p></p>
                            </span>
                            <span id="selected-insulin">
                                <strong>Insulin: </strong>
                                <p></p>
                            </span>
                            <span id="selected-exercise">
                                <strong>Exercise</strong>
                                <p></p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-actions left">
                    <button type="button" class="btn btn-lg default">Cancel</button>
                    <button type="submit" class="btn btn-lg green">Send</button>
                </div>
                <input id="selected-id" name="log-id" type="hidden" value="" />
            </form>
        </div>
    </div>
    @include('main.communication._log_selector')
@endsection

@push('js')
    <script src="{{ asset('/js/datetime.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/modals.js') }}" type="text/javascript"></script>
    <script>

        var bind = function(){
            $('.log-item').click(function(e){
                var model = $(this).data('model')
                var $selectedContainer = $('#selected-log');

                console.log(model)

                fill('time', model.time)
                fill('bg', (model.bg) ? model.bg.bg : null)
                fill('carb', (model.carb) ? model.carb.carbs : null)
                fill('insulin', (model.medications.length) ? model.medications[0].amount : null)
                fill('exercise', (model.exercise) ? model.exercise.minutes : null)
                $('#selected-id').val(model.id)

                $selectedContainer.show()
                $('#log-selector').modal('hide')
            })
        }

        var fill = function(id, value){
            var $container = $('#selected-' + id)
            $('p', $container).html(value)
        }

        $('#remove-selected').click(function(e){
            $('#selected-log').hide();
            $('#selected-id').val(null)
        })

        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            todayBtn: "linked",
        }).on('changeDate', function(e){
            $.ajax({
                type: 'POST',
                url: '{{ route('communication.log.search') }}',
                data: {date: e.format()},
                success: function(data){
                    $('#log-selector-table').html(data)
                    bind()
                }
            })
        });

    </script>
@endpush
