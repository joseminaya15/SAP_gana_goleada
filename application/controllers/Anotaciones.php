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
        $data['nombre_capitan'] = $this->session->userdata('Nombre_capitan');
        $data['nombre_canal']   = $this->session->userdata('Nombre_canal');
        $goles       = $this->M_datos->getTotalGoles($this->session->userdata('Nombre_canal'));
        $suma_cn = null;
        $suma_sc = null;
        $suma_cl = null;
        $suma_ca = null;
        $suma_wb = null;
        foreach ($goles as $key) {
            if($key->Id_serv == 1){
                if($key->Flag == FLAG_APROBADO){
                    $suma_cn += $key->Goles;
                }
            }
            if($key->Id_serv == 2){
                if($key->Flag == FLAG_APROBADO){
                    $suma_sc += $key->Goles;
                }
            }
            if($key->Id_serv == 3){
                if($key->Flag == FLAG_APROBADO){
                    $suma_cl += $key->Goles;
                }
            }
            if($key->Id_serv == 4){
                if($key->Flag == FLAG_APROBADO){
                    $suma_ca += $key->Goles;
                }
            }
            if($key->Id_serv == 5){
                if($key->Flag == FLAG_APROBADO){
                    $suma_wb += $key->Goles;
                }
            }
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
		$this->load->view('v_anotaciones', $data);
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
        $data['msj']   = null;
        try {
            $id_user = $this->input->post('id_user');
            $datos   = $this->M_datos->getDatosAnotaciones($id_user);
            $html    = null;
            /*foreach ($datos as $key) {
                $html .= '';
            }*/
            $data['tabla'] = $html;
            $data['error'] = EXIT_SUCCESS;
        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}