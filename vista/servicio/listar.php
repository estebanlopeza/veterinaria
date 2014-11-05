    <div class="container">
      <div class="page-header">
        <h1>Servicios <button type="button" class="btn btn-primary btn-sm" id="btn-agregar" name="btn-agregar" onclick="document.location='?modulo=servicio&accion=editar'">Agregar</button></h1>
      </div>
      <?php echo Util::getMsj(); ?>
      <table class="table table-striped table-bordered" id="tableListar">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $arrayServicios = $servicioNegocio->listar();
          if( count($arrayServicios) > 0 ){
            foreach( $arrayServicios as $servicio ){
          ?>
              <tr>
                <td><?php echo $servicio->getId();?></td>
                <td><?php echo $servicio->getNombre();?></td>
                <td>
                  <a href="?modulo=servicio&accion=editar&id=<?php echo $servicio->getId();?>" data-toggle="tooltip" title="Editar servicio"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <a href="?modulo=servicio&accion=eliminar&id=<?php echo $servicio->getId();?>" data-toggle="tooltip" title="Eliminar servicio"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                </td>
              </tr>
          <?php
            }
          }else{
          ?>
          <tr>
            <td colspan="3">No se encontraron resultados</td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>