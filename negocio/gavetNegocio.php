<?php
/*Clase Datos*/
require_once('datos/gavetDb.php');

class gavetNegocio{
  
    public function recuperar($date){
        $db = new gavetDb();
        return $db->getOne($date);
    }

    public function guardar(){

    	//validar los campos recibidos por $_POST
    	$valido = true;
    	$datos = $_POST;

    	if($valido){
    	//si todo está ok, guardar en BD e informar por pantalla
    		
    		$gavet = new gavet($datos);
	        $db = new gavetDb();
	        
	        
	        if($db->insert($gavet) instanceof gavet ){
	        		Util::setMsj('El GAVET fue actualizado con éxito','success');
	        		header('Location:?modulo=gavet&accion=editar');
              die();
	        	}else{
	        		Util::setMsj('Hubo un problema actualizando el GAVET','danger');
	        	}
	        
    	}else{
    	//si hay algun error, informar por pantalla
    	}

    }
  
}

?>