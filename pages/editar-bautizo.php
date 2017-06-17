<?php
session_start();
  include('../php/conexion.php');
  if(isset($_SESSION['usuario_nombre'])) 
  {
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();
    
    include('../php/libreria.php');
    if(isset($_GET['cod']))
    {
      $registros=mysqli_query($conexion,"SELECT * FROM personas per,bautizo bau,padrespersona padper,padrinosbautizado pdrbau WHERE per.codigo_per='$_GET[cod]' AND bau.codigo_per=per.codigo_per AND padper.codigo_per=bau.codigo_per AND pdrbau.codigo_per=padper.codigo_per");
      $reg=mysqli_fetch_array($registros);
      $registrospad=mysqli_query($conexion,"SELECT * FROM padre,madre,padrino,madrina WHERE cedula_pad='$reg[cedula_pad]' AND cedula_mad='$reg[cedula_mad]' AND cedula_pdr='$reg[cedula_pdr]' AND cedula_mdr='$reg[cedula_mdr]'");
      $regpad=mysqli_fetch_array($registrospad);
      
    
      $cedula=$reg['cedula_per'];
      $nombre=$reg['nombre_per'];
      $apellido=$reg['apellido_per'];
      $sex=$reg['sexo_per'];
      $fechanac=$reg['fechanac_per'];
      $lugarnac=$reg['lugarnac_per'];
      $registrocivil=$reg['registrocivil_per'];
      $cedulapadre=$reg['cedula_pad'];
      $cedulamadre=$reg['cedula_mad'];
      $nombrepadre=$regpad['nombre_pad'];
      $nombremadre=$regpad['nombre_mad'];
      $apellidopadre=$regpad['apellido_pad'];
      $apellidomadre=$regpad['apellido_mad'];
      $filiacion=$reg['filiacion'];
      $cedulapadrino=$reg['cedula_pdr'];
      $cedulamadrina=$reg['cedula_mdr'];
      $nombrepadrino=$regpad['nombre_pdr'];
      $nombremadrina=$regpad['nombre_mdr'];
      $apellidopadrino=$regpad['apellido_pdr'];
      $apellidomadrina=$regpad['apellido_mdr'];
      $fechabau=$reg['fecha_bau'];
      $min=$reg['codigo_min'];
      $otromin="";
      $observacion=$reg['observacion_bau'];


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
      if((isset($_POST['lugarnac'])) and (trim($_POST['lugarnac'])!="")) 
      {
        $lugarnac=trim($_POST['lugarnac']);
      }
      if((isset($_POST['registrocivil'])) and (trim($_POST['registrocivil'])!="")) 
      {
        $registrocivil=trim($_POST['registrocivil']);
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
      if((isset($_POST['filiacion'])) and (trim($_POST['filiacion'])!="")) 
      {
        $filiacion=trim($_POST['filiacion']);
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
      if((isset($_POST['cedulamadrina'])) and (trim($_POST['cedulamadrina'])!="")) 
      {
        $cedulamadrina=trim($_POST['cedulamadrina']);
      }
      if((isset($_POST['nombremadrina'])) and (trim($_POST['nombremadrina'])!="")) 
      {
        $nombremadrina=trim($_POST['nombremadrina']);
      }
      if((isset($_POST['apellidomadrina'])) and (trim($_POST['apellidomadrina'])!="")) 
      {
        $apellidomadrina=trim($_POST['apellidomadrina']);
      }
      if((isset($_POST['fechabautizo'])) and (trim($_POST['fechabautizo'])!="")) 
      {
        $fechabau=trim($_POST['fechabautizo']);
      }
      if(isset($_POST['ministro'])) 
      {
        $min=$_POST['ministro'];
      }
      if((isset($_POST['otroministro'])) and (trim($_POST['otroministro'])!="Otro...")) 
      {
        $otromin=trim($_POST['otroministro']);
      }
      if((isset($_POST['observaciones'])) and (trim($_POST['observaciones'])!="")) 
      {
        $observacion=trim($_POST['observaciones']);
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
      if(isset($_POST['ln']))
      {
        $lugarnac=$_POST['ln'];
      }
      if(isset($_POST['rc']))
      {
        $registrocivil=$_POST['rc'];
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
      if(isset($_POST['cedmadri']))
      {
        $cedulamadrina=$_POST['cedmadri'];
      }
      if(isset($_POST['nompadri']))
      {
        $nombrepadrino=$_POST['nompadri'];
      }
      if(isset($_POST['nommadri']))
      {
        $nombremadrina=$_POST['nommadri'];
      }
      if(isset($_POST['apepadri']))
      {
        $apellidopadrino=$_POST['apepadri'];
      }
      if(isset($_POST['apemadri']))
      {
        $apellidomadrina=$_POST['apemadri'];
      }
      if(isset($_POST['fb']))
      {
        $fechabau=$_POST['fb'];
      }
      if(isset($_POST['min']))
      {
        $min=$_POST['min'];
      }
      if(isset($_POST['otromin']))
      {
        $otromin=$_POST['otromin'];
      }
      if(isset($_POST['observ']))
      {
        $observacion=$_POST['observ'];
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
        function llenado(cp,c,no,ap,sex,fna,lna,regciv,cema,nomad,apmad,cedpadri,nompadri,apepadri,cedmadri,nommadri,apemadri,fecbau,min,omin,obser,code) 
          {
            document.location.href="../php/identificarpadre.php?cedulapadre="+cp+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&sexo="+sex+"&fechanac="+fna+"&lugarnac="+lna+"&registrocivil="+regciv+"&cedulamadre="+cema+"&nombremadre="+nomad+"&apellidomadre="+apmad+"&cedpadrino="+cedpadri+"&nombpadrino="+nompadri+"&apepadrino="+apepadri+"&cedmadrina="+cedmadri+"&nombmadrina="+nommadri+"&apemadrina="+apemadri+"&fechab="+fecbau+"&minis="+min+"&otrom="+omin+"&observaciones="+obser+"&cod="+code+"&opc="+11;
          }
        function relleno(cm,c,no,ap,sex,fna,lna,regciv,cepa,nopad,appad,cedpadri,nompadri,apepadri,cedmadri,nommadri,apemadri,fecbau,min,omin,obser,code) 
          {
            document.location.href="../php/identificarmadre.php?cedulamadre="+cm+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&sexo="+sex+"&fechanac="+fna+"&lugarnac="+lna+"&registrocivil="+regciv+"&cedulapadre="+cepa+"&nombrepadre="+nopad+"&apellidopadre="+appad+"&cedpadrino="+cedpadri+"&nombpadrino="+nompadri+"&apepadrino="+apepadri+"&cedmadrina="+cedmadri+"&nombmadrina="+nommadri+"&apemadrina="+apemadri+"&fechab="+fecbau+"&minis="+min+"&otrom="+omin+"&observaciones="+obser+"&cod="+code+"&opc="+11;
          }
          function autollenar(cpadri,c,no,ap,sex,fna,lna,regciv,cepa,nopad,appad,cema,nomad,apmad,fil,cedmadri,nommadri,apemadri,fecbau,min,omin,obser,code) 
          {
            document.location.href="../php/identificarpadrino.php?cedpadrino="+cpadri+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&sexo="+sex+"&fechanac="+fna+"&lugarnac="+lna+"&registrocivil="+regciv+"&cedulapadre="+cepa+"&nombrepadre="+nopad+"&apellidopadre="+appad+"&cedulamadre="+cema+"&nombremadre="+nomad+"&apellidomadre="+apmad+"&filiacion="+fil+"&cedmadrina="+cedmadri+"&nombmadrina="+nommadri+"&apemadrina="+apemadri+"&fechab="+fecbau+"&minis="+min+"&otrom="+omin+"&observaciones="+obser+"&cod="+code+"&opc="+11;
          }
          function autollenado(cmadri,c,no,ap,sex,fna,lna,regciv,cepa,nopad,appad,cema,nomad,apmad,fil,cedpadri,nompadri,apepadri,fecbau,min,omin,obser,code) 
          {
            document.location.href="../php/identificarmadrina.php?cedmadrina="+cmadri+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&sexo="+sex+"&fechanac="+fna+"&lugarnac="+lna+"&registrocivil="+regciv+"&cedulapadre="+cepa+"&nombrepadre="+nopad+"&apellidopadre="+appad+"&cedulamadre="+cema+"&nombremadre="+nomad+"&apellidomadre="+apmad+"&filiacion="+fil+"&cedpadrino="+cedpadri+"&nombpadrino="+nompadri+"&apepadrino="+apepadri+"&fechab="+fecbau+"&minis="+min+"&otrom="+omin+"&observaciones="+obser+"&cod="+code+"&opc="+11;
          }
        </script>
      </head>
      <body>
        <div id="contenedor-prin" class="container">
          <div class="row">
            <div id="cabecera" class="col-sm-13">
              <img class="img-responsive" src="../images/cabecera.png">
              <h3>Modificación de Bautizo</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-1"></div>
            <div id="formulario" class="col-sm-10">
              <form name="bautizo" class="form-horizontal" method="post" action="editar-bautizo.php?cod=<?php echo $_GET['cod'];?>#msj">
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
                  <div class="col-sm-8 help-block">La mayoría de los recien bautizados no poseen cédula aún. En ese caso se deja el campo vacío</div>
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
                    <input  type="radio" name="sexo" value="" id="sex" <?php if($sex=="") echo 'checked' ?>style="display: none">
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
                  <label class="col-sm-2 control-label" for="lugarnac">* Natural de:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="lugarnac" id="lugarnac" value="<?php echo($lugarnac);?>">
                  </div>
                  <label class="col-sm-2 control-label">* Registro Civil:</label>
                  <div class="col-sm-4">
                    <input class="form-control" type="text" name="registrocivil" value="<?php echo $registrocivil ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10 titulo">
                    <h4 id="padres">Padres del Bautizado</h4>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">* Cédula del Padre:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="cedulapadre" value="<?php echo $cedulapadre ?>" onblur="llenado(this.value,cedula.value,nombre.value,apellido.value,sexo.value,fechanac.value,lugarnac.value,registrocivil.value,cedulamadre.value,nombremadre.value,apellidomadre.value,cedulapadrino.value,nombrepadrino.value,apellidopadrino.value,cedulamadrina.value,nombremadrina.value,apellidomadrina.value,fechabautizo.value,ministro.value,otroministro.value,observaciones.value,codigo.value)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="nombrepadre">* Nombres del Padre:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" id="nombrepadre" name="nombrepadre" value="<?php echo $nombrepadre ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">* Apellidos del Padre:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellidopadre" value="<?php echo $apellidopadre ?>">
                  </div>
                </div>
                <div class="form-group">
                  <hr>
                  <label class="col-sm-3 control-label">* Cédula de la Madre:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="cedulamadre" value="<?php echo $cedulamadre ?>" onblur="relleno(this.value,cedula.value,nombre.value,apellido.value,sexo.value,fechanac.value,lugarnac.value,registrocivil.value,cedulapadre.value,nombrepadre.value,apellidopadre.value,cedulapadrino.value,nombrepadrino.value,apellidopadrino.value,cedulamadrina.value,nombremadrina.value,apellidomadrina.value,fechabautizo.value,ministro.value,otroministro.value,observaciones.value,codigo.value)">
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
                  <div class="col-sm-5"></div>
                  <label class="col-sm-3 control-label">* Filiación:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="filiacion" value="<?php echo $filiacion ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10 titulo">
                    <h4 id="padrinos">Padrinos del Bautizado</h4>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">* Cédula del Padrino:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="cedulapadrino" value="<?php echo $cedulapadrino ?>" onblur="autollenar(this.value,cedula.value,nombre.value,apellido.value,sexo.value,fechanac.value,lugarnac.value,registrocivil.value,cedulapadre.value,nombrepadre.value,apellidopadre.value,cedulamadre.value,nombremadre.value,apellidomadre.value,filiacion.value,cedulamadrina.value,nombremadrina.value,apellidomadrina.value,fechabautizo.value,ministro.value,otroministro.value,observaciones.value,codigo.value)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">* Nombres del Padrino:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="nombrepadrino" value="<?php echo $nombrepadrino ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">* Apellidos del Padrino:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellidopadrino" value="<?php echo $apellidopadrino ?>">
                  </div>
                </div>
                <div class="form-group">
                  <hr>
                  <label class="col-sm-3 control-label">* Cédula de la Madrina:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="cedulamadrina" value="<?php echo $cedulamadrina ?>" onblur="autollenado(this.value,cedula.value,nombre.value,apellido.value,sexo.value,fechanac.value,lugarnac.value,registrocivil.value,cedulapadre.value,nombrepadre.value,apellidopadre.value,cedulamadre.value,nombremadre.value,apellidomadre.value,filiacion.value,cedulapadrino.value,nombrepadrino.value,apellidopadrino.value,fechabautizo.value,ministro.value,otroministro.value,observaciones.value,codigo.value)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">* Nombres de la Madrina:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="nombremadrina" value="<?php echo $nombremadrina ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">* Apellidos de la Madrina:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellidomadrina" value="<?php echo $apellidomadrina ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10 titulo">
                    <h4>Bautizo</h4>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <br><br>
                  <label class="col-sm-2 control-label" for="fechabautizo">* Fecha:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="date" name="fechabautizo" id="fechabautizo" value="<?php echo $fechabau ?>">
                    <p class="help-block">DD/MM/AAAA</p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="ministro" class="col-sm-2 control-label">Ministro: </label>
                  <div class="col-sm-3">
                    <select class="form-control" name="ministro" id="ministro" onchange="oculta(this);">
                      <option value="" <?php if($min=="") echo 'selected' ?>>Seleccione...</option>
                      <?php 
                        $registros=mysqli_query($conexion,"SELECT * FROM ministro ORDER BY codigo_min");
                        while($reg=mysqli_fetch_array($registros))
                        {
                      ?>
                        <option value="<?php echo $reg['codigo_min']; ?>" <?php if($reg['codigo_min']==$min) echo 'selected'; ?>><?php echo $reg['ministro_min']; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                  <span id="otromin">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3">
                      <input class="form-control" id="otroministro" type="text" name="otroministro" value="<?php if($min!=0) {echo "";} else{echo $otromin;} ?>" onclick="borracampo();" onblur="restauracampo();">
                    </div>
                  </span>
                </div>
                <div class="form-group">
                  <br>
                  <label class="col-sm-2 control-label">Observaciones:</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="observaciones"><?php echo $observacion ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <br>
                  <div class="col-sm-10"></div>
                  <div class="col-sm-2">
                    <input type="submit" name="editbau" class="btn btn-primary btn-lg" value="Guardar Cambios">
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
                $bautizo=validarbau('edicion');
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