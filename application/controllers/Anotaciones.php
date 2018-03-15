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
        $datos                  = $this->M_datos->getTotal(1);
        $data['total']          = $datos[0]->total;
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