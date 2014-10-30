<?php
/*Clase Datos*/
require_once('datos/gavetDb.php');

class gavetNegocio{
  
    public function recuperar($date){
        $db = new gavetDb();
        return $db->getOne($date);
    }
  
}

?>