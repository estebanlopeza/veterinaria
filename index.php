<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('America/Argentina/Buenos_Aires');

require_once('util/util.php');


if($_POST['user'] && $_POST['pass']){
    /*Login*/
    require_once('negocio/veterinarioNegocio.php');
    $veterinarioNegocio = new veterinarioNegocio();
    $vet = $veterinarioNegocio->login($_POST['user'], $_POST['pass']);
    if($vet){
        $_SESSION['veterinario']['id'] = $vet->getId();
        $_SESSION['veterinario']['nombre'] = $vet->getNombre();
        $_SESSION['veterinario']['usuario'] = $vet->getUsuario();
        $_SESSION['veterinario']['email'] = $vet->getEmail();
        header('Location: ?modulo=cliente&accion=listar');
        die;
    }else{
        Util::setMsj('Usuario o contraseña incorrectos','danger', false);
        header('Location: login.php');
        die;
    }
}elseif($_GET['action'] == 'logout'){
    unset($_SESSION['veterinario']);
    Util::setMsj('Has cerrado sesión','info', false);
    header('Location: login.php');
    die;
}

if($_SESSION['veterinario']){
    $modulo = $_GET['modulo']? $_GET['modulo'] : 'cliente';
    $accion = $_GET['accion']? $_GET['accion'] : 'listar';
    
    /*Clase Negocio*/
    require_once('negocio/'.$modulo.'Negocio.php');

    $nombreNegocio = $modulo."Negocio";
    $$nombreNegocio = new $nombreNegocio();

    /*Proceso de formularios*/
    if($_POST){
        switch ($accion) {
            case 'editar':
                $$nombreNegocio->guardar();
                break;
            case 'eliminar':
                $$nombreNegocio->eliminar();
                break;
            case 'consultar':
                break;
            default:
                $accion = 'listar';
                break;
        }
    }

    require_once('vista/inc/head.php');
    require_once('vista/'.$modulo.'/'.$accion.'.php');
    require_once('vista/inc/foot.php'); 

}else{
    header('Location: login.php');
    die;
}
?>