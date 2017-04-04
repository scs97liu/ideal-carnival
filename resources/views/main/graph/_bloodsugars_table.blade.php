<table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th style="width: 20%"> Date/Time </th>
        <th style="width: 40%"> Overview </th>
        <th style="width: 10%"> Notes </th>
        <th style="width: 30%"> Actions </th>
    </tr>
    </thead>
    <tbody>
        @each('main.log.table_overview', $logs, 'log')
    </tbody>
</table>