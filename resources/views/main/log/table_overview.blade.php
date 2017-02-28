<tr>
    <td> {{ $log->time }} </td>
    <td>
        <div class="row">
            <div class="col-xs-4">
                <i class="fa fa-tint"></i> {{ $log->bg->bg }}
            </div>
            <div class="col-xs-4 text-center">
                <i class="fa fa-cutlery"></i> {{ $log->carb->carbs }}
            </div>
            <div class="col-xs-4">
                <div class="pull-right">
                    <i class="fa fa-bicycle"></i> {{ $log->exercise->minutes }}
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