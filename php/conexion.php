<?php 
	//archivo de configuracion 
	//nombre del servidor 
	$servidor="localhost"; 
	//usuario de la base de datos 
	$usuario="root"; 
	//nombre de la base de datos
	$basedatos="iglesia"; 
	//password de la base 
	$passwordbd=""; 
	// se realiza la conexion, la funcion recibe los elementos configurados anteriormente, 
	$conexion=mysqli_connect($servidor,$usuario,$passwordbd,$basedatos) or die("Error en la Conexión"); 

	$conexion->query("SET NAMES 'utf8'");

?> 