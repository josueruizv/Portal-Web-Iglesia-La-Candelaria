<?php
  include ("../php/libreria.php");
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
    <link rel="stylesheet" type="text/css" href="../css/personalizacion.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css" media="screen">
      body
      {
        background-color: #c0c0c0;
      }
      #cabeceras img
      {
        border-bottom: 3px solid #222222;
      }
      .iniciacion
      {
        margin-top: 20px;
      }
      .iniciacion p,.letra
      {
        font-size: 17px;
        text-align: justify;
        color: #fff;
      }
      .iniciacion h4
      {
        text-align: center;
        color: #fff;
      }
      .iniciacion h4 span
      {
        text-align: center;
        color: #fff;
        font-style: italic;
      }
      .iniciacion img
      {
        margin: auto;
      }
      .ini
      {
        padding-top: 40px;
        padding-bottom: 40px;
        border-left: 1px solid #949494;
      }
      .ini img
      {
        border: solid 3px #000;
      }
    </style>
      
  </head>
  <body>
    <div id="contenedor-principal" class="container">
      <div class="row">
        <div id="cabeceras" class="col-sm-13">
          <img class="img-responsive" src="../images/cabecera.png">          
        </div>  
      </div>
     <div class="row">
        <div class="col-sm-13">
          <nav id="menu" class="navbar navbar-default" role="navigation">
            <div class="container-fluit">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acolapsar">
                  <span class="sr-only">Toggle Navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a href=".." class="navbar-brand">Ntra. Sra. de la Candelaria</a>
              </div>
              <div class="collapse navbar-collapse" id="acolapsar">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href=".."><p class="titulos"><span class="glyphicon glyphicon-home"></span> Inicio </p></a></li>
                  <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"><span class="glyphicon glyphicon-info-sign"></span> La Parroquia <b class="caret"></p></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="historia.php"> Historia </a></li>
                      <li><a href="despacho.php"> Despacho </a></li>
                      <li><a href="galeria.php"> Galeria </a></li>
                      <li><a href="proyecto.php">Proyecto del Templo</a></li>
                    </ul>
                  </li>
                  <li class="dropdown active">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"><span class="glyphicon glyphicon-pencil"></span> Servicios <b class="caret"></p></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="bautizos.php"> Bautizo </a></li>
                      <li class="active"><a href=""> Iniciación Cristiana </a></li>
                      <li><a href="primeracomunion.php"> Primera Comunión </a></li>
                      <li><a href="confirmaciones.php"> Confirmación </a></li>
                      <li><a href="matrimonio.php"> Matrimonio </a></li>
                      <li><a href="uncion.php"> Unción de los Enfermos </a></li>
                      <li><a href="confesiones.php"> Confesión </a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"><span class="glyphicon glyphicon-user"></span> Vida Parroquial <b class="caret"></p></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="apostolados.php"> Grupos de Apostolado </a></li>
                    </ul>
                  </li>
                   <li><a href="donaciones.php"><p class="titulos"><span class="glyphicon glyphicon-credit-card"></span> Donaciones </p></a></li>
                   <li><a href="contacto.php"><p class="titulos"><span class="glyphicon glyphicon-earphone"></span> Contacto </p></a></li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-11 titles">
            <hgroup>
              <h3>Iniciación Cristiana</h3>
            </hgroup>
        </div>
      </div>
      <div class="row iniciacion">
        <div class="col-sm-12">
          <div class="col-sm-4 aside">
            <div class="row"> 
              <div class="col-sm-1"></div>
              <div class="col-sm-11 tit">
                <header>Horario de Misas</header>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-9" id="horario">
                 <header>Lunes a Sábado:</header>
                <?php  
                  $codi=5;
                  $hdi=horariomisas($codi,2);
                ?>
                <header>Dominicales:</header>
                <?php  
                  $cod=4;
                  $hdo=horariomisas($cod,2);
                ?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-11 tit">
                <a href="http://www.es.catholic.net/evangeliodehoy/" target="_blank"><header>Evangelio de Hoy</header></a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-9 pic">
                 <a href="http://www.es.catholic.net/evangeliodehoy/" target="_blank"><img class="img-responsive" src="../images/evangelio.png"></a>         
              </div>
            </div>
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-11 tit">
                <header>Enlaces</header>
              </div>
            </div>
            <div class="row">
             <div class="col-sm-2"></div>
             <div class="col-sm-9 pic">
                <a href="http://www.vatican.va/phome_sp.htm" target="_blank"><img class="img-responsive" src="../images/vaticano.png"></a>
                <a href="http://www.cev.org.ve/" target="_blank"><img class="img-responsive" src="../images/episcopal.png"></a>
                <a href="http://www.diocesisdetrujillo.org.ve/" target="_blank"><img class="img-responsive" src="../images/diocesis.png"></a>
                <a href="http://semanariocatolicoavance.com/" target="_blank"><img class="img-responsive" src="../images/avance.png"></a>
                <a href="http://www.aciprensa.com///" target="_blank"><img class="img-responsive" src="../images/aciprensa.png"></a>
                <a href="http://www.tucristo.com//" target="_blank"><img class="img-responsive" src="../images/tucristo.png"></a>           
             </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="col-sm-12 ini">
              <div class="col-sm-12">
                <div class="col-sm-12">
                  <img class="img-responsive" src="../images/iniciacion.png"/>
                </div>
              </div>
              
              <div class="col-sm-12 cita">
                <div class="col-sm-12">
                  <h4><span>"Dejen que los niños vengan a mí, y no se lo impidan, porque el reino de los cielos es de quienes son como ellos."</span> Mt. 19, 14</h4>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-12">
                  <p>La Iniciación Cristiana busca ser lo que su título indica, una iniciación a la fe que presenta el mensaje de Jesús en forma sencilla y atractiva para los niños que comienzan la catequesis. Incluye, como proceso de iniciación, la preparación y recepción de los sacramentos de la Eucaristía y el Perdón.</p>
                  <br>
                  <p><li class="letra">Renovación de las Promesas Bautismales</li></p>
                  <p><li class="letra">Rito de la Luz</li></p>
                  <br>
                  <p class="requisitos"><b>Requisitos:</b><p>
                  <br>
                  <p>- El niño debe estar bautizado </p>
                  <p>- Tener 9 años de edad cumplidos</p>
                  <p>- Asistir a misa todos los domingos con sus padres</p>
                </div>
              </div>
            </div>
            <div class="col-sm-8 ">
              <div class="col-sm-12 sac">
                <div class="col-sm-12">
                  <div class="col-sm-12">
                    <ul>
                      <li><a href="bautizos.php">Bautizo</a></li>
                      <li><a href="primeracomunion.php">Primera Comunión</a></li>
                      <li><a href="confirmaciones.php">Confirmación</a></li>
                      <li><a href="matrimonio.php">Matrimonio</a></li>
                      <li><a href="confesiones.php">Confesiones</a></li>
                      <li><a href="uncion.php">Unción de los Enfermos</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="footer">
        <div class="col-sm-12" id="desarrollado">
          <center>..:: Desarrollado por <a href="https://twitter.com/belkisrubio" target="_blank">Belkis Rubio</a> y <a href="https://twitter.com/josueruiz91" target="_blank">Josué Ruiz</a> bajo la dirección de la <a href="http://www.uvm.edu.ve" target="_blank">Universidad Valle del Momboy</a> ::..</center>
        </div>
        <div class="col-sm-12" id="pie">
          <p>Parroquia Nuestra Señora de la Candelaria</p>
          <p>Urb. La Beatriz, Valera</p>
          <p>Trujillo - Venezuela</p>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Slide -->
    <script src="../js/slide.js"></script>
  </body>
</html>