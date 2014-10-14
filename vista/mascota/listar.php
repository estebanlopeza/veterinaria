    <div class="container">
      <div class="page-header">
        <h1>Mascotas <button type="button" class="btn btn-primary btn-sm" onclick="document.location='?modulo=mascota&accion=editar&idCliente=<?php echo $_GET['idCliente'];?>'">Agregar</button></h1>
      </div>
      <?php echo Util::getMsj(); ?>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Fecha de Nacimiento</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $mascotaNegocio = new mascotaNegocio();
          $arrayMascotas = $mascotaNegocio->listar();
          if( count($arrayMascotas) > 0 ){
            foreach( $arrayMascotas as $mascota ){
          ?>
              <tr>
                <td><?php echo $mascota->getId();?></td>
                <td><?php echo $mascota->getNombre();?></td>
                <td><?php echo $mascota->getFechaNac();?></td>
                <td>
                  <a href="?modulo=mascota&accion=editar&id=<?php echo $mascota->getId();?>&idCliente=<?php echo $_GET['idCliente'];?>" data-toggle="tooltip" title="Editar mascota"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <a href="?modulo=mascota&accion=eliminar&id=<?php echo $mascota->getId();?>" data-toggle="tooltip" title="Eliminar mascota"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
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