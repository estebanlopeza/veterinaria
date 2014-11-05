<?php 
require_once('negocio/consultaNegocio.php');
$consultaNegocio = new consultaNegocio();
$consulta = $consultaNegocio->recuperar($_GET['idConsulta']);
?>
    <div class="container">
      <div class="page-header">
        <h1>Reporte</h1>
      </div>
      <?php echo Util::getMsj(); ?>
      <p>
        Fecha: <strong><?php echo Util::DbToDate($consulta->getFecha()) ?></strong>
      </p>
      <p>
        Cliente: <strong><?php echo Util::DbToDate($consulta->getFecha()) ?></strong>
      </p>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Servicio</th>
            <th>Observaciones</th>
            <th>Precio Sugerido</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>