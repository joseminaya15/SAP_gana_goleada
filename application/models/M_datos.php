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
    function getDatosAnotaciones($id_serv){
        $sql = "SELECT a.*
                  FROM anotaciones a
                 WHERE Id_serv = ?";
        $result = $this->db->query($sql, $id_serv);
        return $result->result();
    }
    function getTotalGoles($empresa){
        $sql = "SELECT s.*,
                       a.*,
                       a.Id AS serv,
                       u.Nombre_canal,
                       u.Nombre_capitan,
                       u.Pais AS Pais_pers
                  FROM servicios s,
                       anotaciones a,
                       users u
                 WHERE a.Id_serv = s.Id
                   AND a.id_user = u.Id
                   AND u.Nombre_canal LIKE '%".$empresa."%'";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getRankGoles(){
        $sql = "SELECT s.*,
                       a.*,
                       u.Nombre_canal,
                       u.Nombre_capitan,
                       u.Pais,
                       SUM(a.Goles) as Status
                  FROM servicios s,
                       anotaciones a,
                       users u
                 WHERE a.Id_serv = s.Id
                   AND a.id_user = u.Id
                   AND a.Flag = 2
              GROUP BY a.id_user
              ORDER BY SUM(a.Goles) DESC
              LIMIT 5";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getDatosAdmin($lenguaje){
        $sql = "SELECT a.Id,
                       a.Deal_registration,
                       a.Flag,
                       s.Tipo_serv,
                       u.Nombre_canal,
                       u.Nombre_capitan,
                       u.Pais,
                       a.alertas
                  FROM servicios s,
                       anotaciones a,
                       users u
                 WHERE a.Id_serv = s.Id
                   AND a.id_user = u.Id
                   AND a.Flag IN (1,3)
                   AND a.lenguaje LIKE '%".$lenguaje."%'
              ORDER BY a.Flag ASC";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getRankGolesNorte(){
        $sql = "SELECT s.*,
                       a.*,
                       u.Nombre_canal,
                       u.Nombre_capitan,
                       u.Pais,
                       SUM(a.Goles) as Status
                  FROM servicios s,
                       anotaciones a,
                       users u
                 WHERE a.Id_serv = s.Id
                   AND a.id_user = u.Id
                   AND a.Flag = 2
                   AND a.Pais IN ('Colombia','Costa Rica','Ecuador','El Salvador','Honduras','Nicaragua','Panamá','Puerto Rico','República Dominicana','Venezuela')
              GROUP BY a.id_user
              ORDER BY SUM(a.Goles) DESC
              LIMIT 5";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getRankGolesSur(){
        $sql = "SELECT s.*,
                       a.*,
                       u.Nombre_canal,
                       u.Nombre_capitan,
                       u.Pais,
                       SUM(a.Goles) as Status
                  FROM servicios s,
                       anotaciones a,
                       users u
                 WHERE a.Id_serv = s.Id
                   AND a.id_user = u.Id
                   AND a.Flag = 2
                   AND a.Pais IN ('Argentina','Bolivia','Chile','Paraguay','Perú','Uruguay')
              GROUP BY a.id_user
              ORDER BY SUM(a.Goles) DESC
              LIMIT 5";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getRankGolesBrasil(){
        $sql = "SELECT s.*,
                       a.*,
                       u.Nombre_canal,
                       u.Nombre_capitan,
                       u.Pais,
                       SUM(a.Goles) as Status
                  FROM servicios s,
                       anotaciones a,
                       users u
                 WHERE a.Id_serv = s.Id
                   AND a.id_user = u.Id
                   AND a.Flag = 2
                   AND a.Pais IN ('Brasil')
              GROUP BY a.id_user
              ORDER BY SUM(a.Goles) DESC
              LIMIT 5";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getRankGolesMexico(){
        $sql = "SELECT s.*,
                       a.*,
                       u.Nombre_canal,
                       u.Nombre_capitan,
                       u.Pais,
                       SUM(a.Goles) as Status
                  FROM servicios s,
                       anotaciones a,
                       users u
                 WHERE a.Id_serv = s.Id
                   AND a.id_user = u.Id
                   AND a.Flag = 2
                   AND a.Pais IN ('México')
              GROUP BY a.id_user
              ORDER BY SUM(a.Goles) DESC
              LIMIT 5";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getRankGolesGeneral(){
      $sql = "SELECT s.*,
                       a.*,
                       u.Nombre_canal,
                       u.Nombre_capitan,
                       u.Pais,
                       SUM(a.Goles) as Status
                  FROM servicios s,
                       anotaciones a,
                       users u
                 WHERE a.Id_serv = s.Id
                   AND a.id_user = u.Id
                   AND a.Flag = 2
                   AND a.Pais IN ('México', 'Brasil', 'Argentina','Bolivia','Chile','Paraguay','Perú','Uruguay', 'Colombia','Costa Rica','Ecuador','El Salvador','Honduras','Nicaragua','Panamá','Puerto Rico','República Dominicana','Venezuela')
              GROUP BY a.id_user
              ORDER BY SUM(a.Goles) DESC
              LIMIT 5";
        $result = $this->db->query($sql);
        return $result->result();
    }
    function getIdServicioByNombre($servicio){
        $sql = "SELECT s.Id
                  FROM servicios s
                 WHERE Tipo_serv LIKE '%".$servicio."%'";
        $result = $this->db->query($sql);
        return $result->row()->Id;
    }
}