<script>
    $('#container').highcharts({
        title: {
            text: null
        },

        xAxis: {
            type: 'datetime'
        },

        yAxis: {
            title: {
                text: 'Blood Sugar ({{ $user->getSetting('preferred_units', 'mmol/l') }})'
            },
            plotBands: [{
                from: {{ $user->getSetting('high_target', 10) }},
                to: 100.0,
                color: 'rgba(255, 170, 213, .2)'
            },{
                from: 0.0,
                to: {{ $user->getSetting('low_target', 4) }},
                color: 'rgba(68, 170, 213, .2)'
            }],
            minRange: 20,
        },

        tooltip: {
            crosshairs: true,
            shared: true,
            valueSuffix: '{{ $user->getSetting('preferred_units', 'mmol/l') }}'
        },

        legend: {
            enabled: false
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
            name: 'Average',
            data: {!! $averages !!},
            zIndex: 1,
            marker: {
                fillColor: 'white',
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[0]
            }
        }, {
            name: 'Range',
            data: {!! $ranges !!},
            type: 'arearange',
            lineWidth: 0,
            linkedTo: ':previous',
            color: Highcharts.getOptions().colors[0],
            fillOpacity: 0.3,
            zIndex: 0
        }]
    });
</script>