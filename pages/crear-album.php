<?php
  header('Content-type: text/html; charset=utf-8');
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
      <link rel="stylesheet" type="text/css" href="../css/default.css" />
    </head>
    <body>
      <div id="contenedor-prin" class="container">
        <div class="row">
          <div id="cabecera" class="col-sm-13">
            <img class="img-responsive" src="../images/cabecera.png">
            <h3>Crear Album</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <div id="formulario" class="col-sm-10">
            <form class="form-horizontal" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="" class="col-sm-3 control-label">Nombre del Album:</label>
                <div class="col-sm-6">
                  <input type="text" name="nombrealbum" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <br>
                <label for="" class="col-sm-3 control-label">Seleccione su Album:</label>
                <div class="col-sm-3">
                  <br><input type="file" name="foto[]" multiple directory webkitdirectory mozdirectory>
                </div>
              </div>
              <div class="form-group">
                <br>
                <div class="col-sm-4"></div>
                <div class="col-sm-2">
                  <input type="submit" class="btn btn-primary btn-lg" value="Crear Album">
                </div>
              </div>
            </form>
          </div>
          <div class="col-sm-1"></div>
        </div>
        <?php
          include('../php/libreria.php');
          $crear=albumes();
        ?>
        <div class="row">
          <div class="col-sm-10"></div>
          <div class="col-sm-2">
            <a href="fotos.php"><input type="button" class="btn btn-danger btn-lg btn-block" value="Salir"></a>
          </div>
        </div>
        <br>
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