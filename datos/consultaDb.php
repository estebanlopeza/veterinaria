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

    public function getAll($idMascota){
        
        $sql = "SELECT c.* 
                FROM consulta AS c
                WHERE c.id_mascota = ".$idMascota."
                AND c.eliminado = 0
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
        
        $sql = "UPDATE consulta SET 
                    externo = " . $consulta->getExterno() . ", 
                    pesoMascota = '" . $consulta->getPesoMascota() . "'
                WHERE id = " . $consulta->getId() . " ";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));

        $this->removeItemConsulta($consulta->getId(), true);

        $itemsConsulta = $consulta->getItemsConsulta();

        foreach ($itemsConsulta as $items) {
          
        $this->insertItemConsulta($items, $consulta->getId());

        }

        return $consulta;
    }

    public function insert($consulta){
        
        $sql = "INSERT INTO consulta( id_mascota,
                                      id_veterinario,
                                      fecha,
                                      externo,
                                      pesoMascota)
                VALUES ( " . $consulta->getIdMascota() . ", 
                         " . $consulta->getIdVeterinario() . ", 
                        '" . $consulta->getFecha() . "',
                         " . $consulta->getExterno() . ",
                        '" . $consulta->getPesoMascota() . "' )";   

        $this->mysqli->query($sql) or die("Error " . $sql . mysqli_error($mysqli));
        $consulta->setId( $this->mysqli->insert_id );

        $itemsConsulta = $consulta->getItemsConsulta();

        foreach ($itemsConsulta as $items) {
          
        $this->insertItemConsulta($items, $consulta->getId());

        }

        return $consulta;

      }

      public function insertItemConsulta($items, $idConsulta){

        $sql = "INSERT INTO itemconsulta (  id_servicio,
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

      public function removeItemConsulta($idConsulta, $fisico){

        if($fisico)
        {
        $sql = "DELETE FROM itemconsulta
                WHERE id_consulta = " . $idConsulta . " ";
        } else{
        $sql = "UPDATE itemconsulta SET eliminado = 1
                WHERE id_consulta = " . $idConsulta . " ";
        }
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;

    }

    public function remove($consulta){
        $sql = "UPDATE consulta SET eliminado = 1
                WHERE id = " . $consulta->getId();
        $this->mysqli->query($sql) or die("Error ");
        $this->removeItemConsulta($consulta->getId(), false);
        return true;
    }
}
?>