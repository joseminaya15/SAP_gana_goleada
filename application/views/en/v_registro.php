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
                <div class="header-right home">
                    <h2 class="">Competition for partners SMB</h2>
                    <div class="background background1"></div>
                    <div class="background background2"></div>
                    <div class="background background3"></div>
                </div>
            </div>
            <div class="container">
                <div class="text-right back">
                    <a href="Login" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login logout"><i class="mdi mdi-arrow_back"></i>Return</a>
                </div>
                <div class="mdl-card mdl-card-login mdl-registro">
                    <div class="mdl-card__title">
                        <img src="<?php echo RUTA_IMG?>logo/logo_login.png">
                    </div>
                    <div class="mdl-card__supporting-text col-xs-12">
                        <div class="col-xs-12">
                            <h2>New register</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="mdl-input">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Full Name of the captain" id="nombre" maxlength="50" onkeypress="return soloLetras(event);">
                            </div>
                            <div class="mdl-input">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Channel Name" id="canal" maxlength="50">
                            </div>
                            <div class="mdl-select" id="divPais">
                                <select class="selectpicker" title="Country" id="pais" onchange="cambiarPais();">
                                    <option value="Argentina">Argentina</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Brasil">Brasil</option>
                                    <option value="Chile">Chile</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="México">México</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Panamá">Panamá</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Perú">Perú</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="República Dominicana">República Dominicana</option>
                                    <option value="Uruguay">Uruguay</option>
                                    <option value="Venezuela">Venezuela</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mdl-input">
                                <input type="text" class="form-control" autocomplete="off" placeholder="Email" id="correo">
                            </div>
                            <div class="mdl-input">
                                <input type="password" class="form-control" autocomplete="off" placeholder="Password" id="password">
                            </div>
                            <div class="mdl-select" id="divPartner">
                                <select class="selectpicker" title="Partner ID" id="partner">
                                </select>
                            </div>
                            <div class="col-xs-12 p-0">
                                <div class="col-xs-9 p-0">
                                    <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
                                        <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input">
                                        <span class="mdl-checkbox__label"><a onclick="modalTerminos()">I accept terms ans conditions</a></span>
                                    </label>
                                </div>
                                <div class="col-xs-3 p-0 text-right">
                                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login ingresar" onclick="registrar();">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="ModalTerminos" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-large" role="document">
                <div class="modal-content">
                    <div class="mdl-card">
                        <div class="mdl-card__title">
                            <h2>T&eacute;rminos y Condiciones</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            <div class="conditions">
                                <h2>Bases y Condiciones para el Concurso “Gana por Goleada con SAP” para Partners de SAP</h2>
                                <h2>1. Forma de participaci&oacute;n</h2>
                                <p>SAP Latinoam&eacute;rica (en adelante, el "Organizador" o "SAP"), realizar&aacute; una actividad de car&aacute;cter gratuito (en adelante el "Concurso") en el que participar&aacute;n todos aquellos partners que est&eacute;n activos en el programa Partner Edge (en adelante, los "Partners") y respondan a la propuesta del Concurso.</p>
                                <p>Las Market Units (MU) que participan son:</p>
                                <ul>
                                    <li>M&eacute;xico</li>
                                    <li>Brasil</li>
                                    <li>Norte(Colombia, Costa Rica, Ecuador, El Salvador, Guatemala, Honduras, Nicaragua, Panam&aacute;, Puerto Rico, Rep&uacute;blica Dominicana, Trinidad & Tobago, Virgin Islands)</li>
                                    <li>Sur(Argentina, Bolivia, Chile, Paraguay, Per&uacute;, Uruguay)</li>
                                </ul>
                                <p>La participaci&oacute;n de los Partners en el Concurso es totalmente gratuita y no implica la obligaci&oacute;n de compra directa ni indirecta de producto alguno. </p>
                                <h2>2. La Administraci&oacute;n</h2>
                                <p>La Administraci&oacute;n estar&aacute; formada por empleados de SAP asignados a tal efecto, en adelante la "Administración" quienes realizar&aacute;n la evaluaci&oacute;n de las aplicaciones teniendo en cuenta criterios de calidad.</p>
                                <h2>3.Modalidad</h2>
                                <p>El participante deberá presentar una marca de las 8 opciones que se presentan (en adelante, “anotación”) según los objetivos que a continuación se detallan. A saber:</p>
                                <p>Solapa GB:</p>
                                <ul>
                                    <li>NNN= Net New Names. Cuentas que no est&aacute;n en la base de SAP.</li>
                                    <li>Oportunidades generadas de Social Selling: oportunidades que a&uacute;n no se encuentren en pipeline desde Social Selling.</li>
                                    <li>Oportunidades generadas para Cloud: oportunidades que a&uacute;n no se encuentren en pipeline para Cloud.</li>
                                    <li>Casos de &eacute;xitos de clientes aprobados: Casos de &eacute;xitos de clientes que no se encuentren hoy en d&iacute;a ya presentados.</li>
                                    <li></li>
                                </ul>
                                <p>Solapa B1:</p>
                                <ul>
                                    <li>Cantidad de oportunidades generadas para B1: Oportunidades nuevas que no estén registradas.</li>
                                    <li>Cantidad de Campa&ntilde;as ejecutadas desde la Agencia Virtual para B1: cantidad de campa&ntilde;as enviadas por Agencia Virtual.</li>
                                    <li>Caso de referencias de B1 aprobados por SAP.</li>
                                </ul>
                                <p>Por el sistema, se podr&aacute; solicitar m&aacute;s información en caso que se requiera. En caso de dudas, contactar a <a href="mailto:sappartnerandsmemarketinglac@sap.com">sappartnerandsmemarketinglac@sap.com</a></p>
                                <h2>4. Presentaci&oacute;n</h2>
                                <p>Las aplicaciones ser&aacute;n evaluadas por la Administraci&oacute;n, para lo cual deben utilizar el site para registrar las anotaciones. La Administraci&oacute;n aprobar&aacute; o rechazar&aacute; la anotaci&oacute;n seg&uacute;n los sistemas internos. Ante dudas o consultas, escribir a <a href="mailto:sappartnerandsmemarketinglac@sap.com"></a>sappartnerandsmemarketinglac@sap.com</p>
                                <h2>5. Premiaci&oacute;n y plazos</h2>
                                <p>La campa&ntilde;a inicia el 30 de abril de 2018. Se seleccionar&aacute;n 2 ganadores por Market Unit (Brasil, M&eacute;xico, Sur y Norte), los cuales recibir&aacute;n los siguientes premios:</p>
                                <p>Solapa GB</p>
                                <ul>
                                    <li>1er puesto: Amazon Gift Card por USD 300</li>
                                    <li>2do puesto: Amazon Gift Card por USD200</li>
                                </ul>
                                <p>El resultado se dar&aacute; a conocer a los 15 d&iacute;as siguientes a la finalizaci&oacute;n del trimestre ("Q") calendario de SAP. A saber:</p>
                                <ul>
                                    <li>Q2 – finaliza el 30 de junio – los ganadores se anuncian el 16 de julio, 2018.</li>
                                    <li>Q3 – finaliza el 30 de septiembre – los ganadores se anuncian el 15 de octubre, 2018.</li>
                                    <li>Q4 – finaliza el 31 de diciembre – los ganadores se anuncian 15 de enero, 2019.</li>
                                </ul>
                                <p>Esta Solapa de campa&ntilde;a correr&aacute; desde el 07 de mayo hasta el 31 de diciembre de 2018.</p>
                                <p>Solapa SAP Business One</p>
                                <ul>
                                    <li>1er puesto: Fondos de Marketing por USD 1.000</li>
                                    <li>2do puesto: Fondos de Marketing por USD 500</li>
                                </ul>
                                <p>El resultado se dar&aacute; a conocer a los 15 d&iacute;as siguientes a la finalizaci&oacute;n del Q calendario de SAP. A saber:</p>
                                <ul>
                                    <li>Q2 – finaliza el 30 de junio – los ganadores se anuncian el 16 de julio, 2018.</li>
                                    <li>Q3 – finaliza el 30 de septiembre – los ganadores se anuncian el 15 de octubre, 2018.</li>
                                </ul>
                                <p>Esta Solapa de campa&ntilde;a correr&aacute; desde el 30 de abril hasta el 30 de septiembre de 2018.</p>
                                <h2>6. Aceptaci&oacute;n de Bases</h2>
                                <p>La participaci&oacute;n en este concurso supone la plena aceptaci&oacute;n de todas y cada una de estas bases.</p>
                                <a href="https://www.sap.com/latinamerica/about/legal/privacy.html" target="_blank">https://www.sap.com/latinamerica/about/legal/privacy.html</a>
                            </div>
                        </div>
                    </div>
                    <div class="mdl-card__menu">
                        <button class="mdl-button mdl-js-button mdl-button--icon" data-dismiss="modal"><i class="mdi mdi-close"></i></button>
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