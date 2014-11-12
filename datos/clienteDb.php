<?php
require_once('datos/Db.php');
require_once('entidades/cliente.php');

class ClienteDb extends Db{

    public function getOne($id){
        global $mysqli;
        
        $sql = "SELECT * 
                FROM cliente AS c
                WHERE id = " . $id . "
                LIMIT 1";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $cliente = new Cliente( $result->fetch_assoc() );
        $result->free();
        return $cliente;
    }

    public function getAll(){
        
        $sql = "SELECT c.* 
                FROM cliente AS c
                WHERE c.eliminado = 0 
                ORDER BY c.apellido ASC, c.nombre ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Cliente');
        $result->free();
        return $array;
    }

    public function checkCliente($nroDoc){

        $sql = "SELECT c.*
        FROM cliente AS c
        WHERE c.nroDoc = " . $nroDoc . "";
        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        if($result->num_rows > 0){
            return false;
        }
        else{
            return true;
        }   
    }

    public function update($cliente){
        
        $sql = "UPDATE cliente SET nombre = '" . $cliente->getNombre() . "', 
                                   apellido = '" . $cliente->getApellido() . "',
                                   tipoDoc = '" . $cliente->getTipoDoc() . "',
                                   nroDoc = " . $cliente->getNroDoc() . ",
                                   direccion = '" . $cliente->getDireccion() . "',
                                   telefono = '" . $cliente->getTelefono() . "', 
                                   email = '" . $cliente->getEmail() . "'
                WHERE id = " . $cliente->getId();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $cliente;
    }

    public function insert($cliente){
        
        $sql = "INSERT INTO cliente( nombre,
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
        $cliente->setId( $this->mysqli->insert_id );
        return $cliente;
    }

    public function remove($cliente){
        $sql = "UPDATE cliente SET eliminado = 1
                WHERE id = " . $cliente->getId();
        $this->mysqli->query($sql) or die("Error ");
        return true;
    }
}
?>