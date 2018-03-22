<!DOCTYPE html>
<html lang="es">
    <head>
    	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge">
        <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="description"            content="Registro de Oportunidades DCN">
        <meta name="keywords"               content="Registro de Oportunidades DCN">
        <meta name="robots"                 content="Index,Follow">
        <meta name="date"                   content="Febrero 15, 2018"/>
        <meta name="language"               content="es">
        <meta name="theme-color"            content="#000000">
    	<title>SAP Gana por Goleada</title>
    	<link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.png">
    	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
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
                <div class="text-right">
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login logout" onclick="cerrarCesion()">Cerrar Sesi&oacute;n</button>
                </div>
                <h2 class="person_name">Bienvenido(a) <?php echo $nombre_capitan == null ? '' : $nombre_capitan; ?></h2>
                <p class="team_name">Equipo <?php echo $nombre_canal == null ? '' : $nombre_canal; ?></p>
                <div id="Anotaciones" class="mdl-card mdl-card-menu" onclick="goToMenu(this.id)">
                    <div class="mdl-card__title">
                        <img src="<?php echo RUTA_IMG?>menu/anotaciones.png">
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>Mis anotaciones</p>
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
                            <div class="col-xs-10 p-l-0">
                                <p>Cuentas nuevas (NNN) <strong><?php echo $total_cn ?></strong></p>
                            </div>
                            <div class="col-xs-2">
                                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="cuenta_nueva">
                                    <input type="checkbox" id="cuenta_nueva" class="mdl-checkbox__input">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 mdl-puntos">
                            <div class="punto-imagen">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                            </div>
                            <div class="col-xs-10 p-l-0">
                                <p>Oportunidades generadas de Social Selling <strong><?php echo $total_sc ?></strong></p>
                            </div>
                            <div class="col-xs-2">
                                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="social_selling">
                                    <input type="checkbox" id="social_selling" class="mdl-checkbox__input">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 mdl-puntos">
                            <div class="punto-imagen">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">                            
                            </div>
                            <div class="col-xs-10 p-l-0">
                                <p>Oportunidades generadas para Cloud <strong><?php echo $total_cl ?></strong></p>
                            </div>
                            <div class="col-xs-2">
                                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="oportunidad">
                                    <input type="checkbox" id="oportunidad" class="mdl-checkbox__input">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 mdl-puntos">
                            <div class="punto-imagen">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                            </div>
                            <div class="col-xs-10 p-l-0">
                                <p>Casos de &eacute;xitos de clientes aprobados <strong><?php echo $total_ca ?></strong></p>
                            </div>
                            <div class="col-xs-2">
                                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="caso">
                                    <input type="checkbox" id="caso" class="mdl-checkbox__input">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 mdl-puntos">
                            <div class="punto-imagen">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                <img src="<?php echo RUTA_IMG?>logo/punto.png">
                            </div>
                            <div class="col-xs-10 p-l-0">
                                <p>Won & Booked (W/B) <strong><?php echo $total_wb ?></strong></p>
                            </div>
                            <div class="col-xs-2">
                                <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="booked">
                                    <input type="checkbox" id="booked" class="mdl-checkbox__input">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mdl-card mdl-card-cuentas">
                        <div class="mdl-card__title">
                            <h2>Cuentas nuevas (NNN)</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Empresa</th>
                                            <th>Deal Registration ID</th>
                                            <th>Pa&iacute;s</th>
                                            <th>Status</th>
                                            <th>Goles</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data_tabla">
                                        <?php echo $tabla ?>
                                    </tbody>
                                </table>
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
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>anotacion.js?v=<?php echo time();?>"></script>
    </body>
</html>