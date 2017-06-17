<?php
  header('Content-type: text/html; charset=utf-8');
  session_start();
  include('../php/conexion.php');
  if(isset($_SESSION['usuario_nombre'])) 
  {
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();
?>
  <!DOCTYPE html>
  <html lang="es">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Parroquia Ntra. Sra. de la Candelaria</title>

      <!-- Bootstrap -->
      <link href="../css/bootstrap.min.css" rel="stylesheet">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

      <!-- Bootstrap -->
      <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.7.2.custom.css" />
      <!-- Estilo Personalizado -->
      <link rel="stylesheet" type="text/css" href="../css/personalizacion.css">
      <!-- Calendario -->
      <link rel="stylesheet" type="text/css" href="../css/default.css" />
      <link rel="stylesheet" type="text/css" href="../css/sweet-alert.css" />
      <style type="text/css" media="screen">
        #cabeceras img
        {
          border-bottom: 3px solid #fff;
        }
        .albumes
        {
          margin-top: 20px;
          padding-top: 40px;
          padding-bottom: 40px;
        }
        .thumbnail
        {
          width: 250px;
          height: 250px;
          background-color: #c6c6c6;
        }
        .thumbnail img
        {
          width: 240px;
          height: 200px;
        }
        .caption
        {
          overflow: hidden;
          white-space: nowrap;
          text-overflow: ellipsis;
          text-align: center;
          color: #000;
        }



        .image_wrapper .remove, .image_wrapper .add{
            position:absolute;
            bottom:23px;
            opacity:0;
            transition:opacity 0.5s linear;
            -webkit-transition:opacity 0.5s linear;
            cursor:pointer;
            border:0px;
            width:40px;
            height:40px;
        }
        
        /* Mostramos el icono al pasar por encima de la imagen con una transicion */
        .image_wrapper:hover .remove, .image_wrapper:hover .add{
            transition: opacity 0.5s linear;
            -webkit-transition: opacity 0.5s linear;
            opacity: 1;
        }
        
        /* Posicionamos los botones en la posicion derecha */
        .image_wrapper .remove, .image_wrapper .add{
            right:30px;
        }

        #agregar
        {
          margin-top: 100px;
        }
      </style>

    </head>
    <body>
      <div id="contenedor-prin" class="container">
        <div class="row">
          <div id="cabecera" class="col-sm-13">
            <img class="img-responsive" src="../images/cabecera.png">
            <h3>Albumes</h3>
          </div>
        </div>
        <div class="row galeria">
          <div class="col-sm-12 albumes">
            <?php 
              include('../php/libreria.php');
              $mostrar=modificar_albumes();
            ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-5"></div>
          <div class="col-sm-2">
            <a href="acceso.php"><input type="button" class="btn btn-danger btn-lg btn-block" value="Salir"></a>
          </div>
        </div>
        <br>
      </div>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="../js/bootstrap.min.js"></script>
      <!-- Mostrar Objetos Ocultos -->
      <script src="../js/mostrar.js"></script>
      <!-- Alertas Personalizadas -->
      <script src="../js/sweet-alert.js"></script>
    </body>
  </html>
<?php
    
  }
  else 
  {
    header("Location: login.php");
  }
?>  