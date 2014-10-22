<?php
require_once('datos/Db.php');
require_once('entidades/itemConsulta.php');

class ItemConsultaDb extends Db{

    public function getOne($id){
        global $mysqli;
        
        $sql = "SELECT i.* 
                FROM itemConsulta AS i
                WHERE id = " . $id . "
                LIMIT 1";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $itemConsulta = new itemConsulta( $result->fetch_assoc() );
        $result->free();
        return $itemConsulta;
    }

    public function getAll($idConsulta){
        
        $sql = "SELECT i.* 
                FROM itemConsulta AS i
                WHERE i.eliminado = 0 
                AND i.id_consulta = " . $idConsulta ."
                ORDER BY i.id ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'itemConsulta');
        $result->free();
        return $array;
    }

    public function update($itemConsulta){
        
        $sql = "UPDATE cliente SET nombre = '" . $cliente->getNombre() . "', 
                                   apellido = '" . $cliente->getApellido() . "',
                                   tipoDoc = '" . $cliente->getTipoDoc() . "',
                                   nroDoc = " . $cliente->getNroDoc() . ",
                                   direccion = '" . $cliente->getDireccion() . "',
                                   telefono = '" . $cliente->getTelefono() . "', 
                                   email = '" . $cliente->getEmail() . "'
                WHERE id = " . $itemConsulta->getId();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $itemConsulta;
    }

    public function insert($itemConsulta){
        
        $sql = "INSERT INTO itemConsulta( nombre,
                                     apellido,
                                     tipoDoc,
                                     nroDoc,
                                     direccion,
                                     telefono,
                                     email)
                VALUES ('" . $cliente->getNombre() . "', 
                        '" . $cliente->getApellido() . "', 
                        '" . $cliente->getTipoDoc() . "',
                         " . $cliente->getNroDoc() . ",
                        '" . $cliente->getDireccion() . "',
                        '" . $cliente->getTelefono() . "',
                        '" . $cliente->getEmail() . "' )";

        $this->mysqli->query($sql) or die("Error ");
        $itemConsulta->setId( $this->mysqli->insert_id );
        return $itemConsulta;
    }

    public function remove($itemConsulta){
        $sql = "UPDATE itemConsulta SET eliminado = 1
                WHERE id = " . $itemConsulta->getId();
        $this->mysqli->query($sql) or die("Error ");
        return true;
    }
}
?>