<?php
	include('conexion.php');

	if((isset($_POST['nomb']) and trim($_POST['nomb'])!="") or (isset($_POST['ape'])) and (trim($_POST['ape'])!=""))
	{
		if(isset($_POST['fechanac']) and trim($_POST['fechanac'])!="")
		{
			$registros=mysqli_query($conexion,"SELECT * from personas where (nombre_per like '%".$_POST['nomb']."%') and (apellido_per like '%".$_POST['ape']."%') and (fechanac_per= str_to_date('".$_POST['fechanac']."','%Y-%m-%d'))");
		}
		else
		{
			$registros=mysqli_query($conexion,"SELECT * from personas where (nombre_per like '%".$_POST['nomb']."%') and (apellido_per like '%".$_POST['ape']."%')");
		}

		@$num_resultados=mysqli_num_rows($registros);
		if($num_resultados>0)
		{
	?>
		<table class="table table-bordered">

			<tr>
			<th class="text-center">Codigo</th>
			<th class="text-center">Cedula</th>
			<th class="text-center">Nombre</th>
			<th class="text-center">Apellido</th>
			<th class="text-center">Sexo</th>
			<th class="text-center">Fecha de Nacimiento</th>
			<th class="text-center">Padre</th>
			<th class="text-center">Madre</th>
			</tr>

			<?php for($i=0;$i<$num_resultados;$i++)
			{ 

				$reg=mysqli_fetch_array($registros);
			?>

			<tr>
				<td align="center"><a href="#" <?php if($_POST['tipo']==0) {?>id="<?php echo 'codigoper'.$i; ?>"<?php } if($_POST['tipo']==1) {?> id="<?php echo 'codigoperesp'.$i; ?>"<?php } ?> onclick="<?php if($_POST['tipo']==0) { if($_POST['op']==4) {echo 'llenare('.$i.');return false;'; } else { echo 'llenar('.$i.');return false;';}} if($_POST['tipo']==1){ echo 'llenaresp('.$i.');return false;'; }?>"><?php echo $reg['codigo_per']; ?></a></td>
				<td align="center" <?php if($_POST['tipo']==0) {?>id="<?php echo 'cedulaper'.$i; ?>"<?php } if($_POST['tipo']==1) {?> id="<?php echo 'cedulaperesp'.$i; ?>"<?php } ?>><?php echo $reg['cedula_per']; ?></td>
				<td align="center" <?php if($_POST['tipo']==0) {?>id="<?php echo 'nombreper'.$i; ?>"<?php } if($_POST['tipo']==1) {?> id="<?php echo 'nombreperesp'.$i; ?>"<?php } ?>><?php echo $reg['nombre_per']; ?></td>
				<td align="center" <?php if($_POST['tipo']==0) {?>id="<?php echo 'apellidoper'.$i; ?>"<?php } if($_POST['tipo']==1) {?> id="<?php echo 'apellidoperesp'.$i; ?>"<?php } ?>><?php echo $reg['apellido_per']; ?></td>
				<td align="center"><?php echo $reg['sexo_per']; ?></td>
				
				<td align="center" <?php if($_POST['tipo']==0) {?>id="<?php echo 'fechanacper'.$i; ?>"<?php } if($_POST['tipo']==1) {?> id="<?php echo 'fechanacperesp'.$i; ?>"<?php } ?>><?php echo $reg['fechanac_per']; ?></td>
				<?php
					$registrospadres=mysqli_query($conexion,"SELECT pad.cedula_pad,pad.nombre_pad,pad.apellido_pad,mad.cedula_mad,mad.nombre_mad,mad.apellido_mad,padper.filiacion FROM padre pad,madre mad,padrespersona padper WHERE padper.codigo_per='$reg[codigo_per]' AND pad.cedula_pad=padper.cedula_pad AND mad.cedula_mad=padper.cedula_mad");
		    		$regpadres=mysqli_fetch_array($registrospadres);
				?>
				<span <?php if($_POST['tipo']==0) {?>id="<?php echo 'edadper'.$i; ?>"<?php } if($_POST['tipo']==1) {?>id="<?php echo 'edadperesp'.$i; ?>"<?php } ?> style="display: none"><?php echo $reg['edad_per']; ?></span>
				<span <?php if($_POST['tipo']==0) {?>id="<?php echo 'lugarnacper'.$i; ?>"<?php } if($_POST['tipo']==1) {?>id="<?php echo 'lugarnacperesp'.$i; ?>"<?php } ?> style="display: none"><?php echo $reg['lugarnac_per']; ?></span>
				<span <?php if($_POST['tipo']==0) {?>id="<?php echo 'estadoper'.$i; ?>"<?php } if($_POST['tipo']==1) {?>id="<?php echo 'estadoperesp'.$i; ?>"<?php } ?> style="display: none"><?php echo $reg['estadodir_per']; ?></span>
				<span <?php if($_POST['tipo']==0) {?>id="<?php echo 'domicilioper'.$i; ?>"<?php } if($_POST['tipo']==1) {?>id="<?php echo 'domicilioperesp'.$i; ?>"<?php } ?> style="display: none"><?php echo $reg['direccion_per']; ?></span>
				<td align="center" <?php if($_POST['tipo']==0) {?>id="<?php echo 'padreper'.$i; ?>"<?php } if($_POST['tipo']==1) {?>id="<?php echo 'padreperesp'.$i; ?>"<?php } ?>><?php echo $regpadres['nombre_pad'].' '.$regpadres['apellido_pad'];?></td>
				<td align="center" <?php if($_POST['tipo']==0) {?>id="<?php echo 'madreper'.$i; ?>"<?php } if($_POST['tipo']==1) {?>id="<?php echo 'madreperesp'.$i; ?>"<?php } ?>><?php echo $regpadres['nombre_mad'].' '.$regpadres['apellido_mad']; ?></td>
				<span <?php if($_POST['tipo']==0) {?>id="<?php echo 'filiacionper'.$i; ?>"<?php } if($_POST['tipo']==1) {?>id="<?php echo 'filiacionperesp'.$i; ?>"<?php } ?> style="display: none"><?php echo $regpadres['filiacion']; ?></span>
				</tr>
		<?php 
			} 
			
		?>

		</table>
	<?php
		} 
		else
		{
			echo '<h6 align="center" class="alerta"> No ha ingresado datos válidos o no existen registros </h6>';
		}
	}
	else
	{
		echo '<h6 align="center" class="alerta" id="alerta"> No ha ingresado datos válidos o no existen registros </h6>';
	} 
?>

<?php mysqli_close($conexion); ?>