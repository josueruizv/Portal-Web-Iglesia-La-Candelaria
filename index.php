<?php
  include ("php/libreria.php");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parroquia Ntra. Sra. de la Candelaria</title>


    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/personalizacion.css">

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
      
      #visor
      {
        margin: 40px auto 0px auto;
        border: solid 4px black;
      }
      #candelaria
      {
        margin: 0 auto;
      }

      .grupo_titulos
      {
        color: #949494;
        font-family: Tahoma;
        margin: 30 20px;
        border-bottom: 3px solid #949494;
      }
      #visor2
      {
        margin: 10px auto;
        border: solid 3px black;
      }
     
      .imagenes-prin
      {
        margin: 10px auto;
        border: solid 3px black;
      }
      #informacion
      {
        background-color: #c0c0c0;
        margin-top: 5px;
      }
      .pictures
      {
        margin-top: 20px;
        margin-bottom: 0px;
      }
      .pictures img
      {
        margin: auto;
        max-width: 120px;
        max-height: 120px;
      }

      .titulo-noticia
      {
        text-decoration: none;
        color: #222222;
      }
      .leer-mas
      {
        text-decoration: none;
        color: #fff;
      }
      .mas
      {
        margin: 5px 0;
      }
      .mas a
      {
        text-decoration: none;
        color: #fff;
      }
    </style>
      
  </head>
  <body>
    <div id="contenedor-principal" class="container">
      <div class="row">
        <div id="cabeceras" class="col-sm-13">
          <img class="img-responsive" alt="Parroquia Nuestra Señora de la Candelaria" src="images/cabecera.png">          
        </div>  
      </div>
      <div class="row">
        <div class="col-sm-13">
          <nav id="menu" class="navbar navbar-default">
            <div class="container-fluit">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acolapsar">
                  <span class="sr-only">Toggle Navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a href="" class="navbar-brand">Ntra. Sra. de la Candelaria</a>
              </div>
              <div class="collapse navbar-collapse" id="acolapsar">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active"><a href=""><p class="titulos"><span class="glyphicon glyphicon-home"></span> Inicio </p></a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"><span class="glyphicon glyphicon-info-sign"></span> La Parroquia <b class="caret"></b></p></a>
                    <ul class="dropdown-menu">
                      <li><a href="pages/historia.php"> Historia </a></li>
                      <li><a href="pages/despacho.php"> Despacho </a></li>
                      <li><a href="pages/galeria.php"> Galeria </a></li>
                      <li><a href="pages/proyecto.php">Proyecto del Templo</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"><span class="glyphicon glyphicon-pencil"></span> Servicios <b class="caret"></b></p></a>
                    <ul class="dropdown-menu">
                      <li><a href="pages/bautizos.php"> Bautizo </a></li>
                      <li><a href="pages/iniciacion.php"> Iniciación Cristiana </a></li>
                      <li><a href="pages/primeracomunion.php"> Primera Comunión </a></li>
                      <li><a href="pages/confirmaciones.php"> Confirmación </a></li>
                      <li><a href="pages/matrimonio.php"> Matrimonio </a></li>
                      <li><a href="pages/uncion.php"> Unción de los Enfermos </a></li>
                      <li><a href="pages/confesiones.php"> Confesión </a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><p class="titulos"><span class="glyphicon glyphicon-user"></span> Vida Parroquial <b class="caret"></b></p></a>
                    <ul class="dropdown-menu">
                      <li><a href="pages/apostolados.php"> Grupos de Apostolado </a></li>
                    </ul>
                  </li>
                   <li><a href="pages/donaciones.php"><p class="titulos"><span class="glyphicon glyphicon-credit-card"></span> Donaciones </p></a></li>
                   <li><a href="pages/contacto.php"><p class="titulos"><span class="glyphicon glyphicon-earphone"></span> Contacto </p></a></li>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="col-sm-12">
            <div id="visor" class="carousel slide">
              <ol class="carousel-indicators">
                  <li data-target="#visor" data-slide-to="0" class="active"></li>
                  <li data-target="#visor" data-slide-to="1"></li>
                  <li data-target="#visor" data-slide-to="2"></li>
                  <li data-target="#visor" data-slide-to="3"></li>
                  <li data-target="#visor" data-slide-to="4"></li>
                  <li data-target="#visor" data-slide-to="5"></li>
                  <li data-target="#visor" data-slide-to="6"></li>
                  <li data-target="#visor" data-slide-to="7"></li>
                  <li data-target="#visor" data-slide-to="8"></li>
                  <li data-target="#visor" data-slide-to="9"></li>
                  <li data-target="#visor" data-slide-to="10"></li>
              </ol>
              <div class="carousel-inner">
                  <div class="item active">
                      <img class="img-responsive" alt="Campanario de la Iglesia de La Beatriz" src="images/torre.png"/>
                  </div>
                  <div class="item">
                      <img  class="img-responsive" alt="Procesion en La Beatriz, Valera, Estado Trujillo" src="images/procesion2.png"/>
                  </div>
                  <div class="item">
                      <img  class="img-responsive" alt="Feligresia Parroquia La Candelaria de La Beatriz" src="images/feligresia2.png"/>
                  </div>
                  <div class="item">
                      <img  class="img-responsive" alt="Feligresia Parroquia Ntra. Sra. de la Candelaria" src="images/feligresia.png"/>
                  </div>
                  <div class="item">
                      <img  class="img-responsive" alt="Sagrario Parroquia Ntra. Sra. de la Candelaria La Beatriz" src="images/sagrario1.png"/>
                  </div>
                  <div class="item">
                      <img  class="img-responsive" alt="Iglesia Ntra. Sra. de La Candelaria, La Beatriz, Valera" src="images/angel.png"/>
                  </div>
                  <div class="item"> 
                      <img  class="img-responsive" alt="Ntra. Sra. de La Candelaria, La Beatriz, Valera, Trujillo, Venezuela" src="images/bancas.png"/>
                  </div>
                  <div class="item">
                      <img  class="img-responsive" alt="Altar Iglesia Ntra. Sra. de la Candelaria" src="images/frentealtar.png"/>
                  </div>
                  <div class="item">
                      <img class="img-responsive" alt="Iglesia La Candelaria, La Beatriz" src="images/entrada.png"/>
                  </div>
                  <div class="item">
                      <img class="img-responsive" alt="Frente Iglesia La Candelaria" src="images/frente.png"/>
                  </div>
                  <div class="item">
                      <img class="img-responsive" alt="Imagen Nuestra Señora de la Candelaria" src="images/iglesia.png"/>
                  </div>
              </div>
              <a href="#visor" class="left carousel-control" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>

               <a href="#visor" class="right carousel-control" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="col-sm-12">
            <img id="candelaria" class="img-responsive" alt="Virgen de la Candelaria" src="images/candelaria.png">
          </div>
        </div> 
      </div>
      <div class="row">
        <div  class="col-sm-8">
          <div class="row">
            <div class="col-sm-12">
              <h3 class="grupo_titulos">Proyeto de Ampliación y Remodelación del Templo</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <div id="visor2" class="carousel slide">
                <a href="pages/proyecto.php">
                  <ol class="carousel-indicators">
                      <li data-target="#visor2" data-slide-to="0" class="active"></li>
                      <li data-target="#visor2" data-slide-to="1"></li>
                      <li data-target="#visor2" data-slide-to="2"></li>
                      <li data-target="#visor2" data-slide-to="3"></li>
                      <li data-target="#visor2" data-slide-to="4"></li>
                      <li data-target="#visor2" data-slide-to="5"></li>
                      <li data-target="#visor2" data-slide-to="6"></li>
                      <li data-target="#visor2" data-slide-to="7"></li>
                      <li data-target="#visor2" data-slide-to="8"></li>
                      <li data-target="#visor2" data-slide-to="9"></li>
                      <li data-target="#visor2" data-slide-to="10"></li>
                      <li data-target="#visor2" data-slide-to="11"></li>
                      <li data-target="#visor2" data-slide-to="12"></li>
                      <li data-target="#visor2" data-slide-to="13"></li>
                      <li data-target="#visor2" data-slide-to="13"></li>
                  </ol>
                  <div class="carousel-inner">
                      <div class="item active">
                          <img class="img-responsive" alt="Vista Frontal Proyecto del Templo Parroquial" src="images/1.jpg"/>
                      </div>
                      <div class="item">
                          <img class="img-responsive" alt="Proyecto del Templo Parroquial La Candelaria" src="images/2.jpg"/>
                      </div>
                      <div class="item">
                          <img class="img-responsive" alt="Proyecto Templo Parroquial de La Beatriz, Valera" src="images/3.jpg"/>
                      </div>
                      <div class="item">
                          <img class="img-responsive" alt="Proyecto Templo Ntra. Sra. de la Candelaria, La Beatriz" src="images/4.jpg"/>
                      </div>
                      <div class="item">
                          <img class="img-responsive" alt="Entrada Templo Parroquial La Candelaria, La Beatriz" src="images/5.jpg"/>
                      </div>
                      <div class="item"> 
                          <img class="img-responsive" alt="Vista Interna Proyecto del Templo Parroquial" src="images/6.jpg"/>
                      </div>
                      <div class="item">
                          <img class="img-responsive" alt="Vista Altar Proyecto del Templo Parroquial de La Beatriz" src="images/7.jpg"/>
                      </div>
                      <div class="item">
                          <img class="img-responsive" alt="Nuevo Altar del Templo Parroquial de La Beatriz" src="images/8.jpg"/>
                      </div>
                      <div class="item">
                          <img class="img-responsive" alt="Altar y Sacristia Proyecto Templo Parroquial, La Beatriz" src="images/9.jpg"/>
                      </div>
                      <div class="item">
                          <img class="img-responsive" alt="Ambon del Templo Parroquial La Candelaria, La Beatriz" src="images/10.jpg"/>
                      </div>
                      <div class="item">
                          <img class="img-responsive" alt="Vista Interna Bancas del Templo Parroquial de La Beatriz" src="images/11.jpg"/>
                      </div>
                      <div class="item">
                          <img class="img-responsive" alt="Escalera Proyecto Templo Parroquial, La Beatriz" src="images/12.jpg"/>
                      </div>
                      <div class="item">
                          <img class="img-responsive" alt="Mezzanina para el Coro Parroquial, Proyecto Templo Parroquial, La Beatriz" src="images/13.jpg"/>
                      </div>
                      <div class="item">
                          <img class="img-responsive" alt="Vista del Templo Parroquial desde la Mezzanina del Coro, La Beatriz" src="images/14.jpg"/>
                      </div>
                      <div class="item">
                          <img class="img-responsive" alt="Vista desde la Mezzanina, Templo Parroquial de La Beatriz" src="images/15.jpg"/>
                      </div>
                  </div>
                  <a href="#visor2" class="left carousel-control" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                  <a href="#visor2" class="right carousel-control" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                  </a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <h3 class="grupo_titulos">Información General</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div id="informacion" class="col-sm-12">
                <?php
                  $a=noticiasPrin();
                ?>  
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <h3 class="grupo_titulos">Sínodo Diocesano</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <a href="pages/sinodo_diocesano.php"><img class="imagenes-prin img-responsive" alt="Sinodo Diocesano de Trujillo" src="images/sinodo.jpg"></a>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
              <a href="pages/sinodo_diocesano.php"><img class="imagenes-prin img-responsive" alt="Oracion Sinodal Trujillo" src="images/oracionsinodal.png"></a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="row">
            <div class="col-sm-12">
              <div class="twitterpapa">
                <a class="twitter-timeline" href="https://twitter.com/Pontifex_es" data-widget-id="462279320644235265">Tweets por @Pontifex_es</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
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
                $hdi=horariomisas($codi,1);
              ?>
              <header>Dominicales:</header>
              <?php  
                $cod=4;
                $hdo=horariomisas($cod,1);
              ?>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-11 tit">
              <header>Acceso Parroquial</header>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-9" id="acceso">
               <a href="pages/login.php" target="_blank"><header>Sistema de Administración Parroquial</header></a>
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
               <a href="http://www.es.catholic.net/evangeliodehoy/" target="_blank"><img class="img-responsive" alt="Evangelio de Hoy" src="images/evangelio.png"></a>         
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
              <a href="http://www.vatican.va/phome_sp.htm" target="_blank"><img class="img-responsive" alt="Web del Vaticano" src="images/vaticano.png"></a>
              <a href="http://www.cev.org.ve/" target="_blank"><img class="img-responsive" alt="Web de la Conferencia Episcopal de Venezuela" src="images/episcopal.png"></a>
              <a href="http://www.diocesisdetrujillo.org.ve/" target="_blank"><img class="img-responsive" alt="Web de la Diocesis de Trujillo" src="images/diocesis.png"></a>
              <a href="http://semanariocatolicoavance.com/" target="_blank"><img class="img-responsive" alt="Web del Semanario Avance" src="images/avance.png"></a>
              <a href="http://www.aciprensa.com///" target="_blank"><img class="img-responsive" alt="Web de AciPrensa" src="images/aciprensa.png"></a>
              <a href="http://www.tucristo.com//" target="_blank"><img class="img-responsive" alt="Web de TuCristo.com" src="images/tucristo.png"></a>           
           </div>
          </div>
        </div>
      </div>
      <div class="row" id="footer">
        <div class="col-sm-12" id="desarrollado">
          <p class="centro">..:: Desarrollado por <a href="https://twitter.com/belkisrubio" target="_blank">Belkis Rubio</a> y <a href="https://twitter.com/josueruiz91" target="_blank">Josué Ruiz</a> bajo la dirección de la <a href="http://www.uvm.edu.ve" target="_blank">Universidad Valle del Momboy</a> ::..</p>
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
    <script src="js/bootstrap.min.js"></script>
    <!-- Slide -->
    <script src="js/slide.js"></script>
  </body>
</html>