    <div class="container">
      <div class="page-header">
        <h1>Servicio <button type="button" class="btn btn-primary btn-sm" id="btn-agregar" name="btn-agregar">Agregar</button></h1>
      </div>

      <?php
      if ($_GET['id']) {
          $servicio = $servicioNegocio->recuperar($_GET['id']);
      }else{
        $servicio = new servicio();
      }
      ?>
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
            
            <button type="submit" class="btn btn-default">Enviar</button>
        </form>
    </div>