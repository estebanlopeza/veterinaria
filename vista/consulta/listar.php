<?php 
require_once('negocio/mascotaNegocio.php');
$mascotaNegocio = new mascotaNegocio();
$mascota = $mascotaNegocio->recuperar($_GET['idMascota']);

require_once('negocio/clienteNegocio.php');
$clienteNegocio = new clienteNegocio();
$cliente = $clienteNegocio->recuperar($mascota->getIdCliente());
?>
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="?modulo=cliente&accion=editar&id=<?php echo $cliente->getId(); ?>"><?php echo $cliente->getNombre().' '.$cliente->getApellido(); ?></a></li>
        <li><a href="?modulo=mascota&accion=editar&id=<?php echo $mascota->getId(); ?>"><?php echo $mascota->getNombre(); ?></a></li>
        <li class="active">Consultas</li>
      </ol>
      <div class="page-header">
        <h1>Consultas <button type="button" class="btn btn-primary btn-sm" id="btn-agregar" name="btn-agregar" onclick="document.location='?modulo=consulta&accion=editar&idMascota=<?php echo $_GET['idMascota'] ?>'">Agregar</button></h1>
      </div>
      <?php echo Util::getMsj(); ?>
      <table class="table table-striped table-bordered" id="tableListar">
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
          $arrayConsultas = $consultaNegocio->listar($_GET['idMascota']);
          if( count($arrayConsultas) > 0 ){
            foreach( $arrayConsultas as $consulta ){
          ?>
              <tr>
                <td><?php echo $consulta->getId();?></td>
                <td><?php echo $consulta->getFecha();?></td>
                <td>
                  <a href="?modulo=consulta&accion=editar&id=<?php echo $consulta->getId();?>&idMascota=<?php echo $_GET['idMascota'] ?>" data-toggle="tooltip" title="Editar consulta"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <a href="?modulo=consulta&accion=eliminar&id=<?php echo $consulta->getId();?>&idMascota=<?php echo $_GET['idMascota'] ?>" data-toggle="tooltip" title="Eliminar consulta"><span class="glyphicon glyphicon-remove"></span></a>
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