<?php
  include("../php/conexion.php");
session_start();
if(isset($_SESSION['usuario_nombre'])) 
{
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();
    
    include('../php/libreria.php');
    if(isset($_GET['cod']))
    {
      $cedulapadre="";
      $cedulamadre="";
      $nombrepadre="";
      $nombremadre="";
      $apellidopadre="";
      $apellidomadre="";
      $cedulapadrino="";
      $nombrepadrino="";
      $apellidopadrino="";
      $sexopadrino="";

      $registros=mysqli_query($conexion,"SELECT * FROM personas per,confirmacion conf WHERE per.codigo_per='$_GET[cod]' AND conf.codigo_per=per.codigo_per") or die(mysqli_error());
      $reg=mysqli_fetch_array($registros);
      $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$_GET[cod]'");
      if($regpadper=mysqli_fetch_array($registrospadper))
      {
        $registrospad=mysqli_query($conexion,"SELECT * FROM padre,madre WHERE cedula_pad='$regpadper[cedula_pad]' AND cedula_mad='$regpadper[cedula_mad]'");
        $regpad=mysqli_fetch_array($registrospad);

        $cedulapadre=$regpad['cedula_pad'];
        $cedulamadre=$regpad['cedula_mad'];
        $nombrepadre=$regpad['nombre_pad'];
        $nombremadre=$regpad['nombre_mad'];
        $apellidopadre=$regpad['apellido_pad'];
        $apellidomadre=$regpad['apellido_mad'];
      }
      $registrospdrconf=mysqli_query($conexion,"SELECT * FROM padrinosconfirmando WHERE codigo_per='$_GET[cod]'");
      $regpdrconf=mysqli_fetch_array($registrospdrconf);
   
      $registrospadrino=mysqli_query($conexion,"SELECT * FROM padrino WHERE cedula_pdr='$regpdrconf[cedula_pdr]'");
      if($regpadrino=mysqli_fetch_array($registrospadrino))
      {
        $cedulapadrino=$regpadrino['cedula_pdr'];
        $nombrepadrino=$regpadrino['nombre_pdr'];
        $apellidopadrino=$regpadrino['apellido_pdr'];
        $sexopadrino='M';
      }
      else
      {
        $registrosmadrina=mysqli_query($conexion,"SELECT * FROM madrina WHERE cedula_mdr='$regpdrconf[cedula_pdr]'");
        if($regmadrina=mysqli_fetch_array($registrosmadrina))
        {
          $cedulapadrino=$regmadrina['cedula_mdr'];
          $nombrepadrino=$regmadrina['nombre_mdr'];
          $apellidopadrino=$regmadrina['apellido_mdr'];
          $sexopadrino='F';
        }
      }
    
      $cedula=$reg['cedula_per'];
      $nombre=$reg['nombre_per'];
      $apellido=$reg['apellido_per'];
      $sex=$reg['sexo_per'];
      $fechanac=$reg['fechanac_per'];
      
      $fechaconf=$reg['fecha_conf'];

      if((isset($_POST['cedula'])) and (trim($_POST['cedula'])!="")) 
      {
        $cedula=trim($_POST['cedula']);
      }
      if((isset($_POST['nombre'])) and (trim($_POST['nombre'])!="")) 
      {
        $nombre=trim($_POST['nombre']);
      }
      if((isset($_POST['apellido'])) and (trim($_POST['apellido'])!="")) 
      {
        $apellido=trim($_POST['apellido']);
      }
      if(isset($_POST['sexo']))
      {
        $sex=$_POST['sexo'];
      }
      if((isset($_POST['fechanac'])) and (trim($_POST['fechanac'])!="")) 
      {
        $fechanac=trim($_POST['fechanac']);
      }
      if((isset($_POST['cedulapadre'])) and (trim($_POST['cedulapadre'])!="")) 
      {
        $cedulapadre=trim($_POST['cedulapadre']);
      }
      if((isset($_POST['nombrepadre'])) and (trim($_POST['nombrepadre'])!="")) 
      {
        $nombrepadre=trim($_POST['nombrepadre']);
      }
      if((isset($_POST['apellidopadre'])) and (trim($_POST['apellidopadre'])!="")) 
      {
        $apellidopadre=trim($_POST['apellidopadre']);
      }
      if((isset($_POST['cedulamadre'])) and (trim($_POST['cedulamadre'])!="")) 
      {
        $cedulamadre=trim($_POST['cedulamadre']);
      }
      if((isset($_POST['nombremadre'])) and (trim($_POST['nombremadre'])!="")) 
      {
        $nombremadre=trim($_POST['nombremadre']);
      }
      if((isset($_POST['apellidomadre'])) and (trim($_POST['apellidomadre'])!="")) 
      {
        $apellidomadre=trim($_POST['apellidomadre']);
      }
      if((isset($_POST['cedulapadrino'])) and (trim($_POST['cedulapadrino'])!="")) 
      {
        $cedulapadrino=trim($_POST['cedulapadrino']);
      }
      if((isset($_POST['nombrepadrino'])) and (trim($_POST['nombrepadrino'])!="")) 
      {
        $nombrepadrino=trim($_POST['nombrepadrino']);
      }
      if((isset($_POST['apellidopadrino'])) and (trim($_POST['apellidopadrino'])!="")) 
      {
        $apellidopadrino=trim($_POST['apellidopadrino']);
      }
      if((isset($_POST['sexopadrino'])) and (trim($_POST['sexopadrino'])!="")) 
      {
        $sexopadrino=trim($_POST['sexopadrino']);
      }
      if((isset($_POST['fechaconfirmacion'])) and (trim($_POST['fechaconfirmacion'])!="")) 
      {
        $fechaconf=trim($_POST['fechaconfirmacion']);
      }


      if(isset($_POST['ced']))
      {
        $cedula=$_POST['ced'];
      }
      if(isset($_POST['nom']))
      {
        $nombre=$_POST['nom'];
      }
      if(isset($_POST['ape']))
      {
        $apellido=$_POST['ape'];
      }
      if(isset($_POST['sex']))
      {
        $sex=$_POST['sex'];
      }
      if(isset($_POST['fn']))
      {
        $fechanac=$_POST['fn'];
      }
      if(isset($_POST['cedpad']))
      {
        $cedulapadre=$_POST['cedpad'];
      }
      if(isset($_POST['cedmad']))
      {
        $cedulamadre=$_POST['cedmad'];
      }
      if(isset($_POST['nompad']))
      {
        $nombrepadre=$_POST['nompad'];
      }
      if(isset($_POST['nommad']))
      {
        $nombremadre=$_POST['nommad'];
      }
      if(isset($_POST['apepad']))
      {
        $apellidopadre=$_POST['apepad'];
      }
      if(isset($_POST['apemad']))
      {
        $apellidomadre=$_POST['apemad'];
      }
      if(isset($_POST['cedpadri']))
      {
        $cedulapadrino=$_POST['cedpadri'];
      }
      if(isset($_POST['nompadri']))
      {
        $nombrepadrino=$_POST['nompadri'];
      }
      if(isset($_POST['apepadri']))
      {
        $apellidopadrino=$_POST['apepadri'];
      }
      if(isset($_POST['sexpadri']))
      {
        $sexopadrino=$_POST['sexpadri'];
      }
      if(isset($_POST['fc']))
      {
        $fechaconf=$_POST['fc'];
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

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.7.2.custom.css" />
        <!-- Estilo Personalizado -->
        <link rel="stylesheet" type="text/css" href="../css/personalizacion.css">
        <script type="text/javascript">
        function llenado(cp,c,no,ap,sex,fna,cema,nomad,apmad,fecconf,cepadri,nopadri,appadri,sexopadri,code) 
        {
          document.location.href="../php/identificarpadre.php?cedulapadre="+cp+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&sexo="+sex+"&fechanac="+fna+"&cedulamadre="+cema+"&nombremadre="+nomad+"&apellidomadre="+apmad+"&fechac="+fecconf+"&cedpadrino="+cepadri+"&nombpadrino="+nopadri+"&apepadrino="+appadri+"&sexpadrino="+sexopadri+"&cod="+code+"&opc="+13;
        }
        function relleno(cm,c,no,ap,sex,fna,cepa,nopad,appad,fecconf,cepadri,nopadri,appadri,sexopadri,code) 
        {
          document.location.href="../php/identificarmadre.php?cedulamadre="+cm+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&sexo="+sex+"&fechanac="+fna+"&cedulapadre="+cepa+"&nombrepadre="+nopad+"&apellidopadre="+appad+"&fechac="+fecconf+"&cedpadrino="+cepadri+"&nombpadrino="+nopadri+"&apepadrino="+appadri+"&sexpadrino="+sexopadri+"&cod="+code+"&opc="+13;
        }
        function autollenado(cpadri,c,no,ap,sex,fna,cepa,nopad,appad,cema,nomad,apmad,fecconf,code) 
        {
          document.location.href="../php/identificarpadrino.php?cedpadrino="+cpadri+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&sexo="+sex+"&fechanac="+fna+"&cedulapadre="+cepa+"&nombrepadre="+nopad+"&apellidopadre="+appad+"&cedulamadre="+cema+"&nombremadre="+nomad+"&apellidomadre="+apmad+"&fechac="+fecconf+"&cod="+code+"&opc="+13;
        }
        </script>
      </head>
      <body>
        <div id="contenedor-prin" class="container">
          <div class="row">
            <div id="cabecera" class="col-sm-13">
              <img class="img-responsive" src="../images/cabecera.png">
              <h3>Modificación de Confirmación</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-1"></div>
            <div id="formulario" class="col-sm-10">
              <form name="confirmacion" class="form-horizontal" method="post" action="editar-confirmacion.php?cod=<?php echo $_GET['cod'];?>#msj">
                <div class="form-group">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10 titulo">
                    <h4>Datos Personales</h4>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="codigo">Código:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="codigo" value="<?php echo $_GET['cod']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="cedula">Cédula:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="cedula" value="<?php echo $cedula; ?>">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="nombre">* Nombres:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>">
                  </div>
                  <label class="col-sm-3 control-label" for="apellido">* Apellidos:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellido" value="<?php echo $apellido; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="sexo">* Sexo:</label>
                  <div class="col-sm-2 radio">
                    <input  type="radio" name="sexo" value="" id="sex" <?php if($sex=="") echo 'checked' ?> style="display: none">
                    <input  type="radio" name="sexo" value="M" id="sex1" <?php if($sex=="M") echo 'checked' ?>>Masculino<br>
                    <input  type="radio" name="sexo" value="F" id="sex2" <?php if($sex=="F") echo 'checked' ?>>Femenino
                  </div>
                  <label class="col-sm-4 control-label" for="fechanac">* Fecha de Nacimiento:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="date" name="fechanac" id="fechanac" value="<?php echo $fechanac ?>">
                    <p class="help-block">DD/MM/AAAA</p>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10 titulo">
                    <h4 id="padres">Datos de los Padres</h4>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">* Cédula del Padre:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="cedulapadre" value="<?php echo $cedulapadre ?>" onblur="llenado(this.value,cedula.value,nombre.value,apellido.value,sexo.value,fechanac.value,cedulamadre.value,nombremadre.value,apellidomadre.value,fechaconfirmacion.value,cedulapadrino.value,nombrepadrino.value,apellidopadrino.value,sexopadrino.value,codigo.value)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="nombrepadre">* Nombres del Padre:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" id="nombrepadre" name="nombrepadre" value="<?php echo $nombrepadre ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="apellidopadre">* Apellidos del Padre:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellidopadre" value="<?php echo $apellidopadre ?>">
                  </div>
                </div>
                <div class="form-group">
                  <hr>
                  <label class="col-sm-3 control-label">* Cédula de la Madre:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="cedulamadre" value="<?php echo $cedulamadre ?>" onblur="relleno(this.value,cedula.value,nombre.value,apellido.value,sexo.value,fechanac.value,cedulapadre.value,nombrepadre.value,apellidopadre.value,fechaconfirmacion.value,cedulapadrino.value,nombrepadrino.value,apellidopadrino.value,sexopadrino.value,codigo.value)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">* Nombres de la Madre:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="nombremadre" value="<?php echo $nombremadre ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">* Apellidos de la Madre:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellidomadre" value="<?php echo $apellidomadre ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-1"></div>
                    <div class="col-sm-10 titulo">
                      <h4 id="padrinos">Datos del Padrino o de la Madrina</h4>
                    </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <label for="cedulapadrino" class="col-sm-3 control-label">* Cédula:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" id="cedulapadrino" name="cedulapadrino" value="<?php echo($cedulapadrino);?>" onblur="autollenado(this.value,cedula.value,nombre.value,apellido.value,sexo.value,fechanac.value,cedulapadre.value,nombrepadre.value,apellidopadre.value,cedulamadre.value,nombremadre.value,apellidomadre.value,fechaconfirmacion.value,codigo.value)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="nombrepadrino">* Nombres:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="nombrepadrino" id="nombrepadrino" value="<?php echo($nombrepadrino);?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="apellidopadrino">* Apellidos:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellidopadrino" id="apellidopadrino" value="<?php echo($apellidopadrino);?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="sexopadrino" class="col-sm-2 control-label">* Sexo:</label>
                  <div class="col-sm-2 radio">
                    <input  type="radio" name="sexopadrino" value="" id="sexpdr" <?php if($sexopadrino=="") echo 'checked'; ?> style="display: none">
                    <input  type="radio" name="sexopadrino" value="M" id="sex1pdr" <?php if($sexopadrino=="M") echo 'checked'; ?>>Masculino<br>
                    <input  type="radio" name="sexopadrino" value="F" id="sex2pdr" <?php if($sexopadrino=="F") echo 'checked'; ?> >Femenino
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10 titulo">
                    <h4>Confirmación</h4>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <br><br>
                  <label class="col-sm-2 control-label" for="fechaconfirmacion">* Fecha:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="date" name="fechaconfirmacion" id="fechaconfirmacion" value="<?php echo $fechaconf ?>">
                    <p class="help-block">DD/MM/AAAA</p>
                  </div>
                </div>
                <div class="form-group">
                  <br>
                  <div class="col-sm-10"></div>
                  <div class="col-sm-2">
                    <input type="submit" name="editconf" class="btn btn-primary btn-lg" value="Guardar Cambios">
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
                $confirmacion=validaredicionconf();
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
    header("location: consultar-confirmacion.php");
  }
}
else 
{
  header("Location: login.php");
}
?>