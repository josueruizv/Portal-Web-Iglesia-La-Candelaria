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
            <h3>Indice del Libro de Bautizo N° <?php echo $libro; ?></h3>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="A" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="A">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="B" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="B">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="C" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="C">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="D" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="D">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="E" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="E">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="F" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="F">
            </form>
          </div>
        </div>
        <div class="row">
          <br>
          <div class="col-sm-3"></div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="G" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="G">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="H" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="H">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="I" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="I">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="J" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="J">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="K" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="K">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="L" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="L">
            </form>
          </div>
        </div>
        <div class="row">
          <br>
          <div class="col-sm-3"></div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="M" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="M">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="N" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="N">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="Ñ" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="Ñ">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="O" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="O">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="P" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="P">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="Q" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="Q">
            </form>
          </div>
        </div>
        <div class="row">
          <br>
          <div class="col-sm-3"></div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="R" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="R">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="S" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="S">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="T" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="T">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="U" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="U">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="V" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="V">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="W" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="W">
            </form>
          </div>
        </div>
        <div class="row">
          <br>
          <div class="col-sm-3"></div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="X" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="X">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="Y" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="Y">
            </form>
          </div>
          <div class="col-sm-1">
            <form method="post" action="indicebautizo.php?libro=<?php echo $_GET['libro'].'#msj'; ?>">
              <input type="hidden" value="Z" name="letra" readonly>
              <input name="indi" type="submit" class="btn btn-lg btn-block btn-primary" value="Z">
            </form>
          </div>
        </div>
        <br>
        <br>
        <div class="row" id="msj">
          <?php
            include("../php/libreria.php");
            $indicebau=indice();
          ?>
        </div>
        <br>
        <div class="row">
          <br>
          <div class="col-sm-10"></div>
          <div class="col-sm-2">
            <a href="librosbautizo.php"><input type="button" class="btn btn-danger btn-lg" value="Salir"></a>
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