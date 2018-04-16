<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model('M_datos');
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
  }
	public function index(){
    if($this->session->userdata('usuario') == null){
        header("location: Login");
    }
    $datos = $this->M_datos->getDatosAdmin();
    if(count($datos) == 0){
        $data['tabla'] = '';
    }else {
        $html      = null;
        $count     = 1;
        $i         = 1;
        $disabled  = '';
        $estado    = '';
        $disabled2 = '';
        foreach ($datos as $key){
           if($key->Flag == 1){
              $estado    = 'Pendiente';
           }
           if($key->Flag == 2){
              $estado    = 'Aprobado';
           }
           if($key->Flag == 3) {
              $disabled  = 'disabled';
              $estado    = 'Rechazado';
           }
           if($key->alertas == 1 || $key->Flag == 2 || $key->Flag == 3){
              $disabled2 = 'disabled';
           }else {
              $disabled2 = '';
           }
           $html .= '<tr>
                        <td class="text-center">'.$key->Deal_registration.'</td>
                        <td class="text-left">'.$key->Tipo_serv.'</td>
                        <td class="text-left">'.$key->Nombre_canal.'</td>
                        <td class="text-left">'.$key->Nombre_capitan.'</td>
                        <td class="text-left">'.$key->Pais.'</td>
                        <td class="text-left">'.$estado.'</td>
                        <td class="text-center">
                        <button type="button" class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Rechazar" onclick="anular('.$key->Id.', '.$count.');" id="btnanular'.$count.'" '.$disabled.'><i class="mdi mdi-close"></i></button>
                        <button type="button" class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Aprobar" onclick="aceptar('.$key->Id.', '.$count.');" id="btnaceptar'.$count.'" '.$disabled.'><i class="mdi mdi-done"></i></button>
                        <button type="button" class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Observar" onclick="contactar('.$key->Id.', '.$i.');" id="btncontactar'.$i.'" '.$disabled2.'><i class="mdi mdi-warning"></i></button>
                        </td>
                    </tr>';
            $count++;
        }
        $data['tabla'] = $html;
    }
		$this->load->view('v_admin', $data);
	}
  function cerrarCesion(){
    $data['error'] = EXIT_ERROR;
    $data['msj']   = null;
    try {
        $this->session->unset_userdata('usuario');
        $this->session->unset_userdata('Id_user');
        $data['error'] = EXIT_SUCCESS;
    } catch (Exception $e){
        $data['msj'] = $e->getMessage();
    }
    echo json_encode($data);
  }
  function anularAnotacion(){
    $data['error'] = EXIT_ERROR;
    $data['msj']   = null;
    try {
        $id_serv   = $this->input->post('id_serv');
        $arrUpdt   = array('Flag' => FLAG_RECHAZADO,
                            'alertas' => FLAG_RECHAZADO);
        $datosUpdt = $this->M_datos->updateDatos($arrUpdt, $id_serv, 'anotaciones');
        $datos     = $this->M_datos->getDatosAdmin();
        $count     = 1;
        $i         = 1;
        $disabled  = '';
        $estado    = '';
        $disabled2 = '';
        if(count($datos) == 0){
            $data['tabla'] = '';
        }else {
            $html = null;
            foreach ($datos as $key){
               if($key->Flag == 1){
                  $estado    = 'Pendiente';
               }
               if($key->Flag == 2){
                  $estado    = 'Aprobado';
               }
               if($key->Flag == 3) {
                  $disabled  = 'disabled';
                  $estado    = 'Rechazado';
               }
               if($key->alertas == 1 || $key->Flag == 2 || $key->Flag == 3){
                  $disabled2 = 'disabled';
               }else {
                  $disabled2 = '';
               }
               $html .= '<tr>
                            <td class="text-center">'.$key->Deal_registration.'</td>
                            <td class="text-left">'.$key->Tipo_serv.'</td>
                            <td class="text-left">'.$key->Nombre_canal.'</td>
                            <td class="text-left">'.$key->Nombre_capitan.'</td>
                            <td class="text-left">'.$key->Pais.'</td>
                            <td class="text-left">'.$estado.'</td>
                            <td class="text-center">
                            <button type="button" class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Rechazar" onclick="anular('.$key->Id.', '.$count.');" id="btnanular'.$count.'" '.$disabled.'><i class="mdi mdi-close"></i></button>
                            <button type="button" class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Aprobar" onclick="aceptar('.$key->Id.', '.$count.');" id="btnaceptar'.$count.'" '.$disabled.'><i class="mdi mdi-done"></i></button>
                            </td>
                            <td class="text-center">
                            <button type="button" class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Observar" onclick="contactar('.$key->Id.', '.$i.');" id="btncontactar'.$i.'" '.$disabled2.'><i class="mdi mdi-warning"></i></button>
                            </td>
                        </tr>';
                $count++;
            }
            $data['tabla'] = $html;
        }
        $data['error'] = EXIT_SUCCESS;
    } catch (Exception $e){
        $data['msj'] = $e->getMessage();
    }
    echo json_encode($data);
  }
  function aceptarAnotacion(){
    $data['error'] = EXIT_ERROR;
    $data['msj']   = null;
    try {
        $id_serv   = $this->input->post('id_serv');
        $arrUpdt   = array('Flag' => FLAG_APROBADO,
                           'alertas' => FLAG_APROBADO);
        $datosUpdt = $this->M_datos->updateDatos($arrUpdt, $id_serv, 'anotaciones');
        $datos     = $this->M_datos->getDatosAdmin();
        $count     = 1;
        $i         = 1;
        $disabled  = '';
        $estado    = '';
        $disabled2 = '';
        if(count($datos) == 0){
            $data['tabla'] = '';
        }else {
            $html = null;
            foreach ($datos as $key){
               if($key->Flag == 1){
                  $estado    = 'Pendiente';
               }
               if($key->Flag == 2){
                  $estado    = 'Aprobado';
               }
               if($key->Flag == 3) {
                  $disabled  = 'disabled';
                  $estado    = 'Rechazado';
               }
               if($key->alertas == 1 || $key->Flag == 2 || $key->Flag == 3){
                  $disabled2 = 'disabled';
               }else if($key->alertas != 1 || $key->Flag == 1){
                  $disabled2 = '';
               }
               $html .= '<tr>
                            <td class="text-center">'.$key->Deal_registration.'</td>
                            <td class="text-left">'.$key->Tipo_serv.'</td>
                            <td class="text-left">'.$key->Nombre_canal.'</td>
                            <td class="text-left">'.$key->Nombre_capitan.'</td>
                            <td class="text-left">'.$key->Pais.'</td>
                            <td class="text-left">'.$estado.'</td>
                            <td class="text-center">
                            <button type="button" class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Rechazar" onclick="anular('.$key->Id.', '.$count.');" id="btnanular'.$count.'" '.$disabled.'><i class="mdi mdi-close"></i></button>
                            <button type="button" class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Aprobar" onclick="aceptar('.$key->Id.', '.$count.');" id="btnaceptar'.$count.'" '.$disabled.'><i class="mdi mdi-done"></i></button>
                            </td>
                            <td class="text-center">
                            <button type="button" class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Observar" onclick="contactar('.$key->Id.', '.$i.');" id="btncontactar'.$i.'" '.$disabled2.'><i class="mdi mdi-warning"></i></button>
                            </td>
                        </tr>';
                $count++;
            }
            $data['tabla'] = $html;
        }
        $data['error'] = EXIT_SUCCESS;
    } catch (Exception $e){
        $data['msj'] = $e->getMessage();
    }
    echo json_encode($data);
  }
  function contactarUser(){
    $data['error'] = EXIT_ERROR;
    $data['msj']   = null;
    try {
        $id_serv   = $this->input->post('id_serv');
        $arrUpdt   = array('alertas' => FLAG_PENDIENTE);
        $datosUpdt = $this->M_datos->updateDatos($arrUpdt, $id_serv, 'anotaciones');
        $datos     = $this->M_datos->getDatosAdmin();
        $count     = 1;
        $i         = 1;
        $disabled  = '';
        $estado    = '';
        $disabled2 = '';
        if(count($datos) == 0){
            $data['tabla'] = '';
        }else {
            $html = null;
            foreach ($datos as $key){
               if($key->Flag == 1){
                  $estado    = 'Pendiente';
               }
               if($key->Flag == 2){
                  $estado    = 'Aprobado';
               }
               if($key->Flag == 3) {
                  $disabled  = 'disabled';
                  $estado    = 'Rechazado';
               }
               if($key->alertas == 1 || $key->Flag == 2 || $key->Flag == 3){
                  $disabled2 = 'disabled';
               }else {
                  $disabled2 = '';
               }
               $html .= '<tr>
                            <td class="text-center">'.$key->Deal_registration.'</td>
                            <td class="text-left">'.$key->Tipo_serv.'</td>
                            <td class="text-left">'.$key->Nombre_canal.'</td>
                            <td class="text-left">'.$key->Nombre_capitan.'</td>
                            <td class="text-left">'.$key->Pais.'</td>
                            <td class="text-left">'.$estado.'</td>
                            <td class="text-center">
                            <button type="button" class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Rechazar" onclick="anular('.$key->Id.', '.$count.');" id="btnanular'.$count.'" '.$disabled.'><i class="mdi mdi-close"></i></button>
                            <button type="button" class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Aprobar" onclick="aceptar('.$key->Id.', '.$count.');" id="btnaceptar'.$count.'" '.$disabled.'><i class="mdi mdi-done"></i></button>
                            </td>
                            <td class="text-center">
                            <button type="button" class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Observar" onclick="contactar('.$key->Id.', '.$i.');" id="btncontactar'.$i.'" '.$disabled2.'><i class="mdi mdi-warning"></i></button>
                            </td>
                        </tr>';
                $count++;
                $i++;
            }
            $data['tabla'] = $html;
        }
        $data['error'] = EXIT_SUCCESS;
    } catch (Exception $e){
        $data['msj'] = $e->getMessage();
    }
    echo json_encode($data);
  }
}