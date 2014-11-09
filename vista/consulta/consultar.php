<?php 
$consulta = $consultaNegocio->recuperar($_GET['id']);
require_once('negocio/mascotaNegocio.php');
$mascotaNegocio = new mascotaNegocio();
$mascota = $mascotaNegocio->recuperar($consulta->getIdMascota());
require_once('negocio/especieNegocio.php');
$especieNegocio = new especieNegocio();
$especie = $especieNegocio->recuperar($mascota->getIdEspecie());
require_once('negocio/razaNegocio.php');
$razaNegocio = new razaNegocio();
$raza = $razaNegocio->recuperar($mascota->getIdRaza());
require_once('negocio/clienteNegocio.php');
$clienteNegocio = new clienteNegocio();
$cliente = $clienteNegocio->recuperar($mascota->getIdCliente());
require_once('negocio/servicioNegocio.php');
$servicioNegocio = new servicioNegocio();
?>
    <div class="container">
      <div class="page-header">
        <h1>Reporte de consulta</h1>
      </div>
      <?php echo Util::getMsj(); ?>
      <div id="reporte">
        <div class="row">
          <div class="col-md-6">
            <p><strong>Fecha:</strong> <?php echo Util::DbToDate($consulta->getFecha()) ?></p>
            <p><strong>Cliente:</strong> <?php echo $cliente->getApellido().', '.$cliente->getNombre() ?></p>
            <p><strong>Mascota:</strong> <?php echo $mascota->getNombre() ?></p>
            <p><strong>Especie:</strong> <?php echo $especie->getNombre() ?></p>            
          </div>
          <div class="col-md-6">
            <p><strong>Raza:</strong> <?php echo $raza->getNombre() ?></p>
            <p><strong>Fecha de nacimiento: </strong><?php echo Util::DbToDate($mascota->getFechaNac()) ?></p>
            <p><strong>Peso:</strong> <?php echo $consulta->getPesoMascota() ?> Kgs.</p>
          </div>
        </div>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Servicio</th>
              <th>Observaciones</th>
              <th>Precio Sugerido</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $precioTotal = 0;
            $itemsConsulta = $consulta->getItemsConsulta();
            foreach ($itemsConsulta as $item) {
              $precioTotal += $item['precioSugerido'];
              echo '<tr>';
                echo '<td>'.$servicioNegocio->recuperar($item['id_servicio'])->getNombre().'</td>';
                echo '<td>'.$item['observacion'].'</td>';
                echo '<td>$'.$item['precioSugerido'].'</td>';
              echo '</tr>';
            }
          ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="2"><strong>Precio sugerido total:</strong></td>
              <td><strong>$<?php echo $precioTotal; ?></strong></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>