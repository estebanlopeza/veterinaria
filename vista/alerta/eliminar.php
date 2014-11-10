    <?php
    if ($_GET['id']) {
        $alerta = $alertaNegocio->recuperar($_GET['id']);
    }
    require_once('negocio/mascotaNegocio.php');
    $mascotaNegocio = new mascotaNegocio();
    require_once('negocio/clienteNegocio.php');
    $clienteNegocio = new clienteNegocio();

    $mascota = $mascotaNegocio->recuperar($alerta->getIdMascota());
    $cliente = $clienteNegocio->recuperar($mascota->getIdCliente());

    Util::setMsj('Está a punto de eliminar la siguiente alerta:','warning',false);
    ?>
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="?modulo=cliente&accion=editar&id=<?php echo $cliente->getId(); ?>"><?php echo $cliente->getNombre().' '.$cliente->getApellido(); ?></a></li>
            <li><a href="?modulo=mascota&accion=editar&id=<?php echo $mascota->getId(); ?>"><?php echo $mascota->getNombre(); ?></a></li>
            <li class="active">Alerta</li>
        </ol>
        <div class="page-header">
            <h1>Eliminar Alerta</h1>
        </div>
        <?php echo Util::getMsj(); ?>
        <form role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $alerta->getId();?>" >
            <input type="hidden" name="id_mascota" value="<?php echo $alerta->getIdMascota();?>" >
            <div class="form-group">
                <label for="nombre">Fecha</label>
                <input type="text" class="form-control" id="fecha" name="fecha" readonly value="<?php echo Util::DbToDate($alerta->getFecha());?>" >
            </div>
            <div class="form-group">
                <label for="nombre">Asunto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" readonly value="<?php echo $alerta->getAsunto();?>" >
            </div>
            <button type="submit" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
    </div>