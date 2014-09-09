    <div class="container">
      <div class="page-header">
        <h1>Mascota <button type="button" class="btn btn-primary btn-sm">Agregar</button></h1>
      </div>

      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Apellido</th>
            <th>Nombre</th>
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
                <td>
                  <a href="#" data-toggle="tooltip" title="Editar cliente"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <a href="#" data-toggle="tooltip" title="Eliminar cliente"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
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
        <form role="form">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="fechaNac">Fecha de nacimiento</label>
                <p class="help-block">Formato dd/mm/yyyy.</p>
                <input type="text" class="form-control" id="fechaNac" placeholder="dd/mm/yyyy">
            </div>
            <div class="form-group">
                <label for="especie">Especie</label>
                <select class="form-control" name="especie">
                    <option value="1">Perro</option>
                    <option value="2">Gato</option>
                </select>
            </div>
            <div class="form-group">
                <label for="raza">Raza</label>
                <select class="form-control" name="raza">
                    <option value="1">Caniche</option>
                    <option value="2">Doberman</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <select class="form-control" name="sexo">
                    <option value="macho">Macho</option>
                    <option value="hembra">Hembra</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pelaje">Pelaje</label>
                <input type="text" class="form-control" id="pelaje" placeholder="Pelaje">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Check me out
                </label>
            </div>
            
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>