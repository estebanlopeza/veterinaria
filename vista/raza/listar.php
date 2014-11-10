    <div class="container">
      <div class="page-header">
        <h1>Razas <button type="button" class="btn btn-primary btn-sm" id="btn-agregar" name="btn-agregar" onclick="document.location='?modulo=raza&accion=editar'">Agregar</button></h1>
      </div>
      <?php echo Util::getMsj(); ?>
      <table class="table table-striped table-bordered" id="tableListar">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Especie</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once('negocio/especieNegocio.php');
          $especieNegocio = new especieNegocio();
          $arrayEspecie = $especieNegocio->listar();

          $arrayRazas = $razaNegocio->listar();
          if( count($arrayRazas) > 0 ){
            foreach( $arrayRazas as $raza ){
          ?>
              <tr>
                <td><?php echo $raza->getId();?></td>
                <td><?php echo $raza->getNombre();?></td>
                <td><?php
                    foreach ($arrayEspecie as $especie) {
                      if( $especie->getId() == $raza->getIdEspecie() )
                      {
                        echo $especie->getNombre();
                      }
                    }
                ?>
              </td>
                <td>
                  <a href="?modulo=raza&accion=editar&id=<?php echo $raza->getId();?>" data-toggle="tooltip" title="Editar raza"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <a href="?modulo=raza&accion=eliminar&id=<?php echo $raza->getId();?>" data-toggle="tooltip" title="Eliminar raza"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
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