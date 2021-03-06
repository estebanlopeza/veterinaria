<?php 
$arrayMascotas = $mascotaNegocio->listar();
require_once('negocio/clienteNegocio.php');
$clienteNegocio = new clienteNegocio();
$cliente = $clienteNegocio->recuperar($_GET['idCliente']);
 ?>
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="?modulo=cliente&accion=editar&id=<?php echo $cliente->getId(); ?>"><?php echo $cliente->getNombre().' '.$cliente->getApellido(); ?></a></li>
        <li class="active">Mascotas</li>
      </ol>
      <div class="page-header">
        <h1>Mascotas <button type="button" class="btn btn-primary btn-sm" onclick="document.location='?modulo=mascota&accion=editar&idCliente=<?php echo $cliente->getId();?>'">Agregar</button></h1>
      </div>
      <?php echo Util::getMsj(); ?>
      <table class="table table-striped table-bordered" id="tableListar">
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
                <td><?php echo Util::DbToDate($mascota->getFechaNac());?></td>
                <td>
                  <a href="?modulo=mascota&accion=editar&id=<?php echo $mascota->getId();?>&idCliente=<?php echo $cliente->getId();?>" data-toggle="tooltip" title="Editar mascota"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <a href="?modulo=mascota&accion=eliminar&id=<?php echo $mascota->getId();?>" data-toggle="tooltip" title="Eliminar mascota"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                  <a href="?modulo=consulta&accion=listar&idMascota=<?php echo $mascota->getId();?>" data-toggle="tooltip" title="Listar consultas"><span class="glyphicon glyphicon-list"></span></a>&nbsp;
                  <a href="?modulo=alerta&accion=listar&idMascota=<?php echo $mascota->getId();?>" data-toggle="tooltip" title="Ver alertas"><span class="glyphicon glyphicon-exclamation-sign"></span></a>
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