    <div class="container">
      <div class="page-header">
        <h1>Consultas <button type="button" class="btn btn-primary btn-sm" id="btn-agregar" name="btn-agregar" onclick="document.location='?modulo=cliente&accion=editar'">Agregar</button></h1>
      </div>
      <?php echo Util::getMsj(); ?>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Fecha</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $consultaNegocio = new consultaNegocio();
          $arrayConsultas = $consultaNegocio->listar();
          if( count($arrayConsultas) > 0 ){
            foreach( $arrayConsultas as $consulta ){
          ?>
              <tr>
                <td><?php echo $consulta->getId();?></td>
                <td><?php echo $consulta->getFecha();?></td>
                <td>
                  <a href="?modulo=consulta&accion=editar&id=<?php echo $consulta->getId();?>" data-toggle="tooltip" title="Editar consulta"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <a href="?modulo=consulta&accion=eliminar&id=<?php echo $consulta->getId();?>" data-toggle="tooltip" title="Eliminar consulta"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                  <a href="?modulo=consulta&accion=editar" data-toggle="tooltip" title="Agregar consulta"><span class="glyphicon glyphicon-list"></span></a>
                </td>
              </tr>
          <?php
            }
          }else{
          ?>
          <tr>
            <td colspan="4">No se encontraron resultados</td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>