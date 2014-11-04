    <div class="container">
      <div class="page-header">
        <h1>Clientes <button type="button" class="btn btn-primary btn-sm" id="btn-agregar" name="btn-agregar" onclick="document.location='?modulo=cliente&accion=editar'">Agregar</button></h1>
      </div>
      <?php echo Util::getMsj(); ?>
      <table class="table table-striped table-bordered" id="tableListar">
        <thead>
          <tr>
            <th>Id</th>
            <th>Apellido</th>
            <th>Nombre</th>
            <th>Documento</th>
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
                <td><?php echo $cliente->getId();?></td>
                <td><?php echo $cliente->getApellido();?></td>
                <td><?php echo $cliente->getNombre();?></td>
                <td><?php echo $cliente->getTipoDoc() . ' ' . $cliente->getNroDoc();?></td>
                <td>
                  <a href="?modulo=cliente&accion=editar&id=<?php echo $cliente->getId();?>" data-toggle="tooltip" title="Editar cliente"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <a href="?modulo=cliente&accion=eliminar&id=<?php echo $cliente->getId();?>" data-toggle="tooltip" title="Eliminar cliente"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                  <a href="?modulo=mascota&accion=listar&idCliente=<?php echo $cliente->getId();?>" data-toggle="tooltip" title="Listar mascotas"><span class="glyphicon glyphicon-list"></span></a>
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