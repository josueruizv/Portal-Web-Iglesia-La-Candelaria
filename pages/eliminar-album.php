<?php 
  session_start();
  include('../php/conexion.php');
  if(isset($_SESSION['usuario_nombre'])) 
  {
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();
    
  	$codigo=$_GET['cod'];
    $registros=mysqli_query($conexion,"SELECT * FROM fotos WHERE id=$codigo");
    if($reg=mysqli_fetch_array($registros))
    {
    	$carpeta='../'.$reg['ruta_directorio'];
    	include('../php/libreria.php');
    	$borrar=borraralbum($codigo,$carpeta);
    }
    else
    {
        header("location: fotos.php");
    }
  }
  else 
  {
    header("Location: login.php");
  }
?>  