<?php
/*Clase Datos*/
require_once('datos/veterinarioDb.php');

class veterinarioNegocio{
  
    public function listar(){
        $db = new veterinarioDb();
        return $db->getAll();
    }
  
    public function recuperar($id){
        $db = new veterinarioDb();       
        return $db->getOne($id);
    }

    public function login($user, $password){
        $db = new veterinarioDb();       
        return $db->login($user,$password);
    }

    public function validarUser($user){
        $db = new veterinarioDb();
        return $db->checkVeterinario($user);
    }

   public function guardar(){

        //validar los campos recibidos por $_POST
        $valido = true;
        $datos = $_POST;

        if($valido){
        //si todo está ok, guardar en BD e informar por pantalla
            $veterinario = new veterinario($datos);
            $db = new veterinarioDb();
            if($veterinario->getId()){
                    if( $db->update($veterinario) instanceof veterinario ){
                        Util::setMsj('El veterinario fue actualizado con éxito','success');
                    }else{
                        Util::setMsj('Hubo un problema actualizando el veterinario','danger');
                    }
                    header('Location:?modulo=veterinario&accion=listar');
                    die();
            }else{
                if( $db->checkVeterinario($veterinario->getUsuario()) ){ 
                    if( $db->insert($veterinario) instanceof veterinario ){
                        Util::setMsj('El veterinario fue insertado con éxito','success');
                    }else{
                        Util::setMsj('Hubo un problema insertando el veterinario','danger');
                        }
                    header('Location:?modulo=veterinario&accion=listar');
                    die();
                    }
                else{
                        Util::setMsj('El usuario <strong>'.$veterinario->getUsuario().'</strong> ya existe. Intente con otro usuario','danger');
                        return false;
                    }
                }

        }
        else{
        //si hay algun error, informar por pantalla
        }

    }

    public function eliminar(){

        //validar los campos recibidos por $_POST
        $valido = true;
        $datos = $_POST;

        if($valido){
        //si todo está ok, guardar en BD e informar por pantalla
            $veterinario = new veterinario($datos);
            $db = new veterinarioDb();

            if( $db->remove($veterinario)){
                Util::setMsj('El veterinario <strong>'.$_POST['veterinario'].'</strong> fue eliminado con exito','success');
            }else{
                Util::setMsj('Hubo un problema eliminando el veterinario','danger');
            }
            header('Location:?modulo=veterinario&accion=listar');
            die();
        }else{
        //si hay algun error, informar por pantalla
        }
    }

}

?>