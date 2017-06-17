<?php 
  session_start();
  include('../php/conexion.php');
  if(isset($_SESSION['usuario_nombre'])) 
  {
   include('../php/inactividad.php');
   $tiempoinactividad=calcularInactividad();
   include('../php/conexion.php');

   if(isset($_GET['fec']) and isset($_GET['min']))
    {
      $fechac=$_GET['fec'];
      $min=$_GET['min'];

      $lugarb="";
      $otrol=""; 

      $cedula="";
      $nombre="";
      $apellido="";
      $sex="";
      $fechanac="";
      $cedulapadre="";
      $cedulamadre="";
      $nombrepadre="";
      $nombremadre="";
      $apellidopadre="";
      $apellidomadre="";
      $filiacion="";
      $cedulapadrino="";
      $nombrepadrino="";
      $apellidopadrino="";
      $sexopadrino="";

      $tipobusqueda="";
      $nuevacedula="";
      $nuevocodigo="";
      $nuevonombre="";
      $nuevoapellido="";
      $nuevafechanac="";
      $nuevopadre="";
      $nuevamadre="";
      $nuevafiliacion="";

      $nom="";
      $apel="";
      $fechnac="";
      $codigonuevo="";
      $cedulanueva="";
      $nombrenuevo="";
      $apellidonuevo="";
      $fechanacnueva="";
      $padrenuevo="";
      $madrenueva="";
      $filiacionnueva="";

      if(isset($_POST['cedula']))
      {
        $cedula=$_POST['cedula'];
      }
      if(isset($_POST['nombre']))
      {
        $nombre=$_POST['nombre'];
      }
      if(isset($_POST['apellido']))
      {
        $apellido=$_POST['apellido'];
      }
      if(isset($_POST['sexo']))
      {
        $sex=$_POST['sexo'];
      }
      if(isset($_POST['fechanac']))
      {
        $fechanac=$_POST['fechanac'];
      }
      if(isset($_POST['cedulapadre']))
      {
        $cedulapadre=$_POST['cedulapadre'];
      }
      if(isset($_POST['cedulamadre']))
      {
        $cedulamadre=$_POST['cedulamadre'];
      }
      if(isset($_POST['nombrepadre']))
      {
        $nombrepadre=$_POST['nombrepadre'];
      }
      if(isset($_POST['nombremadre']))
      {
        $nombremadre=$_POST['nombremadre'];
      }
      if(isset($_POST['apellidopadre']))
      {
        $apellidopadre=$_POST['apellidopadre'];
      }
      if(isset($_POST['apellidomadre']))
      {
        $apellidomadre=$_POST['apellidomadre'];
      }
      if(isset($_POST['filiacion']))
      {
        $filiacion=$_POST['filiacion'];
      }
      if(isset($_POST['cedulapadrino']))
      {
        $cedulapadrino=$_POST['cedulapadrino'];
      }
      if(isset($_POST['nombrepadrino']))
      {
        $nombrepadrino=$_POST['nombrepadrino'];
      }
      if(isset($_POST['apellidopadrino']))
      {
        $apellidopadrino=$_POST['apellidopadrino'];
      }
      if(isset($_POST['apellidopadrino']))
      {
        $apellidopadrino=$_POST['apellidopadrino'];
      }
      if(isset($_POST['sexopadrino']))
      {
        $sexopadrino=$_POST['sexopadrino'];
      }






      if(isset($_POST['tipobusqueda']))
      {
        $tipobusqueda=$_POST['tipobusqueda'];
      }
      if(isset($_POST['cedul']))
      {
        $nuevacedula=$_POST['cedul'];
      }
      if(isset($_POST['nuevo_codigo']))
      {
        $nuevocodigo=$_POST['nuevo_codigo'];
      }
      if(isset($_POST['nuevo_nombre']))
      {
        $nuevonombre=$_POST['nuevo_nombre'];
      }
      if(isset($_POST['nuevo_apellido']))
      {
        $nuevoapellido=$_POST['nuevo_apellido'];
      }
      if(isset($_POST['nueva_fechanac']))
      {
        $nuevafechanac=$_POST['nueva_fechanac'];
      }
      if(isset($_POST['nuevo_padre']))
      {
        $nuevopadre=$_POST['nuevo_padre'];
      }
      if(isset($_POST['nueva_madre']))
      {
        $nuevamadre=$_POST['nueva_madre'];
      }
       if(isset($_POST['nueva_filiacion']))
      {
        $nuevafiliacion=$_POST['nueva_filiacion'];
      }






      if(isset($_POST['nombr']))
      {
        $nom=$_POST['nombr'];
      }
      if(isset($_POST['apelli']))
      {
        $apel=$_POST['apelli'];
      }
      if(isset($_POST['fenac']))
      {
        $fechnac=$_POST['fenac'];
      }
      if(isset($_POST['cod']))
      {
        $codigonuevo=$_POST['cod'];
      }
      if(isset($_POST['nueva_ced']))
      {
        $cedulanueva=$_POST['nueva_ced'];
      }
      if(isset($_POST['nombre_nuevo']))
      {
        $nombrenuevo=$_POST['nombre_nuevo'];
      }
      if(isset($_POST['apellido_nuevo']))
      {
        $apellidonuevo=$_POST['apellido_nuevo'];
      }
      if(isset($_POST['fechanac_nueva']))
      {
        $fechanacnueva=$_POST['fechanac_nueva'];
      }
      if(isset($_POST['padre_nuevo']))
      {
        $padrenuevo=$_POST['padre_nuevo'];
      }
      if(isset($_POST['madre_nueva']))
      {
        $madrenueva=$_POST['madre_nueva'];
      }
       if(isset($_POST['filiacion_nueva']))
      {
        $filiacionnueva=$_POST['filiacion_nueva'];
      }




      if(isset($_POST['lugarbau']))
      {
        $lugarb=$_POST['lugarbau'];
      }
      if(isset($_POST['otrolugarbau']))
      {
        $otrol=$_POST['otrolugarbau'];
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
      if(isset($_POST['fili']))
      {
        $filiacion=$_POST['fili'];
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


      if(isset($_POST['tipbusq']))
      {
        $tipobusqueda=$_POST['tipbusq'];
      }
      if(isset($_POST['cedu']))
      {
        $nuevacedula=$_POST['cedu'];
      }
      if(isset($_POST['codi']))
      {
        $nuevocodigo=$_POST['codi'];
      }
      if(isset($_POST['nomb']))
      {
        $nuevonombre=$_POST['nomb'];
      }
      if(isset($_POST['apell']))
      {
        $nuevoapellido=$_POST['apell'];
      }
      if(isset($_POST['fechanacimiento']))
      {
        $nuevafechanac=$_POST['fechanacimiento'];
      }
      if(isset($_POST['pad']))
      {
        $nuevopadre=$_POST['pad'];
      }
      if(isset($_POST['mad']))
      {
        $nuevamadre=$_POST['mad'];
      }
       if(isset($_POST['fil']))
      {
        $nuevafiliacion=$_POST['fil'];
      }


      if(isset($_POST['no']))
      {
        $nom=$_POST['no'];
      }
      if(isset($_POST['apelli']))
      {
        $ape=$_POST['apelli'];
      }
      if(isset($_POST['fecnaci']))
      {
        $fn=$_POST['fecnaci'];
      }
      if(isset($_POST['codig']))
      {
        $codigonuevo=$_POST['codig'];
      }
      if(isset($_POST['newced']))
      {
        $cedulanueva=$_POST['newced'];
      }
      if(isset($_POST['nomnew']))
      {
        $nombrenuevo=$_POST['nomnew'];
      }
      if(isset($_POST['apenew']))
      {
        $apellidonuevo=$_POST['apenew'];
      }
      if(isset($_POST['fnnew']))
      {
        $fechanacnueva=$_POST['fnnew'];
      }
      if(isset($_POST['padnew']))
      {
        $padrenuevo=$_POST['padnew'];
      }
      if(isset($_POST['madnew']))
      {
        $madrenueva=$_POST['madnew'];
      }
      if(isset($_POST['filinew']))
      {
        $filiacionnueva=$_POST['filinew'];
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
        <script type="text/javascript">
        function rellenar(c,f,m,l,o) 
        {
          document.location.href="../php/identificarpersona.php?cedula="+c+"&fecha="+f+"&minist="+m+"&lugbau="+l+"&otrolug="+o+"&opc="+3;
        }
        function llenado(cp,fco,min,l,o,c,no,ap,sex,fna,cema,nomad,apmad) 
        {
          document.location.href="../php/identificarpadre.php?cedulapadre="+cp+"&fecha="+fco+"&minist="+min+"&lugbau="+l+"&otrolug="+o+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&sexo="+sex+"&fechanac="+fna+"&cedulamadre="+cema+"&nombremadre="+nomad+"&apellidomadre="+apmad+"&opc="+3;
        }
        function relleno(cm,fco,min,l,o,c,no,ap,sex,fna,cepa,nopad,appad,cedpadri,nompadri,apepadri,sexpadri) 
        {
          document.location.href="../php/identificarmadre.php?cedulamadre="+cm+"&fecha="+fco+"&minist="+min+"&lugbau="+l+"&otrolug="+o+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&sexo="+sex+"&fechanac="+fna+"&cedulapadre="+cepa+"&nombrepadre="+nopad+"&apellidopadre="+appad+"&opc="+3;
        }
         function autollenado(cpadri,fco,min,l,o,c,no,ap,sex,fna,cepa,nopad,appad,cema,nomad,apmad,fili,tb,ced,nuecod,nuen,nuea,nuef,nuepad,nuemad,nuefil,nom,ape,fn,cod,nuec,nnue,anue,fnue,padnue,madnue,filnue) 
        {
          document.location.href="../php/identificarpadrino.php?cedpadrino="+cpadri+"&fecha="+fco+"&minist="+min+"&lugbau="+l+"&otrolug="+o+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&sexo="+sex+"&fechanac="+fna+"&cedulapadre="+cepa+"&nombrepadre="+nopad+"&apellidopadre="+appad+"&cedulamadre="+cema+"&nombremadre="+nomad+"&apellidomadre="+apmad+"&filiacion="+fili+"&tipobusqueda="+tb+"&ced="+ced+"&nuevocodigo="+nuecod+"&nuevonombre="+nuen+"&nuevoapellido="+nuea+"&nuevafechanac="+nuef+"&nuevopadre="+nuepad+"&nuevamadre="+nuemad+"&nuevafiliacion="+nuefil+"&nom="+nom+"&ape="+ape+"&fn="+fn+"&cod="+cod+"&nuevaced="+nuec+"&nombrenuevo="+nnue+"&apellidonuevo="+anue+"&fechanacnueva="+fnue+"&padrenuevo="+padnue+"&madrenueva="+madnue+"&filiacionnueva="+filnue+"&opc="+3;
        }
        function buscarced(ce,fco,min,l,tb) 
        {
          document.location.href="../php/identificarpersona.php?cedula="+ce+"&fecha="+fco+"&minist="+min+"&lugbau="+l+"&tipobusq="+tb+"&opc="+9;
        }
        </script>
      </head>
      <body>
        <div id="contenedor-prin" class="container">
          <div class="row">
            <div id="cabecera" class="col-sm-13">
              <img class="img-responsive" src="../images/cabecera.png">
              <h3>Registro de Confirmación</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10" id="formulario">
              <form name="Info_Persona" class="form-horizontal" method="post" action="confirmacion.php?fec=<?php echo $fechac.'&min='.$min;?>#msj">
                <br>
                <br>
                <div class="form-group">
                  <label for="fconfirmacion" class="col-sm-2 control-label">Fecha: </label>
                  <div class="col-sm-3">
                    <input class="form-control" id="fconfirmacion" type="date" name="fconfirmacion" value="<?php echo $fechac ?>" readonly>
                    <input id="codmin" type="hidden" name="codmin" value="<?php echo $min ?>" readonly>
                  </div>
                  <label for="minis" class="col-sm-3 control-label">Ministro: </label>
                  <?php
                    $registrosmin=mysqli_query($conexion,"SELECT ministro_min FROM ministro WHERE codigo_min=$min");
                    if($regmin=mysqli_fetch_array($registrosmin));
                    {
                  ?>
                  <div class="col-sm-3">
                    <input class="form-control" id="minis" type="text" name="minis" value="<?php echo $regmin['ministro_min'] ?>" readonly>
                  </div>
                  <?php
                    }
                  ?>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="form-group">
                  <label for="lugarbau" class="col-sm-3 control-label">* Lugar de Bautizo:</label>
                  <div class="col-sm-4 radio">
                    <input  type="radio" name="lugarbau" value="LB" id="lugarbau" onclick="aparecer(this,3);" <?php if($lugarb=='LB') echo 'checked'; ?> required>La Beatriz<br>
                    <input  type="radio" name="lugarbau" value="O" id="lugarbau" onclick="aparecer(this,3);" <?php if($lugarb=='O') echo 'checked'; ?> required>Otro
                  </div>

                  <span id="otrolugar" style="<?php if($lugarb=='O') echo 'display: block'; else  echo 'display: none'?>">
                    <div class="col-sm-1">
                      <h5 class="help-block">Especifíque:</h5>
                    </div>
                    <div class="col-sm-3">
                      <input class="form-control" id="otrolugarbau" type="text" name="otrolugarbau" value="<?php echo $otrol ?>">
                    </div>
                  </span>
                </div>
                <br>
                <div class="form-group">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8 text-help">Si el Lugar de Bautizo es La Beatriz, obligatoriamente los datos personales ya están registrados en la base de datos, por lo tanto no será necesaro ingresarlos de nuevo</div>
                </div>

                <span id="DatosPersonales" style="<?php if($lugarb=='O') echo 'display: block'; else  echo 'display: none'?>">
                  <div class="form-group">
                    <div class="col-sm-1"></div>
                      <div class="col-sm-10 titulo">
                        <h4 id="persona">Datos Personales</h4>
                      </div>
                    <div class="col-sm-1"></div>
                  </div>
                  <div class="form-group">
                    <label for="cedula" class="col-sm-2 control-label">* Cédula:</label>
                    <div class="col-sm-2">
                      <input class="form-control" type="text" id="cedula" name="cedula" value="<?php echo($cedula);?>" onblur="rellenar(this.value,fconfirmacion.value,codmin.value,lugarbau.value,otrolugarbau.value)">
                    </div>
                    <div class="col-sm-2">
                      <div id="mensaje"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="nombre">* Nombres:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo($nombre);?>">
                    </div>
                    <label class="col-sm-2 control-label" for="apellido">* Apellidos:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="apellido" id="apellido" value="<?php echo($apellido);?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="sexo" class="col-sm-2 control-label">Sexo:</label>
                    <div class="col-sm-2 radio">
                      <input  type="radio" name="sexo" value="" id="sex" <?php if($sex=="") echo 'checked'; ?> style="display: none">
                      <input  type="radio" name="sexo" value="M" id="sex1" <?php if($sex=="M") echo 'checked'; ?>>Masculino<br>
                      <input  type="radio" name="sexo" value="F" id="sex2" <?php if($sex=="F") echo 'checked'; ?> >Femenino
                    </div>
                    <label class="col-sm-3 control-label" for="fechanac">Fecha de Nacimiento:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="date" name="fechanac" id="fechanac" value="<?php echo($fechanac);?>">
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
                    <label for="cedulapadre" class="col-sm-3 control-label">* Cédula del Padre:</label>
                    <div class="col-sm-2">
                      <input class="form-control" type="text" id="cedulapadre" name="cedulapadre" value="<?php echo($cedulapadre);?>" onblur="llenado(this.value,fconfirmacion.value,codmin.value,lugarbau.value,otrolugarbau.value,cedula.value,nombre.value,apellido.value,sexo.value,fechanac.value,cedulamadre.value,nombremadre.value,apellidomadre.value)">
                    </div>
                    <label for="cedulamadre" class="col-sm-4 control-label">* Cédula de la Madre:</label>
                    <div class="col-sm-2">
                      <input class="form-control" type="text" id="cedulamadre" name="cedulamadre" value="<?php echo($cedulamadre);?>" onblur="relleno(this.value,fconfirmacion.value,codmin.value,lugarbau.value,otrolugarbau.value,cedula.value,nombre.value,apellido.value,sexo.value,fechanac.value,cedulapadre.value,nombrepadre.value,apellidopadre.value)">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="nombrepadre">* Nombres del Padre:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="nombrepadre" id="nombrepadre" value="<?php echo($nombrepadre);?>">
                    </div>
                    <label class="col-sm-3 control-label" for="nombremadre">* Nombres de la Madre:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="nombremadre" id="nombremadre" value="<?php echo($nombremadre);?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="apellidopadre">* Apellidos del Padre:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="apellidopadre" id="apellidopadre" value="<?php echo($apellidopadre);?>">
                    </div>
                    <label class="col-sm-3 control-label" for="apellidomadre">* Apellidos de la Madre:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="apellidomadre" id="apellidomadre" value="<?php echo($apellidomadre);?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-9 control-label" for="filiacion">* Filiación:</label>
                    <div class="col-sm-2">
                      <input class="form-control" type="text" name="filiacion" id="filiacion" value="<?php echo($filiacion);?>">
                    </div>
                  </div>
                </span>
                
                <span id="BuscarPersona" style="<?php if($lugarb=='LB') echo 'display: block'; else  echo 'display: none'?>">
                  <div class="form-group">
                    <div class="col-sm-1"></div>
                      <div class="col-sm-10 titulo">
                        <h4>Buscar Persona</h4>
                      </div>
                    <div class="col-sm-1"></div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="tipobusqueda">* Tipo de Búsqueda:</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="tipobusqueda" id="tipobusqueda" onchange="tipo_busqueda(this,3);">
                        <option value="0" <?php if($tipobusqueda=='') echo 'selected'; ?>>Seleccione...</option>
                        <option value="1" <?php if($tipobusqueda=='1') echo 'selected'; ?>>Por Cédula</option>
                        <option value="2" <?php if($tipobusqueda=='2') echo 'selected'; ?>>Por Nombre, Apellido y Fecha de Nacimiento</option>
                      </select>
                    </div>
                  </div>
                  <br>

                  <span id="busquedaporced" style="<?php if($tipobusqueda==1) echo 'display: block'; else  echo 'display: none'?>">
                    <div class="form-group">
                      <label for="cedul" class="col-sm-2 control-label">* Cédula:</label>
                      <div class="col-sm-2">
                        <input class="form-control" id="cedul" type="text" name="cedul" value="<?php echo($nuevacedula);?>">
                      </div>
                      <div class="col-sm-2">
                        <input class="btn btn-primary" id="buscarporced" type="button" name="buscarporced" value="Buscar" onclick="buscarced(cedul.value,fconfirmacion.value,codmin.value,lugarbau.value,tipobusqueda.value)" disabled>
                      </div>
                    </div>
                    <br> 
                    <div class="form-group" id="nuevocodigo" style="<?php if($nuevocodigo!='') echo 'display: block'; else  echo 'display: none'?>">
                      <label class="col-sm-3 control-label" for="nuevo_codigo">Código:</label>
                      <div class="col-sm-2">
                        <input class="form-control" type="text" name="nuevo_codigo" id="nuevo_codigo" value="<?php echo $nuevocodigo; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group" id="nuevonombre" style="<?php if($nuevonombre!='') echo 'display: block'; else  echo 'display: none'?>">
                      <label class="col-sm-3 control-label" for="nuevo_nombre">Nombres:</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" name="nuevo_nombre" id="nuevo_nombre" value="<?php echo($nuevonombre);?>" readonly>
                      </div>
                      <label class="col-sm-2 control-label" for="nuevo_apellido">Apellidos:</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" name="nuevo_apellido" id="nuevo_apellido" value="<?php echo($nuevoapellido);?>" readonly>
                      </div>
                    </div>
                    <div class="form-group" id="nuevafechanac" style="<?php if($nuevafechanac!='') echo 'display: block'; else  echo 'display: none'?>">
                      <label for="nueva_fechanac" class="col-sm-3 control-label">Fecha de Nacimiento:</label>
                      <div class="col-sm-3"> 
                        <input type="text" class="form-control" id="nueva_fechanac" name="nueva_fechanac" value="<?php echo($nuevafechanac);?>" readonly>
                      </div>
                    </div>
                    <br>
                    <div class="form-group" id="padre" style="<?php if($nuevopadre!='') echo 'display: block'; else  echo 'display: none'?>">
                      <label class="col-sm-8 control-label" for="padre">Padre:</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="nuevo_padre" id="nuevo_padre" value="<?php echo $nuevopadre; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group" id="madre" style="<?php if($nuevamadre!='') echo 'display: block'; else  echo 'display: none'?>">
                      <label class="col-sm-8 control-label" for="madre">Madre:</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="nueva_madre" id="nueva_madre" value="<?php echo $nuevamadre; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group" id="fili" style="<?php if($nuevafiliacion!='') echo 'display: block'; else  echo 'display: none'?>">
                      <label class="col-sm-8 control-label" for="nueva_filiacion">Filiación:</label>
                      <div class="col-sm-2">
                        <input class="form-control" type="text" name="nueva_filiacion" id="nueva_filiacion" value="<?php echo $nuevafiliacion; ?>">
                      </div>
                    </div>
                    <br>   
                  </span>

                  <span id="busquedapornom" style="<?php if($tipobusqueda==2) echo 'display: block'; else  echo 'display: none'?>">
                    <div class="form-group">
                      <label for="nombr" class="col-sm-2 control-label">* Nombres:</label>
                      <div class="col-sm-3">
                        <input class="form-control" id="nombr" type="text" name="nombr" value="<?php echo $nom ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="apelli" class="col-sm-2 control-label">* Apellidos:</label>
                      <div class="col-sm-3">
                        <input class="form-control" id="apelli" type="text" name="apelli" value="<?php echo $apel ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="fenac" class="col-sm-3 control-label">Fecha de Nacimiento:</label>
                      <div class="col-sm-3">
                        <input class="form-control" id="fenac" type="date" name="fenac" value="<?php echo $fechnac ?>">
                      </div>
                      <div class="col-sm-3">
                        <input class="btn btn-primary" id="buscarpornom" type="button" name="buscarpornom" value="Buscar" onclick="mostrarInfo(nombr.value,apelli.value,fenac.value,3)" disabled="true">
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <span id="tabla">
                        <div class="table-responsive" id="datos"></div>
                      </span>
                    </div>
                    <div class="form-group" id="codigo" style="<?php if($codigonuevo!='') echo 'display: block'; else  echo 'display: none'?>">
                      <label for="cod" class="col-sm-2 control-label">Código:</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="cod" name="cod" value="<?php echo $codigonuevo ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group" id="cedulanueva" style="<?php if($cedulanueva!='') echo 'display: block'; else  echo 'display: none'?>">
                      <label for="nueva_ced" class="col-sm-2 control-label">Cédula:</label>
                      <div class="col-sm-2"> 
                        <input type="text" class="form-control" id="nueva_ced" name="nueva_ced" value="<?php echo $cedulanueva ?>">
                      </div>
                      <p class="help-block">Ingrese cédula en caso de que aún no se haya registrado</p>
                    </div>
                    <br>
                    <div class="form-group" id="nombrenuevo" style="<?php if($nombrenuevo!='') echo 'display: block'; else  echo 'display: none'?>">
                      <label for="nueva_ced" class="col-sm-2 control-label">Nombre:</label>
                      <div class="col-sm-3"> 
                        <input type="text" class="form-control" id="nombre_nuevo" name="nombre_nuevo" value="<?php echo $nombrenuevo ?>" readonly>
                      </div>
                      <label for="apellido_nuevo" class="col-sm-3 control-label">Apellido:</label>
                      <div class="col-sm-3"> 
                        <input type="text" class="form-control" id="apellido_nuevo" name="apellido_nuevo" value="<?php echo $apellidonuevo ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group" id="fechanacnueva" style="<?php if($fechanacnueva!='') echo 'display: block'; else  echo 'display: none'?>">
                      <label for="fechanac_nueva" class="col-sm-3 control-label">Fecha de Nacimiento:</label>
                      <div class="col-sm-3"> 
                        <input type="text" class="form-control" id="fechanac_nueva" name="fechanac_nueva" value="<?php echo $fechanacnueva ?>" readonly>
                      </div>
                      <br>
                      <div class="col-sm-12">
                        <p class="help-block" align="center">Ingrese los datos restantes</p>
                      </div>
                    </div>
                    <div class="form-group" id="padrenuevo" style="<?php if($padrenuevo!='') echo 'display: block'; else  echo 'display: none'?>">
                      <label class="col-sm-8 control-label" for="padre_nuevo">Padre:</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="padre_nuevo" id="padre_nuevo" value="<?php echo $padrenuevo ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group" id="madrenueva" style="<?php if($madrenueva!='') echo 'display: block'; else  echo 'display: none'?>">
                      <label class="col-sm-8 control-label" for="madrenueva">Madre:</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="madre_nueva" id="madre_nueva" value="<?php echo $madrenueva ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group" id="filinueva" style="<?php if($filiacionnueva!='') echo 'display: block'; else  echo 'display: none'?>">
                      <label class="col-sm-8 control-label" for="filiacion_nueva">Filiación:</label>
                      <div class="col-sm-2">
                        <input class="form-control" type="text" name="filiacion_nueva" id="filiacion_nueva" value="<?php echo $filiacionnueva ?>">
                      </div>
                    </div>
                  </span>
                </span>
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
                    <input class="form-control" type="text" id="cedulapadrino" name="cedulapadrino" value="<?php echo($cedulapadrino);?>" onblur="autollenado(this.value,fconfirmacion.value,codmin.value,lugarbau.value,otrolugarbau.value,cedula.value,nombre.value,apellido.value,sexo.value,fechanac.value,cedulapadre.value,nombrepadre.value,apellidopadre.value,cedulamadre.value,nombremadre.value,apellidomadre.value,filiacion.value,tipobusqueda.value,cedul.value,nuevo_codigo.value,nuevo_nombre.value,nuevo_apellido.value,nueva_fechanac.value,nuevo_padre.value,nueva_madre.value,nueva_filiacion.value,nombr.value,apelli.value,fenac.value,cod.value,nueva_ced.value,nombre_nuevo.value,apellido_nuevo.value,fechanac_nueva.value,padre_nuevo.value,madre_nueva.value,filiacion_nueva.value)">
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
                <span id="botones">
                  <div class="form-group">
                    <br>
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">
                      <input type="submit" class="btn btn-primary btn-lg" name="regconf" value="Registrar">
                    </div>
                  </div>
                  <div class="form-group">
                    <br>
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">
                      <a href="acceso.php"><input type="button" class="btn btn-danger btn-lg" value="Salir"></a>
                    </div>
                  </div>
                </span>
              </form>
            </div>
            <div class="col-sm-1"></div>
          </div>
          <div class="row" id="msj">
            <div class="col-sm-12">
              <?php
                include("../php/libreria.php");
                $confirmacion=validacionconf();
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
    header('location: registroconfirmacion.php');
  }
}
else 
{
  header("Location: login.php");
}
?>