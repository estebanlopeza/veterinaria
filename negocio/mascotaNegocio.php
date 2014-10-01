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

    public function guardar(){

    	//validar los campos recibidos por $_POST
    	$valido = true;
    	$datos = $_POST;
    	$datos['fechaNac'] = Util::dateToDb($datos['fechaNac']);

    	if($valido){
    	//si todo está ok, guardar en BD e informar por pantalla
    		$mascota = new mascota($datos);
	        $db = new mascotaDb();
	        if($mascota->getId()){

	        	if( $db->update($mascota) instanceof mascota ){
	        		Util::setMsj('La mascota fue actualizada con éxito','success');
	        		header('Location:?modulo=mascota&accion=listar&idCliente='.$mascota->getIdCliente());
	        	}else{
	        		Util::setMsj('Hubo un problema actualizando la mascota','danger');
	        	}
	        }else{

	        	if( $db->insert($mascota) instanceof mascota ){
	        		Util::setMsj('La mascota fue insertada con éxito','success');
	        		header('Location:?modulo=mascota&accion=listar&idCliente='.$mascota->getIdCliente());
	        	}else{
	        		Util::setMsj('Hubo un problema insertando la mascota','danger');
	        	}
	        }
    	}else{
    	//si hay algun error, informar por pantalla
    	}

    }
}

?>