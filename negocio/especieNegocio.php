<?php
/*Clase Datos*/
require_once('datos/especieDb.php');

class especieNegocio{
  
    public function listar(){
        $db = new especieDb();
        return $db->getAll();
    }
  
    public function recuperar($idEspecie){
        $db = new especieDb();       
        return $db->getOne($idEspecie);
    }
}

?>