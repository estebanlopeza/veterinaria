      <?php
          $gavet = $gavetNegocio->recuperar(date('d/m/Y'));
          $txtAction = 'Actualizar';
      ?>
    <div class="container">
      <div class="page-header">
        <h1>Gavet </h1>
      </div>
        <form role="form" method="post">
            <div class="form-group">
                <label for="valorActual">Valor Actual</label>
                <input type="text" class="form-control" disabled name="valorActual" value="<?php echo $gavet->getPrecioGavet();?>" >
            </div>
            <div class="form-group">
                <label for="precioGavet">Nuevo Valor</label>
                <input type="text" class="form-control" id="precioGavet" name="precioGavet" placeholder="Nuevo Valor">
            </div>
            
            
            <button type="submit" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $txtAction; ?></button>
        </form>
    </div>