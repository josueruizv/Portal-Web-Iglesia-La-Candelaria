<?php
    session_start();
    include('conexion.php'); // incluímos los datos de acceso a la BD
    session_destroy();
    header("Location: ../pages/login.php");
?>  