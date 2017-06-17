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
    </head>
    <body>
      <div id="contenedor-prin" class="container">
        <div class="row">
          <div id="cabecera" class="col-sm-13">
            <img class="img-responsive" src="../images/cabecera.png">
            <h3>Registro de Usuario</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <div id="formulario" class="col-sm-10">
            <form name="bautizo" class="form-horizontal" method="post" action="registrousuario.php">
              <div class="form-group">
                <label class="col-sm-3 control-label" for="user">* Alias de Usuario:</label>
                <div class="col-sm-3">
                  <input class="form-control" type="text" name="user">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="nombapell">* Nombre y Apellido:</label>
                <div class="col-sm-3">
                  <input class="form-control" type="text" name="nombapell" id="nombapell">
                </div>
              </div>
              <div class="form-group">
                <label for="ministro" class="col-sm-3 control-label">* Grado de Permiso: </label>
                <div class="col-sm-3">
                  <select class="form-control" name="grado" id="grado">
                    <option value="0" selected>Seleccione...</option>
                    <option value="1">Máximo</option>
                    <option value="2">Medio</option>
                    <option value="3">Limitado</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="password">* Contraseña:</label>
                <div class="col-sm-3">
                  <input class="form-control" type="password" name="password">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="password_conf">* Confirmar Contraseña:</label>
                <div class="col-sm-3">
                  <input class="form-control" type="password" name="password_conf">
                </div>
              </div>
              <div class="form-group">
                <br>
                <div class="col-sm-10"></div>
                <div class="col-sm-2">
                  <input type="submit" name="reguser" class="btn btn-primary btn-lg" value="Registrar">
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
        <div class="row">
          <div class="col-sm-12">
            <?php
            if(isset($_POST['reguser']))
            {
              include("../php/libreria.php");
              $usuario=registrousuario();
            }
            ?>
          </div>
        </div>
      </div>
      <!-- Mostrar Objetos Ocultos -->
      <script src="../js/mostrar.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="../js/bootstrap.min.js"></script>
    </body>
  </html>
<?php
  }
  else 
  {
    header("Location: login.php");
  }
?>  