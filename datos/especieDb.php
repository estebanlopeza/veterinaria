<?php
require_once('datos/Db.php');
require_once('entidades/especie.php');

class especieDb extends Db{

    public function getOne($id){
        global $mysqli;
        
        $sql = "SELECT * 
                FROM especie AS e
                WHERE id = " . $id . "
                LIMIT 1";

        $result = $mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $especie = $res->fetch_assoc();
        $result->free();
        return $especie;
    }

    public function getAll(){
        
        $sql = "SELECT e.*
                FROM especie AS e
                ORDER BY e.nombre ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Especie');
        $result->free();
        return $array;
    }
}
?>