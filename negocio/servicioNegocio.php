<?php
/*Clase Datos*/
require_once('datos/servicioDb.php');

class servicioNegocio{
  
  public function listar(){
      $db = new servicioDb();
      return $db->getAll();
  }

  public function recuperar($id){
  	 $db = new servicioDb();
  	 return $db->getOne($id);
  }

  public function guardar(){

    	//validar los campos recibidos por $_POST
    	$valido = true;
    	$datos = $_POST;

    	if($valido){
    	//si todo está ok, guardar en BD e informar por pantalla
    		$servicio = new servicio($datos);
	        $db = new servicioDb();
	        if($servicio->getId()){

	        	if( $db->update($servicio) instanceof servicio ){
	        		Util::setMsj('El servicio fue actualizado con éxito','success');
	        		header('Location:?modulo=servicio&accion=listar');
              die();
	        	}else{
	        		Util::setMsj('Hubo un problema actualizando el servicio','danger');
	        	}
	        }else{

	        	if( $db->insert($servicio) instanceof servicio ){
	        		Util::setMsj('El servicio fue insertado con éxito','success');
	        		header('Location:?modulo=servicio&accion=listar');
              die();
	        	}else{
	        		Util::setMsj('Hubo un problema insertando el servicio','danger');
	        	}
	        }
    	}else{
    	//si hay algun error, informar por pantalla
    	}

    }
}


?>