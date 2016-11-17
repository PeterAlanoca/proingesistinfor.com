<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="header">
        <h4 class="title">Pulso cardiaco</h4>
        <p class="category">Es sincronizado si está conectado el dispositivo bluetooth.</p>
      </div>
    <div class="content">
      <div id="pulso-chart"></div>
        <div class="footer">
          <div class="chart-legend">
            <i class="fa fa-heart heart"></i> Pulso cardiaco
          </div>
          <hr>
          <div class="stats">
            <i class="ti-reload"></i> actualizado por ultima vez 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$(function () {
    $(document).ready(function () {
        Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });

        $('#pulso-chart').highcharts({
            chart: {
                type: 'spline',
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: function () {
                        // set up the updating of the chart each second
                        var series = this.series;
                        var pulse = 0;
                        var i = -1;
                        

                        setInterval(function () {
                            $.ajax({
                                url: "<?php echo base_url()."heartapp/pulso/obtener"?>",
                                type: "json",
                                success:function(data){
                                  var obj = JSON.parse(data);
                                  pulse = obj.pulse;
                                  i = i * -1;
                                  pulse = pulse * i; 
                                },
                                error: function(){
                                    
                                }
                            }); 

                            var x = (new Date()).getTime(), // current time
                                y = parseInt(pulse);

                            series[0].addPoint([x, y], true, true);
                            

                        }, 1000);
                        
                    }
                }
            },
            colors: ['#EB5E28'],
            title: {
                text: '',
                x: -20 //center
            },
            xAxis: {
                type: 'datetime',
                tickPixelInterval: 150
            },
            yAxis: {
                title: {
                    text: 'Pulso cardiaco (BPM)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                        Highcharts.numberFormat(this.y, 2);
                }
            },
            legend: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            series: [
                {
                name: 'Pulso cardiaco (BPM)',
                data: (function () {
                    var data = [],
                        time = (new Date()).getTime(),
                        i;

                    for (i = -19; i <= 0; i += 1) {
                        data.push({
                            x: time + i * 1000,
                            y: 0
                        });
                    }
                    return data;
                }())  
            }

            ]


        });
    });
});
        </script>