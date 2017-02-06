<tr>
    <td> {{ $row[0] }} </td>
    <td>
        <div class="row">
            <div class="col-xs-4">
                <i class="fa fa-tint"></i> {{ $row[1] }}
            </div>
            <div class="col-xs-4 text-center">
                <i class="fa fa-cutlery"></i> {{ $row[2] }}
            </div>
            <div class="col-xs-4">
                <div class="pull-right">
                    <i class="fa fa-bicycle"></i> {{ $row[3] }}
                </div>
            </div>
        </div>
    </td>
    <td>
        @if($row[4])
            <i class="fa fa-check"></i>
        @else
            <i class="fa fa-times"></i>
        @endif
    </td>
    <td>
        <div class="btn-group">
            <a href="#" class="btn dark btn-sm btn-outline sbold uppercase">
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