    <?php
    if ($_GET['id']) {
        $consulta = $consultaNegocio->recuperar($_GET['id']);
        $txtAction = 'Editar';
    }else{
        $consulta = new consulta();
        $txtAction = 'Agregar';
    }

    require_once('negocio/servicioNegocio.php');
    $servicioNegocio = new servicioNegocio();
    $arrayServicio = $servicioNegocio->listar();

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

            <h2>Servicios</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_servicio">Servicio</label>
                        <select class="form-control" id="id_servicio" name="id_servicio">
                            <option value=""> Seleccione un Servicio</option>
                            <?php
                            foreach ($arrayServicio as $servicio) {
                                echo '<option value="'. $servicio->getId() .'" ';
                                echo '>' . $servicio->getNombre() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="observacion">Observaciones</label>
                        <textarea class="form-control" rows="3" name="observacion" id="observacion"> </textarea>
                    </div>
                    <button type="submit" class="btn btn-info btn-sm">Agregar Servicio</button>
                </div>
                <div class="col-md-6">.col-md-6</div>
            </div>


            <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Observación</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($_GET['id_consulta']) {
              $itemConsultaNegocio = new itemConsultaNegocio();
              $arrayItemConsultas = $itemConsultaNegocio->listar($_GET['id_consulta']);
              if( count($arrayItemConsultas) > 0 ){
                foreach( $arrayItemConsultas as $itemConsulta ){
              ?>
                  <tr>
                    <td><?php echo $servicio->getNombre();?></td>
                    <td><?php echo $consulta->getFecha();?></td>
                    <td>
                      <a href="?modulo=consulta&accion=eliminar&id=<?php echo $consulta->getId();?>" data-toggle="tooltip" title="Eliminar consulta"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                    </td>
                  </tr>
              <?php
                }
              }
        }

          ?>
        </tbody>
      </table>


            <button type="submit" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $txtAction; ?></button>
        </form>
    </div>