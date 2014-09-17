<?php
/*Clase Datos*/
require_once('datos/especieDb.php');

class especieNegocio{
  
    public function listar(){
        $db = new especieDb();
        return $db->getAll();
    }
  
    public function recuperar(){
        $db = new mascotaDb();       
        return $db->getOne($_GET['id']);
    }
}

?>