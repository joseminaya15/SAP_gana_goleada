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
    	<title>Score with SAP</title>
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
        <section id="menu">
            <div class="fondo-imagen"></div>
            <div class="header">
                <div class="header-left home">
                    <img class="logo-header" src="<?php echo RUTA_IMG?>logo/logo_home.png">
                </div>
                <div class="header-right">
                    <h2 class="">Competition for partners SMB</h2>
                    <div class="background background1"></div>
                    <div class="background background2"></div>
                    <div class="background background3"></div>
                </div>
            </div>
            <div class="container mdl-card-container">
                <div class="text-right menu">
                    <a href="Menu"><i class="mdi mdi-home"></i>Menu</a>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login logout" onclick="cerrarCesion()">Sign out</button>
                </div>
                <h2 class="person_name">Welcome <?php echo $nombre_capitan == null ? '' : $nombre_capitan; ?></h2>
                <p class="team_name"><?php echo $nombre_canal == null ? '' : $nombre_canal; ?> Team</p>
                <div id="Nueva_anotacion" class="mdl-card mdl-card-menu" onclick="goToMenu(this.id)">
                    <div class="mdl-card__title">
                        <img src="<?php echo RUTA_IMG?>menu/anotacion.png">
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>New annotation</p>
                    </div>
                </div>
                <div id="Anotaciones" class="mdl-card mdl-card-menu" onclick="goToMenu(this.id)">
                    <div class="mdl-card__title">
                        <img src="<?php echo RUTA_IMG?>menu/anotaciones.png">
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>My annotations</p>
                    </div>
                </div>
                <div id="Ranking_goleadores" class="mdl-card mdl-card-menu" onclick="goToMenu(this.id)">
                    <div class="mdl-card__title">
                        <img src="<?php echo RUTA_IMG?>menu/ranking.png">
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>Scorers Ranking</p>
                    </div>
                </div>
                <div id="Historia_para_inspirar" class="mdl-card mdl-card-menu" onclick="goToMenu(this.id)">
                    <div class="mdl-card__title">
                        <img src="<?php echo RUTA_IMG?>menu/salon.png">
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>History to inspire</p>
                    </div>
                </div>
                <div class="footer-menu">
                    <a href="Premios">See prizes <i class="mdi mdi-play_arrow"></i></a>
                    <img src="<?php echo RUTA_IMG?>logo/logo_en.png">
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
        <script src="<?php echo RUTA_JS?>index_es.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
                $('select').selectpicker('mobile');
            } else {
                $('select').selectpicker();
            }
        </script>
    </body>
</html>