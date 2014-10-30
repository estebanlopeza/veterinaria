    <?php
    require_once('negocio/servicioNegocio.php');
    $servicioNegocio = new servicioNegocio();

    if ($_GET['id']) {
        $consulta = $consultaNegocio->recuperar($_GET['id']);
    }
    Util::setMsj('Está a punto de eliminar la siguiente consulta:','warning',false);
    ?>
    <div class="container">
      <div class="page-header">
        <h1>Eliminar Consulta</h1>
      </div>
      <?php echo Util::getMsj(); ?>
        <form role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $consulta->getId();?>" >
            <input type="hidden" name="id_mascota" value="<?php echo $_GET['idMascota'];?>" >
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="text" class="form-control" id="fecha" name="fecha" readonly placeholder="Fecha" value="<?php echo $consulta->getFecha();?>" >
            </div>
            <div class="form-group">
                <table class="table table-striped table-bordered" id="tblServicios">
                        <thead>
                          <tr>
                            <th>Servicio</th>
                            <th>Observación</th>
                            <th>Precio Sugerido</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $itemsConsulta = $consulta->getItemsConsulta();
                            foreach( $itemsConsulta as $item ){
                          ?>
                              <tr>
                                <td><?php echo $servicioNegocio->recuperar($item['id_servicio'])->getNombre();?></td>
                                <td><?php echo $item['observacion'];?></td>
                                <td><?php echo $item['precioSugerido'];?></td>
                              </tr>
                          <?php
                            }
                          ?>
                        </tbody>
                    </table>
                </div>
            <button type="button" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
    </div>