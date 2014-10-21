    <?php
    if ($_GET['id']) {
        $cliente = $clienteNegocio->recuperar($_GET['id']);
        $txtAction = 'Editar';
    }else{
        $cliente = new cliente();
        $txtAction = 'Agregar';
    }
    ?>
    <div class="container">
      <div class="page-header">
        <h1><?php echo $txtAction; ?> Cliente</h1>
      </div>
        <form role="form" method="post">
            <input type="hidden" name="id" value="<?php echo $cliente->getId();?>" >
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $cliente->getNombre();?>" >
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo $cliente->getApellido();?>" >
            </div>
            <div class="form-group">
                <label for="tipoDoc">Tipo de Documento</label>
                <select class="form-control" id="tipoDoc" name="tipoDoc">
                    <option value="DNI" <?php if($cliente->getTipoDoc() == 'DNI') {echo "selected";} ?>  >DNI</option>
                    <option value="LC" <?php if($cliente->getTipoDoc() == 'LC') {echo "selected";} ?> >LC</option>
                    <option value="LE" <?php if($cliente->getTipoDoc() == 'LE') {echo "selected";} ?> >LE</option>
                    <option value="Pasaporte" <?php if($cliente->getTipoDoc() == 'Pasaporte') {echo "selected";} ?> >Pasaporte</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nroDoc">Numero de Documento</label>
                <input type="text" class="form-control" id="nroDoc" name="nroDoc" placeholder="Numero de Documento" value="<?php echo $cliente ->getNroDoc();?>">
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $cliente ->getDireccion();?>">
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $cliente ->getTelefono();?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $cliente ->getEmail();?>">
            </div>
            
            <button type="submit" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $txtAction; ?></button>
        </form>
    </div>