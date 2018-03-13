<?php

class M_login extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function verificarUsuario($user) {
        $sql = "SELECT *
                  FROM users
                 WHERE usuario LIKE '%".$user."%'";
        $result = $this->db->query($sql);
        return $result->result();
    }
}