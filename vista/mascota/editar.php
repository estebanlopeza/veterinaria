    <div class="container">
      <div class="page-header">
        <h1>Mascota <button type="button" class="btn btn-primary btn-sm">Agregar</button></h1>
      </div>

      <?php
      $mascotaNegocio = new mascotaNegocio();
      $mascota = $mascotaNegocio->recuperar($_GET['id']);
      require_once('negocio/especieNegocio.php');
      $especieNegocio = new especieNegocio();
      $arrayEspecie = $especieNegocio->listar();
      require_once('negocio/razaNegocio.php');
      $razaNegocio = new razaNegocio();
      $arrayRaza = $razaNegocio->listar();
      ?>
        <form role="form">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $mascota->getNombre();?>" >
            </div>
            <div class="form-group">
                <label for="fechaNac">Fecha de nacimiento</label>
                <p class="help-block">Formato dd/mm/yyyy.</p>
                <input type="text" class="form-control" id="fechaNac" name="fechaNac" placeholder="dd/mm/yyyy" value="<?php echo $mascota->getFechaNac();?>">
            </div>
            <div class="form-group">
                <label for="especie">Especie</label>
                <select class="form-control" name="especie">
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
                <label for="raza">Raza</label>
                <select class="form-control" name="raza">
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
                <select class="form-control" name="sexo">
                    <option value="macho">Macho</option>
                    <option value="hembra">Hembra</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pelaje">Pelaje</label>
                <input type="text" class="form-control" id="pelaje" placeholder="Pelaje">
            </div>
            
            <button type="submit" class="btn btn-default">Enviar</button>
        </form>
    </div>