<?php 
  include('../php/libreria.php');
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
      .apostolados
      {
        margin-top: 20px;
      }
      .pantalla
      {
        padding-bottom: 40px;
        border: 4px solid #949494;
        background-color: #eeeeee;
        overflow: auto;
        height: 1400px;
      }
      .grupos header
      {
        font-size: 28px;
        font-family: calibri;
        color: #000;
        text-decoration: underline;
        text-align: center;
        font-weight: bold;
        margin: 40px 0;
      }
      .lista
      {
        margin-bottom: 20px;
        border: solid 2px #000;
        border-radius: 15px;
        background-color: #fff;
      }
      .lista p
      {
          font-size: 28px;
          font-family: calibri;
          color: #000;
          text-align: center;
          margin: 20px auto 0;
      }
      .lista img
      {
        max-height: 110px;
        margin: 2px auto;
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
                  <li class="dropdown active">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"><span class="glyphicon glyphicon-user"></span> Vida Parroquial <b class="caret"></p></b></a>
                    <ul class="dropdown-menu">
                      <li class="active"><a href=""> Grupos de Apostolado </a></li>
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
            <h3>Grupos de Apostolado</h3>
          </hgroup>
        </div>
      </div>
      <div class="row apostolados">
        <div class="col-sm-12">
          <div class="col-sm-8">
            <div class="col-sm-12 pantalla">
              <div class="col-sm-12">
                <div class="col-sm-12 grupos">
                  <div class="col-sm-12">
                    <header>Sociedades</header>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-8">
                      <p>Sociedad Patronal Nuestra Señora de la Candelaria</p>
                    </div>
                    <div class="col-sm-4">
                      <img class="img-responsive" src="../images/patrona.png">
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-8">
                      <p>Sociedad Jesús de la Misericordia</p>
                    </div>
                    <div class="col-sm-4">
                      <img class="img-responsive" src="../images/misericordia.png">
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-8">
                      <p>Devotos a la Sagrada <br>Familia</p>
                    </div>
                    <div class="col-sm-4">
                      <img class="img-responsive" src="../images/sagradafamilia.png">
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <a href="grupoapostolado.php?id=1"><div class="col-sm-8">
                      <p>Cofradía del Santísimo Sacramento del Altar</p>
                    </div>
                    <div class="col-sm-4">
                      <img class="img-responsive" src="../images/Custodia.png">
                    </div></a>
                  </div>
                  <div class="col-sm-12">
                    <header>Movimientos de Apostolado</header>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-8">
                      <br>
                      <p>Catequesis</p>
                    </div>
                    <div class="col-sm-4">
                      <img class="img-responsive" src="../images/catequesis.png">
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-8">
                      <p>Legión de<br>María</p>
                    </div>
                    <div class="col-sm-4">
                      <img class="img-responsive" src="../images/legion.png">
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-8">
                      <p>Movimiento Cursillos de Cristiandad</p>
                    </div>
                    <div class="col-sm-4">
                      <img class="img-responsive" src="../images/cursillos.png">
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-8">
                      <p>Renovación Carismática<br>Católica</p>
                    </div>
                    <div class="col-sm-4">
                      <img class="img-responsive" src="../images/renovacion.png">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <header>Movimientos Juveniles</header>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-8">
                      <p>Grupo Juvenil <br>Amigos de Jesús</p>
                    </div>
                    <div class="col-sm-4">
                      <img class="img-responsive" src="../images/adj.png">
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-8">
                      <p>Grupo Juvenil <br>de la Mano con Jesús</p>
                    </div>
                    <div class="col-sm-4">
                      <img class="img-responsive" src="../images/gjdlmcj.png">
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-8">
                      <p>Unión Juvenil <br>Jassiel</p>
                    </div>
                    <div class="col-sm-4">
                      <img class="img-responsive" src="../images/jassiel.png">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <header>Coros Parroquiales</header>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Instrumento <br>de Paz</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Jesús <br>de Nazareth</p>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <header>Otros</header>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Grupo Musical<br>Qohélet</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Caballeros de<br>María</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Adoradores del <br>Santísimo</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Ministros de la <br>Sagrada Eucaristía</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Lectores de la <br>Palabra</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Acólitos <br>Mayores</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Diáconos <br>Permanentes</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Grupo de Acólitos Menores <br>(Monaguillos)</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Servicio <br>Parroquial</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Consejo <br>Pastoral</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Consejo <br>Económico</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p><br>Secretarias</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Grupo de Evangelización <br>(Integrado por todos los Apostolados)</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Pastoral <br>Familiar</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Grupo <br>H.H.</p>
                    </div>
                  </div>
                  <div class="col-sm-12 lista">
                    <div class="col-sm-12">
                      <p>Pastoral <br>Social</p>
                    </div>
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