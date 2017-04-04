<tr>
    <td> {{ $log->time->format('D F j Y - h:i A') }} </td>
    <td>
        <div class="row">
            <div class="col-xs-4">
                @if($log->bg)
                    <i class="fa fa-tint"></i> {{ $log->bg->bg }}
                @endif
            </div>
            <div class="col-xs-4 text-center">
                @if($log->carb)
                    <i class="fa fa-cutlery"></i> {{ $log->carb->carbs }}
                @endif
            </div>
            <div class="col-xs-4">
                <div class="pull-right">
                    @if($log->exercise)
                        <i class="fa fa-bicycle"></i> {{ $log->exercise->minutes }}
                    @endif
                </div>
            </div>
        </div>
    </td>
    <td>
        @if(count($log->notes))
            <i class="fa fa-check"></i>
        @endif
    </td>
    <td>
        <div class="btn-group">
            <a target="_blank" href="{{ route('log.show', $log->id) }}" class="btn dark btn-sm btn-outline sbold uppercase">
                View
            </a>
            <a href="javascript:;" class="btn dark btn-sm btn-outline sbold uppercase log-item"
               data-model="{{ $log }}">
               Select
            </a>
        </div>
    </td>
</tr>