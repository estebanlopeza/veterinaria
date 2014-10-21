<?php
if ($_GET['id']) {
    $servicio = $servicioNegocio->recuperar($_GET['id']);
}else{
  $servicio = new servicio();
}
Util::setMsj('Está a punto de eliminar el siguiente servicio:','warning',false);
?>
    <div class="container">
      <div class="page-header">
        <h1>Eliminar Servicio</h1>
      </div>
      <?php echo Util::getMsj(); ?>
        <form role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $servicio->getId();?>">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" readonly placeholder="Nombre" value="<?php echo $servicio->getNombre();?>" >
            </div>
            <button type="submit" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
    </div>