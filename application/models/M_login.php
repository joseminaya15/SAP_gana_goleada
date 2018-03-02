<?php

class M_correo extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

   /* function insertarDatos($arrayInsert, $tabla){
        $this->db->insert($tabla, $arrayInsert);
        $sol = $this->db->insert_id();
        if($this->db->affected_rows() != 1) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
        }
        return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "Id" => $sol);
    }*/

    function getDatosCorreos($user) {
        $sql = "SELECT *
                  FROM usuarios
                 WHERE Email LIKE ?";
        $result = $this->db->query($sql, array($user));
        return $result->result();
    }
}