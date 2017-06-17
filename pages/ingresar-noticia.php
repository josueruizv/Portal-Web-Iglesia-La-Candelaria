<?php 
  session_start();
  include('../php/conexion.php');
  if(isset($_SESSION['usuario_nombre'])) 
  {
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();
?>
  <!DOCTYPE html>
  <html lang="es">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Parroquia Ntra. Sra. de la Candelaria</title>

      <!-- Bootstrap -->
      <link href="../css/bootstrap.min.css" rel="stylesheet">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

      <!-- Bootstrap -->
      <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.7.2.custom.css" />
      <!-- Estilo Personalizado -->
      <link rel="stylesheet" type="text/css" href="../css/personalizacion.css">
      <!-- Calendario -->
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    </head>
    <body>
      <div id="contenedor-prin" class="container">
        <div class="row">
          <div id="cabecera" class="col-sm-13">
            <img class="img-responsive" src="../images/cabecera.png">
            <h3>Cargar Noticia</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <div id="formulario" class="col-sm-10">
            <form class="form-horizontal" method="post" action="ingresar-noticia.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">* Título:</label>
                <div class="col-sm-4">
                  <input type="text" name="titulo" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">* Descripción:</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="8" name="descripcion"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">* Noticia:</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="15" name="noticia"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">* Autor:</label>
                <div class="col-sm-4">
                  <input type="text" name="autor" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">* Fecha:</label>
                <div class="col-sm-4">
                  <input type="date" name="fecha" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <br>
                <label for="imagen" class="col-sm-3 control-label">Adjuntar Imagen:</label>
              </div>
              <div class="form-group">
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                  <input type="file" name="imagen">
                </div>
              </div>
              <div class="form-group">
                <br>
                <div class="col-sm-10"></div>
                <div class="col-sm-2">
                  <input type="submit" name="regnoti" class="btn btn-primary btn-lg" value="Ingresar">
                </div>
              </div>
              <div class="form-group">
                <br>
                <div class="col-sm-10"></div>
                <div class="col-sm-2">
                  <a href="acceso.php"><input type="button" class="btn btn-danger btn-lg" value="Salir"></a>
                </div>
              </div>
            </form>
          </div>
          <div class="col-sm-1"></div>
        </div>
        <div class="row" id="msj">
          <div class="col-sm-12">
            <?php
              include("../php/libreria.php");
              $noti=registrarnoti();
            ?>
          </div>
        </div>
      </div>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="../js/bootstrap.min.js"></script>
      <!-- Mostrar Objetos Ocultos -->
      <script src="../js/mostrar.js"></script>
    </body>
  </html>
<?php
  }
  else 
  {
    header("Location: login.php");
  }
?>  