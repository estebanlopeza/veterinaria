<?php
/*Clase Datos*/
require_once('datos/razaDb.php');

class razaNegocio{
  
    public function listar(){
        $db = new razaDb();
        return $db->getAll();
    }
  
    public function recuperar($idRaza){
        $db = new razaDb();
        return $db->getOne($idRaza);
    }
}

?>