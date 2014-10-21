<?php
/*Clase Datos*/
require_once('datos/mascotaDb.php');

class mascotaNegocio{
  
    public function listar(){
        $db = new mascotaDb();
        return $db->getAll($_GET['idCliente']);
    }
  
    public function recuperar($id){
        $db = new mascotaDb();       
        return $db->getOne($id);
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
	        	}else{
	        		Util::setMsj('Hubo un problema insertando la mascota','danger');
	        	}
                header('Location:?modulo=mascota&accion=listar&idCliente='.$mascota->getIdCliente());
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
            $mascota = new mascota($datos);
            $db = new mascotaDb();

            if( $db->remove($mascota)){
                Util::setMsj('La mascota <strong>'.$mascota->getNombre().'</strong> fue eliminada con exito','success');
            }else{
                Util::setMsj('Hubo un problema eliminando la mascota','danger');
            }
            header('Location:?modulo=mascota&accion=listar&idCliente='.$mascota->getIdCliente());
            die();
        }else{
        //si hay algun error, informar por pantalla
        }
    }
}

?>