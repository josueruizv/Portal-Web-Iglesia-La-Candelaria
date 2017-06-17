<?php
	include('conexion.php');

	if(isset($_POST['cedu']))
	{
	
	$registros=mysqli_query($conexion,"select * from personas where cedula_per=trim('$_POST[cedu]')");
?>
	<br>
	<?php
		if($reg=mysqli_fetch_array($registros))
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
			<tr>
			<td align="center"><?php echo $reg['codigo_per']; ?></td>
			<td align="center"><?php echo $reg['cedula_per']; ?></td>
			<td align="center"><?php echo $reg['nombre_per']; ?></td>
			<td align="center"><?php echo $reg['apellido_per']; ?></td>
			<td align="center"><?php echo $reg['sexo_per']; ?></td>
			<?php
				$fnac = date('d/m/Y', strtotime(str_replace('/', '-', $reg['fechanac_per'])));
			?>
			<td align="center"><?php echo $fnac; ?></td>
			<?php
				$registrospadres=mysqli_query($conexion,"SELECT pad.cedula_pad,pad.nombre_pad,pad.apellido_pad,mad.cedula_mad,mad.nombre_mad,mad.apellido_mad FROM padre pad,madre mad,padrespersona padper WHERE padper.codigo_per='$reg[codigo_per]' AND pad.cedula_pad=padper.cedula_pad AND mad.cedula_mad=padper.cedula_mad");
	    		$regpadres=mysqli_fetch_array($registrospadres);
			?>
			<td align="center"><?php echo $regpadres['nombre_pad'].' '.$regpadres['apellido_pad']; ?></td>
			<td align="center"><?php echo $regpadres['nombre_mad'].' '.$regpadres['apellido_mad']; ?></td>
			</tr>
		</table>
	<?php 
		}
		else
		{
			echo '<h6 align="center" class="alerta"> No ha ingresado datos válidos o no existen registros </h6>';
		}
	?>
<?php 
	} 
	else
	{
		echo '<h6 align="center" class="alerta"> No ha ingresado datos válidos o no existen registros </h6>';
	}
?>

<?php mysqli_close($conexion); ?>