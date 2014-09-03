<?php
require_once('datos/Db.php');

class ClienteDb extends Db{

    public function getOne($id){
        global $mysqli;
        
        $sql = "SELECT * 
                FROM cliente AS c
                WHERE id = " . $id . "
                LIMIT 1";

        $result = $mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $cliente = $res->fetch_assoc();
        $result->free();
        return $cliente;
    }

    public function getAll(){
        
        $sql = "SELECT 
                  c.id, 
                  c.apellido, 
                  c.nombre AS nombreCliente 
                FROM cliente AS c
                ORDER BY c.apellido ASC, c.nombre ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToArray($result);
        $result->free();
        return $array;
    }
}
?>