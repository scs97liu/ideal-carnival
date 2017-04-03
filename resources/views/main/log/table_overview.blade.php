<tr>
    <td> {{ $log->time->format('l F j Y - h:i A') }} </td>
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
            <a href="javascript:;" class="btn dark btn-sm btn-outline sbold uppercase delete-log" data-log="{{ $log->id }}">
                <i class="fa fa-trash"></i> Delete
            </a>
            <form action="{{ route('log.destroy', $log->id) }}" method="POST">
                {{ method_field('DELETE') }}
            </form>
        </div>
    </td>
</tr>

@push('js')
    <script>
        $('.delete-log').off().click(function(event){
            if(confirm('Do you wish to delete this log? This cannot be undone')){
                $(this).next('form').submit()
            }
        })
    </script>
@endpush