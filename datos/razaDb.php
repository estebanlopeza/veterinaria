<?php
require_once('datos/Db.php');
require_once('entidades/raza.php');

class razaDb extends Db{

    public function getOne($id){
        global $mysqli;
        
        $sql = "SELECT * 
                FROM raza AS r
                WHERE id = " . $id . "
                LIMIT 1";

        $result = $mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $raza = $res->fetch_assoc();
        $result->free();
        return $raza;
    }

    public function getAll(){
        
        $sql = "SELECT r.*
                FROM raza AS r
                ORDER BY r.nombre ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Especie');
        $result->free();
        return $array;
    }
}
?>