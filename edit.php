<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vet - Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">RdA</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Listar clientes</a></li>
                <li><a href="#">Agregar cliente</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mascotas <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Listar mascota</a></li>
                <li><a href="#">Agregar mascota</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Servicios <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Listar servicios</a></li>
                <li><a href="#">Agregar servicio</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Opciones</a></li>
            <li><a href="#">Salir</a></li>
          </ul>
          <p class="navbar-text navbar-right">Hola Juan!</p>
        </div><!--/.nav-collapse -->
      </div>
    </div><!-- /navbar -->


    <div class="container">
      <div class="page-header">
        <h1>Nuevo cliente</h1>
      </div>
      
      <form role="form" action="" method="post">
        <div class="row">
          <div class="form-group col-xs-6">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
          </div>
          <div class="form-group col-xs-6">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-xs-3">
            <label for="tipoDoc">Tipo de Documento</label>
            <select class="form-control" id="tipoDoc" name="tipoDoc">
              <option value="DNI">DNI</option>
              <option value="LC">LC</option>
              <option value="LE">LE</option>
              <option value="Pasaporte">Pasaporte</option>
            </select>
          </div>
          <div class="form-group col-xs-9">
            <label for="nroDoc">Nro de Documento</label>
            <input type="text" class="form-control" id="nroDoc" name="nroDoc">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-xs-12">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-xs-6">
            <label for="telefono">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
          </div>
          <div class="form-group col-xs-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
        </div>
        <div class="row pull-right">
          <div class="form-group col-xs-12">
            <button type="button" class="btn btn-default">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/global.js"></script>
  </body>
</html>