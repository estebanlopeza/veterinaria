    <?php
    if ($_GET['id']) {
        $consulta = $consultaNegocio->recuperar($_GET['id']);
        $txtAction = 'Editar';
        $fecha = Util::dbToDate($consulta->getFecha());
    }else{
        $consulta = new consulta();
        $txtAction = 'Agregar';
        $fecha = date('d/m/Y');
    }

    require_once('negocio/servicioNegocio.php');
    $servicioNegocio = new servicioNegocio();
    $arrayServicio = $servicioNegocio->listar();

    require_once('negocio/gavetNegocio.php');
    $gavetNegocio = new gavetNegocio();
    $gavet = $gavetNegocio->recuperar($fecha);

    ?>
    <div class="container">
      <div class="page-header">
        <h1><?php echo $txtAction; ?> Consulta</h1>
      </div>
        <?php echo Util::getMsj(); ?>
        <form role="form" method="post" id="principal">
            <input type="hidden" name="id" value="<?php echo $consulta->getId();?>" >
            <input type="hidden" name="id_mascota" value="<?php echo $_GET['idMascota'];?>" >
            <div class="form-group">
                <label for="fecha">Fecha de consulta</label>
                <p class="help-block">Formato dd/mm/yyyy.</p>
                <input type="text" class="form-control datepicker" id="fecha" name="fecha" placeholder="dd/mm/yyyy" value="<?php echo $fecha;?>" pattern="^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$" required>
                <div class="help-block with-errors"></div>
            </div>
          <div class="checkbox">
            <label for="externo">
              <input type="checkbox" id="externo" name="externo" <?php if($consulta->getExterno()) echo 'checked'?>> Consulta externa
            </label>
            <p class="help-block">(Seleccione esta opción si la consulta fue realizada en otra veterinaria)</p>
          </div>
            <div class="form-group">
                <label for="pesoMascota">Peso de la mascota</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="pesoMascota" name="pesoMascota" placeholder="Peso" value="<?php echo $consulta->getPesoMascota();?>" >
                    <div class="input-group-addon">Kgs.</div>
                </div>
            </div>

            <h2>Servicios</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_servicio">Servicio</label>
                        <select class="form-control" id="id_servicio" name="id_servicio">
                            <option value="">Seleccione un Servicio</option>
                            <?php
                            foreach ($arrayServicio as $servicio) {
                                echo '<option value="'. $servicio->getId() .'" ';
                                echo 'data-precio="'. $servicio->getNroGavet()*$gavet->getPrecioGavet() .'" ';
                                echo '>' . $servicio->getNombre() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="observacion">Observaciones</label>
                        <textarea class="form-control" rows="3" name="observacion" id="observacion"> </textarea>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-info btn-sm" id="btnAgregarServicio">Agregar Servicio</button>
                    </div>
                </div>
                <div class="col-md-8">
                    <table class="table table-striped table-bordered" id="tblServicios">
                        <thead>
                          <tr>
                            <th>Servicio</th>
                            <th>Observación</th>
                            <th>Precio Sugerido</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if($_GET['id'])
                            {
                            $itemsConsulta = $consulta->getItemsConsulta();
                            foreach( $itemsConsulta as $item ){
                          ?>
                              <tr>
                                <td>
                                    <?php 
                                        echo $servicioNegocio->recuperar($item['id_servicio'])->getNombre(); 
                                        echo '<input name="servicios[]" type="hidden" value="'.$item['id_servicio'].'">';
                                        echo '<textarea name="observaciones[]" class="hidden">'.$item['observacion'].'</textarea>';
                                        echo '<input name="preciosSugeridos[]" type="hidden" value="'.$item['precioSugerido'].'">';
                                    ?>
                                </td>
                                <td><?php echo $item['observacion'];?></td>
                                <td><?php echo $item['precioSugerido'];?></td>
                                <td>
                                  <a href="#" title="Eliminar consulta" class="removeItemConsulta"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                              </tr>
                          <?php
                            }
                        }
                          ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <button type="button" class="btn btn-default cancelForm">Cancelar</button>
            <div class="btn-group dropup">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                <?php echo $txtAction; ?> y... <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu" id="submit">
                <li><a href="?modulo=consulta&accion=listar&idMascota=<?php echo $_GET['idMascota'];?>">volver al listado</a></li>
                <li><a href="?modulo=consulta&accion=editar&idMascota=<?php echo $_GET['idMascota'];?>">agregar otra consulta</a></li>
                <li><a href="?modulo=alerta&accion=editar&idMascota=<?php echo $_GET['idMascota'];?>">agregar un alerta</a></li>
              </ul>
            </div>
            <button type="submit" class="btn btn-primary hidden" id="submit-button"></button>
        </form>
    </div>