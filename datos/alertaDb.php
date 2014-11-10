<?php
require_once('datos/Db.php');
require_once('entidades/alerta.php');

class AlertaDb extends Db{

    public function getOne($id){
        global $mysqli;
        
        $sql = "SELECT a.*
                FROM alerta AS a
                WHERE a.id = " . $id . "
                LIMIT 1";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        
        $alerta = new Alerta( $result->fetch_assoc() );
        $result->free();
        return $alerta;
    }

    public function getAll($id_mascota){
        
        $sql = "SELECT a.* 
                FROM alerta AS a 
                WHERE a.eliminado = 0 ";
        if ($id_mascota) {
            $sql.= "AND a.id_mascota = " . $id_mascota . " ";
        }
        $sql.= "ORDER BY a.fecha DESC";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $array = $this->resourceToObjects($result,'Alerta');
        $result->free();
        return $array;
    }

    public function update($alerta){
        
        $sql = "UPDATE alerta SET fecha = '" . $alerta->getFecha() . "',
                                   asunto = '" . $alerta->getAsunto() . "',
                                   contenido = '" . $alerta->getContenido() . "' 
                WHERE id = " . $alerta->getId();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return $alerta;
    }

    public function insert($alerta){
        
        $sql = "INSERT INTO alerta (id_mascota,
                                    fecha,
                                    asunto,
                                    contenido)
                VALUES ( " . $alerta->getIdMascota() . ", 
                        '" . $alerta->getFecha() . "', 
                        '" . $alerta->getAsunto() . "',
                        '" . $alerta->getContenido() . "' )";

        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $alerta->setId( $this->mysqli->insert_id );
        return $alerta;
    }

    public function remove($alerta){
        $sql = "UPDATE alerta SET eliminado = 1
                WHERE id = " . $alerta->getId();
        $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        return true;
    }
}
?>