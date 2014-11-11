<?php
require_once('negocio/veterinarioNegocio.php');
$vetnegocio = new veterinarioNegocio();
if( $vetnegocio->validarUser($_GET['usuario']) ){
	header("HTTP/1.0 200");
}else{
	header("HTTP/1.0 403 El usuario ".$_GET['usuario']." se encuentra en uso");
}
?>
