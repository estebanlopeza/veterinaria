<?php 
require_once('negocio/mascotaNegocio.php');
$mascotaNegocio = new mascotaNegocio();
require_once('negocio/clienteNegocio.php');
$clienteNegocio = new clienteNegocio();
?>
    <div class="container">
      <?php 
      $mascota = $mascotaNegocio->recuperar($_GET['idMascota']);
      $cliente = $clienteNegocio->recuperar($mascota->getIdCliente());
      ?>
      <ol class="breadcrumb">
        <li><a href="?modulo=cliente&accion=editar&id=<?php echo $cliente->getId(); ?>"><?php echo $cliente->getNombre().' '.$cliente->getApellido(); ?></a></li>
        <li><a href="?modulo=mascota&accion=editar&id=<?php echo $mascota->getId(); ?>"><?php echo $mascota->getNombre(); ?></a></li>
        <li class="active">Alertas</li>
      </ol>
      <div class="page-header">
        <h1>Alertas <button type="button" class="btn btn-primary btn-sm" onclick="document.location='?modulo=alerta&accion=editar&idMascota=<?php echo $mascota->getId();?>'">Agregar</button></h1>
      </div>
      <?php echo Util::getMsj(); ?>
      <table class="table table-striped table-bordered" id="tableListar">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Asunto</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $arrayAlertas = $alertaNegocio->listar($_GET['idMascota']);
          if( count($arrayAlertas) > 0 ){
            $hoy = date('Y-m-d');
            foreach( $arrayAlertas as $alerta ){
              $next = $alerta->getFecha() > $hoy? 'next' : 'prev';
          ?>
              <tr class="<?php echo $next; ?>">
                <td><?php echo Util::DbToDate($alerta->getFecha());?></td>
                <td><?php echo $alerta->getAsunto();?></td>
                <td>
                  <a href="?modulo=alerta&accion=editar&id=<?php echo $alerta->getId();?>&idMascota=<?php echo $mascota->getId(); ?>" data-toggle="tooltip" title="Editar alerta"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                  <a href="?modulo=alerta&accion=eliminar&id=<?php echo $alerta->getId();?>" data-toggle="tooltip" title="Eliminar alerta"><span class="glyphicon glyphicon-remove"></span></a>
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