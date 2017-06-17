<?php
    include('conexion.php');
    if(isset($_POST['ingresar'])) // comprobamos que se hayan enviado los datos del formulario
    { 
        // comprobamos que los campos usuarios_nombre y usuario_clave no estén vacíos
        if(empty($_POST['user']) || empty($_POST['pass'])) 
        {
            header("Location: ../pages/login.php?error=1");
        }
        else 
        {
            // "limpiamos" los campos del formulario de posibles códigos maliciosos
            $usuario_nombre = mysqli_real_escape_string($conexion,$_POST['user']);
            $usuario_clave = mysqli_real_escape_string($conexion,$_POST['pass']);
            $usuario_clave = md5($usuario_clave);

            // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
            $registros = mysqli_query($conexion,"SELECT usuario_id, usuario_nombre, usuario_clave, usuario_grado FROM usuarios WHERE usuario_nombre='$usuario_nombre' AND usuario_clave='$usuario_clave'");
            if($reg = mysqli_fetch_array($registros)) 
            {
                session_start();
                $_SESSION['usuario_id'] = $reg['usuario_id']; // creamos la sesion "usuario_id" y le asignamos como valor el campo usuario_id
                $_SESSION['usuario_nombre'] = $reg['usuario_nombre']; // creamos la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre
                $_SESSION['usuario_grado'] = $reg['usuario_grado']; // creamos la sesion "usuario_grado" y le asignamos como valor el campo usuario_grado
                $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s"); 
                header("Location: ../pages/acceso.php");
            }
            else 
            {
                header("Location: ../pages/login.php?error=1");
            }
        }
    }
    else 
    {
        header("Location: ../pages/login.php");
    }
?> 