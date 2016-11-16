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
                        var temperatura = 0;
                        var humedad = 0

                        setInterval(function () {
                            $.ajax({
                                url: "<?php echo base_url()."temperatura/obtener"?>",
                                type: "json",
                                success:function(data){
                                  var obj = JSON.parse(data);
                                  fecha = obj.fecha;
                                  temperatura = obj.temperatura;
                                  humedad = obj.humedad;
                                },
                                error: function(){
                                    
                                }
                            }); 

                            var x = (new Date()).getTime(), // current time
                                y = parseInt(temperatura),
                                y1 = parseInt(humedad);

                            series[0].addPoint([x, y], false, true);
                            series[1].addPoint([x, y1], true, true);

                        }, 1000);
                        
                    }
                }
            },
            title: {
                text: 'Grafica de temperatura y Humedad.',
                x: -20 //center
            },
            subtitle: {
                text: 'LNA',
                x: -20
            },
            xAxis: {
                type: 'datetime',
                tickPixelInterval: 150
            },
            yAxis: {
                title: {
                    text: 'Temperatura (°C)'
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
                name: 'Temperatura',
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
            },

            {
                name: 'Humedad',
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