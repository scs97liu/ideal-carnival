<table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th style="width: 30%"> Date/Time </th>
        <th style="width: 40%"> Overview </th>
        <th style="width: 10%"> Notes </th>
        <th style="width: 20%"> Actions </th>
    </tr>
    </thead>
    <tbody>
    @each('main.communication._log_selector_row', $logs, 'log')
    </tbody>
</table>