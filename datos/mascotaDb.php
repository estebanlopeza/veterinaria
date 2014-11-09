<?php
require_once('datos/Db.php');
require_once('entidades/mascota.php');

class MascotaDb extends Db{

    public function getOne($id){
        global $mysqli;
        
        $sql = "SELECT m.*, r.id_especie
                FROM mascota AS m
                INNER JOIN raza AS r 
                ON m.id_raza = r.id
                WHERE m.id = " . $id . "
                LIMIT 1";

        $result = $this->mysqli->query($sql) or die("Error ". $sql . mysqli_error($mysqli));
        
        $mascota = new Mascota( $result->fetch_assoc() );
        $result->free();
        return $mascota;
    }

    public function getAll($id_cliente){
        
        $sql = "SELECT m.* 
                FROM mascota AS m
                WHERE m.id_cliente = " . $id_cliente . "
                AND m.eliminado = 0 
                ORDER BY m.id ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Mascota');
        $result->free();
        return $array;
    }

    public function update($mascota){
        
        $sql = "UPDATE mascota SET id_raza = " . $mascota->getIdRaza() . ", 
                                   nombre = '" . $mascota->getNombre() . "',
                                   fechaNac = '" . $mascota->getFechaNac() . "',
                                   sexo = '" . $mascota->getSexo() . "',
                                   pelaje = '" . $mascota->getPelaje() . "' 
                WHERE id = " . $mascota->getId();
        $this->mysqli->query($sql) or die("Error ");
        return $mascota;
    }

    public function insert($mascota){
        
        $sql = "INSERT INTO mascota (id_cliente,
                                     id_raza, 
                                     nombre,
                                     fechaNac,
                                     sexo,
                                     pelaje)
                VALUES ( " . $mascota->getIdCliente() . ", 
                         " . $mascota->getIdRaza() . ", 
                        '" . $mascota->getNombre() . "',
                        '" . $mascota->getFechaNac() . "',
                        '" . $mascota->getSexo() . "',
                        '" . $mascota->getPelaje() . "' )";

        $this->mysqli->query($sql) or die("Error ");
        $mascota->setId( $this->mysqli->insert_id );
        return $mascota;
    }

    public function remove($mascota){
        $sql = "UPDATE mascota SET eliminado = 1
                WHERE id = " . $mascota->getId();
        $this->mysqli->query($sql) or die("Error ");
        return true;
    }
}
?>