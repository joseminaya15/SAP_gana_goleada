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
                <div class="text-right">
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login logout" onclick="cerrarCesion()">Cerrar Sesi&oacute;n</button>
                </div>
                <h2 class="person_name">Bienvenido(a) <?php echo $nombre_capitan == null ? '' : $nombre_capitan; ?></h2>
                <p class="team_name">Equipo <?php echo $nombre_canal == null ? '' : $nombre_canal; ?></p>
                <div id="Nueva_anotacion" class="mdl-card mdl-card-menu" onclick="goToMenu(this.id)">
                    <div class="mdl-card__title">
                        <img src="<?php echo RUTA_IMG?>menu/anotacion.png">
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>Nueva anotaci&oacute;n</p>
                    </div>
                </div>
                <div class="mdl-card-anotaciones">
                    <div class="mdl-card mdl-card-anotar">
                        <div class="col-xs-12 mdl-puntos">
                            <div class="punto-imagen">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                            </div>
                            <div class="name-anotacion col-xs-10 p-l-0">
                                <p>Cuentas nuevas (NNN)</p>
                            </div>
                            <div class="col-xs-2">
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="cuenta_nueva">
                                    <input type="radio" id="cuenta_nueva" class="mdl-radio__button" name="options" value="1" checked onclick="selectAnotacion(this.id)">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 mdl-puntos">
                            <div class="punto-imagen">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                            </div>
                            <div class="name-anotacion col-xs-10 p-l-0">
                                <p>Oportunidades generadas de Social Selling</p>
                            </div>
                            <div class="col-xs-2">
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="social_selling">
                                    <input type="radio" id="social_selling" class="mdl-radio__button" name="options" value="2" onclick="selectAnotacion(this.id)">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 mdl-puntos">
                            <div class="punto-imagen">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">                            
                            </div>
                            <div class="name-anotacion col-xs-10 p-l-0">
                                <p>Oportunidades generadas para Cloud</p>
                            </div>
                            <div class="col-xs-2">
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="oportunidad">
                                    <input type="radio" id="oportunidad" class="mdl-radio__button" name="options" value="3" onclick="selectAnotacion(this.id)"> 
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 mdl-puntos">
                            <div class="punto-imagen">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                            </div>
                            <div class="name-anotacion col-xs-10 p-l-0">
                                <p>Casos de &eacute;xitos de clientes aprobados</p>
                            </div>
                            <div class="col-xs-2">
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="caso">
                                    <input type="radio" id="caso" class="mdl-radio__button" name="options" value="4" onclick="selectAnotacion(this.id)">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 mdl-puntos">
                            <div class="punto-imagen">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                            </div>
                            <div class="name-anotacion col-xs-10 p-l-0">
                                <p>Won & Booked (W/B)</p>
                            </div>
                            <div class="col-xs-2">
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="booked">
                                    <input type="radio" id="booked" class="mdl-radio__button" name="options" value="5" onclick="selectAnotacion(this.id)">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mdl-card mdl-card-cuentas">
                        <div class="mdl-card__title">
                            <h2>Cuentas nuevas (NNN)</h2>
                            <div class="puntaje">
                                <div class="numero-goles inline">
                                    <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                    <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                    <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                </div>
                                <p class="m-0 inline">GOLES</p>
                            </div>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div class="form-group">
                                <input type="texto" class="form-control" placeholder="Nombre de empresa NNN" id="empresa">
                            </div>
                            <div class="form-group">
                                <input type="texto" class="form-control" placeholder="País" id="pais">
                            </div>
                            <div class="form-group">
                                <input type="texto" class="form-control" placeholder="Deal Registration ID" id="deal_regis">
                            </div>
                            <div class="col-xs-6 p-0">
                                <div class="form-group">
                                    <input type="texto" class="form-control" id="fecha" name="fecha" maxlength="10" placeholder="dd/mm/aaaa">
                                </div>
                            </div>
                            <div class="col-xs-6 p-0 text-right">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login ingresar" onclick="nuevaAnotacion()">Anotar<i class="mdi mdi-play_arrow"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>moment/moment.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>datetimepicker/js/bootstrap-material-datetimepicker.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>jquery-mask/jquery.mask.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>nueva_anotacion.js?v=<?php echo time();?>"></script>
        <script type="text/javascript">
        /*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
            $('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }*/
        initMaskInputs('fecha');
    </script>
    </body>
</html>