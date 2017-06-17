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
            <h3>Libros de Confirmación</h3>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-1">
          </div>
          <div class="col-sm-10">
            <ul>
            <?php
              $registros=mysqli_query($conexion,"SELECT DISTINCT fecha_conf FROM confirmacion") or die(mysqli_error());
              while($reg=mysqli_fetch_array($registros))
              {
                $fconf = date('d/m/Y', strtotime(str_replace('/', '-', $reg['fecha_conf'])));
            ?>
              <li>
                <h4 class="glyphicon glyphicon-file"><a href="listadoconfirmacion.php?fecha=<?php echo $reg['fecha_conf']; ?>" target="_blank"><b><?php echo $fconf; ?></b></a></h4>
              </li>
            <?php
              }
            ?>
            </ul>
          </div>
          <div class="col-sm-1">
          </div>
        </div>
        <div class="row">
          <br>
          <div class="col-sm-10"></div>
          <div class="col-sm-2">
            <a href="acceso.php"><input type="button" class="btn btn-danger btn-lg" value="Salir"></a>
          </div>
        </div>
        <br>
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