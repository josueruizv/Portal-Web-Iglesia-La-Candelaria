<?php
  require('../php/conexion.php');
  session_start();
if(isset($_SESSION['usuario_nombre'])) 
{
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();

    $codigo=$_GET['cod'];
    $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per=$codigo");
    if($reg=mysqli_fetch_array($registros))
    {
      $tiporeporte="";
      $fines="";
      

      if(isset($_POST['tiporeporte']))
      {
        $tiporeporte=$_POST['tiporeporte'];
      }
      if(isset($_POST['fines']))
      {
        $fines=$_POST['fines'];
      }
      
      require('../php/libreria.php');
      $bandera=validacionimpbau();
      if($bandera==2)
      {
        header("location: fe-bautismo.php?cod=".$codigo."&fines=".$fines);
      }
      if($bandera==3)
      {
        header("location: constancia-bautismo.php?cod=".$codigo);
      }
      if($bandera==4)
      {
        header("location: certificadobautizo.php?cod=".$codigo);
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
                <h3>Imprimir Bautizo</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-1"></div>
              <div id="formulario" class="col-sm-10">
                <form name="bautizo" class="form-horizontal" method="post" action="imprimir-bautizo.php?cod=<?php echo $codigo; ?>">
                  <div class="form-group">
                    <br>
                    <label class="col-sm-3 control-label" for="tiporeporte">Tipo de Reporte:</label>
                    <div class="col-sm-5">
                      <select class="form-control" name="tiporeporte" id="tiporeporte" onchange="tipoimprimir(this);">
                        <option value="0" <?php if($tiporeporte==0) echo 'selected'; ?>>Seleccione...</option>
                        <option value="1" <?php if($tiporeporte==1) echo 'selected'; ?>> Constancia de Bautismo</option>
                        <option value="2" <?php if($tiporeporte==2) echo 'selected'; ?>>Fe de Bautismo</option>
                        <option value="3" <?php if($tiporeporte==3) echo 'selected'; ?>>Certificado de Bautismo</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="form-group" style="<?php if($tiporeporte!=1) echo 'display: none'?>" id="ImpCons">
                    <br>
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">
                      <input type="submit" id="ConsImp" name="ConsImp" class="btn btn-primary btn-lg" value="Imprimir">
                    </div>
                  </div>
                  <div class="form-group" style="<?php if($tiporeporte!=2) echo 'display: none'?>" id="ImpFe">
                    <label class="col-sm-3 control-label" for="fines">Para fines:</label>
                    <div class="col-sm-2">
                      <input class="form-control" type="text" id="fines" name="fines" value="<?php echo $fines;?>">
                    </div>
                  </div>
                  <div class="form-group" style="<?php if($tiporeporte!=2) echo 'display: none'?>" id="ImprimirFe">
                    <br>
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">
                      <input type="submit" id="FeImp" name="FeImp" class="btn btn-primary btn-lg" value="Imprimir">
                    </div>
                  </div>
                  <div class="form-group" style="<?php if($tiporeporte!=3) echo 'display: none'?>" id="ImpCerti">
                    <br>
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">
                      <input type="submit" id="CertiImp" name="CertiImp" class="btn btn-primary btn-lg" value="Imprimir">
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
                  if($bandera==1)
                  {
                    echo '<h6 align="center" class="alerta"> Debe Ingresar "Fines" </h6>';
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
        header("location: consultar-bautizo.php");
    }
}
else 
{
  header("Location: login.php");
}
  ?>