<?php
require_once('datos/Db.php');
require_once('entidades/consulta.php');

class ConsultaDb extends Db{

    public function getOne($id){
        global $mysqli;
        
        $sql = "SELECT * 
                FROM consulta AS c
                WHERE id = " . $id . "
                LIMIT 1";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $consulta = new Consulta( $result->fetch_assoc());
        $consulta->setItemsConsulta($this->getItems($id));
        $result->free();
        return $consulta;
    }

    public function getAll(){
        
        $sql = "SELECT c.* 
                FROM consulta AS c
                ORDER BY c.id ASC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'consulta');
        $result->free();
        return $array;
    }

    public function getItems($idConsulta){
        global $mysqli;
        
        $sql = "SELECT i.id_servicio, i.observacion, i.precioSugerido
                FROM itemConsulta AS i
                WHERE id_consulta = " . $idConsulta . " ";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));

        return $this->resourceToArray($result);
    }

    public function update($consulta){
        
        $sql = "UPDATE consulta SET nombre = '" . $consulta->getNombre() . "', 
                                   apellido = '" . $cliente->getApellido() . "',
                                   tipoDoc = '" . $cliente->getTipoDoc() . "',
                                   nroDoc = " . $cliente->getNroDoc() . ",
                                   direccion = '" . $cliente->getDireccion() . "',
                                   telefono = '" . $cliente->getTelefono() . "', 
                                   email = '" . $cliente->getEmail() . "'
                WHERE id = " . $consulta->getId();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $consulta;
    }

    public function insert($consulta){
        
        $sql = "INSERT INTO consulta( id_mascota,
                                      id_veterinario,
                                      fecha,
                                      pesoMascota)
                VALUES ( " . $consulta->getIdMascota() . ", 
                         " . $consulta->getIdVeterinario() . ", 
                        '" . $consulta->getFecha() . "',
                        '" . $consulta->getPesoMascota() . "' )";   

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $consulta->setId( $this->mysqli->insert_id );

        $itemsConsulta = $consulta->getItemsConsulta();

        foreach ($itemsConsulta as $items) {
          
        $this->insertItemConsulta($items, $consulta->getId());

        }

        return $consulta;

      }

      public function insertItemConsulta($items, $idConsulta){

        $sql = "INSERT INTO itemconsulta ( id_servicio,
                                          id_consulta,
                                          observacion,
                                          precioSugerido)
                VALUES ( " . $items['id_servicio'] . ", 
                         " . $idConsulta . ", 
                        '" . $items['observacion'] . "',
                        '" . $items['precioSugerido'] . "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>