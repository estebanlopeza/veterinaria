<?php
/*Clase Datos*/
require_once('datos/itemConsultaDb.php');

class itemConsultaNegocio{
  
  public function listar($idConsulta){
      $db = new itemConsultaDb();
      return $db->getAll($idConsulta);
  }

  public function recuperar($id){
  	 $db = new ItemConsultaDb();
  	 return $db->getOne($id);
  }
   public function guardar(){

    	//validar los campos recibidos por $_POST
    	$valido = true;
    	$datos = $_POST;
      $datos['fecha'] = Util::dateToDb($datos['fecha']);

    	if($valido){
    	//si todo está ok, guardar en BD e informar por pantalla
    		$itemConsulta = new itemConsulta($datos);
	        $db = new itemConsultaDb();
	        if($itemConsulta->getId()){

	        	if( $db->update($itemConsulta) instanceof itemConsulta ){
	        		Util::setMsj('La consulta fue actualizada con éxito','success');
	        		header('Location:?modulo=consulta&accion=listar&idMascota='.$itemConsulta->getIdMascota());
              die();
	        	}else{
	        		Util::setMsj('Hubo un problema actualizando la consulta','danger');
	        	}
	        }else{

	        	if( $db->insert($itemConsulta) instanceof itemConsulta ){
	        		Util::setMsj('La consulta fue insertada con éxito','success');
	        		header('Location:?modulo=consulta&accion=listar&idMascota='.$consulta->getIdMascota());
              die();
	        	}else{
	        		Util::setMsj('Hubo un problema insertando la consulta','danger');
	        	}
	        }
    	}else{
    	//si hay algun error, informar por pantalla
    	}

    }
}


?>