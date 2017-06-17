<?php
include('conexion.php');
if(($_GET['opc']==2) or ($_GET['opc']==3))
{	
	$fec=$_GET['fecha'];
	$min=$_GET['minist'];
}
if(isset($_GET['cod']))
{	
	$codigo=$_GET['cod'];
}
if(($_GET['opc']==6) or ($_GET['opc']==15))
{
	if(isset($_GET['cedulapadreesp']) and (trim($_GET['cedulapadreesp']!="")))
	{
		$registros=mysqli_query($conexion,"SELECT cedula_pad,nombre_pad,apellido_pad FROM padre WHERE cedula_pad='$_GET[cedulapadreesp]'");
		$reg=mysqli_fetch_array($registros)
		?>

		<form name="auxiliarpadre" id="auxiliarpadre" method="post" action="<?php if($_GET['opc']==6) echo '../pages/registroesposo.php#padresesp'; if($_GET['opc']==15) echo '../pages/editar-matrimonio.php?cod='.$codigo.'#padresesp'; ?>">
	    <?php
		  	if($_GET['opc']==6)
		  	{
		?>
			    <input type="hidden" name="lugarbau" value="<?php echo $_GET['lugbau']?>" />
				<input type="hidden" name="otrolugarbau" value="<?php echo $_GET['otrolug']?>" />

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
				<input type="hidden" name="nombr" value="<?php echo $_GET['nom']?>" />
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
			  	<input type="hidden" name="otrolugarbauesp" value="<?php echo $_GET['otrolugesp']?>" />
		<?php
			}
		?>	
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
			
		    <input type="hidden" name="cedesp" value="<?php echo $_GET['cedulaesp']?>" />
		    <input type="hidden" name="nomesp" value="<?php echo $_GET['nombreesp']?>" />
			<input type="hidden" name="apeesp" value="<?php echo $_GET['apellidoesp']?>" />
			<input type="hidden" name="fnesp" value="<?php echo $_GET['fechanacesp']?>" />
			<input type="hidden" name="edesp" value="<?php echo $_GET['edadesp']?>" />
			<input type="hidden" name="lnesp" value="<?php echo $_GET['lugarnacesp']?>" />
			<input type="hidden" name="estesp" value="<?php echo $_GET['estadoesp']?>" />
			<input type="hidden" name="domesp" value="<?php echo $_GET['domiesp']?>" />
			<input type="hidden" name="cedmadesp" value="<?php echo $_GET['cedulamadreesp']?>" />
			<input type="hidden" name="nommadesp" value="<?php echo $_GET['nombremadreesp']?>" />
			<input type="hidden" name="apemadesp" value="<?php echo $_GET['apellidomadreesp']?>" />

			<input type="hidden" name="cedpadesp" value="<?php echo $_GET['cedulapadreesp']; ?>" />
		    <input type="hidden" name="nompadesp" value="<?php echo $reg['nombre_pad']; ?>" />
		    <input type="hidden" name="apepadesp" value="<?php echo $reg['apellido_pad']; ?>" />
		  <?php
		  	if($_GET['opc']==15)
		  	{
		  ?>
			  <input type="hidden" name="filiesp" value="<?php echo $_GET['filiacionesp']?>" />

			  <input type="hidden" name="cedpadri" value="<?php echo $_GET['cedpadrino']?>" />
			  <input type="hidden" name="nompadri" value="<?php echo $_GET['nombpadrino']?>" />
			  <input type="hidden" name="apepadri" value="<?php echo $_GET['apepadrino']?>" />
			  <input type="hidden" name="cedmadri" value="<?php echo $_GET['cedmadrina']?>" />
			  <input type="hidden" name="nommadri" value="<?php echo $_GET['nombmadrina']?>" />
			  <input type="hidden" name="apemadri" value="<?php echo $_GET['apemadrina']?>" />
			  <input type="hidden" name="pro" value="<?php echo $_GET['proclamas']?>" />
			  <input type="hidden" name="dis" value="<?php echo $_GET['dispensas']?>" />
			  <input type="hidden" name="sac" value="<?php echo $_GET['sacram']?>" />
			  <input type="hidden" name="observ" value="<?php echo $_GET['observaciones']?>" />
			  <input type="hidden" name="fm" value="<?php echo $_GET['fecham']?>" />
			  <input type="hidden" name="min" value="<?php echo $_GET['ministro']?>" />
			  <input type="hidden" name="otromin" value="<?php echo $_GET['otrom']?>" />
		  <?php
		  	}
		  ?>
		</form>
	<?php
	}
	else
	{
	?>
		<form name="auxiliarpadre" id="auxiliarpadre" method="post" action="<?php if($_GET['opc']==6) echo '../pages/registroesposo.php#padresesp'; if($_GET['opc']==15) echo '../pages/editar-matrimonio.php?cod='.$codigo.'#padresesp'; ?>">
		<?php
		  	if($_GET['opc']==6)
		  	{
		?>    
			    <input type="hidden" name="lugarbau" value="<?php echo $_GET['lugbau']?>" />
				<input type="hidden" name="otrolugarbau" value="<?php echo $_GET['otrolug']?>" />

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
				<input type="hidden" name="nombr" value="<?php echo $_GET['nom']?>" />
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
		  		<input type="hidden" name="otrolugarbauesp" value="<?php echo $_GET['otrolugesp']?>" />
		<?php
			}
		?>  		
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
	 		
		    <input type="hidden" name="cedesp" value="<?php echo $_GET['cedulaesp']?>" />
		    <input type="hidden" name="nomesp" value="<?php echo $_GET['nombreesp']?>" />
			<input type="hidden" name="apeesp" value="<?php echo $_GET['apellidoesp']?>" />
			<input type="hidden" name="fnesp" value="<?php echo $_GET['fechanacesp']?>" />
			<input type="hidden" name="edesp" value="<?php echo $_GET['edadesp']?>" />
			<input type="hidden" name="lnesp" value="<?php echo $_GET['lugarnacesp']?>" />
			<input type="hidden" name="estesp" value="<?php echo $_GET['estadoesp']?>" />
			<input type="hidden" name="domesp" value="<?php echo $_GET['domiesp']?>" />
			<input type="hidden" name="cedmadesp" value="<?php echo $_GET['cedulamadreesp']?>" />
			<input type="hidden" name="nommadesp" value="<?php echo $_GET['nombremadreesp']?>" />
			<input type="hidden" name="apemadesp" value="<?php echo $_GET['apellidomadreesp']?>" />
			

			<input type="hidden" name="cedpadesp" value="<?php echo $_GET['cedulapadreesp']; ?>" />
		    <input type="hidden" name="nompadesp" value="" />
		    <input type="hidden" name="apepadesp" value="" />
		    <?php
		  	if($_GET['opc']==15)
		  	{
		  ?>	
		  	  <input type="hidden" name="filiesp" value="<?php echo $_GET['filiacionesp']?>" />

			  <input type="hidden" name="cedpadri" value="<?php echo $_GET['cedpadrino']?>" />
			  <input type="hidden" name="nompadri" value="<?php echo $_GET['nombpadrino']?>" />
			  <input type="hidden" name="apepadri" value="<?php echo $_GET['apepadrino']?>" />
			  <input type="hidden" name="cedmadri" value="<?php echo $_GET['cedmadrina']?>" />
			  <input type="hidden" name="nommadri" value="<?php echo $_GET['nombmadrina']?>" />
			  <input type="hidden" name="apemadri" value="<?php echo $_GET['apemadrina']?>" />
			  <input type="hidden" name="pro" value="<?php echo $_GET['proclamas']?>" />
			  <input type="hidden" name="dis" value="<?php echo $_GET['dispensas']?>" />
			  <input type="hidden" name="sac" value="<?php echo $_GET['sacram']?>" />
			  <input type="hidden" name="observ" value="<?php echo $_GET['observaciones']?>" />
			  <input type="hidden" name="fm" value="<?php echo $_GET['fecham']?>" />
			  <input type="hidden" name="min" value="<?php echo $_GET['ministro']?>" />
			  <input type="hidden" name="otromin" value="<?php echo $_GET['otrom']?>" />
		  <?php
		  	}
		  ?>
		</form>
	<?php
	}
}
else
{
	if(isset($_GET['cedulapadre']) and (trim($_GET['cedulapadre']!="")))
	{	
		$registros=mysqli_query($conexion,"SELECT cedula_pad,nombre_pad,apellido_pad FROM padre WHERE cedula_pad='$_GET[cedulapadre]'");
		$reg=mysqli_fetch_array($registros)
		?>
		 
		<form name="auxiliarpadre" id="auxiliarpadre" method="post" action="<?php if($_GET['opc']==1) echo '../pages/bautizo.php#padres'; if($_GET['opc']==2) echo '../pages/comunion.php?fec='.$fec.'&min='.$min.'#padres'; if($_GET['opc']==3) echo '../pages/confirmacion.php?fec='.$fec.'&min='.$min.'#padres'; if($_GET['opc']==4) echo '../pages/registroesposo.php#padres'; if($_GET['opc']==11) echo '../pages/editar-bautizo.php?cod='.$codigo.'#padres'; if($_GET['opc']==12) echo '../pages/editar-comunion.php?cod='.$codigo.'#padres'; if($_GET['opc']==13) echo '../pages/editar-confirmacion.php?cod='.$codigo.'#padres'; if($_GET['opc']==14) echo '../pages/editar-matrimonio.php?cod='.$codigo.'#padres' ?>">
		  <?php
		  	if(($_GET['opc']!=1) and ($_GET['opc']!=11) and ($_GET['opc']!=12) and ($_GET['opc']!=13) and ($_GET['opc']!=14))
		  	{
		  ?>
			  <input type="hidden" name="lugarbau" value="<?php echo $_GET['lugbau']?>" />
			  <input type="hidden" name="otrolugarbau" value="<?php echo $_GET['otrolug']?>" />
		  <?php
			}
		  ?>
		  <input type="hidden" name="ced" value="<?php echo $_GET['cedula']?>" />
		  <input type="hidden" name="nom" value="<?php echo $_GET['nombre']; ?>" />
		  <input type="hidden" name="ape" value="<?php echo $_GET['apellido']; ?>" />
		  <?php
	  		if(($_GET['opc']!=4) and ($_GET['opc']!=5) and ($_GET['opc']!=14))
	  		{
	  	  ?>
			<input type="hidden" name="sex" value="<?php echo $_GET['sexo']; ?>" />
		  <?php
	  		}
	 	  ?>
		  <input type="hidden" name="fn" value="<?php echo $_GET['fechanac']; ?>" />
		  <input type="hidden" name="cedmad" value="<?php echo $_GET['cedulamadre']; ?>" />
		  <input type="hidden" name="nommad" value="<?php echo $_GET['nombremadre']; ?>" />
		  <input type="hidden" name="apemad" value="<?php echo $_GET['apellidomadre']; ?>" />
		  <input type="hidden" name="cedpad" value="<?php echo $_GET['cedulapadre']; ?>" />
		  <input type="hidden" name="nompad" value="<?php echo $reg['nombre_pad']; ?>" />
		  <input type="hidden" name="apepad" value="<?php echo $reg['apellido_pad']; ?>" />
		   <?php
		  	if(($_GET['opc']==1) or ($_GET['opc']==11) or ($_GET['opc']==13))
		  	{
		   ?>
		 	  <input type="hidden" name="cedpadri" value="<?php echo $_GET['cedpadrino']; ?>" />
			  <input type="hidden" name="nompadri" value="<?php echo $_GET['nombpadrino']; ?>" />
			  <input type="hidden" name="apepadri" value="<?php echo $_GET['apepadrino']; ?>" />	   
		  <?php
			}
		  	if(($_GET['opc']==1) or ($_GET['opc']==11))
		  	{
		  ?>
		  	  <input type="hidden" name="ln" value="<?php echo $_GET['lugarnac']; ?>" />
		  	  <input type="hidden" name="rc" value="<?php echo $_GET['registrocivil']; ?>" />
		 	  <input type="hidden" name="cedmadri" value="<?php echo $_GET['cedmadrina']; ?>" />
			  <input type="hidden" name="nommadri" value="<?php echo $_GET['nombmadrina']; ?>" />
			  <input type="hidden" name="apemadri" value="<?php echo $_GET['apemadrina']; ?>" />
			  <input type="hidden" name="fb" value="<?php echo $_GET['fechab']; ?>" />	
			  <input type="hidden" name="observ" value="<?php echo $_GET['observaciones']; ?>" />	
		 	  <input type="hidden" name="min" value="<?php echo $_GET['minis']; ?>" />
		 	  <input type="hidden" name="otromin" value="<?php echo $_GET['otrom']; ?>" />   
		  <?php
			}		 
			if(($_GET['opc']==4) or ($_GET['opc']==14))
		  	{
		  ?>
		 	  <input type="hidden" name="ed" value="<?php echo $_GET['edad']; ?>" />
		 	  <input type="hidden" name="ln" value="<?php echo $_GET['lugarnac']; ?>" />
		 	  <input type="hidden" name="est" value="<?php echo $_GET['estado']; ?>" /> 
		 	  <input type="hidden" name="dom" value="<?php echo $_GET['domi']; ?>" /> 
		 	  <?php
			  if($_GET['opc']==4)
			  {
			  ?>
			 	  <input type="hidden" name="lugarbauesp" value="<?php echo $_GET['lugbauesp']?>" />
				  <input type="hidden" name="otrolugarbauesp" value="<?php echo $_GET['otrolugesp']?>" />
				  <input type="hidden" name="tipbusqesp" value="<?php echo $_GET['tipobusquedaesp']?>" />
				  <input type="hidden" name="ceduesp" value="<?php echo $_GET['cedesp']?>" />
				  <input type="hidden" name="codiesp" value="<?php echo $_GET['nuevocodigoesp']?>" />
				  <input type="hidden" name="nombesp" value="<?php echo $_GET['nuevonombreesp']?>" />
				  <input type="hidden" name="apellesp" value="<?php echo $_GET['nuevoapellidoesp']?>" />
				  <input type="hidden" name="fechanacimientoesp" value="<?php echo $_GET['nuevafechanacesp']?>" />
				  <input type="hidden" name="edaesp" value="<?php echo $_GET['nuevaedadesp']?>" />
				  <input type="hidden" name="lugarnacimientoesp" value="<?php echo $_GET['nuevolugarnacesp']?>" />
				  <input type="hidden" name="estadesp" value="<?php echo $_GET['nuevoestadoesp']?>" />
				  <input type="hidden" name="domicesp" value="<?php echo $_GET['nuevodomicilioesp']?>" />
				  <input type="hidden" name="padesp" value="<?php echo $_GET['nuevopadreesp']?>" />
				  <input type="hidden" name="madesp" value="<?php echo $_GET['nuevamadreesp']?>" />
				  <input type="hidden" name="filesp" value="<?php echo $_GET['nuevafiliacionesp']?>" />
				  <input type="hidden" name="nombresp" value="<?php echo $_GET['nomesp']?>" />
				  <input type="hidden" name="apelliesp" value="<?php echo $_GET['apeesp']?>" />
				  <input type="hidden" name="fecnaciesp" value="<?php echo $_GET['fnesp']?>" />
				  <input type="hidden" name="codigesp" value="<?php echo $_GET['codesp']?>" />
				  <input type="hidden" name="newcedesp" value="<?php echo $_GET['nuevacedesp']?>" />
				  <input type="hidden" name="nomnewesp" value="<?php echo $_GET['nombrenuevoesp']?>" />
				  <input type="hidden" name="apenewesp" value="<?php echo $_GET['apellidonuevoesp']?>" />
				  <input type="hidden" name="fnnewesp" value="<?php echo $_GET['fechanacnuevaesp']?>" />
				  <input type="hidden" name="edadnewesp" value="<?php echo $_GET['edadnuevaesp']?>" />
				  <input type="hidden" name="lnnewesp" value="<?php echo $_GET['lugarnacnuevoesp']?>" />
				  <input type="hidden" name="estnewesp" value="<?php echo $_GET['estadonuevoesp']?>" />
				  <input type="hidden" name="domnewesp" value="<?php echo $_GET['domicilionuevoesp']?>" />
				  <input type="hidden" name="padnewesp" value="<?php echo $_GET['padrenuevoesp']?>" />
				  <input type="hidden" name="madnewesp" value="<?php echo $_GET['madrenuevaesp']?>" />
				  <input type="hidden" name="filinewesp" value="<?php echo $_GET['filiacionnuevaesp']?>" />
			  <?php
			  }
			  ?>
			  <input type="hidden" name="cedesp" value="<?php echo $_GET['cedulaesp']?>" />
			  <input type="hidden" name="nomesp" value="<?php echo $_GET['nombreesp']?>" />
			  <input type="hidden" name="apeesp" value="<?php echo $_GET['apellidoesp']?>" />
			  <input type="hidden" name="fnesp" value="<?php echo $_GET['fechanacesp']?>" />
			  <input type="hidden" name="edesp" value="<?php echo $_GET['edadesp']?>" />
			  <input type="hidden" name="lnesp" value="<?php echo $_GET['lugarnacesp']?>" />
			  <input type="hidden" name="estesp" value="<?php echo $_GET['estadoesp']?>" />
			  <input type="hidden" name="domesp" value="<?php echo $_GET['domiesp']?>" />
			  <input type="hidden" name="cedpadesp" value="<?php echo $_GET['cedulapadreesp']?>" />
			  <input type="hidden" name="cedmadesp" value="<?php echo $_GET['cedulamadreesp']?>" />
			  <input type="hidden" name="nompadesp" value="<?php echo $_GET['nombrepadreesp']?>" />
			  <input type="hidden" name="nommadesp" value="<?php echo $_GET['nombremadreesp']?>" />
			  <input type="hidden" name="apepadesp" value="<?php echo $_GET['apellidopadreesp']?>" />
			  <input type="hidden" name="apemadesp" value="<?php echo $_GET['apellidomadreesp']?>" />
			  <input type="hidden" name="filiesp" value="<?php echo $_GET['filiacionesp']?>" />
			  <?php
			  	if($_GET['opc']==14)
			  	{
			  ?>
				  <input type="hidden" name="cedpadri" value="<?php echo $_GET['cedpadrino']?>" />
				  <input type="hidden" name="nompadri" value="<?php echo $_GET['nombpadrino']?>" />
				  <input type="hidden" name="apepadri" value="<?php echo $_GET['apepadrino']?>" />
				  <input type="hidden" name="cedmadri" value="<?php echo $_GET['cedmadrina']?>" />
				  <input type="hidden" name="nommadri" value="<?php echo $_GET['nombmadrina']?>" />
				  <input type="hidden" name="apemadri" value="<?php echo $_GET['apemadrina']?>" />
				  <input type="hidden" name="pro" value="<?php echo $_GET['proclamas']?>" />
				  <input type="hidden" name="dis" value="<?php echo $_GET['dispensas']?>" />
				  <input type="hidden" name="sac" value="<?php echo $_GET['sacram']?>" />
				  <input type="hidden" name="observ" value="<?php echo $_GET['observaciones']?>" />
				  <input type="hidden" name="fm" value="<?php echo $_GET['fecham']?>" />
				  <input type="hidden" name="min" value="<?php echo $_GET['ministro']?>" />
				  <input type="hidden" name="otromin" value="<?php echo $_GET['otrom']?>" />
			  <?php
			  	}
			}
			if(($_GET['opc']==12) or ($_GET['opc']==13))
		  	{
		  ?>
		  	  <input type="hidden" name="fc" value="<?php echo $_GET['fechac']; ?>" />	
		<?php
		  	}
		  	if($_GET['opc']==13)
		  	{
		  ?>
		  	  <input type="hidden" name="sexpadri" value="<?php echo $_GET['sexpadrino']; ?>" />	
		<?php
		  	}
		  ?>
		</form>
		 
	<?php
	}
	else
	{
	?>
		<form name="auxiliarpadre" id="auxiliarpadre" method="post" action="<?php if($_GET['opc']==1) echo '../pages/bautizo.php#padres'; if($_GET['opc']==2) echo '../pages/comunion.php?fec='.$fec.'&min='.$min.'#padres'; if($_GET['opc']==3) echo '../pages/confirmacion.php?fec='.$fec.'&min='.$min.'#padres'; if($_GET['opc']==4) echo '../pages/registroesposo.php#padres'; if($_GET['opc']==11) echo '../pages/editar-bautizo.php?cod='.$codigo.'#padres'; if($_GET['opc']==12) echo '../pages/editar-comunion.php?cod='.$codigo.'#padres'; if($_GET['opc']==13) echo '../pages/editar-confirmacion.php?cod='.$codigo.'#padres'; if($_GET['opc']==14) echo '../pages/editar-matrimonio.php?cod='.$codigo.'#padres' ?>">
		 <?php
		  	if(($_GET['opc']!=1) and ($_GET['opc']!=11) and ($_GET['opc']!=12) and ($_GET['opc']!=13) and ($_GET['opc']!=14))
		  	{
		  ?>
			  <input type="hidden" name="lugarbau" value="<?php echo $_GET['lugbau']?>" />
			  <input type="hidden" name="otrolugarbau" value="<?php echo $_GET['otrolug']?>" />
		  <?php
			}
		  ?>
		  <input type="hidden" name="ced" value="<?php echo $_GET['cedula']?>" />
		  <input type="hidden" name="nom" value="<?php echo $_GET['nombre']; ?>" />
		  <input type="hidden" name="ape" value="<?php echo $_GET['apellido']; ?>" />
		  <?php
	  		if(($_GET['opc']!=4) and ($_GET['opc']!=5) and ($_GET['opc']!=14))
	  		{
	  	  ?>
			<input type="hidden" name="sex" value="<?php echo $_GET['sexo']; ?>" />
		  <?php
	  		}
	 	  ?>
	 	  <input type="hidden" name="fn" value="<?php echo $_GET['fechanac']; ?>" />
		  <input type="hidden" name="cedmad" value="<?php echo $_GET['cedulamadre']; ?>" />
		  <input type="hidden" name="nommad" value="<?php echo $_GET['nombremadre']; ?>" />
		  <input type="hidden" name="apemad" value="<?php echo $_GET['apellidomadre']; ?>" />
		  <input type="hidden" name="cedpad" value="<?php echo $_GET['cedulapadre']; ?>" />
		  <input type="hidden" name="nompad" value="" />
		  <input type="hidden" name="apepad" value="" />
		   <?php
		  	if(($_GET['opc']==1) or ($_GET['opc']==11) or ($_GET['opc']==13))
		  	{
		   ?>
		 	  <input type="hidden" name="cedpadri" value="<?php echo $_GET['cedpadrino']; ?>" />
			  <input type="hidden" name="nompadri" value="<?php echo $_GET['nombpadrino']; ?>" />
			  <input type="hidden" name="apepadri" value="<?php echo $_GET['apepadrino']; ?>" />	   
		  <?php
			}
		  	if(($_GET['opc']==1) or ($_GET['opc']==11))
		  	{
		  ?>
		  	  <input type="hidden" name="ln" value="<?php echo $_GET['lugarnac']; ?>" />
		  	  <input type="hidden" name="rc" value="<?php echo $_GET['registrocivil']; ?>" />
		 	  <input type="hidden" name="cedmadri" value="<?php echo $_GET['cedmadrina']; ?>" />
			  <input type="hidden" name="nommadri" value="<?php echo $_GET['nombmadrina']; ?>" />
			  <input type="hidden" name="apemadri" value="<?php echo $_GET['apemadrina']; ?>" />	   
		 	  <input type="hidden" name="fb" value="<?php echo $_GET['fechab']; ?>" />  
		 	  <input type="hidden" name="observ" value="<?php echo $_GET['observaciones']; ?>" />	
		 	  <input type="hidden" name="min" value="<?php echo $_GET['minis']; ?>" />
		 	  <input type="hidden" name="otromin" value="<?php echo $_GET['otrom']; ?>" />
		  <?php
			}
		  	if(($_GET['opc']==4) and ($_GET['opc']==14))
		  	{
		  ?>
		 	  <input type="hidden" name="ed" value="<?php echo $_GET['edad']; ?>" />
		 	  <input type="hidden" name="ln" value="<?php echo $_GET['lugarnac']; ?>" />
		 	  <input type="hidden" name="est" value="<?php echo $_GET['estado']; ?>" /> 
		 	  <input type="hidden" name="dom" value="<?php echo $_GET['domi']; ?>" /> 
			  <?php
			  	if($_GET['opc']==4)
			  	{
			  ?>
			 	  <input type="hidden" name="lugarbauesp" value="<?php echo $_GET['lugbauesp']?>" />
				  <input type="hidden" name="otrolugarbauesp" value="<?php echo $_GET['otrolugesp']?>" />
				  <input type="hidden" name="tipbusqesp" value="<?php echo $_GET['tipobusquedaesp']?>" />
				  <input type="hidden" name="ceduesp" value="<?php echo $_GET['cedesp']?>" />
				  <input type="hidden" name="codiesp" value="<?php echo $_GET['nuevocodigoesp']?>" />
				  <input type="hidden" name="nombesp" value="<?php echo $_GET['nuevonombreesp']?>" />
				  <input type="hidden" name="apellesp" value="<?php echo $_GET['nuevoapellidoesp']?>" />
				  <input type="hidden" name="fechanacimientoesp" value="<?php echo $_GET['nuevafechanacesp']?>" />
				  <input type="hidden" name="edaesp" value="<?php echo $_GET['nuevaedadesp']?>" />
				  <input type="hidden" name="lugarnacimientoesp" value="<?php echo $_GET['nuevolugarnacesp']?>" />
				  <input type="hidden" name="estadesp" value="<?php echo $_GET['nuevoestadoesp']?>" />
				  <input type="hidden" name="domicesp" value="<?php echo $_GET['nuevodomicilioesp']?>" />
				  <input type="hidden" name="padesp" value="<?php echo $_GET['nuevopadreesp']?>" />
				  <input type="hidden" name="madesp" value="<?php echo $_GET['nuevamadreesp']?>" />
				  <input type="hidden" name="filesp" value="<?php echo $_GET['nuevafiliacionesp']?>" />
				  <input type="hidden" name="nombresp" value="<?php echo $_GET['nomesp']?>" />
				  <input type="hidden" name="apelliesp" value="<?php echo $_GET['apeesp']?>" />
				  <input type="hidden" name="fecnaciesp" value="<?php echo $_GET['fnesp']?>" />
				  <input type="hidden" name="codigesp" value="<?php echo $_GET['codesp']?>" />
				  <input type="hidden" name="newcedesp" value="<?php echo $_GET['nuevacedesp']?>" />
				  <input type="hidden" name="nomnewesp" value="<?php echo $_GET['nombrenuevoesp']?>" />
				  <input type="hidden" name="apenewesp" value="<?php echo $_GET['apellidonuevoesp']?>" />
				  <input type="hidden" name="fnnewesp" value="<?php echo $_GET['fechanacnuevaesp']?>" />
				  <input type="hidden" name="edadnewesp" value="<?php echo $_GET['edadnuevaesp']?>" />
				  <input type="hidden" name="lnnewesp" value="<?php echo $_GET['lugarnacnuevoesp']?>" />
				  <input type="hidden" name="estnewesp" value="<?php echo $_GET['estadonuevoesp']?>" />
				  <input type="hidden" name="domnewesp" value="<?php echo $_GET['domicilionuevoesp']?>" />
				  <input type="hidden" name="padnewesp" value="<?php echo $_GET['padrenuevoesp']?>" />
				  <input type="hidden" name="madnewesp" value="<?php echo $_GET['madrenuevaesp']?>" />
				  <input type="hidden" name="filinewesp" value="<?php echo $_GET['filiacionnuevaesp']?>" />
			  <?php
				}
			  ?>
			  <input type="hidden" name="cedesp" value="<?php echo $_GET['cedulaesp']?>" />
			  <input type="hidden" name="nomesp" value="<?php echo $_GET['nombreesp']?>" />
			  <input type="hidden" name="apeesp" value="<?php echo $_GET['apellidoesp']?>" />
			  <input type="hidden" name="fnesp" value="<?php echo $_GET['fechanacesp']?>" />
			  <input type="hidden" name="edesp" value="<?php echo $_GET['edadesp']?>" />
			  <input type="hidden" name="lnesp" value="<?php echo $_GET['lugarnacesp']?>" />
			  <input type="hidden" name="estesp" value="<?php echo $_GET['estadoesp']?>" />
			  <input type="hidden" name="domesp" value="<?php echo $_GET['domicilioesp']?>" />
			  <input type="hidden" name="cedpadesp" value="<?php echo $_GET['cedulapadreesp']?>" />
			  <input type="hidden" name="cedmadesp" value="<?php echo $_GET['cedulamadreesp']?>" />
			  <input type="hidden" name="nompadesp" value="<?php echo $_GET['nombrepadreesp']?>" />
			  <input type="hidden" name="nommadesp" value="<?php echo $_GET['nombremadreesp']?>" />
			  <input type="hidden" name="apepadesp" value="<?php echo $_GET['apellidopadreesp']?>" />
			  <input type="hidden" name="apemadesp" value="<?php echo $_GET['apellidomadreesp']?>" />
			  <input type="hidden" name="filiesp" value="<?php echo $_GET['filiacionesp']?>" />
			  <?php
			  	if($_GET['opc']==14)
			  	{
			  ?>
				  <input type="hidden" name="cedpadri" value="<?php echo $_GET['cedpadrino']?>" />
				  <input type="hidden" name="nompadri" value="<?php echo $_GET['nombpadrino']?>" />
				  <input type="hidden" name="apepadri" value="<?php echo $_GET['apepadrino']?>" />
				  <input type="hidden" name="cedmadri" value="<?php echo $_GET['cedmadrina']?>" />
				  <input type="hidden" name="nommadri" value="<?php echo $_GET['nombmadrina']?>" />
				  <input type="hidden" name="apemadri" value="<?php echo $_GET['apemadrina']?>" />
				  <input type="hidden" name="pro" value="<?php echo $_GET['proclamas']?>" />
				  <input type="hidden" name="dis" value="<?php echo $_GET['dispensas']?>" />
				  <input type="hidden" name="sac" value="<?php echo $_GET['sacram']?>" />
				  <input type="hidden" name="observ" value="<?php echo $_GET['observaciones']?>" />
				  <input type="hidden" name="fm" value="<?php echo $_GET['fecham']?>" />
				  <input type="hidden" name="min" value="<?php echo $_GET['ministro']?>" />
				  <input type="hidden" name="otromin" value="<?php echo $_GET['otrom']?>" />
			  <?php
			  	}
			}
			if(($_GET['opc']==12) or ($_GET['opc']==13))
			{
		  ?>
			    <input type="hidden" name="fc" value="<?php echo $_GET['fechac']; ?>" />	
		  <?php
		  	}
		    if($_GET['opc']==13)
		  	{
		  ?>
		  	  <input type="hidden" name="sexpadri" value="<?php echo $_GET['sexpadrino']; ?>" />	
		<?php
		  	}
		  ?>
		</form>
	<?php
	}
}
	?>
	<script type="text/javascript">
	  document.auxiliarpadre.submit();
	</script>