<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nueva_anotacion extends CI_Controller {

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
		$this->load->view('v_nueva_anotacion', $data);
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

    function nuevaAnotacion(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try{
            $empresa  = $this->input->post('empresa');
            $deal_reg = $this->input->post('deal_regis');
            $pais     = $this->input->post('pais');
            $fecha    = $this->input->post('fecha');
            $goles    = $this->input->post('goles');
            $servicio = $this->input->post('servicio');
            $id_serv  = null;
            $arr_fecha = explode("/", $fecha);
            if(checkdate($arr_fecha[1], $arr_fecha[0], $arr_fecha[2]) == false){
                $data['msj'] = 'La fecha ingresada no es correcta';
            }else {
                if($servicio == 'Cuentas nuevas (NNN)'){
                    $id_serv = 1;
                }else if($servicio == 'Oportunidades generadas de Social Selling'){
                    $id_serv = 2;
                }else if($servicio == 'Oportunidades generadas para Cloud'){
                    $id_serv = 3;
                }else if($servicio == 'Casos de éxitos de clientes aprobados'){
                    $id_serv = 4;
                }else if($servicio == 'Won & Booked (W/B)'){
                    $id_serv = 5;
                }
                $dataInsert = array('Empresa'  => $empresa,
                                    'Deal_registration' => $deal_reg,
                                    'Pais'    => $pais,
                                    'Flag'    => FLAG_PENDIENTE,
                                    'Goles'   => $goles,
                                    'Id_serv' => $id_serv,
                                    'id_user' => $this->session->userdata('Id_user'));
                $datosInsert = $this->M_datos->insertarDatos($dataInsert, 'anotaciones');
                //$datos       = $this->M_datos->getTotal($id_serv, $this->session->userdata('Id_user'));
                /*$goles       = $this->M_datos->getTotalGoles($this->session->userdata('Nombre_canal'));
                $suma = null;
                foreach ($datos as $key) {
                   if($key->Flag == FLAG_APROBADO){
                        $suma += $key->goles;
                   }
                }
                if($suma == null){
                    $suma = $goles[0]->Total;
                }
                $arrUpdate   = array('Total' => $suma);
                $this->M_datos->updateDatos($arrUpdate, $id_serv, 'servicios');*/
            }
        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}