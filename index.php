<?php
session_start();

error_reporting(E_ALL ^ E_NOTICE);
$modulo = $_GET['modulo'];
$accion = $_GET['accion'];

$_SESSION['usuario'] = '1';

if($_SESSION['usuario']){

  if($modulo){
    
    require_once('negocio/'.$modulo.'Negocio.php');
    
    require_once('vista/inc/head.php');
    if($accion){
      require_once('vista/'.$modulo.'/'.$accion.'.php');  
    }
    require_once('vista/inc/foot.php'); 
  }

}else{

  require_once('login.php');

}


?>