    <?php
    if ($_GET['id']) {
        $mascota = $mascotaNegocio->recuperar($_GET['id']);
        $txtAction = 'Editar';
    }else{
        $mascota = new mascota();
        $txtAction = 'Agregar';
    }
    require_once('negocio/especieNegocio.php');
    $especieNegocio = new especieNegocio();
    $arrayEspecie = $especieNegocio->listar();
    require_once('negocio/razaNegocio.php');
    $razaNegocio = new razaNegocio();
    $arrayRaza = $razaNegocio->listar();
    ?>
    <div class="container">
      <div class="page-header">
        <h1><?php echo $txtAction; ?> Mascota</h1>
      </div>
        <form role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $mascota->getId();?>" >
            <input type="hidden" name="id_cliente" value="<?php echo $_GET['idCliente'];?>" >
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $mascota->getNombre();?>" >
            </div>
            <div class="form-group">
                <label for="fechaNac">Fecha de nacimiento</label>
                <p class="help-block">Formato dd/mm/yyyy.</p>
                <input type="text" class="form-control" id="fechaNac" name="fechaNac" placeholder="dd/mm/yyyy" value="<?php echo Util::dbToDate($mascota->getFechaNac());?>">
            </div>
            <div class="form-group">
                <label for="id_especie">Especie</label>
                <select class="form-control" id="idEspecie" name="id_especie">
                    <?php
                    foreach ($arrayEspecie as $especie) {
                        echo '<option value="'. $especie->getId() .'" ';
                        if($especie->getId() == $mascota->getIdEspecie()){
                            echo "selected";
                        }
                        echo '>' . $especie->getNombre() . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_raza">Raza</label>
                <select class="form-control" id="idRaza" name="id_raza">
                    <?php
                    foreach ($arrayRaza as $raza) {
                        echo '<option value="'. $raza->getId() .'" ';
                        if($raza->getId() == $mascota->getIdRaza()){
                            echo "selected ";
                        }
                        echo 'data-id-especie="'.$raza->getIdEspecie().'"';
                        echo '>' . $raza->getNombre() . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <select class="form-control" id="sexo" name="sexo">
                    <option value="macho" <?php if($mascota->getSexo() == 'macho') {echo "selected";} ?>  >Macho</option>
                    <option value="hembra" <?php if($mascota->getSexo() == 'hembra') {echo "selected";} ?> >Hembra</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pelaje">Pelaje</label>
                <input type="text" class="form-control" id="pelaje" name="pelaje" placeholder="Pelaje" value="<?php echo $mascota->getPelaje();?>"  >
            </div>
            
            <button type="submit" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>