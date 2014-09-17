<?php
require_once('datos/Db.php');
require_once('entidades/mascota.php');

class MascotaDb extends Db{

    public function getOne($id){
        global $mysqli;
        
        $sql = "SELECT m.*, r.id_especie
                FROM mascota AS m
                INNER JOIN raza AS r ON m.id_raza = r.id
                WHERE r.id = " . $id . "
                LIMIT 1";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        
        $mascota = new Mascota( $result->fetch_assoc() );
        $result->free();
        return $mascota;
    }

    public function getAll($id_cliente){
        
        $sql = "SELECT m.* 
                FROM mascota AS m
                WHERE m.id_cliente = " . $id_cliente . " 
                ORDER BY m.id ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Mascota');
        $result->free();
        return $array;
    }
}
?>