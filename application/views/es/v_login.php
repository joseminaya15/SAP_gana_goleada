<!DOCTYPE html>
<html lang="es">
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description"            content="SAP Gana por Goleada">
        <meta name="keywords"               content="SAP Gana por Goleada">
        <meta name="robots"                 content="Index,Follow">
        <meta name="date"                   content="Febrero 15, 2018"/>
        <meta name="language"               content="es">
        <meta name="theme-color"            content="#000000">
    	<title>SAP Gana por Goleada</title>
    	<link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.png">
    	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>datetimepicker/css/bootstrap-material-datetimepicker.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
    </head>
    <body>
        <section id="login">
            <div class="fondo-imagen"></div>
            <div class="header">
                <div class="header-left home">
                    <a href="Login"><img class="logo-header" src="<?php echo RUTA_IMG?>logo/logo_home.png"></a>
                </div>
                <div class="header-right idioma">
                    <div class="mdl-idioma">
                        <select class="selectpicker" id="Idioma"  name="Idioma" onchange="cambiarIdioma()">
                            <option value="Español">Espa&ntilde;ol</option>
                            <option value="Inglés">English</option>
                            <option value="Portugués">Portugu&ecirc;s</option>
                        </select>
                    </div>
                    <h2 class="">Concurso para partners SMB</h2>
                    <div class="background background1"></div>
                    <div class="background background2"></div>
                    <div class="background background3"></div>
                </div>
            </div>
            <div class="container">
                <div class="mdl-card mdl-card-login">
                    <div class="mdl-card__supporting-text">
                        <div class="col-sm-6 text-center">
                            <img src="<?php echo RUTA_IMG?>logo/logo_login.png">
                        </div>
                        <div class="col-sm-6 m-t-50">
                            <h2 class="title_login">Ingreso a la cancha</h2>
                            <div class="mdl-input transparent">
                                <input type="text" class="form-control" placeholder="email" id="correo" onkeyup="verificarDatos(event);">
                            </div>
                            <div class="mdl-input transparent">
                                <input type="password" class="form-control" placeholder="Contrase&ntilde;a" id="password" onkeyup="verificarDatos(event);">
                            </div>
                            <div class="m-t-20">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login registrar" onclick="goToRegister()">Registrarse<i class="mdi mdi-play_arrow"></i></button>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login ingresar" onclick="ingresar()">Ingresar<i class="mdi mdi-play_arrow"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>moment/moment.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>datetimepicker/js/bootstrap-material-datetimepicker.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>jquery-mask/jquery.mask.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>login.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        </script>
    </body>
</html>