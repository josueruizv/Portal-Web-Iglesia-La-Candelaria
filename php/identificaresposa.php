<?php
include('conexion.php');
if(isset($_GET['cedulaesp']) and (trim($_GET['cedulaesp'])!=""))
{	
	$registros=mysqli_query($conexion,"SELECT * FROM personas WHERE cedula_per=$_GET[cedulaesp]");
	if($reg=mysqli_fetch_array($registros))
	{
	?>
	 
	<form name="auxiliar" id="auxiliar" method="post" action="<?php if($_GET['opc']==6) echo '../pages/registroesposo.php#personaesp'; if($_GET['opc']==7) echo '../pages/registroesposo.php#buscaresp' ?>">
		<input type="hidden" name="lugarbau" value="<?php echo $_GET['lugbau']?>" />
		<input type="hidden" name="otrolugarbau" value="<?php echo $_GET['otrolug']?>" />
		<input type="hidden" name="ced" value="<?php echo $_GET['cedula']?>" />
		<input type="hidden" name="nom" value="<?php echo $_GET['nombre']?>" />
		<input type="hidden" name="ape" value="<?php echo $_GET['apellido']?>" />
		<input type="hidden" name="fn" value="<?php echo $_GET['fechanac']?>" />
		<input type="hidden" name="ed" value="<?php echo $_GET['edad']?>" />
		<input type="hidden" name="ln" value="<?php echo $_GET['lugarnac']?>" />
		<input type="hidden" name="est" value="<?php echo $_GET['estado']?>" />
		<input type="hidden" name="dom" value="<?php echo $_GET['domi']?>" />
		<input type="hidden" name="cedpad" value="<?php echo $_GET['cedulapadre']?>" />
		<input type="hidden" name="cedmad" value="<?php echo $_GET['cedulamadre']?>" />
		<input type="hidden" name="nompad" value="<?php echo $_GET['nombrepadre']?>" />
		<input type="hidden" name="nommad" value="<?php echo $_GET['nombremadre']?>" />
		<input type="hidden" name="apepad" value="<?php echo $_GET['apellidopadre']?>" />
		<input type="hidden" name="apemad" value="<?php echo $_GET['apellidomadre']?>" />
		<input type="hidden" name="fili" value="<?php echo $_GET['filiacion']?>" />
		<input type="hidden" name="tipbusq" value="<?php echo $_GET['tipobusqueda']?>" />
		<input type="hidden" name="cedu" value="<?php echo $_GET['ced']?>" />
		<input type="hidden" name="codi" value="<?php echo $_GET['nuevocodigo']?>" />
		<input type="hidden" name="nomb" value="<?php echo $_GET['nuevonombre']?>" />
		<input type="hidden" name="apell" value="<?php echo $_GET['nuevoapellido']?>" />
		<input type="hidden" name="fechanacimiento" value="<?php echo $_GET['nuevafechanac']?>" />
		<input type="hidden" name="eda" value="<?php echo $_GET['nuevaedad']?>" />
		<input type="hidden" name="lugarnacimiento" value="<?php echo $_GET['nuevolugarnac']?>" />
		<input type="hidden" name="estad" value="<?php echo $_GET['nuevoestado']?>" />
		<input type="hidden" name="domic" value="<?php echo $_GET['nuevodomicilio']?>" />
		<input type="hidden" name="pad" value="<?php echo $_GET['nuevopadre']?>" />
	    <input type="hidden" name="mad" value="<?php echo $_GET['nuevamadre']?>" />
	    <input type="hidden" name="fil" value="<?php echo $_GET['nuevafiliacion']?>" />
		<input type="hidden" name="no" value="<?php echo $_GET['nom']?>" />
		<input type="hidden" name="apelli" value="<?php echo $_GET['ape']?>" />
		<input type="hidden" name="fecnaci" value="<?php echo $_GET['fn']?>" />
		<input type="hidden" name="codig" value="<?php echo $_GET['cod']?>" />
		<input type="hidden" name="newced" value="<?php echo $_GET['nuevaced']?>" />
		<input type="hidden" name="nomnew" value="<?php echo $_GET['nombrenuevo']?>" />
		<input type="hidden" name="apenew" value="<?php echo $_GET['apellidonuevo']?>" />
		<input type="hidden" name="fnnew" value="<?php echo $_GET['fechanacnueva']?>" />
		<input type="hidden" name="edadnew" value="<?php echo $_GET['edadnueva']?>" />
		<input type="hidden" name="lnnew" value="<?php echo $_GET['lugarnacnuevo']?>" />
		<input type="hidden" name="estnew" value="<?php echo $_GET['estadonuevo']?>" />
		<input type="hidden" name="domnew" value="<?php echo $_GET['domicilionuevo']?>" />
		<input type="hidden" name="padnew" value="<?php echo $_GET['padrenuevo']?>" />
		<input type="hidden" name="madnew" value="<?php echo $_GET['madrenueva']?>" />
		<input type="hidden" name="filinew" value="<?php echo $_GET['filiacionnueva']?>" />

		<input type="hidden" name="lugarbauesp" value="<?php echo $_GET['lugbauesp']?>" />
	<?php
		if($_GET['opc']==6)
		{
	 ?>
		  	<input type="hidden" name="otrolugarbauesp" value="<?php echo $_GET['otrolugesp']?>" />
		    <input type="hidden" name="cedesp" value="<?php echo $_GET['cedulaesp']?>" />
		    <input type="hidden" name="nomesp" value="<?php echo $reg['nombre_per']; ?>" />
		    <input type="hidden" name="apeesp" value="<?php echo $reg['apellido_per']; ?>" />
		    <input type="hidden" name="sexesp" value="<?php echo $reg['sexo_per']; ?>" />
		    <input type="hidden" name="fnesp" value="<?php echo $reg['fechanac_per']; ?>" />
		    <input type="hidden" name="edesp" value="<?php echo $reg['edad_per']; ?>" />
		    <input type="hidden" name="lnesp" value="<?php echo $reg['lugarnac_per']; ?>" />
		    <input type="hidden" name="estesp" value="<?php echo $reg['estadodir_per']; ?>" />
		    <input type="hidden" name="domesp" value="<?php echo $reg['direccion_per']; ?>" />
		<?php
			$registrospadres=mysqli_query($conexion,"SELECT pad.cedula_pad,pad.nombre_pad,pad.apellido_pad,mad.cedula_mad,mad.nombre_mad,mad.apellido_mad, padper.filiacion FROM padre pad,madre mad,padrespersona padper WHERE padper.codigo_per='$reg[codigo_per]' AND pad.cedula_pad=padper.cedula_pad AND mad.cedula_mad=padper.cedula_mad");
			$regpadres=mysqli_fetch_array($registrospadres);
		?>
			<input type="hidden" name="cedpadesp" value="<?php echo $regpadres['cedula_pad']?>" />
		    <input type="hidden" name="nompadesp" value="<?php echo $regpadres['nombre_pad']?>" />
		    <input type="hidden" name="apepadesp" value="<?php echo $regpadres['apellido_pad']?>" />
		    <input type="hidden" name="cedmadesp" value="<?php echo $regpadres['cedula_mad']; ?>" />
		    <input type="hidden" name="nommadesp" value="<?php echo $regpadres['nombre_mad']; ?>" />
		    <input type="hidden" name="apemadesp" value="<?php echo $regpadres['apellido_mad']; ?>" />
			<input type="hidden" name="filiesp" value="<?php echo $regpadres['filiacion']; ?>" />
	 <?php
		}
		if($_GET['opc']==7)
		{
	 ?>
	 		<input type="hidden" name="tipbusqesp" value="<?php echo $_GET['tipobusqesp']?>" />
	 		<input type="hidden" name="ceduesp" value="<?php echo $_GET['cedulaesp']?>" />
	 		<input type="hidden" name="codiesp" value="<?php echo $reg['codigo_per']?>" />
		    <input type="hidden" name="nombesp" value="<?php echo $reg['nombre_per']; ?>" />
		    <input type="hidden" name="apellesp" value="<?php echo $reg['apellido_per']; ?>" />
		    <input type="hidden" name="fechanacimientoesp" value="<?php echo $reg['fechanac_per']; ?>" />
		    <input type="hidden" name="edaesp" value="<?php echo $reg['edad_per']; ?>" />
		    <input type="hidden" name="lugarnacimientoesp" value="<?php echo $reg['lugarnac_per']; ?>" />
		    <input type="hidden" name="estadesp" value="<?php echo $reg['estadodir_per']; ?>" />
		    <input type="hidden" name="domicesp" value="<?php echo $reg['direccion_per']; ?>" />
		    <?php
				$registrospadres=mysqli_query($conexion,"SELECT pad.cedula_pad,pad.nombre_pad,pad.apellido_pad,mad.cedula_mad,mad.nombre_mad,mad.apellido_mad,padper.filiacion FROM padre pad,madre mad,padrespersona padper WHERE padper.codigo_per='$reg[codigo_per]' AND pad.cedula_pad=padper.cedula_pad AND mad.cedula_mad=padper.cedula_mad");
	    		$regpadres=mysqli_fetch_array($registrospadres);
			?>
		    <input type="hidden" name="padesp" value="<?php echo $regpadres['nombre_pad'].' '.$regpadres['apellido_pad']; ?>" />
		    <input type="hidden" name="madesp" value="<?php echo $regpadres['nombre_mad'].' '.$regpadres['apellido_mad']; ?>" />
		    <input type="hidden" name="filesp" value="<?php echo $regpadres['filiacion']; ?>" />
	 <?php
		}
	 ?>
	</form>
<?php
	}
	else
	{
?>
	<form name="auxiliar" id="auxiliar" method="post" action="<?php if($_GET['opc']==6) echo '../pages/registroesposo.php#personaesp'; if($_GET['opc']==7) echo '../pages/registroesposo.php#buscaresp' ?>">
	 	<input type="hidden" name="lugarbau" value="<?php echo $_GET['lugbau']?>" />
		<input type="hidden" name="otrolugarbau" value="<?php echo $_GET['otrolug']?>" />
		<input type="hidden" name="ced" value="<?php echo $_GET['cedula']?>" />
		<input type="hidden" name="nom" value="<?php echo $_GET['nombre']?>" />
		<input type="hidden" name="ape" value="<?php echo $_GET['apellido']?>" />
		<input type="hidden" name="fn" value="<?php echo $_GET['fechanac']?>" />
		<input type="hidden" name="ed" value="<?php echo $_GET['edad']?>" />
		<input type="hidden" name="ln" value="<?php echo $_GET['lugarnac']?>" />
		<input type="hidden" name="est" value="<?php echo $_GET['estado']?>" />
		<input type="hidden" name="dom" value="<?php echo $_GET['domi']?>" />
		<input type="hidden" name="cedpad" value="<?php echo $_GET['cedulapadre']?>" />
		<input type="hidden" name="cedmad" value="<?php echo $_GET['cedulamadre']?>" />
		<input type="hidden" name="nompad" value="<?php echo $_GET['nombrepadre']?>" />
		<input type="hidden" name="nommad" value="<?php echo $_GET['nombremadre']?>" />
		<input type="hidden" name="apepad" value="<?php echo $_GET['apellidopadre']?>" />
		<input type="hidden" name="apemad" value="<?php echo $_GET['apellidomadre']?>" />
		<input type="hidden" name="fili" value="<?php echo $_GET['filiacion']?>" />
		<input type="hidden" name="tipbusq" value="<?php echo $_GET['tipobusqueda']?>" />
		<input type="hidden" name="cedu" value="<?php echo $_GET['ced']?>" />
		<input type="hidden" name="codi" value="<?php echo $_GET['nuevocodigo']?>" />
		<input type="hidden" name="nomb" value="<?php echo $_GET['nuevonombre']?>" />
		<input type="hidden" name="apell" value="<?php echo $_GET['nuevoapellido']?>" />
		<input type="hidden" name="fechanacimiento" value="<?php echo $_GET['nuevafechanac']?>" />
		<input type="hidden" name="eda" value="<?php echo $_GET['nuevaedad']?>" />
		<input type="hidden" name="lugarnacimiento" value="<?php echo $_GET['nuevolugarnac']?>" />
		<input type="hidden" name="estad" value="<?php echo $_GET['nuevoestado']?>" />
		<input type="hidden" name="domic" value="<?php echo $_GET['nuevodomicilio']?>" />
		<input type="hidden" name="pad" value="<?php echo $_GET['nuevopadre']?>" />
	    <input type="hidden" name="mad" value="<?php echo $_GET['nuevamadre']?>" />
	    <input type="hidden" name="fil" value="<?php echo $_GET['nuevafiliacion']?>" />
		<input type="hidden" name="no" value="<?php echo $_GET['nom']?>" />
		<input type="hidden" name="apelli" value="<?php echo $_GET['ape']?>" />
		<input type="hidden" name="fecnaci" value="<?php echo $_GET['fn']?>" />
		<input type="hidden" name="codig" value="<?php echo $_GET['cod']?>" />
		<input type="hidden" name="newced" value="<?php echo $_GET['nuevaced']?>" />
		<input type="hidden" name="nomnew" value="<?php echo $_GET['nombrenuevo']?>" />
		<input type="hidden" name="apenew" value="<?php echo $_GET['apellidonuevo']?>" />
		<input type="hidden" name="fnnew" value="<?php echo $_GET['fechanacnueva']?>" />
		<input type="hidden" name="edadnew" value="<?php echo $_GET['edadnueva']?>" />
		<input type="hidden" name="lnnew" value="<?php echo $_GET['lugarnacnuevo']?>" />
		<input type="hidden" name="estnew" value="<?php echo $_GET['estadonuevo']?>" />
		<input type="hidden" name="domnew" value="<?php echo $_GET['domicilionuevo']?>" />
		<input type="hidden" name="padnew" value="<?php echo $_GET['padrenuevo']?>" />
		<input type="hidden" name="madnew" value="<?php echo $_GET['madrenueva']?>" />
		<input type="hidden" name="filinew" value="<?php echo $_GET['filiacionnueva']?>" />

		<input type="hidden" name="lugarbauesp" value="<?php echo $_GET['lugbauesp']?>" />
	<?php
	if($_GET['opc']==6)
	{
	?>
		  <input type="hidden" name="otrolugarbauesp" value="<?php echo $_GET['otrolugesp']?>" />
	      <input type="hidden" name="cedesp" value="<?php echo $_GET['cedulaesp']?>" />
	      <input type="hidden" name="nomesp" value="" />
	      <input type="hidden" name="apeesp" value="" />
	      <input type="hidden" name="sexesp" value="" />
	      <input type="hidden" name="fnesp" value="" />
	      <input type="hidden" name="edesp" value="" />
	      <input type="hidden" name="lnesp" value="" />
	      <input type="hidden" name="estesp" value="" />
	      <input type="hidden" name="domesp" value="" />

		  <input type="hidden" name="cedpadesp" value="" />
	      <input type="hidden" name="nompadesp" value="" />
	      <input type="hidden" name="apepadesp" value="" />
	      <input type="hidden" name="cedmadesp" value="" />
	      <input type="hidden" name="nommadesp" value="" />
	      <input type="hidden" name="apemadesp" value="" />
	      <input type="hidden" name="filiesp" value="" />
	    <?php
		}
		if($_GET['opc']==7)
		{
	    ?>
	      <input type="hidden" name="tipbusqesp" value="" />
 		  <input type="hidden" name="ceduesp" value="" />
	      <input type="hidden" name="nombesp" value="" />
	      <input type="hidden" name="apellesp" value="" />
	      <input type="hidden" name="fechanacimientoesp" value="" />
	      <input type="hidden" name="edaesp" value="" />
	      <input type="hidden" name="lugarnacimientoesp" value="" />
	      <input type="hidden" name="estadesp" value="" />
	      <input type="hidden" name="domicesp" value="" />
	      <input type="hidden" name="padesp" value="" />
	      <input type="hidden" name="madesp" value="" />
	      <input type="hidden" name="filesp" value="" />
     <?php
		}
	 ?>
	</form>
<?php
	}
}
else
{
?>
	<form name="auxiliar" id="auxiliar" method="post" action="<?php if($_GET['opc']==6) echo '../pages/registroesposo.php#personaesp'; if($_GET['opc']==7) echo '../pages/registroesposo.php#buscaresp' ?>">
	  <input type="hidden" name="lugarbau" value="<?php echo $_GET['lugbau']?>" />
		<input type="hidden" name="otrolugarbau" value="<?php echo $_GET['otrolug']?>" />
		<input type="hidden" name="ced" value="<?php echo $_GET['cedula']?>" />
		<input type="hidden" name="nom" value="<?php echo $_GET['nombre']?>" />
		<input type="hidden" name="ape" value="<?php echo $_GET['apellido']?>" />
		<input type="hidden" name="fn" value="<?php echo $_GET['fechanac']?>" />
		<input type="hidden" name="ed" value="<?php echo $_GET['edad']?>" />
		<input type="hidden" name="ln" value="<?php echo $_GET['lugarnac']?>" />
		<input type="hidden" name="est" value="<?php echo $_GET['estado']?>" />
		<input type="hidden" name="dom" value="<?php echo $_GET['domi']?>" />
		<input type="hidden" name="cedpad" value="<?php echo $_GET['cedulapadre']?>" />
		<input type="hidden" name="cedmad" value="<?php echo $_GET['cedulamadre']?>" />
		<input type="hidden" name="nompad" value="<?php echo $_GET['nombrepadre']?>" />
		<input type="hidden" name="nommad" value="<?php echo $_GET['nombremadre']?>" />
		<input type="hidden" name="apepad" value="<?php echo $_GET['apellidopadre']?>" />
		<input type="hidden" name="apemad" value="<?php echo $_GET['apellidomadre']?>" />
		<input type="hidden" name="fili" value="<?php echo $_GET['filiacion']?>" />
		<input type="hidden" name="tipbusq" value="<?php echo $_GET['tipobusqueda']?>" />
		<input type="hidden" name="cedu" value="<?php echo $_GET['ced']?>" />
		<input type="hidden" name="codi" value="<?php echo $_GET['nuevocodigo']?>" />
		<input type="hidden" name="nomb" value="<?php echo $_GET['nuevonombre']?>" />
		<input type="hidden" name="apell" value="<?php echo $_GET['nuevoapellido']?>" />
		<input type="hidden" name="fechanacimiento" value="<?php echo $_GET['nuevafechanac']?>" />
		<input type="hidden" name="eda" value="<?php echo $_GET['nuevaedad']?>" />
		<input type="hidden" name="lugarnacimiento" value="<?php echo $_GET['nuevolugarnac']?>" />
		<input type="hidden" name="estad" value="<?php echo $_GET['nuevoestado']?>" />
		<input type="hidden" name="domic" value="<?php echo $_GET['nuevodomicilio']?>" />
		<input type="hidden" name="pad" value="<?php echo $_GET['nuevopadre']?>" />
	    <input type="hidden" name="mad" value="<?php echo $_GET['nuevamadre']?>" />
	    <input type="hidden" name="fil" value="<?php echo $_GET['nuevafiliacion']?>" />
		<input type="hidden" name="no" value="<?php echo $_GET['nom']?>" />
		<input type="hidden" name="apelli" value="<?php echo $_GET['ape']?>" />
		<input type="hidden" name="fecnaci" value="<?php echo $_GET['fn']?>" />
		<input type="hidden" name="codig" value="<?php echo $_GET['cod']?>" />
		<input type="hidden" name="newced" value="<?php echo $_GET['nuevaced']?>" />
		<input type="hidden" name="nomnew" value="<?php echo $_GET['nombrenuevo']?>" />
		<input type="hidden" name="apenew" value="<?php echo $_GET['apellidonuevo']?>" />
		<input type="hidden" name="fnnew" value="<?php echo $_GET['fechanacnueva']?>" />
		<input type="hidden" name="edadnew" value="<?php echo $_GET['edadnueva']?>" />
		<input type="hidden" name="lnnew" value="<?php echo $_GET['lugarnacnuevo']?>" />
		<input type="hidden" name="estnew" value="<?php echo $_GET['estadonuevo']?>" />
		<input type="hidden" name="domnew" value="<?php echo $_GET['domicilionuevo']?>" />
		<input type="hidden" name="padnew" value="<?php echo $_GET['padrenuevo']?>" />
		<input type="hidden" name="madnew" value="<?php echo $_GET['madrenueva']?>" />
		<input type="hidden" name="filinew" value="<?php echo $_GET['filiacionnueva']?>" />

		<input type="hidden" name="lugarbauesp" value="<?php echo $_GET['lugbauesp']?>" />
	  <?php
		if($_GET['opc']==6)
		{
	  ?>
		  <input type="hidden" name="otrolugarbauesp" value="<?php echo $_GET['otrolugesp']?>" />
	      <input type="hidden" name="cedesp" value="<?php echo $_GET['cedulaesp']?>" />
	      <input type="hidden" name="nomesp" value="" />
	      <input type="hidden" name="apeesp" value="" />
	      <input type="hidden" name="sexesp" value="" />
	      <input type="hidden" name="fnesp" value="" />
	      <input type="hidden" name="edesp" value="" />
	      <input type="hidden" name="lnesp" value="" />
	      <input type="hidden" name="estesp" value="" />
	      <input type="hidden" name="domesp" value="" />

		  <input type="hidden" name="cedpadesp" value="" />
	      <input type="hidden" name="nompadesp" value="" />
	      <input type="hidden" name="apepadesp" value="" />
	      <input type="hidden" name="cedmadesp" value="" />
	      <input type="hidden" name="nommadesp" value="" />
	      <input type="hidden" name="apemadesp" value="" />
	      <input type="hidden" name="filiesp" value="" />
	    <?php
		}
		if($_GET['opc']==7)
		{
	    ?>
	      <input type="hidden" name="tipbusqesp" value="" />
 		  <input type="hidden" name="ceduesp" value="" />
	      <input type="hidden" name="nombesp" value="" />
	      <input type="hidden" name="apellesp" value="" />
	      <input type="hidden" name="fechanacimientoesp" value="" />
	      <input type="hidden" name="edaesp" value="" />
	      <input type="hidden" name="lugarnacimientoesp" value="" />
	      <input type="hidden" name="estadesp" value="" />
	      <input type="hidden" name="domicesp" value="" />
	      <input type="hidden" name="padesp" value="" />
	      <input type="hidden" name="madesp" value="" />
	      <input type="hidden" name="filesp" value="" />
     <?php
		}
	 ?>
	</form>
<?php
}
?>
<script type="text/javascript">
  document.auxiliar.submit();
</script>