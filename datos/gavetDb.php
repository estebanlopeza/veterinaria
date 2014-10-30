<?php
require_once('datos/Db.php');
require_once('entidades/gavet.php');

class gavetDb extends Db{

    

    public function getOne($fecha){
        
        $sql = "SELECT g.*
                FROM gavet AS g
                WHERE g.fechaDesde <= '".Util::dateToDB($fecha)."' 
                ORDER BY g.fechaDesde DESC, g.id DESC
                LIMIT 1";

        $result = $this->mysqli->query($sql) or die("Error " . mysqli_error($mysqli));
        $gavet = new Gavet( $result->fetch_assoc() );
        $result->free();
        return $gavet;
    }
}
?>