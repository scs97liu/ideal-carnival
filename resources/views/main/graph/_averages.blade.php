<script>
    $('.date-picker').datepicker({
        orientation: "left",
        autoclose: true
    });

    $('#container').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: null
        },
        xAxis: {
            type: 'datetime',
            minRange: 7 * 24 * 60 * 60 * 1000,
            tickInterval: 24 * 60 * 60 * 1000
        },
        yAxis: {
            title: {
                text: 'Exchange rate'
            },
            plotBands: [{
                from: 8.0,
                to: 100.0,
                color: 'rgba(255, 170, 213, .2)'
            },{
                from: 0.0,
                to: 4.0,
                color: 'rgba(68, 170, 213, .2)'
            }],
            minRange: 20,
        },
        legend: {
            enabled: false
        },
        tooltip: {
            shared: true,
            crosshairs: true
        },
        plotOptions: {
            cursor: 'pointer',
            marker: {
                lineWidth: 1
            }
        },
        series: [{
            name: 'Blood Sugars',
            marker: {
                radius: 4
            },
            data: {{ $data }}
        }]
    });
</script>