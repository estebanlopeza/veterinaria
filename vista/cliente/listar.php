    <div class="container">
      <div class="page-header">
        <h1>Clientes <button type="button" class="btn btn-primary btn-sm">Agregar</button></h1>
      </div>

      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $clienteNegocio = new clienteNegocio();
          $arrayClientes = $clienteNegocio->listar();
          if( count($arrayClientes) > 0 ){
            foreach( $arrayClientes as $cliente ){
          ?>
              <tr>
                <td><?php echo $cliente['id']?></td>
                <td><?php echo $cliente['apellido']?></td>
                <td><?php echo $cliente['nombreCliente']?></td>
                <td>
                  <a href="#" data-toggle="tooltip" title="Editar cliente"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <a href="#" data-toggle="tooltip" title="Eliminar cliente"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                  <a href="?modulo=mascota&accion=listar&idCliente=<?php echo $cliente['id'] ?>" data-toggle="tooltip" title="Listar mascotas"><span class="glyphicon glyphicon-list"></span></a>
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