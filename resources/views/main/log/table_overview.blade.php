<tr>
    <td> {{ $log->time }} </td>
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
        @if(true)
            <i class="fa fa-check"></i>
        @else
            <i class="fa fa-times"></i>
        @endif
    </td>
    <td>
        <div class="btn-group">
            <a href="{{ route('log.show', $log->id) }}" class="btn dark btn-sm btn-outline sbold uppercase">
                <i class="fa fa-search"></i> View
            </a>
            <a href="#" class="btn dark btn-sm btn-outline sbold uppercase">
                <i class="fa fa-pencil"></i> Edit
            </a>
            <a href="#" class="btn dark btn-sm btn-outline sbold uppercase">
                <i class="fa fa-trash"></i> Delete
            </a>
        </div>
    </td>
</tr>