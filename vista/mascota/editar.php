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
        <form role="form" method="post" id="principal">
            <input type="hidden" name="id" value="<?php echo $mascota->getId();?>" >
            <input type="hidden" name="id_cliente" value="<?php echo $_GET['idCliente'];?>" >
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $mascota->getNombre();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="fechaNac">Fecha de nacimiento</label>
                <p class="help-block">Formato dd/mm/yyyy.</p>
                <input type="text" class="form-control datepicker" id="fechaNac" name="fechaNac" placeholder="dd/mm/yyyy" value="<?php echo Util::dbToDate($mascota->getFechaNac());?>"  pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" required>
                <div class="help-block with-errors"></div>
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
                <select class="form-control" id="idRaza" name="id_raza" required>
                    <option value="" data-id-especie=""></option>
                    <?php
                    foreach ($arrayRaza as $raza) {
                        echo '<option value="'. $raza->getId() .'" ';
                        if($raza->getId() == $mascota->getIdRaza()){
                            echo "selected ";
                        }
                        echo 'data-id-especie="'.$raza->getIdEspecie().'" ';
                        echo '>' . $raza->getNombre() . '</option>';
                    }
                    ?>
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="macho" <?php if($mascota->getSexo() == 'macho') {echo "selected";} ?>  >Macho</option>
                    <option value="hembra" <?php if($mascota->getSexo() == 'hembra') {echo "selected";} ?> >Hembra</option>
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="pelaje">Pelaje</label>
                <input type="text" class="form-control" id="pelaje" name="pelaje" placeholder="Pelaje" value="<?php echo $mascota->getPelaje();?>"  required>
                <div class="help-block with-errors"></div>
            </div>
            
            <button type="button" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $txtAction; ?></button>
        </form>
    </div>