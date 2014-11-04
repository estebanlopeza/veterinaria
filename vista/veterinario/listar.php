    <div class="container">
      <div class="page-header">
        <h1>Veterinarios <button type="button" class="btn btn-primary btn-sm" id="btn-agregar" name="btn-agregar" onclick="document.location='?modulo=veterinario&accion=editar'">Agregar</button></h1>
      </div>
      <?php echo Util::getMsj(); ?>
      <table class="table table-striped table-bordered" id="tableListar">
        <thead>
          <tr>
            <th>Id</th>
            <th>Apellido</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $veterinarioNegocio = new veterinarioNegocio();
          $arrayVeterinarios = $veterinarioNegocio->listar();
          if( count($arrayVeterinarios) > 0 ){
            foreach( $arrayVeterinarios as $veterinario ){
          ?>
              <tr>
                <td><?php echo $veterinario->getId();?></td>
                <td><?php echo $veterinario->getApellido();?></td>
                <td><?php echo $veterinario->getNombre();?></td>
                <td><?php echo $veterinario->getUsuario();?></td>
                <td>
                  <a href="?modulo=veterinario&accion=editar&id=<?php echo $veterinario->getId();?>" data-toggle="tooltip" title="Editar veterinario"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <?php if($veterinario->getId() != $_SESSION['veterinario']['id']){
                  ?> 
                  <a href="?modulo=veterinario&accion=eliminar&id=<?php echo $veterinario->getId();?>" data-toggle="tooltip" title="Eliminar veterinario"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                <?php } ?>
                </td>
              </tr>
          <?php
            }
          }else{
          ?>
          <tr>
            <td colspan="5">No se encontraron resultados</td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>