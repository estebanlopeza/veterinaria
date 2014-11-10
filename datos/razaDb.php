<?php
require_once('datos/Db.php');
require_once('entidades/raza.php');

class razaDb extends Db{

    public function getOne($id){
        global $mysqli;
        
        $sql = "SELECT r.*
                FROM raza AS r
                WHERE r.id = " . $id . "
                LIMIT 1";

        $result = $this->mysqli->query($sql) or die("Error ". mysqli_error($mysqli));
        
        $raza = new Raza( $result->fetch_assoc() );
        $result->free();
        return $raza;
    }

    public function getAll(){
        
        $sql = "SELECT r.*
                FROM raza AS r
                WHERE r.eliminado = 0
                ORDER BY r.nombre ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Raza');
        $result->free();
        return $array;
    }

    public function update($raza){
        
        $sql = "UPDATE raza SET nombre = '" . $raza->getNombre() . "'
                WHERE id = " . $raza->getId();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $raza;
    }

    public function insert($raza){
        
        $sql = "INSERT INTO raza (nombre, 
                                  id_especie)
                VALUES ('" . $raza->getNombre() . "', 
                         " . $raza->getIdEspecie() . " )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $raza->setId( $this->mysqli->insert_id );
        return $raza;
    }

    public function remove($raza){
        $sql = "UPDATE raza SET eliminado = 1
                WHERE id = " . $raza->getId();
        $this->mysqli->query($sql) or die("Error ");
        return true;
    }
}
?>