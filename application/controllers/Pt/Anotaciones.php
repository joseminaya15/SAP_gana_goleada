<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anotaciones extends CI_Controller {

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
    $data['nombre_capitan'] = ucwords($this->session->userdata('Nombre_capitan'));
    $data['nombre_canal']   = ucwords($this->session->userdata('Nombre_canal'));
    $goles   = $this->M_datos->getTotalGoles($this->session->userdata('Nombre_canal'));
    $suma_cn = null;
    $suma_sc = null;
    $suma_cl = null;
    $suma_ca = null;
    $suma_wb = null;
    $html    = null;
    $estado  = null;
    $alertas = '';
    $mensaje = null;
    $cont    = 1;
    if(count($goles) != 0){
        foreach ($goles as $key) {
          if($key->alertas == null || $key->alertas == ''){
            $alertas = 'disabled';
            $mensaje = '';
          }else {
            $alertas = '';
            $mensaje = 'message';
          }
          if($key->Id_serv == 1){
              if($key->Flag == 2){
                  $estado = '<div class="estados"><div class="circle circle-estado"><span class="green"></span></div><div class="circle"><span class="yellow"></span></div><div class="circle"><span class="red"></span></div></div>';
                  $suma_cn += $key->Goles;
                  $html .= '<tr>
                            <td>'.$key->Empresa.'</td>
                            <td class="text-center">'.$key->Deal_registration.'</td>
                            <td class="text-center">'.$key->Pais.'</td>
                            <td class="text-center">'.$estado.'</td>
                            <td class="text-center">'.$key->Goles.'</td>
                            <td class="text-center"><button id="buttonAlert'.$cont.'" class="mdl-button mdl-js-button mdl-button--icon '.$mensaje.'" onclick="showModalAlert('.$key->alertas.','.$cont.', '.$key->Id.')" '.$alertas.'><i class="mdi mdi-email"></i></button></td>
                          </tr>';
              }else {
                  if($key->Flag == 1) {
                    $estado = '<div class="estados"><div class="circle"><span class="green"></span></div><div class="circle circle-estado"><span class="yellow"></span></div><div class="circle"><span class="red"></span></div></div>';
                  } else if($key->Flag == 3) {
                    $estado = '<div class="estados"><div class="circle"><span class="green"></span></div><div class="circle"><span class="yellow"></span></div><div class="circle circle-estado"><span class="red"></span></div></div>';
                  }else {
                    $estado = '<div class="estados"><div class="circle"><span class="green"></span></div><div class="circle"><span class="yellow"></span></div><div class="circle"><span class="red"></span></div></div>';
                  }
                  $html .= '<tr>
                              <td>'.$key->Empresa.'</td>
                              <td class="text-center">'.$key->Deal_registration.'</td>
                              <td class="text-center">'.$key->Pais.'</td>
                              <td class="text-center">'.$estado.'</td>
                              <td class="text-center">--</td>
                              <td class="text-center"><button id="buttonAlert'.$cont.'" class="mdl-button mdl-js-button mdl-button--icon '.$mensaje.'" onclick="showModalAlert('.$key->alertas.','.$cont.', '.$key->Id.')" '.$alertas.'><i class="mdi mdi-email"></i></button></td>
                            </tr>';
              }
          }
          if($key->Id_serv == 2){
              if($key->Flag == 2){
                  $suma_sc += $key->Goles;
              }
          }
          if($key->Id_serv == 3){
              if($key->Flag == 2){
                  $suma_cl += $key->Goles;
              }
          }
          if($key->Id_serv == 4){
              if($key->Flag == 2){
                  $suma_ca += $key->Goles;
              }
          }
          if($key->Id_serv == 5){
              if($key->Flag == 2){
                  $suma_wb += $key->Goles;
              }
          }
          $cont++;
      }
      if($suma_cn == null){
          $suma_cn = 0;
      }
      if($suma_sc == null){
          $suma_sc = 0;
      }
      if($suma_cl == null){
          $suma_cl = 0;
      }
      if($suma_ca == null){
          $suma_ca = 0;
      }
      if($suma_wb == null){
          $suma_wb = 0;
      }
      $data['total_cn'] = $suma_cn;
      $data['total_sc'] = $suma_sc;
      $data['total_cl'] = $suma_cl;
      $data['total_ca'] = $suma_ca;
      $data['total_wb'] = $suma_wb;
      $data['tabla']    = $html;
    }else {
      $data['tabla']    = '';    
      $data['total_cn'] = 0;
      $data['total_sc'] = 0;
      $data['total_cl'] = 0;
      $data['total_ca'] = 0;
      $data['total_wb'] = 0;
    }
		$this->load->view('pt/v_anotaciones', $data);
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
    function getDatosAnotaciones(){
       $data['error'] = EXIT_ERROR;
        $data['msj']  = null;
        try {
            $id_user = $this->input->post('id_serv');
            $goles   = $this->M_datos->getTotalGoles($this->session->userdata('Nombre_canal'));
            $html1   = null;
            $html2   = null;
            $html3   = null;
            $html4   = null;
            $html5   = null;
            $estado  = null;
            $mensaje = null;
            $alertas = '';
            $cont    = 1;
            if(count($goles) != 0) {
              foreach ($goles as $key) {
                  if($key->alertas == null || $key->alertas == ''){
                    $alertas = 'disabled';
                    $mensaje = '';
                  }else {
                    $alertas = '';
                    $mensaje = 'message';
                  }
                  if($id_user == 1){
                      if($key->Id_serv == 1){
                        if($key->Flag == FLAG_APROBADO){
                            $estado = '<div class="estados"><div class="circle circle-estado"><span class="green"></span></div><div class="circle"><span class="yellow"></span></div><div class="circle"><span class="red"></span></div></div>';
                            $html1 .= '<tr>
                                      <td>'.$key->Empresa.'</td>
                                      <td class="text-center">'.$key->Deal_registration.'</td>
                                      <td class="text-center">'.$key->Pais.'</td>
                                      <td class="text-center">'.$estado.'</td>
                                      <td class="text-center">'.$key->Goles.'</td>
                                      <td class="text-center"><button id="buttonAlert'.$cont.'" class="mdl-button mdl-js-button mdl-button--icon '.$mensaje.'" onclick="showModalAlert('.$key->alertas.','.$cont.', '.$key->Id.')" '.$alertas.'><i class="mdi mdi-email"></i></button></td>
                                    </tr>';
                        }else {
                            if($key->Flag == 1) {
                              $estado = '<div class="estados"><div class="circle"><span class="green"></span></div><div class="circle circle-estado"><span class="yellow"></span></div><div class="circle"><span class="red"></span></div></div>';
                            } else if($key->Flag == 3) {
                              $estado = '<div class="estados"><div class="circle"><span class="green"></span></div><div class="circle"><span class="yellow"></span></div><div class="circle circle-estado"><span class="red"></span></div></div>';
                            }
                            $html1 .= '<tr>
                                      <td>'.$key->Empresa.'</td>
                                      <td class="text-center">'.$key->Deal_registration.'</td>
                                      <td class="text-center">'.$key->Pais.'</td>
                                      <td class="text-center">'.$estado.'</td>
                                      <td class="text-center">--</td>
                                      <td class="text-center"><button id="buttonAlert'.$cont.'" class="mdl-button mdl-js-button mdl-button--icon '.$mensaje.'" onclick="showModalAlert('.$key->alertas.','.$cont.', '.$key->Id.')" '.$alertas.'><i class="mdi mdi-email"></i></button></td>
                                    </tr>';
                        }
                      } 
                  }
                  if($id_user == 2){
                    if($key->Id_serv == 2){
                        if($key->Flag == FLAG_APROBADO){
                          $estado = '<div class="estados"><div class="circle circle-estado"><span class="green"></span></div><div class="circle"><span class="yellow"></span></div><div class="circle"><span class="red"></span></div></div>';
                          $html2 .= '<tr>
                                    <td>'.$key->Empresa.'</td>
                                    <td class="text-center">'.$key->Deal_registration.'</td>
                                    <td class="text-center">'.$key->Pais.'</td>
                                    <td class="text-center">'.$estado.'</td>
                                    <td class="text-center">'.$key->Goles.'</td>
                                    <td class="text-center"><button id="buttonAlert'.$cont.'" class="mdl-button mdl-js-button mdl-button--icon '.$mensaje.'" onclick="showModalAlert('.$key->alertas.','.$cont.', '.$key->Id.')" '.$alertas.'><i class="mdi mdi-email"></i></button></td>
                                  </tr>';
                      }else {
                          if($key->Flag == 1) {
                            $estado = '<div class="estados"><div class="circle"><span class="green"></span></div><div class="circle circle-estado"><span class="yellow"></span></div><div class="circle"><span class="red"></span></div></div>';
                          } else if($key->Flag == 3) {
                            $estado = '<div class="estados"><div class="circle"><span class="green"></span></div><div class="circle"><span class="yellow"></span></div><div class="circle circle-estado"><span class="red"></span></div></div>';
                          }
                          $html2 .= '<tr>
                                    <td>'.$key->Empresa.'</td>
                                    <td class="text-center">'.$key->Deal_registration.'</td>
                                    <td class="text-center">'.$key->Pais.'</td>
                                    <td class="text-center">'.$estado.'</td>
                                    <td class="text-center">--</td>
                                    <td class="text-center"><button id="buttonAlert'.$cont.'" class="mdl-button mdl-js-button mdl-button--icon '.$mensaje.'" onclick="showModalAlert('.$key->alertas.','.$cont.', '.$key->Id.')" '.$alertas.'><i class="mdi mdi-email"></i></button></td>
                                  </tr>';
                      }
                    }
                  }
                  if($id_user == 3){
                    if($key->Id_serv == 3){
                        if($key->Flag == FLAG_APROBADO){
                          $estado = '<div class="estados"><div class="circle circle-estado"><span class="green"></span></div><div class="circle"><span class="yellow"></span></div><div class="circle"><span class="red"></span></div></div>';
                          $html3 .= '<tr>
                                    <td>'.$key->Empresa.'</td>
                                    <td class="text-center">'.$key->Deal_registration.'</td>
                                    <td class="text-center">'.$key->Pais.'</td>
                                    <td class="text-center">'.$estado.'</td>
                                    <td class="text-center">'.$key->Goles.'</td>
                                    <td class="text-center"><button id="buttonAlert'.$cont.'" class="mdl-button mdl-js-button mdl-button--icon '.$mensaje.'" onclick="showModalAlert('.$key->alertas.','.$cont.', '.$key->Id.')" '.$alertas.'><i class="mdi mdi-email"></i></button></td>
                                  </tr>';
                      }else {
                          if($key->Flag == 1) {
                            $estado = '<div class="estados"><div class="circle"><span class="green"></span></div><div class="circle circle-estado"><span class="yellow"></span></div><div class="circle"><span class="red"></span></div></div>';
                          } else if($key->Flag == 3) {
                            $estado = '<div class="estados"><div class="circle"><span class="green"></span></div><div class="circle"><span class="yellow"></span></div><div class="circle circle-estado"><span class="red"></span></div></div>';
                          }
                          $html3 .= '<tr>
                                    <td>'.$key->Empresa.'</td>
                                    <td class="text-center">'.$key->Deal_registration.'</td>
                                    <td class="text-center">'.$key->Pais.'</td>
                                    <td class="text-center">'.$estado.'</td>
                                    <td class="text-center">--</td>
                                    <td class="text-center"><button id="buttonAlert'.$cont.'" class="mdl-button mdl-js-button mdl-button--icon '.$mensaje.'" onclick="showModalAlert('.$key->alertas.','.$cont.', '.$key->Id.')" '.$alertas.'><i class="mdi mdi-email"></i></button></td>
                                  </tr>';
                      }
                    }
                  }
                  if($id_user == 4){
                    if($key->Id_serv == 4){
                        if($key->Flag == FLAG_APROBADO){
                          $estado = '<div class="estados"><div class="circle circle-estado"><span class="green"></span></div><div class="circle"><span class="yellow"></span></div><div class="circle"><span class="red"></span></div></div>';
                          $html4 .= '<tr>
                                    <td>'.$key->Empresa.'</td>
                                    <td class="text-center">'.$key->Deal_registration.'</td>
                                    <td class="text-center">'.$key->Pais.'</td>
                                    <td class="text-center">'.$estado.'</td>
                                    <td class="text-center">'.$key->Goles.'</td>
                                    <td class="text-center"><button id="buttonAlert'.$cont.'" class="mdl-button mdl-js-button mdl-button--icon '.$mensaje.'" onclick="showModalAlert('.$key->alertas.','.$cont.', '.$key->Id.')" '.$alertas.'><i class="mdi mdi-email"></i></button></td>
                                  </tr>';
                      }else {
                          if($key->Flag == 1) {
                            $estado = '<div class="estados"><div class="circle"><span class="green"></span></div><div class="circle circle-estado"><span class="yellow"></span></div><div class="circle"><span class="red"></span></div></div>';
                          } else if($key->Flag == 3) {
                            $estado = '<div class="estados"><div class="circle"><span class="green"></span></div><div class="circle"><span class="yellow"></span></div><div class="circle circle-estado"><span class="red"></span></div></div>';
                          }
                          $html4 .= '<tr>
                                    <td>'.$key->Empresa.'</td>
                                    <td class="text-center">'.$key->Deal_registration.'</td>
                                    <td class="text-center">'.$key->Pais.'</td>
                                    <td class="text-center">'.$estado.'</td>
                                    <td class="text-center">--</td>
                                    <td class="text-center"><button id="buttonAlert'.$cont.'" class="mdl-button mdl-js-button mdl-button--icon '.$mensaje.'" onclick="showModalAlert('.$key->alertas.','.$cont.', '.$key->Id.')" '.$alertas.'><i class="mdi mdi-email"></i></button></td>
                                  </tr>';
                      }
                    }
                  }
                  if($id_user == 5){
                    if($key->Id_serv == 5){
                        if($key->Flag == FLAG_APROBADO){
                          $estado = '<div class="estados"><div class="circle circle-estado"><span class="green"></span></div><div class="circle"><span class="yellow"></span></div><div class="circle"><span class="red"></span></div></div>';
                          $html5 .= '<tr>
                                    <td>'.$key->Empresa.'</td>
                                    <td class="text-center">'.$key->Deal_registration.'</td>
                                    <td class="text-center">'.$key->Pais.'</td>
                                    <td class="text-center">'.$estado.'</td>
                                    <td class="text-center">'.$key->Goles.'</td>
                                    <td class="text-center"><button id="buttonAlert'.$cont.'" class="mdl-button mdl-js-button mdl-button--icon '.$mensaje.'" onclick="showModalAlert('.$key->alertas.','.$cont.', '.$key->Id.')" '.$alertas.'><i class="mdi mdi-email"></i></button></td>
                                  </tr>';
                      }else {
                          if($key->Flag == 1) {
                            $estado = '<div class="estados"><div class="circle"><span class="green"></span></div><div class="circle circle-estado"><span class="yellow"></span></div><div class="circle"><span class="red"></span></div></div>';
                          } else if($key->Flag == 3) {
                            $estado = '<div class="estados"><div class="circle"><span class="green"></span></div><div class="circle"><span class="yellow"></span></div><div class="circle circle-estado"><span class="red"></span></div></div>';
                          }
                          $html5 .= '<tr>
                                    <td>'.$key->Empresa.'</td>
                                    <td class="text-center">'.$key->Deal_registration.'</td>
                                    <td class="text-center">'.$key->Pais.'</td>
                                    <td class="text-center">'.$estado.'</td>
                                    <td class="text-center">--</td>
                                    <td class="text-center"><button id="buttonAlert'.$cont.'" class="mdl-button mdl-js-button mdl-button--icon '.$mensaje.'" onclick="showModalAlert('.$key->alertas.','.$cont.', '.$key->Id.')" '.$alertas.'><i class="mdi mdi-email"></i></button></td>
                                  </tr>';
                      }
                    }
                  }
              }
              $cont++;
            }
            if($id_user == 1){
              $data['tabla'] = $html1;
            }
            if($id_user == 2){
              $data['tabla'] = $html2;
            }
            if($id_user == 3){
              $data['tabla'] = $html3;
            }
            if($id_user == 4){
              $data['tabla'] = $html4;
            }
            if($id_user == 5){
              $data['tabla'] = $html5;
            }
            $data['error'] = EXIT_SUCCESS;
        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }

    function showModalAlert(){
      $data['error'] = EXIT_ERROR;
      $data['msj']   = null;
      try {
          $Id_anotacion = $this->input->post('id');
          $motivo       = $this->M_datos->getDatosAnotacionById($Id_anotacion);
          $arrUpdt = array('alertas' => NULL);
          $this->M_datos->updateDatos($arrUpdt, $Id_anotacion, 'anotaciones');
          $data['motivo'] = ($motivo[0]->motivo == null) ? '-': $motivo[0]->motivo;
          $data['error'] = EXIT_SUCCESS;
      } catch (Exception $e){
          $data['msj'] = $e->getMessage();
      }
      echo json_encode($data);
    }
}