<?php
/*Clase Datos*/
require_once('datos/clienteDb.php');

class clienteNegocio{
  
  public function listar(){
      $db = new ClienteDb();
      return $db->getAll();
  }

  public function recuperar($id){
  	 $db = new ClienteDb();
  	 return $db->getOne($id);
  }

   public function guardar(){

    	//validar los campos recibidos por $_POST
    	$valido = true;
    	$datos = $_POST;

    	if($valido){
    	//si todo está ok, guardar en BD e informar por pantalla
    		$cliente = new cliente($datos);
	        $db = new clienteDb();
	        if($cliente->getId()){
	        	if( $db->update($cliente) instanceof cliente ){
	        		Util::setMsj('El cliente fue actualizado con éxito','success');
	        		header('Location:?modulo=cliente&accion=listar');
              die();
	        	}else{
	        		Util::setMsj('Hubo un problema actualizando el cliente','danger');
	        	}
	        }
          else{
            if( $db->checkCliente($cliente->getTipoDoc(), $cliente->getNroDoc()) ){
  	        	if( $db->insert($cliente) instanceof cliente ){
  	        		Util::setMsj('El cliente fue insertado con éxito','success');
  	        		header('Location:?modulo=cliente&accion=listar');
                die();
  	        	}else{
  	        		Util::setMsj('Hubo un problema insertando el cliente','danger');
  	        	}
	        }
          else{
            Util::setMsj('El cliente ya existe','danger');
            header('Location:?modulo=cliente&accion=listar');
            die();
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
            $cliente = new cliente($datos);
            $db = new clienteDb();

            if( $db->remove($cliente)){
                Util::setMsj('El cliente <strong>'.$_POST['nombreApellido'].'</strong> fue eliminado con exito','success');
            }else{
                Util::setMsj('Hubo un problema eliminando el cliente','danger');
            }
            header('Location:?modulo=cliente&accion=listar');
            die();
        }else{
        //si hay algun error, informar por pantalla
        }
    }
}


?>