      <?php
      require_once('negocio/especieNegocio.php');
      $especieNegocio = new especieNegocio();
      if ($_GET['id']) {
          $raza = $razaNegocio->recuperar($_GET['id']);
          $especie = $especieNegocio->recuperar($raza->getIdEspecie());
          $txtAction = 'Editar';
      }else{
        $raza = new raza();
        $arrayEspecie = $especieNegocio->listar();
        $txtAction = 'Agregar';
      }
      ?>
    <div class="container">
      <div class="page-header">
        <h1><?php echo $txtAction; ?> Raza</h1>
      </div>
        <form role="form" method="post" id="principal">
            <input type="hidden" name="id" value="<?php echo $raza->getId();?>">

            <div class="form-group">
                <label for="id_especie">Especie</label>
                <select class="form-control" id="id_especie" name="id_especie">
                    <?php
                    if($_GET['id']){
                      echo '<option value="'. $especie->getId() .'" ';
                      echo "disabled";
                      echo '>' . $especie->getNombre() . '</option>';
                    }else{
                        echo '<option value=""> Seleccione la Especie </option>';  
                        foreach ($arrayEspecie as $especie) {
                        echo '<option value="'. $especie->getId() .'" ';
                        echo '>' . $especie->getNombre() . '</option>';
                      }
                    }
                    ?>
                </select>
            </div>
      
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $raza->getNombre();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            
            <button type="submit" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $txtAction; ?></button>
        </form>
    </div>