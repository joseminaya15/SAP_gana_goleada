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
        <title>Ganhe de goleada com a SAP</title>
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
                    <h2 class="">Concurso para parceiros</h2>
                    <div class="background background1"></div>
                    <div class="background background2"></div>
                    <div class="background background3"></div>
                </div>
            </div>
            <div class="container mdl-card-container">
                <div class="text-right menu">
                    <a href="Menu"><i class="mdi mdi-home"></i>Menu</a>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login logout" onclick="cerrarCesion()">Encerrar a sessão</button>
                </div>
                <h2 class="person_name">Bem-vindo <?php echo $nombre_capitan == null ? '' : $nombre_capitan; ?></h2>
                <p class="team_name">Equipe <?php echo $nombre_canal == null ? '' : $nombre_canal; ?></p>
                <div id="Ranking_goleadores" class="mdl-card mdl-card-menu" onclick="goToMenu(this.id)">
                    <div class="mdl-card__title">
                        <img src="<?php echo RUTA_IMG?>menu/premio.png">
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>Prêmios para goleadores SAP</p>
                    </div>
                </div>
                <div class="mdl-card mdl-card-ranking mdl-premios m-t-5">
                    <div class="mdl-card__supporting-text m-t-10 p-0">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#Tabhome" aria-controls="home" role="tab" data-toggle="tab">GB</a></li>
                            <li><a href="#Tabsap" aria-controls="Tabsap" role="tab" data-toggle="tab">B1</a></li>
                            <li><a href="#Tabgol" aria-controls="Tabgol" role="tab" data-toggle="tab">Melhor marcador do ano</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active p-0 m-b-20" id="Tabhome">
                                <div class="col-sm-4 text-center premioQ">
                                    <img src="<?php echo RUTA_IMG?>premios/pq2.png">
                                </div>
                                <div class="col-sm-4 text-center premioQ">
                                    <img src="<?php echo RUTA_IMG?>premios/pq3.jpg">
                                </div>
                                <div class="col-sm-4 text-center premioQ">
                                    <img src="<?php echo RUTA_IMG?>premios/pq4.jpg">
                                </div>      
                            </div>
                            <div role="tabpanel" class="tab-pane fade p-0 m-b-20" id="Tabsap">
                                <div class="col-sm-4 text-center premioQ">
                                    <img src="<?php echo RUTA_IMG?>premios/pbq2.png">
                                </div>
                                <div class="col-sm-4 text-center premioQ">
                                    <img src="<?php echo RUTA_IMG?>premios/pbq3.png">
                                </div>      
                            </div>
                            <div role="tabpanel" class="tab-pane fade p-0 m-b-20" id="Tabgol">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Posição</th>
                                                <th>Equipe</th>
                                                <th>Capitão</th>
                                                <th>País</th>
                                                <th>Pontuação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $html ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 cierreQ m-b-15">
                            <p></p>
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