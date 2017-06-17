<?php 
include('../php/conexion.php');
session_start();
if(isset($_SESSION['usuario_nombre'])) 
{
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();

    $lugarb="";
    $otrol=""; 

    $cedula="";
    $nombre="";
    $apellido="";
    $fechanac="";
    $edad="";
    $lugarnac="";
    $estado="";
    $domicilio="";
    $cedulapadre="";
    $cedulamadre="";
    $nombrepadre="";
    $nombremadre="";
    $apellidopadre="";
    $apellidomadre="";
    $filiacion="";

    $tipobusqueda="";
    $nuevacedula="";
    $nuevocodigo="";
    $nuevonombre="";
    $nuevoapellido="";
    $nuevafechanac="";
    $nuevaedad="";
    $nuevolugarnac="";
    $nuevoestado="";
    $nuevodomicilio="";
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
    $edadnueva="";
    $lugarnacnuevo="";
    $estadonuevo="";
    $domicilionuevo="";
    $padrenuevo="";
    $madrenueva="";
    $filiacionnueva="";

    $lugarbesp="";
    $otrolesp=""; 

    $cedulaesp="";
    $nombreesp="";
    $apellidoesp="";
    $fechanacesp="";
    $edadesp="";
    $lugarnacesp="";
    $estadoesp="";
    $domicilioesp="";
    $cedulapadreesp="";
    $cedulamadreesp="";
    $nombrepadreesp="";
    $nombremadreesp="";
    $apellidopadreesp="";
    $apellidomadreesp="";
    $filiacionesp="";

    $tipobusquedaesp="";
    $nuevacedulaesp="";
    $nuevocodigoesp="";
    $nuevonombreesp="";
    $nuevoapellidoesp="";
    $nuevafechanacesp="";
    $nuevaedadesp="";
    $nuevolugarnacesp="";
    $nuevoestadoesp="";
    $nuevodomicilioesp='';
    $nuevopadreesp="";
    $nuevamadreesp="";
    $nuevafiliacionesp="";

    $nomesp="";
    $apelesp="";
    $fechnacesp="";
    $codigonuevoesp="";
    $cedulanuevaesp="";
    $nombrenuevoesp="";
    $apellidonuevoesp="";
    $fechanacnuevaesp="";
    $edadnuevaesp="";
    $lugarnacnuevoesp="";
    $estadonuevoesp="";
    $domicilionuevoesp="";
    $padrenuevoesp="";
    $madrenuevaesp="";
    $filiacionnuevaesp="";

    $cedulapadrino="";
    $cedulamadrina="";
    $nombrepadrino="";
    $nombremadrina="";
    $apellidopadrino="";
    $apellidomadrina="";

    $proclamas="";
    $dispensas="";
    $min="";
    $otromin="Otro...";
    $fechamatri="";
    $sacramentos="";
    $observacion="";


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
    if(isset($_POST['edad']))
    {
      $edad=$_POST['edad'];
    }
    if(isset($_POST['lugarnac']))
    {
      $lugarnac=$_POST['lugarnac'];
    }
    if(isset($_POST['estado']))
    {
      $estado=$_POST['estado'];
    }
    if(isset($_POST['domicilio']))
    {
      $domicilio=$_POST['domicilio'];
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
    if(isset($_POST['nueva_edad']))
    {
      $nuevaedad=$_POST['nueva_edad'];
    }
    if(isset($_POST['nuevo_lugarnac']))
    {
      $nuevolugarnac=$_POST['nuevo_lugarnac'];
    }
    if(isset($_POST['nuevo_estado']))
    {
      $nuevoestado=$_POST['nuevo_estado'];
    }
    if(isset($_POST['nuevo_domicilio']))
    {
      $nuevodomicilio=$_POST['nuevo_domicilio'];
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
    if(isset($_POST['edad_nueva']))
    {
      $edadnueva=$_POST['edad_nueva'];
    }
    if(isset($_POST['lugarnac_nuevo']))
    {
      $lugarnacnuevo=$_POST['lugarnac_nuevo'];
    }
    if(isset($_POST['estado_nuevo']))
    {
      $estadonuevo=$_POST['estado_nuevo'];
    }
    if(isset($_POST['domicilio_nuevo']))
    {
      $domicilionuevo=$_POST['domicilio_nuevo'];
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
    if(isset($_POST['fn']))
    {
      $fechanac=$_POST['fn'];
    }
    if(isset($_POST['ed']))
    {
    $edad=$_POST['ed'];
    }
    if(isset($_POST['ln']))
    {
      $lugarnac=$_POST['ln'];
    }
    if(isset($_POST['est']))
    {
      $estado=$_POST['est'];
    }
    if(isset($_POST['dom']))
    {
      $domicilio=$_POST['dom'];
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
    if(isset($_POST['edadnew']))
    {
      $edadnueva=$_POST['edadnew'];
    }
    if(isset($_POST['lnnew']))
    {
      $lugarnacnuevo=$_POST['lnnew'];
    }
    if(isset($_POST['estnew']))
    {
      $estadonuevo=$_POST['estnew'];
    }
    if(isset($_POST['domnew']))
    {
      $domicilionuevo=$_POST['domnew'];
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
    if(isset($_POST['eda']))
    {
      $nuevaedad=$_POST['eda'];
    }
    if(isset($_POST['lugarnacimiento']))
    {
      $nuevolugarnac=$_POST['lugarnacimiento'];
    }
    if(isset($_POST['estad']))
    {
      $nuevoestado=$_POST['estad'];
    }
    if(isset($_POST['domic']))
    {
      $nuevodomicilio=$_POST['domic'];
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







  if(isset($_POST['cedulaesp']))
    {
      $cedulaesp=$_POST['cedulaesp'];
    }
    if(isset($_POST['nombreesp']))
    {
      $nombreesp=$_POST['nombreesp'];
    }
    if(isset($_POST['apellidoesp']))
    {
      $apellidoesp=$_POST['apellidoesp'];
    }
    if(isset($_POST['sexoesp']))
    {
      $sexesp=$_POST['sexoesp'];
    }
    if(isset($_POST['fechanacesp']))
    {
      $fechanacesp=$_POST['fechanacesp'];
    }
    if(isset($_POST['edadesp']))
    {
      $edadesp=$_POST['edadesp'];
    }
    if(isset($_POST['lugarnacesp']))
    {
      $lugarnacesp=$_POST['lugarnacesp'];
    }
    if(isset($_POST['estadoesp']))
    {
      $estadoesp=$_POST['estadoesp'];
    }
    if(isset($_POST['domicilioesp']))
    {
      $domicilioesp=$_POST['domicilioesp'];
    }
    if(isset($_POST['cedulapadreesp']))
    {
      $cedulapadreesp=$_POST['cedulapadreesp'];
    }
    if(isset($_POST['cedulamadreesp']))
    {
      $cedulamadreesp=$_POST['cedulamadreesp'];
    }
    if(isset($_POST['nombrepadreesp']))
    {
      $nombrepadreesp=$_POST['nombrepadreesp'];
    }
    if(isset($_POST['nombremadreesp']))
    {
      $nombremadreesp=$_POST['nombremadreesp'];
    }
    if(isset($_POST['apellidopadreesp']))
    {
      $apellidopadreesp=$_POST['apellidopadreesp'];
    }
    if(isset($_POST['apellidomadreesp']))
    {
      $apellidomadreesp=$_POST['apellidomadreesp'];
    }
    if(isset($_POST['filiacionesp']))
    {
      $filiacionesp=$_POST['filiacionesp'];
    }



    if(isset($_POST['tipobusquedaesp']))
    {
      $tipobusquedaesp=$_POST['tipobusquedaesp'];
    }
    if(isset($_POST['cedulesp']))
    {
      $nuevacedulaesp=$_POST['cedulesp'];
    }
    if(isset($_POST['nuevo_codigoesp']))
    {
      $nuevocodigoesp=$_POST['nuevo_codigoesp'];
    }
    if(isset($_POST['nuevo_nombreesp']))
    {
      $nuevonombreesp=$_POST['nuevo_nombreesp'];
    }
    if(isset($_POST['nuevo_apellidoesp']))
    {
      $nuevoapellidoesp=$_POST['nuevo_apellidoesp'];
    }
    if(isset($_POST['nueva_fechanacesp']))
    {
      $nuevafechanacesp=$_POST['nueva_fechanacesp'];
    }
    if(isset($_POST['nueva_edadesp']))
    {
      $nuevaedadesp=$_POST['nueva_edadesp'];
    }
    if(isset($_POST['nuevo_lugarnac']))
    {
      $nuevolugarnacesp=$_POST['nuevo_lugarnacesp'];
    }
    if(isset($_POST['nuevo_estadoesp']))
    {
      $nuevoestadoesp=$_POST['nuevo_estadoesp'];
    }
    if(isset($_POST['nuevo_domicilioesp']))
    {
      $nuevodomicilioesp=$_POST['nuevo_domicilioesp'];
    }
    if(isset($_POST['nuevo_padreesp']))
    {
      $nuevopadreesp=$_POST['nuevo_padreesp'];
    }
    if(isset($_POST['nueva_madreesp']))
    {
      $nuevamadreesp=$_POST['nueva_madreesp'];
    }
     if(isset($_POST['nueva_filiacionesp']))
    {
      $nuevafiliacionesp=$_POST['nueva_filiacionesp'];
    }



    if(isset($_POST['nombresp']))
    {
      $nomesp=$_POST['nombresp'];
    }
    if(isset($_POST['apelliesp']))
    {
      $apelesp=$_POST['apelliesp'];
    }
    if(isset($_POST['fenacesp']))
    {
      $fechnacesp=$_POST['fenacesp'];
    }
    if(isset($_POST['codesp']))
    {
      $codigonuevoesp=$_POST['codesp'];
    }
    if(isset($_POST['nueva_cedesp']))
    {
      $cedulanuevaesp=$_POST['nueva_cedesp'];
    }
    if(isset($_POST['nombre_nuevoesp']))
    {
      $nombrenuevoesp=$_POST['nombre_nuevoesp'];
    }
    if(isset($_POST['apellido_nuevoesp']))
    {
      $apellidonuevoesp=$_POST['apellido_nuevoesp'];
    }
    if(isset($_POST['fechanac_nuevaesp']))
    {
      $fechanacnuevaesp=$_POST['fechanac_nuevaesp'];
    }
    if(isset($_POST['edad_nuevaesp']))
    {
      $edadnuevaesp=$_POST['edad_nuevaesp'];
    }
    if(isset($_POST['lugarnac_nuevoesp']))
    {
      $lugarnacnuevoesp=$_POST['lugarnac_nuevoesp'];
    }
    if(isset($_POST['estado_nuevoesp']))
    {
      $estadonuevoesp=$_POST['estado_nuevoesp'];
    }
    if(isset($_POST['domicilio_nuevoesp']))
    {
      $domicilionuevoesp=$_POST['domicilio_nuevoesp'];
    }
    if(isset($_POST['padre_nuevoesp']))
    {
      $padrenuevoesp=$_POST['padre_nuevoesp'];
    }
    if(isset($_POST['madre_nuevaesp']))
    {
      $madrenuevaesp=$_POST['madre_nuevaesp'];
    }
     if(isset($_POST['filiacion_nuevaesp']))
    {
      $filiacionnuevaesp=$_POST['filiacion_nuevaesp'];
    }













    if(isset($_POST['lugarbauesp']))
    {
      $lugarbesp=$_POST['lugarbauesp'];
    }
    if(isset($_POST['otrolugarbauesp']))
    {
      $otrolesp=$_POST['otrolugarbauesp'];
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
      $edadesp=$_POST['edesp'];
    }
    if(isset($_POST['lnesp']))
    {
      $lugarnacesp=$_POST['lnesp'];
    }
    if(isset($_POST['estesp']))
    {
      $estadoesp=$_POST['estesp'];
    }
    if(isset($_POST['domesp']))
    {
      $domicilioesp=$_POST['domesp'];
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

    if(isset($_POST['noesp']))
    {
      $nomesp=$_POST['noesp'];
    }
    if(isset($_POST['apelliesp']))
    {
      $apeesp=$_POST['apelliesp'];
    }
    if(isset($_POST['fecnaciesp']))
    {
      $fnesp=$_POST['fecnaciesp'];
    }
    if(isset($_POST['codigesp']))
    {
      $codigonuevoesp=$_POST['codigesp'];
    }
    if(isset($_POST['newcedesp']))
    {
      $cedulanuevaesp=$_POST['newcedesp'];
    }
    if(isset($_POST['nomnewesp']))
    {
      $nombrenuevoesp=$_POST['nomnewesp'];
    }
    if(isset($_POST['apenewesp']))
    {
      $apellidonuevoesp=$_POST['apenewesp'];
    }
    if(isset($_POST['fnnewesp']))
    {
      $fechanacnuevaesp=$_POST['fnnewesp'];
    }
    if(isset($_POST['edadnewesp']))
    {
      $edadnuevaesp=$_POST['edadnewesp'];
    }
    if(isset($_POST['lnnewesp']))
    {
      $lugarnacnuevoesp=$_POST['lnnewesp'];
    }
    if(isset($_POST['estnewesp']))
    {
      $estadonuevoesp=$_POST['estnewesp'];
    }
    if(isset($_POST['domnewesp']))
    {
      $domicilionuevoesp=$_POST['domnewesp'];
    }
    if(isset($_POST['padnewesp']))
    {
      $padrenuevoesp=$_POST['padnewesp'];
    }
    if(isset($_POST['madnewesp']))
    {
      $madrenuevaesp=$_POST['madnewesp'];
    }
    if(isset($_POST['filinewesp']))
    {
      $filiacionnuevaesp=$_POST['filinewesp'];
    }


    if(isset($_POST['tipbusqesp']))
    {
      $tipobusquedaesp=$_POST['tipbusqesp'];
    }
    if(isset($_POST['nombesp']))
    {
      $nuevacedulaesp=$_POST['ceduesp'];
    }
    if(isset($_POST['codiesp']))
    {
      $nuevocodigoesp=$_POST['codiesp'];
    }
    if(isset($_POST['nombesp']))
    {
      $nuevonombreesp=$_POST['nombesp'];
    }
    if(isset($_POST['apellesp']))
    {
      $nuevoapellidoesp=$_POST['apellesp'];
    }
    if(isset($_POST['fechanacimientoesp']))
    {
      $nuevafechanacesp=$_POST['fechanacimientoesp'];
    }
    if(isset($_POST['edaesp']))
    {
      $nuevaedadesp=$_POST['edaesp'];
    }
    if(isset($_POST['lugarnacimientoesp']))
    {
      $nuevolugarnacesp=$_POST['lugarnacimientoesp'];
    }
    if(isset($_POST['estadesp']))
    {
      $nuevoestadoesp=$_POST['estadesp'];
    }
    if(isset($_POST['domicesp']))
    {
      $nuevodomicilioesp=$_POST['domicesp'];
    }
    if(isset($_POST['padesp']))
    {
      $nuevopadreesp=$_POST['padesp'];
    }
    if(isset($_POST['madesp']))
    {
      $nuevamadreesp=$_POST['madesp'];
    }
     if(isset($_POST['filesp']))
    {
      $nuevafiliacionesp=$_POST['filesp'];
    }


    if(isset($_POST['cedulapadrino']))
    {
      $cedulapadrino=$_POST['cedulapadrino'];
    }
    if(isset($_POST['cedulamadrina']))
    {
      $cedulamadrina=$_POST['cedulamadrina'];
    }
    if(isset($_POST['nombrepadrino']))
    {
      $nombrepadrino=$_POST['nombrepadrino'];
    }
    if(isset($_POST['nombremadrina']))
    {
      $nombremadrina=$_POST['nombremadrina'];
    }
    if(isset($_POST['apellidopadrino']))
    {
      $apellidopadrino=$_POST['apellidopadrino'];
    }
    if(isset($_POST['apellidomadrina']))
    {
      $apellidomadrina=$_POST['apellidomadrina'];
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



    if(isset($_POST['proclamas']))
    {
      $proclamas=$_POST['proclamas'];
    }
    if(isset($_POST['dispensas']))
    {
      $dispensas=$_POST['dispensas'];
    }
    if(isset($_POST['ministro']))
    {
      $min=$_POST['ministro'];
    }
    if(isset($_POST['otromininistro']))
    {
      $otromin=$_POST['otromininistro'];
    }
    if(isset($_POST['fmatrimonio']))
    {
      $fechamatri=$_POST['fmatrimonio'];
    }
    if(isset($_POST['sacramentos']))
    {
      $sacramentos=$_POST['sacramentos'];
    }
    if(isset($_POST['observaciones']))
    {
      $observacion=$_POST['observaciones'];
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
      function rellenar(c,l,o,lesp,oesp,cesp,nesp,aesp,fesp,eesp,lnacesp,estesp,desp,cpesp,cmesp,npesp,nmesp,apesp,amesp,filiesp,tbesp,cedesp,nuecodesp,nuenesp,nueaesp,nuefesp,nueeesp,nuelnesp,nueestesp,nuedesp,nuepadesp,nuemadesp,nuefilesp,nomesp,apeesp,fnesp,codesp,nuecesp,nnueesp,anueesp,fnueesp,enueesp,lnnueesp,estnueesp,dnueesp,padnueesp,madnueesp,filnueesp) 
      {
        document.location.href="../php/identificarpersona.php?cedula="+c+"&lugbau="+l+"&otrolug="+o+"&lugbauesp="+lesp+"&otrolugesp="+oesp+"&cedulaesp="+cesp+"&nombreesp="+nesp+"&apellidoesp="+aesp+"&fechanacesp="+fesp+"&edadesp="+eesp+"&lugarnacesp="+lnacesp+"&estadoesp="+estesp+"&domiesp="+desp+"&cedulapadreesp="+cpesp+"&cedulamadreesp="+cmesp+"&nombrepadreesp="+npesp+"&nombremadreesp="+nmesp+"&apellidopadreesp="+apesp+"&apellidomadreesp="+amesp+"&filiacionesp="+filiesp+"&tipobusquedaesp="+tbesp+"&cedesp="+cedesp+"&nuevocodigoesp="+nuecodesp+"&nuevonombreesp="+nuenesp+"&nuevoapellidoesp="+nueaesp+"&nuevafechanacesp="+nuefesp+"&nuevaedadesp="+nueeesp+"&nuevolugarnacesp="+nuelnesp+"&nuevoestadoesp="+nueestesp+"&nuevodomicilioesp="+nuedesp+"&nuevopadreesp="+nuepadesp+"&nuevamadreesp="+nuemadesp+"&nuevafiliacionesp="+nuefilesp+"&nomesp="+nomesp+"&apeesp="+apeesp+"&fnesp="+fnesp+"&codesp="+codesp+"&nuevacedesp="+nuecesp+"&nombrenuevoesp="+nnueesp+"&apellidonuevoesp="+anueesp+"&fechanacnuevaesp="+fnueesp+"&edadnuevaesp="+enueesp+"&lugarnacnuevoesp="+lnnueesp+"&estadonuevoesp="+estnueesp+"&domicilionuevoesp="+dnueesp+"&padrenuevoesp="+padnueesp+"&madrenuevaesp="+madnueesp+"&filiacionnuevaesp="+filnueesp+"&opc="+4;
      }
      function llenado(cp,l,o,c,no,ap,fna,ed,lna,esta,dom,cema,nomad,apmad,lesp,oesp,cesp,nesp,aesp,fesp,eesp,lnacesp,estesp,desp,cpesp,cmesp,npesp,nmesp,apesp,amesp,filiesp,tbesp,cedesp,nuecodesp,nuenesp,nueaesp,nuefesp,nueeesp,nuelnesp,nueestesp,nuedesp,nuepadesp,nuemadesp,nuefilesp,nomesp,apeesp,fnesp,codesp,nuecesp,nnueesp,anueesp,fnueesp,enueesp,lnnueesp,estnueesp,dnueesp,padnueesp,madnueesp,filnueesp) 
      {
        document.location.href="../php/identificarpadre.php?cedulapadre="+cp+"&lugbau="+l+"&otrolug="+o+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&fechanac="+fna+"&edad="+ed+"&lugarnac="+lna+"&estado="+esta+"&domi="+dom+"&cedulamadre="+cema+"&nombremadre="+nomad+"&apellidomadre="+apmad+"&lugbauesp="+lesp+"&otrolugesp="+oesp+"&cedulaesp="+cesp+"&nombreesp="+nesp+"&apellidoesp="+aesp+"&fechanacesp="+fesp+"&edadesp="+eesp+"&lugarnacesp="+lnacesp+"&estadoesp="+estesp+"&domiesp="+desp+"&cedulapadreesp="+cpesp+"&cedulamadreesp="+cmesp+"&nombrepadreesp="+npesp+"&nombremadreesp="+nmesp+"&apellidopadreesp="+apesp+"&apellidomadreesp="+amesp+"&filiacionesp="+filiesp+"&tipobusquedaesp="+tbesp+"&cedesp="+cedesp+"&nuevocodigoesp="+nuecodesp+"&nuevonombreesp="+nuenesp+"&nuevoapellidoesp="+nueaesp+"&nuevafechanacesp="+nuefesp+"&nuevaedadesp="+nueeesp+"&nuevolugarnacesp="+nuelnesp+"&nuevoestadoesp="+nueestesp+"&nuevodomicilioesp="+nuedesp+"&nuevopadreesp="+nuepadesp+"&nuevamadreesp="+nuemadesp+"&nuevafiliacionesp="+nuefilesp+"&nomesp="+nomesp+"&apeesp="+apeesp+"&fnesp="+fnesp+"&codesp="+codesp+"&nuevacedesp="+nuecesp+"&nombrenuevoesp="+nnueesp+"&apellidonuevoesp="+anueesp+"&fechanacnuevaesp="+fnueesp+"&edadnuevaesp="+enueesp+"&lugarnacnuevoesp="+lnnueesp+"&estadonuevoesp="+estnueesp+"&domicilionuevoesp="+dnueesp+"&padrenuevoesp="+padnueesp+"&madrenuevaesp="+madnueesp+"&filiacionnuevaesp="+filnueesp+"&opc="+4;
      }
      function relleno(cm,l,o,c,no,ap,fna,ed,lna,esta,dom,cepa,nopad,appad,lesp,oesp,cesp,nesp,aesp,fesp,eesp,lnacesp,estesp,desp,cpesp,cmesp,npesp,nmesp,apesp,amesp,filiesp,tbesp,cedesp,nuecodesp,nuenesp,nueaesp,nuefesp,nueeesp,nuelnesp,nueestesp,nuedesp,nuepadesp,nuemadesp,nuefilesp,nomesp,apeesp,fnesp,codesp,nuecesp,nnueesp,anueesp,fnueesp,enueesp,lnnueesp,estnueesp,dnueesp,padnueesp,madnueesp,filnueesp) 
      {
        document.location.href="../php/identificarmadre.php?cedulamadre="+cm+"&lugbau="+l+"&otrolug="+o+"&cedula="+c+"&nombre="+no+"&apellido="+ap+"&fechanac="+fna+"&edad="+ed+"&lugarnac="+lna+"&estado="+esta+"&domi="+dom+"&cedulapadre="+cepa+"&nombrepadre="+nopad+"&apellidopadre="+appad+"&lugbauesp="+lesp+"&otrolugesp="+oesp+"&cedulaesp="+cesp+"&nombreesp="+nesp+"&apellidoesp="+aesp+"&fechanacesp="+fesp+"&edadesp="+eesp+"&lugarnacesp="+lnacesp+"&estadoesp="+estesp+"&domiesp="+desp+"&cedulapadreesp="+cpesp+"&cedulamadreesp="+cmesp+"&nombrepadreesp="+npesp+"&nombremadreesp="+nmesp+"&apellidopadreesp="+apesp+"&apellidomadreesp="+amesp+"&filiacionesp="+filiesp+"&tipobusquedaesp="+tbesp+"&cedesp="+cedesp+"&nuevocodigoesp="+nuecodesp+"&nuevonombreesp="+nuenesp+"&nuevoapellidoesp="+nueaesp+"&nuevafechanacesp="+nuefesp+"&nuevaedadesp="+nueeesp+"&nuevolugarnacesp="+nuelnesp+"&nuevoestadoesp="+nueestesp+"&nuevodomicilioesp="+nuedesp+"&nuevopadreesp="+nuepadesp+"&nuevamadreesp="+nuemadesp+"&nuevafiliacionesp="+nuefilesp+"&nomesp="+nomesp+"&apeesp="+apeesp+"&fnesp="+fnesp+"&codesp="+codesp+"&nuevacedesp="+nuecesp+"&nombrenuevoesp="+nnueesp+"&apellidonuevoesp="+anueesp+"&fechanacnuevaesp="+fnueesp+"&edadnuevaesp="+enueesp+"&lugarnacnuevoesp="+lnnueesp+"&estadonuevoesp="+estnueesp+"&domicilionuevoesp="+dnueesp+"&padrenuevoesp="+padnueesp+"&madrenuevaesp="+madnueesp+"&filiacionnuevaesp="+filnueesp+"&opc="+4;
      }
      function buscarced(ce,lu,tb,lesp,oesp,cesp,nesp,aesp,fesp,eesp,lnacesp,estesp,desp,cpesp,cmesp,npesp,nmesp,apesp,amesp,filiesp,tbesp,cedesp,nuecodesp,nuenesp,nueaesp,nuefesp,nueeesp,nuelnesp,nueestesp,nuedesp,nuepadesp,nuemadesp,nuefilesp,nomesp,apeesp,fnesp,codesp,nuecesp,nnueesp,anueesp,fnueesp,enueesp,lnnueesp,estnueesp,dnueesp,padnueesp,madnueesp,filnueesp) 
      {
        document.location.href="../php/identificarpersona.php?cedula="+ce+"&lugbau="+lu+"&tipobusq="+tb+"&lugbauesp="+lesp+"&otrolugesp="+oesp+"&cedulaesp="+cesp+"&nombreesp="+nesp+"&apellidoesp="+aesp+"&fechanacesp="+fesp+"&edadesp="+eesp+"&lugarnacesp="+lnacesp+"&estadoesp="+estesp+"&domiesp="+desp+"&cedulapadreesp="+cpesp+"&cedulamadreesp="+cmesp+"&nombrepadreesp="+npesp+"&nombremadreesp="+nmesp+"&apellidopadreesp="+apesp+"&apellidomadreesp="+amesp+"&filiacionesp="+filiesp+"&tipobusquedaesp="+tbesp+"&cedesp="+cedesp+"&nuevocodigoesp="+nuecodesp+"&nuevonombreesp="+nuenesp+"&nuevoapellidoesp="+nueaesp+"&nuevafechanacesp="+nuefesp+"&nuevaedadesp="+nueeesp+"&nuevolugarnacesp="+nuelnesp+"&nuevoestadoesp="+nueestesp+"&nuevodomicilioesp="+nuedesp+"&nuevopadreesp="+nuepadesp+"&nuevamadreesp="+nuemadesp+"&nuevafiliacionesp="+nuefilesp+"&nomesp="+nomesp+"&apeesp="+apeesp+"&fnesp="+fnesp+"&codesp="+codesp+"&nuevacedesp="+nuecesp+"&nombrenuevoesp="+nnueesp+"&apellidonuevoesp="+anueesp+"&fechanacnuevaesp="+fnueesp+"&edadnuevaesp="+enueesp+"&lugarnacnuevoesp="+lnnueesp+"&estadonuevoesp="+estnueesp+"&domicilionuevoesp="+dnueesp+"&padrenuevoesp="+padnueesp+"&madrenuevaesp="+madnueesp+"&filiacionnuevaesp="+filnueesp+"&opc="+5;
      }

      function rellenaresp(cesp,lesp,oesp,l,o,c,n,a,f,e,lnac,est,d,cp,cm,np,nm,ap,am,fili,tb,ced,nuecod,nuen,nuea,nuef,nuee,nueln,nueest,nued,nuepad,nuemad,nuefil,nom,ape,fn,cod,nuec,nnue,anue,fnue,enue,lnnue,estnue,dnue,padnue,madnue,filnue) 
      {
        document.location.href="../php/identificaresposa.php?cedulaesp="+cesp+"&lugbauesp="+lesp+"&otrolugesp="+oesp+"&lugbau="+l+"&otrolug="+o+"&cedula="+c+"&nombre="+n+"&apellido="+a+"&fechanac="+f+"&edad="+e+"&lugarnac="+lnac+"&estado="+est+"&domi="+d+"&cedulapadre="+cp+"&cedulamadre="+cm+"&nombrepadre="+np+"&nombremadre="+nm+"&apellidopadre="+ap+"&apellidomadre="+am+"&filiacion="+fili+"&tipobusqueda="+tb+"&ced="+ced+"&nuevocodigo="+nuecod+"&nuevonombre="+nuen+"&nuevoapellido="+nuea+"&nuevafechanac="+nuef+"&nuevaedad="+nuee+"&nuevolugarnac="+nueln+"&nuevoestado="+nueest+"&nuevodomicilio="+nued+"&nuevopadre="+nuepad+"&nuevamadre="+nuemad+"&nuevafiliacion="+nuefil+"&nom="+nom+"&ape="+ape+"&fn="+fn+"&cod="+cod+"&nuevaced="+nuec+"&nombrenuevo="+nnue+"&apellidonuevo="+anue+"&fechanacnueva="+fnue+"&edadnueva="+enue+"&lugarnacnuevo="+lnnue+"&estadonuevo="+estnue+"&domicilionuevo="+dnue+"&padrenuevo="+padnue+"&madrenueva="+madnue+"&filiacionnueva="+filnue+"&opc="+6;
      }
      function llenadoesp(cpesp,lesp,oesp,cesp,noesp,apesp,fnaesp,edesp,lnaesp,estaesp,domesp,cemaesp,nomadesp,apmadesp,l,o,c,n,a,f,e,lnac,est,d,cp,cm,np,nm,ap,am,fili,tb,ced,nuecod,nuen,nuea,nuef,nuee,nueln,nueest,nued,nuepad,nuemad,nuefil,nom,ape,fn,cod,nuec,nnue,anue,fnue,enue,lnnue,estnue,dnue,padnue,madnue,filnue) 
      {
        document.location.href="../php/identificarpadre.php?cedulapadreesp="+cpesp+"&lugbauesp="+lesp+"&otrolugesp="+oesp+"&cedulaesp="+cesp+"&nombreesp="+noesp+"&apellidoesp="+apesp+"&fechanacesp="+fnaesp+"&edadesp="+edesp+"&lugarnacesp="+lnaesp+"&estadoesp="+estaesp+"&domiesp="+domesp+"&cedulamadreesp="+cemaesp+"&nombremadreesp="+nomadesp+"&apellidomadreesp="+apmadesp+"&lugbau="+l+"&otrolug="+o+"&cedula="+c+"&nombre="+n+"&apellido="+a+"&fechanac="+f+"&edad="+e+"&lugarnac="+lnac+"&estado="+est+"&domi="+d+"&cedulapadre="+cp+"&cedulamadre="+cm+"&nombrepadre="+np+"&nombremadre="+nm+"&apellidopadre="+ap+"&apellidomadre="+am+"&filiacion="+fili+"&tipobusqueda="+tb+"&ced="+ced+"&nuevocodigo="+nuecod+"&nuevonombre="+nuen+"&nuevoapellido="+nuea+"&nuevafechanac="+nuef+"&nuevaedad="+nuee+"&nuevolugarnac="+nueln+"&nuevoestado="+nueest+"&nuevodomicilio="+nued+"&nuevopadre="+nuepad+"&nuevamadre="+nuemad+"&nuevafiliacion="+nuefil+"&nom="+nom+"&ape="+ape+"&fn="+fn+"&cod="+cod+"&nuevaced="+nuec+"&nombrenuevo="+nnue+"&apellidonuevo="+anue+"&fechanacnueva="+fnue+"&edadnueva="+enue+"&lugarnacnuevo="+lnnue+"&estadonuevo="+estnue+"&domicilionuevo="+dnue+"&padrenuevo="+padnue+"&madrenueva="+madnue+"&filiacionnueva="+filnue+"&opc="+6;
      }
      function rellenoesp(cmesp,lesp,oesp,cesp,noesp,apesp,fnaesp,edesp,lnaesp,estaesp,domesp,cepaesp,nopadesp,appadesp,l,o,c,n,a,f,e,lnac,est,d,cp,cm,np,nm,ap,am,fili,tb,ced,nuecod,nuen,nuea,nuef,nuee,nueln,nueest,nued,nuepad,nuemad,nuefil,nom,ape,fn,cod,nuec,nnue,anue,fnue,enue,lnnue,estnue,dnue,padnue,madnue,filnue) 
      {
        document.location.href="../php/identificarmadre.php?cedulamadreesp="+cmesp+"&lugbauesp="+lesp+"&otrolugesp="+oesp+"&cedulaesp="+cesp+"&nombreesp="+noesp+"&apellidoesp="+apesp+"&fechanacesp="+fnaesp+"&edadesp="+edesp+"&lugarnacesp="+lnaesp+"&estadoesp="+estaesp+"&domiesp="+domesp+"&cedulapadreesp="+cepaesp+"&nombrepadreesp="+nopadesp+"&apellidopadreesp="+appadesp+"&lugbau="+l+"&otrolug="+o+"&cedula="+c+"&nombre="+n+"&apellido="+a+"&fechanac="+f+"&edad="+e+"&lugarnac="+lnac+"&estado="+est+"&domi="+d+"&cedulapadre="+cp+"&cedulamadre="+cm+"&nombrepadre="+np+"&nombremadre="+nm+"&apellidopadre="+ap+"&apellidomadre="+am+"&filiacion="+fili+"&tipobusqueda="+tb+"&ced="+ced+"&nuevocodigo="+nuecod+"&nuevonombre="+nuen+"&nuevoapellido="+nuea+"&nuevafechanac="+nuef+"&nuevaedad="+nuee+"&nuevolugarnac="+nueln+"&nuevoestado="+nueest+"&nuevodomicilio="+nued+"&nuevopadre="+nuepad+"&nuevamadre="+nuemad+"&nuevafiliacion="+nuefil+"&nom="+nom+"&ape="+ape+"&fn="+fn+"&cod="+cod+"&nuevaced="+nuec+"&nombrenuevo="+nnue+"&apellidonuevo="+anue+"&fechanacnueva="+fnue+"&edadnueva="+enue+"&lugarnacnuevo="+lnnue+"&estadonuevo="+estnue+"&domicilionuevo="+dnue+"&padrenuevo="+padnue+"&madrenueva="+madnue+"&filiacionnueva="+filnue+"&opc="+6;
      }
      function buscarcedesp(ceesp,luesp,tbesp,l,o,c,n,a,f,e,lnac,est,d,cp,cm,np,nm,ap,am,fili,tb,ced,nuecod,nuen,nuea,nuef,nuee,nueln,nueest,nued,nuepad,nuemad,nuefil,nom,ape,fn,cod,nuec,nnue,anue,fnue,enue,lnnue,estnue,dnue,padnue,madnue,filnue) 
      {
        document.location.href="../php/identificaresposa.php?cedulaesp="+ceesp+"&lugbauesp="+luesp+"&tipobusqesp="+tbesp+"&lugbau="+l+"&otrolug="+o+"&cedula="+c+"&nombre="+n+"&apellido="+a+"&fechanac="+f+"&edad="+e+"&lugarnac="+lnac+"&estado="+est+"&domi="+d+"&cedulapadre="+cp+"&cedulamadre="+cm+"&nombrepadre="+np+"&nombremadre="+nm+"&apellidopadre="+ap+"&apellidomadre="+am+"&filiacion="+fili+"&tipobusqueda="+tb+"&ced="+ced+"&nuevocodigo="+nuecod+"&nuevonombre="+nuen+"&nuevoapellido="+nuea+"&nuevafechanac="+nuef+"&nuevaedad="+nuee+"&nuevolugarnac="+nueln+"&nuevoestado="+nueest+"&nuevodomicilio="+nued+"&nuevopadre="+nuepad+"&nuevamadre="+nuemad+"&nuevafiliacion="+nuefil+"&nom="+nom+"&ape="+ape+"&fn="+fn+"&cod="+cod+"&nuevaced="+nuec+"&nombrenuevo="+nnue+"&apellidonuevo="+anue+"&fechanacnueva="+fnue+"&edadnueva="+enue+"&lugarnacnuevo="+lnnue+"&estadonuevo="+estnue+"&domicilionuevo="+dnue+"&padrenuevo="+padnue+"&madrenueva="+madnue+"&filiacionnueva="+filnue+"&opc="+7;
      }
      function llenadopad(cpad,l,o,c,n,a,f,e,lnac,est,d,cp,cm,np,nm,ap,am,fili,tb,ced,nuecod,nuen,nuea,nuef,nuee,nueln,nueest,nued,nuepad,nuemad,nuefil,nom,ape,fn,cod,nuec,nnue,anue,fnue,enue,lnnue,estnue,dnue,padnue,madnue,filnue,lesp,oesp,cesp,nesp,aesp,fesp,eesp,lnacesp,estesp,desp,cpesp,cmesp,npesp,nmesp,apesp,amesp,filiesp,tbesp,cedesp,nuecodesp,nuenesp,nueaesp,nuefesp,nueeesp,nuelnesp,nueestesp,nuedesp,nuepadesp,nuemadesp,nuefilesp,nomesp,apeesp,fnesp,codesp,nuecesp,nnueesp,anueesp,fnueesp,enueesp,lnnueesp,estnueesp,dnueesp,padnueesp,madnueesp,filnueesp,cmad,nommadri,apemadri,proc,disp,min,omin,fecmatri,sacra,obser) 
      {
        document.location.href="../php/identificarpadrino.php?cedpadrino="+cpad+"&lugbau="+l+"&otrolug="+o+"&cedula="+c+"&nombre="+n+"&apellido="+a+"&fechanac="+f+"&edad="+e+"&lugarnac="+lnac+"&estado="+est+"&domi="+d+"&cedulapadre="+cp+"&cedulamadre="+cm+"&nombrepadre="+np+"&nombremadre="+nm+"&apellidopadre="+ap+"&apellidomadre="+am+"&filiacion="+fili+"&tipobusqueda="+tb+"&ced="+ced+"&nuevocodigo="+nuecod+"&nuevonombre="+nuen+"&nuevoapellido="+nuea+"&nuevafechanac="+nuef+"&nuevaedad="+nuee+"&nuevolugarnac="+nueln+"&nuevoestado="+nueest+"&nuevodomicilio="+nued+"&nuevopadre="+nuepad+"&nuevamadre="+nuemad+"&nuevafiliacion="+nuefil+"&nom="+nom+"&ape="+ape+"&fn="+fn+"&cod="+cod+"&nuevaced="+nuec+"&nombrenuevo="+nnue+"&apellidonuevo="+anue+"&fechanacnueva="+fnue+"&edadnueva="+enue+"&lugarnacnuevo="+lnnue+"&estadonuevo="+estnue+"&domicilionuevo="+dnue+"&padrenuevo="+padnue+"&madrenueva="+madnue+"&filiacionnueva="+filnue+"&lugbauesp="+lesp+"&otrolugesp="+oesp+"&cedulaesp="+cesp+"&nombreesp="+nesp+"&apellidoesp="+aesp+"&fechanacesp="+fesp+"&edadesp="+eesp+"&lugarnacesp="+lnacesp+"&estadoesp="+estesp+"&domiesp="+desp+"&cedulapadreesp="+cpesp+"&cedulamadreesp="+cmesp+"&nombrepadreesp="+npesp+"&nombremadreesp="+nmesp+"&apellidopadreesp="+apesp+"&apellidomadreesp="+amesp+"&filiacionesp="+filiesp+"&tipobusquedaesp="+tbesp+"&cedesp="+cedesp+"&nuevocodigoesp="+nuecodesp+"&nuevonombreesp="+nuenesp+"&nuevoapellidoesp="+nueaesp+"&nuevafechanacesp="+nuefesp+"&nuevaedadesp="+nueeesp+"&nuevolugarnacesp="+nuelnesp+"&nuevoestadoesp="+nueestesp+"&nuevodomicilioesp="+nuedesp+"&nuevopadreesp="+nuepadesp+"&nuevamadreesp="+nuemadesp+"&nuevafiliacionesp="+nuefilesp+"&nomesp="+nomesp+"&apeesp="+apeesp+"&fnesp="+fnesp+"&codesp="+codesp+"&nuevacedesp="+nuecesp+"&nombrenuevoesp="+nnueesp+"&apellidonuevoesp="+anueesp+"&fechanacnuevaesp="+fnueesp+"&edadnuevaesp="+enueesp+"&lugarnacnuevoesp="+lnnueesp+"&estadonuevoesp="+estnueesp+"&domicilionuevoesp="+dnueesp+"&padrenuevoesp="+padnueesp+"&madrenuevaesp="+madnueesp+"&filiacionnuevaesp="+filnueesp+"&cedmadrina="+cmad+"&nombmadrina="+nommadri+"&apemadrina="+apemadri+"&procla="+proc+"&dispe="+disp+"&minis="+min+"&otrom="+omin+"&fecham="+fecmatri+"&sacram="+sacra+"&observaciones="+obser+"&opc="+4;
      }
      function rellenomad(cmad,l,o,c,n,a,f,e,lnac,est,d,cp,cm,np,nm,ap,am,fili,tb,ced,nuecod,nuen,nuea,nuef,nuee,nueln,nueest,nued,nuepad,nuemad,nuefil,nom,ape,fn,cod,nuec,nnue,anue,fnue,enue,lnnue,estnue,dnue,padnue,madnue,filnue,lesp,oesp,cesp,nesp,aesp,fesp,eesp,lnacesp,estesp,desp,cpesp,cmesp,npesp,nmesp,apesp,amesp,filiesp,tbesp,cedesp,nuecodesp,nuenesp,nueaesp,nuefesp,nueeesp,nuelnesp,nueestesp,nuedesp,nuepadesp,nuemadesp,nuefilesp,nomesp,apeesp,fnesp,codesp,nuecesp,nnueesp,anueesp,fnueesp,enueesp,lnnueesp,estnueesp,dnueesp,padnueesp,madnueesp,filnueesp,cpad,nompadri,apepadri,proc,disp,min,omin,fecmatri,sacra,obser) 
      {
        document.location.href="../php/identificarmadrina.php?cedmadrina="+cmad+"&lugbau="+l+"&otrolug="+o+"&cedula="+c+"&nombre="+n+"&apellido="+a+"&fechanac="+f+"&edad="+e+"&lugarnac="+lnac+"&estado="+est+"&domi="+d+"&cedulapadre="+cp+"&cedulamadre="+cm+"&nombrepadre="+np+"&nombremadre="+nm+"&apellidopadre="+ap+"&apellidomadre="+am+"&filiacion="+fili+"&tipobusqueda="+tb+"&ced="+ced+"&nuevocodigo="+nuecod+"&nuevonombre="+nuen+"&nuevoapellido="+nuea+"&nuevafechanac="+nuef+"&nuevaedad="+nuee+"&nuevolugarnac="+nueln+"&nuevoestado="+nueest+"&nuevodomicilio="+nued+"&nuevopadre="+nuepad+"&nuevamadre="+nuemad+"&nuevafiliacion="+nuefil+"&nom="+nom+"&ape="+ape+"&fn="+fn+"&cod="+cod+"&nuevaced="+nuec+"&nombrenuevo="+nnue+"&apellidonuevo="+anue+"&fechanacnueva="+fnue+"&edadnueva="+enue+"&lugarnacnuevo="+lnnue+"&estadonuevo="+estnue+"&domicilionuevo="+dnue+"&padrenuevo="+padnue+"&madrenueva="+madnue+"&filiacionnueva="+filnue+"&lugbauesp="+lesp+"&otrolugesp="+oesp+"&cedulaesp="+cesp+"&nombreesp="+nesp+"&apellidoesp="+aesp+"&fechanacesp="+fesp+"&edadesp="+eesp+"&lugarnacesp="+lnacesp+"&estadoesp="+estesp+"&domiesp="+desp+"&cedulapadreesp="+cpesp+"&cedulamadreesp="+cmesp+"&nombrepadreesp="+npesp+"&nombremadreesp="+nmesp+"&apellidopadreesp="+apesp+"&apellidomadreesp="+amesp+"&filiacionesp="+filiesp+"&tipobusquedaesp="+tbesp+"&cedesp="+cedesp+"&nuevocodigoesp="+nuecodesp+"&nuevonombreesp="+nuenesp+"&nuevoapellidoesp="+nueaesp+"&nuevafechanacesp="+nuefesp+"&nuevaedadesp="+nueeesp+"&nuevolugarnacesp="+nuelnesp+"&nuevoestadoesp="+nueestesp+"&nuevodomicilioesp="+nuedesp+"&nuevopadreesp="+nuepadesp+"&nuevamadreesp="+nuemadesp+"&nuevafiliacionesp="+nuefilesp+"&nomesp="+nomesp+"&apeesp="+apeesp+"&fnesp="+fnesp+"&codesp="+codesp+"&nuevacedesp="+nuecesp+"&nombrenuevoesp="+nnueesp+"&apellidonuevoesp="+anueesp+"&fechanacnuevaesp="+fnueesp+"&edadnuevaesp="+enueesp+"&lugarnacnuevoesp="+lnnueesp+"&estadonuevoesp="+estnueesp+"&domicilionuevoesp="+dnueesp+"&padrenuevoesp="+padnueesp+"&madrenuevaesp="+madnueesp+"&filiacionnuevaesp="+filnueesp+"&cedpadrino="+cpad+"&nombpadrino="+nompadri+"&apepadrino="+apepadri+"&procla="+proc+"&dispe="+disp+"&minis="+min+"&otrom="+omin+"&fecham="+fecmatri+"&sacram="+sacra+"&observaciones="+obser+"&opc="+4;
      }
      </script>
    </head>
    <body>
      <div id="contenedor-prin" class="container">
        <div class="row">
          <div id="cabecera" class="col-sm-13">
            <img class="img-responsive" src="../images/cabecera.png">
            <h3>Registro de Matrimonio</h3>
          </div>
        </div>
        <br>
        <br>
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-10" id="formulario">
            <form name="Info_Persona" class="form-horizontal" method="post" action="registroesposo.php#msj">
              <div class="form-group">
                <div class="col-sm-1"></div>
                  <div class="col-sm-10" id="cabecera">
                    <h3>Datos del Esposo</h3>
                  </div>
                <div class="col-sm-1"></div>
              </div>
              <br>
              <div class="form-group">
                <label for="lugarbau" class="col-sm-3 control-label">* Lugar de Bautizo:</label>
                <div class="col-sm-4 radio">
                  <input  type="radio" name="lugarbau" value="LB" id="lugarbau" onclick="aparecer(this,4);" <?php if($lugarb=='LB') echo 'checked'; ?> required>La Beatriz<br>
                  <input  type="radio" name="lugarbau" value="O" id="lugarbau" onclick="aparecer(this,4);" <?php if($lugarb=='O') echo 'checked'; ?> required>Otro
                </div>

                <span id="otrolugar" style="<?php if($lugarb=='O') echo 'display: block'; else  echo 'display: none'?>">
                  <div class="col-sm-1">
                    <h5 class="help-block">* Especifíque:</h5>
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
                  <label for="cedula" class="col-sm-3 control-label">Cédula:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" id="cedula" name="cedula" value="<?php echo($cedula);?>" onblur="rellenar(this.value,lugarbau.value,otrolugarbau.value,lugarbauesp.value,otrolugarbauesp.value,cedulaesp.value,nombreesp.value,apellidoesp.value,fechanacesp.value,edadesp.value,lugarnacesp.value,estadoesp.value,domicilioesp.value,cedulapadreesp.value,cedulamadreesp.value,nombrepadreesp.value,nombremadreesp.value,apellidopadreesp.value,apellidomadreesp.value,filiacionesp.value,tipobusquedaesp.value,cedulesp.value,nuevo_codigoesp.value,nuevo_nombreesp.value,nuevo_apellidoesp.value,nueva_fechanacesp.value,nueva_edadesp.value,nuevo_lugarnacesp.value,nuevo_estadoesp.value,nuevo_domicilioesp.value,nuevo_padreesp.value,nueva_madreesp.value,nueva_filiacionesp.value,nombresp.value,apelliesp.value,fenacesp.value,codesp.value,nueva_cedesp.value,nombre_nuevoesp.value,apellido_nuevoesp.value,fechanac_nuevaesp.value,edad_nuevaesp.value,lugarnac_nuevoesp.value,estado_nuevoesp.value,domicilio_nuevoesp.value,padre_nuevoesp.value,madre_nuevaesp.value,filiacion_nuevaesp.value)">
                  </div>
                  <div class="col-sm-2">
                    <div id="mensaje"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="nombre">* Nombres:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo($nombre);?>">
                  </div>
                  <label class="col-sm-2 control-label" for="apellido">* Apellidos:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellido" id="apellido" value="<?php echo($apellido);?>">
                  </div>
                </div>
                <div class="form-group" style='display: none'>
                  <label for="sexo" class="col-sm-2 control-label">Sexo:</label>
                  <div class="col-sm-2 radio">
                    <input  type="radio" name="sexo" value="" id="sex" <?php if($sex=="") echo 'checked'; ?> style="display: none">
                    <input  type="radio" name="sexo" value="M" id="sex1" <?php if($sex=="M") echo 'checked'; ?>>Masculino<br>
                    <input  type="radio" name="sexo" value="F" id="sex2" <?php if($sex=="F") echo 'checked'; ?> >Femenino
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="fechanac">Fecha de Nacimiento:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="date" name="fechanac" id="fechanac" value="<?php echo($fechanac);?>">
                    <p class="help-block">DD/MM/AAAA</p>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="edad">* Edad:</label>
                  <div class="col-sm-1">
                    <input class="form-control" type="text" name="edad" id="edad" value="<?php echo($edad);?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="lugarnac">* Natural de:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="lugarnac" id="lugarnac" value="<?php echo($lugarnac);?>">
                  </div>
                  <label class="col-sm-2 control-label" for="estado">* Estado:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="estado" id="estado" value="<?php echo($estado);?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="domicilio">* Domicilio:</label>
                  <div class="col-sm-4">
                    <input class="form-control" type="text" name="domicilio" id="domicilio" value="<?php echo($domicilio);?>">
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
                    <input class="form-control" type="text" id="cedulapadre" name="cedulapadre" value="<?php echo($cedulapadre);?>" onblur="llenado(this.value,lugarbau.value,otrolugarbau.value,cedula.value,nombre.value,apellido.value,fechanac.value,edad.value,lugarnac.value,estado.value,domicilio.value,cedulamadre.value,nombremadre.value,apellidomadre.value,lugarbauesp.value,otrolugarbauesp.value,cedulaesp.value,nombreesp.value,apellidoesp.value,fechanacesp.value,edadesp.value,lugarnacesp.value,estadoesp.value,domicilioesp.value,cedulapadreesp.value,cedulamadreesp.value,nombrepadreesp.value,nombremadreesp.value,apellidopadreesp.value,apellidomadreesp.value,filiacionesp.value,tipobusquedaesp.value,cedulesp.value,nuevo_codigoesp.value,nuevo_nombreesp.value,nuevo_apellidoesp.value,nueva_fechanacesp.value,nueva_edadesp.value,nuevo_lugarnacesp.value,nuevo_estadoesp.value,nuevo_domicilioesp.value,nuevo_padreesp.value,nueva_madreesp.value,nueva_filiacionesp.value,nombresp.value,apelliesp.value,fenacesp.value,codesp.value,nueva_cedesp.value,nombre_nuevoesp.value,apellido_nuevoesp.value,fechanac_nuevaesp.value,edad_nuevaesp.value,lugarnac_nuevoesp.value,estado_nuevoesp.value,domicilio_nuevoesp.value,padre_nuevoesp.value,madre_nuevaesp.value,filiacion_nuevaesp.value)">
                  </div>
                  <label for="cedulamadre" class="col-sm-4 control-label">* Cédula de la Madre:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" id="cedulamadre" name="cedulamadre" value="<?php echo($cedulamadre);?>" onblur="relleno(this.value,lugarbau.value,otrolugarbau.value,cedula.value,nombre.value,apellido.value,fechanac.value,edad.value,lugarnac.value,estado.value,domicilio.value,cedulapadre.value,nombrepadre.value,apellidopadre.value,lugarbauesp.value,otrolugarbauesp.value,cedulaesp.value,nombreesp.value,apellidoesp.value,fechanacesp.value,edadesp.value,lugarnacesp.value,estadoesp.value,domicilioesp.value,cedulapadreesp.value,cedulamadreesp.value,nombrepadreesp.value,nombremadreesp.value,apellidopadreesp.value,apellidomadreesp.value,filiacionesp.value,tipobusquedaesp.value,cedulesp.value,nuevo_codigoesp.value,nuevo_nombreesp.value,nuevo_apellidoesp.value,nueva_fechanacesp.value,nueva_edadesp.value,nuevo_lugarnacesp.value,nuevo_estadoesp.value,nuevo_domicilioesp.value,nuevo_padreesp.value,nueva_madreesp.value,nueva_filiacionesp.value,nombresp.value,apelliesp.value,fenacesp.value,codesp.value,nueva_cedesp.value,nombre_nuevoesp.value,apellido_nuevoesp.value,fechanac_nuevaesp.value,edad_nuevaesp.value,lugarnac_nuevoesp.value,estado_nuevoesp.value,domicilio_nuevoesp.value,padre_nuevoesp.value,madre_nuevaesp.value,filiacion_nuevaesp.value)">
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
                <br>
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
                      <h4 id="buscar">Buscar Persona</h4>
                    </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tipobusqueda">* Tipo de Búsqueda:</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="tipobusqueda" id="tipobusqueda" onchange="tipo_busqueda(this,4);">
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
                      <input class="btn btn-primary" id="buscarporced" type="button" name="buscarporced" value="Buscar" onclick="buscarced(cedul.value,lugarbau.value,tipobusqueda.value,lugarbauesp.value,otrolugarbauesp.value,cedulaesp.value,nombreesp.value,apellidoesp.value,fechanacesp.value,edadesp.value,lugarnacesp.value,estadoesp.value,domicilioesp.value,cedulapadreesp.value,cedulamadreesp.value,nombrepadreesp.value,nombremadreesp.value,apellidopadreesp.value,apellidomadreesp.value,filiacionesp.value,tipobusquedaesp.value,cedulesp.value,nuevo_codigoesp.value,nuevo_nombreesp.value,nuevo_apellidoesp.value,nueva_fechanacesp.value,nueva_edadesp.value,nuevo_lugarnacesp.value,nuevo_estadoesp.value,nuevo_domicilioesp.value,nuevo_padreesp.value,nueva_madreesp.value,nueva_filiacionesp.value,nombresp.value,apelliesp.value,fenacesp.value,codesp.value,nueva_cedesp.value,nombre_nuevoesp.value,apellido_nuevoesp.value,fechanac_nuevaesp.value,edad_nuevaesp.value,lugarnac_nuevoesp.value,estado_nuevoesp.value,domicilio_nuevoesp.value,padre_nuevoesp.value,madre_nuevaesp.value,filiacion_nuevaesp.value)" disabled>
                    </div>
                  </div>
                  <br>
                  <div class="form-group" id="nuevocodigo" style="<?php if($nuevocodigo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-3 control-label" for="nuevo_codigo">Código:</label>
                    <div class="col-sm-2">
                      <input class="form-control" type="text" name="nuevo_codigo" id="nuevo_codigo" value="<?php echo $nuevocodigo; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="nuevonombre" style="<?php if($nuevocodigo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-2 control-label" for="nuevo_nombre">Nombres:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="nuevo_nombre" id="nuevo_nombre" value="<?php echo($nuevonombre);?>" readonly>
                    </div>
                    <label class="col-sm-3 control-label" for="nuevo_apellido">Apellidos:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="nuevo_apellido" id="nuevo_apellido" value="<?php echo($nuevoapellido);?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="nuevafechanac" style="<?php if($nuevocodigo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label for="nueva_fechanac" class="col-sm-3 control-label">Fecha de Nacimiento:</label>
                    <div class="col-sm-3"> 
                      <input type="text" class="form-control" id="nueva_fechanac" name="nueva_fechanac" value="<?php echo($nuevafechanac);?>" readonly>
                    </div>
                    <br>
                    <div class="col-sm-12">
                      <p class="help-block" align="center">Ingrese los datos restantes</p>
                    </div>
                  </div>
                  <div class="form-group" id="nuevaedad" style="<?php if($nuevocodigo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label for="nueva_edad" class="col-sm-2 control-label">* Edad:</label>
                    <div class="col-sm-1"> 
                      <input type="text" class="form-control" id="nueva_edad" name="nueva_edad" value="<?php echo($nuevaedad);?>">
                    </div>
                  </div>
                  <div class="form-group" id="nuevolugarnac" style="<?php if($nuevocodigo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-2 control-label" for="nuevo_lugarnac">* Natural de:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="nuevo_lugarnac" id="nuevo_lugarnac" value="<?php echo($nuevolugarnac);?>">
                    </div>
                    <label class="col-sm-2 control-label" for="nuevo_estado">* Estado:</label>
                    <div class="col-sm-2">
                      <input class="form-control" type="text" name="nuevo_estado" id="nuevo_estado" value="<?php echo($nuevoestado);?>">
                    </div>
                  </div>
                  <div class="form-group" id="nuevodomicilio" style="<?php if($nuevocodigo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-2 control-label" for="nuevo_domicilio">* Domicilio:</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" name="nuevo_domicilio" id="nuevo_domicilio" value="<?php echo($nuevodomicilio);?>">
                    </div>
                  </div>
                  <div class="form-group" id="padre" style="<?php if($nuevocodigo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-8 control-label" for="padre">Padre:</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" name="nuevo_padre" id="nuevo_padre" value="<?php echo $nuevopadre; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="madre" style="<?php if($nuevocodigo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-8 control-label" for="madre">Madre:</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" name="nueva_madre" id="nueva_madre" value="<?php echo $nuevamadre; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="fili" style="<?php if($nuevocodigo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-8 control-label" for="filiac">Filiación:</label>
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
                      <input class="btn btn-primary" id="buscarpornom" type="button" name="buscarpornom" value="Buscar" onclick="mostrarInfo(nombr.value,apelli.value,fenac.value,4)" disabled="true">
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
                  <div class="form-group" id="cedulanueva" style="<?php if($codigonuevo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label for="nueva_ced" class="col-sm-2 control-label">Cédula:</label>
                    <div class="col-sm-2"> 
                      <input type="text" class="form-control" id="nueva_ced" name="nueva_ced" value="<?php echo $cedulanueva ?>">
                    </div>
                    <p class="help-block">Ingrese cédula en caso de que aún no se haya registrado</p>
                  </div>
                  <br>
                  <br>
                  <div class="form-group" id="nombrenuevo" style="<?php if($codigonuevo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label for="nueva_ced" class="col-sm-2 control-label">Nombre:</label>
                    <div class="col-sm-3"> 
                      <input type="text" class="form-control" id="nombre_nuevo" name="nombre_nuevo" value="<?php echo $nombrenuevo ?>" readonly>
                    </div>
                    <label for="apellido_nuevo" class="col-sm-3 control-label">Apellido:</label>
                    <div class="col-sm-3"> 
                      <input type="text" class="form-control" id="apellido_nuevo" name="apellido_nuevo" value="<?php echo $apellidonuevo ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="fechanacnueva" style="<?php if($codigonuevo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label for="fechanac_nueva" class="col-sm-3 control-label">Fecha de Nacimiento:</label>
                    <div class="col-sm-3"> 
                      <input type="text" class="form-control" id="fechanac_nueva" name="fechanac_nueva" value="<?php echo $fechanacnueva ?>" readonly>
                    </div>
                    <br>
                    <div class="col-sm-12">
                      <p class="help-block" align="center">Ingrese los datos restantes</p>
                    </div>
                  </div>
                  <div class="form-group" id="edadnueva" style="<?php if($codigonuevo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label for="edad_nueva" class="col-sm-2 control-label">* Edad:</label>
                    <div class="col-sm-1"> 
                      <input type="text" class="form-control" id="edad_nueva" name="edad_nueva" value="<?php echo $edadnueva ?>">
                    </div>
                  </div>
                  <div class="form-group" id="lugarnacnuevo" style="<?php if($codigonuevo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-2 control-label" for="lugarnac_nuevo">* Natural de:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="lugarnac_nuevo" id="lugarnac_nuevo" value="<?php echo $lugarnacnuevo ?>">
                    </div>
                    <label class="col-sm-2 control-label" for="estado_nuevo">* Estado:</label>
                    <div class="col-sm-2">
                      <input class="form-control" type="text" name="estado_nuevo" id="estado_nuevo" value="<?php echo $estadonuevo ?>">
                    </div>
                  </div>
                  <div class="form-group" id="domicilionuevo" style="<?php if($codigonuevo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-2 control-label" for="domicilio_nuevo">* Domicilio:</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" name="domicilio_nuevo" id="domicilio_nuevo" value="<?php echo $domicilionuevo ?>">
                    </div>
                  </div>
                  <div class="form-group" id="padrenuevo" style="<?php if($codigonuevo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-8 control-label" for="padre_nuevo">Padre:</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" name="padre_nuevo" id="padre_nuevo" value="<?php echo $padrenuevo ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="madrenueva" style="<?php if($codigonuevo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-8 control-label" for="madrenueva">Madre:</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" name="madre_nueva" id="madre_nueva" value="<?php echo $madrenueva ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="filinueva" style="<?php if($codigonuevo!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-8 control-label" for="filiacion_nueva">Filiación:</label>
                    <div class="col-sm-2">
                      <input class="form-control" type="text" name="filiacion_nueva" id="filiacion_nueva" value="<?php echo $filiacionnueva ?>">
                    </div>
                  </div>
                </span>
              </span>
              










              <br>
              <br>
              <br>
              <hr>
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
              <br>
              <div class="form-group">
                <label for="lugarbauesp" class="col-sm-3 control-label">* Lugar de Bautizo:</label>
                <div class="col-sm-4 radio">
                  <input  type="radio" name="lugarbauesp" value="LB" id="lugarbauesp" onclick="apareceresp(this);" <?php if($lugarbesp=='LB') echo 'checked'; ?> required>La Beatriz<br>
                  <input  type="radio" name="lugarbauesp" value="O" id="lugarbauesp" onclick="apareceresp(this);" <?php if($lugarbesp=='O') echo 'checked'; ?> required>Otro
                </div>

                <span id="otrolugaresp" style="<?php if($lugarbesp=='O') echo 'display: block'; else  echo 'display: none'?>">
                  <div class="col-sm-1">
                    <h5 class="help-block">* Especifíque:</h5>
                  </div>
                  <div class="col-sm-3">
                    <input class="form-control" id="otrolugarbauesp" type="text" name="otrolugarbauesp" value="<?php echo $otrolesp ?>">
                  </div>
                </span>
              </div>
              <br>
              <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 text-help">Si el Lugar de Bautizo es La Beatriz, obligatoriamente los datos personales ya están registrados en la base de datos, por lo tanto no será necesaro ingresarlos de nuevo</div>
              </div>

              <span id="DatosPersonalesesp" style="<?php if($lugarbesp=='O') echo 'display: block'; else  echo 'display: none'?>">
                <div class="form-group">
                  <div class="col-sm-1"></div>
                    <div class="col-sm-10 titulo">
                      <h4 id="personaesp">Datos Personales</h4>
                    </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <label for="cedulaesp" class="col-sm-3 control-label">Cédula:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" id="cedulaesp" name="cedulaesp" value="<?php echo($cedulaesp);?>" onblur="rellenaresp(this.value,lugarbauesp.value,otrolugarbauesp.value,lugarbau.value,otrolugarbau.value,cedula.value,nombre.value,apellido.value,fechanac.value,edad.value,lugarnac.value,estado.value,domicilio.value,cedulapadre.value,cedulamadre.value,nombrepadre.value,nombremadre.value,apellidopadre.value,apellidomadre.value,filiacion.value,tipobusqueda.value,cedul.value,nuevo_codigo.value,nuevo_nombre.value,nuevo_apellido.value,nueva_fechanac.value,nueva_edad.value,nuevo_lugarnac.value,nuevo_estado.value,nuevo_domicilio.value,nuevo_padre.value,nueva_madre.value,nueva_filiacion.value,nombr.value,apelli.value,fenac.value,cod.value,nueva_ced.value,nombre_nuevo.value,apellido_nuevo.value,fechanac_nueva.value,edad_nueva.value,lugarnac_nuevo.value,estado_nuevo.value,domicilio_nuevo.value,padre_nuevo.value,madre_nueva.value,filiacion_nueva.value)">
                  </div>
                  <div class="col-sm-2">
                    <div id="mensajeesp"></div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="nombreesp">* Nombres:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="nombreesp" id="nombreesp" value="<?php echo($nombreesp);?>">
                  </div>
                  <label class="col-sm-2 control-label" for="apellidoesp">* Apellidos:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellidoesp" id="apellidoesp" value="<?php echo($apellidoesp);?>">
                  </div>
                </div>
                <div class="form-group" style='display: none'>
                  <label for="sexoesp" class="col-sm-2 control-label">Sexo:</label>
                  <div class="col-sm-2 radio">
                    <input  type="radio" name="sexoesp" value="" id="sexesp" <?php if($sexesp=="") echo 'checked'; ?> style="display: none">
                    <input  type="radio" name="sexoesp" value="M" id="sex1esp" <?php if($sexesp=="M") echo 'checked'; ?>>Masculino<br>
                    <input  type="radio" name="sexoesp" value="F" id="sex2esp" <?php if($sexesp=="F") echo 'checked'; ?> >Femenino
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="fechanacesp">Fecha de Nacimiento:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="date" name="fechanacesp" id="fechanacesp" value="<?php echo($fechanacesp);?>">
                    <p class="help-block">DD/MM/AAAA</p>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="edadesp">* Edad:</label>
                  <div class="col-sm-1">
                    <input class="form-control" type="text" name="edadesp" id="edadesp" value="<?php echo($edadesp);?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="lugarnacesp">* Natural de:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="lugarnacesp" id="lugarnacesp" value="<?php echo($lugarnacesp);?>">
                  </div>
                  <label class="col-sm-2 control-label" for="estadoesp">* Estado:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="estadoesp" id="estadoesp" value="<?php echo($estadoesp);?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="domicilioesp">* Domicilio:</label>
                  <div class="col-sm-4">
                    <input class="form-control" type="text" name="domicilioesp" id="domicilioesp" value="<?php echo($domicilioesp);?>">
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
                  <label for="cedulapadreesp" class="col-sm-3 control-label">* Cédula del Padre:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" id="cedulapadreesp" name="cedulapadreesp" value="<?php echo($cedulapadreesp);?>" onblur="llenadoesp(this.value,lugarbauesp.value,otrolugarbauesp.value,cedulaesp.value,nombreesp.value,apellidoesp.value,fechanacesp.value,edadesp.value,lugarnacesp.value,estadoesp.value,domicilioesp.value,cedulamadreesp.value,nombremadreesp.value,apellidomadreesp.value,lugarbau.value,otrolugarbau.value,cedula.value,nombre.value,apellido.value,fechanac.value,edad.value,lugarnac.value,estado.value,domicilio.value,cedulapadre.value,cedulamadre.value,nombrepadre.value,nombremadre.value,apellidopadre.value,apellidomadre.value,filiacion.value,tipobusqueda.value,cedul.value,nuevo_codigo.value,nuevo_nombre.value,nuevo_apellido.value,nueva_fechanac.value,nueva_edad.value,nuevo_lugarnac.value,nuevo_estado.value,nuevo_domicilio.value,nuevo_padre.value,nueva_madre.value,nueva_filiacion.value,nombr.value,apelli.value,fenac.value,cod.value,nueva_ced.value,nombre_nuevo.value,apellido_nuevo.value,fechanac_nueva.value,edad_nueva.value,lugarnac_nuevo.value,estado_nuevo.value,domicilio_nuevo.value,padre_nuevo.value,madre_nueva.value,filiacion_nueva.value)">
                  </div>
                  <label for="cedulamadreesp" class="col-sm-4 control-label">* Cédula de la Madre:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" id="cedulamadreesp" name="cedulamadreesp" value="<?php echo($cedulamadreesp);?>" onblur="rellenoesp(this.value,lugarbauesp.value,otrolugarbauesp.value,cedulaesp.value,nombreesp.value,apellidoesp.value,fechanacesp.value,edadesp.value,lugarnacesp.value,estadoesp.value,domicilioesp.value,cedulapadreesp.value,nombrepadreesp.value,apellidopadreesp.value,lugarbau.value,otrolugarbau.value,cedula.value,nombre.value,apellido.value,fechanac.value,edad.value,lugarnac.value,estado.value,domicilio.value,cedulapadre.value,cedulamadre.value,nombrepadre.value,nombremadre.value,apellidopadre.value,apellidomadre.value,filiacion.value,tipobusqueda.value,cedul.value,nuevo_codigo.value,nuevo_nombre.value,nuevo_apellido.value,nueva_fechanac.value,nueva_edad.value,nuevo_lugarnac.value,nuevo_estado.value,nuevo_domicilio.value,nuevo_padre.value,nueva_madre.value,nueva_filiacion.value,nombr.value,apelli.value,fenac.value,cod.value,nueva_ced.value,nombre_nuevo.value,apellido_nuevo.value,fechanac_nueva.value,edad_nueva.value,lugarnac_nuevo.value,estado_nuevo.value,domicilio_nuevo.value,padre_nuevo.value,madre_nueva.value,filiacion_nueva.value)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="nombrepadreesp">* Nombres del Padre:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="nombrepadreesp" id="nombrepadreesp" value="<?php echo($nombrepadreesp);?>">
                  </div>
                  <label class="col-sm-3 control-label" for="nombremadreesp">* Nombres de la Madre:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="nombremadreesp" id="nombremadreesp" value="<?php echo($nombremadreesp);?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="apellidopadreesp">* Apellidos del Padre:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellidopadreesp" id="apellidopadreesp" value="<?php echo($apellidopadreesp);?>">
                  </div>
                  <label class="col-sm-3 control-label" for="apellidomadreesp">* Apellidos de la Madre:</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="apellidomadreesp" id="apellidomadreesp" value="<?php echo($apellidomadreesp);?>">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-sm-9 control-label" for="filiacionesp">* Filiación:</label>
                  <div class="col-sm-2">
                    <input class="form-control" type="text" name="filiacionesp" id="filiacionesp" value="<?php echo($filiacionesp);?>">
                  </div>
                </div>
              </span>
                
              <span id="BuscarPersonaesp" style="<?php if($lugarbesp=='LB') echo 'display: block'; else  echo 'display: none'?>">
                <div class="form-group">
                  <div class="col-sm-1"></div>
                    <div class="col-sm-10 titulo">
                      <h4 id="buscaresp">Buscar Persona</h4>
                    </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label" for="tipobusquedaesp">* Tipo de Búsqueda:</label>
                  <div class="col-sm-4">
                    <select class="form-control" name="tipobusquedaesp" id="tipobusquedaesp" onchange="tipo_busquedaesp(this);">
                      <option value="0" <?php if($tipobusquedaesp=='') echo 'selected'; ?>>Seleccione...</option>
                      <option value="1" <?php if($tipobusquedaesp=='1') echo 'selected'; ?>>Por Cédula</option>
                      <option value="2" <?php if($tipobusquedaesp=='2') echo 'selected'; ?>>Por Nombre, Apellido y Fecha de Nacimiento</option>
                    </select>
                  </div>
                </div>
                <br>
                <span id="busquedaporcedesp" style="<?php if($tipobusquedaesp==1) echo 'display: block'; else  echo 'display: none'?>">
                  <div class="form-group">
                    <label for="cedulesp" class="col-sm-2 control-label">* Cédula:</label>
                    <div class="col-sm-2">
                      <input class="form-control" id="cedulesp" type="text" name="cedulesp" value="<?php echo($nuevacedulaesp);?>">
                    </div>
                    <div class="col-sm-2">
                      <input class="btn btn-primary" id="buscarporcedesp" type="button" name="buscarporcedesp" value="Buscar" onclick="buscarcedesp(cedulesp.value,lugarbauesp.value,tipobusquedaesp.value,lugarbau.value,otrolugarbau.value,cedula.value,nombre.value,apellido.value,fechanac.value,edad.value,lugarnac.value,estado.value,domicilio.value,cedulapadre.value,cedulamadre.value,nombrepadre.value,nombremadre.value,apellidopadre.value,apellidomadre.value,filiacion.value,tipobusqueda.value,cedul.value,nuevo_codigo.value,nuevo_nombre.value,nuevo_apellido.value,nueva_fechanac.value,nueva_edad.value,nuevo_lugarnac.value,nuevo_estado.value,nuevo_domicilio.value,nuevo_padre.value,nueva_madre.value,nueva_filiacion.value,nombr.value,apelli.value,fenac.value,cod.value,nueva_ced.value,nombre_nuevo.value,apellido_nuevo.value,fechanac_nueva.value,edad_nueva.value,lugarnac_nuevo.value,estado_nuevo.value,domicilio_nuevo.value,padre_nuevo.value,madre_nueva.value,filiacion_nueva.value)" disabled>
                    </div>
                  </div>
                  <br>
                  <div class="form-group" id="nuevocodigoesp" style="<?php if($nuevocodigoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-3 control-label" for="nuevo_codigoesp">Código:</label>
                    <div class="col-sm-2">
                      <input class="form-control" type="text" name="nuevo_codigoesp" id="nuevo_codigoesp" value="<?php echo $nuevocodigoesp; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="nuevonombreesp" style="<?php if($nuevocodigoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-2 control-label" for="nuevo_nombreesp">Nombres:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="nuevo_nombreesp" id="nuevo_nombreesp" value="<?php echo($nuevonombreesp);?>" readonly>
                    </div>
                    <label class="col-sm-3 control-label" for="nuevo_apellidoesp">Apellidos:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="nuevo_apellidoesp" id="nuevo_apellidoesp" value="<?php echo($nuevoapellidoesp);?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="nuevafechanacesp" style="<?php if($nuevocodigoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label for="nueva_fechanacesp" class="col-sm-3 control-label">Fecha de Nacimiento:</label>
                    <div class="col-sm-3"> 
                      <input type="text" class="form-control" id="nueva_fechanacesp" name="nueva_fechanacesp" value="<?php echo($nuevafechanacesp);?>" readonly>
                    </div>
                    <br>
                    <div class="col-sm-12">
                      <p class="help-block" align="center">Ingrese los datos restantes</p>
                    </div>
                  </div>
                  <div class="form-group" id="nuevaedadesp" style="<?php if($nuevocodigoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label for="nueva_edadesp" class="col-sm-2 control-label">* Edad:</label>
                    <div class="col-sm-1"> 
                      <input type="text" class="form-control" id="nueva_edadesp" name="nueva_edadesp" value="<?php echo($nuevaedadesp);?>">
                    </div>
                  </div>
                  <div class="form-group" id="nuevolugarnacesp" style="<?php if($nuevocodigoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-2 control-label" for="nuevo_lugarnacesp">* Natural de:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="nuevo_lugarnacesp" id="nuevo_lugarnacesp" value="<?php echo($nuevolugarnacesp);?>">
                    </div>
                    <label class="col-sm-2 control-label" for="nuevo_estadoesp">* Estado:</label>
                    <div class="col-sm-2">
                      <input class="form-control" type="text" name="nuevo_estadoesp" id="nuevo_estadoesp" value="<?php echo($nuevoestadoesp);?>">
                    </div>
                  </div>
                  <div class="form-group" id="nuevodomicilioesp" style="<?php if($nuevocodigoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-2 control-label" for="nuevo_domicilioesp">* Domicilio:</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" name="nuevo_domicilioesp" id="nuevo_domicilioesp" value="<?php echo($nuevodomicilioesp);?>">
                    </div>
                  </div>
                  <div class="form-group" id="padreesp" style="<?php if($nuevocodigoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-8 control-label" for="padreesp">Padre:</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" name="nuevo_padreesp" id="nuevo_padreesp" value="<?php echo $nuevopadreesp; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="madreesp" style="<?php if($nuevocodigoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-8 control-label" for="madreesp">Madre:</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" name="nueva_madreesp" id="nueva_madreesp" value="<?php echo $nuevamadreesp; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="filiesp" style="<?php if($nuevocodigoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-8 control-label" for="nueva_filiacionesp">Filiación:</label>
                    <div class="col-sm-2">
                      <input class="form-control" type="text" name="nueva_filiacionesp" id="nueva_filiacionesp" value="<?php echo $nuevafiliacionesp; ?>">
                    </div>
                  </div>
                  <br>    
                </span>
                <span id="busquedapornomesp" style="<?php if($tipobusquedaesp==2) echo 'display: block'; else  echo 'display: none'?>">
                  <div class="form-group">
                    <label for="nombresp" class="col-sm-2 control-label">* Nombres:</label>
                    <div class="col-sm-3">
                      <input class="form-control" id="nombresp" type="text" name="nombresp" value="<?php echo($nomesp);?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apelliesp" class="col-sm-2 control-label">* Apellidos:</label>
                    <div class="col-sm-3">
                      <input class="form-control" id="apelliesp" type="text" name="apelliesp" value="<?php echo($apelesp);?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="fenacesp" class="col-sm-3 control-label">Fecha de Nacimiento:</label>
                    <div class="col-sm-3">
                      <input class="form-control" id="fenacesp" type="date" name="fenacesp" value="<?php echo($fechnacesp);?>">
                    </div>
                    <div class="col-sm-3">
                      <input class="btn btn-primary" id="buscarpornomesp" type="button" name="buscarpornomesp" value="Buscar" onclick="mostrarInfoesp(nombresp.value,apelliesp.value,fenacesp.value)" disabled="true">
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <span id="tablaesp">
                      <div class="table-responsive" id="datosesp"></div>
                    </span>
                  </div>
                  <div class="form-group" id="codigoesp" style="<?php if($codigonuevoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label for="codesp" class="col-sm-2 control-label">Código:</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="codesp" name="codesp" value="<?php echo($codigonuevoesp);?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="cedulanuevaesp" style="<?php if($codigonuevoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label for="nueva_cedesp" class="col-sm-2 control-label">Cédula:</label>
                    <div class="col-sm-2"> 
                      <input type="text" class="form-control" id="nueva_cedesp" name="nueva_cedesp" value="<?php echo($cedulanuevaesp);?>">
                    </div>
                    <p class="help-block">Ingrese cédula en caso de que aún no se haya registrado</p>
                  </div>
                  <br>
                  <br>
                  <div class="form-group" id="nombrenuevoesp" style="<?php if($codigonuevoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label for="nueva_cedesp" class="col-sm-2 control-label">Nombre:</label>
                    <div class="col-sm-3"> 
                      <input type="text" class="form-control" id="nombre_nuevoesp" name="nombre_nuevoesp" value="<?php echo($nombrenuevoesp);?>" readonly>
                    </div>
                    <label for="apellido_nuevoesp" class="col-sm-3 control-label">Apellido:</label>
                    <div class="col-sm-3"> 
                      <input type="text" class="form-control" id="apellido_nuevoesp" name="apellido_nuevoesp" value="<?php echo($apellidonuevoesp);?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="fechanacnuevaesp" style="<?php if($codigonuevoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label for="fechanac_nuevaesp" class="col-sm-3 control-label">Fecha de Nacimiento:</label>
                    <div class="col-sm-3"> 
                      <input type="text" class="form-control" id="fechanac_nuevaesp" name="fechanac_nuevaesp" value="<?php echo($fechanacnuevaesp);?>" readonly>
                    </div>
                    <br>
                    <div class="col-sm-12">
                      <p class="help-block" align="center">Ingrese los datos restantes</p>
                    </div>
                  </div>
                  <div class="form-group" id="edadnuevaesp" style="<?php if($codigonuevoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label for="edad_nuevaesp" class="col-sm-2 control-label">* Edad:</label>
                    <div class="col-sm-1"> 
                      <input type="text" class="form-control" id="edad_nuevaesp" name="edad_nuevaesp" value="<?php echo($edadnuevaesp);?>">
                    </div>
                  </div>
                  <div class="form-group" id="lugarnacnuevoesp" style="<?php if($codigonuevoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-2 control-label" for="lugarnac_nuevoesp">* Natural de:</label>
                    <div class="col-sm-3">
                      <input class="form-control" type="text" name="lugarnac_nuevoesp" id="lugarnac_nuevoesp" value="<?php echo($lugarnacnuevoesp);?>">
                    </div>
                    <label class="col-sm-2 control-label" for="estado_nuevoesp">* Estado:</label>
                    <div class="col-sm-2">
                      <input class="form-control" type="text" name="estado_nuevoesp" id="estado_nuevoesp" value="<?php echo($estadonuevoesp);?>">
                    </div>
                  </div>
                  <div class="form-group" id="domicilionuevoesp" style="<?php if($codigonuevoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-2 control-label" for="domicilio_nuevoesp">* Domicilio:</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" name="domicilio_nuevoesp" id="domicilio_nuevoesp" value="<?php echo($domicilionuevoesp);?>">
                    </div>
                  </div>
                  <div class="form-group" id="padrenuevoesp" style="<?php if($codigonuevoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-8 control-label" for="padre_nuevoesp">Padre:</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" name="padre_nuevoesp" id="padre_nuevoesp" value="<?php echo($padrenuevoesp);?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="madrenuevaesp" style="<?php if($codigonuevoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-8 control-label" for="madrenuevaesp">Madre:</label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" name="madre_nuevaesp" id="madre_nuevaesp" value="<?php echo($madrenuevaesp);?>" readonly>
                    </div>
                  </div>
                  <div class="form-group" id="filinuevaesp" style="<?php if($codigonuevoesp!='') echo 'display: block'; else  echo 'display: none'?>">
                    <label class="col-sm-8 control-label" for="filiacion_nuevaesp">Filiación:</label>
                    <div class="col-sm-2">
                      <input class="form-control" type="text" name="filiacion_nuevaesp" id="filiacion_nuevaesp" value="<?php echo($filiacionnuevaesp);?>">
                    </div>
                  </div>
                </span>
              </span>
              







              <br>
              <br>
              <br>
              <hr>
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
              <br>
              <div class="form-group">
                <label for="cedulapadrino" class="col-sm-3 control-label">* Cédula del Padrino:</label>
                <div class="col-sm-2">
                  <input class="form-control" type="text" id="cedulapadrino" name="cedulapadrino" value="<?php echo($cedulapadrino);?>" onblur="llenadopad(this.value,lugarbau.value,otrolugarbau.value,cedula.value,nombre.value,apellido.value,fechanac.value,edad.value,lugarnac.value,estado.value,domicilio.value,cedulapadre.value,cedulamadre.value,nombrepadre.value,nombremadre.value,apellidopadre.value,apellidomadre.value,filiacion.value,tipobusqueda.value,cedul.value,nuevo_codigo.value,nuevo_nombre.value,nuevo_apellido.value,nueva_fechanac.value,nueva_edad.value,nuevo_lugarnac.value,nuevo_estado.value,nuevo_domicilio.value,nuevo_padre.value,nueva_madre.value,nueva_filiacion.value,nombr.value,apelli.value,fenac.value,cod.value,nueva_ced.value,nombre_nuevo.value,apellido_nuevo.value,fechanac_nueva.value,edad_nueva.value,lugarnac_nuevo.value,estado_nuevo.value,domicilio_nuevo.value,padre_nuevo.value,madre_nueva.value,filiacion_nueva.value,lugarbauesp.value,otrolugarbauesp.value,cedulaesp.value,nombreesp.value,apellidoesp.value,fechanacesp.value,edadesp.value,lugarnacesp.value,estadoesp.value,domicilioesp.value,cedulapadreesp.value,cedulamadreesp.value,nombrepadreesp.value,nombremadreesp.value,apellidopadreesp.value,apellidomadreesp.value,filiacionesp.value,tipobusquedaesp.value,cedulesp.value,nuevo_codigoesp.value,nuevo_nombreesp.value,nuevo_apellidoesp.value,nueva_fechanacesp.value,nueva_edadesp.value,nuevo_lugarnacesp.value,nuevo_estadoesp.value,nuevo_domicilioesp.value,nuevo_padreesp.value,nueva_madreesp.value,nueva_filiacionesp.value,nombresp.value,apelliesp.value,fenacesp.value,codesp.value,nueva_cedesp.value,nombre_nuevoesp.value,apellido_nuevoesp.value,fechanac_nuevaesp.value,edad_nuevaesp.value,lugarnac_nuevoesp.value,estado_nuevoesp.value,domicilio_nuevoesp.value,padre_nuevoesp.value,madre_nuevaesp.value,filiacion_nuevaesp.value,cedulamadrina.value,nombremadrina.value,apellidomadrina.value,proclamas.value,dispensas.value,ministro.value,otroministro.value,fmatrimonio.value,sacramentos.value,observaciones.value)">
                </div>
                <label for="cedulamadrina" class="col-sm-4 control-label">* Cédula de la Madrina:</label>
                <div class="col-sm-2">
                  <input class="form-control" type="text" id="cedulamadrina" name="cedulamadrina" value="<?php echo($cedulamadrina);?>" onblur="rellenomad(this.value,lugarbau.value,otrolugarbau.value,cedula.value,nombre.value,apellido.value,fechanac.value,edad.value,lugarnac.value,estado.value,domicilio.value,cedulapadre.value,cedulamadre.value,nombrepadre.value,nombremadre.value,apellidopadre.value,apellidomadre.value,filiacion.value,tipobusqueda.value,cedul.value,nuevo_codigo.value,nuevo_nombre.value,nuevo_apellido.value,nueva_fechanac.value,nueva_edad.value,nuevo_lugarnac.value,nuevo_estado.value,nuevo_domicilio.value,nuevo_padre.value,nueva_madre.value,nueva_filiacion.value,nombr.value,apelli.value,fenac.value,cod.value,nueva_ced.value,nombre_nuevo.value,apellido_nuevo.value,fechanac_nueva.value,edad_nueva.value,lugarnac_nuevo.value,estado_nuevo.value,domicilio_nuevo.value,padre_nuevo.value,madre_nueva.value,filiacion_nueva.value,lugarbauesp.value,otrolugarbauesp.value,cedulaesp.value,nombreesp.value,apellidoesp.value,fechanacesp.value,edadesp.value,lugarnacesp.value,estadoesp.value,domicilioesp.value,cedulapadreesp.value,cedulamadreesp.value,nombrepadreesp.value,nombremadreesp.value,apellidopadreesp.value,apellidomadreesp.value,filiacionesp.value,tipobusquedaesp.value,cedulesp.value,nuevo_codigoesp.value,nuevo_nombreesp.value,nuevo_apellidoesp.value,nueva_fechanacesp.value,nueva_edadesp.value,nuevo_lugarnacesp.value,nuevo_estadoesp.value,nuevo_domicilioesp.value,nuevo_padreesp.value,nueva_madreesp.value,nueva_filiacionesp.value,nombresp.value,apelliesp.value,fenacesp.value,codesp.value,nueva_cedesp.value,nombre_nuevoesp.value,apellido_nuevoesp.value,fechanac_nuevaesp.value,edad_nuevaesp.value,lugarnac_nuevoesp.value,estado_nuevoesp.value,domicilio_nuevoesp.value,padre_nuevoesp.value,madre_nuevaesp.value,filiacion_nuevaesp.value,cedulapadrino.value,nombrepadrino.value,apellidopadrino.value,proclamas.value,dispensas.value,ministro.value,otroministro.value,fmatrimonio.value,sacramentos.value,observaciones.value)">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="nombrepadrino">* Nombres del Padrino:</label>
                <div class="col-sm-3">
                  <input class="form-control" type="text" name="nombrepadrino" id="nombrepadrino" value="<?php echo($nombrepadrino);?>">
                </div>
                <label class="col-sm-3 control-label" for="nombremadrina">* Nombres de la Madrina:</label>
                <div class="col-sm-3">
                  <input class="form-control" type="text" name="nombremadrina" id="nombremadrina" value="<?php echo($nombremadrina);?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-3 control-label" for="apellidopadrino">* Apellidos del Padrino:</label>
                <div class="col-sm-3">
                  <input class="form-control" type="text" name="apellidopadrino" id="apellidopadrino" value="<?php echo($apellidopadrino);?>">
                </div>
                <label class="col-sm-3 control-label" for="apellidomadrina">* Apellidos de la Madrina:</label>
                <div class="col-sm-3">
                  <input class="form-control" type="text" name="apellidomadrina" id="apellidomadrina" value="<?php echo($apellidomadrina);?>">
                </div>
              </div>
              <br>
              <br>
              <br>
              <hr>
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
                <span id="otromin" <?php if($min!=0) echo 'style="display: none"'; ?>>
                  <div class="col-sm-3">
                    <input class="form-control" id="otroministro" type="text" name="otroministro" value="<?php echo $otromin ?>" onclick="borracampo();" onblur="restauracampo();">
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
              <br>
              <span id="botones">
                <div class="form-group">
                  <br>
                  <div class="col-sm-10"></div>
                  <div class="col-sm-2">
                    <input type="submit" name="regmatri" class="btn btn-primary btn-lg" value="Registrar">
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
              $matrimonio=validacionmatri();
            ?>
          </div>
        </div>
      </div>
      <!-- Mostrar Objetos Ocultos -->
      <script src="../js/mostrar.js"></script> 
      <!-- Query (necessary for Bootstrap's JavaScript plugins) -->
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