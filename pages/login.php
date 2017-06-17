<?php
    session_start();
    include('../php/conexion.php');
    if(empty($_SESSION['usuario_nombre'])) // comprobamos que las variables de sesión estén vacías
    {      
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
    <link href="../css/personalizacion.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      .caja
      {
        margin: 20px auto;
        max-width: 350px;
        box-shadow: 0 2px 10px #d6d6d6;
        text-align: center;
        padding: 20px;
      }
      .caja img
      {
        max-width: 120px;
      }
      #error
      {
        margin-top: 2px;
      }
      #incorrecto
      {
        color: #ffffff;
        font-weight: bold;
        font-size: 14px;
      }
      #iniciar
      {
        color: #000000;
        font-weight: bold;
        font-size: 14px;
      }
    </style>
  </head>
  <body>
    <div class="container" id="contenedor-principal">
      <div class="row">
        <div class="col-sm-13">
          <img class="img-responsive" src="../images/cabecerasistema.png">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="caja jumbotron">
            <img src="../images/admin.png" alt="">
            <div id="error" style="<?php if(isset($_GET['error']) AND (($_GET['error']==1) OR ($_GET['error']==2))) echo 'background-color: red';?>"><?php if(isset($_GET['error']) AND ($_GET['error']==1)) echo '<p id="incorrecto">Datos Incorrectos</p>'; if(isset($_GET['error']) AND ($_GET['error']==2)) echo '<p id="incorrecto">Sesión caducada por inactividad</p>'; if(!(isset($_GET['error']))) echo '<p id="iniciar">Iniciar Sesión</p>';?></div>
            <form action="../php/comprobar.php" method="post">
              <label for="user">Usuario:</label>
              <input type="text" name="user" class="form-control">
              <label for="pass">Contraseña:</label>
              <input type="password" name="pass" class="form-control">
              <br><br>
              <input type="submit" name="ingresar" value="Ingresar" class="btn btn-primary btn-block">
              <br>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12" id="desarrollado">
          <center>..:: Desarrollado por <a href="https://twitter.com/belkisrubio" target="_blank">Belkis Rubio</a> y <a href="https://twitter.com/josueruiz91" target="_blank">Josué Ruiz</a> bajo la dirección de la <a href="http://www.uvm.edu.ve" target="_blank">Universidad Valle del Momboy</a> ::..</center>
        </div>
        <div class="col-sm-12" id="pie">
          <p>Parroquia Nuestra Señora de la Candelaria</p>
          <p>Urb. La Beatriz, Valera</p>
          <p>Trujillo - Venezuela</p>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
<?php
    }
    else 
    {
      header("location: acceso.php");
    }
?>