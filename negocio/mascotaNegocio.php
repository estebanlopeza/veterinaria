<?php
/*Clase Datos*/
require_once('datos/mascotaDb.php');

class mascotaNegocio{
  
  public function listar(){
      $db = new mascotaDb();
      return $db->getAll($_GET['idCliente']);
  }

  public function recuperar(){
      $db = new mascotaDb();
      return $db->getOne($_GET['id']);
  }
}


?>