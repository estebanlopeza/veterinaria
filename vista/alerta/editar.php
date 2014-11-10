    <?php
    if ($_GET['id']) {
        $alerta = $alertaNegocio->recuperar($_GET['id']);
        $txtAction = 'Editar';
        $fecha = Util::dbToDate($alerta->getFecha());
    }else{
        $alerta = new alerta();
        $txtAction = 'Agregar';
        $fecha = date('d/m/Y',time() + 60*60*24);
    }
    require_once('negocio/mascotaNegocio.php');
    $mascotaNegocio = new mascotaNegocio();
    require_once('negocio/clienteNegocio.php');
    $clienteNegocio = new clienteNegocio();

    $mascota = $mascotaNegocio->recuperar($_GET['idMascota']);
    $cliente = $clienteNegocio->recuperar($mascota->getIdCliente());
    ?>
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="?modulo=cliente&accion=editar&id=<?php echo $cliente->getId(); ?>"><?php echo $cliente->getNombre().' '.$cliente->getApellido(); ?></a></li>
        <li><a href="?modulo=mascota&accion=editar&id=<?php echo $mascota->getId(); ?>"><?php echo $mascota->getNombre(); ?></a></li>
        <li class="active">Alerta</li>
      </ol>
      <div class="page-header">
        <h1><?php echo $txtAction; ?> Alerta</h1>
      </div>
        <form role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $alerta->getId();?>" >
            <input type="hidden" name="id_mascota" value="<?php echo $mascota->getId();?>" >
            <div class="form-group">
                <label for="fechaNac">Fecha de alerta</label>
                <p class="help-block">Formato dd/mm/yyyy.</p>
                <input type="text" class="form-control datepicker" id="fecha" name="fecha" placeholder="dd/mm/yyyy" value="<?php echo $fecha;?>">
            </div>
            <div class="form-group">
                <label for="asunto">Mascota</label>
                <input type="text" class="form-control" id="mascota" name="mascota" disabled value="<?php echo $mascota->getNombre();?>" >
            </div>
            <div class="form-group">
                <label for="asunto">Asunto</label>
                <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto de la alerta" value="<?php echo $alerta->getAsunto();?>" >
            </div>
            <div class="form-group">
                <label for="contenido">Mensaje</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="5"><?php echo $alerta->getContenido();?></textarea>
            </div>
            
            <button type="submit" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $txtAction; ?></button>
        </form>
    </div>