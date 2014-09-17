<?php
require_once('datos/Db.php');
require_once('entidades/raza.php');

class razaDb extends Db{

    

    public function getAll(){
        
        $sql = "SELECT r.*
                FROM raza AS r
                ORDER BY r.nombre ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Raza');
        $result->free();
        return $array;
    }
}
?>