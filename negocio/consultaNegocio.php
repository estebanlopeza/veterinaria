<?php
/*Clase Datos*/
require_once('datos/consultaDb.php');

class consultaNegocio{
  
  public function listar(){
      $db = new ConsultaDb();
      return $db->getAll();
  }

  public function recuperar($id){
  	 $db = new ConsultaDb();
  	 return $db->getOne($id);
  }
   public function guardar(){

    	//validar los campos recibidos por $_POST
    	$valido = true;
    	$datos = $_POST;

      $datos['fecha'] = Util::dateToDb($datos['fecha']);

    	if($valido){
    	//si todo está ok, guardar en BD e informar por pantalla
    		$consulta = new consulta($datos);
	        $db = new consultaDb();
	        if($consulta->getId()){

	        	if( $db->update($consulta) instanceof consulta ){
	        		Util::setMsj('La consulta fue actualizada con éxito','success');
	        	}else{
	        		Util::setMsj('Hubo un problema actualizando la consulta','danger');
	        	}
	        }else{

	        	if( $db->insert($consulta) instanceof consulta ){
	        		Util::setMsj('La consulta fue insertada con éxito','success');
	        	}else{
	        		Util::setMsj('Hubo un problema insertando la consulta','danger');
	        	}
	        }


          
          header('Location:?modulo=consulta&accion=listar&idMascota='.$consulta->getIdMascota());
          die();
    	}else{
    	//si hay algun error, informar por pantalla
    	}

    }
}


?>