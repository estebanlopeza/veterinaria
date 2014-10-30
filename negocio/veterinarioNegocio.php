<?php
/*Clase Datos*/
require_once('datos/veterinarioDb.php');

class veterinarioNegocio{
  
    public function listar(){
        $db = new veterinarioDb();
        return $db->getAll();
    }
  
    public function recuperar(){
        $db = new veterinarioDb();       
        return $db->getOne($_GET['id']);
    }

    public function login($user, $password){
        $db = new veterinarioDb();       
        return $db->login($user,$password);
    }
}

?>