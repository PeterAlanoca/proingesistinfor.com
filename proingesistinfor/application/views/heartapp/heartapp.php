<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/frontend/img/favicon.jpg">
        <meta htatp-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Pro Ingesistifor | Heart App</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="<?php echo base_url();?>assets/frontend/css/bootstrap.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/frontend/css/landing-page.css" rel="stylesheet"/>
        <script src="<?php echo base_url();?>assets/frontend/js/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/frontend/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/frontend/js/bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/frontend/js/jquery.validate.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/frontend/js/site.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/frontend/js/awesome-landing-page.js" type="text/javascript"></script>
        <link href="<?php echo base_url();?>assets/frontend/css/star-rating/fileinput.css" media="all" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url();?>assets/frontend/js/star-rating/fileinput.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/frontend/js/star-rating/es.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/frontend/js/notify.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/font-awesome.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300' rel='stylesheet' type='text/css'>
    </head>
    <body class="landing-page landing-page1">
        <?php if ($msg == 0){?>
        <script type="text/javascript">
            $.notify("Correo electrónico o contraseña incorrecto.", "error");
        </script>
        <?php } ?>
        <?php if ($msg == 3){?>
        <script type="text/javascript">
            $.notify("Cuenta creada, ya puedes iniciar sesión", "success");
        </script>
        <?php } ?>
        <nav class="navbar navbar-transparent navbar-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                    </button>
                    <a href="<?php echo base_url();?>">
                        <div class="logo-container">
                            <div class="logo">
                                <img src="<?php echo base_url();?>assets/frontend/img/new_logo.png" alt="Creative Tim Logo">
                            </div>
                            <div class="brand">
                                Pro Ingesistinfor
                            </div>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="example" >
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="" data-toggle="modal" data-target="#modal_login">
                            <i class="fa fa-user-circle"></i>
                            Iniciar sesión
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/Ingesistinfor/">
                            <i class="fa fa-facebook-square"></i>
                            Facebook
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/Ingesistinfor">
                            <i class="fa fa-twitter"></i>
                            Twitter
                            </a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/+IngesistinforHD">
                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                            Google Plus
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/+IngesistinforHD">
                            <i class="fa fa-youtube-play"></i>
                            Youtube
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="wrapper">
            <div class="parallax filter-gradient blue" data-color="blue">
                <div class="parallax-background">
                    <img class="parallax-background-image" src="<?php echo base_url();?>assets/frontend/img/template/bg3.jpg">
                </div>
                <div class= "container">
                    <div class="row">
                        <div class="col-md-5 hidden-xs">
                            <div class="parallax-image">
                                <img class="phone" src="<?php echo base_url();?>assets/frontend/img/template/iphone3.png" style="margin-top: 20px"/>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                            <div class="description">
                                <h2>Heart App</h2>
                                <br>
                                <h5>Es una aplicación de control de pulso cardiaco, que permite hacer un seguimiento de nuestro estado físico y de salud.
Además es especialmente útil para optimizar nuestra forma de hacer deportes y ejercicios ya sea por entretenimiento, si lo hacemos para bajar de peso o para mantenernos en forma.</h5>
                            </div>
                            <div class="buttons">
                                <a href="<?php echo base_url(); ?>download/HeartApp.apk" class="btn btn-fill btn-neutral">
                                    <i class="fa fa-android"></i> Descargar
                                </a>
                                <a class="btn btn-simple btn-neutral">
                                    <i class="fa fa fa-github"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-gray section-clients">
                <div class="container text-center">
                    <h4 class="header-text">Design and Development</h4>
                    <p>
                        Esta aplicación fue de desarrollado con software libre así que puede ser copiado, estudiado, modificado, utilizado libremente con cualquier fin y redistribuido con o sin cambios o mejoras, está disponible gratuitamente en su fase de prueba, terminado dicha fase se determinará el precio o se considerará si será gratuito.<br>
                    </p>
                    <div class="logos">
                        <ul class="list-unstyled">
                            <li ><img src="<?php echo base_url();?>assets/frontend/img/logos/lamp.png"/></i>
                            <li ><img src="<?php echo base_url();?>assets/frontend/img/logos/arduino.png"/></li>
                            <li ><img src="<?php echo base_url();?>assets/frontend/img/logos/android-studio.png"/></li>
                            <li ><img src="<?php echo base_url();?>assets/frontend/img/logos/ubuntu.png"/></li>
                        </ul>
                    </div>
                </div>
            </div>

            <form id="frm" method="post" action="<?php echo base_url(); ?>heartapp/register" enctype="multipart/form-data">
            <div class="section section-presentation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="header-text">Registrarte</h4>
                            <h6 class="sub-header-text">Información personal</h6>
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario. (Ejemplo juan.perez)">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellido">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                            </div>

                            <h6 class="sub-header-text">Información de contacto</h6>
                            <div class="form-group">
                                <select class="form-control" id="country" name="country" disabled>
                                    <option>Argentina</option>
                                    <option selected>Bolivia</option>
                                    <option>Brasil</option>
                                    <option>Chile</option>
                                    <option>Colombia</option>
                                    <option>Costa Rica</option>
                                    <option>Cuba</option>
                                    <option>Ecuador</option>
                                    <option>El Salvador</option>
                                    <option>Guatemala</option>
                                    <option>Haití</option>
                                    <option>Honduras</option>
                                    <option>México</option>
                                    <option>Nicaragua</option>
                                    <option>Panamá</option>
                                    <option>Paraguay</option>
                                    <option>Perú</option>
                                    <option>República</option>
                                    <option>Dominicana</option>
                                    <option>Uruguay</option>
                                    <option>Venezuela</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="city" id="city" placeholder="Ciudad">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="cellphone" id="cellphone" placeholder="Número de celular">
                            </div>
                            <h6 class="sub-header-text">Foto y portada</h6>
                            <div class="form-group">
                                <input id="photo" name="photo" class="file" type="file" accept="image/jpg, image/jpeg"  data-min-file-count="1" data-show-preview="false">
                                <script>
                                    $("#photo").fileinput({
                                        showUpload: false,
                                        showZoom: false,
                                        browseClass: "btn btn-dafault",
                                        browseLabel: "Foto de perfil",
                                        browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
                                        removeClass: "btn btn-danger",
                                        removeLabel: "Eliminar",
                                        removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
                                        previewFileType: 'image',
                                        allowedFileExtensions: ["jpg"],
                                        maxImageWidth: 5048,
                                        maxImageHeight: 5048,
                                        minImageWidth: 0,
                                        minImageHeight: 0
                                    });
                                </script>
                            </div> 
                            <div class="form-group">
                                <input id="cover" name="cover" class="file" type="file" accept="image/jpg, image/jpeg"  data-min-file-count="1" data-show-preview="false">
                                <script>
                                    $("#cover").fileinput({
                                        showUpload: false,
                                        showZoom: false,
                                        browseClass: "btn btn-default",
                                        browseLabel: "Foto de portada",
                                        browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
                                        removeClass: "btn btn-danger",
                                        removeLabel: "Eliminar",
                                        removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
                                        previewFileType: 'image',
                                        allowedFileExtensions: ["jpg"],
                                        maxImageWidth: 5048,
                                        maxImageHeight: 5048,
                                        minImageWidth: 0,
                                        minImageHeight: 0
                                    });
                                </script>
                            </div>                            
                        </div>
                        <div class="col-md-6">
                            <h4 class="header-text">RESPONSABLES</h4>
                            <h6 class="sub-header-text-none">Los responsables son aquellas personas que pueden ir a tu auxilio en caso que así tu lo decidas.</h6>
                            <h6 class="sub-header-text">PRIMER RESPONSABLE</h6>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nr1" id="nr1" placeholder="Nombre y apellido">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone1" id="phone1" placeholder="Número de teléfono o celular">
                            </div>  
                            <h6 class="sub-header-text">SEGUNDO RESPONSABLE</h6>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nr2" id="nr2" placeholder="Nombre y apellido">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone2" id="phone2" placeholder="Número de teléfono o celular">
                            </div>  
                            <h6 class="sub-header-text">TERCER RESPONSABLE</h6>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nr3" id="nr3" placeholder="Nombre y apellido">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone3" id="phone3" placeholder="Número de teléfono o celular">
                            </div>  
                            <h6 class="sub-header-text">CUARTO RESPONSABLE</h6>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nr4" id="nr4" placeholder="Nombre y apellido">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone4" id="phone4" placeholder="Número de teléfono o celular">
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <button type="submit" class="btn btn-block btn-default">REGISTRAR</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>

            <div class="section section-features">
                <div class="container">
                    <h4 class="header-text text-center">Características</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-blue">
                                <div class="icon">
                                    <i class="fa fa-android"></i>
                                </div>
                                <div class="text">
                                    <h4>Versión mínima S.O. Android 4.2.+ </h4>
                                    <p>Al ser una aplicación que requiere de geolocalización, es necesario contar con un paquete de datos o una conexión wifi, también requiere la conexión de bluetooth.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-blue">
                                <div class="icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <h4>Rastreo mediante el uso GPS</h4>
                                <p>Localizar a una persona es posible, sobre todo gracias a las tecnologías que permiten localizar un teléfono móvil en caso de sufrir algún problema o si el usuario así lo desea.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-blue">
                                <div class="icon">
                                    <i class="fa fa-microchip"></i>
                                </div>
                                <h4>Hardware libre basado en arduino</h4>
                                <p>El esquema, los materiales y código fuente están en github, esto hace que el usuario no tenga que gastar en un equipo extremadamente caro.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-testimonial">
                <div class="container">
                    <h4 class="header-text text-center">Team Development</h4>
                    <div id="carousel-example-generic" class="carousel fade" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="mask">
                                    <img src="<?php echo base_url(); ?>assets/frontend/img/faces/face-2.jpg">
                                </div>
                                <div class="carousel-testimonial-caption">
                                    <p>Peter Alanoca</p>
                                    <h3>"Hay 10 tipos de personas en el mundo: los que entienden el binario, y los que no."</h3>
                                </div>
                            </div>
                            <div class="item ">
                                <div class="mask">
                                    <img src="<?php echo base_url(); ?>assets/frontend/img/faces/face-3.jpg">
                                </div>
                                <div class="carousel-testimonial-caption">
                                    <p>Edwin Higberto</p>
                                    <h3>"Mi software nunca tiene bugs. Sólo que muestra datos aleatorios."</h3>
                                </div>
                            </div>
                            
                        </div>
                        <ol class="carousel-indicators carousel-indicators-blue">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="section section-no-padding">
                <div class="parallax filter-gradient blue" data-color="blue">
                    <div class="parallax-background">
                        <img class ="parallax-background-image" src="assets/frontend/img/template/bg3.jpg"/>
                    </div>
                    <div class="info">
                        <h1>Descarga Heart App!</h1>
                        <p>Aplicación de control de pulso cardiaco, que permite hacer un seguimiento de nuestro estado físico y de salud.</p>
                        <a href="<?php echo base_url(); ?>download/HeartApp.apk" class="btn btn-neutral btn-lg btn-fill">DESCARGAR</a>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <div class="social-area pull-right">
                        <a href="https://www.facebook.com/Ingesistinfor/" class="btn btn-social btn-facebook btn-simple">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="https://twitter.com/Ingesistinfor" class="btn btn-social btn-twitter btn-simple">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://plus.google.com/+IngesistinforHD" class="btn btn-social btn-google-plus btn-simple">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="https://www.youtube.com/+IngesistinforHD" class="btn btn-social btn-google-plus btn-simple">
                            <i class="fa fa-youtube-play"></i>
                        </a>
                    </div>
                    <div class="copyright">
                        &copy; 2016 <a href="<?php echo base_url(); ?>">Pro Ingesistinfor</a>, hecho con el <i style="color:red" class="fa fa-heart heart"></i>.
                    </div>
                </div>
            </footer>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form id="frm-login" method="post" action="<?php echo base_url(); ?>heartapp/login">
                        <h6 class="sub-header-text">Iniciar sesión</h6>
                        <div class="form-group">
                            <input type="email" class="form-control" name="emaillogin" id="emaillogin" placeholder="Correo electrónico">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="passwordlogin" id="passwordlogin" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="INGRESAR" class="btn btn-default btn-block">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
