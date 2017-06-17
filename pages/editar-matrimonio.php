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
      $filiacion="";

      $cedulapadreesp="";
      $cedulamadreesp="";
      $nombrepadreesp="";
      $nombremadreesp="";
      $apellidopadreesp="";
      $apellidomadreesp="";
      $filiacionesp="";

      $cedulapadrino="";
      $nombrepadrino="";
      $apellidopadrino="";

      $cedulamadrina="";
      $nombremadrina="";
      $apellidomadrina="";

      $otromin="";


      $registrosmatrimonio=mysqli_query($conexion,"SELECT * FROM matrimonio WHERE codigo_matri='$_GET[cod]'")or die(mysqli_error());
      $regmatrimonio=mysqli_fetch_array($registrosmatrimonio);
      $registrosesposo=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$regmatrimonio[codigo_per]'") or die(mysqli_error());
      $regesposo=mysqli_fetch_array($registrosesposo);
      $registrosesposa=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$regmatrimonio[codigo_per2]'") or die(mysqli_error());
      $regesposa=mysqli_fetch_array($registrosesposa);

      $registrospadperesposo=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$regesposo[codigo_per]'");
      if($regpadperesposo=mysqli_fetch_array($registrospadperesposo))
      {
        $registrospadesposo=mysqli_query($conexion,"SELECT * FROM padre,madre WHERE cedula_pad='$regpadperesposo[cedula_pad]' AND cedula_mad='$regpadperesposo[cedula_mad]'");
        $regpadesposo=mysqli_fetch_array($registrospadesposo);

        $cedulapadre=$regpadesposo['cedula_pad'];
        $cedulamadre=$regpadesposo['cedula_mad'];
        $nombrepadre=$regpadesposo['nombre_pad'];
        $nombremadre=$regpadesposo['nombre_mad'];
        $apellidopadre=$regpadesposo['apellido_pad'];
        $apellidomadre=$regpadesposo['apellido_mad'];
        $filiacion=$regpadperesposo['filiacion'];
      }

      $registrospadperesposa=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$regesposa[codigo_per]'");
      if($regpadperesposa=mysqli_fetch_array($registrospadperesposa))
      {
        $registrospadesposa=mysqli_query($conexion,"SELECT * FROM padre,madre WHERE cedula_pad='$regpadperesposa[cedula_pad]' AND cedula_mad='$regpadperesposa[cedula_mad]'");
        $regpadesposa=mysqli_fetch_array($registrospadesposa);

        $cedulapadreesp=$regpadesposa['cedula_pad'];
        $cedulamadreesp=$regpadesposa['cedula_mad'];
        $nombrepadreesp=$regpadesposa['nombre_pad'];
        $nombremadreesp=$regpadesposa['nombre_mad'];
        $apellidopadreesp=$regpadesposa['apellido_pad'];
        $apellidomadreesp=$regpadesposa['apellido_mad'];
        $filiacionesp=$regpadperesposa['filiacion'];
      }

      $registrospdrmatri=mysqli_query($conexion,"SELECT * FROM padrinosboda WHERE codigo_per='$regesposo[codigo_per]' OR codigo_per2='$regesposa[codigo_per]'");
      $regpdrmatri=mysqli_fetch_array($registrospdrmatri);
   
      $registrospadrino=mysqli_query($conexion,"SELECT * FROM padrino WHERE cedula_pdr='$regpdrmatri[cedula_pdr]'");
      if($regpadrino=mysqli_fetch_array($registrospadrino))
      {
        $cedulapadrino=$regpadrino['cedula_pdr'];
        $nombrepadrino=$regpadrino['nombre_pdr'];
        $apellidopadrino=$regpadrino['apellido_pdr'];
      }
      
      $registrosmadrina=mysqli_query($conexion,"SELECT * FROM madrina WHERE cedula_mdr='$regpdrmatri[cedula_mdr]'");
      if($regmadrina=mysqli_fetch_array($registrosmadrina))
      {
        $cedulamadrina=$regmadrina['cedula_mdr'];
        $nombremadrina=$regmadrina['nombre_mdr'];
        $apellidomadrina=$regmadrina['apellido_mdr'];
      }
    
      $cedula=$regesposo['cedula_per'];
      $nombre=$regesposo['nombre_per'];
      $apellido=$regesposo['apellido_per'];
      $fechanac=$regesposo['fechanac_per'];
      $edad=$regesposo['edad_per'];
      $lugarnac=$regesposo['lugarnac_per'];
      $estado=$regesposo['estadodir_per'];
      $domicilio=$regesposo['direccion_per'];

      $cedulaesp=$regesposa['cedula_per'];
      $nombreesp=$regesposa['nombre_per'];
      $apellidoesp=$regesposa['apellido_per'];
      $fechanacesp=$regesposa['fechanac_per'];
      $edadesp=$regesposa['edad_per'];
      $lugarnacesp=$regesposa['lugarnac_per'];
      $estadoesp=$regesposa['estadodir_per'];
      $domicilioesp=$regesposa['direccion_per'];
      
      $proclamas=$regmatrimonio['proclamas'];
      $dispensas=$regmatrimonio['dispensas'];
      $fechamatri=$regmatrimonio['fecha_matri'];
      $sacramentos=$regmatrimonio['sacramentos'];
      $observacion=$regmatrimonio['observacion_matri'];
      $min=$regmatrimonio['codigo_min'];

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
      if((isset($_POST['fechanac'])) and (trim($_POST['fechanac'])!="")) 
      {
        $fechanac=trim($_POST['fechanac']);
      }
      if((isset($_POST['edad'])) and (trim($_POST['edad'])!="")) 
      {
        $edad=trim($_POST['edad']);
      }
      if((isset($_POST['lugarnac'])) and (trim($_POST['lugarnac'])!="")) 
      {
        $lugarnac=trim($_POST['lugarnac']);
      }
      if((isset($_POST['estado'])) and (trim($_POST['estado'])!="")) 
      {
        $estado=trim($_POST['estado']);
      }
      if((isset($_POST['domicilio'])) and (trim($_POST['domicilio'])!="")) 
      {
        $domicilio=trim($_POST['domicilio']);
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



      if((isset($_POST['cedulaesp'])) and (trim($_POST['cedulaesp'])!="")) 
      {
        $cedulaesp=trim($_POST['cedulaesp']);
      }
      if((isset($_POST['nombreesp'])) and (trim($_POST['nombreesp'])!="")) 
      {
        $nombreesp=trim($_POST['nombreesp']);
      }
      if((isset($_POST['apellidoesp'])) and (trim($_POST['apellidoesp'])!="")) 
      {
        $apellidoesp=trim($_POST['apellidoesp']);
      }
      if((isset($_POST['fechanacesp'])) and (trim($_POST['fechanacesp'])!="")) 
      {
        $fechanacesp=trim($_POST['fechanacesp']);
      }
      if((isset($_POST['edadesp'])) and (trim($_POST['edadesp'])!="")) 
      {
        $edadesp=trim($_POST['edadesp']);
      }
      if((isset($_POST['lugarnacesp'])) and (trim($_POST['lugarnacesp'])!="")) 
      {
        $lugarnacesp=trim($_POST['lugarnacesp']);
      }
      if((isset($_POST['estadoesp'])) and (trim($_POST['estadoesp'])!="")) 
      {
        $estadoesp=trim($_POST['estadoesp']);
      }
      if((isset($_POST['domicilioesp'])) and (trim($_POST['domicilioesp'])!="")) 
      {
        $domicilioesp=trim($_POST['domicilioesp']);
      }
      if((isset($_POST['cedulapadreesp'])) and (trim($_POST['cedulapadreesp'])!="")) 
      {
        $cedulapadreesp=trim($_POST['cedulapadreesp']);
      }
      if((isset($_POST['nombrepadreesp'])) and (trim($_POST['nombrepadreesp'])!="")) 
      {
        $nombrepadreesp=trim($_POST['nombrepadreesp']);
      }
      if((isset($_POST['apellidopadreesp'])) and (trim($_POST['apellidopadreesp'])!="")) 
      {
        $apellidopadreesp=trim($_POST['apellidopadreesp']);
      }
      if((isset($_POST['cedulamadreesp'])) and (trim($_POST['cedulamadreesp'])!="")) 
      {
        $cedulamadreesp=trim($_POST['cedulamadreesp']);
      }
      if((isset($_POST['nombremadreesp'])) and (trim($_POST['nombremadreesp'])!="")) 
      {
        $nombremadreesp=trim($_POST['nombremadreesp']);
      }
      if((isset($_POST['apellidomadreesp'])) and (trim($_POST['apellidomadreesp'])!="")) 
      {
        $apellidomadreesp=trim($_POST['apellidomadreesp']);
      }
      if((isset($_POST['filiacionesp'])) and (trim($_POST['filiacionesp'])!="")) 
      {
        $filiacionesp=trim($_POST['filiacionesp']);
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
      if(isset($_POST['fn']))
      {
        $fechanac=$_POST['fn'];
      }
      if(isset($_POST['ed']))
      {
        $edad=trim($_POST['ed']);
      }
      if(isset($_POST['ln']))
      {
        $lugarnac=trim($_POST['ln']);
      }
      if(isset($_POST['est']))
      {
        $estado=trim($_POST['est']);
      }
      if(isset($_POST['dom']))
      {
        $domicilio=trim($_POST['dom']);
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
      if(isset($_POST['apemad']))
      {
        $apellidomadre=$_POST['apemad'];
      }
      if(isset($_POST['fili']))
      {
        $filiacion=$_POST['fili'];
      }



      if(isset($_POST['cedesp']))
      {
        $cedulaesp=$_POST['cedesp'];
      }
      if(isset($_POST['nomesp']))
      {
        $nombreesp=$_POST['nomesp'];
      }
      if(isset($_POST['apeesp']))
      {
        $apellidoesp=$_POST['apeesp'];
      }
      if(isset($_POST['fnesp']))
      {
        $fechanacesp=$_POST['fnesp'];
      }
      if(isset($_POST['edesp']))
      {
        $edadesp=trim($_POST['edesp']);
      }
      if(isset($_POST['lnesp']))
      {
        $lugarnacesp=trim($_POST['lnesp']);
      }
      if(isset($_POST['estesp']))
      {
        $estadoesp=trim($_POST['estesp']);
      }
      if(isset($_POST['domesp']))
      {
        $domicilioesp=trim($_POST['domesp']);
      }
      if(isset($_POST['cedpadesp']))
      {
        $cedulapadreesp=$_POST['cedpadesp'];
      }
      if(isset($_POST['cedmadesp']))
      {
        $cedulamadreesp=$_POST['cedmadesp'];
      }
      if(isset($_POST['nompadesp']))
      {
        $nombrepadreesp=$_POST['nompadesp'];
      }
      if(isset($_POST['nommadesp']))
      {
        $nombremadreesp=$_POST['nommadesp'];
      }
      if(isset($_POST['apepadesp']))
      {
        $apellidopadreesp=$_POST['apepadesp'];
      }
      if(isset($_POST['apemadesp']))
      {
        $apellidomadreesp=$_POST['apemadesp'];
      }
      if(isset($_POST['filiesp']))
      {
        $filiacionesp=$_POST['filiesp'];
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
      if(isset($_POST['proclamas']))
      {
        $proclamas=$_POST['proclamas'];
      }
      if(isset($_POST['dispensas']))
      {
        $dispensas=$_POST['dispensas'];
      }
      if(isset($_POST['sacramentos']))
      {
        $sacramentos=$_POST['sacramentos'];
      }
      if(isset($_POST['observaciones']))
      {
        $observacion=$_POST['observaciones'];
      }
      if((isset($_POST['fechamatrimonio'])) and (trim($_POST['fechamatrimonio'])!="")) 
      {
        $fechamatri=trim($_POST['fechamatrimonio']);
      }
      if(isset($_POST['ministro'])) 
      {
        $min=$_POST['ministro'];
      }
      if((isset($_POST['otroministro'])) and (trim($_POST['otroministro'])!="Otro...")) 
      {
        $otromin=trim($_POST['otroministro']);
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
      if(isset($_POST['cedmadri']))
      {
        $cedulamadrina=$_POST['cedmadri'];
      }
      if(isset($_POST['nommadri']))
      {
        $nombremadrina=$_POST['nommadri'];
      }
      if(isset($_POST['apemadri']))
      {
        $apellidomadrina=$_POST['apemadri'];
      }
      if(isset($_POST['pro']))
      {
        $proclamas=$_POST['pro'];
      }
      if(isset($_POST['dis']))
      {
        $dispensas=$_POST['dis'];
      }
      if(isset($_POST['sac']))
      {
        $sacramentos=$_POST['sac'];
      }
      if(isset($_POST['observ']))
      {
        $observacion=$_POST['observ'];
      }
      if(isset($_POST['fm']))
      {
        $fechamatri=$_POST['fm'];
      }
      if(isset($_POST['min']))
      {
        $min=$_POST['min'];
      }
      if(isset($_POST['otromin']))
      {
        $otromin=$_POST['otromin'];
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
        function llenado(cp,c,no,ap,fna,ed,lna,esta,dom,cema,nomad,apmad,fili,cesp,noesp,apesp,fnaesp,edesp,lnaesp,estaesp,domesp,cepaesp,nopadesp,appadesp,cemaesp,nomadesp,apmadesp,filiesp,cedpadri,nompadri,apepadri,cedmadri,nommadri,apemadri,pro,dis,minis,ominis,fmatri,sac,obs,code) 
        {
          document.location.href="../php/identificarpadre.php?cedulapadre="+cp+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&fechanac="+fna+"&edad="+ed+"&lugarnac="+lna+"&estado="+esta+"&domi="+dom+"&cedulamadre="+cema+"&nombremadre="+nomad+"&apellidomadre="+apmad+"&filiacion="+fili+"&cedulaesp="+cesp+"&nombreesp="+noesp+"&apellidoesp="+apesp+"&fechanacesp="+fnaesp+"&edadesp="+edesp+"&lugarnacesp="+lnaesp+"&estadoesp="+estaesp+"&domiesp="+domesp+"&cedulapadreesp="+cepaesp+"&nombrepadreesp="+nopadesp+"&apellidopadreesp="+appadesp+"&cedulamadreesp="+cemaesp+"&nombremadreesp="+nomadesp+"&apellidomadreesp="+apmadesp+"&filiacionesp="+filiesp+"&cedpadrino="+cedpadri+"&nombpadrino="+nompadri+"&apepadrino="+apepadri+"&cedmadrina="+cedmadri+"&nombmadrina="+nommadri+"&apemadrina="+apemadri+"&proclamas="+pro+"&dispensas="+dis+"&ministro="+minis+"&otrom="+ominis+"&fecham="+fmatri+"&sacram="+sac+"&observaciones="+obs+"&cod="+code+"&opc="+14;
        }
        function relleno(cm,c,no,ap,fna,ed,lna,esta,dom,cepa,nopad,appad,fili,cesp,noesp,apesp,fnaesp,edesp,lnaesp,estaesp,domesp,cepaesp,nopadesp,appadesp,cemaesp,nomadesp,apmadesp,filiesp,cedpadri,nompadri,apepadri,cedmadri,nommadri,apemadri,pro,dis,minis,ominis,fmatri,sac,obs,code) 
        {
          document.location.href="../php/identificarmadre.php?cedulamadre="+cm+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&fechanac="+fna+"&edad="+ed+"&lugarnac="+lna+"&estado="+esta+"&domi="+dom+"&cedulapadre="+cepa+"&nombrepadre="+nopad+"&apellidopadre="+appad+"&filiacion="+fili+"&cedulaesp="+cesp+"&nombreesp="+noesp+"&apellidoesp="+apesp+"&fechanacesp="+fnaesp+"&edadesp="+edesp+"&lugarnacesp="+lnaesp+"&estadoesp="+estaesp+"&domiesp="+domesp+"&cedulapadreesp="+cepaesp+"&nombrepadreesp="+nopadesp+"&apellidopadreesp="+appadesp+"&cedulamadreesp="+cemaesp+"&nombremadreesp="+nomadesp+"&apellidomadreesp="+apmadesp+"&filiacionesp="+filiesp+"&cedpadrino="+cedpadri+"&nombpadrino="+nompadri+"&apepadrino="+apepadri+"&cedmadrina="+cedmadri+"&nombmadrina="+nommadri+"&apemadrina="+apemadri+"&proclamas="+pro+"&dispensas="+dis+"&ministro="+minis+"&otrom="+ominis+"&fecham="+fmatri+"&sacram="+sac+"&observaciones="+obs+"&cod="+code+"&opc="+14;
        }
        function llenadoesp(cpesp,c,no,ap,fna,ed,lna,esta,dom,cepa,nopad,appad,cema,nomad,apmad,fili,cesp,noesp,apesp,fnaesp,edesp,lnaesp,estaesp,domesp,cemaesp,nomadesp,apmadesp,filiesp,cedpadri,nompadri,apepadri,cedmadri,nommadri,apemadri,pro,dis,minis,ominis,fmatri,sac,obs,code) 
        {
          document.location.href="../php/identificarpadre.php?cedulapadreesp="+cpesp+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&fechanac="+fna+"&edad="+ed+"&lugarnac="+lna+"&estado="+esta+"&domi="+dom+"&cedulapadre="+cepa+"&nombrepadre="+nopad+"&apellidopadre="+appad+"&cedulamadre="+cema+"&nombremadre="+nomad+"&apellidomadre="+apmad+"&filiacion="+fili+"&cedulaesp="+cesp+"&nombreesp="+noesp+"&apellidoesp="+apesp+"&fechanacesp="+fnaesp+"&edadesp="+edesp+"&lugarnacesp="+lnaesp+"&estadoesp="+estaesp+"&domiesp="+domesp+"&cedulamadreesp="+cemaesp+"&nombremadreesp="+nomadesp+"&apellidomadreesp="+apmadesp+"&filiacionesp="+filiesp+"&cedpadrino="+cedpadri+"&nombpadrino="+nompadri+"&apepadrino="+apepadri+"&cedmadrina="+cedmadri+"&nombmadrina="+nommadri+"&apemadrina="+apemadri+"&proclamas="+pro+"&dispensas="+dis+"&ministro="+minis+"&otrom="+ominis+"&fecham="+fmatri+"&sacram="+sac+"&observaciones="+obs+"&cod="+code+"&opc="+15;
        }
        function rellenoesp(cmesp,c,no,ap,fna,ed,lna,esta,dom,cepa,nopad,appad,cema,nomad,apmad,fili,cesp,noesp,apesp,fnaesp,edesp,lnaesp,estaesp,domesp,cepaesp,nopadesp,appadesp,filiesp,cedpadri,nompadri,apepadri,cedmadri,nommadri,apemadri,pro,dis,minis,ominis,fmatri,sac,obs,code) 
        {
          document.location.href="../php/identificarmadre.php?cedulamadreesp="+cmesp+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&fechanac="+fna+"&edad="+ed+"&lugarnac="+lna+"&estado="+esta+"&domi="+dom+"&cedulapadre="+cepa+"&nombrepadre="+nopad+"&apellidopadre="+appad+"&cedulamadre="+cema+"&nombremadre="+nomad+"&apellidomadre="+apmad+"&filiacion="+fili+"&cedulaesp="+cesp+"&nombreesp="+noesp+"&apellidoesp="+apesp+"&fechanacesp="+fnaesp+"&edadesp="+edesp+"&lugarnacesp="+lnaesp+"&estadoesp="+estaesp+"&domiesp="+domesp+"&cedulapadreesp="+cepaesp+"&nombrepadreesp="+nopadesp+"&apellidopadreesp="+appadesp+"&filiacionesp="+filiesp+"&cedpadrino="+cedpadri+"&nombpadrino="+nompadri+"&apepadrino="+apepadri+"&cedmadrina="+cedmadri+"&nombmadrina="+nommadri+"&apemadrina="+apemadri+"&proclamas="+pro+"&dispensas="+dis+"&ministro="+minis+"&otrom="+ominis+"&fecham="+fmatri+"&sacram="+sac+"&observaciones="+obs+"&cod="+code+"&opc="+15;
        }
        function autollenado(cpadri,c,no,ap,fna,ed,lna,esta,dom,cepa,nopad,appad,cema,nomad,apmad,fili,cesp,noesp,apesp,fnaesp,edesp,lnaesp,estaesp,domesp,cepaesp,nopadesp,appadesp,cemaesp,nomadesp,apmadesp,filiesp,cedmadri,nommadri,apemadri,pro,dis,minis,ominis,fmatri,sac,obs,code) 
        {
          document.location.href="../php/identificarpadrino.php?cedpadrino="+cpadri+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&fechanac="+fna+"&edad="+ed+"&lugarnac="+lna+"&estado="+esta+"&domi="+dom+"&cedulapadre="+cepa+"&nombrepadre="+nopad+"&apellidopadre="+appad+"&cedulamadre="+cema+"&nombremadre="+nomad+"&apellidomadre="+apmad+"&filiacion="+fili+"&cedulaesp="+cesp+"&nombreesp="+noesp+"&apellidoesp="+apesp+"&fechanacesp="+fnaesp+"&edadesp="+edesp+"&lugarnacesp="+lnaesp+"&estadoesp="+estaesp+"&domiesp="+domesp+"&cedulapadreesp="+cepaesp+"&nombrepadreesp="+nopadesp+"&apellidopadreesp="+appadesp+"&cedulamadreesp="+cemaesp+"&nombremadreesp="+nomadesp+"&apellidomadreesp="+apmadesp+"&filiacionesp="+filiesp+"&cedmadrina="+cedmadri+"&nombmadrina="+nommadri+"&apemadrina="+apemadri+"&proclamas="+pro+"&dispensas="+dis+"&ministro="+minis+"&otrom="+ominis+"&fecham="+fmatri+"&sacram="+sac+"&observaciones="+obs+"&cod="+code+"&opc="+14;
        }
        function autorelleno(cmadri,c,no,ap,fna,ed,lna,esta,dom,cepa,nopad,appad,cema,nomad,apmad,fili,cesp,noesp,apesp,fnaesp,edesp,lnaesp,estaesp,domesp,cepaesp,nopadesp,appadesp,cemaesp,nomadesp,apmadesp,filiesp,cedpadri,nompadri,apepadri,pro,dis,minis,ominis,fmatri,sac,obs,code) 
        {
          document.location.href="../php/identificarmadrina.php?cedmadrina="+cmadri+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&fechanac="+fna+"&edad="+ed+"&lugarnac="+lna+"&estado="+esta+"&domi="+dom+"&cedulapadre="+cepa+"&nombrepadre="+nopad+"&apellidopadre="+appad+"&cedulamadre="+cema+"&nombremadre="+nomad+"&apellidomadre="+apmad+"&filiacion="+fili+"&cedulaesp="+cesp+"&nombreesp="+noesp+"&apellidoesp="+apesp+"&fechanacesp="+fnaesp+"&edadesp="+edesp+"&lugarnacesp="+lnaesp+"&estadoesp="+estaesp+"&domiesp="+domesp+"&cedulapadreesp="+cepaesp+"&nombrepadreesp="+nopadesp+"&apellidopadreesp="+appadesp+"&cedulamadreesp="+cemaesp+"&nombremadreesp="+nomadesp+"&apellidomadreesp="+apmadesp+"&filiacionesp="+filiesp+"&cedpadrino="+cedpadri+"&nombpadrino="+nompadri+"&apepadrino="+apepadri+"&proclamas="+pro+"&dispensas="+dis+"&ministro="+minis+"&otrom="+ominis+"&fecham="+fmatri+"&sacram="+sac+"&observaciones="+obs+"&cod="+code+"&opc="+14;
        }
        </script>
      </head>
      <body>
        <div id="contenedor-prin" class="container">
          <div class="row">
            <div id="cabecera" class="col-sm-13">
              <img class="img-responsive" src="../images/cabecera.png">
              <h3>Modificación de Matrimonio</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-1"></div>
            <div id="formulario" class="col-sm-10">
              <form name="matrimonio" class="form-horizontal" method="post" action="editar-matrimonio.php?cod=<?php echo $_GET['cod'];?>#msj">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="codigo">Código:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="codigo" value="<?php echo $_GET['cod']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-1"></div>
                    <div class="col-sm-10" id="cabecera">
                      <h3>Datos del Esposo</h3>
                    </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10 titulo">
                    <h4>Datos Personales</h4>
                  </div>
                  <div class="col-sm-1"></div>
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
                  <label class="col-sm-3 control-label" for="fechanac">* Fecha de Nacimiento:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="date" name="fechanac" id="fechanac" value="<?php echo $fechanac ?>">
                    <p class="help-block">DD/MM/AAAA</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="edad">* Edad:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="edad" id="edad" value="<?php echo $edad ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="lugarnac">* Lugar de Nacimiento:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="lugarnac" id="lugarnac" value="<?php echo $lugarnac ?>">
                  </div>
                  <label class="col-sm-2 control-label" for="estado">* Estado: </label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="estado" id="estado" value="<?php echo $estado ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="domicilio">* Domicilio: </label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="domicilio" id="domicilio" value="<?php echo $domicilio ?>">
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
                    <input class="form-control" type="text" name="cedulapadre" value="<?php echo $cedulapadre ?>" onblur="llenado(this.value,cedula.value,nombre.value,apellido.value,fechanac.value,edad.value,lugarnac.value,estado.value,domicilio.value,cedulamadre.value,nombremadre.value,apellidomadre.value,filiacion.value,cedulaesp.value,nombreesp.value,apellidoesp.value,fechanacesp.value,edadesp.value,lugarnacesp.value,estadoesp.value,domicilioesp.value,cedulapadreesp.value,nombrepadreesp.value,apellidopadreesp.value,cedulamadreesp.value,nombremadreesp.value,apellidomadreesp.value,filiacionesp.value,cedulapadrino.value,nombrepadrino.value,apellidopadrino.value,cedulamadrina.value,nombremadrina.value,apellidomadrina.value,proclamas.value,dispensas.value,ministro.value,otroministro.value,fmatrimonio.value,sacramentos.value,observaciones.value,codigo.value)">
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
                    <input class="form-control" type="text" name="cedulamadre" value="<?php echo $cedulamadre ?>" onblur="relleno(this.value,cedula.value,nombre.value,apellido.value,fechanac.value,edad.value,lugarnac.value,estado.value,domicilio.value,cedulapadre.value,nombrepadre.value,apellidopadre.value,filiacion.value,cedulaesp.value,nombreesp.value,apellidoesp.value,fechanacesp.value,edadesp.value,lugarnacesp.value,estadoesp.value,domicilioesp.value,cedulapadreesp.value,nombrepadreesp.value,apellidopadreesp.value,cedulamadreesp.value,nombremadreesp.value,apellidomadreesp.value,filiacionesp.value,cedulapadrino.value,nombrepadrino.value,apellidopadrino.value,cedulamadrina.value,nombremadrina.value,apellidomadrina.value,proclamas.value,dispensas.value,ministro.value,otroministro.value,fmatrimonio.value,sacramentos.value,observaciones.value,codigo.value)">
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
                  <label class="col-sm-9 control-label" for="filiacion">* Filiación:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="filiacion" id="filiacion" value="<?php echo($filiacion);?>">
                  </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="form-group">
                  <div class="col-sm-1"></div>
                    <div class="col-sm-10" id="cabecera">
                      <h3>Datos de la Esposa</h3>
                    </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10 titulo">
                    <h4>Datos Personales</h4>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="cedulaesp">Cédula:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="cedulaesp" value="<?php echo $cedulaesp; ?>">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="nombreesp">* Nombres:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="nombreesp" value="<?php echo $nombreesp; ?>">
                  </div>
                  <label class="col-sm-3 control-label" for="apellidoesp">* Apellidos:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellidoesp" value="<?php echo $apellidoesp; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="fechanacesp">* Fecha de Nacimiento:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="date" name="fechanacesp" id="fechanacesp" value="<?php echo $fechanacesp ?>">
                    <p class="help-block">DD/MM/AAAA</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="edadesp">* Edad:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="edadesp" id="edadesp" value="<?php echo $edadesp ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="lugarnacesp">* Lugar de Nacimiento:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="lugarnacesp" id="lugarnacesp" value="<?php echo $lugarnacesp ?>">
                  </div>
                  <label class="col-sm-2 control-label" for="estadoesp">* Estado: </label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="estadoesp" id="estadoesp" value="<?php echo $estadoesp ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="domicilioesp">* Domicilio: </label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="domicilioesp" id="domicilioesp" value="<?php echo $domicilioesp ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-10 titulo">
                    <h4 id="padresesp">Datos de los Padres</h4>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">* Cédula del Padre:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="cedulapadreesp" value="<?php echo $cedulapadreesp ?>" onblur="llenadoesp(this.value,cedula.value,nombre.value,apellido.value,fechanac.value,edad.value,lugarnac.value,estado.value,domicilio.value,cedulapadre.value,nombrepadre.value,apellidopadre.value,cedulamadre.value,nombremadre.value,apellidomadre.value,filiacion.value,cedulaesp.value,nombreesp.value,apellidoesp.value,fechanacesp.value,edadesp.value,lugarnacesp.value,estadoesp.value,domicilioesp.value,cedulamadreesp.value,nombremadreesp.value,apellidomadreesp.value,filiacionesp.value,cedulapadrino.value,nombrepadrino.value,apellidopadrino.value,cedulamadrina.value,nombremadrina.value,apellidomadrina.value,proclamas.value,dispensas.value,ministro.value,otroministro.value,fmatrimonio.value,sacramentos.value,observaciones.value,codigo.value)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="nombrepadreesp">* Nombres del Padre:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" id="nombrepadreesp" name="nombrepadreesp" value="<?php echo $nombrepadreesp ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="apellidopadreesp">* Apellidos del Padre:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellidopadreesp" value="<?php echo $apellidopadreesp ?>">
                  </div>
                </div>
                <div class="form-group">
                  <hr>
                  <label class="col-sm-3 control-label">* Cédula de la Madre:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="cedulamadreesp" value="<?php echo $cedulamadreesp ?>" onblur="rellenoesp(this.value,cedula.value,nombre.value,apellido.value,fechanac.value,edad.value,lugarnac.value,estado.value,domicilio.value,cedulapadre.value,nombrepadre.value,apellidopadre.value,cedulamadre.value,nombremadre.value,apellidomadre.value,filiacion.value,cedulaesp.value,nombreesp.value,apellidoesp.value,fechanacesp.value,edadesp.value,lugarnacesp.value,estadoesp.value,domicilioesp.value,cedulapadreesp.value,nombrepadreesp.value,apellidopadreesp.value,filiacionesp.value,cedulapadrino.value,nombrepadrino.value,apellidopadrino.value,cedulamadrina.value,nombremadrina.value,apellidomadrina.value,proclamas.value,dispensas.value,ministro.value,otroministro.value,fmatrimonio.value,sacramentos.value,observaciones.value,codigo.value)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">* Nombres de la Madre:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="nombremadreesp" value="<?php echo $nombremadreesp ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">* Apellidos de la Madre:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellidomadreesp" value="<?php echo $apellidomadreesp ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-9 control-label" for="filiacionesp">* Filiación:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="filiacionesp" id="filiacionesp" value="<?php echo $filiacionesp ?>">
                  </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="form-group">
                  <div class="col-sm-1"></div>
                    <div class="col-sm-10" id="cabecera">
                      <h3 id="padrinos">Testigos del Matrimonio</h3>
                    </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <br>
                  <br>
                  <label for="cedulapadrino" class="col-sm-3 control-label">* Cédula del Padrino: </label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" id="cedulapadrino" name="cedulapadrino" value="<?php echo($cedulapadrino);?>" onblur="autollenado(this.value,cedula.value,nombre.value,apellido.value,fechanac.value,edad.value,lugarnac.value,estado.value,domicilio.value,cedulapadre.value,nombrepadre.value,apellidopadre.value,cedulamadre.value,nombremadre.value,apellidomadre.value,filiacion.value,cedulaesp.value,nombreesp.value,apellidoesp.value,fechanacesp.value,edadesp.value,lugarnacesp.value,estadoesp.value,domicilioesp.value,cedulapadreesp.value,nombrepadreesp.value,apellidopadreesp.value,cedulamadreesp.value,nombremadreesp.value,apellidomadreesp.value,filiacionesp.value,cedulamadrina.value,nombremadrina.value,apellidomadrina.value,proclamas.value,dispensas.value,ministro.value,otroministro.value,fmatrimonio.value,sacramentos.value,observaciones.value,codigo.value)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="nombrepadrino">* Nombres del Padrino: </label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="nombrepadrino" id="nombrepadrino" value="<?php echo($nombrepadrino);?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="apellidopadrino">* Apellidos del Padrino: </label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellidopadrino" id="apellidopadrino" value="<?php echo($apellidopadrino);?>">
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label for="cedulamadrina" class="col-sm-3 control-label">* Cédula de la Madrina: </label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" id="cedulamadrina" name="cedulamadrina" value="<?php echo($cedulamadrina);?>" onblur="autorelleno(this.value,cedula.value,nombre.value,apellido.value,fechanac.value,edad.value,lugarnac.value,estado.value,domicilio.value,cedulapadre.value,nombrepadre.value,apellidopadre.value,cedulamadre.value,nombremadre.value,apellidomadre.value,filiacion.value,cedulaesp.value,nombreesp.value,apellidoesp.value,fechanacesp.value,edadesp.value,lugarnacesp.value,estadoesp.value,domicilioesp.value,cedulapadreesp.value,nombrepadreesp.value,apellidopadreesp.value,cedulamadreesp.value,nombremadreesp.value,apellidomadreesp.value,filiacionesp.value,cedulapadrino.value,nombrepadrino.value,apellidopadrino.value,proclamas.value,dispensas.value,ministro.value,otroministro.value,fmatrimonio.value,sacramentos.value,observaciones.value,codigo.value)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="nombremadrina">* Nombres de la Madrina: </label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="nombremadrina" id="nombremadrina" value="<?php echo($nombremadrina);?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="apellidomadrina">* Apellidos de la Madrina: </label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellidomadrina" id="apellidomadrina" value="<?php echo($apellidomadrina);?>">
                  </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="form-group">
                  <div class="col-sm-1"></div>
                    <div class="col-sm-10" id="cabecera">
                      <h3>Matrimonio</h3>
                    </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <br>
                  <label class="col-sm-2 control-label" for="proclamas">Proclamas:</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="proclamas" id="proclamas"><?php echo $proclamas; ?></textarea>
                  </div>
                </div>
                <div class="form-group"> 
                <br> 
                  <label class="col-sm-2 control-label" for="dispensas">Dispensas:</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="dispensas" id="dispensas"><?php echo $dispensas; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <br>
                  <label for="ministro" class="col-sm-2 control-label">* Ministro: </label>
                  <div class="col-sm-3">
                    <select class="form-control" name="ministro" id="ministro" onchange="oculta(this);">
                      <option value="" selected>Seleccione...</option>
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
                  <div class="col-sm-1"></div>
                  <span id="otromin">
                    <div class="col-sm-3">
                      <input class="form-control" id="otroministro" type="text" name="otroministro" value="<?php if($min!=0) {echo "";} else{echo $otromin;} ?>" onclick="borracampo();" onblur="restauracampo();">
                    </div>
                  </span>
                </div>
                <div class="form-group">
                  <br>
                  <label class="col-sm-2 control-label" for="fmatrimonio">* Fecha:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="date" name="fmatrimonio" id="fmatrimonio" value="<?php echo $fechamatri ?>">
                    <p class="help-block">DD/MM/AAAA</p>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="sacramentos">Sacramentos:</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="text" name="sacramentos" id="sacramentos" value="<?php echo($sacramentos);?>">
                  </div>
                </div>
                <div class="form-group">
                  <br>
                  <label class="col-sm-2 control-label" for="observaciones">Observaciones:</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="observaciones"><?php echo $observacion; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <br>
                  <div class="col-sm-10"></div>
                  <div class="col-sm-2">
                    <input type="submit" name="editmatri" class="btn btn-primary btn-lg" value="Guardar Cambios">
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
                $confirmacion=validaredicionmatri();
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
    header("location: consultar-matrimonio.php");
  }
}
else 
{
  header("Location: login.php");
}
?>