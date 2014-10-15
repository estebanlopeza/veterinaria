<?php
require_once('datos/Db.php');
require_once('entidades/servicio.php');

class ServicioDb extends Db{

    public function getOne($id){
        global $mysqli;
        
        $sql = "SELECT * 
                FROM servicio AS s
                WHERE id = " . $id . "
                LIMIT 1";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $servicio = new Servicio( $result->fetch_assoc() );
        $result->free();
        return $servicio;
    }

    public function getAll(){
        
        $sql = "SELECT s.* 
                FROM servicio AS s
                ORDER BY s.nombre ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Servicio');
        $result->free();
        return $array;
    }

    public function update($servicio){
        
        $sql = "UPDATE servicio SET nombre = '" . $servicio->getNombre() . "', 
                                   descripcion = '" . $servicio->getDescripcion() . "',
                                   nroGAVET = " . $servicio->getNroGavet() . "
                WHERE id = " . $servicio->getId();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $servicio;
    }

    public function insert($servicio){
        
        $sql = "INSERT INTO servicio (nombre,
                                      descripcion,
                                      nroGAVET)
                VALUES ('" . $servicio->getNombre() . "', 
                        '" . $servicio->getDescripcion() . "', 
                         " . $servicio->getNroGavet() . " )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $servicio->setId( $this->mysqli->insert_id );
        return $servicio;
    }
}
?>