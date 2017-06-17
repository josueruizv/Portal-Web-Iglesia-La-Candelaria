<?php
session_start();
  include('../php/conexion.php');
  if(isset($_SESSION['usuario_nombre'])) 
  {
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();
    
    $tipobusqueda="";
    $cedula="";
    $nom="";
    $ap="";
    $aniocom="";
    

    if(isset($_POST['tipobusqueda']))
    {
      $tipobusqueda=$_POST['tipobusqueda'];
    }
    if(isset($_POST['cedula']))
    {
      $cedula=$_POST['cedula'];
    }
    if(isset($_POST['nom']))
    {
      $nom=$_POST['nom'];
    }
    if(isset($_POST['ap']))
    {
      $ap=$_POST['ap'];
    }
    if(isset($_POST['aniocom']))
    {
      $aniocom=$_POST['aniocom'];
    }
  ?>
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
            <h3>Consulta de Comunión</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <div id="formulario" class="col-sm-10">
            <form name="comunion" class="form-horizontal" method="post" action="consultar-comunion.php">
              <div class="form-group">
                <br>
                <label class="col-sm-3 control-label" for="tipobusqueda">Tipo de Búsqueda:</label>
                <div class="col-sm-5">
                  <select class="form-control" name="tipobusqueda" id="tipobusqueda" onchange="tipoconsultacom(this);">
                    <option value="0" <?php if($tipobusqueda==0) echo 'selected'; ?>>Seleccione...</option>
                    <option value="1" <?php if($tipobusqueda==1) echo 'selected'; ?>>Por Cédula</option>
                    <option value="2" <?php if($tipobusqueda==2) echo 'selected'; ?>>Por Nombre y Apellido</option>
                    <option value="3" <?php if($tipobusqueda==3) echo 'selected'; ?>>Por Año de la Primera Comunión</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="form-group" style="<?php if($tipobusqueda!=1) echo 'display: none'?>;>" id="ConCed">
                <label class="col-sm-2 control-label" for="cedula">Cédula:</label>
                <div class="col-sm-2">
                  <input class="form-control" type="text" id="cedula" name="cedula" value="<?php echo $cedula;?>">
                </div>
                <div class="col-sm-2">
                  <input class="btn btn-primary" id="ComCed" type="submit" name="ComCed" value="Buscar">
                </div>
              </div>
              <span style="<?php if($tipobusqueda!=2) echo 'display: none'?>;>" id="ConNom">
                <div class="form-group">
                  <label for="nom" class="col-sm-2 control-label">Nombres:</label>
                  <div class="col-sm-3">
                    <input class="form-control" id="nom" type="text" name="nom" value="<?php echo $nom;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="ap" class="col-sm-2 control-label">Apellidos:</label>
                  <div class="col-sm-3">
                    <input class="form-control" id="ap" type="text" name="ap" value="<?php echo $ap;?>">
                  </div>
                  <div class="col-sm-3">
                    <input class="btn btn-primary" id="ComNom" type="submit" name="ComNom" value="Buscar">
                  </div>
                </div>
              </span>
              <div class="form-group" style="<?php if($tipobusqueda!=3) echo 'display: none'?>;>" id="ConAnio">
                <label class="col-sm-4 control-label" for="aniocom">Año de la Primera Comunión:</label>
                <div class="col-sm-2">
                  <input class="form-control" type="text" id="aniocom" name="aniocom" value="<?php echo $aniocom;?>">
                </div>
                <div class="col-sm-2">
                  <input class="btn btn-primary" id="ComAnio" type="submit" name="ComAnio" value="Buscar">
                </div>
              </div>
            </form>
            <?php
              include("../php/libreria.php");
            ?>
            <div id="tablacedula">
              <?php
              if(isset($_POST['ComCed']))
              {
                $validarCed=validarComCed();
              }
              ?>
            </div>
            <div id="tablanombre">
              <?php
              if(isset($_POST['ComNom']))
              {
                $validarNom=validarComNom();
              }
              ?>
            </div>
            <div id="tablaanio">
              <?php
              if(isset($_POST['ComAnio']))
              {
                $validarAnio=validarComAnio();
              }
              ?>
            </div>
          </div>
          <div class="row">
            <br>
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
              <a href="acceso.php"><input type="button" class="btn btn-danger btn-lg" value="Salir"></a>
            </div>
          </div>
          <br><br>
          <div class="col-sm-1"></div>
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