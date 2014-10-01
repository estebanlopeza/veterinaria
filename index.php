<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
$modulo = $_GET['modulo'];
$accion = $_GET['accion'];

$_SESSION['usuario'] = '1';

require_once('util/util.php');

if($_SESSION['usuario']){
  if($modulo){
    
    /*Clase Negocio*/
    require_once('negocio/'.$modulo.'Negocio.php');

    $nombreNegocio = $modulo."Negocio";
    $$nombreNegocio = new $nombreNegocio();

    if($accion == 'editar' && $_POST){
      $$nombreNegocio->guardar();
    }


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