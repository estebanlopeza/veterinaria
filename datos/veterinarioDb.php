<?php
require_once('datos/Db.php');
require_once('entidades/veterinario.php');

class veterinarioDb extends Db{

    public function getOne($id){
        
        $sql = "SELECT v.* 
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
        
        $sql = "SELECT v.* 
                FROM veterinario AS v
                WHERE v.usuario = '" . $user . "'
                AND v.password = '" . md5($password) . "'
                AND v.eliminado = 0
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

    public function checkVeterinario($veterinario){

        $sql = "SELECT v.*
        FROM veterinario AS v
        WHERE v.usuario = '" . $veterinario->getUsuario() . "'";
        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        if($result->num_rows > 0){
            return false;
        }
        else{
            return true;
        }   
    }

    public function insert($veterinario){

        $sql = "INSERT INTO veterinario( nombre,
                                         apellido,
                                         matricula,
                                         usuario,
                                         password,
                                         email)
                VALUES ('" . $veterinario->getNombre() . "', 
                        '" . $veterinario->getApellido() . "', 
                         " . $veterinario->getMatricula() . ",
                        '" . $veterinario->getUsuario() . "',
                        '" . md5($veterinario->getPassword()) . "',
                        '" . $veterinario->getEmail() . "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $veterinario->setId( $this->mysqli->insert_id );
        return $veterinario;
    }

    public function remove($veterinario){
        $sql = "UPDATE veterinario SET eliminado = 1
                WHERE id = " . $veterinario->getId();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>