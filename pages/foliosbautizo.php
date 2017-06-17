<?php 
  session_start();
  include('../php/conexion.php');
  if(isset($_SESSION['usuario_nombre'])) 
  {
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();
    
    $libro=$_GET['libro'];
    $registroslibros=mysqli_query($conexion,"SELECT folio_bau FROM bautizo WHERE libro_bau='$libro'") or die(mysqli_error());
    if($reglibros=mysqli_fetch_array($registroslibros))
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
            <h3>Libro de Bautizo N° <?php echo $libro; ?></h3>
          </div>
        </div>
        <br>
        <div class="row">
          <?php
            $registros=mysqli_query($conexion,"SELECT DISTINCT folio_bau FROM bautizo WHERE libro_bau='$libro'") or die(mysqli_error());
          while($reg=mysqli_fetch_array($registros))
            {
          ?>
          <div class="col-sm-1">
          </div>
          <div class="col-sm-3">
              <div class="col-sm-8">
                <h4 class="glyphicon glyphicon-file"><a href="boletasbautizo.php?libro=<?php echo $libro.'&folio='.$reg['folio_bau']; ?>" target="_blank"><b><?php echo 'Folio: '.$reg['folio_bau']; ?></b></a></h4>
              </div>
          </div>
          <?php
            }
          ?>
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
      header("Location: librosbautizo.php");
    }
  }
  else 
  {
    header("Location: login.php");
  }
?>  