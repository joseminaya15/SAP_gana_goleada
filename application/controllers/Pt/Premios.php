<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Premios extends CI_Controller {

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
        $html  = '';
        $count = 1;
        $datos = $this->M_datos->RankingGol();
        if(count($datos) == 0){
            return;
        }
        foreach ($datos as $key) {
            $html .= '<tr>
                        <td>#'.$count.'</td>
                        <td>'.$key->Nombre_canal.'</td>
                        <td>'.$key->Nombre_capitan.'</td>
                        <td>'.$key->Pais.'</td>
                        <td>'.$key->Status.' goles</td>
                    </tr>';
            $count++;
        }
        $data['html'] = $html;
        $data['nombre_capitan'] = ucwords($this->session->userdata('Nombre_capitan'));
        $data['nombre_canal']   = ucwords($this->session->userdata('Nombre_canal'));
		$this->load->view('pt/v_premios', $data);
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