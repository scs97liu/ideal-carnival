<table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th> Date </th>
        <th> Average </th>
        <th> High </th>
        <th> Low </th>
        <th> Actions </th>
    </tr>
    </thead>
    <tbody>
        @foreach($table as $row)
            <tr>
                <td>{{ $row['date'] }}</td>
                <td>{{ $row['average'] }}</td>
                <td>{{ $row['high'] }}</td>
                <td>{{ $row['low'] }}</td>
                <td>
                    <a href="{{ $row['url'] }}" class="btn dark btn-sm btn-outline sbold uppercase">
                        <i class="fa fa-search"></i> View Bloog Sugars
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>