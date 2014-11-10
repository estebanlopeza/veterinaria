<?php
/*Clase Datos*/
require_once('datos/razaDb.php');

class razaNegocio{
  
    public function listar(){
        $db = new razaDb();
        return $db->getAll();
    }
  
    public function recuperar($idRaza){
        $db = new razaDb();
        return $db->getOne($idRaza);
    }

public function guardar(){

    	//validar los campos recibidos por $_POST
    	$valido = true;
    	$datos = $_POST;

    	if($valido){
    	//si todo está ok, guardar en BD e informar por pantalla
    		$raza = new raza($datos);
	        $db = new razaDb();
	        if($raza->getId()){

	        	if( $db->update($raza) instanceof raza ){
	        		Util::setMsj('La raza fue actualizada con éxito','success');
	        		header('Location:?modulo=raza&accion=listar');
              		die();
	        	}else{
	        		Util::setMsj('Hubo un problema actualizando la raza','danger');
	        	}
	        }else{

	        	if( $db->insert($raza) instanceof raza ){
	        		Util::setMsj('La raza fue insertada con éxito','success');
	        		header('Location:?modulo=raza&accion=listar');
              		die();
	        	}else{
	        		Util::setMsj('Hubo un problema insertando la raza','danger');
	        	}
	        }
    	}else{
    	//si hay algun error, informar por pantalla
    	}

    }

    public function eliminar(){

        //validar los campos recibidos por $_POST
        $valido = true;
        $datos = $_POST;

        if($valido){
        //si todo está ok, guardar en BD e informar por pantalla
            $raza = new raza($datos);
            $db = new razaDb();

            if( $db->remove($raza)){
                Util::setMsj('La raza <strong>'.$raza->getNombre().'</strong> fue eliminada con exito','success');
            }else{
                Util::setMsj('Hubo un problema eliminando la raza','danger');
            }
            header('Location:?modulo=raza&accion=listar');
            die();
        }else{
        //si hay algun error, informar por pantalla
        }
    }

}

?>