<?php
  session_start();
  if(isset($_SESSION['usuario_nombre'])) 
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
      #mensaje
      {
        text-align: center;
        margin: 70px auto;
      }
      .principal
      {
        background: url(../images/torrefondo.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        margin-bottom: 20px;
      }

    </style>
  </head>
  <body>
    <div class="container" id="contenedor-prin">
      <div class="row">
        <div class="col-sm-13">
          <img class="img-responsive" src="../images/cabecerasistema.png">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-13">
          <nav id="menu" class="navbar navbar-inverse" role="navigation">
            <div class="container-fluit">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acolapsar">
                  <span class="sr-only">Toggle Navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <div class="collapse navbar-collapse" id="acolapsar">
                <ul class="nav navbar-nav">
                <?php 
                  if(($_SESSION['usuario_grado']==1) or ($_SESSION['usuario_grado']==2)) 
                  {
                ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"> Bautizo <b class="caret"></p></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="bautizo.php"> Registrar Nuevo </a></li>
                      <li><a href="consultar-bautizo.php"> Consultar </a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"> Comunión <b class="caret"></p></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="registrocomunion.php"> Registrar Nuevo </a></li>
                      <li><a href="consultar-comunion.php"> Consulta </a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"> Confirmación <b class="caret"></p></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="registroconfirmacion.php"> Registrar Nuevo </a></li>
                      <li><a href="consultar-confirmacion.php"> Consulta </a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"> Matrimonio <b class="caret"></p></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="registroesposo.php"> Registrar Nuevo </a></li>
                      <li><a href="consultar-matrimonio.php"> Consulta </a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"> Libros de Registro <b class="caret"></p></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="librosbautizo.php"> Bautizo </a></li>
                      <li><a href="fechascomunion.php"> Comunion </a></li>
                      <li><a href="fechasconfirmacion.php"> Confirmación </a></li>
                      <li><a href="librosmatrimonio.php"> Matrimonio </a></li>
                    </ul>
                  </li>
                <?php
                  }
                ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"> Administración Web <b class="caret"></p></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="ingresar-noticia.php"> Noticias </a></li>
                    <?php 
                      if($_SESSION['usuario_grado']!=3)
                      {
                    ?>
                      <li><a href="fotos.php"> Albumes </a></li>
                    <?php 
                      }
                      if($_SESSION['usuario_grado']==1)
                      {
                    ?>
                      <li><a href="registrousuario.php"> Registrar Nuevo Usuario </a></li>
                    <?php 
                      }
                    ?>
                    </ul>
                  </li>
                </ul>
                <a href="../php/logout.php" class="btn btn-primary navbar-btn pull-right">Cerrar Sesión</a>
                <a class="navbar-brand pull-right" href="perfil.php?id=<?php echo $_SESSION['usuario_id']; ?>"><?php echo $_SESSION['usuario_nombre'];?></a>         
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div class="row principal">
        <div id="mensaje" class="col-sm-8">
          <h1>Bienvenido al Sistema de Administración Web de la Parroquia Nuestra Señora de la Candelaria</h1>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-3">
          <img src="../images/patrona.png">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12" id="desarrollado-negro">
          <center>..:: Desarrollado por <a href="https://twitter.com/belkisrubio" target="_blank">Belkis Rubio</a> y <a href="https://twitter.com/josueruiz91" target="_blank">Josué Ruiz</a> bajo la dirección de la <a href="http://www.uvm.edu.ve" target="_blank">Universidad Valle del Momboy</a> ::..</center>
        </div>
        <div class="col-sm-12" id="bottom">
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
    header("Location: login.php");
  }
?>  