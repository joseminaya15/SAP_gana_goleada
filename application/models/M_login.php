<?php

class M_login extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function insertarDatos($arrayInsert, $tabla){
        $this->db->insert($tabla, $arrayInsert);
        $sol = $this->db->insert_id();
        if($this->db->affected_rows() != 1) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
        }
        return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "Id" => $sol);
    }

    function verificarUsuario($user) {
        $sql = "SELECT *
                  FROM users
                 WHERE usuario LIKE '%".$user."%'";
        $result = $this->db->query($sql);
        return $result->result();
    }
}