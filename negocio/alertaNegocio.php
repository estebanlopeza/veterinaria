<?php
/*Clase Datos*/
require_once('datos/alertaDb.php');

class alertaNegocio{
  
    public function listar($idMascota = null){
        $db = new alertaDb();
        return $db->getAll($idMascota);
    }
  
    public function recuperar($id){
        $db = new alertaDb();       
        return $db->getOne($id);
    }

    public function guardar(){

    	//validar los campos recibidos por $_POST
    	$valido = true;
    	$datos = $_POST;
    	$datos['fecha'] = Util::dateToDb($datos['fecha']);

    	if($valido){
    	//si todo está ok, guardar en BD e informar por pantalla
    		$alerta = new alerta($datos);
	        $db = new alertaDb();
	        if($alerta->getId()){

	        	if( $db->update($alerta) instanceof alerta ){
	        		Util::setMsj('El alerta fue actualizada con éxito','success');
	        		header('Location:?modulo=alerta&accion=listar&idMascota='.$alerta->getIdMascota());
	        	}else{
	        		Util::setMsj('Hubo un problema actualizando el alerta','danger');
	        	}
	        }else{

	        	if( $db->insert($alerta) instanceof alerta ){
	        		Util::setMsj('El alerta fue insertada con éxito','success');
	        	}else{
	        		Util::setMsj('Hubo un problema insertando el alerta','danger');
	        	}
                header('Location:?modulo=alerta&accion=listar&idMascota='.$alerta->getIdMascota());
                die();
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
            $alerta = new alerta($datos);
            $db = new alertaDb();

            if( $db->remove($alerta)){
                Util::setMsj('El alerta fue eliminada con exito','success');
            }else{
                Util::setMsj('Hubo un problema eliminando la alerta','danger');
            }
            header('Location:?modulo=alerta&accion=listar&idMascota='.$alerta->getIdMascota());
            die();
        }else{
        //si hay algun error, informar por pantalla
        }
    }
}

?>