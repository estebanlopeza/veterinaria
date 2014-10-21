    <?php
    if ($_GET['id']) {
        $cliente = $clienteNegocio->recuperar($_GET['id']);
    }
    ?>
    <div class="container">
      <div class="page-header">
        <h1>Eliminar Cliente</h1>
      </div>
        <form role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $cliente->getId();?>" >
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" readonly placeholder="Nombre" value="<?php echo $cliente->getNombre();?>" >
            </div>
            <button type="submit" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
    </div>