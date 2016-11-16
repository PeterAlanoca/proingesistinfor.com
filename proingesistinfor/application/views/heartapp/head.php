<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/frontend/img/favicon.jpg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Heart app | <?php echo $title; ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="<?php echo base_url();?>assets/backend/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/backend/css/animate.min.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/backend/css/paper-dashboard.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>assets/backend/css/demo.css" rel="stylesheet" />
    <!--  Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url();?>assets/backend/css/themify-icons.css" rel="stylesheet">
    <?php if($section=='panel' || $section=='ubicacion'){echo $map['js'];}?>
    <script src="<?php echo base_url();?>assets/backend/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/backend/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/backend/js/bootstrap-checkbox-radio.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/highcharts.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/bootstrap-notify.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/paper-dashboard.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/demo.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php echo base_url(); ?>heartapp/panel" class="simple-text">
                    Heart App
                </a>
            </div>
            <ul class="nav">
                <li <?php if ($section=='panel') {echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>heartapp/panel">
                        <i class="ti-panel"></i>
                        <p>Panel</p>
                    </a>
                </li>
                <li <?php if ($section=='perfil') {echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>heartapp/perfil">
                        <i class="ti-user"></i>
                        <p>Perfil</p>
                    </a>
                </li>
                <li <?php if ($section=='reporte') {echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>heartapp/reporte">
                        <i class="ti-view-list-alt"></i>
                        <p>Reporte</p>
                    </a>
                </li>
                <li <?php if ($section=='pulso') {echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>heartapp/pulso">
                        <i class="fa fa-heartbeat"></i>
                        <p>Pulso cardiaco</p>
                    </a>
                </li>
                <li <?php if ($section=='ubicacion') {echo 'class="active"';}?>>
                    <a href="<?php echo base_url(); ?>heartapp/ubicacion">
                        <i class="ti-map-alt"></i>
                        <p>Mapa de ubicación</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>heartapp/<?php echo $section; ?>"><?php echo $title; ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="" data-toggle="modal" data-target="#modal-qr">
                                <h4 style="margin:0px"><i class="fa fa-qrcode"></i></h4>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-user"></i>
                                <p><?php echo $user->firstname.' '.$user->lastname;?></p>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>heartapp/logout">Cerrar sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">

        <!-- Modal -->
        <div class="modal fade" id="modal-qr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Código QR</h4>
                    </div>
                    <div class="modal-body">
                        <center>
                            <img class="img-responsive img-rounded" src="<?php echo base_url(); ?>images/code_qr/<?php echo $user->code_qr; ?>">
                        </center>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>