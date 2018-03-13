<?php

class M_datos extends  CI_Model{
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

    function updateDatos($arrayData, $id, $tabla){
        $this->db->where('Id'  , $id);
        $this->db->update($tabla, $arrayData);
        if ($this->db->trans_status() == false) {
            throw new Exception('No se pudo actualizar los datos');
        }
        return array('error' => EXIT_SUCCESS,'msj' => MSJ_UPT);
    }

    function getTotal($id_serv) {
        $sql = "SELECT SUM(a.Goles) AS total
                  FROM anotaciones a
                 WHERE Id_serv = ?";
        $result = $this->db->query($sql, $id_serv);
        return $result->result();
    }

    function getDatosAnotaciones($id_serv){
        $sql = "SELECT a.*
                  FROM anotaciones a
                 WHERE Id_serv = ?";
        $result = $this->db->query($sql, $id_serv);
        return $result->result();
    }
}