    <?php
    if ($_GET['id']) {
        $consulta = $consultaNegocio->recuperar($_GET['id']);
        $txtAction = 'Editar';
    }else{
        $consulta = new consulta();
        $txtAction = 'Agregar';
    }
    ?>
    <div class="container">
      <div class="page-header">
        <h1><?php echo $txtAction; ?> Consulta</h1>
      </div>
        <form role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $consulta->getId();?>" >
            <input type="hidden" name="id_mascota" value="<?php echo $_GET['idMascota'];?>" >
            <div class="form-group">
                <label for="fecha">Fecha de consulta</label>
                <p class="help-block">Formato dd/mm/yyyy.</p>
                <input type="text" class="form-control" id="fecha" name="fecha" placeholder="dd/mm/yyyy" value="<?php echo Util::dbToDate($consulta->getFecha());?>">

            </div>
            <div class="form-group">
                <label for="pesoMascota">Peso</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="pesoMascota" name="pesoMascota" placeholder="Peso" value="<?php echo $consulta->getPesoMascota();?>" >
                    <div class="input-group-addon">Kgs.</div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $txtAction; ?></button>
        </form>
    </div>