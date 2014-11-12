    <?php
    if ($_GET['id']) {
        $mascota = $mascotaNegocio->recuperar($_GET['id']);
    }
    Util::setMsj('Está a punto de eliminar la siguiente mascota:','warning',false);
    ?>
    <div class="container">
        <div class="page-header">
            <h1>Eliminar Mascota</h1>
        </div>
        <?php echo Util::getMsj(); ?>
        <form role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $mascota->getId();?>" >
            <input type="hidden" name="id_cliente" value="<?php echo $mascota->getIdCliente();?>" >
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" readonly value="<?php echo $mascota->getNombre();?>" >
            </div>            
            <button type="button" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
    </div>