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
                <div class="header-left home">
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
                <div id="Ranking_goleadores" class="mdl-card mdl-card-menu" onclick="goToMenu(this.id)">
                    <div class="mdl-card__title">
                        <img src="<?php echo RUTA_IMG?>menu/ranking.png">
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>Ranking goleadores</p>
                    </div>
                </div>
                <div class="mdl-card mdl-card-ranking">
                    <div class="mdl-card__title">
                        <h2>Ranking Goleadores</h2>
                    </div>
                    <div class="mdl-card__supporting-text p-t-0">
                        <ul class="nav nav-tabs m-b-20" role="tablist">
                            <li role="presentation" class="active"><a href="#norte" aria-controls="norte" role="tab" data-toggle="tab">Norte</a></li>
                            <li role="presentation"><a href="#sur" aria-controls="sur" role="tab" data-toggle="tab">Sur</a></li>
                            <li role="presentation"><a href="#brasil" aria-controls="brasil" role="tab" data-toggle="tab">Brasil</a></li>
                            <li role="presentation"><a href="#mexico" aria-controls="mexico" role="tab" data-toggle="tab">M&eacute;xico</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="norte">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Posici&oacute;n</th>
                                                <th>Equipo</th>
                                                <th>Capit&aacute;n</th>
                                                <th>Pa&iacute;s</th>
                                                <th>Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $tabla ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="sur">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Posici&oacute;n</th>
                                                <th>Equipo</th>
                                                <th>Capit&aacute;n</th>
                                                <th>Pa&iacute;s</th>
                                                <th>Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $tabla1 ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="brasil">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Posici&oacute;n</th>
                                                <th>Equipo</th>
                                                <th>Capit&aacute;n</th>
                                                <th>Pa&iacute;s</th>
                                                <th>Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $tabla2 ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="mexico">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Posici&oacute;n</th>
                                                <th>Equipo</th>
                                                <th>Capit&aacute;n</th>
                                                <th>Pa&iacute;s</th>
                                                <th>Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $tabla3 ?>
                                        </tbody>
                                    </table>
                                </div>
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
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>index_es.js?v=<?php echo time();?>"></script>
    </body>
</html>