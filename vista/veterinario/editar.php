    <?php
    if ($_GET['id']) {
        $veterinario = $veterinarioNegocio->recuperar($_GET['id']);
        $txtAction = 'Editar';
    }else{
        $veterinario = new veterinario();
        $txtAction = 'Agregar';
    }
    ?>
    <div class="container">
      <div class="page-header">
        <?php echo Util::getMsj(); ?>
        <h1><?php echo $txtAction; ?> Veterinario</h1>
      </div>
        <form role="form" method="post" id="principal">
            <input type="hidden" name="id" value="<?php echo $veterinario->getId();?>" >
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $veterinario->getUsuario();?>" 
                <?php if($_GET['id']) { ?> disabled <?php }else{?> data-remote="checkUser.php" required <?php } ?> >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $veterinario->getNombre();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo $veterinario->getApellido();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="matricula">Matricula</label>
                <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matricula" value="<?php echo $veterinario->getMatricula();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $veterinario ->getEmail();?>" required>
                <div class="help-block with-errors"></div>
            </div>
            
            <?php if($_GET['id']){ ?>
            <div class="alert alert-info" role="alert">Para cambiar su contraseña, complete los siguientes campos.<br>Para <strong>No</strong> cambiar su contraseña, <strong>No</strong> complete los siguientes campos.</div>
            <?php } ?>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" value="" <?php if(!$_GET['id']) { ?> required <?php } ?> >
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="confpassword">Confirmar Contraseña</label>
                <input type="password" class="form-control" id="confpassword" name="confpassword" placeholder="Confirmar Contraseña" value="" <?php if(!$_GET['id']) { ?> data-match="#password" <?php } ?> >
                <div class="help-block with-errors"></div>
            </div>

            <button type="button" class="btn btn-default cancelForm">Cancelar</button>
            <button type="submit" class="btn btn-primary"><?php echo $txtAction; ?></button>

        </form>
    </div>