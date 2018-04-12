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
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
        <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
    </head>
    <body>
        <section id="menu">
            <div class="fondo-imagen"></div>
            <div class="header">
                <div class="header-left">
                    <a href="Menu"><img class="logo-header" src="<?php echo RUTA_IMG?>logo/logo_home.png"></a>
                </div>
                <div class="header-right">
                    <h2 class="">Concurso para partners SMB</h2>
                    <div class="background background3"></div>
                    <div class="background background2"></div>
                    <div class="background background1"></div>
                </div>
            </div>
            <div class="container mdl-card-container">
                <div class="text-right menu">
                    <a href="Menu"><i class="mdi mdi-home"></i>Menu</a>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login logout" onclick="cerrarCesion()">Cerrar Sesi&oacute;n</button>
                </div>
                <h2 class="person_name">Bienvenido(a) <?php echo $nombre_capitan == null ? '' : $nombre_capitan; ?></h2>
                <p class="team_name">Equipo <?php echo $nombre_canal == null ? '' : $nombre_canal; ?></p>
                <div class="mdl-card mdl-card-menu" onclick="goToMenu(this.id)">
                    <div class="mdl-card__title">
                        <img src="<?php echo RUTA_IMG?>menu/salon.png">
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>Historia para inspirar</p>
                    </div>
                </div>
                <div class="mdl-card-fama">
                	<div class="fama-imagen">
                		<a href="https://www.youtube.com/watch?v=NA5vKEd9U7c" target="_blank"><img src="<?php echo RUTA_IMG?>fama/xolos.jpg"></a>
                		<p>Tijuana - Xolos1</p>
                	</div>
                	<div class="fama-imagen">
                		<a href="https://www.youtube.com/watch?v=U6MOrPdQfxI" target="_blank"><img src="<?php echo RUTA_IMG?>fama/tijuana.jpg"></a>
                		<p>Tijuana - Xolos2</p>
                	</div>
                	<div class="fama-imagen">
                		<a href="https://www.youtube.com/watch?v=5C2yfKhXFfo" target="_blank"><img src="<?php echo RUTA_IMG?>fama/gremio.jpg"></a>
                		<p>Gremio</p>
                	</div>
                	<div class="fama-imagen">
                		<a href="https://www.youtube.com/watch?v=s6D_rHnxqPU" target="_blank"><img src="<?php echo RUTA_IMG?>fama/america.jpg"></a>
                		<p>Am&eacute;rica</p>
                	</div>                	
                </div>
                <div class="mdl-card-menu mdl-card-exito">
                    <a href="https://crpa4c19efc4.hana.ondemand.com/cat/ci/public/ui/nominations/" target="_blank"><img src="<?php echo RUTA_IMG?>menu/anotacion.png"><span>Nomine su historia de éxito aqu&iacute;:</span></a>
                </div>
            </div>
        </section>
        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>index_es.js?v=<?php echo time();?>"></script>
    </body>
</html>