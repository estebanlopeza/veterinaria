<?php
require_once('datos/Db.php');
require_once('entidades/veterinario.php');

class veterinarioDb extends Db{

    public function getOne($id){
        
        $sql = "SELECT * 
                FROM veterinario AS v
                WHERE id = " . $id . "
                LIMIT 1";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $veterinario = new Veterinario( $result->fetch_assoc() );
        $result->free();
        return $veterinario;
    }

    public function getAll(){
        
        $sql = "SELECT v.*
                FROM veterinario AS v
                WHERE v.eliminado = 0
                ORDER BY v.apellido ASC, v.nombre ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Veterinario');
        $result->free();
        return $array;
    }

    public function login($user, $password){
        
        $sql = "SELECT * 
                FROM veterinario AS v
                WHERE usuario = '" . $user . "'
                AND password = '" . md5($password) . "'
                LIMIT 1";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        if($result->num_rows > 0){
	        $veterinario = new Veterinario( $result->fetch_assoc() );
	        $result->free();
	        return $veterinario;
        }else{
        	return false;
        }
    }

    public function update($veterinario){
  
            $sql = "UPDATE veterinario SET nombre = '" . $veterinario->getNombre() . "', 
                                       apellido = '" . $veterinario->getApellido() . "',
                                       matricula = " . $veterinario->getMatricula() . ", ";
                                       if($veterinario->getPassword()){
                                            $sql.= "password = '".md5($veterinario->getPassword())."', ";
                                        }
                                       $sql.= " 
                                       email = '" . $veterinario->getEmail() . "'                   
                    WHERE id = " . $veterinario->getId();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $veterinario;
    }

    public function remove($veterinario){
        $sql = "UPDATE veterinario SET eliminado = 1
                WHERE id = " . $veterinario->getId();
        $this->mysqli->query($sql) or die("Error ");
        return true;
    }
}
?>