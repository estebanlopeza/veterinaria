<?php
/*Clase Datos*/
require_once('datos/mascotaDb.php');

class mascotaNegocio{
  
  public function listar(){
      $db = new mascotaDb();
      return $db->getAll($_GET['idCliente']);
  }
}


?>