<div id="full-width" class="modal container fade" tabindex="-1">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Note For <span id="note-title"></span></h4>
    </div>
    <div class="modal-body">
        @if($log->bg)
            <textarea style="width:100%; height: 300px; display: none" class="log-note" name="bg-note" id="bg-note">{{ $log->bg->notes->first()->text  or null}}</textarea>
        @else
            <textarea style="width:100%; height: 300px; display: none" class="log-note" name="bg-note" id="bg-note"></textarea>
        @endif
        @if($log->carb)
            <textarea style="width:100%; height: 300px; display: none" class="log-note" name="carb-note" id="carb-note">{{ $log->carb->notes->first()->text  or null}}</textarea>
        @else
            <textarea style="width:100%; height: 300px; display: none" class="log-note" name="carb-note" id="carb-note"></textarea>
        @endif
        @if($log->exercise)
            <textarea style="width:100%; height: 300px; display: none" class="log-note" name="exercise-note" id="exercise-note">{{ $log->exercise->notes->first()->text  or null}}</textarea>
        @else
            <textarea style="width:100%; height: 300px; display: none" class="log-note" name="exercise-note" id="exercise-note"></textarea>
        @endif
        @if($log->medications->first())
            <textarea style="width:100%; height: 300px; display: none" class="log-note" name="medication-note" id="medication-note">{{ $log->medications->first()->notes->first()->text  or null}}</textarea>
        @else
            <textarea style="width:100%; height: 300px; display: none" class="log-note" name="medication-note" id="medication-note"></textarea>
        @endif
    </div>
</div>