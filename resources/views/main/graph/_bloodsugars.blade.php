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
            minRange: 24 * 60 * 60 * 1000,
        },
        yAxis: {
            title: {
                text: 'Blood Sugar ({{ $user->getSetting('preferred_units', 'mmol/l') }})'
            },
            plotBands: [{
                from: {{ $user->getSetting('high_target', 10) }},
                to: 500.0,
                color: 'rgba(255, 170, 213, .2)'
            },{
                from: 0.0,
                to: {{ $user->getSetting('low_target', 4) }},
                color: 'rgba(68, 170, 213, .2)'
            }],
            minRange: 20,
        },
        legend: {
            enabled: false
        },
        tooltip: {
            shared: true,
            crosshairs: true,
            valueSuffix: '{{ $user->getSetting('preferred_units', 'mmol/l') }}'
        },
        plotOptions: {
            series: {
                cursor: 'pointer',
                point: {
                    events: {
                        click: function (e) {
                            window.location.href = this.url;
                        }
                    }
                },
                marker: {
                    lineWidth: 1
                }
            }
        },
        series: [{
            name: 'Blood Sugar ({{ $user->getSetting('preferred_units', 'mmol/l') }})',
            marker: {
                radius: 4
            },
            data: {!! $data !!}
        }]
    });
</script>