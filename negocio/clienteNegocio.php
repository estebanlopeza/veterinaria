<?php
require_once('datos/clienteDb.php');
class clienteNegocio{
  
  public function listar(){
      $db = new ClienteDb();
      return $db->getAll();
  }
}


?>