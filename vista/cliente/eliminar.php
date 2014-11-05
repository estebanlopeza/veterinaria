    <?php
    if ($_GET['id']) {
        $cliente = $clienteNegocio->recuperar($_GET['id']);
    }
    Util::setMsj('Está a punto de eliminar el siguiente cliente:','warning',false);
    ?>
    <div class="container">
      <div class="page-header">
        <?php echo Util::getMsj(); ?>
        <h1>Eliminar Cliente</h1>
      </div>
        <form role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $cliente->getId();?>" >
            <div class="form-group">
                <label for="nombre">Cliente</label>
                <input type="text" class="form-control" id="nombreApellido" name="nombreApellido" readonly placeholder="Cliente" value="<?php echo $cliente->getNombre().' '.$cliente->getApellido();?>" >
            </div>
            <button type="button" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
    </div>