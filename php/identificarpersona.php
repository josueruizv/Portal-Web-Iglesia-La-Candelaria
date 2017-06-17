<?php
include('conexion.php');
if(($_GET['opc']==2) or ($_GET['opc']==3) or ($_GET['opc']==8) or ($_GET['opc']==9))
{	$fec=$_GET['fecha'];
	$min=$_GET['minist'];
}
if(isset($_GET['cedula']) and (trim($_GET['cedula'])!=""))
{	
	$registros=mysqli_query($conexion,"SELECT * FROM personas WHERE cedula_per='$_GET[cedula]'");
	if($reg=mysqli_fetch_array($registros))
	{
	?>
	 
		<form name="auxiliar" id="auxiliar" method="post" action="<?php if($_GET['opc']==2) echo '../pages/comunion.php?fec='.$fec.'&min='.$min.'#persona'; if($_GET['opc']==3) echo '../pages/confirmacion.php?fec='.$fec.'&min='.$min.'#persona'; if($_GET['opc']==4) echo '../pages/registroesposo.php#persona'; if($_GET['opc']==5) echo '../pages/registroesposo.php#buscar'; if($_GET['opc']==6) echo '../pages/registroesposo.php#personaesp'; if($_GET['opc']==7) echo '../pages/registroesposo.php#buscaresp'; if($_GET['opc']==8) echo '../pages/comunion.php?fec='.$fec.'&min='.$min.'#buscar'; if($_GET['opc']==9) echo '../pages/confirmacion.php?fec='.$fec.'&min='.$min.'#buscar'; ?>">

		  <input type="hidden" name="lugarbau" value="<?php echo $_GET['lugbau']?>" />
		  <?php
		  	if(($_GET['opc']!=5) and ($_GET['opc']!=8) and ($_GET['opc']!=9))
		  	{
		  ?>
			  	<input type="hidden" name="otrolugarbau" value="<?php echo $_GET['otrolug']?>" />
			    <input type="hidden" name="ced" value="<?php echo $_GET['cedula']?>" />
			    <input type="hidden" name="nom" value="<?php echo $reg['nombre_per']; ?>" />
			    <input type="hidden" name="ape" value="<?php echo $reg['apellido_per']; ?>" />
			    <input type="hidden" name="sex" value="<?php echo $reg['sexo_per']; ?>" />
			    <input type="hidden" name="fn" value="<?php echo $reg['fechanac_per']; ?>" />
			    
			<?php
				$registrospadres=mysqli_query($conexion,"SELECT pad.cedula_pad,pad.nombre_pad,pad.apellido_pad,mad.cedula_mad,mad.nombre_mad,mad.apellido_mad, padper.filiacion FROM padre pad,madre mad,padrespersona padper WHERE padper.codigo_per='$reg[codigo_per]' AND pad.cedula_pad=padper.cedula_pad AND mad.cedula_mad=padper.cedula_mad");
				$regpadres=mysqli_fetch_array($registrospadres);
			?>
				<input type="hidden" name="cedpad" value="<?php echo $regpadres['cedula_pad']?>" />
			    <input type="hidden" name="nompad" value="<?php echo $regpadres['nombre_pad']?>" />
			    <input type="hidden" name="apepad" value="<?php echo $regpadres['apellido_pad']?>" />
			    <input type="hidden" name="cedmad" value="<?php echo $regpadres['cedula_mad']; ?>" />
			    <input type="hidden" name="nommad" value="<?php echo $regpadres['nombre_mad']; ?>" />
			    <input type="hidden" name="apemad" value="<?php echo $regpadres['apellido_mad']; ?>" />
			    <input type="hidden" name="fili" value="<?php echo $regpadres['filiacion']; ?>" />
			  <?php
			    if($_GET['opc']==4)
			    {
			  ?>
					<input type="hidden" name="ed" value="<?php echo $reg['edad_per']; ?>" />
				    <input type="hidden" name="ln" value="<?php echo $reg['lugarnac_per']; ?>" />
				    <input type="hidden" name="est" value="<?php echo $reg['estadodir_per']; ?>" />
				    <input type="hidden" name="dom" value="<?php echo $reg['direccion_per']; ?>" />

			    	<input type="hidden" name="lugarbauesp" value="<?php echo $_GET['lugbauesp']?>" />
					<input type="hidden" name="otrolugarbauesp" value="<?php echo $_GET['otrolugesp']?>" />
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
			}
			if(($_GET['opc']==5) or ($_GET['opc']==8) or ($_GET['opc']==9))
			{
		 ?>
		 		<input type="hidden" name="tipbusq" value="<?php echo $_GET['tipobusq']?>" />
		 		<input type="hidden" name="cedu" value="<?php echo $_GET['cedula']?>" />
		 		<input type="hidden" name="codi" value="<?php echo $reg['codigo_per']?>" />
			    <input type="hidden" name="nomb" value="<?php echo $reg['nombre_per']; ?>" />
			    <input type="hidden" name="apell" value="<?php echo $reg['apellido_per']; ?>" />
			    <input type="hidden" name="fechanacimiento" value="<?php echo $reg['fechanac_per']; ?>" />
			<?php
				$registrospadres=mysqli_query($conexion,"SELECT pad.nombre_pad,pad.apellido_pad,mad.nombre_mad,mad.apellido_mad,padper.filiacion FROM padre pad,madre mad,padrespersona padper WHERE padper.codigo_per='$reg[codigo_per]' AND pad.cedula_pad=padper.cedula_pad AND mad.cedula_mad=padper.cedula_mad");
				@$regpadres=mysqli_fetch_array($registrospadres);
			?>
					<input type="hidden" name="pad" value="<?php echo $regpadres['nombre_pad'].' '.$regpadres['apellido_pad']; ?>" />
					<input type="hidden" name="mad" value="<?php echo $regpadres['nombre_mad'].' '.$regpadres['apellido_mad']; ?>" />
					<input type="hidden" name="fil" value="<?php echo $regpadres['filiacion']; ?>" />
			<?php
			}
			if($_GET['opc']==5)
			{
			?>
			    <input type="hidden" name="eda" value="<?php echo $reg['edad_per']; ?>" />
			    <input type="hidden" name="lugarnacimiento" value="<?php echo $reg['lugarnac_per']; ?>" />
			    <input type="hidden" name="estad" value="<?php echo $reg['estadodir_per']; ?>" />
			    <input type="hidden" name="domic" value="<?php echo $reg['direccion_per']; ?>" />

			    <input type="hidden" name="lugarbauesp" value="<?php echo $_GET['lugbauesp']?>" />
				<input type="hidden" name="otrolugarbauesp" value="<?php echo $_GET['otrolugesp']?>" />
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
				<input type="hidden" name="tipbusqesp" value="<?php echo $_GET['tipobusquedaesp']?>" />
				<input type="hidden" name="codiesp" value="<?php echo $_GET['nuevocodigoesp']?>" />
				<input type="hidden" name="ceduesp" value="<?php echo $_GET['cedesp']?>" />
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
				<input type="hidden" name="noesp" value="<?php echo $_GET['nomesp']?>" />
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
		</form>
<?php
	}
	else
	{
?>
		<form name="auxiliar" id="auxiliar" method="post" action="<?php if($_GET['opc']==2) echo '../pages/comunion.php?fec='.$fec.'&min='.$min.'#persona'; if($_GET['opc']==3) echo '../pages/confirmacion.php?fec='.$fec.'&min='.$min.'#persona'; if($_GET['opc']==4) echo '../pages/registroesposo.php#persona'; if($_GET['opc']==5)  echo '../pages/registroesposo.php#buscar'; if($_GET['opc']==6) echo '../pages/registroesposo.php#personaesp'; if($_GET['opc']==7) echo '../pages/registroesposo.php#buscaresp'; if($_GET['opc']==8) echo '../pages/comunion.php?fec='.$fec.'&min='.$min.'#buscar'; if($_GET['opc']==9) echo '../pages/confirmacion.php?fec='.$fec.'&min='.$min.'#buscar'; ?>">
	  		<input type="hidden" name="lugarbau" value="<?php echo $_GET['lugbau']?>" />
	  <?php
	  	if(($_GET['opc']!=5) and ($_GET['opc']!=8) and ($_GET['opc']!=9))
	  	{
	  ?>
		  <input type="hidden" name="otrolugarbau" value="<?php echo $_GET['otrolug']?>" />
		  <input type="hidden" name="ced" value="<?php echo $_GET['cedula'] ?>" />
		  <input type="hidden" name="nom" value="" />
		  <input type="hidden" name="ape" value="" />
		  <input type="hidden" name="sex" value="" />
		  <input type="hidden" name="fn" value="" />
		  
	  	  <input type="hidden" name="cedpad" value="" />
		  <input type="hidden" name="nompad" value="" />
		  <input type="hidden" name="apepad" value="" />
		  <input type="hidden" name="cedmad" value="" />
		  <input type="hidden" name="nommad" value="" />
		  <input type="hidden" name="apemad" value="" />
		  <?php
		  	if($_GET['opc']==4)
			{
		  ?>
				<input type="hidden" name="ed" value="" />
				<input type="hidden" name="ln" value="" />
				<input type="hidden" name="fn" value="" />
				<input type="hidden" name="est" value="" />
				<input type="hidden" name="dom" value="" />

		    	<input type="hidden" name="lugarbauesp" value="<?php echo $_GET['lugbauesp']?>" />
				<input type="hidden" name="otrolugarbauesp" value="<?php echo $_GET['otrolugesp']?>" />
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
				<input type="hidden" name="noesp" value="<?php echo $_GET['nomesp']?>" />
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
		}
		if(($_GET['opc']==5) or ($_GET['opc']==8) or ($_GET['opc']==9))
		{
		?>
	 		<input type="hidden" name="tipbusq" value="" />
	 		<input type="hidden" name="cedu" value="" />
	 		<input type="hidden" name="codi" value="" />
		    <input type="hidden" name="nomb" value="" />
		    <input type="hidden" name="apell" value="" />
		    <input type="hidden" name="fechanacimiento" value="" />
			<input type="hidden" name="pad" value="" />
			<input type="hidden" name="mad" value="" />
			<input type="hidden" name="fil" value="" />
		<?php
		}
		if($_GET['opc']==5)
		{
		?>
		    <input type="hidden" name="eda" value="" />
		    <input type="hidden" name="lugarnacimiento" value="" />
		    <input type="hidden" name="estad" value="" />
		    <input type="hidden" name="domic" value="" />

	      	<input type="hidden" name="lugarbauesp" value="<?php echo $_GET['lugbauesp']?>" />
			<input type="hidden" name="otrolugarbauesp" value="<?php echo $_GET['otrolugesp']?>" />
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
			<input type="hidden" name="noesp" value="<?php echo $_GET['nomesp']?>" />
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
	}
	 	?>
	</form>
<?php
}
else
{
?>
	<form name="auxiliar" id="auxiliar" method="post" action="<?php if($_GET['opc']==2) echo '../pages/comunion.php?fec='.$fec.'&min='.$min.'#persona'; if($_GET['opc']==3) echo '../pages/confirmacion.php?fec='.$fec.'&min='.$min.'#persona'; if($_GET['opc']==4) echo '../pages/registroesposo.php#persona'; if($_GET['opc']==5) echo '../pages/registroesposo.php#buscar'; if($_GET['opc']==6) echo '../pages/registroesposo.php#personaesp'; if($_GET['opc']==7) echo '../pages/registroesposo.php#buscaresp'; if($_GET['opc']==8) echo '../pages/comunion.php?fec='.$fec.'&min='.$min.'#buscar'; if($_GET['opc']==9) echo '../pages/confirmacion.php?fec='.$fec.'&min='.$min.'#buscar'; ?>">
	 	<input type="hidden" name="lugarbau" value="<?php echo $_GET['lugbau']?>" />
	  <?php
	  	if(($_GET['opc']!=5) and ($_GET['opc']!=8) and ($_GET['opc']!=9))
	  	{
	  ?>
	  	  
		  <input type="hidden" name="otrolugarbau" value="<?php echo $_GET['otrolug']?>" />
		  <input type="hidden" name="ced" value="" />
		  <input type="hidden" name="nom" value="" />
		  <input type="hidden" name="ape" value="" />
		  <input type="hidden" name="sex" value="" />
		  <input type="hidden" name="fn" value="" />
		  
	  	  <input type="hidden" name="cedpad" value="" />
		  <input type="hidden" name="nompad" value="" />
		  <input type="hidden" name="apepad" value="" />
		  <input type="hidden" name="cedmad" value="" />
		  <input type="hidden" name="nommad" value="" />
		  <input type="hidden" name="apemad" value="" />
		  <?php
		  	if($_GET['opc']==4)
			{
		  ?>
				<input type="hidden" name="ed" value="" />
			    <input type="hidden" name="ln" value="" />
			    <input type="hidden" name="fn" value="" />
			    <input type="hidden" name="est" value="" />
			    <input type="hidden" name="dom" value="" />

		    	<input type="hidden" name="lugarbauesp" value="<?php echo $_GET['lugbauesp']?>" />
				<input type="hidden" name="otrolugarbauesp" value="<?php echo $_GET['otrolugesp']?>" />
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
		}
		if(($_GET['opc']==5) or ($_GET['opc']==8) or ($_GET['opc']==9))
		{
		?>
	 		<input type="hidden" name="tipbusq" value="" />
	 		<input type="hidden" name="cedu" value="" />
	 		<input type="hidden" name="codi" value="" />
		    <input type="hidden" name="nomb" value="" />
		    <input type="hidden" name="apell" value="" />
		    <input type="hidden" name="fechanacimiento" value="" />
			<input type="hidden" name="pad" value="" />
			<input type="hidden" name="mad" value="" />
			<input type="hidden" name="fil" value="" />
		<?php
		}
		if($_GET['opc']==5)
		{
		?>
	      <input type="hidden" name="eda" value="" />
	      <input type="hidden" name="lugarnacimiento" value="" />
	      <input type="hidden" name="estad" value="" />
	      <input type="hidden" name="domic" value="" />

	      <input type="hidden" name="lugarbauesp" value="<?php echo $_GET['lugbauesp']?>" />
		  <input type="hidden" name="otrolugarbauesp" value="<?php echo $_GET['otrolugesp']?>" />
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
		  <input type="hidden" name="noesp" value="<?php echo $_GET['nomesp']?>" />
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
	</form>
<?php
}
?>
	<script type="text/javascript">
	  document.auxiliar.submit();
	</script>