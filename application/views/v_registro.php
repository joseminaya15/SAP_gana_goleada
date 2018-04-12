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
                <div class="header-left">
                    <a href="Login"><img class="logo-header" src="<?php echo RUTA_IMG?>logo/logo_home.png"></a>
                </div>
                <div class="header-right">
                    <h2 class="">Concurso para partners SMB</h2>
                    <div class="background background3"></div>
                    <div class="background background2"></div>
                    <div class="background background1"></div>
                </div>
            </div>
            <div class="container">
                <div class="text-right back">
                    <a href="Login" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login logout"><i class="mdi mdi-arrow_back"></i>Regresar</a>
                </div>
                <div class="mdl-card mdl-card-login mdl-registro">
                    <div class="mdl-card__title">
                        <img src="<?php echo RUTA_IMG?>logo/logo_login.png">
                    </div>
                    <div class="mdl-card__supporting-text col-xs-12">
                        <div class="col-xs-12">
                            <h2>Nuevo registro</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="mdl-input">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Nombre completo del capit&aacute;n" id="nombre" maxlength="50" onkeypress="return soloLetras(event);">
                            </div>
                            <div class="mdl-input">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Nombre del Canal" id="canal" maxlength="50">
                            </div>
                            <div class="mdl-select" id="divPais">
                                <select class="selectpicker" title="País" id="pais" onchange="cambiarPais();">
                                    <option value="Argentina">Argentina</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Brasil">Brasil</option>
                                    <option value="Chile">Chile</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Costa rica">Costa Rica</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="El salvador">El Salvador</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="México">México</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Panamá">Panamá</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Perú">Perú</option>
                                    <option value="Puerto rico">Puerto Rico</option>
                                    <option value="República dominicana">República Dominicana</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Venezuela">Venezuela</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mdl-input">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Correo electr&oacute;nico" id="correo">
                            </div>
                            <div class="mdl-input">
                                <input type="password" class="form-control" autocomplete="off" placeholder="Contrase&ntilde;a" id="password">
                            </div>
                            <div class="mdl-select" id="divPartner">
                                <select class="selectpicker" title="Partner ID" id="partner">
                                    <option>452461</option>
                                    <option>923988</option>
                                    <option>1330489</option>
                                    <option>485342</option>
                                </select>
                            </div>
                            <div class="col-xs-12 p-0">
                                <div class="col-xs-9 p-0">
                                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
                                        <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label"><a>Acepto t&eacute;rminos y condiciones</a></span>
                                    </label>
                                </div>
                                <div class="col-xs-3 p-0 text-right">
                                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login ingresar" onclick="registrar();">Grabar</button>
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