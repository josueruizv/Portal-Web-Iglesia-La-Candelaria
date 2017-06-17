<?php
	function calcularInactividad()
	{
		$fechaGuardada=$_SESSION["ultimoAcceso"];
	    $ahora=date("Y-n-j H:i:s");
	    $tiempo_transcurrido=(strtotime($ahora)-strtotime($fechaGuardada));
	    //comparamos el tiempo transcurrido
	    if($tiempo_transcurrido>=1200)
	    {
	      session_destroy(); // destruyo la sesión
	      header("Location: login.php?error=2"); //envío al usuario a la pag. de autenticación
	      //sino, actualizo la fecha de la sesión
	    }
	    else
	    {
	      $_SESSION["ultimoAcceso"] = $ahora; 
	    }
	}
?>