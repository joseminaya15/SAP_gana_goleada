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
        $data['nombre_capitan'] = ucwords($this->session->userdata('Nombre_capitan'));
        $data['nombre_canal']   = ucwords($this->session->userdata('Nombre_canal'));
        $goles                  = $this->M_datos->getRankGolesNorte();
        $html                   = null;
        $count                  = 1;
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
        $goles1 = $this->M_datos->getRankGolesNorte();
        $html1  = null;
        $count1 = 1;
        foreach ($goles1 as $key) {
            $html1 .= '<tr>
                        <td>#'.$count1.'</td>
                        <td>'.$key->Nombre_canal.'</td>
                        <td>'.$key->Nombre_capitan.'</td>
                        <td>'.$key->Pais.'</td>
                        <td>'.$key->Status.' goles</td>
                    </tr>';
            $count1++;
        }
        $data['tabla1'] = $html1;
        $goles2 = $this->M_datos->getRankGolesSur();
        $html2  = null;
        $count2 = 1;
        foreach ($goles2 as $key) {
            $html2 .= '<tr>
                        <td>#'.$count2.'</td>
                        <td>'.$key->Nombre_canal.'</td>
                        <td>'.$key->Nombre_capitan.'</td>
                        <td>'.$key->Pais.'</td>
                        <td>'.$key->Status.' goles</td>
                    </tr>';
            $count2++;
        }
        $data['tabla2'] = $html2;
        $goles3 = $this->M_datos->getRankGolesBrasil();
        $html3  = null;
        $count3 = 1;
        foreach ($goles3 as $key) {
            $html3 .= '<tr>
                        <td>#'.$count3.'</td>
                        <td>'.$key->Nombre_canal.'</td>
                        <td>'.$key->Nombre_capitan.'</td>
                        <td>'.$key->Pais.'</td>
                        <td>'.$key->Status.' goles</td>
                    </tr>';
            $count3++;
        }
        $data['tabla3'] = $html3;
        $goles4 = $this->M_datos->getRankGolesMexico();
        $html4  = null;
        $count4 = 1;
        foreach ($goles4 as $key) {
            $html4 .= '<tr>
                        <td>#'.$count4.'</td>
                        <td>'.$key->Nombre_canal.'</td>
                        <td>'.$key->Nombre_capitan.'</td>
                        <td>'.$key->Pais.'</td>
                        <td>'.$key->Status.' goles</td>
                    </tr>';
            $count4++;
        }
        $data['tabla4'] = $html4;
        $goles5 = $this->M_datos->getRankGolesGeneral();
        $html5  = null;
        $count5 = 1;
        foreach ($goles5 as $key) {
            $html5 .= '<tr>
                        <td>#'.$count5.'</td>
                        <td>'.$key->Nombre_canal.'</td>
                        <td>'.$key->Nombre_capitan.'</td>
                        <td>'.$key->Pais.'</td>
                        <td>'.$key->Status.' goles</td>
                    </tr>';
            $count5++;
        }
        $data['tabla5'] = $html5;
		$this->load->view('es/v_ranking_goleadores', $data);
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