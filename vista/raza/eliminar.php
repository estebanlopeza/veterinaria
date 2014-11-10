<?php
require_once('negocio/especieNegocio.php');
$especieNegocio = new especieNegocio();
if ($_GET['id']) {
    $raza = $razaNegocio->recuperar($_GET['id']);
    $especie = $especieNegocio->recuperar($raza->getIdEspecie());
}else{
  $raza = new raza();
}
Util::setMsj('Está a punto de eliminar la siguiente raza:','warning',false);
?>
    <div class="container">
      <div class="page-header">
        <h1>Eliminar Raza</h1>
      </div>
      <?php echo Util::getMsj(); ?>
        <form role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $raza->getId();?>">
            <div class="form-group">
                <label for="especie">Especie</label>
                <input type="text" class="form-control" id="especie" name="especie" readonly placeholder="Especie" value="<?php echo $especie->getNombre();?>" >
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" readonly placeholder="Nombre" value="<?php echo $raza->getNombre();?>" >
            </div>
            <button type="submit" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
    </div>