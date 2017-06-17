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
      .proyecto
      {
        margin-top: 20px;
      }
      .proyecto p
      {
        text-align: justify;
        color: #fff;
      }
      .proyecto img
      {
        margin: auto;
      }
      .titulos
      {
        font-size: 16px;
        margin: 0;
      }
      .image
      {
        max-height: 150px;
      }
      .pro
      {
        background-color: #4a4a4a;
        padding-top: 40px;
        padding-bottom: 40px;
        box-shadow: #949494 0 0 1em;
      }
      .mens
      {
        font-size: 14px;
        color: #fff;
        font-family: Tahoma;
        text-align: center;
      }
      #video
      {
        background-color: #4a4a4a; 
        margin: auto;
        padding: 5px 0 5px 0;
      }
      #video header
      {
        font-size: 30px;
        font-family: calibri;
        color: #949494;
        text-align: center;
        padding-bottom: 10px;
      }
      #video iframe
      {
        max-width: 280px;
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
              <h3>Proyecto de Ampliación y Remodelación del Templo</h3>
            </hgroup>
        </div>
      </div>
      <div class="row proyecto">
        <div class="col-sm-12">
          <div class="col-sm-8">
            <div class="col-sm-12 pro">
              <div class="col-sm-12">
                <div class="col-sm-12">
                  <p>Debido al incremento de la densidad de población en la parroquia La Beatriz, se ha hecho insuficiente el espacio físico del templo parroquial Nuestra Señora de La Candelaria para el desenvolvimiento normal de las actividades pastorales tales como: liturgias dominicales, solemnidades, formación de la feligresía en su parte infantil – juvenil (catequesis de primera comunión, confirmación), trabajo de los apostolados que incluyen retiros, asambleas, ultreyas.</p>
                  <p>Es por ello que se hizo necesario la ejecución de un proyecto de apliación y remodelación para adaptar el templo a un espacio adecuado que cubra las demandas que se presentan.</p>
                  <p>EL Pbro. Francisco Linares durate su segundo año como párroco de la iglesia Ntra. Sra. de la Candelaria se planteó el proyecto de ampliación y remodelación del templo, iniciandose en junio de 2011 los movimientos de tierra, las bases de la ampliación del templo y se comenzó la construcción de la Capilla del Santísimo Sacramento. Posteriormente, se dieron los primeros pasos para levantar la torre, a cuyos pies se construyó la capilla de Nuestra Señora de Fátima</p>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-6">
                  <div class="col-sm-12">
                     <br>
                    <img class="img-responsive image" src="../images/bases.jpg">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="col-sm-12">
                    <br>
                    <img class="img-responsive image" src="../images/campanario.jpg">
                    <br>
                  </div>
                </div>
              </div> 
              <div class="col-sm-12">
                <div class="col-sm-12">
                  <p>Actualmente se tiene construida la mezanina de los coros, la cual posee una capacidad para 80 musicos aproximadamente, en los laterales se construyó una sala de ensayo donde va ubicada la consola de sonido y del otro lado un depósito para guardar los instrumentos y equipos técnicos de sonido. </p>
                  <p>Se tiene muy adelantada la construcción del Altar Mayor, la cual tendrá una capacidad minima para 110 sacerdotes, en los laterales de la misma se están construyendo dos sacristías, una para los presbíteros y diáconos, y la otra para los ministros, acólitos menores, vasos sagrados y utilería litúrgica. </p>
                </div>
                <div class="col-sm-12">
                  <div class="col-sm-12">
                    <br>
                    <img class="img-responsive image" src="../images/prebis.jpg">
                    <br>
                  </div>
                </div>
                <div class="col-sm-12">
                  <p>El área del templo era de aproximadamente 551,00m<sup>2</sup> y el área total proyectada es de 1130,50m<sup>2</sup>, lo que significa un aumento aproximado del 105%.</p>
                  <p>El Pbro. Francisco Linares conjuntamente con la feligresía y los grupos de apostolado de La Beatriz ha llevado adelante este gran reto gracias a la autogestión de la comunidad mediante bonos, rifa, potazos, ofrendas y a la creatividad de los grupos de apostolado. Además ha contado con un maravilloso equipo técnico de profesionales y un personal de primera, un equipo bien estructurado que cumple a cabalidad con las exigencias establecidas para este tipo de proyecto.</p>
                  <br>
                </div>
                <div class="col-sm-12">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8 mens">
                    <b>Jesús es nuestro guía y su palabra es nuestra mejor enseñanza, solo queda de parte de todos nosotros asumir el compromiso. Éste es nuestro reto; responder, unidos a Cristo Jesús y a María nuestra madre, a los grandes desafíos del mundo de hoy: Presentar a Cristo como luz del mundo, hoy mañana y siempre.</b>
                    <br><br>
                    <b>Jesús cuenta contigo, y cada uno de nosotros con su gracia. Unidos a él, edificamos, construimos; separados de él nada podemos hacer. Somos continuadores de la misión que él nos ha confiado.</b>
                    <br><br>
                    <b>Hoy es nuestra oportunidad de hacer historia con Jesús. Abramos el camino, para que otros salgan a su encuentro, y sumandose a él sigan siendo historia de Jesús en nuestro mundo de hoy.</b>
                    <br><br>
                    <b>Un Dios se los pague a todos los que han hecho posible y siguen trabajando en la construcción de este complejo parroquial que es de todos.</b>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="col-sm-12">
                    <br>
                    <img class="img-responsive image" src="../images/digitales.png">
                    <br>
                  </div>
                </div>
                <div align="right" class="col-sm-12">
                  <br>
                  <b><a class="btn btn-primary btn" role="buttom" href="album.php?id=1">Ver Album de Fotos</a></b>
                </div>  
              </div>         
            </div>
          </div>
          <div class="col-sm-4 aside">
            <div class="row"> 
              <div class="col-sm-1"></div>
              <div class="col-sm-11 tit">
                <header>Video</header>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-9" id="video">
                 <iframe src="//www.youtube.com/embed/sn_JO8psBgA" height="240" frameborder="0" allowfullscreen style="display:block; margin: 0 auto";></iframe>
              </div>
            </div>
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