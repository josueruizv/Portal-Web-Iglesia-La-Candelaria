<?php 
  session_start();
  include('../php/conexion.php');
  if(isset($_SESSION['usuario_nombre'])) 
  {
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();
    
    $ident = mysqli_real_escape_string($conexion,$_GET['id']);
    if($_SESSION['usuario_id']==$ident)
    {
      $perfil = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario_id='$ident'") or die(mysqli_error());
      if(mysqli_num_rows($perfil)>0) 
      { 
        $row = mysqli_fetch_array($perfil);
        $id = $row["usuario_id"];
        $nick = $row["usuario_nombre"];
        $nombapell = $row["usuario_nombapell"];
        $grado = $row["usuario_grado"];
        $freg = $row["usuario_freg"];
        $freg = date('d-m-Y', strtotime(str_replace('/', '-', $row["usuario_freg"])));
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
        margin: 10px auto;
        max-width: 400px;
        box-shadow: 0 2px 10px #d6d6d6;
        text-align: center;
        padding: 10px;
      }
      .caja img
      {
        max-width: 120px;
      }
      .caja h4
      {
        text-align: left;
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
      <div class="row">
        <div class="col-sm-12">
          <div class="caja jumbotron">
            <h3><b>Perfil</b></h3>
            <img src="../images/admin.png" alt="">
            <br>
            <h4><strong for="user">Usuario:</strong> <?php echo $nick; ?> </h4>
            <h4><strong for="user">Nombre y Apellido:</strong> <?php echo $nombapell; ?> </h4>
            <h4><strong for="user">Grado de Permiso:</strong> <?php if($grado==1){ echo 'Máximo'; } if($grado==2){ echo 'Medio'; } if($grado==3){ echo 'Limitado'; }?> </h4>
            <h4><strong for="user">Registrado el :</strong> <?php echo $freg; ?> </h4>
            <a href="cambiar_contrasena.php"><b>Cambiar Contraseña</b></a>
            <br><br>
            <a href="acceso.php" class="btn btn-danger btn-block">Salir</a>
          </div>
        </div>
      </div>
      <br>
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
        header("Location: acceso.php");
      }
    }
    else
    {
      header("Location: acceso.php");
    }
  }
  else 
  {
    header("Location: login.php");
  }
?>  