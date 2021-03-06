<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge">
    <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description"            content="SAP Gana por Goleada">
    <meta name="keywords"               content="SAP Gana por Goleada">
    <meta name="robots"                 content="Index,Follow">
    <meta name="date"                   content="January 25, 2018"/>
    <meta name="language"               content="es">
    <meta name="theme-color"            content="#000000">
	  <title>SAP Gana por Goleada</title>
    <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/logo_favicon.png">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet"    href="https://cdn.datatables.net/autofill/2.2.2/css/autoFill.dataTables.min.css">
    <link rel="stylesheet"    href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet"    href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css">
    <link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
    <style type="text/css">
        body{
            background-color: #EDEDED;
        }
    </style>
<body>
    <section id="principal">
        <div class="header">
            <div class="header-left">
                <a href="Menu"><img class="logo-header" src="<?php echo RUTA_IMG?>logo/logo_admin.svg"></a>
            </div>
            <div class="header-right">
                <h2 class="">Concurso para partners SMB</h2>
                <div class="background background1"></div>
                <div class="background background2"></div>
                <div class="background background3"></div>
            </div>
        </div>
        <div id="content" class="mdl-card-container">
            <div class="col-xs-12 header-admin">
                <img src="<?php echo RUTA_IMG?>logo/logo_login.png">
                <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-logout m-t-50" onclick="cerrarCesion()">Cerrar Sesión</a>
            </div>
            <div class="mdl-card mdl-card-table md-admin">
                <div class="table-responsive">
                    <table id="example" class="display table table-bordered table-hover dt-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr class="tr-header-reporte">
                                <th class="text-center">Deal ID #</th>
                                <th class="text-left">Oportunidad</th>
                                <th class="text-left">Nombre Empresa</th>
                                <th class="text-left">Nombre Canal</th>
                                <th class="text-left">Nombre Capitán</th>
                                <th class="text-left">Pa&iacute;s</th>
                                <th class="text-left">Descripci&oacute;n</th>
                                <th class="text-left" width="80">Fecha</th>
                                <th class="text-left">Estado</th>
                                <th class="text-center" width="120">Acción</th>
                            </tr>
                        </thead>
                      <tbody id="tabla">
                          <?php echo $tabla ?>  
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade modal-center" id="modalAnular" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="mdl-card js-anular">
                    <div class="mdl-card__title">
                        <h2>¿Estas seguro de rechazar esta oportunidad?</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="form-group">
                            <textarea type="texto" rows="3" class="form-control" placeholder="Motivo de rechazo" id="empresa"></textarea>
                        </div>
                    </div>
                    <div class="mdl-card__actions text-right">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button js-default" data-dismiss="modal">Cancelar</button>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect js-button" onclick="confirmarAnulacion()">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/jquery.easy-autocomplete.min.js"></script> 
    <script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>login.js?v=<?php echo time();?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable( {
                responsive: true,
                dom: 'Bfrtip',
                lengthMenu: [
                            [ 10, 25, 50, -1 ],
                            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                          ],
                          buttons: [
                             'pageLength',
                             'excel', 'print'
                          ]
            });
            $('.buttons-excel').empty();
            $('.buttons-print').empty();
            $('.buttons-excel').append('<i class="fa fa-download"></i>');
            $('.buttons-print').append('<i class="fa fa-print"></i>');
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>
</body>
</html>