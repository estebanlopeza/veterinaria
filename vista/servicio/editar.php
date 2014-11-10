      <?php
      if ($_GET['id']) {
          $servicio = $servicioNegocio->recuperar($_GET['id']);
          $txtAction = 'Editar';
      }else{
        $servicio = new servicio();
        $txtAction = 'Agregar';
      }
      ?>
    <div class="container">
      <div class="page-header">
        <h1><?php echo $txtAction; ?> Servicio</h1>
      </div>
        <form role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $servicio->getId();?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $servicio->getNombre();?>" >
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" value="<?php echo $servicio->getDescripcion();?>">
            </div>
            <div class="form-group">
                <label for="nroGAVET">Número de Gavet</label>
                <input type="text" class="form-control" id="nroGAVET" name="nroGAVET" placeholder="Número de Gavet" value="<?php echo $servicio->getNroGavet();?>"  >
            </div>
            
            <button type="submit" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $txtAction; ?></button>
        </form>
    </div>