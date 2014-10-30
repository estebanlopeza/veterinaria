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
        <form role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $consulta->getId();?>" >
            <input type="hidden" name="id_mascota" value="<?php echo $_GET['idMascota'];?>" >
            <div class="form-group">
                <label for="fecha">Fecha de consulta</label>
                <p class="help-block">Formato dd/mm/yyyy.</p>
                <input type="text" class="form-control datepicker" id="fecha" name="fecha" placeholder="dd/mm/yyyy" value="<?php echo $fecha;?>">

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
                          ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <button type="submit" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $txtAction; ?></button>
        </form>
    </div>