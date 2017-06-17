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
      .historia
      {
        margin-top: 20px;
      }
      .historia p
      {
        text-align: justify;
        color: #222222;
      }
      .historia img
      {
        margin: auto;
      }
      .titulos
      {
        font-size: 16px;
        margin: 0;
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
                  <li class="dropdown active">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"><span class="glyphicon glyphicon-info-sign"></span> La Parroquia <b class="caret"></p></b></a>
                    <ul class="dropdown-menu">
                      <li class="active"><a href=""> Historia </a></li>
                      <li><a href="despacho.php"> Despacho </a></li>
                      <li><a href="galeria.php"> Galeria </a></li>
                      <li><a href="proyecto.php">Proyecto del Templo</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"><span class="glyphicon glyphicon-pencil"></span> Servicios <b class="caret"></p></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="bautizos.php"> Bautizo </a></li>
                      <li><a href="iniciacion.php"> Iniciación Cristiana </a></li>
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
                      <li><a href="#"> Párroco </a></li>
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
              <h3>Historia de la Parroquia</h3>
            </hgroup>
        </div>
      </div>
      <div class="row historia">
        <div class="col-sm-12">
          <div class="col-sm-8">
            <div class="col-sm-12 contenido">
              <div class="col-sm-8">
                <div class="col-sm-12">
                  <p>Nuestra Señora de la Candelaria, patrona de La Beatriz ha venido acompañando a sus habitantes desde sus inicios, bendiciendo a las familias que poco a poco fueron poblando dicho sector valerano. Mons. Félix Serrano(+), quien para ese entonces era el párroco de "Jesús Obrero" de El Milagro - Valera, fue el primero en brindarle atención espiritual, celebrando la Santa Misa en los pasillos de los bloques.</p>
                  <p>El 7 de febrero de 1980 llega el Padre Orán Ramírez a ayudar a Mons. Serrano, visita los hogares y celebra la Misa Dominical en bloque 14 cerca de la residencia que el INAVI asignó para el sacerdote.</p>  
                </div>
              </div>
              <div class="col-sm-4">
                <div class="col-sm-12">
                  <div class="col-sm-12">
                    <img class="img-responsive" src="../images/procesion.png">
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-12">
                  <p>Del 30 al 06 de Abril de 1980 se celebró en La Beatriz la primera Semana Santa. Al ser transladado el Padre Orán Ramírez a la parroquia Ntra. Señora de la Paz de Monay, inicia su apostolado en La Beatriz el seminarista teólogo Pedro Balza, presentado a la comunidad por Mons. Serrano el 1ero de Noviembre de 1980. Siete meses después el diácono Pedro Balza es ordenado sacerdote por Mons. José León Rojas Obispo de Trujillo para aquel entonces. El Padre Pedro Balza comienza a celebrar la Eucaristía en un local que había sido el módulo policial y después fue cedido para convertirlo en una capilla. Mons. Rojas bendice dicha capilla el 18 de Octubre de 1981 y le nombra vice-paroquia. Un grupo de vecinos pidieron al Sr. Obispo que la futura parroquia llevara el nombre de Nuestra Señora de la Candelaria.</p>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="col-sm-12">
                  <div class="col-sm-12">
                    <img class="img-responsive" src="../images/templo.jpg">
                  </div>
                </div>
              </div>
              <div class="col-sm-7">
                <div class="col-sm-12">
                  <p>El 29 de Septiembre de 1982 el INAVI hizo entrega de la obra de construcción del templo a Mons. Serrano en representación del nuevo Obispo Mons. Vicente Ramón Hernandez Peña (actualmente Obispo Emérito). La inauguración del templo bajo la advocación de Nuestra Señora de la Candelaria estuvo a cargo del Sr. Obispo Diocesano Mons. Vicente acompañado de algunos Pbros. de la Diócesis, entre ellos Félix Serrano y Pedro Balza.</p>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-12">
                  <p>Las primeras fiestas patronales en honor a la Virgen de la Candelaria fueron del 28 de Enero al 6 de Febrero de 1983, siendo el 2 de Febrero el día central.</p>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-12">
                  <p>El 20 de Marzo de 1983 el Presidente Herrera acompañado de la entonces Gobernadora del Estado Dora Maldonado de Falcón y representantes del INAVI, hicieron oficialmente entrega del Templo a la Iglesia Diocesana, el Sr. Obispo recibió la edificación, leyó el documento de levantamiento de la nueva parroquia "Nuestra Señora de la Candelaria" y entregó el título de párroco al Pbro. Pedro José Balza Mendoza. Estaba presente Mons. Félix Serrano y los miembros del Comité Pro Fondos y Equipamiento del Templo Parroquial, así como también numerosos feligreses de La Beatriz.</p>
                  <p>Después del Pbro. Balza fue nombrado como párroco el Pbro. Pedro Artigas el 1ero de Septiembre de 1985 por el Obispo de la Diócesis Mons. Vicente Ramón Hernández, el Padre Artigas desarrolló una loable labor pastoral y le correspondió construir la Casa y el Salón Parroquial.</p>
                  <p>El 1ero de Mayo de 1999 Mons. Vicente Ramón Hernández nombra como nuevo párroco al Pbro. Luis Bolívar quien le dió continuidad a la labor pastoral de sus antecesores y durante 10 años realizó grandes esfuerzos por el fortaleciendo de los movimientos apostólicos y de las obras de misericordia en la atención del adulto mayor y los más necesitados. Además el Padre Bolívar, conjuntamente con la feligresía de La Beatriz, realizó obras de remodelación del Templo, mejorando así la fachada y el interior del mismo.</p>
                </div>
              </div>
              <div class="col-sm-7">
                <div class="col-sm-12">
                  <p>En esta última etapa, el Pbro. Francisco A. Linares L., nombrado nuevo párroco de La Beatriz el 1ero de Noviembre del 2009, reconociendo el esfuerzo y el trabajo de sus predecesores y teniendo presente el crecimiento poblacional de la urbanización, ha emprendido la obra de ampliación y embellecimiento del templo parroquial pensando en el hoy y en el mañana, con el único fin de hacer de nuestra comunidad cristiana y parroquial un modelo de vida espiritual y pastoral en donde todos como una gran familia seamos adoradores de Dios en espíritu y verdad.</p>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="col-sm-12">
                  <div class="col-sm-12">
                    <img class="img-responsive" src="../images/frentenuevotemplo.jpg">
                  </div>
                </div>
              </div>
            </div>
          </div>
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
        </div>
      </div>
      <div class="row" id="footer">
        <div class="col-sm-13">
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
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Slide -->
    <script src="../js/slide.js"></script>
  </body>
</html>