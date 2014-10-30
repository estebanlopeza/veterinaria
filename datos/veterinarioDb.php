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
                ORDER BY v.nombre ASC";

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
}
?>