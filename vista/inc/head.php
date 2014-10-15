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
                <li><a href="?modulo=cliente&accion=listar">Listar clientes</a></li>
                <li><a href="?modulo=cliente&accion=editar">Agregar cliente</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Servicios <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="?modulo=servicio&accion=listar">Listar servicios</a></li>
                <li><a href="?modulo=servicio&accion=editar">Agregar servicio</a></li>
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
