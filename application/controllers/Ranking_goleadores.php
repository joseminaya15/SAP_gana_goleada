<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ranking_goleadores extends CI_Controller {

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
        $goles = $this->M_datos->getRankGoles($this->session->userdata('Nombre_canal'));
        $html  = null;
        $count = 1;
        foreach ($goles as $key) {
            $html .= '<tr>
                        <td>#'.$count.'</td>
                        <td>'.$key->Nombre_canal.'</td>
                        <td>'.$key->Nombre_capitan.'</td>
                        <td>'.$key->Pais.'</td>
                        <td>'.$key->Status.' goles</td>
                    </tr>';
            $count++;
        }
        $data['tabla'] = $html;
		$this->load->view('v_ranking_goleadores', $data);
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