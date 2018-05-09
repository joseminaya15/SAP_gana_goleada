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
                <div id="Anotaciones" class="mdl-card mdl-card-menu" onclick="goToMenu(this.id)">
                    <div class="mdl-card__title">
                        <img src="<?php echo RUTA_IMG?>menu/anotaciones.png">
                    </div>
                    <div class="mdl-card__supporting-text">
                        <p>My annotations</p>
                    </div>
                </div>
                <div class="mdl-card-anotaciones">
                    <div class="mdl-card mdl-card-anotar">
                        <ul class="nav nav-tabs" role="tablist">
                            <li id="home" class="active" onclick="selectTab(this.id)"><a href="#Tabhome" aria-controls="home" role="tab" data-toggle="tab">GB</a></li>
                            <li id="sap"  onclick="selectTab(this.id)"><a href="#Tabsap" aria-controls="Tabsap" role="tab" data-toggle="tab">B1</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active p-0" id="Tabhome">
                                <div class="col-xs-12 mdl-puntos">
                                    <div class="punto-imagen">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                    </div>
                                    <div class="name-anotacion col-xs-8 p-0">
                                        <p>Won & Booked (W/B)</p>
                                    </div>
                                    <div class="col-xs-2">
                                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="booked">
                                            <input type="radio" id="booked" class="mdl-radio__button" name="options" value="1" checked onclick="nuevaAnotacion(this.id)">
                                        </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <strong><?php echo $total_wb ?></strong>
                                    </div>
                                </div>
                                <div class="col-xs-12 mdl-puntos">
                                    <div class="punto-imagen">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                    </div>
                                    <div class="name-anotacion col-xs-8 p-0">
                                        <p>New accounts (NNN)</p>
                                    </div>
                                    <div class="col-xs-2">
                                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="cuenta_nueva">
                                            <input type="radio" id="cuenta_nueva" class="mdl-radio__button" name="options" value="2" onclick="nuevaAnotacion(this.id)">
                                        </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <strong><?php echo $total_cn ?></strong>
                                    </div>
                                </div>
                                <div class="col-xs-12 mdl-puntos">
                                    <div class="punto-imagen">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">   
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">                            
                                    </div>
                                    <div class="name-anotacion col-xs-8 p-0">
                                        <p>Opportunities generated for Cloud</p>
                                    </div>
                                    <div class="col-xs-2">
                                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="oportunidad">
                                            <input type="radio" id="oportunidad" class="mdl-radio__button" name="options" value="5" onclick="nuevaAnotacion(this.id)"> 
                                        </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <strong><?php echo $total_cl ?></strong>
                                    </div>
                                </div>
                                <div class="col-xs-12 mdl-puntos">
                                    <div class="punto-imagen">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                    </div>
                                    <div class="name-anotacion col-xs-8 p-0">
                                        <p>Opportunities generated from Social Selling</p>
                                    </div>
                                    <div class="col-xs-2">
                                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="social_selling">
                                            <input type="radio" id="social_selling" class="mdl-radio__button" name="options" value="4" onclick="nuevaAnotacion(this.id)">
                                        </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <strong><?php echo $total_sc ?></strong>
                                    </div>
                                </div>
                                <div class="col-xs-12 mdl-puntos">
                                    <div class="punto-imagen">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                    </div>
                                    <div class="name-anotacion col-xs-8 p-0">
                                        <p>Success stories of approved clients</p>
                                    </div>
                                    <div class="col-xs-2">
                                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="caso">
                                            <input type="radio" id="caso" class="mdl-radio__button" name="options" value="3" onclick="nuevaAnotacion(this.id)">
                                        </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <strong><?php echo $total_ca ?></strong>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade p-0" id="Tabsap">
                                <div class="col-xs-12 mdl-puntos">
                                    <div class="punto-imagen">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">                            
                                    </div>
                                    <div class="name-anotacion col-xs-8 p-0">
                                        <p># Opportunities generated for B1</p>
                                    </div>
                                    <div class="col-xs-2">
                                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="oportunidadb1">
                                            <input type="radio" id="oportunidadb1" class="mdl-radio__button" name="options1" value="6" checked onclick="nuevaAnotacion(this.id)"> 
                                        </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <strong><?php echo $total_cl ?></strong>
                                    </div>
                                </div>
                                <div class="col-xs-12 mdl-puntos">
                                    <div class="punto-imagen">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">                            
                                    </div>
                                    <div class="name-anotacion col-xs-8 p-0">
                                        <p># Campaigns executed from the Virtual Agency</p>
                                    </div>
                                    <div class="col-xs-2">
                                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="envioagencia">
                                            <input type="radio" id="envioagencia" class="mdl-radio__button" name="options1" value="7" onclick="nuevaAnotacion(this.id)"> 
                                        </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <strong><?php echo $total_cl ?></strong>
                                    </div>
                                </div>
                                <div class="col-xs-12 mdl-puntos">
                                    <div class="punto-imagen">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">
                                        <img src="<?php echo RUTA_IMG?>logo/punto.png">                            
                                    </div>
                                    <div class="name-anotacion col-xs-8 p-0">
                                        <p>Cases of B1 References approved by SAP</p>
                                    </div>
                                    <div class="col-xs-2">
                                        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="casoaprobado">
                                            <input type="radio" id="casoaprobado" class="mdl-radio__button" name="options1" value="8" onclick="nuevaAnotacion(this.id)"> 
                                        </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <strong><?php echo $total_cl ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mdl-card mdl-card-cuentas">
                        <div class="mdl-card__title">
                            <h2>Won & Booked (W/B)</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Company</th>
                                            <th class="text-center">Deal ID #</th>
                                            <th class="text-center">Country</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Goals</th>
                                            <th class="text-center">Alerts</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data_tabla">
                                        <?php echo $tabla ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mdl-card__actions">
                            <div class="mdl-estados">
                                <ul class="m-0">
                                    <li><span class="green"></span>Approved</li>
                                    <li><span class="yellow"></span>Pending</li>
                                    <li><span class="red"></span>Rejected</li>
                                </ul>
                            </div>
                            <div class="mdl-total">
                                <p class="m-0">TOTAL: 3</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Modal -->
        <div class="modal fade modal-center" id="modalAlerta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="mdl-card">
                        <div class="mdl-card__title">
                            <h2>¡Metiste Goles!</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <p>Su oportunidad a sido aceptada</p>
                        </div>
                        <div class="mdl-card__actions text-right">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="closeModal()">Accept</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>jsmenu.js?v=<?php echo time();?>"></script>
        <script src="<?php echo RUTA_JS?>anotaciones_en.js?v=<?php echo time();?>"></script>
    </body>
</html>