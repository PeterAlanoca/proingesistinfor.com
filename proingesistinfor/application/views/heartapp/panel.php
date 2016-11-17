                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Perfil</p>
                                            <span class="fa fa-ambulance" style="margin-right:7px"></span>  4
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="<?php echo base_url(); ?>heartapp/perfil" style="color:#a9a9a9">
                                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                            Acceder
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-view-list-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Reporte</p>
                                            24/7
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="<?php echo base_url(); ?>heartapp/reporte" style="color:#a9a9a9">
                                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                            Acceder
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="fa fa-heartbeat"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Pulso </p>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            1min
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="<?php echo base_url(); ?>heartapp/pulso" style="color:#a9a9a9">
                                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                            Acceder
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-location-pin"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Ubicación</p>
                                            <i class="fa fa-undo" aria-hidden="true"></i> 15s
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <a href="<?php echo base_url(); ?>heartapp/ubicacion" style="color:#a9a9a9">
                                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                            Acceder
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Mapa de ubicación</h4>
                                <p class="category">El mapa esta sincronizado con el GPS de su celular.</p>
                            </div>
                            <div class="content">
                                <?php echo $map['html']; ?>
                                <div class="footer">
                                    <div class="chart-legend">
                                        <i class="fa fa-flag text-success"></i> País
                                        <i class="glyphicon glyphicon-map-marker text-info"></i> Ciudad
                                        <i class="glyphicon glyphicon-home text-danger"></i> Calle
                                        <i class="glyphicon glyphicon-earphone text-warning"></i> Celular
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-timer"></i> Ultimo registro de ubicación fue..
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
                },
                colors: ['#EB5E28'],
                title: {
                    text: '',
                    x: -20 //center
                },
                xAxis: {
                    //type: 'datetime',
                    //tickPixelInterval: 150
                    categories: [
                    <?php 
                        if ($pulse) { 
                            $pulsedata = $pulse;
                            foreach ($pulse as $pulse) {
                                $date = new DateTime($pulse->date);
                                $date = $date->format('d/m/Y H:i:s');
                                
                    ?>
                        '<?php echo $date; ?>',
                    <?php      
                            }
                        }
                    ?>
                        
                    ]
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
                    formatter: function() {
                        return 'BPM: <b>'+ this.point.myData +'</b>';
                    }
                },
                legend: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                },

                series: [{
                    name: 'Foo',
                    data: [ 
                    <?php 
                        if ($pulsedata) { 
                            $i = 1;
                            foreach ($pulsedata as $pulsedata) {
                                $auxpulse = $pulsedata->pulse;
                                $i = $i * -1;
                                $auxpulse01 = $auxpulse * $i;
                    ?>
                        { y : <?php echo $auxpulse01;?>, myData : '<?php echo $auxpulse;?>' },
                    <?php      
                            }
                        }
                    ?>
                            ]
                }]
            });
        });
    });
</script>