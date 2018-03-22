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
        $datos = $this->M_datos->getDatosAdmin();
        $html  = null;
        foreach ($datos as $key){
           $html .= '<tr>
                        <td>'.$key->Deal_number.'</td>
                        <td>'.$key->Nombre_canal.'</td>
                        <td>'.$key->Nombre_capitan.'</td>
                        <td>'.$key->Pais.'</td>
                        <td>'.$key->Status.' goles</td>
                        <td>
                        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login" onclick="anular();">Anular</button>
                        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-login" onclick="aceptar();">Aceptar</button>
                        </td>
                    </tr>';
        }
        $data['tabla'] = $html;
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
}