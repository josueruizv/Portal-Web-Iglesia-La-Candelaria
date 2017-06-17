<?php
  include("../php/conexion.php");
session_start();
if(isset($_SESSION['usuario_nombre'])) 
{
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();

    include("../php/libreria.php");
    $bandera=validarco(1);
    if($bandera==4)
    {
      $comunion=enviarco(1);
    }
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

      <!-- Estilo Personalizado -->
      <link rel="stylesheet" type="text/css" href="../css/personalizacion.css">
    </head>
      <body>
        <div id="contenedor-prin" class="container">
          <div class="row">
            <div id="cabecera" class="col-sm-13">
              <img class="img-responsive" src="../images/cabecera.png">
              <h3>Registro de Primera Comunión</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10" id="formulario">
              <form name="Info_Persona" class="form-horizontal" method="post" action="registrocomunion.php">
                <div class="form-group">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10 titulo">
                    <h4>Datos de la Primera Comunión</h4>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <label for="fechaco" class="col-sm-2 control-label">Fecha: </label>
                  <div class="col-sm-3">
                    <input class="form-control" id="fechaco" type="date" name="fechaco">
                  </div>
                </div>
                <div class="form-group">
                  <label for="ministro" class="col-sm-2 control-label">Ministro: </label>
                  <div class="col-sm-3">
                    <select class="form-control" name="ministro" id="ministro" onchange="oculta(this);">
                      <option value="0" selected>Seleccione...</option>
                      <?php
                        $registros=mysqli_query($conexion,"SELECT * FROM ministro ORDER BY codigo_min");
                        while($reg=mysqli_fetch_array($registros))
                        {
                      ?>
                        <option value="<?php echo $reg['codigo_min']; ?>"><?php echo $reg['ministro_min']; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                    <input class="form-control" id="otroministro" type="text" name="otroministro" value="Otro..." onclick="borracampo();" onblur="restauracampo();">
                  </div>
                </div>
                <div class="form-group">
                  <br>
                  <div class="col-sm-10"></div>
                  <div class="col-sm-2">
                    <input type="submit" name="fecha" class="btn btn-primary btn-lg" value="Registrar Nuevo">
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
          </div>
          <div class="row">
            <div class="col-sm-12">
              <?php
                if($bandera==1)
                {
                  echo '<h6 align="center" class="alerta"> Debe Ingresar Fecha </h6>';
                }
                if($bandera==2)
                {
                  echo '<h6 align="center" class="alerta"> Debe Seleccionar Ministro o Ingresar uno</h6>';
                }
                if($bandera==3)
                {
                  echo '<h6 align="center" class="alerta"> Debe Ingresar Fecha </h6>';
                  echo '<h6 align="center" class="alerta"> Debe Seleccionar Ministro o Ingresar uno</h6>';
                }
              ?>
            </div>
          </div>
        </div>
        <!-- Mostrar Objetos Ocultos -->
        <script src="../js/mostrar.js"></script>
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