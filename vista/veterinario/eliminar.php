    <?php
    if ($_GET['id']) {
        $veterinario = $veterinarioNegocio->recuperar($_GET['id']);
    }
    Util::setMsj('Está a punto de eliminar el siguiente veterinario:','warning',false);
    ?>
    <div class="container">
      <div class="page-header">
        <?php echo Util::getMsj(); ?>
        <h1>Eliminar Veterinario</h1>
      </div>
        <form role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $veterinario->getId();?>" >
            <div class="form-group">
                <label for="veterinario">Veterinario</label>
                <input type="text" class="form-control" id="veterinario" name="veterinario" readonly placeholder="Veterinario" value="<?php echo $veterinario->getNombre().' '.$veterinario->getApellido().' ('.$veterinario->getUsuario().')';?>" >
            </div>
            <button type="button" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
    </div>