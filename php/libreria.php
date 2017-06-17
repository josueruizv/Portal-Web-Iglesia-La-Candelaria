<?php
function mesescrito($month)
{
  if($month==1)
    return 'Enero';
  if($month==2)
    return 'Febrero';
  if($month==3)
    return 'Marzo';
  if($month==4)
    return 'Abril';
  if($month==5)
    return 'Mayo';
  if($month==6)
    return 'Junio';
  if($month==7)
    return 'Julio';
  if($month==8)
    return 'Agosto';
  if($month==9)
    return 'Septiembre';
  if($month==10)
    return 'Octubre';
  if($month==11)
    return 'Noviembre';
  if($month==12)
    return 'Diciembre';
}
function ObtenerNavegador($user_agent) 
{
    $navegadores = array
    (
        'Opera' => 'Opera',
        'Mozilla Firefox'=> '(Firebird)|(Firefox)',
        'Google Chrome'=>'(Chrome)',
        'Galeon' => 'Galeon',
        'Mozilla'=>'Gecko',
        'MyIE'=>'MyIE',
        'Lynx' => 'Lynx',
        'Chrome'=>'Chrome',
        'Netscape' => '(CHROME/23\.0\.1271\.97)|(Mozilla/4\.75)|(Netscape6)|(Mozilla/4\.08)|(Mozilla/4\.5)|(Mozilla/4\.6)|(Mozilla/4\.79)',
        'Konqueror'=>'Konqueror',
        'Internet Explorer 7' => '(MSIE 7\.[0-9]+)',
        'Internet Explorer 6' => '(MSIE 6\.[0-9]+)',
        'Internet Explorer 5' => '(MSIE 5\.[0-9]+)',
        'Internet Explorer 4' => '(MSIE 4\.[0-9]+)',
    );
    foreach($navegadores as $navegador=>$pattern)
    {
       if (preg_match('/'.$pattern.'/', $user_agent))
        return $navegador;
    }
        return 'Desconocido';
}
function horariomisas($codr,$opc)
    {
        if($opc==1)
        {
          include("php/conexion.php");
        }
        else
        {
          include("../php/conexion.php");
        }
        $registros=mysqli_query($conexion,"SELECT hora FROM horario WHERE codigo_actividad=$codr") or die(mysqli_error());
        if($reg=mysqli_fetch_array($registros))
        {
?>
            <p>
                <?php echo nl2br($reg['hora']); ?>
            </p>
<?php
        }
    }
function noticiasPrin()
{
    include ("php/conexion.php");
    $registros=mysqli_query($conexion,"SELECT * FROM noticias ORDER BY id_noticia DESC LIMIT 3") or die("Error al Recuperar la Información");

    while($reg=mysqli_fetch_array($registros)) 
    { 
    ?>
        <div class="row">
            <div class="pictures col-sm-3">
                <?php
                    if(!($reg['rutaimagen']=="")) 
                    {
                ?>
                        <img class="img-responsive" alt="<?php echo $reg['nombre_noticia']; ?>" src="<?php echo $reg['rutaimagen']; ?>">
                <?php
                    }
                ?>
            </div>
          
            <div class="col-sm-8">
              <div class="jumbotrom">
                  <a class="titulo-noticia" href="pages/detalle.php?id=<?php echo $reg['id_noticia']; ?>">
                  <h3><?php echo $reg['nombre_noticia']; ?></h3>
                  </a>
                  <small><b><?php $fecha=$reg['fecha_noticia']; $convertirfecha=strtotime($fecha); $fechaphp=date("d/m/Y",$convertirfecha); echo $fechaphp." - ".$reg['autor']; ?></b></small>
                  <p class="descrip_noticia"><?php echo $reg['descripcion'] ?>  <b><a class="leer-mas btn btn-primary btn-xs" role="button" href="pages/detalle.php?id=<?php echo $reg['id_noticia']; ?>">Leer más</a></b></p>
              </div>
            </div>
         </div>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-sm-10"></div>
        <div class="mas col-sm-2"> <a class="btn btn-primary btn-xs" role="button" href="pages/noticias.php">Ver más...</a> </div>
    </div>
    <?php 
    mysqli_close($conexion);
}

function noticias($inicio,$pagina)
{
  include ("../php/conexion.php");
  $registros=mysqli_query($conexion,"SELECT * FROM noticias") or die("Error al Recuperar la Información");
  $total_registros=mysqli_num_rows($registros);
  $registros2=mysqli_query($conexion,"SELECT * FROM noticias ORDER BY id_noticia DESC LIMIT $inicio,9") or die("Error al Recuperar la Información");
  $total_paginas=ceil($total_registros/9);

  while($reg=mysqli_fetch_array($registros2)) 
  {
  ?>
    <div class="row">
      <div class="col-sm-3 pictures">
        <?php 
          if(!($reg['rutaimagen']=="")) 
            {
        ?>
              <img class="img-responsive" alt="<?php echo $reg['nombre_noticia']; ?>" src="../<?php echo $reg['rutaimagen']; ?>">
            <?php
            }
            ?>
      </div>
      <div class="col-sm-8">
        <div class="jumbotrom">
          <a class="titulo-noticia" href="detalle.php?id=<?php echo $reg['id_noticia']; ?>">
            <h3><?php echo $reg['nombre_noticia']; ?></h3>
          </a>
          <small><b><?php $fecha=$reg['fecha_noticia']; $convertirfecha=strtotime($fecha); $fechaphp=date("d/m/Y",$convertirfecha); echo $fechaphp." - ".$reg['autor']; ?></b></small>
          <p class="descrip_noticia"><?php echo $reg['descripcion'] ?>  <b><a class="leer-mas btn btn-primary btn-xs" role="button" href="detalle.php?id=<?php echo $reg['id_noticia']; ?>">Leer más</a></b></p>
        </div>
      </div>
    </div>
  <?php
  }
  ?>
  <br>
  <br>
  <div align="right" class="col-sm-12">
  <?php
  if(($pagina-1)>0)
  {
  ?>
      <a class="navegacion btn btn-primary btn-xs" role="buttom" href="<?php echo 'noticias.php?pag='.($pagina-1); ?>">Anterior</a>
  <?php
  }
  for($i=1;$i<=$total_paginas;$i++)
  {
      if($pagina==$i)
      {
  ?>
       <b id="pag"><?php echo $pagina; ?></b>
    <?php
      }
      else
      {
      ?>
         <a class="navegacion btn btn-primary btn-xs" href="<?php echo 'noticias.php?pag='.$i; ?>"><?php echo $i; ?></a>
      <?php
      }
  }
  if(($pagina+1)<=$total_paginas)
  {
  ?>
      <a class="navegacion btn btn-primary btn-xs" href="<?php echo 'noticias.php?pag='.($pagina+1); ?>">Siguiente</a>
  <?php
  }
  ?>
  </div>
  <?php
}
function despacho()
{
    include ("../php/conexion.php");
    $registros=mysqli_query($conexion,"SELECT * FROM horario ORDER BY codigo_actividad ASC") or die("Error al Recuperar la Información");
    $num_resultados=mysqli_num_rows($registros);
    for($i=0;$i<$num_resultados;$i++) 
    {
      $reg=mysqli_fetch_array($registros);
?>
      <header><?php echo nl2br($reg['nombre_actividad']); ?></header>
      <p><?php echo nl2br($reg['dia']);?></p>
      <p><?php echo nl2br($reg['hora']);?></p>
      <p><?php echo nl2br($reg['observacion_acti']);?></p>
<?php
       if($i!=$num_resultados-1)
       {
        echo '<hr>';
       }
    }
}
function albumes()
{
    include('../php/conexion.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    { 
      if(is_uploaded_file($_FILES['foto']['tmp_name'][0]))
      {
        $album=$_POST["nombrealbum"];
        $registros=mysqli_query($conexion,"SELECT MAX(id) id FROM fotos");
        $reg=mysqli_fetch_array($registros);
        $id=trim($reg[0]);
        $val=$id+1;
        $carpeta='album'.$val;
        $foto = $_FILES['foto']['tmp_name'];
        $cantidad = count($foto);

        if((isset($carpeta)) and (trim($carpeta!="")))
        {
          $ruta="albumes/".$carpeta;
          if(!is_dir('../'.$ruta)) 
          {
            mkdir('../'.$ruta,0777);

            $directorio = $ruta;
            $flag=0;
            $cant_e=0;
            $exitosos=$cantidad;

            for ($n="0"; $n<$cantidad; $n++) 
            {
              $ruta_foto = $foto[$n]; 
              $nombre_foto = $_FILES['foto']['name'][$n];
              $ruta_final = $directorio."/".$nombre_foto;
              if(($_FILES['foto']['type'][$n] == "image/jpeg" )or($_FILES['foto']['type'][$n] == "image/png" )or($_FILES['foto']['type'][$n] == "image/gif" ))
              {
                if (move_uploaded_file($ruta_foto, '../'.$ruta_final))
                {
                  $flag=1;
                  if($n==0)
                  {
                    mysqli_query($conexion,"INSERT INTO fotos(nombre_album,ruta_directorio,rutaprimerafoto) VALUES ('$album','$directorio','$ruta_final')") or die(mysqli_error());
                  }
                } 
                else 
                {
                  $exitosos--;
                }
              }
              else
              {
                $exitosos--;
                $cant_e++;
                $error[]=$nombre_foto;
              }
            }
            if($exitosos==0)
            {
              echo '<div class="row">
                      <br>
                      <div class="col-sm-2"></div>
                      <div class="col-sm-10">
                        <p class="help-block">Hay un error de conexion con el servidor, o los archivos seleccionados no tienen formato de imagenes</p>
                      </div>
                    </div>'; 
            }
            if($exitosos!=0)
            {
                echo '<div class="row">
                        <br>
                          <div class="col-sm-2"></div>
                          <div class="col-sm-10">
                            <p class="help-block">Album <strong>'.$album.' </strong> creado. Se han ingresado <strong>'.$exitosos.' fotos</strong></p>
                          </div>
                        </div>';
            }
            if($cant_e!=0)
            {
              for ($e=0; $e<$cant_e; $e++) 
              {
                echo '<div class="row">
                        <br>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                          <p class="help-block">Nota: el archivo <strong>'.$error[$e].'</strong> no se ha cargado debido a que no es una imagen</p>
                        </div>
                        </div>'; 
              }
            }
          }
          else
          {
            echo '<div class="row">
                    <br>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <p class="help-block">El album <strong>'.$album.'</strong> ya existe</p>
                    </div>
                </div>'; 
          }
        }
        else
        {
            echo '<div class="row">
                    <br>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <p class="help-block">Debe ingresar un nombre al Album</p>
                    </div>
                </div>';
        }
      }
      else
      {
         echo '<div class="row">
                <br>
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <p class="help-block">Aún no ha ingresado ningún Album</p>
                </div>
                </div>';
      }
    }
}
function mostrar_albumes()
{
  include("../php/conexion.php");
  $registros=mysqli_query($conexion,"SELECT * FROM fotos ORDER BY id DESC");
  $flag=0;
  while($reg=mysqli_fetch_array($registros))
  {
    $flag=1;
?>
  <div class="col-sm-3 col-md-3">
    <a href="album.php?id=<?php echo $reg['id']; ?>">
      <div class="thumbnail" title="<?php echo $reg['nombre_album']; ?>">
        <img class="img-responsive" src="<?php echo '../'.$reg['rutaprimerafoto']; ?>">
        <div class="caption">
          <strong><?php echo $reg['nombre_album']; ?></strong>
        </div>
      </div>
    </a>
  </div>
<?php
  }
  if($flag==0)
  {
?>
  <div class="col-sm-3 col-md-3">
    <div class="thumbnail"?>">
      <div class="caption">
        <h4>No Hay Albumes</h4>
      </div>
    </div>
  </div>
<?php
  }
}
function modificar_albumes()
{
  include("../php/conexion.php");
  $registros=mysqli_query($conexion,"SELECT * FROM fotos ORDER BY id DESC");
  $flag=0;
?>
  <div class="col-sm-3 col-md-3 image_wrapper">
    <a href="crear-album.php">
      <div class="thumbnail" title="Agregar Nuevo Album">
        <div class="caption">
          <h4 id="agregar">Agregar Nuevo Album</h4>
        </div>
      </div>
    </a>
    <?php
    echo '<img src="../images/add.png" title="Agregar Nuevo Album" class="add" onclick="javascript:redireccionacrear();">';
    ?>
  </div>
<?php
  while($reg=mysqli_fetch_array($registros))
  {
    $id=$reg['id'];
    $nombrealbum=$reg['nombre_album'];
    $flag=1;
?>
  <div class="col-sm-3 col-md-3 image_wrapper">
    <a target="_blank" href="album.php?id=<?php echo $reg['id']; ?>">
      <div class="thumbnail" title="<?php echo $reg['nombre_album']; ?>">
        <img class="img-responsive" src="<?php echo '../'.$reg['rutaprimerafoto']; ?>">
        <div class="caption">
          <strong><?php echo $reg['nombre_album']; ?></strong>
        </div>
      </div>
    </a>
    <?php
    echo '<img src="../images/eliminar.png" title="Eliminar Album" class="remove" onclick="javascript:borraalbum(\''.$nombrealbum.'\','.$id.');">';
    ?>
  </div>
<?php
  }
  if($flag==0)
  {
?>
  <div class="col-sm-3 col-md-3">
    <div class="thumbnail"?>">
      <div class="caption">
        <h4>No Hay Albumes</h4>
      </div>
    </div>
  </div>
<?php
  }
}
function borraralbum($cod,$directorio)
{
  include("../php/conexion.php");
  foreach(glob($directorio."/*.*") as $archivos_carpeta)  
  {  
    unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia  
  }  
  rmdir($directorio);     
  mysqli_query($conexion,"DELETE FROM fotos WHERE id='$cod'") or die(mysqli_query());
  header("location: ../pages/fotos.php");
}
function mostrar_fotos($id_album)
{ 
  include('../php/conexion.php');
  $album=mysqli_query($conexion,"SELECT * FROM fotos WHERE id=$id_album");
  if($reg=mysqli_fetch_array($album))
  {
?>
    <div class="row">
      <div class="col-sm-11 titles-negro">
        <hgroup>
          <h3><?php echo $reg['nombre_album']; ?></h3>
        </hgroup>
      </div>
    </div>
    <div class="row album">
      <div class="col-sm-12 fotos">
<?php
    $carpeta='../'.$reg['ruta_directorio'];
    $directorio=opendir(utf8_decode($carpeta));
    while($foto=readdir($directorio))
    {
      if($foto!="." and $foto!="..")
      {
?>
        <div class="col-sm-12 col-md-2">
          <div class="thumbnail">
              <a href="<?php echo $carpeta.'/'.$foto; ?>" data-gallery><img src="<?php echo $carpeta.'/'.$foto; ?>"></a>
          </div>
        </div>
<?php
      }
    }
?>
      </div>
    </div>
<?php
  }
}
function validarbau($opcion)
{
  if(isset($_POST['regbau']) or (isset($_POST['editbau'])))
  {
    $flag=1;
    if((isset($_POST['cedula'])) and (trim($_POST['cedula'])!=""))
    {
      if(!(filter_var($_POST['cedula'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
        $flag=0;
      }
    }
    if(($_POST['ministro']=="") and (trim($_POST['otroministro'])=="Otro..."))
    {
      echo '<h6 align="center" class="alerta"> Debe seleccionar "Ministro" o ingresar uno nuevo </h6>';
      $flag= 0;
    }
    if($opcion=='registro')
    {
      registrarbau($flag);
    }
    if($opcion=='edicion')
    {
      editarbau($flag);
    }
  } 
}
function registrarbau($bandera)
{
  include("../php/conexion.php");
  if($bandera==1)
  {
    if(isset($_POST['nombre']) and (trim($_POST['nombre'])!="") and (isset($_POST['apellido'])) and (trim($_POST['apellido'])!="") and (isset($_POST['sexo'])) and ($_POST['sexo']!="") and (isset($_POST['fechanac'])) and (trim($_POST['fechanac'])!="") and (isset($_POST['lugarnac'])) and (trim($_POST['lugarnac'])!="") and (isset($_POST['registrocivil'])) and (trim($_POST['registrocivil'])!="") and (isset($_POST['cedulapadre'])) and (trim($_POST['cedulapadre'])!="") and (isset($_POST['nombrepadre'])) and (trim($_POST['nombrepadre'])!="") and (isset($_POST['apellidopadre'])) and (trim($_POST['apellidopadre'])!="") and (isset($_POST['cedulamadre'])) and (trim($_POST['cedulamadre'])!="") and (isset($_POST['nombremadre'])) and (trim($_POST['nombremadre'])!="") and (isset($_POST['apellidomadre'])) and (trim($_POST['apellidomadre'])!="") and (isset($_POST['filiacion'])) and (trim($_POST['filiacion'])!="") and (isset($_POST['cedulapadrino'])) and (trim($_POST['cedulapadrino'])!="") and (isset($_POST['nombrepadrino'])) and (trim($_POST['nombrepadrino'])!="") and (isset($_POST['apellidopadrino'])) and (trim($_POST['apellidopadrino'])!="") and (isset($_POST['cedulamadrina'])) and (trim($_POST['cedulamadrina'])!="") and (isset($_POST['nombremadrina'])) and (trim($_POST['nombremadrina'])!="") and (isset($_POST['apellidomadrina'])) and (trim($_POST['apellidomadrina'])!="") and (isset($_POST['fechabautizo'])) and (trim($_POST['fechabautizo'])!=""))
    {
      $registros=mysqli_query($conexion,"SELECT cedula_per FROM personas WHERE cedula_per=$_POST[cedula]");
      @$num_filas=mysqli_num_rows($registros);
      if($num_filas>0)
      {
        echo '<h6 align="center" class="alerta"> Ya existe un registro correspondiente a la "Cédula" ingresada </h6>';
      }
      else
      {
        $fnac = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanac'])));
        $fbau = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechabautizo'])));

        if((isset($_POST['otroministro'])) and (trim($_POST['otroministro']!=""))) 
        {
          $registros=mysqli_query($conexion,"SELECT codigo_min FROM ministro ORDER BY codigo_min DESC LIMIT 1");
          if($reg=mysqli_fetch_array($registros))
          {
            $maximoid=$reg['codigo_min'];
            $id_ministro=$maximoid+1;
            mysqli_query($conexion,"INSERT INTO ministro(ministro_min) VALUES ('$_POST[otroministro]')");
          }
        }
        else
        {
          $id_ministro=$_POST['ministro'];
        }
        if(trim($_POST['cedula'])=="")
        {
           mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarnac_per,registrocivil_per,lugarbautizo_per) VALUES (NULL,'$_POST[nombre]','$_POST[apellido]','$_POST[sexo]','$_POST[fechanac]','$_POST[lugarnac]','$_POST[registrocivil]','La Beatriz')");
        }
        else
        {
          mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarnac_per,registrocivil_per,lugarbautizo_per) VALUES ('$_POST[cedula]','$_POST[nombre]','$_POST[apellido]','$_POST[sexo]','$_POST[fechanac]','$_POST[lugarnac]','$_POST[registrocivil]','La Beatriz')");
        }
        $cod=mysqli_insert_id($conexion);

        $registrospadre=mysqli_query($conexion,"SELECT cedula_pad FROM padre WHERE cedula_pad=$_POST[cedulapadre]");
        @$num_filas_padre=mysqli_num_rows($registrospadre);
        if($num_filas_padre==0)
        {
          mysqli_query($conexion,"INSERT INTO padre(cedula_pad,nombre_pad,apellido_pad) VALUES ('$_POST[cedulapadre]','$_POST[nombrepadre]','$_POST[apellidopadre]')");  
        }
        else
        {
          mysqli_query($conexion,"UPDATE padre SET nombre_pad='$_POST[nombrepadre]',apellido_pad='$_POST[apellidopadre]' WHERE cedula_pad='$_POST[cedulapadre]'");
        }

        $registrosmadre=mysqli_query($conexion,"SELECT cedula_mad FROM madre WHERE cedula_mad=$_POST[cedulamadre]");
        @$num_filas_madre=mysqli_num_rows($registrosmadre);
        if($num_filas_madre==0)
        {
          mysqli_query($conexion,"INSERT INTO madre(cedula_mad,nombre_mad,apellido_mad) VALUES ('$_POST[cedulamadre]','$_POST[nombremadre]','$_POST[apellidomadre]')");  
        }
        else
        {
          mysqli_query($conexion,"UPDATE madre SET nombre_mad='$_POST[nombremadre]',apellido_mad='$_POST[apellidomadre]' WHERE cedula_mad='$_POST[cedulamadre]'");
        }
        mysqli_query($conexion,"INSERT INTO padrespersona(codigo_per,cedula_pad,cedula_mad,filiacion) VALUES ('$cod','$_POST[cedulapadre]','$_POST[cedulamadre]','$_POST[filiacion]')");

        $registrospadrino=mysqli_query($conexion,"SELECT cedula_pdr FROM padrino WHERE cedula_pdr=$_POST[cedulapadrino]");
        @$num_filas_padrino=mysqli_num_rows($registrospadrino);
        if($num_filas_padrino==0)
        {
          mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");  
        }
        else
        {
          mysqli_query($conexion,"UPDATE padrino SET nombre_pdr='$_POST[nombrepadrino]',apellido_pdr='$_POST[apellidopadrino]' WHERE cedula_pdr='$_POST[cedulapadrino]'");
        }
        
        $registrosmadrina=mysqli_query($conexion,"SELECT cedula_mdr FROM madre WHERE cedula_mdr=$_POST[cedulamadrina]");
        @$num_filas_madrina=mysqli_num_rows($registrosmadrina);
        if($num_filas_madrina==0)
        {
          mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulamadrina]','$_POST[nombremadrina]','$_POST[apellidomadrina]')");  
        }
        else
        {
          mysqli_query($conexion,"UPDATE madrina SET nombre_mdr='$_POST[nombremadrina]',apellido_mdr='$_POST[apellidomadrina]' WHERE cedula_mdr='$_POST[cedulamadrina]'");
        }
        mysqli_query($conexion,"INSERT INTO padrinosbautizado(codigo_per,cedula_pdr,cedula_mdr) VALUES ('$cod','$_POST[cedulapadrino]','$_POST[cedulamadrina]')");
        $registrosbautizo=mysqli_query($conexion,"SELECT codigo_bau FROM bautizo");
        @$num_filas_bautizo=mysqli_num_rows($registrosbautizo);
        if($num_filas_bautizo>0)
        {
          $registrosbautizo2=mysqli_query($conexion,"SELECT MAX(codigo_bau) codbau FROM bautizo") or die(mysqli_error());
          $regbautizo2=mysqli_fetch_row($registrosbautizo2);
          $codbau=trim($regbautizo2[0]);
        }
        else
        {
          $codbau=0;
        }
        mysqli_query($conexion,"CALL sp_bautizo('$codbau','$id_ministro','$cod','$fbau','$_POST[observaciones]')") or die(mysqli_error());
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*) </h6>';
    }
  }
}
function validarBauCed()
{
  $flag=1;
  if(isset($_POST['BauCed']))
  {
    if(isset($_POST['cedula']) and (trim($_POST['cedula'])!=""))
    {
      if(!(filter_var($_POST['cedula'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> el campo "Cédula" acepta solo números</h6>';
        $flag=0;
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ninguna "Cédula" </h6>';
      $flag=0;
    }
    buscarbau($flag,'bauced');
  }
}
function validarBauNom()
{
  $flag=1;
  if(isset($_POST['BauNom']))
  {
    echo '<br>';
    if(!((isset($_POST['nom']) and (trim($_POST['nom'])!=""))))
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ningún "Nombre" </h6>';
      $flag=0;
    }
    if(!((isset($_POST['ap']) and (trim($_POST['ap'])!=""))))
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ningún "Apellido" </h6>';
      $flag=0;
    }
    if(!((isset($_POST['fn']) and (trim($_POST['fn'])!=""))))
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ninguna "Fecha de Nacimiento" </h6>';
      $flag=0;
    }
    buscarbau($flag,'baunom');
  }
}
function validarBauPad()
{
  $flag=1;
  if(isset($_POST['BauPad']))
  {
    echo '<br>';
    if(isset($_POST['cedulapad']) and (trim($_POST['cedulapad'])!=""))
    {
      if(!(filter_var($_POST['cedulapad'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> el campo "Cédula" acepta solo números </h6>';
        $flag=0;
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ninguna "Cédula" </h6>';
      $flag=0;
    }
    buscarbau($flag,'baupad');
  }
}
function validarBauPdr()
{
  $flag=1;
  if(isset($_POST['BauPdr']))
  {
    echo '<br>';
    if(isset($_POST['cedulapdr']) and (trim($_POST['cedulapdr'])!=""))
    {
      if(!(filter_var($_POST['cedulapdr'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> el campo "Cédula" acepta solo números </h6>';
        $flag=0;
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ninguna "Cédula" </h6>';
      $flag=0;
    }
    buscarbau($flag,'baupdr');
  }
}
function buscarbau($bandera,$consulta)
{
  include("../php/conexion.php");
  if(($bandera==1) and $consulta=='bauced')
  {
    $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE cedula_per='$_POST[cedula]'");
    if($reg=mysqli_fetch_array($registros))
    {
      $codigoper=$reg['codigo_per'];
      $registrosbautizo=mysqli_query($conexion,"SELECT * FROM bautizo WHERE codigo_per=$codigoper");
      if($regbautizo=mysqli_fetch_array($registrosbautizo))
      {
        $registrospadres=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per=$codigoper");
        $regpadres=mysqli_fetch_array($registrospadres);
        $registropad=mysqli_query($conexion,"SELECT * FROM padre,madre WHERE cedula_pad='$regpadres[cedula_pad]' AND cedula_mad='$regpadres[cedula_mad]'");
        $regpad=mysqli_fetch_array($registropad);

        $registrospadrinos=mysqli_query($conexion,"SELECT * FROM padrinosbautizado WHERE codigo_per=$codigoper");
        $regpadrinos=mysqli_fetch_array($registrospadrinos);
        $registropadri=mysqli_query($conexion,"SELECT * FROM padrino,madrina WHERE cedula_pdr='$regpadrinos[cedula_pdr]' AND cedula_mdr='$regpadrinos[cedula_mdr]'");
        $regpadri=mysqli_fetch_array($registropadri);

        $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regbautizo[codigo_min]'");
        $regministro=mysqli_fetch_array($registrosministro);
?>
        <br>
        <br>
        <div class="table-responsive" id="tablaced">
          <table class="table table-bordered" id="tabla_ced">
            <tr>
              <th class="text-center">Bautizado</th>
              <th class="text-center">Fecha de Nac.</th>
              <th class="text-center">Padre</th>
              <th class="text-center">Madre</th>
              <th class="text-center">Padrino</th>
              <th class="text-center">Madrina</th>
              <th class="text-center">Fecha de Bautizo</th>
            </tr>
            <tr>
              <td class="text-center"><?php echo $reg['nombre_per'].' '.$reg['apellido_per']; ?></td>
              <?php
                $fnac = date('d/m/Y', strtotime(str_replace('/', '-', $reg['fechanac_per'])));
              ?>
              <td class="text-center"><?php echo $fnac; ?></td>
              <td class="text-center"><?php echo $regpad['nombre_pad'].' '.$regpad['apellido_pad']; ?></td>
              <td class="text-center"><?php echo $regpad['nombre_mad'].' '.$regpad['apellido_mad']; ?></td>
   
              <td class="text-center"><?php echo $regpadri['nombre_pdr'].' '.$regpadri['apellido_pdr']; ?></td>
              <td class="text-center"><?php echo $regpadri['nombre_mdr'].' '.$regpadri['apellido_mdr']; ?></td>
              <?php
                $fbau = date('d/m/Y', strtotime(str_replace('/', '-', $regbautizo['fecha_bau'])));
              ?>
              <td class="text-center"><?php echo $fbau; ?></td>
            </tr>
          </table>
        </div>
        <div class="row">
          <div align="center" class="col-sm-12">
            <br>
            <a href="editar-bautizo.php?cod=<?php echo $reg['codigo_per']; ?>"><input type="buttom" class="btn btn-primary" name="modificar" Value="Modificar"></a>
            <a href="imprimir-bautizo.php?cod=<?php echo $reg['codigo_per']; ?>" target="_blank"><input type="buttom" class="btn btn-primary" name="imprimir" Value="Imprimir"></a>
          </div>
        </div>
<?php
      }
      else
      {
        echo '<h6 align="center" class="alerta"> No existe bautizo correspondiente a la "Cédula" ingresada </h6>';
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> La "Cédula" Ingresada no está registrada </h6>';
    }
  }
  if(($bandera==1) and ($consulta=='baunom'))
  {
    $fn = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fn'])));
    $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE (nombre_per LIKE '%".$_POST['nom']."%') AND (apellido_per like '%".$_POST['ap']."%') AND (fechanac_per= '$fn')");
    @$num_resultados=mysqli_num_rows($registros);
    if($num_resultados>0)
    {
      $inc=0;
      for($i=0;$i<$num_resultados;$i++)
      { 
        $reg=mysqli_fetch_array($registros);
        $registrosbautizo=mysqli_query($conexion,"SELECT * FROM bautizo WHERE codigo_per='$reg[codigo_per]'");
        if($regbautizo=mysqli_fetch_array($registrosbautizo))
        {
          $bautizados[$inc]=$regbautizo['codigo_per'];
          $inc++;
        }
      }
      if($inc>0)
      {
?>
        <br><br>
        <div class="table-responsive" id="tablanom">
          <table class="table table-bordered" id="tabla_nom">
            <tr>
              <th class="text-center">Bautizado</th>
              <th class="text-center">Fecha de Nac.</th>
              <th class="text-center">Padre</th>
              <th class="text-center">Madre</th>
              <th class="text-center">Padrino</th>
              <th class="text-center">Madrina</th>
              <th class="text-center">Fecha de Bautizo</th>
            </tr>
<?php
            for($i=0;$i<$inc;$i++)
            {
              $registrospersonas=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per=$bautizados[$i]");
              $regpersonas=mysqli_fetch_array($registrospersonas)or die(mysqli_error());    
?>
              <tr>
                <td class="text-center"><?php echo $regpersonas['nombre_per'].' '.$regpersonas['apellido_per']; ?></td>
                <?php
                  $fnac = date('d/m/Y', strtotime(str_replace('/', '-', $regpersonas['fechanac_per'])));
                ?>
                <td class="text-center"><?php echo $fnac; ?></td>
                <?php
                  $registrospadres=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per=$bautizados[$i]");
                  $regpadres=mysqli_fetch_array($registrospadres);
                  $registrospad=mysqli_query($conexion,"SELECT * FROM padre,madre WHERE cedula_pad='$regpadres[cedula_pad]' AND cedula_mad='$regpadres[cedula_mad]'");
                  $regpad=mysqli_fetch_array($registrospad);
                ?>
                <td class="text-center"><?php echo $regpad['nombre_pad'].' '.$regpad['apellido_pad']; ?></td>
                <td class="text-center"><?php echo $regpad['nombre_mad'].' '.$regpad['apellido_mad']; ?></td>
                <?php
                  $registrospadrinos=mysqli_query($conexion,"SELECT * FROM padrinosbautizado WHERE codigo_per=$bautizados[$i]");
                  $regpadrinos=mysqli_fetch_array($registrospadrinos);
                  $registrospdr=mysqli_query($conexion,"SELECT * FROM padrino,madrina WHERE cedula_pdr='$regpadrinos[cedula_pdr]' AND cedula_mdr='$regpadrinos[cedula_mdr]'");
                  $regpdr=mysqli_fetch_array($registrospdr);
                ?>
                <td class="text-center"><?php echo $regpdr['nombre_pdr'].' '.$regpdr['apellido_pdr']; ?></td>
                <td class="text-center"><?php echo $regpdr['nombre_mdr'].' '.$regpdr['apellido_mdr']; ?></td>
                <?php
                  $registrosbau=mysqli_query($conexion,"SELECT fecha_bau FROM bautizo WHERE codigo_per=$bautizados[$i]");
                  $regbau=mysqli_fetch_array($registrosbau);
                  $fbau = date('d/m/Y', strtotime(str_replace('/', '-', $regbau['fecha_bau'])));
                ?>
                <td class="text-center"><?php echo $fbau; ?></td>
                <td class="text-center"><a href="editar-bautizo.php?cod=<?php echo $regpersonas['codigo_per']; ?>">Modificar</a></td>
                <td class="text-center"><a href="imprimir-bautizo.php?cod=<?php echo $regpersonas['codigo_per']; ?>" target="_blank">Imprimir</a></td>
              </tr>
<?php
            }
?>
          </table>
        </div>
<?php
      }
      else
      {
        echo '<h6 align="center" class="alerta"> No existen registros </h6>';
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No existen registros </h6>';
    } 
  }
  if(($bandera==1) and ($consulta=='baupad'))
  {
    $registrospadre=mysqli_query($conexion,"SELECT * FROM padre WHERE cedula_pad='$_POST[cedulapad]'");
    if($regpadre=mysqli_fetch_array($registrospadre))
    {
      $indice=0;
      $registropad=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE cedula_pad='$regpadre[cedula_pad]'");
      while($regpad=mysqli_fetch_array($registropad))
      {              
        $registroper=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$regpad[codigo_per]'");
        $regper=mysqli_fetch_array($registroper);
        $personas[$indice]=$regper['codigo_per'];
        $indice++;
      }
      if($indice>0)
      {
        $ind=0;
        for($i=0;$i<$indice;$i++)
        {
          $registrobautizo=mysqli_query($conexion,"SELECT * FROM bautizo WHERE codigo_per='$personas[$i]'");
          if($regbautizo=mysqli_fetch_array($registrobautizo));
          {
            $bautizado[$ind]=$regbautizo['codigo_per'];
            $ind++;
          }
        }
        if($ind>0)
        {
?>
        <br><br>
        <div class="table-responsive" id="tablapad">
          <table class="table table-bordered" id="tabla_pad">
            <tr>
              <th class="text-center">Bautizado</th>
              <th class="text-center">Fecha de Nac.</th>
              <th class="text-center">Padre</th>
              <th class="text-center">Madre</th>
              <th class="text-center">Padrino</th>
              <th class="text-center">Madrina</th>
              <th class="text-center">Fecha de Bautizo</th>
            </tr>
<?php
            for($j=0;$j<$ind;$j++)
            {
              $registrospersonas=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$bautizado[$j]'");
              if($regpersonas=mysqli_fetch_array($registrospersonas))
              { 
                $fnac = date('d/m/Y', strtotime(str_replace('/', '-', $regpersonas['fechanac_per'])));  

                $registromad=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$bautizado[$j]'") or die(mysqli_error());
                $regmad=mysqli_fetch_array($registromad);
                $registromadre=mysqli_query($conexion,"SELECT * FROM madre WHERE cedula_mad='$regmad[cedula_mad]'")or die(mysqli_error());
                $regmadre=mysqli_fetch_array($registromadre);

                $registrospadrinos=mysqli_query($conexion,"SELECT * FROM padrinosbautizado WHERE codigo_per='$bautizado[$j]'");
                $regpadrinos=mysqli_fetch_array($registrospadrinos);
                $registropadri=mysqli_query($conexion,"SELECT * FROM padrino,madrina WHERE cedula_pdr='$regpadrinos[cedula_pdr]' AND cedula_mdr='$regpadrinos[cedula_mdr]'");
                $regpadri=mysqli_fetch_array($registropadri);

                $registrosbau=mysqli_query($conexion,"SELECT fecha_bau FROM bautizo WHERE codigo_per='$bautizado[$j]'");
                $regbau=mysqli_fetch_array($registrosbau);
                $fbau = date('d/m/Y', strtotime(str_replace('/', '-', $regbau['fecha_bau'])));
?>
                <tr>
                  <td class="text-center"><?php echo $regpersonas['nombre_per'].' '.$regpersonas['apellido_per']; ?></td>
                  <td class="text-center"><?php echo $fnac; ?></td>
                  <td class="text-center"><?php echo $regpadre['nombre_pad'].' '.$regpadre['apellido_pad']; ?></td>
                  <td class="text-center"><?php echo $regmadre['nombre_mad'].' '.$regmadre['apellido_mad']; ?></td>
                  <td class="text-center"><?php echo $regpadri['nombre_pdr'].' '.$regpadri['apellido_pdr']; ?></td>
                  <td class="text-center"><?php echo $regpadri['nombre_mdr'].' '.$regpadri['apellido_mdr']; ?></td>
                  <td class="text-center"><?php echo $fbau; ?></td>
                  <td class="text-center"><a href="editar-bautizo.php?cod=<?php echo $regpersonas['codigo_per']; ?>">Modificar</a></td>
                  <td class="text-center"><a href="imprimir-bautizo.php?cod=<?php echo $regpersonas['codigo_per']; ?>" target="_blank">Imprimir</td>
                </tr>
<?php
              }
            }
?>
          </table>
        </div>
<?php
        }
        else
        {
          echo '<h6 align="center" class="alerta"> No existen registros </h6>';
        }
      }
    }
    else
    {
      $registrosmadre=mysqli_query($conexion,"SELECT * FROM madre WHERE cedula_mad='$_POST[cedulapad]'");
      if($regmadre=mysqli_fetch_array($registrosmadre))
      {
        $indice=0;
        $registromad=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE cedula_mad='$regmadre[cedula_mad]'");
        while($regmad=mysqli_fetch_array($registromad))
        {              
          $registroper=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$regmad[codigo_per]'");
          $regper=mysqli_fetch_array($registroper);
          $personas[$indice]=$regper['codigo_per'];
          $indice++;
        }
        if($indice>0)
        {
          $ind=0;
          for($i=0;$i<$indice;$i++)
          {
            $registrobautizo=mysqli_query($conexion,"SELECT * FROM bautizo WHERE codigo_per='$personas[$i]'");
            if($regbautizo=mysqli_fetch_array($registrobautizo));
            {
              $bautizado[$ind]=$regbautizo['codigo_per'];
              $ind++;
            }
          }
          if($ind>0)
          {
?>
          <br><br>
          <div class="table-responsive" id="tablamad">
            <table class="table table-bordered" id="tabla_mad">
              <tr>
                <th class="text-center">Bautizado</th>
                <th class="text-center">Fecha de Nac.</th>
                <th class="text-center">Padre</th>
                <th class="text-center">Madre</th>
                <th class="text-center">Padrino</th>
                <th class="text-center">Madrina</th>
                <th class="text-center">Fecha de Bautizo</th>
              </tr>
<?php
              for($j=0;$j<$ind;$j++)
              {
                $registrospersonas=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$bautizado[$j]'");
                if($regpersonas=mysqli_fetch_array($registrospersonas))
                { 
                  $fnac = date('d/m/Y', strtotime(str_replace('/', '-', $regpersonas['fechanac_per'])));  

                  $registropad=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$bautizado[$j]'") or die(mysqli_error());
                  $regpad=mysqli_fetch_array($registropad);
                  $registropadre=mysqli_query($conexion,"SELECT * FROM padre WHERE cedula_pad='$regpad[cedula_pad]'")or die(mysqli_error());
                  $regpadre=mysqli_fetch_array($registropadre);

                  $registrospadrinos=mysqli_query($conexion,"SELECT * FROM padrinosbautizado WHERE codigo_per='$bautizado[$j]'");
                  $regpadrinos=mysqli_fetch_array($registrospadrinos);
                  $registropadri=mysqli_query($conexion,"SELECT * FROM padrino,madrina WHERE cedula_pdr='$regpadrinos[cedula_pdr]' AND cedula_mdr='$regpadrinos[cedula_mdr]'");
                  $regpadri=mysqli_fetch_array($registropadri);

                  $registrosbau=mysqli_query($conexion,"SELECT fecha_bau FROM bautizo WHERE codigo_per='$bautizado[$j]'");
                  $regbau=mysqli_fetch_array($registrosbau);
                  $fbau = date('d/m/Y', strtotime(str_replace('/', '-', $regbau['fecha_bau'])));
?>
                  <tr>
                    <td class="text-center"><?php echo $regpersonas['nombre_per'].' '.$regpersonas['apellido_per']; ?></td>
                    <td class="text-center"><?php echo $fnac; ?></td>
                    <td class="text-center"><?php echo $regpadre['nombre_pad'].' '.$regpadre['apellido_pad']; ?></td>
                    <td class="text-center"><?php echo $regmadre['nombre_mad'].' '.$regmadre['apellido_mad']; ?></td>
                    <td class="text-center"><?php echo $regpadri['nombre_pdr'].' '.$regpadri['apellido_pdr']; ?></td>
                    <td class="text-center"><?php echo $regpadri['nombre_mdr'].' '.$regpadri['apellido_mdr']; ?></td>
                    <td class="text-center"><?php echo $fbau; ?></td>
                    <td class="text-center"><a href="editar-bautizo.php?cod=<?php echo $regpersonas['codigo_per']; ?>">Modificar</a></td>
                    <td class="text-center"><a href="imprimir-bautizo.php?cod=<?php echo $regpersonas['codigo_per']; ?>" target="_blank">Imprimir</td>
                  </tr>
<?php
                }
              }
?>
            </table>
          </div>
<?php
          }
          else
          {
            echo '<h6 align="center" class="alerta"> No existen registros </h6>';
          }
        }
      }
      else
      {
        echo '<h6 align="center" class="alerta"> La "Cédula" ingresada no existe </h6>';
      }
    }
  }
  if(($bandera==1) and ($consulta=='baupdr'))
  {
    $registrospadrino=mysqli_query($conexion,"SELECT * FROM padrino WHERE cedula_pdr='$_POST[cedulapdr]'");
    if($regpadrino=mysqli_fetch_array($registrospadrino))
    {
      $indice=0;
      $registrospdr=mysqli_query($conexion,"SELECT * FROM padrinosbautizado WHERE cedula_pdr='$regpadrino[cedula_pdr]'");
      while($regpdr=mysqli_fetch_array($registrospdr))
      {
        $bautizado[$indice]=$regpdr['codigo_per'];
        $madrina[$indice]=$regpdr['cedula_mdr'];
        $indice++;
      }
      if($indice>0)
      {
?>
        <br><br>
          <div class="table-responsive" id="tablapdr">
            <table class="table table-bordered" id="tabla_pdr">
              <tr>
                <th class="text-center">Bautizado</th>
                <th class="text-center">Fecha de Nac.</th>
                <th class="text-center">Padre</th>
                <th class="text-center">Madre</th>
                <th class="text-center">Padrino</th>
                <th class="text-center">Madrina</th>
                <th class="text-center">Fecha de Bautizo</th>
              </tr>
<?php
              for($j=0;$j<$indice;$j++)
              {
                $registrospersonas=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$bautizado[$j]'");
                if($regpersonas=mysqli_fetch_array($registrospersonas))
                { 
                  $fnac = date('d/m/Y', strtotime(str_replace('/', '-', $regpersonas['fechanac_per'])));  

                  $registropad=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$bautizado[$j]'") or die(mysqli_error());
                  $regpad=mysqli_fetch_array($registropad);
                  $registropadre=mysqli_query($conexion,"SELECT * FROM padre,madre WHERE cedula_pad='$regpad[cedula_pad]' AND cedula_mad='$regpad[cedula_mad]'")or die(mysqli_error());
                  $regpadre=mysqli_fetch_array($registropadre);

                  $registromadri=mysqli_query($conexion,"SELECT * FROM madrina WHERE cedula_mdr='$madrina[$j]'");
                  $regmadri=mysqli_fetch_array($registromadri);

                  $registrosbau=mysqli_query($conexion,"SELECT fecha_bau FROM bautizo WHERE codigo_per='$bautizado[$j]'");
                  $regbau=mysqli_fetch_array($registrosbau);
                  $fbau = date('d/m/Y', strtotime(str_replace('/', '-', $regbau['fecha_bau'])));
?>
                  <tr>
                    <td class="text-center"><?php echo $regpersonas['nombre_per'].' '.$regpersonas['apellido_per']; ?></td>
                    <td class="text-center"><?php echo $fnac; ?></td>
                    <td class="text-center"><?php echo $regpadre['nombre_pad'].' '.$regpadre['apellido_pad']; ?></td>
                    <td class="text-center"><?php echo $regpadre['nombre_mad'].' '.$regpadre['apellido_mad']; ?></td>
                    <td class="text-center"><?php echo $regpadrino['nombre_pdr'].' '.$regpadrino['apellido_pdr']; ?></td>
                    <td class="text-center"><?php echo $regmadri['nombre_mdr'].' '.$regmadri['apellido_mdr']; ?></td>
                    <td class="text-center"><?php echo $fbau; ?></td>
                    <td class="text-center"><a href="editar-bautizo.php?cod=<?php echo $regpersonas['codigo_per']; ?>">Modificar</a></td>
                    <td class="text-center"><a href="imprimir-bautizo.php?cod=<?php echo $regpersonas['codigo_per']; ?>" target="_blank">Imprimir</td>
                  </tr>
<?php
                }
              }
?>
            </table>
          </div>
<?php
      }
      else
      {
        echo '<h6 align="center" class="alerta"> No existen registros </h6>';
      }
    }
    else
    {
      $registrosmadrina=mysqli_query($conexion,"SELECT * FROM madrina WHERE cedula_mdr='$_POST[cedulapdr]'");
      if($regmadrina=mysqli_fetch_array($registrosmadrina))
      {
        $indice=0;
        $registrosmdr=mysqli_query($conexion,"SELECT * FROM padrinosbautizado WHERE cedula_mdr='$regmadrina[cedula_mdr]'");
        while($regmdr=mysqli_fetch_array($registrosmdr))
        {
          $bautizado[$indice]=$regmdr['codigo_per'];
          $padrino[$indice]=$regmdr['cedula_pdr'];
          $indice++;
        }
        if($indice>0)
        {
?>
          <br><br>
            <div class="table-responsive" id="tablamdr">
              <table class="table table-bordered" id="tabla_mdr">
                <tr>
                  <th class="text-center">Bautizado</th>
                  <th class="text-center">Fecha de Nac.</th>
                  <th class="text-center">Padre</th>
                  <th class="text-center">Madre</th>
                  <th class="text-center">Padrino</th>
                  <th class="text-center">Madrina</th>
                  <th class="text-center">Fecha de Bautizo</th>
                </tr>
<?php
                for($j=0;$j<$indice;$j++)
                {
                  $registrospersonas=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$bautizado[$j]'");
                  if($regpersonas=mysqli_fetch_array($registrospersonas))
                  { 
                    $fnac = date('d/m/Y', strtotime(str_replace('/', '-', $regpersonas['fechanac_per'])));  

                    $registropad=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$bautizado[$j]'") or die(mysqli_error());
                    $regpad=mysqli_fetch_array($registropad);
                    $registropadre=mysqli_query($conexion,"SELECT * FROM padre,madre WHERE cedula_pad='$regpad[cedula_pad]' AND cedula_mad='$regpad[cedula_mad]'")or die(mysqli_error());
                    $regpadre=mysqli_fetch_array($registropadre);

                    $registropadri=mysqli_query($conexion,"SELECT * FROM padrino WHERE cedula_pdr='$padrino[$j]'");
                    $regpadri=mysqli_fetch_array($registropadri);

                    $registrosbau=mysqli_query($conexion,"SELECT fecha_bau FROM bautizo WHERE codigo_per='$bautizado[$j]'");
                    $regbau=mysqli_fetch_array($registrosbau);
                    $fbau = date('d/m/Y', strtotime(str_replace('/', '-', $regbau['fecha_bau'])));
?>
                    <tr>
                      <td class="text-center"><?php echo $regpersonas['nombre_per'].' '.$regpersonas['apellido_per']; ?></td>
                      <td class="text-center"><?php echo $fnac; ?></td>
                      <td class="text-center"><?php echo $regpadre['nombre_pad'].' '.$regpadre['apellido_pad']; ?></td>
                      <td class="text-center"><?php echo $regpadre['nombre_mad'].' '.$regpadre['apellido_mad']; ?></td>
                      <td class="text-center"><?php echo $regpadri['nombre_pdr'].' '.$regpadri['apellido_pdr']; ?></td>
                      <td class="text-center"><?php echo $regmadrina['nombre_mdr'].' '.$regmadrina['apellido_mdr']; ?></td>
                      <td class="text-center"><?php echo $fbau; ?></td>
                      <td class="text-center"><a href="editar-bautizo.php?cod=<?php echo $regpersonas['codigo_per']; ?>">Modificar</a></td>
                      <td class="text-center"><a href="imprimir-bautizo.php?cod=<?php echo $regpersonas['codigo_per']; ?>" target="_blank">Imprimir</td>
                    </tr>
<?php
                  }
                }
?>
              </table>
            </div>
<?php
        }
        else
        {
          echo '<h6 align="center" class="alerta"> No existen registros </h6>';
        }
      }
      else
      {
        echo '<h6 align="center" class="alerta"> La "Cédula" ingresada no existe </h6>';
      }
    }
  }
}
function editarbau($bandera)
{
  include("../php/conexion.php");
  if($bandera==1)
  {
    if(isset($_POST['nombre']) and (trim($_POST['nombre'])!="") and (isset($_POST['apellido'])) and (trim($_POST['apellido'])!="") and (isset($_POST['sexo'])) and ($_POST['sexo']!="") and (isset($_POST['fechanac'])) and (trim($_POST['fechanac'])!="") and (isset($_POST['lugarnac'])) and (trim($_POST['lugarnac'])!="") and (isset($_POST['registrocivil'])) and (trim($_POST['registrocivil'])!="") and (isset($_POST['cedulapadre'])) and (trim($_POST['cedulapadre'])!="") and (isset($_POST['nombrepadre'])) and (trim($_POST['nombrepadre'])!="") and (isset($_POST['apellidopadre'])) and (trim($_POST['apellidopadre'])!="") and (isset($_POST['cedulamadre'])) and (trim($_POST['cedulamadre'])!="") and (isset($_POST['nombremadre'])) and (trim($_POST['nombremadre'])!="") and (isset($_POST['apellidomadre'])) and (trim($_POST['apellidomadre'])!="") and (isset($_POST['filiacion'])) and (trim($_POST['filiacion'])!="") and (isset($_POST['cedulapadrino'])) and (trim($_POST['cedulapadrino'])!="") and (isset($_POST['nombrepadrino'])) and (trim($_POST['nombrepadrino'])!="") and (isset($_POST['apellidopadrino'])) and (trim($_POST['apellidopadrino'])!="") and (isset($_POST['cedulamadrina'])) and (trim($_POST['cedulamadrina'])!="") and (isset($_POST['nombremadrina'])) and (trim($_POST['nombremadrina'])!="") and (isset($_POST['apellidomadrina'])) and (trim($_POST['apellidomadrina'])!="") and (isset($_POST['fechabautizo'])) and (trim($_POST['fechabautizo'])!=""))
    {
      $registros=mysqli_query($conexion,"SELECT cedula_per FROM personas WHERE cedula_per=$_POST[cedula] AND codigo_per<>$_POST[codigo]");
      @$num_filas=mysqli_num_rows($registros);
      if($num_filas>0)
      {
        echo '<h6 align="center" class="alerta"> Ya existe un registro correspondiente a la "Cédula" ingresada </h6>';
      }
      else
      {
        $fnac = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanac'])));
        $fbau = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechabautizo'])));

        if((isset($_POST['otroministro'])) and (trim($_POST['otroministro']!=""))) 
        {
          $registros=mysqli_query($conexion,"SELECT codigo_min FROM ministro ORDER BY codigo_min DESC LIMIT 1");
          if($reg=mysqli_fetch_array($registros))
          {
            $maximoid=$reg['codigo_min'];
            $id_ministro=$maximoid+1;
            mysqli_query($conexion,"INSERT INTO ministro(ministro_min) VALUES ('$_POST[otroministro]')");
          }
        }
        else
        {
          $id_ministro=$_POST['ministro'];
        }
        mysqli_query($conexion,"UPDATE personas SET cedula_per='$_POST[cedula]',nombre_per='$_POST[nombre]',apellido_per='$_POST[apellido]',sexo_per='$_POST[sexo]',fechanac_per='$fnac',lugarnac_per='$_POST[lugarnac]',registrocivil_per='$_POST[registrocivil]',lugarbautizo_per='La Beatriz' WHERE codigo_per='$_POST[codigo]'");

        $registrospadre=mysqli_query($conexion,"SELECT * FROM padre WHERE cedula_pad='$_POST[cedulapadre]'");
        if($regpadre=mysqli_fetch_array($registrospadre))
        {
          mysqli_query($conexion,"UPDATE padrespersona SET cedula_pad='$_POST[cedulapadre]' WHERE codigo_per='$_POST[codigo]'");
          mysqli_query($conexion,"UPDATE padre SET nombre_pad='$_POST[nombrepadre]',apellido_pad='$_POST[apellidopadre]' WHERE cedula_pad='$_POST[cedulapadre]'");
        }
        else
        {
          mysqli_query($conexion,"INSERT INTO padre(cedula_pad,nombre_pad,apellido_pad) VALUES ('$_POST[cedulapadre]','$_POST[nombrepadre]','$_POST[apellidopadre]')");
          mysqli_query($conexion,"UPDATE padrespersona SET cedula_pad='$_POST[cedulapadre]' WHERE codigo_per='$_POST[codigo]'");
        }

        $registrosmadre=mysqli_query($conexion,"SELECT * FROM madre WHERE cedula_mad='$_POST[cedulamadre]'");
        if($regmadre=mysqli_fetch_array($registrosmadre))
        {
          mysqli_query($conexion,"UPDATE padrespersona SET cedula_mad='$_POST[cedulamadre]' WHERE codigo_per='$_POST[codigo]'");
          mysqli_query($conexion,"UPDATE madre SET nombre_mad='$_POST[nombremadre]',apellido_mad='$_POST[apellidomadre]' WHERE cedula_mad='$_POST[cedulamadre]'");
        }
        else
        {
          mysqli_query($conexion,"INSERT INTO madre(cedula_mad,nombre_mad,apellido_mad) VALUES ('$_POST[cedulamadre]','$_POST[nombremadre]','$_POST[apellidomadre]')");
          mysqli_query($conexion,"UPDATE padrespersona SET cedula_mad='$_POST[cedulamadre]' WHERE codigo_per='$_POST[codigo]'");
        }

        $registrospadrino=mysqli_query($conexion,"SELECT * FROM padrino WHERE cedula_pdr='$_POST[cedulapadrino]'");
        if($regpadrino=mysqli_fetch_array($registrospadrino))
        {
          mysqli_query($conexion,"UPDATE padrinosbautizado SET cedula_pdr='$_POST[cedulapadrino]' WHERE codigo_per='$_POST[codigo]'");
          mysqli_query($conexion,"UPDATE padrino SET nombre_pdr='$_POST[nombrepadrino]',apellido_pdr='$_POST[apellidopadrino]' WHERE cedula_pdr='$_POST[cedulapadrino]'");
        }
        else
        {
          mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");
          mysqli_query($conexion,"UPDATE padrinosbautizado SET cedula_pdr='$_POST[cedulapadrino]' WHERE codigo_per='$_POST[codigo]'");
        }

        $registrosmadrina=mysqli_query($conexion,"SELECT * FROM madrina WHERE cedula_mdr='$_POST[cedulamadrina]'");
        if($regmadrina=mysqli_fetch_array($registrosmadrina))
        {
          mysqli_query($conexion,"UPDATE padrinosbautizado SET cedula_mdr='$_POST[cedulamadrina]' WHERE codigo_per='$_POST[codigo]'");
          mysqli_query($conexion,"UPDATE madrina SET nombre_mdr='$_POST[nombremadrina]',apellido_mdr='$_POST[apellidomadrina]' WHERE cedula_mdr='$_POST[cedulamadrina]'");
        }
        else
        {
          mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulamadrina]','$_POST[nombremadrina]','$_POST[apellidomadrina]')");
          mysqli_query($conexion,"UPDATE padrinosbautizado SET cedula_mdr='$_POST[cedulamadrina]' WHERE codigo_per='$_POST[codigo]'");
        }

        mysqli_query($conexion,"UPDATE bautizo SET codigo_min='$id_ministro',fecha_bau='$fbau',observacion_bau='$_POST[observaciones]' WHERE codigo_per='$_POST[codigo]'");
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*) </h6>';
    }
  }
}
function validarco($opcion)
{
  if(isset($_POST['fecha']))
  {
    $flag=4;
    $control=0;
    if(!((isset($_POST['fechaco'])) and (trim($_POST['fechaco'])!="")))
    {
      $flag=1;
      $control=1;
    }
    if(!(($_POST['ministro']>0) or (isset($_POST['otroministro']) and trim($_POST['otroministro'])!="" and trim($_POST['otroministro'])!="Otro...")))
    {
      $flag=2;
    }
    if(!(($_POST['ministro']>0) or (isset($_POST['otroministro']) and trim($_POST['otroministro'])!="" and trim($_POST['otroministro'])!="Otro...")) and ($control==1))
    {
      $flag=3;
    }
    return $flag;
  }
  else
    return 0;
}
function enviarco($opc)
{
  include('../php/conexion.php');
  $codigomin=$_POST['ministro'];
  if(isset($_POST['otroministro']) and (trim($_POST['otroministro'])!="") and (trim($_POST['otroministro'])!="Otro..."))
  {
    $registros=mysqli_query($conexion,"SELECT codigo_min FROM ministro ORDER BY codigo_min DESC LIMIT 1");
    if($reg=mysqli_fetch_array($registros))
    {
      $maximo=$reg['codigo_min'];
      $codigomin=$maximo+1;
      mysqli_query($conexion,"INSERT INTO ministro(ministro_min) VALUES ('$_POST[otroministro]')");
    }
    else
    {
       mysqli_query($conexion,"INSERT INTO ministro(ministro_min) VALUES ('$_POST[otroministro]')");
       $codigomin=1;
    }
  }
  $fechaco=$_POST['fechaco'];
  if($opc==1)
  {
    header("location: comunion.php?fec=$fechaco&min=$codigomin");
  }
  if($opc==2)
  {
    header("location: confirmacion.php?fec=$fechaco&min=$codigomin");
  }
}
function validacionco()
{
  if(isset($_POST['regco']))
  {
    $flag=1;
    if($_POST['lugarbau']=='LB')
    {
      if($_POST['tipobusqueda']==1)
      {
        if(isset($_POST['cedul']) AND (trim($_POST['cedul'])!=""))
        {
          if(!(filter_var($_POST['cedul'], FILTER_VALIDATE_INT)))
          {
            echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
            $flag=0;
          }
        }
      }
      if($_POST['tipobusqueda']==2)
      {
        if(isset($_POST['nueva_ced']) AND (trim($_POST['nueva_ced'])!=""))
        {
          if(!(filter_var($_POST['nueva_ced'], FILTER_VALIDATE_INT)))
          {
            echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
            $flag=0;
          }
        }
      }
    }
    if($_POST['lugarbau']=='O') 
    {
      if(isset($_POST['cedula']) AND (trim($_POST['cedula'])!=""))
      {
        if(!(filter_var($_POST['cedula'], FILTER_VALIDATE_INT)))
        {
          echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
          $flag=0;
        }
      }
      if(isset($_POST['cedulapadre']) AND (trim($_POST['cedulapadre'])!=""))
      {
        if(!(filter_var($_POST['cedulapadre'], FILTER_VALIDATE_INT)))
        {
          echo '<h6 align="center" class="alerta"> El campo "Cédula del Padre" acepta solo números</h6>';
          $flag=0;
        }
      }
      if(isset($_POST['cedulamadre']) AND (trim($_POST['cedulamadre'])!=""))
      {
        if(!(filter_var($_POST['cedulamadre'], FILTER_VALIDATE_INT)))
        {
          echo '<h6 align="center" class="alerta"> El campo "Cédula de la Madre" acepta solo números</h6>';
          $flag=0;
        }
      }
    }
    registrarcomunion($flag);
  }
}
function registrarcomunion($bandera)
{
  include("../php/conexion.php");
  $fcom = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fcomunion'])));
  $min=$_GET['min'];
  $registroscomunion=mysqli_query($conexion,"SELECT codigo_com FROM comunion WHERE fecha_com='$fcom'");
  @$num_filas_comunion=mysqli_num_rows($registroscomunion);
  if($num_filas_comunion>0)
  {
    $registroscomunion2=mysqli_query($conexion,"SELECT MAX(codigo_com) codcom FROM comunion WHERE fecha_com='$fcom'") or die(mysqli_error());
    $regcomunion2=mysqli_fetch_row($registroscomunion2);
    $codcom=trim($regcomunion2[0]);
  }
  else
  {
    $codcom=0;
  }
  if($bandera==1)
  {
    if(isset($_POST['lugarbau']))
    {
      if($_POST['lugarbau']=='LB')
      {
        if($_POST['tipobusqueda']==0)
        {
          echo '<h6 align="center" class="alerta"> Debe Seleccionar Tipo de Búsqueda </h6>';
        }
        if($_POST['tipobusqueda']==1)
        {
          if(isset($_POST['cedul']) and (trim($_POST['cedul'])!="") and (isset($_POST['nuevo_codigo'])) and (trim($_POST['nuevo_codigo'])!=""))
          {
            $registros=mysqli_query($conexion,"SELECT codigo_per FROM comunion WHERE codigo_per=$_POST[nuevo_codigo]");
            @$num_filas=mysqli_num_rows($registros);
            if($num_filas>0)
            {
              echo '<h6 align="center" class="alerta"> Ya existe un registro de comunión correspondiente a la "Cédula" ingresada </h6>';
            }
            else
            {
              if(isset($_POST['nueva_filiacion']) AND (trim('nueva_filiacion')!="") AND (isset($_POST['nuevo_padre'])) AND (trim($_POST['nuevo_padre'])!="") AND (isset($_POST['nueva_madre'])) AND (trim($_POST['nueva_madre'])!=""))
              {
                mysqli_query($conexion,"UPDATE padrespersona SET filiacion='$_POST[nueva_filiacion]' WHERE codigo_per=$_POST[nuevo_codigo]");
              }
              mysqli_query($conexion,"CALL sp_comunion('$codcom','$min','$_POST[nuevo_codigo]','$fcom')") or die(mysqli_error());
            }
          }
          else
          {
            echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*) y presionar el boton "Buscar" </h6>';
          }
        }
        if($_POST['tipobusqueda']==2)
        {
          if(isset($_POST['nombr']) and (trim($_POST['nombr'])!="") and (isset($_POST['apelli'])) and (trim($_POST['apelli'])!="") and (isset($_POST['cod'])) and (trim($_POST['cod'])!=""))
          {
            $registros=mysqli_query($conexion,"SELECT codigo_per FROM comunion WHERE codigo_per=$_POST[cod]");
            @$num_filas=mysqli_num_rows($registros);
            if($num_filas>0)
            {
              echo '<h6 align="center" class="alerta"> Ya existe un registro de comunión correspondiente a la persona seleccionada </h6>';
            }
            else
            {
              if(isset($_POST['nueva_ced']) AND (trim('nueva_ced')!=""))
              {
                mysqli_query($conexion,"UPDATE personas SET cedula_per='$_POST[nueva_ced]' WHERE codigo_per=$_POST[cod]");
              }
              if(isset($_POST['filiacion_nueva']) AND (trim('filiacion_nueva')!="") AND (isset($_POST['padre_nuevo'])) AND (trim($_POST['padre_nuevo'])!="") AND (isset($_POST['madre_nueva'])) AND (trim($_POST['madre_nueva'])!=""))
              {
                mysqli_query($conexion,"UPDATE padrespersona SET filiacion='$_POST[filiacion_nueva]' WHERE codigo_per=$_POST[cod]");
              }
              mysqli_query($conexion,"CALL sp_comunion('$codcom','$min','$_POST[cod]','$fcom')") or die(mysqli_error());
            }
          }
          else
          {
            echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*), presionar el boton "Buscar" y Seleccionar un código </h6>';
          }
        }
      }
      if($_POST['lugarbau']=='O')
      {
        if(isset($_POST['fechanac']) AND (trim($_POST['fechanac'])!=""))
        {
          $fnac = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanac'])));
        }
        else
        {
          $fnac="";
        }
        if(isset($_POST['nombre']) and (trim($_POST['nombre'])!="") and (isset($_POST['apellido'])) and (trim($_POST['apellido'])!=""))
        {
          if(isset($_POST['cedula']) AND (trim($_POST['cedula'])!=""))
          {
            $registros=mysqli_query($conexion,"SELECT codigo_per FROM personas WHERE cedula_per='$_POST[cedula]'");
            if($reg=mysqli_fetch_array($registros))
            {
              $registroscomunion=mysqli_query($conexion,"SELECT codigo_per FROM comunion WHERE codigo_per='$reg[codigo_per]'") or die(mysqli_error());
              @$num_filas=mysqli_num_rows($registros);
              if($num_filas>0)
              {
                echo '<h6 align="center" class="alerta"> Ya existe un registro de comunion correspondiente a la "Cédula" ingresada </h6>';
              }
              else
              {
                mysqli_query($conexion,"UPDATE personas SET nombre_per='$_POST[nombre]',apellido_per='$_POST[apellido]',sexo_per='$_POST[sexo]',fechanac_per='$fnac' WHERE codigo_per='$reg[codigo_per]'") or die(mysqli_error());
                $cod=$reg['codigo_per'];
              }
            }
            else
            {
              mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per) VALUES ('$_POST[cedula]','$_POST[nombre]','$_POST[apellido]','$_POST[sexo]','$fnac','$_POST[otrolugarbau]')") or die(mysqli_error());
              $cod=mysqli_insert_id($conexion);
            }
          }
          else
          {
            mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per) VALUES (NULL,'$_POST[nombre]','$_POST[apellido]','$_POST[sexo]','$fnac','$_POST[otrolugarbau]')") or die(mysqli_error());
            $cod=mysqli_insert_id($conexion);
          }
          if(isset($_POST['cedulapadre']) AND (trim($_POST['cedulapadre'])!="") AND (isset($_POST['cedulamadre'])) AND (trim($_POST['cedulamadre'])!=""))
          {
            $registrospadre=mysqli_query($conexion,"SELECT cedula_pad FROM padre WHERE cedula_pad=$_POST[cedulapadre]");
            @$num_filas_padre=mysqli_num_rows($registrospadre);
            if($num_filas_padre==0)
            {
              mysqli_query($conexion,"INSERT INTO padre(cedula_pad,nombre_pad,apellido_pad) VALUES ('$_POST[cedulapadre]','$_POST[nombrepadre]','$_POST[apellidopadre]')");  
            }
            else
            {
              mysqli_query($conexion,"UPDATE padre SET nombre_pad='$_POST[nombrepadre]',apellido_pad='$_POST[apellidopadre]' WHERE cedula_pad='$_POST[cedulapadre]'");
            }

            $registrosmadre=mysqli_query($conexion,"SELECT cedula_mad FROM madre WHERE cedula_mad=$_POST[cedulamadre]");
            @$num_filas_madre=mysqli_num_rows($registrosmadre);
            if($num_filas_madre==0)
            {
              mysqli_query($conexion,"INSERT INTO madre(cedula_mad,nombre_mad,apellido_mad) VALUES ('$_POST[cedulamadre]','$_POST[nombremadre]','$_POST[apellidomadre]')");  
            }
            else
            {
              mysqli_query($conexion,"UPDATE madre SET nombre_mad='$_POST[nombremadre]',apellido_mad='$_POST[apellidomadre]' WHERE cedula_mad='$_POST[cedulamadre]'");
            }

            $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$cod'");
            if($regpadper=mysqli_fetch_array($registrospadper))
            {
              mysqli_query($conexion,"UPDATE padrespersona SET cedula_pdr='$_POST[cedulapadre]',cedula_mdr='$_POST[cedulamadre]',filiacion='$_POST[filiacion]' WHERE codigo_per=$cod");
            }
            else
            {
              mysqli_query($conexion,"INSERT INTO padrespersona(codigo_per,cedula_pad,cedula_mad,filiacion) VALUES ('$cod','$_POST[cedulapadre]','$_POST[cedulamadre]','$_POST[filiacion]')");
            }
          }
          mysqli_query($conexion,"CALL sp_comunion('$codcom','$min','$cod','$fcom')") or die(mysqli_error());
        }
        else
        {
          echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
        }
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> Debe Seleccionar Lugar de Bautizo </h6>';
    }
  }
}
function validarComCed()
{
  $flag=1;
  if(isset($_POST['ComCed']))
  {
    if(isset($_POST['cedula']) and (trim($_POST['cedula'])!=""))
    {
      if(!(filter_var($_POST['cedula'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> el campo "Cédula" acepta solo números</h6>';
        $flag=0;
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ninguna "Cédula" </h6>';
      $flag=0;
    }
    buscarcom($flag,'comced');
  }
}
function validarComNom()
{
  $flag=1;
  if(isset($_POST['ComNom']))
  {
    echo '<br>';
    if(!((isset($_POST['nom']) and (trim($_POST['nom'])!=""))))
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ningún "Nombre" </h6>';
      $flag=0;
    }
    if(!((isset($_POST['ap']) and (trim($_POST['ap'])!=""))))
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ningún "Apellido" </h6>';
      $flag=0;
    }
    buscarcom($flag,'comnom');
  }
}
function validarComAnio()
{
  $flag=1;
  if(isset($_POST['ComAnio']))
  {
    echo '<br>';
    if(isset($_POST['aniocom']) and (trim($_POST['aniocom'])!=""))
    {
      if(!(filter_var($_POST['aniocom'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Año de la Primera Comunión" acepta solo números </h6>';
        $flag=0;
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado "Año de la Primera Comunión" </h6>';
      $flag=0;
    }
    buscarcom($flag,'comanio');
  }
}
function buscarcom($bandera,$consulta)
{
  include("../php/conexion.php");
  if(($bandera==1) and $consulta=='comced')
  {
    $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE cedula_per='$_POST[cedula]'");
    if($reg=mysqli_fetch_array($registros))
    {
      $codigoper=$reg['codigo_per'];
      $registroscomunion=mysqli_query($conexion,"SELECT * FROM comunion WHERE codigo_per=$codigoper");
      if($regcomunion=mysqli_fetch_array($registroscomunion))
      {
        $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regcomunion[codigo_min]'");
        $regministro=mysqli_fetch_array($registrosministro);
?>
        <br>
        <br>
        <div class="table-responsive" id="tablaced">
          <table class="table table-bordered" id="tabla_ced">
            <tr>
              <th class="text-center">N°</th>
              <th class="text-center">Nombre y Apellido</th>
              <th class="text-center">Fecha de Comunión</th>
              <th class="text-center">Ministro</th>
            </tr>
            <tr>
              <?php
                $fcom = date('d/m/Y', strtotime(str_replace('/', '-', $regcomunion['fecha_com'])));
              ?>
              <td class="text-center"><?php echo 1; ?></td>
              <td class="text-center"><?php echo $reg['nombre_per'].' '.$reg['apellido_per']; ?></td> 
              <td class="text-center"><?php echo $fcom; ?></td>
              <td class="text-center"><?php echo $regministro['ministro_min']; ?></td>             
            </tr>
          </table>
        </div>
        <div class="row">
          <div align="center" class="col-sm-12">
            <br>
            <a href="editar-comunion.php?cod=<?php echo $reg['codigo_per']; ?>"><input type="buttom" class="btn btn-primary" name="modificar" Value="Modificar"></a>
            <a href="constancia-comunion.php?cod=<?php echo $reg['codigo_per']; ?>" target="_blank"><input type="buttom" class="btn btn-primary" name="imprimir" Value="Imprimir"></a>
          </div>
        </div>
<?php
      }
      else
      {
        echo '<h6 align="center" class="alerta"> No existe comunión correspondiente a la "Cédula" ingresada </h6>';
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> La "Cédula" Ingresada no está registrada </h6>';
    }
  }
  if(($bandera==1) and ($consulta=='comnom'))
  {
    $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE (nombre_per LIKE '%".$_POST['nom']."%') AND (apellido_per like '%".$_POST['ap']."%')");
    @$num_resultados=mysqli_num_rows($registros);
    if($num_resultados>0)
    {
      $inc=0;
      for($i=0;$i<$num_resultados;$i++)
      { 
        $reg=mysqli_fetch_array($registros);
        $registroscomunion=mysqli_query($conexion,"SELECT * FROM comunion WHERE codigo_per='$reg[codigo_per]'");
        if($regcomunion=mysqli_fetch_array($registroscomunion))
        {
          $comuniones[$inc]=$regcomunion['codigo_per'];
          $inc++;
        }
      }
      if($inc>0)
      {
?>
        <br><br>
        <div class="table-responsive" id="tablanom">
          <table class="table table-bordered" id="tabla_nom">
            <tr>
              <th class="text-center">N°</th>
              <th class="text-center">Nombre y Apellido</th>
              <th class="text-center">Fecha de Comunión</th>
              <th class="text-center">Ministro</th>
            </tr>
<?php
            for($i=0;$i<$inc;$i++)
            {
              $registrospersonas=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$comuniones[$i]'");
              $regpersonas=mysqli_fetch_array($registrospersonas)or die(mysqli_error());    
?>
              <tr>
                <?php
                  $registroscom=mysqli_query($conexion,"SELECT * FROM comunion WHERE codigo_per='$comuniones[$i]'");
                  $regcom=mysqli_fetch_array($registroscom);
                  $fcom = date('d/m/Y', strtotime(str_replace('/', '-', $regcom['fecha_com'])));
                ?>
                <td class="text-center"><?php echo $i+1; ?></td>
                <td class="text-center"><?php echo $regpersonas['nombre_per'].' '.$regpersonas['apellido_per']; ?></td>
                <td class="text-center"><?php echo $fcom; ?></td>
                <?php
                  $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regcom[codigo_min]'");
                  $regministro=mysqli_fetch_array($registrosministro);
                ?>
                <td class="text-center"><?php echo $regministro['ministro_min']; ?></td>
                <td class="text-center"><a href="editar-comunion.php?cod=<?php echo $regpersonas['codigo_per']; ?>">Modificar</a></td>
                <td class="text-center"><a href="constancia-comunion.php?cod=<?php echo $regpersonas['codigo_per']; ?>" target="_blank">Imprimir</a></td>
              </tr>
<?php
            }
?>
          </table>
        </div>
<?php
      }
      else
      {
        echo '<h6 align="center" class="alerta"> No existen registros </h6>';
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No existen registros </h6>';
    } 
  }
  if(($bandera==1) and ($consulta=='comanio'))
  {

    $registroscomunion=mysqli_query($conexion,"SELECT * FROM comunion WHERE YEAR(fecha_com)='$_POST[aniocom]'") or die(mysqli_error());
    @$num_resultados_comunion=mysqli_num_rows($registroscomunion);
    if($num_resultados_comunion>0)
    {
      $inc=0;
      for($i=0;$i<$num_resultados_comunion;$i++)
      { 
        $regcomunion=mysqli_fetch_array($registroscomunion);
        $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$regcomunion[codigo_per]'") or die(mysqli_error());
        if($reg=mysqli_fetch_array($registros))
        {
          $comuniones[$inc]=$reg['codigo_per'];
          $inc++;
        }
      }
      if($inc>0)
      {
?>
        <br><br>
        <div class="table-responsive" id="tablaanio">
          <table class="table table-bordered" id="tabla_anio">
            <tr>
              <th class="text-center">N°</th>
              <th class="text-center">Nombre y Apellido</th>
              <th class="text-center">Fecha de Comunión</th>
              <th class="text-center">Ministro</th>
            </tr>
<?php
            for($i=0;$i<$inc;$i++)
            {
              $registrospersonas=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$comuniones[$i]'");
              $regpersonas=mysqli_fetch_array($registrospersonas)or die(mysqli_error());    
?>
              <tr>
                <?php
                  $registroscom=mysqli_query($conexion,"SELECT * FROM comunion WHERE codigo_per='$comuniones[$i]'");
                  $regcom=mysqli_fetch_array($registroscom);
                  $fcom = date('d/m/Y', strtotime(str_replace('/', '-', $regcom['fecha_com'])));
                ?>
                <td class="text-center"><?php echo $i+1; ?></td>
                <td class="text-center"><?php echo $regpersonas['nombre_per'].' '.$regpersonas['apellido_per']; ?></td>
                <td class="text-center"><?php echo $fcom; ?></td>
                <?php
                  $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regcom[codigo_min]'");
                  $regministro=mysqli_fetch_array($registrosministro);
                ?>
                <td class="text-center"><?php echo $regministro['ministro_min']; ?></td>
                <td class="text-center"><a href="editar-comunion.php?cod=<?php echo $regpersonas['codigo_per']; ?>">Modificar</a></td>
                <td class="text-center"><a href="constancia-comunion.php?cod=<?php echo $regpersonas['codigo_per']; ?>" target="_blank">Imprimir</a></td>
              </tr>
<?php
            }
?>
          </table>
        </div>
<?php
      }
      else
      {
        echo '<h6 align="center" class="alerta"> No existen registros </h6>';
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No existen registros </h6>';
    }
  }
}
function validaredicioncom()
{
  if(isset($_POST['editcom']))
  {
    $flag=1;
    if((isset($_POST['cedula'])) and (trim($_POST['cedula'])!=""))
    {
      if(!(filter_var($_POST['cedula'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
        $flag=0;
      }
    }
    if((isset($_POST['cedulapadre'])) and (trim($_POST['cedulapadre'])!=""))
    {
      if(!(filter_var($_POST['cedulapadre'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula del Padre" acepta solo números</h6>';
        $flag=0;
      }
    }
    if((isset($_POST['cedulamadre'])) and (trim($_POST['cedulamadre'])!=""))
    {
      if(!(filter_var($_POST['cedulamadre'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula de la Madre" acepta solo números</h6>';
        $flag=0;
      }
    }
    editarcom($flag);
  } 
}

function editarcom($bandera)
{
  include("../php/conexion.php");
  if($bandera==1)
  {
    if(isset($_POST['nombre']) and (trim($_POST['nombre'])!="") and (isset($_POST['apellido'])) and (trim($_POST['apellido'])!="") and (isset($_POST['fechacomunion'])) and (trim($_POST['fechacomunion'])!=""))
    {
      if(isset($_POST['fechanac']) AND (trim($_POST['fechanac'])!=""))
      {
        $fnac = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanac'])));
      }
      $control=1;
      if(isset($_POST['cedula']) AND (trim($_POST['cedula'])!=""))
      {
        $registros=mysqli_query($conexion,"SELECT cedula_per FROM personas WHERE cedula_per=$_POST[cedula] AND codigo_per<>$_POST[codigo]");
        @$num_filas=mysqli_num_rows($registros);
        if($num_filas>0)
        {
          echo '<h6 align="center" class="alerta"> Ya existe un registro correspondiente a la "Cédula" ingresada </h6>';
          $control=0;
        }
        else
        {
          if(isset($_POST['sexo']))
          {
            mysqli_query($conexion,"UPDATE personas SET sexo_per='$_POST[sexo]' WHERE codigo_per='$_POST[codigo]'");
          }
          if(isset($_POST['fechanac']) AND (trim($_POST['fechanac'])!=""))
          {
            mysqli_query($conexion,"UPDATE personas SET fechanac_per='$fnac' WHERE codigo_per='$_POST[codigo]'");
          }
          mysqli_query($conexion,"UPDATE personas SET cedula_per='$_POST[cedula]',nombre_per='$_POST[nombre]',apellido_per='$_POST[apellido]' WHERE codigo_per='$_POST[codigo]'");
        }
      }
      else
      {
        if(isset($_POST['sexo']))
        {
          mysqli_query($conexion,"UPDATE personas SET sexo_per='$_POST[sexo]' WHERE codigo_per='$_POST[codigo]'");
        }
        if(isset($_POST['fechanac']) AND (trim($_POST['fechanac'])!=""))
        {
          mysqli_query($conexion,"UPDATE personas SET fechanac_per='$fnac' WHERE codigo_per='$_POST[codigo]'");
        }
        mysqli_query($conexion,"UPDATE personas SET nombre_per='$_POST[nombre]',apellido_per='$_POST[apellido]' WHERE codigo_per='$_POST[codigo]'");
      }
      if($control==1)
      {
        $fcom = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechacomunion'])));
        if(isset($_POST['cedulapadre']) and (trim($_POST['cedulapadre'])!="") and (isset($_POST['cedulamadre'])) and (trim($_POST['cedulamadre'])!=""))
        {
          $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$_POST[codigo]'");
          @$num_resultados_padper=mysqli_num_rows($registrospadper);
          if($num_resultados_padper==0)
          {
            $registrospadre=mysqli_query($conexion,"SELECT * FROM padre WHERE cedula_pad='$_POST[cedulapadre]'");
            @$num_resultados_padre=mysqli_num_rows($registrospadre);
            if($num_resultados_padre==0)
            {
              mysqli_query($conexion,"INSERT INTO padre(cedula_pad,nombre_pad,apellido_pad) VALUES ('$_POST[cedulapadre]','$_POST[nombrepadre]','$_POST[apellidopadre]')");
            }
            else
            {
              mysqli_query($conexion,"UPDATE padre SET nombre_pad='$_POST[nombrepadre]',apellido_pad='$_POST[apellidopadre]' WHERE cedula_pad='$_POST[cedulapadre]'") or die(mysqli_error());
            }

            $registrosmadre=mysqli_query($conexion,"SELECT * FROM madre WHERE cedula_mad='$_POST[cedulamadre]'");
            @$num_resultados_madre=mysqli_num_rows($registrosmadre);
            if($num_resultados_madre==0)
            {
              mysqli_query($conexion,"INSERT INTO madre(cedula_mad,nombre_mad,apellido_mad) VALUES ('$_POST[cedulamadre]','$_POST[nombremadre]','$_POST[apellidomadre]')");
            }  
            else
            {
              mysqli_query($conexion,"UPDATE madre SET nombre_mad='$_POST[nombremadre]',apellido_mad='$_POST[apellidomadre]' WHERE cedula_mad='$_POST[cedulamadre]'") or die(mysqli_error());
            }          
            mysqli_query($conexion,"INSERT INTO padrespersona(codigo_per,cedula_pad,cedula_mad) VALUES ('$_POST[codigo]','$_POST[cedulapadre]','$_POST[cedulamadre]')") or die(mysqli_error());
          }
          else
          {
            mysqli_query($conexion,"UPDATE padrespersona SET cedula_pad='$_POST[cedulapadre]',cedula_mad='$_POST[cedulamadre]' WHERE codigo_per='$_POST[codigo]'") or die(mysqli_error());
            mysqli_query($conexion,"UPDATE padre SET nombre_pad='$_POST[nombrepadre]',apellido_pad='$_POST[apellidopadre]' WHERE cedula_pad='$_POST[cedulapadre]'") or die(mysqli_error());
            mysqli_query($conexion,"UPDATE madre SET nombre_mad='$_POST[nombremadre]',apellido_mad='$_POST[apellidomadre]' WHERE cedula_mad='$_POST[cedulamadre]'") or die(mysqli_error());
          }
        }
        mysqli_query($conexion,"UPDATE comunion SET fecha_com='$fcom' WHERE codigo_per='$_POST[codigo]'");
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*) </h6>';
    }
  }
}
function validacionconf()
{
  if(isset($_POST['regconf']))
  {
    $flag=1;
    if($_POST['lugarbau']=='LB')
    {
      if($_POST['tipobusqueda']==1)
      {
        if(isset($_POST['cedul']) AND (trim($_POST['cedul'])!=""))
        {
          if(!(filter_var($_POST['cedul'], FILTER_VALIDATE_INT)))
          {
            echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
            $flag=0;
          }
        }
      }
      if($_POST['tipobusqueda']==2)
      {
        if(isset($_POST['nueva_ced']) AND (trim($_POST['nueva_ced'])!=""))
        {
          if(!(filter_var($_POST['nueva_ced'], FILTER_VALIDATE_INT)))
          {
            echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
            $flag=0;
          }
        }
      }
    }
    if($_POST['lugarbau']=='O') 
    {
      if(isset($_POST['cedula']) AND (trim($_POST['cedula'])!=""))
      {
        if(!(filter_var($_POST['cedula'], FILTER_VALIDATE_INT)))
        {
          echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
          $flag=0;
        }
      }
      if(isset($_POST['cedulapadre']) AND (trim($_POST['cedulapadre'])!=""))
      {
        if(!(filter_var($_POST['cedulapadre'], FILTER_VALIDATE_INT)))
        {
          echo '<h6 align="center" class="alerta"> El campo "Cédula del Padre" acepta solo números</h6>';
          $flag=0;
        }
      }
      if(isset($_POST['cedulamadre']) AND (trim($_POST['cedulamadre'])!=""))
      {
        if(!(filter_var($_POST['cedulamadre'], FILTER_VALIDATE_INT)))
        {
          echo '<h6 align="center" class="alerta"> El campo "Cédula de la Madre" acepta solo números</h6>';
          $flag=0;
        }
      }
    }
    if(isset($_POST['cedulapadrino']) AND (trim($_POST['cedulapadrino'])!=""))
    {
      if(!(filter_var($_POST['cedulapadrino'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula del Padrino" acepta solo números</h6>';
        $flag=0;
      }
    }
    if(isset($_POST['cedulamadrina']) AND (trim($_POST['cedulamadrina'])!=""))
    {
      if(!(filter_var($_POST['cedulamadrina'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula de la Madrina" acepta solo números</h6>';
        $flag=0;
      }
    }
    registrarconfirmacion($flag);
  }
}
function registrarconfirmacion($bandera)
{
  include("../php/conexion.php");
  $fconf = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fconfirmacion'])));
  $min=$_GET['min'];
  $registrosconfirmacion=mysqli_query($conexion,"SELECT codigo_conf FROM confirmacion WHERE fecha_conf='$fconf'");
  @$num_filas_confirmacion=mysqli_num_rows($registrosconfirmacion);
  if($num_filas_confirmacion>0)
  {
    $registrosconfirmacion2=mysqli_query($conexion,"SELECT MAX(codigo_conf) codconf FROM confirmacion WHERE fecha_conf='$fconf'") or die(mysqli_error());
    $regconfirmacion2=mysqli_fetch_row($registrosconfirmacion2);
    $codconf=trim($regconfirmacion2[0]);
  }
  else
  {
    $codconf=0;
  }
  if($bandera==1)
  {
    if(isset($_POST['lugarbau']))
    {
      if($_POST['lugarbau']=='LB')
      {
        if($_POST['tipobusqueda']==0)
        {
          echo '<h6 align="center" class="alerta"> Debe Seleccionar Tipo de Búsqueda </h6>';
        }
        if($_POST['tipobusqueda']==1)
        {
          if(isset($_POST['cedul']) and (trim($_POST['cedul'])!="") and (isset($_POST['nuevo_codigo'])) and (trim($_POST['nuevo_codigo'])!="") and (isset($_POST['cedulapadrino'])) and (trim($_POST['cedulapadrino'])!="") and (isset($_POST['nombrepadrino'])) and (trim($_POST['nombrepadrino'])!="") and (isset($_POST['apellidopadrino'])) and (trim($_POST['apellidopadrino'])!="") and ($_POST['sexopadrino']!=""))
          {
            $registrosconf=mysqli_query($conexion,"SELECT codigo_per FROM confirmacion WHERE codigo_per='$_POST[nuevo_codigo]'") or die(mysqli_error());
            if($regconf=mysqli_fetch_array($registrosconf))
            {
              echo '<h6 align="center" class="alerta"> Ya existe un registro de confirmación correspondiente a la "Cédula" ingresada </h6>';
            }
            else
            {
              if(isset($_POST['nueva_filiacion']) AND (trim('nueva_filiacion')!="") AND (isset($_POST['nuevo_padre'])) AND (trim($_POST['nuevo_padre'])!="") AND (isset($_POST['nueva_madre'])) AND (trim($_POST['nueva_madre'])!=""))
              {
                mysqli_query($conexion,"UPDATE padrespersona SET filiacion='$_POST[nueva_filiacion]' WHERE codigo_per=$_POST[nuevo_codigo]");
              }

              $registrospadrino=mysqli_query($conexion,"SELECT * FROM padrino WHERE cedula_pdr='$_POST[cedulapadrino]'");
              $num_registros_padrino=mysqli_num_rows($registrospadrino);
              if($num_registros_padrino>0)
              {
                $regpadrino=mysqli_fetch_array($registrospadrino);
                mysqli_query($conexion,"INSERT INTO padrinosconfirmando(codigo_per,cedula_pdr) VALUES ('$_POST[nuevo_codigo]','$regpadrino[cedula_pdr]')");
              }
              else
              {
                $registrosmadrina=mysqli_query($conexion,"SELECT * FROM madrina WHERE cedula_mdr='$_POST[cedulapadrino]'");  
                $num_registros_madrina=mysqli_num_rows($registrosmadrina);
                if($num_registros_madrina>0)
                {
                  $regmadrina=mysqli_fetch_array($registrosmadrina);
                  mysqli_query($conexion,"INSERT INTO padrinosconfirmando(codigo_per,cedula_pdr) VALUES ('$_POST[nuevo_codigo]','$regmadrina[cedula_mdr]')");
                }
                else
                {
                  if($_POST['sexopadrino']=='M')
                  {
                    mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");
                  }
                  if($_POST['sexopadrino']=='F')
                  {
                    mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");
                  }
                  mysqli_query($conexion,"INSERT INTO padrinosconfirmando(codigo_per,cedula_pdr) VALUES ('$_POST[nuevo_codigo]','$_POST[cedulapadrino]')");
                }
              }

              mysqli_query($conexion,"CALL sp_confirmacion('$codconf','$min','$_POST[nuevo_codigo]','$fconf')") or die(mysqli_error());
            }
          }
          else
          {
            echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco </h6>';
          }
        }
        if($_POST['tipobusqueda']==2)
        {
          if(isset($_POST['nombr']) and (trim($_POST['nombr'])!="") and (isset($_POST['apelli'])) and (trim($_POST['apelli'])!="") and (isset($_POST['cod'])) and (trim($_POST['cod'])!="") and (isset($_POST['cedulapadrino'])) and (trim($_POST['cedulapadrino'])!="") and (isset($_POST['nombrepadrino'])) and (trim($_POST['nombrepadrino'])!="") and (isset($_POST['apellidopadrino'])) and (trim($_POST['apellidopadrino'])!="") and ($_POST['sexopadrino']!=""))
          {
            $registros=mysqli_query($conexion,"SELECT codigo_per FROM confirmacion WHERE codigo_per='$_POST[cod]'");
            @$num_filas=mysqli_num_rows($registros);
            if($num_filas>0)
            {
              echo '<h6 align="center" class="alerta"> Ya existe un registro de confirmación correspondiente a la persona seleccionada </h6>';
            }
            else
            {
              if(isset($_POST['nueva_ced']) AND (trim('nueva_ced')!=""))
              {
                mysqli_query($conexion,"UPDATE personas SET cedula_per='$_POST[nueva_ced]' WHERE codigo_per=$_POST[cod]");
              }
              if(isset($_POST['filiacion_nueva']) AND (trim('filiacion_nueva')!="") AND (isset($_POST['padre_nuevo'])) AND (trim($_POST['padre_nuevo'])!="") AND (isset($_POST['madre_nueva'])) AND (trim($_POST['madre_nueva'])!=""))
              {
                mysqli_query($conexion,"UPDATE padrespersona SET filiacion='$_POST[nueva_filiacion]' WHERE codigo_per=$_POST[cod]");
              } 

              $registrospadrino=mysqli_query($conexion,"SELECT * FROM padrino WHERE cedula_pdr='$_POST[cedulapadrino]'");
              $num_registros_padrino=mysqli_num_rows($registrospadrino);
              if($num_registros_padrino>0)
              {
                $regpadrino=mysqli_fetch_array($registrospadrino);
                mysqli_query($conexion,"INSERT INTO padrinosconfirmando(codigo_per,cedula_pdr) VALUES ('$_POST[cod]','$regpadrino[cedula_pdr]')");
              }
              else
              {
                $registrosmadrina=mysqli_query($conexion,"SELECT * FROM madrina WHERE cedula_mdr='$_POST[cedulapadrino]'");  
                $num_registros_madrina=mysqli_num_rows($registrosmadrina);
                if($num_registros_madrina>0)
                {
                  $regmadrina=mysqli_fetch_array($registrosmadrina);
                  mysqli_query($conexion,"INSERT INTO padrinosconfirmando(codigo_per,cedula_pdr) VALUES ('$_POST[cod]','$regmadrina[cedula_mdr]')");
                }
                else
                {
                  if($_POST['sexopadrino']=='M')
                  {
                    mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");
                  }
                  if($_POST['sexopadrino']=='F')
                  {
                    mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");
                  }
                  mysqli_query($conexion,"INSERT INTO padrinosconfirmando(codigo_per,cedula_pdr) VALUES ('$_POST[nuevo_codigo]','$_POST[cedulapadrino]')");
                }
              }
              mysqli_query($conexion,"CALL sp_confirmacion('$codconf','$min','$_POST[cod]','$fconf')") or die(mysqli_error());
            }
          }
          else
          {
            echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
          }
        }
      }
      if($_POST['lugarbau']=='O')
      {
        if(isset($_POST['fechanac']) AND (trim($_POST['fechanac'])!=""))
        {
          $fnac = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanac'])));
        }
        else
        {
          $fnac="";
        }
        if(isset($_POST['nombre']) and (trim($_POST['nombre'])!="") and (isset($_POST['apellido'])) and (trim($_POST['apellido'])!="") and (isset($_POST['cedulapadre'])) and (trim($_POST['cedulapadre'])!="") and (isset($_POST['nombrepadre'])) and (trim($_POST['nombrepadre'])!="") and (isset($_POST['apellidopadre'])) and (trim($_POST['apellidopadre'])!="") and (isset($_POST['cedulamadre'])) and (trim($_POST['cedulamadre'])!="") and (isset($_POST['nombremadre'])) and (trim($_POST['nombremadre'])!="") and (isset($_POST['apellidomadre'])) and (trim($_POST['apellidomadre'])!="") and (isset($_POST['filiacion'])) and (trim($_POST['filiacion'])!="") and (isset($_POST['cedulapadrino'])) and (trim($_POST['cedulapadrino'])!="") and (isset($_POST['nombrepadrino'])) and (trim($_POST['nombrepadrino'])!="") and (isset($_POST['apellidopadrino'])) and (trim($_POST['apellidopadrino'])!="") and ($_POST['sexopadrino']!=""))
        {
          if(isset($_POST['cedula']) AND (trim($_POST['cedula'])!=""))
          {
            $registros=mysqli_query($conexion,"SELECT codigo_per FROM personas WHERE cedula_per='$_POST[cedula]'");
            if($reg=mysqli_fetch_array($registros))
            {
              $registrosconfirmacion=mysqli_query($conexion,"SELECT codigo_per FROM confirmacion WHERE codigo_per='$reg[codigo_per]'") or die(mysqli_error());
              @$num_filas=mysqli_num_rows($registros);
              if($num_filas>0)
              {
                echo '<h6 align="center" class="alerta"> Ya existe un registro de comunion correspondiente a la "Cédula" ingresada </h6>';
              }
              else
              {
                mysqli_query($conexion,"UPDATE personas SET nombre_per='$_POST[nombre]',apellido_per='$_POST[apellido]',sexo_per='$_POST[sexo]',fechanac_per='$fnac' WHERE codigo_per='$reg[codigo_per]'") or die(mysqli_error());
                $cod=$reg['codigo_per'];
              }
            }
            else
            {
              mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per) VALUES ('$_POST[cedula]','$_POST[nombre]','$_POST[apellido]','$_POST[sexo]','$fnac','$_POST[otrolugarbau]')") or die(mysqli_error());
              $cod=mysqli_insert_id($conexion);
            }
          }
          else
          {
            mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per) VALUES (NULL,'$_POST[nombre]','$_POST[apellido]','$_POST[sexo]','$fnac','$_POST[otrolugarbau]')") or die(mysqli_error());
            $cod=mysqli_insert_id($conexion);
          }
          $registrospadre=mysqli_query($conexion,"SELECT cedula_pad FROM padre WHERE cedula_pad='$_POST[cedulapadre]'");
          @$num_filas_padre=mysqli_num_rows($registrospadre);
          if($num_filas_padre==0)
          {
            mysqli_query($conexion,"INSERT INTO padre(cedula_pad,nombre_pad,apellido_pad) VALUES ('$_POST[cedulapadre]','$_POST[nombrepadre]','$_POST[apellidopadre]')");  
          }
          else
          {
            mysqli_query($conexion,"UPDATE padre SET nombre_pad='$_POST[nombrepadre]',apellido_pad='$_POST[apellidopadre]' WHERE cedula_pad='$_POST[cedulapadre]'");
          }

          $registrosmadre=mysqli_query($conexion,"SELECT cedula_mad FROM madre WHERE cedula_mad=$_POST[cedulamadre]");
          @$num_filas_madre=mysqli_num_rows($registrosmadre);
          if($num_filas_madre==0)
          {
            mysqli_query($conexion,"INSERT INTO madre(cedula_mad,nombre_mad,apellido_mad) VALUES ('$_POST[cedulamadre]','$_POST[nombremadre]','$_POST[apellidomadre]')");  
          }
          else
          {
            mysqli_query($conexion,"UPDATE madre SET nombre_mad='$_POST[nombremadre]',apellido_mad='$_POST[apellidomadre]' WHERE cedula_mad='$_POST[cedulamadre]'");
          }

          $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$cod'");
          if($regpadper=mysqli_fetch_array($registrospadper))
          {
            mysqli_query($conexion,"UPDATE padrespersona SET cedula_pdr='$_POST[cedulapadre]',cedula_mdr='$_POST[cedulamadre]',filiacion='$_POST[filiacion]' WHERE codigo_per=$cod");
          }
          else
          {
            mysqli_query($conexion,"INSERT INTO padrespersona(codigo_per,cedula_pad,cedula_mad,filiacion) VALUES ('$cod','$_POST[cedulapadre]','$_POST[cedulamadre]','$_POST[filiacion]')");
          }

          $registrospadrino=mysqli_query($conexion,"SELECT * FROM padrino WHERE cedula_pdr='$_POST[cedulapadrino]'");
          $num_registros_padrino=mysqli_num_rows($registrospadrino);
          if($num_registros_padrino>0)
          {
            $regpadrino=mysqli_fetch_array($registrospadrino);
            mysqli_query($conexion,"INSERT INTO padrinosconfirmando(codigo_per,cedula_pdr) VALUES ('$cod','$regpadrino[cedula_pdr]')");
            mysqli_query($conexion,"UPDATE padrino SET nombre_pdr='$_POST[nombrepadrino]',apellido_pdr='$_POST[apellidopadrino]' WHERE cedula_pdr='$_POST[cedulapadrino]'");
          }
          else
          {
            $registrosmadrina=mysqli_query($conexion,"SELECT * FROM madrina WHERE cedula_mdr='$_POST[cedulapadrino]'");  
            $num_registros_madrina=mysqli_num_rows($registrosmadrina);
            if($num_registros_madrina>0)
            {
              $regmadrina=mysqli_fetch_array($registrosmadrina);
              mysqli_query($conexion,"INSERT INTO padrinosconfirmando(codigo_per,cedula_pdr) VALUES ('$cod','$regmadrina[cedula_mdr]')");
              mysqli_query($conexion,"UPDATE madrina SET nombre_mdr='$_POST[nombremadrina]',apellido_mdr='$_POST[apellidomadrina]' WHERE cedula_mdr='$_POST[cedulamadrina]'");
            }
            else
            {
              if($_POST['sexopadrino']=='M')
              {
                mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");
              }
              if($_POST['sexopadrino']=='F')
              {
                mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");
              }
              mysqli_query($conexion,"INSERT INTO padrinosconfirmando(codigo_per,cedula_pdr) VALUES ('$cod','$_POST[cedulapadrino]')");
            }
          }

          mysqli_query($conexion,"CALL sp_confirmacion('$codconf','$min','$cod','$fconf')") or die(mysqli_error());
        }
        else
        {
          echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
        }
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> Debe Seleccionar Lugar de Bautizo </h6>';
    }
  }
}
function validarConfCed()
{
  $flag=1;
  if(isset($_POST['ConfCed']))
  {
    if(isset($_POST['cedula']) and (trim($_POST['cedula'])!=""))
    {
      if(!(filter_var($_POST['cedula'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> el campo "Cédula" acepta solo números</h6>';
        $flag=0;
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ninguna "Cédula" </h6>';
      $flag=0;
    }
    buscarconf($flag,'confced');
  }
}
function validarConfNom()
{
  $flag=1;
  if(isset($_POST['ConfNom']))
  {
    echo '<br>';
    if(!((isset($_POST['nom']) and (trim($_POST['nom'])!=""))))
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ningún "Nombre" </h6>';
      $flag=0;
    }
    if(!((isset($_POST['ap']) and (trim($_POST['ap'])!=""))))
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ningún "Apellido" </h6>';
      $flag=0;
    }
    buscarconf($flag,'confnom');
  }
}
function validarConfAnio()
{
  $flag=1;
  if(isset($_POST['ConfAnio']))
  {
    echo '<br>';
    if(isset($_POST['anioconf']) and (trim($_POST['anioconf'])!=""))
    {
      if(!(filter_var($_POST['anioconf'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Año de la Confirmación" acepta solo números </h6>';
        $flag=0;
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado "Año de la Confirmación" </h6>';
      $flag=0;
    }
    buscarconf($flag,'confanio');
  }
}
function buscarconf($bandera,$consulta)
{
  include("../php/conexion.php");
  if(($bandera==1) and $consulta=='confced')
  {
    $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE cedula_per='$_POST[cedula]'");
    if($reg=mysqli_fetch_array($registros))
    {
      $codigoper=$reg['codigo_per'];
      $registrosconfirmacion=mysqli_query($conexion,"SELECT * FROM confirmacion WHERE codigo_per=$codigoper");
      if($regconfirmacion=mysqli_fetch_array($registrosconfirmacion))
      {
        $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regconfirmacion[codigo_min]'");
        $regministro=mysqli_fetch_array($registrosministro);
?>
        <br>
        <br>
        <div class="table-responsive" id="tablaced">
          <table class="table table-bordered" id="tabla_ced">
            <tr>
              <th class="text-center">N°</th>
              <th class="text-center">Nombre y Apellido</th>
              <th class="text-center">Fecha de confirmacion</th>
              <th class="text-center">Ministro</th>
            </tr>
            <tr>
              <?php
                $fconf = date('d/m/Y', strtotime(str_replace('/', '-', $regconfirmacion['fecha_conf'])));
              ?>
              <td class="text-center"><?php echo 1; ?></td>
              <td class="text-center"><?php echo $reg['nombre_per'].' '.$reg['apellido_per']; ?></td> 
              <td class="text-center"><?php echo $fconf; ?></td>
              <td class="text-center"><?php echo $regministro['ministro_min']; ?></td>             
            </tr>
          </table>
        </div>
        <div class="row">
          <div align="center" class="col-sm-12">
            <br>
            <a href="editar-confirmacion.php?cod=<?php echo $reg['codigo_per']; ?>"><input type="buttom" class="btn btn-primary" name="modificar" Value="Modificar"></a>
            <a href="imprimir-confirmacion.php?cod=<?php echo $reg['codigo_per']; ?>" target="_blank"><input type="buttom" class="btn btn-primary" name="imprimir" Value="Imprimir"></a>
          </div>
        </div>
<?php
      }
      else
      {
        echo '<h6 align="center" class="alerta"> No existe confirmacion correspondiente a la "Cédula" ingresada </h6>';
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> La "Cédula" Ingresada no está registrada </h6>';
    }
  }
  if(($bandera==1) and ($consulta=='confnom'))
  {
    $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE (nombre_per LIKE '%".$_POST['nom']."%') AND (apellido_per like '%".$_POST['ap']."%')");
    @$num_resultados=mysqli_num_rows($registros);
    if($num_resultados>0)
    {
      $inc=0;
      for($i=0;$i<$num_resultados;$i++)
      { 
        $reg=mysqli_fetch_array($registros);
        $registrosconfirmacion=mysqli_query($conexion,"SELECT * FROM confirmacion WHERE codigo_per='$reg[codigo_per]'");
        if($regconfirmacion=mysqli_fetch_array($registrosconfirmacion))
        {
          $confirmaciones[$inc]=$regconfirmacion['codigo_per'];
          $inc++;
        }
      }
      if($inc>0)
      {
?>
        <br><br>
        <div class="table-responsive" id="tablanom">
          <table class="table table-bordered" id="tabla_nom">
            <tr>
              <th class="text-center">N°</th>
              <th class="text-center">Nombre y Apellido</th>
              <th class="text-center">Fecha de Comunión</th>
              <th class="text-center">Ministro</th>
            </tr>
<?php
            for($i=0;$i<$inc;$i++)
            {
              $registrospersonas=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$confirmaciones[$i]'");
              $regpersonas=mysqli_fetch_array($registrospersonas)or die(mysqli_error());    
?>
              <tr>
                <?php
                  $registrosconf=mysqli_query($conexion,"SELECT * FROM confirmacion WHERE codigo_per='$confirmaciones[$i]'");
                  $regconf=mysqli_fetch_array($registrosconf);
                  $fconf = date('d/m/Y', strtotime(str_replace('/', '-', $regconf['fecha_conf'])));
                ?>
                <td class="text-center"><?php echo $i+1; ?></td>
                <td class="text-center"><?php echo $regpersonas['nombre_per'].' '.$regpersonas['apellido_per']; ?></td>
                <td class="text-center"><?php echo $fconf; ?></td>
                <?php
                  $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regconf[codigo_min]'");
                  $regministro=mysqli_fetch_array($registrosministro);
                ?>
                <td class="text-center"><?php echo $regministro['ministro_min']; ?></td>
                <td class="text-center"><a href="editar-confirmacion.php?cod=<?php echo $regpersonas['codigo_per']; ?>">Modificar</a></td>
                <td class="text-center"><a href="imprimir-confirmacion.php?cod=<?php echo $regpersonas['codigo_per']; ?>" target="_blank">Imprimir</a></td>
              </tr>
<?php
            }
?>
          </table>
        </div>
<?php
      }
      else
      {
        echo '<h6 align="center" class="alerta"> No existen registros </h6>';
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No existen registros </h6>';
    } 
  }
  if(($bandera==1) and ($consulta=='confanio'))
  {

    $registrosconfirmacion=mysqli_query($conexion,"SELECT * FROM confirmacion WHERE YEAR(fecha_conf)='$_POST[anioconf]'") or die(mysqli_error());
    @$num_resultados_confirmacion=mysqli_num_rows($registrosconfirmacion);
    if($num_resultados_confirmacion>0)
    {
      $inc=0;
      for($i=0;$i<$num_resultados_confirmacion;$i++)
      { 
        $regconfirmacion=mysqli_fetch_array($registrosconfirmacion);
        $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$regconfirmacion[codigo_per]'") or die(mysqli_error());
        if($reg=mysqli_fetch_array($registros))
        {
          $confirmaciones[$inc]=$reg['codigo_per'];
          $inc++;
        }
      }
      if($inc>0)
      {
?>
        <br><br>
        <div class="table-responsive" id="tablaanio">
          <table class="table table-bordered" id="tabla_anio">
            <tr>
              <th class="text-center">N°</th>
              <th class="text-center">Nombre y Apellido</th>
              <th class="text-center">Fecha de Comunión</th>
              <th class="text-center">Ministro</th>
            </tr>
<?php
            for($i=0;$i<$inc;$i++)
            {
              $registrospersonas=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$confirmaciones[$i]'");
              $regpersonas=mysqli_fetch_array($registrospersonas)or die(mysqli_error());    
?>
              <tr>
                <?php
                  $registrosconf=mysqli_query($conexion,"SELECT * FROM confirmacion WHERE codigo_per='$confirmaciones[$i]'");
                  $regconf=mysqli_fetch_array($registrosconf);
                  $fconf = date('d/m/Y', strtotime(str_replace('/', '-', $regconf['fecha_conf'])));
                ?>
                <td class="text-center"><?php echo $i+1; ?></td>
                <td class="text-center"><?php echo $regpersonas['nombre_per'].' '.$regpersonas['apellido_per']; ?></td>
                <td class="text-center"><?php echo $fconf; ?></td>
                <?php
                  $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regconf[codigo_min]'");
                  $regministro=mysqli_fetch_array($registrosministro);
                ?>
                <td class="text-center"><?php echo $regministro['ministro_min']; ?></td>
                <td class="text-center"><a href="editar-confirmacion.php?cod=<?php echo $regpersonas['codigo_per']; ?>">Modificar</a></td>
                <td class="text-center"><a href="imprimir-confirmacion.php?cod=<?php echo $regpersonas['codigo_per']; ?>" target="_blank">Imprimir</a></td>
              </tr>
<?php
            }
?>
          </table>
        </div>
<?php
      }
      else
      {
        echo '<h6 align="center" class="alerta"> No existen registros </h6>';
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No existen registros </h6>';
    }
  }
}
function validaredicionconf()
{
  if(isset($_POST['editconf']))
  {
    $flag=1;
    if((isset($_POST['cedula'])) and (trim($_POST['cedula'])!=""))
    {
      if(!(filter_var($_POST['cedula'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
        $flag=0;
      }
    }
    if((isset($_POST['cedulapadre'])) and (trim($_POST['cedulapadre'])!=""))
    {
      if(!(filter_var($_POST['cedulapadre'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula del Padre" acepta solo números</h6>';
        $flag=0;
      }
    }
    if((isset($_POST['cedulamadre'])) and (trim($_POST['cedulamadre'])!=""))
    {
      if(!(filter_var($_POST['cedulamadre'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula de la Madre" acepta solo números</h6>';
        $flag=0;
      }
    }
    if((isset($_POST['cedulapadrino'])) and (trim($_POST['cedulapadrino'])!=""))
    {
      if(!(filter_var($_POST['cedulapadrino'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula del Padrino" acepta solo números</h6>';
        $flag=0;
      }
    }
    editarconf($flag);
  } 
}

function editarconf($bandera)
{
  include("../php/conexion.php");
  if($bandera==1)
  {
    if(isset($_POST['nombre']) and (trim($_POST['nombre'])!="") and (isset($_POST['apellido'])) and (trim($_POST['apellido'])!="") and (isset($_POST['cedulapadre'])) and (trim($_POST['cedulapadre'])!="") and (isset($_POST['nombrepadre'])) and (trim($_POST['nombrepadre'])!="") and (isset($_POST['apellidopadre'])) and (trim($_POST['apellidopadre'])!="") and (isset($_POST['cedulamadre'])) and (trim($_POST['cedulamadre'])!="") and (isset($_POST['nombremadre'])) and (trim($_POST['nombremadre'])!="") and (isset($_POST['apellidomadre'])) and (trim($_POST['apellidomadre'])!="") and (isset($_POST['cedulapadrino'])) and (trim($_POST['cedulapadrino'])!="") and (isset($_POST['nombrepadrino'])) and (trim($_POST['nombrepadrino'])!="") and (isset($_POST['apellidopadrino'])) and (trim($_POST['apellidopadrino'])!="") and ($_POST['sexopadrino']!="") and (isset($_POST['fechaconfirmacion'])) and (trim($_POST['fechaconfirmacion'])!=""))
    {
      if(isset($_POST['fechanac']) AND (trim($_POST['fechanac'])!=""))
      {
        $fnac = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanac'])));
      }
      $control=1;
      if(isset($_POST['cedula']) AND (trim($_POST['cedula'])!=""))
      {
        $registros=mysqli_query($conexion,"SELECT cedula_per FROM personas WHERE cedula_per=$_POST[cedula] AND codigo_per<>$_POST[codigo]");
        @$num_filas=mysqli_num_rows($registros);
        if($num_filas>0)
        {
          echo '<h6 align="center" class="alerta"> Ya existe un registro correspondiente a la "Cédula" ingresada </h6>';
          $control=0;
        }
        else
        {
          if(isset($_POST['sexo']))
        {
          mysqli_query($conexion,"UPDATE personas SET sexo_per='$_POST[sexo]' WHERE codigo_per='$_POST[codigo]'");
        }
        if(isset($_POST['fechanac']) AND (trim($_POST['fechanac'])!=""))
        {
          mysqli_query($conexion,"UPDATE personas SET fechanac_per='$fnac' WHERE codigo_per='$_POST[codigo]'");
        }
        mysqli_query($conexion,"UPDATE personas SET cedula_per='$_POST[cedula]',nombre_per='$_POST[nombre]',apellido_per='$_POST[apellido]' WHERE codigo_per='$_POST[codigo]'");
        }
      }
      else
      {
        if(isset($_POST['sexo']))
        {
          mysqli_query($conexion,"UPDATE personas SET sexo_per='$_POST[sexo]' WHERE codigo_per='$_POST[codigo]'");
        }
        if(isset($_POST['fechanac']) AND (trim($_POST['fechanac'])!=""))
        {
          mysqli_query($conexion,"UPDATE personas SET fechanac_per='$fnac' WHERE codigo_per='$_POST[codigo]'");
        }
        mysqli_query($conexion,"UPDATE personas SET nombre_per='$_POST[nombre]',apellido_per='$_POST[apellido]' WHERE codigo_per='$_POST[codigo]'");
      }
      if($control==1)
      {
        $fconf = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechaconfirmacion'])));

        $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$_POST[codigo]'");
        @$num_resultados_padper=mysqli_num_rows($registrospadper);
        if($num_resultados_padper==0)
        {
          $registrospadre=mysqli_query($conexion,"SELECT * FROM padre WHERE cedula_pad='$_POST[cedulapadre]'");
          @$num_resultados_padre=mysqli_num_rows($registrospadre);
          if($num_resultados_padre==0)
          {
            mysqli_query($conexion,"INSERT INTO padre(cedula_pad,nombre_pad,apellido_pad) VALUES ('$_POST[cedulapadre]','$_POST[nombrepadre]','$_POST[apellidopadre]')");
          }
          else
          {
            mysqli_query($conexion,"UPDATE padre SET nombre_pad='$_POST[nombrepadre]',apellido_pad='$_POST[apellidopadre]' WHERE cedula_pad='$_POST[cedulapadre]'");
          }        

          $registrosmadre=mysqli_query($conexion,"SELECT * FROM madre WHERE cedula_mad='$_POST[cedulamadre]'");
          @$num_resultados_madre=mysqli_num_rows($registrosmadre);
          if($num_resultados_madre==0)
          {
            mysqli_query($conexion,"INSERT INTO madre(cedula_mad,nombre_mad,apellido_mad) VALUES ('$_POST[cedulamadre]','$_POST[nombremadre]','$_POST[apellidomadre]')");
          }    
          else
          {
            mysqli_query($conexion,"UPDATE madre SET nombre_mad='$_POST[nombremadre]',apellido_mad='$_POST[apellidomadre]' WHERE cedula_mad='$_POST[cedulamadre]'");
          }        
          mysqli_query($conexion,"INSERT INTO padrespersona(codigo_per,cedula_pad,cedula_mad) VALUES ('$_POST[codigo]','$_POST[cedulapadre]','$_POST[cedulamadre]')") or die(mysqli_error());
        }
        else
        {
          mysqli_query($conexion,"UPDATE padrespersona SET cedula_pad='$_POST[cedulapadre]',cedula_mad='$_POST[cedulamadre]' WHERE codigo_per='$_POST[codigo]'") or die(mysqli_error());
          mysqli_query($conexion,"UPDATE padre SET nombre_pad='$_POST[nombrepadre]',apellido_pad='$_POST[apellidopadre]' WHERE cedula_pad='$_POST[cedulapadre]'") or die(mysqli_error());
          mysqli_query($conexion,"UPDATE madre SET nombre_mad='$_POST[nombremadre]',apellido_mad='$_POST[apellidomadre]' WHERE cedula_mad='$_POST[cedulamadre]'") or die(mysqli_error());
        }
        $registrospdrconf=mysqli_query($conexion,"SELECT * FROM padrinosconfirmando WHERE codigo_per='$_POST[codigo]'");
        @$num_resultados_pdrconf=mysqli_num_rows($registrospdrconf);
        if($num_resultados_pdrconf==0)
        {
          if($_POST['sexopadrino']=='M')
          {
            $registrospadrino=mysqli_query($conexion,"SELECT * FROM padrino WHERE cedula_pdr='$_POST[cedulapadrino]'");
            @$num_resultados_padrino=mysqli_num_rows($registrospadrino);
            if($num_resultados_padrino==0)
            {
              mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");
            }
            else
            {
              mysqli_query($conexion,"UPDATE padrino SET nombre_pdr='$_POST[nombrepadrino]',apellido_pdr='$_POST[apellidopadrino]' WHERE cedula_pdr='$_POST[cedulapadrino]'") or die(mysqli_error());
            }
          }
          if($_POST['sexopadrino']=='F')
          {
            $registrosmadrina=mysqli_query($conexion,"SELECT * FROM madrina WHERE cedula_mdr='$_POST[cedulamadrina]'");
            @$num_resultados_madrina=mysqli_num_rows($registrosmadrina);
            if($num_resultados_madrina==0)
            {
              mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulamadrina]','$_POST[nombremadrina]','$_POST[apellidomadrina]')");
            } 
            else
            {
              mysqli_query($conexion,"UPDATE madrina SET nombre_mdr='$_POST[nombremadrina]',apellido_mdr='$_POST[apellidomadrina]' WHERE cedula_mdr='$_POST[cedulamadrina]'") or die(mysqli_error());
            }           
          }
          mysqli_query($conexion,"INSERT INTO padrinosconfirmando(codigo_per,cedula_pdr,cedula_mdr) VALUES ('$_POST[codigo]','$_POST[cedulapadrino]','$_POST[cedulamadrina]')") or die(mysqli_error());
        }
        else
        {
          mysqli_query($conexion,"UPDATE padrinosconfirmando SET cedula_pdr='$_POST[cedulapadrino]' WHERE codigo_per='$_POST[codigo]'") or die(mysqli_error());
          if($_POST['sexopadrino']=='M')
          {
            mysqli_query($conexion,"UPDATE padrino SET nombre_pdr='$_POST[nombrepadrino]',apellido_pdr='$_POST[apellidopadrino]' WHERE cedula_pdr='$_POST[cedulapadrino]'") or die(mysqli_error());
          }
          if($_POST['sexopadrino']=='F')
          {
            mysqli_query($conexion,"UPDATE madrina SET nombre_mdr='$_POST[nombremadrina]',apellido_mdr='$_POST[apellidomadrina]' WHERE cedula_mdr='$_POST[cedulamadrina]'") or die(mysqli_error());        
          }
        }
        mysqli_query($conexion,"UPDATE confirmacion SET fecha_conf='$fconf' WHERE codigo_per='$_POST[codigo]'");
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*) </h6>';
    }
  }
}
function validacionmatri()
{
  if(isset($_POST['regmatri']))
  {
    $flag=1;
    if($_POST['lugarbau']=='LB')
    {
      if($_POST['tipobusqueda']==1)
      {
        if(isset($_POST['cedul']) AND (trim($_POST['cedul'])!=""))
        {
          if(!(filter_var($_POST['cedul'], FILTER_VALIDATE_INT)))
          {
            echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
            $flag=0;
          }
        }
        if(isset($_POST['nueva_edad']) AND (trim($_POST['nueva_edad'])!=""))
        {
          if(!(filter_var($_POST['nueva_edad'], FILTER_VALIDATE_INT)))
          {
            echo '<h6 align="center" class="alerta"> El campo "Edad" acepta solo números</h6>';
            $flag=0;
          }
        }
      }
      if($_POST['tipobusqueda']==2)
      {
        if(isset($_POST['nueva_ced']) AND (trim($_POST['nueva_ced'])!=""))
        {
          if(!(filter_var($_POST['nueva_ced'], FILTER_VALIDATE_INT)))
          {
            echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
            $flag=0;
          }
        }
        if(isset($_POST['edad_nueva']) AND (trim($_POST['edad_nueva'])!=""))
        {
          if(!(filter_var($_POST['edad_nueva'], FILTER_VALIDATE_INT)))
          {
            echo '<h6 align="center" class="alerta"> El campo "Edad" acepta solo números</h6>';
            $flag=0;
          }
        }
      }
    }
    if($_POST['lugarbau']=='O') 
    {
      if(isset($_POST['cedula']) AND (trim($_POST['cedula'])!=""))
      {
        if(!(filter_var($_POST['cedula'], FILTER_VALIDATE_INT)))
        {
          echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
          $flag=0;
        }
      }
      if(isset($_POST['edad']) AND (trim($_POST['edad'])!=""))
      {
        if(!(filter_var($_POST['edad'], FILTER_VALIDATE_INT)))
        {
          echo '<h6 align="center" class="alerta"> El campo "Edad" acepta solo números</h6>';
          $flag=0;
        }
      }
      if(isset($_POST['cedulapadre']) AND (trim($_POST['cedulapadre'])!=""))
      {
        if(!(filter_var($_POST['cedulapadre'], FILTER_VALIDATE_INT)))
        {
          echo '<h6 align="center" class="alerta"> El campo "Cédula del Padre" acepta solo números</h6>';
          $flag=0;
        }
      }
      if(isset($_POST['cedulamadre']) AND (trim($_POST['cedulamadre'])!=""))
      {
        if(!(filter_var($_POST['cedulamadre'], FILTER_VALIDATE_INT)))
        {
          echo '<h6 align="center" class="alerta"> El campo "Cédula de la Madre" acepta solo números</h6>';
          $flag=0;
        }
      }
    }
    if($_POST['lugarbauesp']=='LB')
    {
      if($_POST['tipobusquedaesp']==1)
      {
        if(isset($_POST['cedulesp']) AND (trim($_POST['cedulesp'])!=""))
        {
          if(!(filter_var($_POST['cedulesp'], FILTER_VALIDATE_INT)))
          {
            echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
            $flag=0;
          }
        }
        if(isset($_POST['nueva_edadesp']) AND (trim($_POST['nueva_edadesp'])!=""))
        {
          if(!(filter_var($_POST['nueva_edadesp'], FILTER_VALIDATE_INT)))
          {
            echo '<h6 align="center" class="alerta"> El campo "Edad" acepta solo números</h6>';
            $flag=0;
          }
        }
      }
      if($_POST['tipobusquedaesp']==2)
      {
        if(isset($_POST['nueva_cedesp']) AND (trim($_POST['nueva_cedesp'])!=""))
        {
          if(!(filter_var($_POST['nueva_cedesp'], FILTER_VALIDATE_INT)))
          {
            echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
            $flag=0;
          }
        }
        if(isset($_POST['edad_nuevaesp']) AND (trim($_POST['edad_nuevaesp'])!=""))
        {
          if(!(filter_var($_POST['edad_nuevaesp'], FILTER_VALIDATE_INT)))
          {
            echo '<h6 align="center" class="alerta"> El campo "Edad" acepta solo números</h6>';
            $flag=0;
          }
        }
      }
    }
    if($_POST['lugarbauesp']=='O') 
    {
      if(isset($_POST['cedulaesp']) AND (trim($_POST['cedulaesp'])!=""))
      {
        if(!(filter_var($_POST['cedulaesp'], FILTER_VALIDATE_INT)))
        {
          echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
          $flag=0;
        }
      }
      if(isset($_POST['edadesp']) AND (trim($_POST['edadesp'])!=""))
      {
        if(!(filter_var($_POST['edadesp'], FILTER_VALIDATE_INT)))
        {
          echo '<h6 align="center" class="alerta"> El campo "Edad" acepta solo números</h6>';
          $flag=0;
        }
      }
      if(isset($_POST['cedulapadreesp']) AND (trim($_POST['cedulapadreesp'])!=""))
      {
        if(!(filter_var($_POST['cedulapadreesp'], FILTER_VALIDATE_INT)))
        {
          echo '<h6 align="center" class="alerta"> El campo "Cédula del Padre" acepta solo números</h6>';
          $flag=0;
        }
      }
      if(isset($_POST['cedulamadreesp']) AND (trim($_POST['cedulamadreesp'])!=""))
      {
        if(!(filter_var($_POST['cedulamadreesp'], FILTER_VALIDATE_INT)))
        {
          echo '<h6 align="center" class="alerta"> El campo "Cédula de la Madre" acepta solo números</h6>';
          $flag=0;
        }
      }
    } 
    if(isset($_POST['cedulapadrino']) AND (trim($_POST['cedulapadrino'])!=""))
    {
      if(!(filter_var($_POST['cedulapadrino'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula del Padrino" acepta solo números</h6>';
        $flag=0;
      }
    }
    if(isset($_POST['cedulamadrina']) AND (trim($_POST['cedulamadrina'])!=""))
    {
      if(!(filter_var($_POST['cedulamadrina'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula de la Madrina" acepta solo números</h6>';
        $flag=0;
      }
    }
    if(($_POST['ministro']=="") and (trim($_POST['otroministro'])=="Otro..."))
    {
      echo '<h6 align="center" class="alerta"> Debe seleccionar "Ministro" o ingresar uno nuevo </h6>';
      $flag= 0;
    }
    registrarmatrimonio($flag);   
  }
}
function registrarmatrimonio($bandera)
{
  include("../php/conexion.php");
  if($bandera==1)
  {
    if((isset($_POST['cedulapadrino'])) and (trim($_POST['cedulapadrino'])!="") and (isset($_POST['nombrepadrino'])) and (trim($_POST['nombrepadrino'])!="") and (isset($_POST['apellidopadrino'])) and (trim($_POST['apellidopadrino'])!="") and (isset($_POST['cedulamadrina'])) and (trim($_POST['cedulamadrina'])!="") and (isset($_POST['nombremadrina'])) and (trim($_POST['nombremadrina'])!="") and (isset($_POST['apellidomadrina'])) and (trim($_POST['apellidomadrina'])!="") and (isset($_POST['fmatrimonio'])) and (trim($_POST['fmatrimonio'])!=""))
    {
      $fmatri = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fmatrimonio'])));
      $registrosmatrimonio=mysqli_query($conexion,"SELECT codigo_matri FROM matrimonio");
      @$num_filas_matrimonio=mysqli_num_rows($registrosmatrimonio);
      if($num_filas_matrimonio>0)
      {
        $registrosmatrimonio2=mysqli_query($conexion,"SELECT MAX(codigo_matri) codmatri FROM matrimonio") or die(mysqli_error());
        $regmatrimonio2=mysqli_fetch_row($registrosmatrimonio2);
        $codmatri=trim($regmatrimonio2[0]);
      }
       else
      {
        $codmatri=0;
      }
      if(isset($_POST['lugarbau']))
      {
        if($_POST['lugarbau']=='LB')
        {
          if($_POST['tipobusqueda']==0)
          {
            echo '<h6 align="center" class="alerta"> Debe Seleccionar Tipo de Búsqueda </h6>';
          }
          if($_POST['tipobusqueda']==1)
          {
            if(isset($_POST['cedul']) and (trim($_POST['cedul'])!="") and (isset($_POST['nuevo_codigo'])) and (trim($_POST['nuevo_codigo'])!="") and (isset($_POST['nueva_edad'])) and (trim($_POST['nueva_edad'])!="") and (isset($_POST['nuevo_lugarnac'])) and (trim($_POST['nuevo_lugarnac'])!="") and (isset($_POST['nuevo_estado'])) and (trim($_POST['nuevo_domicilio'])!="") and (isset($_POST['nuevo_domicilio'])))
            {
              $registrosmatri=mysqli_query($conexion,"SELECT codigo_per FROM matrimonio WHERE codigo_per='$_POST[nuevo_codigo]'") or die(mysqli_error());
              if($regmatri=mysqli_fetch_array($registrosmatri))
              {
                echo '<h6 align="center" class="alerta"> Ya existe un registro matrimonial correspondiente a la "Cédula del Novio" ingresada </h6>';
              }
              else
              {
                $registrosmatri=mysqli_query($conexion,"SELECT codigo_per2 FROM matrimonio WHERE codigo_per2='$_POST[nuevo_codigo]'") or die(mysqli_error());
                if($regmatri=mysqli_fetch_array($registrosmatri))
                {
                  echo '<h6 align="center" class="alerta"> Error: La cedula ingresada se encuentra registrada en el modulo Novia </h6>';
                }
                else
                {
                  $registrospersonas=mysqli_query($conexion,"SELECT sexo_per FROM personas WHERE codigo_per='$_POST[nuevo_codigo]'");
                  $regpersonas=mysqli_fetch_array($registrospersonas);
                  if($regpersonas['sexo_per']!='F')
                  {
                    if(isset($_POST['lugarbauesp']))
                    {
                      if($_POST['lugarbauesp']=='LB')
                      {
                        if($_POST['tipobusquedaesp']==0)
                        {
                          echo '<h6 align="center" class="alerta"> Debe Seleccionar Tipo de Búsqueda </h6>';
                        }
                        if($_POST['tipobusquedaesp']==1)
                        {
                          if(isset($_POST['cedulesp']) and (trim($_POST['cedulesp'])!="") and (isset($_POST['nuevo_codigoesp'])) and (trim($_POST['nuevo_codigoesp'])!="") and (isset($_POST['nueva_edadesp'])) and (trim($_POST['nueva_edadesp'])!="") and (isset($_POST['nuevo_lugarnacesp'])) and (trim($_POST['nuevo_lugarnacesp'])!="") and (isset($_POST['nuevo_estadoesp'])) and (trim($_POST['nuevo_estadoesp'])!="") and (isset($_POST['nuevo_domicilioesp'])) and (trim($_POST['nuevo_domicilioesp'])!=""))
                          {
                            if($_POST['nuevo_codigo']!=$_POST['nuevo_codigoesp'])
                            {
                              $registrosmatri2=mysqli_query($conexion,"SELECT codigo_per2 FROM matrimonio WHERE codigo_per2='$_POST[nuevo_codigoesp]'") or die(mysqli_error());
                              if($regmatri2=mysqli_fetch_array($registrosmatri2))
                              {
                                echo '<h6 align="center" class="alerta"> Ya existe un registro matrimonial correspondiente a la "Cédula de la Novia" ingresada </h6>';
                              }
                              else
                              {
                                $registrosmatri2=mysqli_query($conexion,"SELECT codigo_per FROM matrimonio WHERE codigo_per='$_POST[nuevo_codigoesp]'") or die(mysqli_error());
                                if($regmatri2=mysqli_fetch_array($registrosmatri2))
                                {
                                  echo '<h6 align="center" class="alerta"> Error: La cedula ingresada se encuentra registrada en el modulo Novio </h6>';
                                }
                                else
                                {
                                  $registrospersonas2=mysqli_query($conexion,"SELECT sexo_per FROM personas WHERE codigo_per='$_POST[nuevo_codigoesp]'");
                                  $regpersonas2=mysqli_fetch_array($registrospersonas2);
                                  if($regpersonas2['sexo_per']!='M')
                                  {
                                    if(isset($_POST['nueva_filiacion']) AND (trim('nueva_filiacion')!="") AND (isset($_POST['nuevo_padre'])) AND (trim($_POST['nuevo_padre'])!="") AND (isset($_POST['nueva_madre'])) AND (trim($_POST['nueva_madre'])!=""))
                                    {
                                      mysqli_query($conexion,"UPDATE padrespersona SET filiacion='$_POST[nueva_filiacion]' WHERE codigo_per=$_POST[nuevo_codigo]");
                                    }
                                    if(isset($_POST['nueva_filiacionesp']) AND (trim('nueva_filiacionesp')!="") AND (isset($_POST['nuevo_padreesp'])) AND (trim($_POST['nuevo_padreesp'])!="") AND (isset($_POST['nueva_madreesp'])) AND (trim($_POST['nueva_madreesp'])!=""))
                                    {
                                      mysqli_query($conexion,"UPDATE padrespersona SET filiacion='$_POST[nueva_filiacionesp]' WHERE codigo_per=$_POST[nuevo_codigoesp]");
                                    }

                                    $registrospadrino=mysqli_query($conexion,"SELECT cedula_pdr FROM padrino WHERE cedula_pdr=$_POST[cedulapadrino]");
                                    @$num_filas_padrino=mysqli_num_rows($registrospadrino);
                                    if($num_filas_padrino==0)
                                    {
                                      mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");  
                                    }
                                    
                                    $registrosmadrina=mysqli_query($conexion,"SELECT cedula_mdr FROM madre WHERE cedula_mdr=$_POST[cedulamadrina]");
                                    @$num_filas_madrina=mysqli_num_rows($registrosmadrina);
                                    if($num_filas_madrina==0)
                                    {
                                      mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulamadrina]','$_POST[nombremadrina]','$_POST[apellidomadrina]')");  
                                    }
                                    mysqli_query($conexion,"INSERT INTO padrinosboda(codigo_per,codigo_per2,cedula_pdr,cedula_mdr) VALUES ('$_POST[nuevo_codigo]','$_POST[nuevo_codigoesp]','$_POST[cedulapadrino]','$_POST[cedulamadrina]')");

                                    if((isset($_POST['otroministro'])) and (trim($_POST['otroministro']!="")) and (trim($_POST['otroministro']!="Otro..."))) 
                                    {
                                      $registros=mysqli_query($conexion,"SELECT codigo_min FROM ministro ORDER BY codigo_min DESC LIMIT 1");
                                      if($reg=mysqli_fetch_array($registros))
                                      {
                                        $maximoid=$reg['codigo_min'];
                                        $id_ministro=$maximoid+1;
                                        mysqli_query($conexion,"INSERT INTO ministro(ministro_min) VALUES ('$_POST[otroministro]')");
                                      }
                                    }
                                    else
                                    {
                                      $id_ministro=$_POST['ministro'];
                                    }

                                    mysqli_query($conexion,"UPDATE personas SET sexo_per='M',edad_per='$_POST[nueva_edad]',lugarnac_per='$_POST[nuevo_lugarnac]',estadodir_per='$_POST[nuevo_estado]',direccion_per='$_POST[nuevo_domicilio]' WHERE codigo_per='$_POST[nuevo_codigo]'");
                                    mysqli_query($conexion,"UPDATE personas SET sexo_per='F',edad_per='$_POST[nueva_edadesp]',lugarnac_per='$_POST[nuevo_lugarnacesp]',estadodir_per='$_POST[nuevo_estadoesp]',direccion_per='$_POST[nuevo_domicilioesp]' WHERE codigo_per='$_POST[nuevo_codigoesp]'");

                                    mysqli_query($conexion,"CALL sp_matrimonio('$codmatri','$id_ministro','$_POST[nuevo_codigo]','$_POST[nuevo_codigoesp]','$fmatri','$_POST[proclamas]','$_POST[dispensas]','$_POST[sacramentos]','$_POST[observaciones]')") or die(mysqli_error());
                                  }
                                  else
                                  {
                                    echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado registro pertenecientes a un hombre en el módulo de Esposa </h6>';
                                  }
                                }
                              }
                            }
                            else
                            {
                              echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado una misma persona para el módulo de Esposo y de Esposa </h6>';
                            }
                          }
                          else
                          {
                            echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
                          }
                        }
                        if($_POST['tipobusquedaesp']==2)
                        {
                          if(isset($_POST['nombresp']) and (trim($_POST['nombresp'])!="") and (isset($_POST['apelliesp'])) and (trim($_POST['apelliesp'])!="") and (isset($_POST['codesp'])) and (trim($_POST['codesp'])!="") and (isset($_POST['edad_nuevaesp'])) and (trim($_POST['edad_nuevaesp'])!="") and (isset($_POST['lugarnac_nuevoesp'])) and (trim($_POST['lugarnac_nuevoesp'])!="") and (isset($_POST['estado_nuevoesp'])) and (trim($_POST['estado_nuevoesp'])!="") and (isset($_POST['domicilio_nuevoesp'])) and (trim($_POST['domicilio_nuevoesp'])!=""))
                          {
                            if($_POST['nuevo_codigo']!=$_POST['codesp'])
                            {
                              $registrosmatri2=mysqli_query($conexion,"SELECT codigo_per2 FROM matrimonio WHERE codigo_per2='$_POST[codesp]'") or die(mysqli_error());
                              if($regmatri2=mysqli_fetch_array($registrosmatri2))
                              {
                                echo '<h6 align="center" class="alerta"> Ya existe un registro matrimonial correspondiente a la "Cédula de la Novia" ingresada </h6>';
                              }
                              else
                              {
                                $registrosmatri2=mysqli_query($conexion,"SELECT codigo_per FROM matrimonio WHERE codigo_per='$_POST[codesp]'") or die(mysqli_error());
                                if($regmatri2=mysqli_fetch_array($registrosmatri2))
                                {
                                  echo '<h6 align="center" class="alerta"> Error: La cedula ingresada se encuentra registrada en el modulo Novio </h6>';
                                }
                                else
                                {
                                  $control=1;
                                  $registrospersonas2=mysqli_query($conexion,"SELECT sexo_per FROM personas WHERE codigo_per='$_POST[codesp]'");
                                  $regpersonas2=mysqli_fetch_array($registrospersonas2);
                                  if($regpersonas2['sexo_per']!='M')
                                  {
                                    if(isset($_POST['nueva_cedesp']) AND (trim('nueva_cedesp')!=""))
                                    {
                                      $registros_personas3=mysqli_query($conexion,"SELECT cedula_per FROM personas WHERE cedula_per='$_POST[nueva_cedesp]' AND codigo_per<>'$_POST[codesp]'");
                                      @$num_resultados_personas3=mysqli_num_rows($registros_personas3);
                                      if($num_resultados_personas3==0)
                                      {
                                        mysqli_query($conexion,"UPDATE personas SET cedula_per='$_POST[nueva_cedesp]' WHERE codigo_per=$_POST[codesp]");
                                      }
                                      else
                                      {
                                        echo '<h6 align="center" class="alerta"> Ya existe un registro correspondiente a la "Cedula" ingresada </h6>';
                                        $control=0;
                                      }
                                    }
                                    if($control==1)
                                    {
                                      if(isset($_POST['nueva_filiacion']) AND (trim('nueva_filiacion')!="") AND (isset($_POST['nuevo_padre'])) AND (trim($_POST['nuevo_padre'])!="") AND (isset($_POST['nueva_madre'])) AND (trim($_POST['nueva_madre'])!=""))
                                      {
                                        mysqli_query($conexion,"UPDATE padrespersona SET filiacion='$_POST[nueva_filiacion]' WHERE codigo_per=$_POST[nuevo_codigo]");
                                      }
                                      if(isset($_POST['filiacion_nuevaesp']) AND (trim('filiacion_nuevaesp')!="") AND (isset($_POST['padre_nuevoesp'])) AND (trim($_POST['padre_nuevoesp'])!="") AND (isset($_POST['madre_nuevaesp'])) AND (trim($_POST['madre_nuevaesp'])!=""))
                                      {
                                        mysqli_query($conexion,"UPDATE padrespersona SET filiacion='$_POST[filiacion_nuevaesp]' WHERE codigo_per=$_POST[codesp]");
                                      }

                                      $registrospadrino=mysqli_query($conexion,"SELECT cedula_pdr FROM padrino WHERE cedula_pdr=$_POST[cedulapadrino]");
                                      @$num_filas_padrino=mysqli_num_rows($registrospadrino);
                                      if($num_filas_padrino==0)
                                      {
                                        mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");  
                                      }
                                      
                                      $registrosmadrina=mysqli_query($conexion,"SELECT cedula_mdr FROM madre WHERE cedula_mdr=$_POST[cedulamadrina]");
                                      @$num_filas_madrina=mysqli_num_rows($registrosmadrina);
                                      if($num_filas_madrina==0)
                                      {
                                        mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulamadrina]','$_POST[nombremadrina]','$_POST[apellidomadrina]')");  
                                      }
                                      mysqli_query($conexion,"INSERT INTO padrinosboda(codigo_per,codigo_per2,cedula_pdr,cedula_mdr) VALUES ('$_POST[nuevo_codigo]','$_POST[codesp]','$_POST[cedulapadrino]','$_POST[cedulamadrina]')");

                                      if((isset($_POST['otroministro'])) and (trim($_POST['otroministro']!="")) and (trim($_POST['otroministro']!="Otro..."))) 
                                      {
                                        $registros=mysqli_query($conexion,"SELECT codigo_min FROM ministro ORDER BY codigo_min DESC LIMIT 1");
                                        if($reg=mysqli_fetch_array($registros))
                                        {
                                          $maximoid=$reg['codigo_min'];
                                          $id_ministro=$maximoid+1;
                                          mysqli_query($conexion,"INSERT INTO ministro(ministro_min) VALUES ('$_POST[otroministro]')");
                                        }
                                      }
                                      else
                                      {
                                        $id_ministro=$_POST['ministro'];
                                      }

                                      mysqli_query($conexion,"UPDATE personas SET sexo_per='M',edad_per='$_POST[nueva_edad]',lugarnac_per='$_POST[nuevo_lugarnac]',estadodir_per='$_POST[nuevo_estado]',direccion_per='$_POST[nuevo_domicilio]' WHERE codigo_per='$_POST[nuevo_codigo]'");
                                      mysqli_query($conexion,"UPDATE personas SET sexo_per='F',edad_per='$_POST[edad_nuevaesp]',lugarnac_per='$_POST[lugarnac_nuevoesp]',estadodir_per='$_POST[estado_nuevoesp]',direccion_per='$_POST[domicilio_nuevoesp]' WHERE codigo_per='$_POST[codesp]'");

                                      mysqli_query($conexion,"CALL sp_matrimonio('$codmatri','$id_ministro','$_POST[nuevo_codigo]','$_POST[codesp]','$fmatri','$_POST[proclamas]','$_POST[dispensas]','$_POST[sacramentos]','$_POST[observaciones]')") or die(mysqli_error());
                                    }
                                  }
                                  else
                                  {
                                    echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado registro pertenecientes a un hombre en el módulo de Esposa </h6>';
                                  }
                                }
                              }
                            }
                            else
                            {
                              echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado una misma persona para el módulo de Esposo y de Esposa </h6>';
                            }
                          }
                          else
                          {
                            echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
                          }
                        }
                      }
                      if($_POST['lugarbauesp']=='O')
                      {
                        if(isset($_POST['otrolugarbauesp']) and (trim($_POST['otrolugarbauesp'])!="") and (isset($_POST['nombreesp'])) and (trim($_POST['nombreesp'])!="") and (isset($_POST['apellidoesp'])) and (trim($_POST['apellidoesp'])!="") and (isset($_POST['edadesp'])) and (trim($_POST['edadesp'])!="") and (isset($_POST['lugarnacesp'])) and (trim($_POST['lugarnacesp'])!="") and (isset($_POST['estadoesp'])) and (trim($_POST['estadoesp'])!="") and (isset($_POST['domicilioesp'])) and (trim($_POST['domicilioesp'])!="") and (isset($_POST['cedulapadreesp'])) and (trim($_POST['cedulapadreesp'])!="") and (isset($_POST['cedulamadreesp'])) and (trim($_POST['cedulamadreesp'])!="") and (isset($_POST['nombrepadreesp'])) and (trim($_POST['nombrepadreesp'])!="") and (isset($_POST['nombremadreesp'])) and (trim($_POST['nombremadreesp'])!="") and (isset($_POST['apellidopadreesp'])) and (trim($_POST['apellidopadreesp'])!="") and (isset($_POST['apellidomadreesp'])) and (trim($_POST['apellidomadreesp'])!="") and (isset($_POST['filiacionesp'])) and (trim($_POST['filiacionesp'])!=""))
                        {
                          $control=1;
                          $registrospersonas=mysqli_query($conexion,"SELECT sexo_per FROM personas WHERE codigo_per='$_POST[nuevo_codigo]'");
                          $regpersonas=mysqli_fetch_array($registrospersonas);
                          if($regpersonas['sexo_per']=='F')
                          {
                            echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado registro pertenecientes a una mujer en el módulo de Esposo </h6>';
                            $control=0;
                          }
                          if(isset($_POST['fechanacesp']) AND (trim($_POST['fechanacesp'])!=""))
                          {
                            $fnac = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanacesp'])));
                          }
                          else
                          {
                            $fnac="";
                          }
                          if(isset($_POST['cedulaesp']) AND (trim('cedulaesp')!=""))
                          {
                            @$num_resultados_personas3=mysqli_num_rows($registros_personas3);
                            if($num_resultados_personas3>0)
                            {
                              $registros_personas3=mysqli_query($conexion,"SELECT codigo_per FROM personas WHERE cedula_per='$_POST[cedulaesp]'");
                              if($_POST['nuevo_codigo']!=$_POST['$regpersonas_3[codigo_per]'])
                              {
                                $regpersonas_3=mysqli_fetch_array($registros_personas3);
                                $registrosmatrimonio_3=mysqli_query($conexion,"SELECT codigo_per2 FROM matrimonio WHERE codigo_per2='$regpersonas_3[codigo_per]'") or die(mysqli_error());
                                @$num_filas=mysqli_num_rows($registrosmatrimonio_3);
                                if($num_filas>0)
                                {
                                  echo '<h6 align="center" class="alerta"> Ya existe un registro matrimonial correspondiente a la "Cédula" ingresada </h6>';
                                  $control=0;
                                }
                                else
                                {
                                  $registrosmatrimonio_3=mysqli_query($conexion,"SELECT codigo_per FROM matrimonio WHERE codigo_per='$regpersonas_3[codigo_per]'") or die(mysqli_error());
                                  @$num_filas=mysqli_num_rows($registrosmatrimonio_3);
                                  if($num_filas>0)
                                  {
                                    echo '<h6 align="center" class="alerta"> Error: La cedula ingresada se encuentra registrada en el modulo Novio </h6>';
                                    $control=0;
                                  }
                                  else
                                  {
                                    $registrospersonas4=mysqli_query($conexion,"SELECT sexo_per FROM personas WHERE codigo_per='$regpersonas_3[codigo_per]'");
                                    $regpersonas4=mysqli_fetch_array($registrospersonas4);
                                    if($regpersonas4['sexo_per']=='M')
                                    {
                                      echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado registro pertenecientes a un hombre en el módulo de Esposa </h6>';
                                      $control=0;
                                    }
                                    else
                                    {
                                      mysqli_query($conexion,"UPDATE personas SET nombre_per='$_POST[nombreesp]',apellido_per='$_POST[apellidoesp]',sexo_per='F',fechanac_per='$fnac',edad_per='$_POST[edadesp]',lugarnac_per='$_POST[lugarnacesp]',estadodir_per='$_POST[estadoesp]',direccion_per='$_POST[domicilioesp]',lugarbautizo_per='$_POST[otrolugarbauesp]' WHERE codigo_per='$regpersonas_3[codigo_per]'") or die(mysqli_error());
                                      $cod=$regpersonas_3['codigo_per'];
                                    }
                                  }
                                }
                              }
                              else
                              {
                                echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado una misma persona para el módulo de Esposo y de Esposa </h6>';
                                $control=0;
                              }
                            }
                            else
                            {
                              if(trim($_POST['cedulaesp'])=="")
                              {
                                mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per,edad_per,lugarnac_per,estadodir_per,direccion_per) VALUES (NULL,'$_POST[nombreesp]','$_POST[apellidoesp]','F','$fnac','$_POST[otrolugarbauesp]','$_POST[edadesp]','$_POST[lugarnacesp]','$_POST[estadoesp]','$_POST[domicilioesp]')") or die(mysqli_error());
                              }
                              else
                              {
                                mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per,edad_per,lugarnac_per,estadodir_per,direccion_per) VALUES ('$_POST[cedulaesp]','$_POST[nombreesp]','$_POST[apellidoesp]','F','$fnac','$_POST[otrolugarbauesp]','$_POST[edadesp]','$_POST[lugarnacesp]','$_POST[estadoesp]','$_POST[domicilioesp]')") or die(mysqli_error());
                              }
                            }
                          }

                          if($control==1)
                          {
                            $registrospadre=mysqli_query($conexion,"SELECT cedula_pad FROM padre WHERE cedula_pad='$_POST[cedulapadreesp]'");
                            @$num_filas_padre=mysqli_num_rows($registrospadre);
                            if($num_filas_padre==0)
                            {
                              mysqli_query($conexion,"INSERT INTO padre(cedula_pad,nombre_pad,apellido_pad) VALUES ('$_POST[cedulapadreesp]','$_POST[nombrepadreesp]','$_POST[apellidopadreesp]')");  
                            }
                            $registrosmadre=mysqli_query($conexion,"SELECT cedula_mad FROM madre WHERE cedula_mad=$_POST[cedulamadreesp]");
                            @$num_filas_madre=mysqli_num_rows($registrosmadre);
                            if($num_filas_madre==0)
                            {
                              mysqli_query($conexion,"INSERT INTO madre(cedula_mad,nombre_mad,apellido_mad) VALUES ('$_POST[cedulamadreesp]','$_POST[nombremadreesp]','$_POST[apellidomadreesp]')");  
                            }
                            $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$cod'");
                            if($regpadper=mysqli_fetch_array($registrospadper))
                            {
                              mysqli_query($conexion,"UPDATE padrespersona SET cedula_pdr='$_POST[cedulapadreesp]',cedula_mdr='$_POST[cedulamadreesp]',filiacion='$_POST[filiacionesp]' WHERE codigo_per=$cod");
                            }
                            else
                            {
                              mysqli_query($conexion,"INSERT INTO padrespersona(codigo_per,cedula_pad,cedula_mad,filiacion) VALUES ('$cod','$_POST[cedulapadreesp]','$_POST[cedulamadreesp]','$_POST[filiacionesp]')");
                            }

                            $registrospadrino=mysqli_query($conexion,"SELECT cedula_pdr FROM padrino WHERE cedula_pdr=$_POST[cedulapadrino]");
                            @$num_filas_padrino=mysqli_num_rows($registrospadrino);
                            if($num_filas_padrino==0)
                            {
                              mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");  
                            }
                            
                            $registrosmadrina=mysqli_query($conexion,"SELECT cedula_mdr FROM madre WHERE cedula_mdr=$_POST[cedulamadrina]");
                            @$num_filas_madrina=mysqli_num_rows($registrosmadrina);
                            if($num_filas_madrina==0)
                            {
                              mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulamadrina]','$_POST[nombremadrina]','$_POST[apellidomadrina]')");  
                            }
                            mysqli_query($conexion,"INSERT INTO padrinosboda(codigo_per,codigo_per2,cedula_pdr,cedula_mdr) VALUES ('$_POST[nuevo_codigo]','$cod','$_POST[cedulapadrino]','$_POST[cedulamadrina]')");

                            if((isset($_POST['otroministro'])) and (trim($_POST['otroministro']!="")) and (trim($_POST['otroministro']!="Otro..."))) 
                            {
                              $registros=mysqli_query($conexion,"SELECT codigo_min FROM ministro ORDER BY codigo_min DESC LIMIT 1");
                              if($reg=mysqli_fetch_array($registros))
                              {
                                $maximoid=$reg['codigo_min'];
                                $id_ministro=$maximoid+1;
                                mysqli_query($conexion,"INSERT INTO ministro(ministro_min) VALUES ('$_POST[otroministro]')");
                              }
                            }
                            else
                            {
                              $id_ministro=$_POST['ministro'];
                            }
                            mysqli_query($conexion,"CALL sp_matrimonio('$codmatri','$id_ministro','$_POST[nuevo_codigo]','$cod','$fmatri','$_POST[proclamas]','$_POST[dispensas]','$_POST[sacramentos]','$_POST[observaciones]')") or die(mysqli_error());
                          }
                        }
                        else
                        {
                          echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
                        }
                      }
                    }
                  }
                  else
                  {
                    echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado registro pertenecientes a una mujer en el módulo de Esposo </h6>';
                  }
                }
              }
            }
            else
            {
              echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
            }
          }
          if($_POST['tipobusqueda']==2)
          {
            if(isset($_POST['nombr']) and (trim($_POST['nombr'])!="") and (isset($_POST['apelli'])) and (trim($_POST['apelli'])!="") and (isset($_POST['cod'])) and (trim($_POST['cod'])!="") and (isset($_POST['edad_nueva'])) and (trim($_POST['edad_nueva'])!="") and (isset($_POST['lugarnac_nuevo'])) and (trim($_POST['lugarnac_nuevo'])!="") and (isset($_POST['estado_nuevo'])) and (trim($_POST['estado_nuevo'])!="") and (isset($_POST['domicilio_nuevo'])) and (trim($_POST['domicilio_nuevo'])!=""))
            {
              $registrosmatri=mysqli_query($conexion,"SELECT codigo_per FROM matrimonio WHERE codigo_per='$_POST[cod]'") or die(mysqli_error());
              if($regmatri=mysqli_fetch_array($registrosmatri))
              {
                echo '<h6 align="center" class="alerta"> Ya existe un registro matrimonial correspondiente a la "Cédula del Novio" ingresada </h6>';
              }
              else
              {
                $registrosmatri=mysqli_query($conexion,"SELECT codigo_per2 FROM matrimonio WHERE codigo_per2='$_POST[cod]'") or die(mysqli_error());
                if($regmatri=mysqli_fetch_array($registrosmatri))
                {
                  echo '<h6 align="center" class="alerta"> Error: La cedula ingresada se encuentra registrada en el modulo Novia </h6>';
                }
                else
                {
                  $registrospersonas=mysqli_query($conexion,"SELECT sexo_per FROM personas WHERE codigo_per='$_POST[cod]'");
                  $regpersonas=mysqli_fetch_array($registrospersonas);
                  if($regpersonas['sexo_per']!='F')
                  {
                    if(isset($_POST['lugarbauesp']))
                    {
                      if($_POST['lugarbauesp']=='LB')
                      {
                        if($_POST['tipobusquedaesp']==0)
                        {
                          echo '<h6 align="center" class="alerta"> Debe Seleccionar Tipo de Búsqueda </h6>';
                        }
                        if($_POST['tipobusquedaesp']==1)
                        {
                          if(isset($_POST['cedulesp']) and (trim($_POST['cedulesp'])!="") and (isset($_POST['nuevo_codigoesp'])) and (trim($_POST['nuevo_codigoesp'])!="") and (isset($_POST['nueva_edadesp'])) and (trim($_POST['nueva_edadesp'])!="") and (isset($_POST['nuevo_lugarnacesp'])) and (trim($_POST['nuevo_lugarnacesp'])!="") and (isset($_POST['nuevo_estadoesp'])) and (trim($_POST['nuevo_estadoesp'])!="") and (isset($_POST['nuevo_domicilioesp'])) and (trim($_POST['nuevo_domicilioesp'])!=""))
                          {
                            if($_POST['cod']!=$_POST['nuevo_codigoesp'])
                            {
                              $registrosmatri2=mysqli_query($conexion,"SELECT codigo_per2 FROM matrimonio WHERE codigo_per2='$_POST[nuevo_codigoesp]'") or die(mysqli_error());
                              if($regmatri2=mysqli_fetch_array($registrosmatri2))
                              {
                                echo '<h6 align="center" class="alerta"> Ya existe un registro matrimonial correspondiente a la "Cédula de la Novia" ingresada </h6>';
                              }
                              else
                              {
                                $registrosmatri2=mysqli_query($conexion,"SELECT codigo_per FROM matrimonio WHERE codigo_per='$_POST[nuevo_codigoesp]'") or die(mysqli_error());
                                if($regmatri2=mysqli_fetch_array($registrosmatri2))
                                {
                                  echo '<h6 align="center" class="alerta"> Error: La cedula ingresada se encuentra registrada en el modulo Novio </h6>';
                                }
                                else
                                {
                                  $control=1;
                                  $registrospersonas2=mysqli_query($conexion,"SELECT sexo_per FROM personas WHERE codigo_per='$_POST[nuevo_codigoesp]'");
                                  $regpersonas2=mysqli_fetch_array($registrospersonas2);
                                  if($regpersonas2['sexo_per']!='M')
                                  {
                                    if(isset($_POST['nueva_ced']) AND (trim('nueva_ced')!=""))
                                    {
                                      $registros_personas3=mysqli_query($conexion,"SELECT cedula_per FROM personas WHERE cedula_per='$_POST[nueva_ced]' AND codigo_per<>'$_POST[cod]'");
                                      @$num_resultados_personas3=mysqli_num_rows($registros_personas3);
                                      if($num_resultados_personas3==0)
                                      {
                                        mysqli_query($conexion,"UPDATE personas SET cedula_per='$_POST[nueva_ced]' WHERE codigo_per=$_POST[cod]");
                                      }
                                      else
                                      {
                                        echo '<h6 align="center" class="alerta"> Ya existe un registro correspondiente a la "Cedula" ingresada </h6>';
                                        $control=0;
                                      }
                                    }
                                    if($control==1)
                                    {
                                      if(isset($_POST['filiacion_nueva']) AND (trim('filiacion_nueva')!="") AND (isset($_POST['padre_nuevo'])) AND (trim($_POST['padre_nuevo'])!="") AND (isset($_POST['madre_nueva'])) AND (trim($_POST['madre_nueva'])!=""))
                                      {
                                        mysqli_query($conexion,"UPDATE padrespersona SET filiacion='$_POST[filiacion_nueva]' WHERE codigo_per=$_POST[cod]");
                                      }
                                      if(isset($_POST['nueva_filiacionesp']) AND (trim('nueva_filiacionesp')!="") AND (isset($_POST['nuevo_padreesp'])) AND (trim($_POST['nuevo_padreesp'])!="") AND (isset($_POST['nueva_madreesp'])) AND (trim($_POST['nueva_madreesp'])!=""))
                                      {
                                        mysqli_query($conexion,"UPDATE padrespersona SET filiacion='$_POST[nueva_filiacionesp]' WHERE codigo_per=$_POST[nuevo_codigoesp]");
                                      }

                                      $registrospadrino=mysqli_query($conexion,"SELECT cedula_pdr FROM padrino WHERE cedula_pdr=$_POST[cedulapadrino]");
                                      @$num_filas_padrino=mysqli_num_rows($registrospadrino);
                                      if($num_filas_padrino==0)
                                      {
                                        mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");  
                                      }
                                      
                                      $registrosmadrina=mysqli_query($conexion,"SELECT cedula_mdr FROM madre WHERE cedula_mdr=$_POST[cedulamadrina]");
                                      @$num_filas_madrina=mysqli_num_rows($registrosmadrina);
                                      if($num_filas_madrina==0)
                                      {
                                        mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulamadrina]','$_POST[nombremadrina]','$_POST[apellidomadrina]')");  
                                      }
                                      mysqli_query($conexion,"INSERT INTO padrinosboda(codigo_per,codigo_per2,cedula_pdr,cedula_mdr) VALUES ('$_POST[cod]','$_POST[nuevo_codigoesp]','$_POST[cedulapadrino]','$_POST[cedulamadrina]')");

                                      if((isset($_POST['otroministro'])) and (trim($_POST['otroministro']!="")) and (trim($_POST['otroministro']!="Otro..."))) 
                                      {
                                        $registros=mysqli_query($conexion,"SELECT codigo_min FROM ministro ORDER BY codigo_min DESC LIMIT 1");
                                        if($reg=mysqli_fetch_array($registros))
                                        {
                                          $maximoid=$reg['codigo_min'];
                                          $id_ministro=$maximoid+1;
                                          mysqli_query($conexion,"INSERT INTO ministro(ministro_min) VALUES ('$_POST[otroministro]')");
                                        }
                                      }
                                      else
                                      {
                                        $id_ministro=$_POST['ministro'];
                                      }

                                      mysqli_query($conexion,"UPDATE personas SET sexo_per='M',edad_per='$_POST[edad_nueva]',lugarnac_per='$_POST[lugarnac_nuevo]',estadodir_per='$_POST[estado_nuevo]',direccion_per='$_POST[domicilio_nuevo]' WHERE codigo_per='$_POST[cod]'");
                                      mysqli_query($conexion,"UPDATE personas SET sexo_per='F',edad_per='$_POST[nueva_edadesp]',lugarnac_per='$_POST[nuevo_lugarnacesp]',estadodir_per='$_POST[nuevo_estadoesp]',direccion_per='$_POST[nuevo_domicilioesp]' WHERE codigo_per='$_POST[nuevo_codigoesp]'");

                                      mysqli_query($conexion,"CALL sp_matrimonio('$codmatri','$id_ministro','$_POST[cod]','$_POST[nuevo_codigoesp]','$fmatri','$_POST[proclamas]','$_POST[dispensas]','$_POST[sacramentos]','$_POST[observaciones]')") or die(mysqli_error());
                                    }
                                  }
                                  else
                                  {
                                    echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado registro pertenecientes a un hombre en el módulo de Esposa </h6>';
                                  }
                                }
                              }
                            }
                            else
                            {
                              echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado una misma persona para el módulo de Esposo y de Esposa </h6>';
                            }
                          }
                          else
                          {
                            echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
                          }
                        }
                        if($_POST['tipobusquedaesp']==2)
                        {
                          if(isset($_POST['nombresp']) and (trim($_POST['nombresp'])!="") and (isset($_POST['apelliesp'])) and (trim($_POST['apelliesp'])!="") and (isset($_POST['codesp'])) and (trim($_POST['codesp'])!="") and (isset($_POST['edad_nuevaesp'])) and (trim($_POST['edad_nuevaesp'])!="") and (isset($_POST['lugarnac_nuevoesp'])) and (trim($_POST['lugarnac_nuevoesp'])!="") and (isset($_POST['estado_nuevoesp'])) and (trim($_POST['estado_nuevoesp'])!="") and (isset($_POST['domicilio_nuevoesp'])) and (trim($_POST['domicilio_nuevoesp'])!=""))
                          {
                            if($_POST['cod']!=$_POST['codesp'])
                            {
                              $registrosmatri2=mysqli_query($conexion,"SELECT codigo_per2 FROM matrimonio WHERE codigo_per2='$_POST[codesp]'") or die(mysqli_error());
                              if($regmatri2=mysqli_fetch_array($registrosmatri2))
                              {
                                echo '<h6 align="center" class="alerta"> Ya existe un registro matrimonial correspondiente a la "Cédula de la Novia" ingresada </h6>';
                              }
                              else
                              {
                                $registrosmatri2=mysqli_query($conexion,"SELECT codigo_per FROM matrimonio WHERE codigo_per='$_POST[codesp]'") or die(mysqli_error());
                                if($regmatri2=mysqli_fetch_array($registrosmatri2))
                                {
                                  echo '<h6 align="center" class="alerta"> Error: La cedula ingresada se encuentra registrada en el modulo Novio </h6>';
                                }
                                else
                                {
                                  $control=1;
                                  $registrospersonas2=mysqli_query($conexion,"SELECT sexo_per FROM personas WHERE codigo_per='$_POST[codesp]'");
                                  $regpersonas2=mysqli_fetch_array($registrospersonas2);
                                  if($regpersonas2['sexo_per']!='M')
                                  {
                                    if(isset($_POST['nueva_cedesp']) AND (trim('nueva_cedesp')!=""))
                                    {
                                      $registros_personas3=mysqli_query($conexion,"SELECT cedula_per FROM personas WHERE cedula_per='$_POST[nueva_cedesp]' AND codigo_per<>'$_POST[codesp]'");
                                      @$num_resultados_personas3=mysqli_num_rows($registros_personas3);
                                      if($num_resultados_personas3==0)
                                      {
                                        mysqli_query($conexion,"UPDATE personas SET cedula_per='$_POST[nueva_cedesp]' WHERE codigo_per=$_POST[codesp]");
                                      }
                                      else
                                      {
                                        echo '<h6 align="center" class="alerta"> Ya existe un registro correspondiente a la "Cedula" ingresada </h6>';
                                        $control=0;
                                      }
                                    }
                                    if(isset($_POST['nueva_ced']) AND (trim('nueva_ced')!=""))
                                    {
                                      $registros_personas3=mysqli_query($conexion,"SELECT cedula_per FROM personas WHERE cedula_per='$_POST[nueva_ced]' AND codigo_per<>'$_POST[cod]'");
                                      @$num_resultados_personas3=mysqli_num_rows($registros_personas3);
                                      if($num_resultados_personas3==0)
                                      {
                                        mysqli_query($conexion,"UPDATE personas SET cedula_per='$_POST[nueva_ced]' WHERE codigo_per=$_POST[cod]");
                                      }
                                      else
                                      {
                                        echo '<h6 align="center" class="alerta"> Ya existe un registro correspondiente a la "Cedula" ingresada </h6>';
                                        $control=0;
                                      }
                                    }
                                    if($control==1)
                                    {
                                      if(isset($_POST['filiacion_nueva']) AND (trim('filiacion_nueva')!="") AND (isset($_POST['padre_nuevo'])) AND (trim($_POST['padre_nuevo'])!="") AND (isset($_POST['madre_nueva'])) AND (trim($_POST['madre_nueva'])!=""))
                                      {
                                        mysqli_query($conexion,"UPDATE padrespersona SET filiacion='$_POST[filiacion_nueva]' WHERE codigo_per=$_POST[cod]");
                                      }
                                      if(isset($_POST['filiacion_nuevaesp']) AND (trim('filiacion_nuevaesp')!="") AND (isset($_POST['padre_nuevoesp'])) AND (trim($_POST['padre_nuevoesp'])!="") AND (isset($_POST['madre_nuevaesp'])) AND (trim($_POST['madre_nuevaesp'])!=""))
                                      {
                                        mysqli_query($conexion,"UPDATE padrespersona SET filiacion='$_POST[filiacion_nuevaesp]' WHERE codigo_per=$_POST[codesp]");
                                      }

                                      $registrospadrino=mysqli_query($conexion,"SELECT cedula_pdr FROM padrino WHERE cedula_pdr=$_POST[cedulapadrino]");
                                      @$num_filas_padrino=mysqli_num_rows($registrospadrino);
                                      if($num_filas_padrino==0)
                                      {
                                        mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");  
                                      }
                                      
                                      $registrosmadrina=mysqli_query($conexion,"SELECT cedula_mdr FROM madre WHERE cedula_mdr=$_POST[cedulamadrina]");
                                      @$num_filas_madrina=mysqli_num_rows($registrosmadrina);
                                      if($num_filas_madrina==0)
                                      {
                                        mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulamadrina]','$_POST[nombremadrina]','$_POST[apellidomadrina]')");  
                                      }
                                      mysqli_query($conexion,"INSERT INTO padrinosboda(codigo_per,codigo_per2,cedula_pdr,cedula_mdr) VALUES ('$_POST[cod]','$_POST[codesp]','$_POST[cedulapadrino]','$_POST[cedulamadrina]')");

                                      if((isset($_POST['otroministro'])) and (trim($_POST['otroministro']!="")) and (trim($_POST['otroministro']!="Otro..."))) 
                                      {
                                        $registros=mysqli_query($conexion,"SELECT codigo_min FROM ministro ORDER BY codigo_min DESC LIMIT 1");
                                        if($reg=mysqli_fetch_array($registros))
                                        {
                                          $maximoid=$reg['codigo_min'];
                                          $id_ministro=$maximoid+1;
                                          mysqli_query($conexion,"INSERT INTO ministro(ministro_min) VALUES ('$_POST[otroministro]')");
                                        }
                                      }
                                      else
                                      {
                                        $id_ministro=$_POST['ministro'];
                                      }

                                      mysqli_query($conexion,"UPDATE personas SET sexo_per='M',edad_per='$_POST[edad_nueva]',lugarnac_per='$_POST[lugarnac_nuevo]',estadodir_per='$_POST[estado_nuevo]',direccion_per='$_POST[domicilio_nuevo]' WHERE codigo_per='$_POST[cod]'");
                                      mysqli_query($conexion,"UPDATE personas SET sexo_per='F',edad_per='$_POST[edad_nuevaesp]',lugarnac_per='$_POST[lugarnac_nuevoesp]',estadodir_per='$_POST[estado_nuevoesp]',direccion_per='$_POST[domicilio_nuevoesp]' WHERE codigo_per='$_POST[codesp]'");

                                      mysqli_query($conexion,"CALL sp_matrimonio('$codmatri','$id_ministro','$_POST[cod]','$_POST[codesp]','$fmatri','$_POST[proclamas]','$_POST[dispensas]','$_POST[sacramentos]','$_POST[observaciones]')") or die(mysqli_error());
                                    }
                                  }
                                  else
                                  {
                                    echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado registro pertenecientes a un hombre en el módulo de Esposa </h6>';
                                  }
                                }
                              }
                            }
                            else
                            {
                              echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado una misma persona para el módulo de Esposo y de Esposa </h6>';
                            }
                          }
                          else
                          {
                            echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
                          }
                        }
                      }
                      if($_POST['lugarbauesp']=='O')
                      {
                        if(isset($_POST['otrolugarbauesp']) and (trim($_POST['otrolugarbauesp'])!="") and (isset($_POST['nombreesp'])) and (trim($_POST['nombreesp'])!="") and (isset($_POST['apellidoesp'])) and (trim($_POST['apellidoesp'])!="") and (isset($_POST['edadesp'])) and (trim($_POST['edadesp'])!="") and (isset($_POST['lugarnacesp'])) and (trim($_POST['lugarnacesp'])!="") and (isset($_POST['estadoesp'])) and (trim($_POST['estadoesp'])!="") and (isset($_POST['domicilioesp'])) and (trim($_POST['domicilioesp'])!="") and (isset($_POST['cedulapadreesp'])) and (trim($_POST['cedulapadreesp'])!="") and (isset($_POST['cedulamadreesp'])) and (trim($_POST['cedulamadreesp'])!="") and (isset($_POST['nombrepadreesp'])) and (trim($_POST['nombrepadreesp'])!="") and (isset($_POST['nombremadreesp'])) and (trim($_POST['nombremadreesp'])!="") and (isset($_POST['apellidopadreesp'])) and (trim($_POST['apellidopadreesp'])!="") and (isset($_POST['apellidomadreesp'])) and (trim($_POST['apellidomadreesp'])!="") and (isset($_POST['filiacionesp'])) and (trim($_POST['filiacionesp'])!=""))
                        {
                          $control=1;
                          $registrospersonas=mysqli_query($conexion,"SELECT sexo_per FROM personas WHERE codigo_per='$_POST[cod]'");
                          $regpersonas=mysqli_fetch_array($registrospersonas);
                          if($regpersonas['sexo_per']=='F')
                          {
                            echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado registro pertenecientes a una mujer en el módulo de Esposo </h6>';
                            $control=0;
                          }
                          if(isset($_POST['fechanacesp']) AND (trim($_POST['fechanacesp'])!=""))
                          {
                            $fnac = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanacesp'])));
                          }
                          else
                          {
                            $fnac="";
                          }
                          if(isset($_POST['cedulaesp']) AND (trim('cedulaesp')!=""))
                          {
                            $registros_personas3=mysqli_query($conexion,"SELECT codigo_per FROM personas WHERE cedula_per='$_POST[cedulaesp]'");
                            @$num_resultados_personas3=mysqli_num_rows($registros_personas3);
                            if($num_resultados_personas3>0)
                            {
                              $regpersonas_3=mysqli_fetch_array($registros_personas3);
                              if($_POST['cod']!=$_POST['$regpersonas_3[codigo_per]'])
                              {
                                $registrosmatrimonio_3=mysqli_query($conexion,"SELECT codigo_per2 FROM matrimonio WHERE codigo_per2='$regpersonas_3[codigo_per]'") or die(mysqli_error());
                                @$num_filas=mysqli_num_rows($registrosmatrimonio_3);
                                if($num_filas>0)
                                {
                                  echo '<h6 align="center" class="alerta"> Ya existe un registro matrimonial correspondiente a la "Cédula" ingresada </h6>';
                                  $control=0;
                                }
                                else
                                {
                                  $registrosmatrimonio_3=mysqli_query($conexion,"SELECT codigo_per FROM matrimonio WHERE codigo_per='$regpersonas_3[codigo_per]'") or die(mysqli_error());
                                  @$num_filas=mysqli_num_rows($registrosmatrimonio_3);
                                  if($num_filas>0)
                                  {
                                    echo '<h6 align="center" class="alerta"> Error: La cedula ingresada se encuentra registrada en el modulo Novio </h6>';
                                    $control=0;
                                  }
                                  else
                                  {
                                    $registrospersonas4=mysqli_query($conexion,"SELECT sexo_per FROM personas WHERE codigo_per='$regpersonas_3[codigo_per]'");
                                    $regpersonas4=mysqli_fetch_array($registrospersonas4);
                                    if($regpersonas4['sexo_per']=='M')
                                    {
                                      echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado registro pertenecientes a un hombre en el módulo de Esposa </h6>';
                                      $control=0;
                                    }
                                    else
                                    {
                                      mysqli_query($conexion,"UPDATE personas SET nombre_per='$_POST[nombreesp]',apellido_per='$_POST[apellidoesp]',sexo_per='F',fechanac_per='$fnac',edad_per='$_POST[edadesp]',lugarnac_per='$_POST[lugarnacesp]',estadodir_per='$_POST[estadoesp]',direccion_per='$_POST[domicilioesp]',lugarbautizo_per='$_POST[otrolugarbauesp]' WHERE codigo_per='$regpersonas_3[codigo_per]'") or die(mysqli_error());
                                      $cod=$regpersonas_3['codigo_per'];
                                    }
                                  }
                                }
                              }
                              else
                              {
                                echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado una misma persona para el módulo de Esposo y de Esposa </h6>';
                                $control=0;
                              }
                            }
                            else
                            {
                              if(trim($_POST['cedulaesp'])=="")
                              {
                                mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per,edad_per,lugarnac_per,estadodir_per,direccion_per) VALUES (NULL,'$_POST[nombreesp]','$_POST[apellidoesp]','F','$fnac','$_POST[otrolugarbauesp]','$_POST[edadesp]','$_POST[lugarnacesp]','$_POST[estadoesp]','$_POST[domicilioesp]')") or die(mysqli_error());
                              }
                              else
                              {
                                mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per,edad_per,lugarnac_per,estadodir_per,direccion_per) VALUES ('$_POST[cedulaesp]','$_POST[nombreesp]','$_POST[apellidoesp]','F','$fnac','$_POST[otrolugarbauesp]','$_POST[edadesp]','$_POST[lugarnacesp]','$_POST[estadoesp]','$_POST[domicilioesp]')") or die(mysqli_error());
                              }
                              $cod=mysqli_insert_id($conexion);
                            }
                          }

                          if($control==1)
                          {
                            $registrospadre=mysqli_query($conexion,"SELECT cedula_pad FROM padre WHERE cedula_pad='$_POST[cedulapadreesp]'");
                            @$num_filas_padre=mysqli_num_rows($registrospadre);
                            if($num_filas_padre==0)
                            {
                              mysqli_query($conexion,"INSERT INTO padre(cedula_pad,nombre_pad,apellido_pad) VALUES ('$_POST[cedulapadreesp]','$_POST[nombrepadreesp]','$_POST[apellidopadreesp]')");  
                            }
                            $registrosmadre=mysqli_query($conexion,"SELECT cedula_mad FROM madre WHERE cedula_mad=$_POST[cedulamadreesp]");
                            @$num_filas_madre=mysqli_num_rows($registrosmadre);
                            if($num_filas_madre==0)
                            {
                              mysqli_query($conexion,"INSERT INTO madre(cedula_mad,nombre_mad,apellido_mad) VALUES ('$_POST[cedulamadreesp]','$_POST[nombremadreesp]','$_POST[apellidomadreesp]')");  
                            }
                            $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$cod'");
                            if($regpadper=mysqli_fetch_array($registrospadper))
                            {
                              mysqli_query($conexion,"UPDATE padrespersona SET cedula_pdr='$_POST[cedulapadreesp]',cedula_mdr='$_POST[cedulamadreesp]',filiacion='$_POST[filiacionesp]' WHERE codigo_per=$cod");
                            }
                            else
                            {
                              mysqli_query($conexion,"INSERT INTO padrespersona(codigo_per,cedula_pad,cedula_mad,filiacion) VALUES ('$cod','$_POST[cedulapadreesp]','$_POST[cedulamadreesp]','$_POST[filiacionesp]')");
                            }

                            $registrospadrino=mysqli_query($conexion,"SELECT cedula_pdr FROM padrino WHERE cedula_pdr=$_POST[cedulapadrino]");
                            @$num_filas_padrino=mysqli_num_rows($registrospadrino);
                            if($num_filas_padrino==0)
                            {
                              mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");  
                            }
                            
                            $registrosmadrina=mysqli_query($conexion,"SELECT cedula_mdr FROM madre WHERE cedula_mdr=$_POST[cedulamadrina]");
                            @$num_filas_madrina=mysqli_num_rows($registrosmadrina);
                            if($num_filas_madrina==0)
                            {
                              mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulamadrina]','$_POST[nombremadrina]','$_POST[apellidomadrina]')");  
                            }
                            mysqli_query($conexion,"INSERT INTO padrinosboda(codigo_per,codigo_per2,cedula_pdr,cedula_mdr) VALUES ('$_POST[cod]','$cod','$_POST[cedulapadrino]','$_POST[cedulamadrina]')");

                            if((isset($_POST['otroministro'])) and (trim($_POST['otroministro']!="")) and (trim($_POST['otroministro']!="Otro..."))) 
                            {
                              $registros=mysqli_query($conexion,"SELECT codigo_min FROM ministro ORDER BY codigo_min DESC LIMIT 1");
                              if($reg=mysqli_fetch_array($registros))
                              {
                                $maximoid=$reg['codigo_min'];
                                $id_ministro=$maximoid+1;
                                mysqli_query($conexion,"INSERT INTO ministro(ministro_min) VALUES ('$_POST[otroministro]')");
                              }
                            }
                            else
                            {
                              $id_ministro=$_POST['ministro'];
                            }
                            mysqli_query($conexion,"CALL sp_matrimonio('$codmatri','$id_ministro','$_POST[cod]','$cod','$fmatri','$_POST[proclamas]','$_POST[dispensas]','$_POST[sacramentos]','$_POST[observaciones]')") or die(mysqli_error());
                          }
                        }
                        else
                        {
                          echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
                        }
                      }
                    }
                  }
                  else
                  {
                    echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado registro pertenecientes a una mujer en el módulo de Esposo </h6>';
                  }
                }
              }
            }
            else
            {
              echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
            }
          }
        }
        if($_POST['lugarbau']=='O')
        {
          if(isset($_POST['otrolugarbau']) and (trim($_POST['otrolugarbau'])!="") and (isset($_POST['nombre'])) and (trim($_POST['nombre'])!="") and (isset($_POST['apellido'])) and (trim($_POST['apellido'])!="") and (isset($_POST['edad'])) and (trim($_POST['edad'])!="") and (isset($_POST['lugarnac'])) and (trim($_POST['lugarnac'])!="") and (isset($_POST['estado'])) and (trim($_POST['estado'])!="") and (isset($_POST['domicilio'])) and (trim($_POST['domicilio'])!="") and (isset($_POST['cedulapadre'])) and (trim($_POST['cedulapadre'])!="") and (isset($_POST['cedulamadre'])) and (trim($_POST['cedulamadre'])!="") and (isset($_POST['nombrepadre'])) and (trim($_POST['nombrepadre'])!="") and (isset($_POST['nombremadre'])) and (trim($_POST['nombremadre'])!="") and (isset($_POST['apellidopadre'])) and (trim($_POST['apellidopadre'])!="") and (isset($_POST['apellidomadre'])) and (trim($_POST['apellidomadre'])!="") and (isset($_POST['filiacion'])) and (trim($_POST['filiacion'])!=""))
          {
            $control=1;
            $var=0;
            $code="";
            if(isset($_POST['fechanac']) AND (trim($_POST['fechanac'])!=""))
            {
              $fnac = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanac'])));
            }
            else
            {
              $fnac="";
            }
            if(isset($_POST['cedula']) AND (trim('cedula')!=""))
            {
              $registros_personas=mysqli_query($conexion,"SELECT codigo_per FROM personas WHERE cedula_per='$_POST[cedula]'");
              @$num_resultados_personas=mysqli_num_rows($registros_personas);
              if($num_resultados_personas>0)
              {
                $regpersonas=mysqli_fetch_array($registros_personas);
                $code=$regpersonas['codigo_per'];
                $registrosmatrimonio=mysqli_query($conexion,"SELECT codigo_per FROM matrimonio WHERE codigo_per='$regpersonas[codigo_per]'") or die(mysqli_error());
                @$num_filas=mysqli_num_rows($registrosmatrimonio);
                if($num_filas>0)
                {
                  echo '<h6 align="center" class="alerta"> Ya existe un registro matrimonial correspondiente a la "Cédula" ingresada </h6>';
                  $control=0;
                }
                else
                {
                  $registrosmatrimonio=mysqli_query($conexion,"SELECT codigo_per2 FROM matrimonio WHERE codigo_per2='$regpersonas[codigo_per]'") or die(mysqli_error());
                  @$num_filas=mysqli_num_rows($registrosmatrimonio);
                  if($num_filas>0)
                  {
                    echo '<h6 align="center" class="alerta"> Error: La cedula ingresada se encuentra registrada en el modulo Novia </h6>';
                    $control=0;
                  }
                  else
                  {
                    $registrospersonas2=mysqli_query($conexion,"SELECT sexo_per FROM personas WHERE codigo_per='$regpersonas[codigo_per]'");
                    $regpersonas2=mysqli_fetch_array($registrospersonas2);
                    if($regpersonas2['sexo_per']=='F')
                    {
                      echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado registro pertenecientes a una mujer en el módulo de Esposo </h6>';
                      $control=0;
                    }
                    else
                    {
                      $var=1;   //actualizar persona                
                    }
                  }
                }
              }
              else
              {
                if(trim($_POST['cedula'])=="")
                {
                  $var=2;  //registrar persona cedula NULL
                }
                else
                {
                  $var=3;  //registrar persona
                }       
              }
            }
            if($control==1)
            {
              if(isset($_POST['lugarbauesp']))
              {
                if($_POST['lugarbauesp']=='LB')
                {
                  if($_POST['tipobusquedaesp']==0)
                  {
                    echo '<h6 align="center" class="alerta"> Debe Seleccionar Tipo de Búsqueda </h6>';
                  }
                  if($_POST['tipobusquedaesp']==1)
                  {
                    if(isset($_POST['cedulesp']) and (trim($_POST['cedulesp'])!="") and (isset($_POST['nuevo_codigoesp'])) and (trim($_POST['nuevo_codigoesp'])!="") and (isset($_POST['nueva_edadesp'])) and (trim($_POST['nueva_edadesp'])!="") and (isset($_POST['nuevo_lugarnacesp'])) and (trim($_POST['nuevo_lugarnacesp'])!="") and (isset($_POST['nuevo_estadoesp'])) and (trim($_POST['nuevo_estadoesp'])!="") and (isset($_POST['nuevo_domicilioesp'])) and (trim($_POST['nuevo_domicilioesp'])!=""))
                    {
                      if($code!=$_POST['nuevo_codigoesp'])
                      {
                        $registrosmatri2=mysqli_query($conexion,"SELECT codigo_per2 FROM matrimonio WHERE codigo_per2='$_POST[nuevo_codigoesp]'") or die(mysqli_error());
                        if($regmatri2=mysqli_fetch_array($registrosmatri2))
                        {
                          echo '<h6 align="center" class="alerta"> Ya existe un registro matrimonial correspondiente a la "Cédula de la Novia" ingresada </h6>';
                        }
                        else
                        {
                          $registrosmatri2=mysqli_query($conexion,"SELECT codigo_per FROM matrimonio WHERE codigo_per='$_POST[nuevo_codigoesp]'") or die(mysqli_error());
                          if($regmatri2=mysqli_fetch_array($registrosmatri2))
                          {
                            echo '<h6 align="center" class="alerta"> Error: La cedula ingresada se encuentra registrada en el modulo Novio </h6>';
                          }
                          else
                          {
                            $registrospersonas2=mysqli_query($conexion,"SELECT sexo_per FROM personas WHERE codigo_per='$_POST[nuevo_codigoesp]'");
                            $regpersonas2=mysqli_fetch_array($registrospersonas2);
                            if($regpersonas2['sexo_per']!='M')
                            {
                              if($var==1)
                              {
                                mysqli_query($conexion,"UPDATE personas SET nombre_per='$_POST[nombre]',apellido_per='$_POST[apellido]',sexo_per='M',fechanac_per='$fnac',edad_per='$_POST[edad]',lugarnac_per='$_POST[lugarnac]',estadodir_per='$_POST[estado]',direccion_per='$_POST[domicilio]',lugarbautizo_per='$_POST[otrolugarbau]' WHERE codigo_per='$regpersonas[codigo_per]'") or die(mysqli_error());
                                $codig=$regpersonas['codigo_per'];
                              }
                              if($var==2)
                              {
                                mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per,edad_per,lugarnac_per,estadodir_per,direccion_per) VALUES (NULL,'$_POST[nombre]','$_POST[apellido]','M','$fnac','$_POST[otrolugarbau]','$_POST[edad]','$_POST[lugarnac]','$_POST[estado]','$_POST[domicilio]')") or die(mysqli_error());
                                $codig=mysqli_insert_id($conexion);
                              }
                              if($var==3)
                              {
                                mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per,edad_per,lugarnac_per,estadodir_per,direccion_per) VALUES ('$_POST[cedula]','$_POST[nombre]','$_POST[apellido]','M','$fnac','$_POST[otrolugarbau]','$_POST[edad]','$_POST[lugarnac]','$_POST[estado]','$_POST[domicilio]')") or die(mysqli_error());
                                $codig=mysqli_insert_id($conexion);
                              }

                              $registrospadre=mysqli_query($conexion,"SELECT cedula_pad FROM padre WHERE cedula_pad='$_POST[cedulapadre]'");
                              @$num_filas_padre=mysqli_num_rows($registrospadre);
                              if($num_filas_padre==0)
                              {
                                mysqli_query($conexion,"INSERT INTO padre(cedula_pad,nombre_pad,apellido_pad) VALUES ('$_POST[cedulapadre]','$_POST[nombrepadre]','$_POST[apellidopadre]')");  
                              }
                              $registrosmadre=mysqli_query($conexion,"SELECT cedula_mad FROM madre WHERE cedula_mad=$_POST[cedulamadre]");
                              @$num_filas_madre=mysqli_num_rows($registrosmadre);
                              if($num_filas_madre==0)
                              {
                                mysqli_query($conexion,"INSERT INTO madre(cedula_mad,nombre_mad,apellido_mad) VALUES ('$_POST[cedulamadre]','$_POST[nombremadre]','$_POST[apellidomadre]')");  
                              }
                              $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$codig'");
                              if($regpadper=mysqli_fetch_array($registrospadper))
                              {
                                mysqli_query($conexion,"UPDATE padrespersona SET cedula_pdr='$_POST[cedulapadre]',cedula_mdr='$_POST[cedulamadre]',filiacion='$_POST[filiacion]' WHERE codigo_per=$codig");
                              }
                              else
                              {
                                mysqli_query($conexion,"INSERT INTO padrespersona(codigo_per,cedula_pad,cedula_mad,filiacion) VALUES ('$codig','$_POST[cedulapadre]','$_POST[cedulamadre]','$_POST[filiacion]')");
                              }

                              if(isset($_POST['nueva_filiacionesp']) AND (trim('nueva_filiacionesp')!="") AND (isset($_POST['nuevo_padreesp'])) AND (trim($_POST['nuevo_padreesp'])!="") AND (isset($_POST['nueva_madreesp'])) AND (trim($_POST['nueva_madreesp'])!=""))
                              {
                                mysqli_query($conexion,"UPDATE padrespersona SET filiacion='$_POST[nueva_filiacionesp]' WHERE codigo_per=$_POST[nuevo_codigoesp]");
                              }

                              $registrospadrino=mysqli_query($conexion,"SELECT cedula_pdr FROM padrino WHERE cedula_pdr=$_POST[cedulapadrino]");
                              @$num_filas_padrino=mysqli_num_rows($registrospadrino);
                              if($num_filas_padrino==0)
                              {
                                mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");  
                              }
                              
                              $registrosmadrina=mysqli_query($conexion,"SELECT cedula_mdr FROM madre WHERE cedula_mdr=$_POST[cedulamadrina]");
                              @$num_filas_madrina=mysqli_num_rows($registrosmadrina);
                              if($num_filas_madrina==0)
                              {
                                mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulamadrina]','$_POST[nombremadrina]','$_POST[apellidomadrina]')");  
                              }
                              mysqli_query($conexion,"INSERT INTO padrinosboda(codigo_per,codigo_per2,cedula_pdr,cedula_mdr) VALUES ('$codig','$_POST[nuevo_codigoesp]','$_POST[cedulapadrino]','$_POST[cedulamadrina]')");

                              if((isset($_POST['otroministro'])) and (trim($_POST['otroministro']!="")) and (trim($_POST['otroministro']!="Otro..."))) 
                              {
                                $registros=mysqli_query($conexion,"SELECT codigo_min FROM ministro ORDER BY codigo_min DESC LIMIT 1");
                                if($reg=mysqli_fetch_array($registros))
                                {
                                  $maximoid=$reg['codigo_min'];
                                  $id_ministro=$maximoid+1;
                                  mysqli_query($conexion,"INSERT INTO ministro(ministro_min) VALUES ('$_POST[otroministro]')");
                                }
                              }
                              else
                              {
                                $id_ministro=$_POST['ministro'];
                              }
                              mysqli_query($conexion,"UPDATE personas SET sexo_per='F',edad_per='$_POST[nueva_edadesp]',lugarnac_per='$_POST[nuevo_lugarnacesp]',estadodir_per='$_POST[nuevo_estadoesp]',direccion_per='$_POST[nuevo_domicilioesp]' WHERE codigo_per='$_POST[nuevo_codigoesp]'");

                              mysqli_query($conexion,"CALL sp_matrimonio('$codmatri','$id_ministro','$codig','$_POST[nuevo_codigoesp]','$fmatri','$_POST[proclamas]','$_POST[dispensas]','$_POST[sacramentos]','$_POST[observaciones]')") or die(mysqli_error());
                            }
                            else
                            {
                              echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado registro pertenecientes a un hombre en el módulo de Esposa </h6>';
                            }
                          }
                        }
                      }
                      else
                      {
                        echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado una misma persona para el módulo de Esposo y de Esposa </h6>';
                      }
                    }
                    else
                    {
                      echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
                    }
                  }
                  if($_POST['tipobusquedaesp']==2)
                  {
                    if(isset($_POST['nombresp']) and (trim($_POST['nombresp'])!="") and (isset($_POST['apelliesp'])) and (trim($_POST['apelliesp'])!="") and (isset($_POST['codesp'])) and (trim($_POST['codesp'])!="") and (isset($_POST['edad_nuevaesp'])) and (trim($_POST['edad_nuevaesp'])!="") and (isset($_POST['lugarnac_nuevoesp'])) and (trim($_POST['lugarnac_nuevoesp'])!="") and (isset($_POST['estado_nuevoesp'])) and (trim($_POST['estado_nuevoesp'])!="") and (isset($_POST['domicilio_nuevoesp'])) and (trim($_POST['domicilio_nuevoesp'])!=""))
                    {
                      if($code!=$_POST['codesp'])
                      {
                        $registrosmatri2=mysqli_query($conexion,"SELECT codigo_per2 FROM matrimonio WHERE codigo_per2='$_POST[codesp]'") or die(mysqli_error());
                        if($regmatri2=mysqli_fetch_array($registrosmatri2))
                        {
                          echo '<h6 align="center" class="alerta"> Ya existe un registro matrimonial correspondiente a la "Cédula de la Novia" ingresada </h6>';
                        }
                        else
                        {
                          $registrosmatri2=mysqli_query($conexion,"SELECT codigo_per FROM matrimonio WHERE codigo_per='$_POST[codesp]'") or die(mysqli_error());
                          if($regmatri2=mysqli_fetch_array($registrosmatri2))
                          {
                            echo '<h6 align="center" class="alerta"> Error: La cedula ingresada se encuentra registrada en el modulo Novio </h6>';
                          }
                          else
                          {
                            $registrospersonas2=mysqli_query($conexion,"SELECT sexo_per FROM personas WHERE codigo_per='$_POST[codesp]'");
                            $regpersonas2=mysqli_fetch_array($registrospersonas2);
                            if($regpersonas2['sexo_per']!='M')
                            {
                              $control=1;
                              if(isset($_POST['nueva_cedesp']) AND (trim('nueva_cedesp')!=""))
                              {
                                $registros_personas3=mysqli_query($conexion,"SELECT cedula_per FROM personas WHERE cedula_per='$_POST[nueva_cedesp]' AND codigo_per<>'$_POST[codesp]'");
                                @$num_resultados_personas3=mysqli_num_rows($registros_personas3);
                                if($num_resultados_personas3==0)
                                {
                                  mysqli_query($conexion,"UPDATE personas SET cedula_per='$_POST[nueva_cedesp]' WHERE codigo_per=$_POST[codesp]");
                                }
                                else
                                {
                                  echo '<h6 align="center" class="alerta"> Ya existe un registro correspondiente a la "Cedula" ingresada </h6>';
                                  $control=0;
                                }
                              }
                              if($control==1)
                              {
                                if($var==1)
                                {
                                  mysqli_query($conexion,"UPDATE personas SET nombre_per='$_POST[nombre]',apellido_per='$_POST[apellido]',sexo_per='M',fechanac_per='$fnac',edad_per='$_POST[edad]',lugarnac_per='$_POST[lugarnac]',estadodir_per='$_POST[estado]',direccion_per='$_POST[domicilio]',lugarbautizo_per='$_POST[otrolugarbau]' WHERE codigo_per='$regpersonas[codigo_per]'") or die(mysqli_error());
                                  $codig=$regpersonas['codigo_per'];
                                }
                                if($var==2)
                                {
                                  mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per,edad_per,lugarnac_per,estadodir_per,direccion_per) VALUES (NULL,'$_POST[nombre]','$_POST[apellido]','M','$fnac','$_POST[otrolugarbau]','$_POST[edad]','$_POST[lugarnac]','$_POST[estado]','$_POST[domicilio]')") or die(mysqli_error());
                                  $codig=mysqli_insert_id($conexion);
                                }
                                if($var==3)
                                {
                                  mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per,edad_per,lugarnac_per,estadodir_per,direccion_per) VALUES ('$_POST[cedula]','$_POST[nombre]','$_POST[apellido]','M','$fnac','$_POST[otrolugarbau]','$_POST[edad]','$_POST[lugarnac]','$_POST[estado]','$_POST[domicilio]')") or die(mysqli_error());
                                  $codig=mysqli_insert_id($conexion);
                                }

                                if(isset($_POST['filiacion_nuevaesp']) AND (trim('filiacion_nuevaesp')!="") AND (isset($_POST['padre_nuevoesp'])) AND (trim($_POST['padre_nuevoesp'])!="") AND (isset($_POST['madre_nuevaesp'])) AND (trim($_POST['madre_nuevaesp'])!=""))
                                {
                                  mysqli_query($conexion,"UPDATE padrespersona SET filiacion='$_POST[filiacion_nuevaesp]' WHERE codigo_per=$_POST[codesp]");
                                }

                                $registrospadre=mysqli_query($conexion,"SELECT cedula_pad FROM padre WHERE cedula_pad='$_POST[cedulapadre]'");
                                @$num_filas_padre=mysqli_num_rows($registrospadre);
                                if($num_filas_padre==0)
                                {
                                  mysqli_query($conexion,"INSERT INTO padre(cedula_pad,nombre_pad,apellido_pad) VALUES ('$_POST[cedulapadre]','$_POST[nombrepadre]','$_POST[apellidopadre]')");  
                                }
                                $registrosmadre=mysqli_query($conexion,"SELECT cedula_mad FROM madre WHERE cedula_mad=$_POST[cedulamadre]");
                                @$num_filas_madre=mysqli_num_rows($registrosmadre);
                                if($num_filas_madre==0)
                                {
                                  mysqli_query($conexion,"INSERT INTO madre(cedula_mad,nombre_mad,apellido_mad) VALUES ('$_POST[cedulamadre]','$_POST[nombremadre]','$_POST[apellidomadre]')");  
                                }
                                $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$codig'");
                                if($regpadper=mysqli_fetch_array($registrospadper))
                                {
                                  mysqli_query($conexion,"UPDATE padrespersona SET cedula_pdr='$_POST[cedulapadre]',cedula_mdr='$_POST[cedulamadre]',filiacion='$_POST[filiacion]' WHERE codigo_per=$codig");
                                }
                                else
                                {
                                  mysqli_query($conexion,"INSERT INTO padrespersona(codigo_per,cedula_pad,cedula_mad,filiacion) VALUES ('$codig','$_POST[cedulapadre]','$_POST[cedulamadre]','$_POST[filiacion]')");
                                }

                                $registrospadrino=mysqli_query($conexion,"SELECT cedula_pdr FROM padrino WHERE cedula_pdr=$_POST[cedulapadrino]");
                                @$num_filas_padrino=mysqli_num_rows($registrospadrino);
                                if($num_filas_padrino==0)
                                {
                                  mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");  
                                }
                                
                                $registrosmadrina=mysqli_query($conexion,"SELECT cedula_mdr FROM madre WHERE cedula_mdr=$_POST[cedulamadrina]");
                                @$num_filas_madrina=mysqli_num_rows($registrosmadrina);
                                if($num_filas_madrina==0)
                                {
                                  mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulamadrina]','$_POST[nombremadrina]','$_POST[apellidomadrina]')");  
                                }
                                mysqli_query($conexion,"INSERT INTO padrinosboda(codigo_per,codigo_per2,cedula_pdr,cedula_mdr) VALUES ('$codig','$_POST[codesp]','$_POST[cedulapadrino]','$_POST[cedulamadrina]')");

                                if((isset($_POST['otroministro'])) and (trim($_POST['otroministro']!="")) and (trim($_POST['otroministro']!="Otro..."))) 
                                {
                                  $registros=mysqli_query($conexion,"SELECT codigo_min FROM ministro ORDER BY codigo_min DESC LIMIT 1");
                                  if($reg=mysqli_fetch_array($registros))
                                  {
                                    $maximoid=$reg['codigo_min'];
                                    $id_ministro=$maximoid+1;
                                    mysqli_query($conexion,"INSERT INTO ministro(ministro_min) VALUES ('$_POST[otroministro]')");
                                  }
                                }
                                else
                                {
                                  $id_ministro=$_POST['ministro'];
                                }

                                mysqli_query($conexion,"UPDATE personas SET sexo_per='F',edad_per='$_POST[edad_nuevaesp]',lugarnac_per='$_POST[lugarnac_nuevoesp]',estadodir_per='$_POST[estado_nuevoesp]',direccion_per='$_POST[domicilio_nuevoesp]' WHERE codigo_per='$_POST[codesp]'");

                                mysqli_query($conexion,"CALL sp_matrimonio('$codmatri','$id_ministro','$codig','$_POST[codesp]','$fmatri','$_POST[proclamas]','$_POST[dispensas]','$_POST[sacramentos]','$_POST[observaciones]')") or die(mysqli_error());
                              }
                            }
                            else
                            {
                              echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado registro pertenecientes a un hombre en el módulo de Esposa </h6>';
                            }
                          }
                        }
                      }
                      else
                      {
                        echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado una misma persona para el módulo de Esposo y de Esposa </h6>';
                      }
                    }
                    else
                    {
                      echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
                    }
                  }
                }
                if($_POST['lugarbauesp']=='O')
                {
                  if(isset($_POST['otrolugarbauesp']) and (trim($_POST['otrolugarbauesp'])!="") and (isset($_POST['nombreesp'])) and (trim($_POST['nombreesp'])!="") and (isset($_POST['apellidoesp'])) and (trim($_POST['apellidoesp'])!="") and (isset($_POST['edadesp'])) and (trim($_POST['edadesp'])!="") and (isset($_POST['lugarnacesp'])) and (trim($_POST['lugarnacesp'])!="") and (isset($_POST['estadoesp'])) and (trim($_POST['estadoesp'])!="") and (isset($_POST['domicilioesp'])) and (trim($_POST['domicilioesp'])!="") and (isset($_POST['cedulapadreesp'])) and (trim($_POST['cedulapadreesp'])!="") and (isset($_POST['cedulamadreesp'])) and (trim($_POST['cedulamadreesp'])!="") and (isset($_POST['nombrepadreesp'])) and (trim($_POST['nombrepadreesp'])!="") and (isset($_POST['nombremadreesp'])) and (trim($_POST['nombremadreesp'])!="") and (isset($_POST['apellidopadreesp'])) and (trim($_POST['apellidopadreesp'])!="") and (isset($_POST['apellidomadreesp'])) and (trim($_POST['apellidomadreesp'])!="") and (isset($_POST['filiacionesp'])) and (trim($_POST['filiacionesp'])!=""))
                  {
                    $controlesp=1;
                    if(isset($_POST['fechanacesp']) AND (trim($_POST['fechanacesp'])!=""))
                    {
                      $fnac = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanacesp'])));
                    }
                    else
                    {
                      $fnac="";
                    }
                    if(isset($_POST['cedulaesp']) AND (trim('cedulaesp')!=""))
                    {
                      $registros_personas3=mysqli_query($conexion,"SELECT codigo_per FROM personas WHERE cedula_per='$_POST[cedulaesp]'");
                      @$num_resultados_personas3=mysqli_num_rows($registros_personas3);
                      if($num_resultados_personas3>0)
                      {
                        $regpersonas_3=mysqli_fetch_array($registros_personas3);
                        if($code!=$_POST['$regpersonas_3[codigo_per]'])
                        {
                          $registrosmatrimonio_3=mysqli_query($conexion,"SELECT codigo_per2 FROM matrimonio WHERE codigo_per2='$regpersonas_3[codigo_per]'") or die(mysqli_error());
                          @$num_filas=mysqli_num_rows($registrosmatrimonio_3);
                          if($num_filas>0)
                          {
                            echo '<h6 align="center" class="alerta"> Ya existe un registro matrimonial correspondiente a la "Cédula" ingresada </h6>';
                            $controlesp=0;
                          }
                          else
                          {
                            $registrosmatrimonio_3=mysqli_query($conexion,"SELECT codigo_per FROM matrimonio WHERE codigo_per='$regpersonas_3[codigo_per]'") or die(mysqli_error());
                            @$num_filas=mysqli_num_rows($registrosmatrimonio_3);
                            if($num_filas>0)
                            {
                              echo '<h6 align="center" class="alerta"> Error: La cedula ingresada se encuentra registrada en el modulo Novio </h6>';
                              $controlesp=0;
                            }
                            else
                            {
                              $registrospersonas4=mysqli_query($conexion,"SELECT sexo_per FROM personas WHERE codigo_per='$regpersonas_3[codigo_per]'");
                              $regpersonas4=mysqli_fetch_array($registrospersonas4);
                              if($regpersonas4['sexo_per']=='M')
                              {
                                echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado registro pertenecientes a un hombre en el módulo de Esposa </h6>';
                                $controlesp=0;
                              }
                              else
                              {
                                mysqli_query($conexion,"UPDATE personas SET nombre_per='$_POST[nombreesp]',apellido_per='$_POST[apellidoesp]',sexo_per='F',fechanac_per='$fnac',edad_per='$_POST[edadesp]',lugarnac_per='$_POST[lugarnacesp]',estadodir_per='$_POST[estadoesp]',direccion_per='$_POST[domicilioesp]',lugarbautizo_per='$_POST[otrolugarbauesp]' WHERE codigo_per='$regpersonas_3[codigo_per]'") or die(mysqli_error());
                                $cod=$regpersonas_3['codigo_per'];
                              }
                            }
                          }
                        }
                        else
                        {
                          echo '<h6 align="center" class="alerta"> Error: Se ha Seleccionado una misma persona para el módulo de Esposo y de Esposa </h6>';
                          $controlesp=0;
                        }
                      }
                      else
                      {
                        if(trim($_POST['cedulaesp'])=="")
                        {
                          mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per,edad_per,lugarnac_per,estadodir_per,direccion_per) VALUES (NULL,'$_POST[nombreesp]','$_POST[apellidoesp]','F','$fnac','$_POST[otrolugarbauesp]','$_POST[edadesp]','$_POST[lugarnacesp]','$_POST[estadoesp]','$_POST[domicilioesp]')") or die(mysqli_error());
                        }
                        else
                        {
                          mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per,edad_per,lugarnac_per,estadodir_per,direccion_per) VALUES ('$_POST[cedulaesp]','$_POST[nombreesp]','$_POST[apellidoesp]','F','$fnac','$_POST[otrolugarbauesp]','$_POST[edadesp]','$_POST[lugarnacesp]','$_POST[estadoesp]','$_POST[domicilioesp]')") or die(mysqli_error());
                        }
                        $cod=mysqli_insert_id($conexion);
                      }
                    }

                    if($controlesp==1)
                    {
                      if($var==1)
                      {
                        mysqli_query($conexion,"UPDATE personas SET nombre_per='$_POST[nombre]',apellido_per='$_POST[apellido]',sexo_per='M',fechanac_per='$fnac',edad_per='$_POST[edad]',lugarnac_per='$_POST[lugarnac]',estadodir_per='$_POST[estado]',direccion_per='$_POST[domicilio]',lugarbautizo_per='$_POST[otrolugarbau]' WHERE codigo_per='$regpersonas[codigo_per]'") or die(mysqli_error());
                        $codig=$regpersonas['codigo_per'];
                      }
                      if($var==2)
                      {
                        mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per,edad_per,lugarnac_per,estadodir_per,direccion_per) VALUES (NULL,'$_POST[nombre]','$_POST[apellido]','M','$fnac','$_POST[otrolugarbau]','$_POST[edad]','$_POST[lugarnac]','$_POST[estado]','$_POST[domicilio]')") or die(mysqli_error());
                        $codig=mysqli_insert_id($conexion);
                      }
                      if($var==3)
                      {
                        mysqli_query($conexion,"INSERT INTO personas(cedula_per,nombre_per,apellido_per,sexo_per,fechanac_per,lugarbautizo_per,edad_per,lugarnac_per,estadodir_per,direccion_per) VALUES ('$_POST[cedula]','$_POST[nombre]','$_POST[apellido]','M','$fnac','$_POST[otrolugarbau]','$_POST[edad]','$_POST[lugarnac]','$_POST[estado]','$_POST[domicilio]')") or die(mysqli_error());
                        $codig=mysqli_insert_id($conexion);
                      }

                      $registrospadre=mysqli_query($conexion,"SELECT cedula_pad FROM padre WHERE cedula_pad='$_POST[cedulapadre]'");
                      @$num_filas_padre=mysqli_num_rows($registrospadre);
                      if($num_filas_padre==0)
                      {
                        mysqli_query($conexion,"INSERT INTO padre(cedula_pad,nombre_pad,apellido_pad) VALUES ('$_POST[cedulapadre]','$_POST[nombrepadre]','$_POST[apellidopadre]')");  
                      }
                      $registrosmadre=mysqli_query($conexion,"SELECT cedula_mad FROM madre WHERE cedula_mad=$_POST[cedulamadre]");
                      @$num_filas_madre=mysqli_num_rows($registrosmadre);
                      if($num_filas_madre==0)
                      {
                        mysqli_query($conexion,"INSERT INTO madre(cedula_mad,nombre_mad,apellido_mad) VALUES ('$_POST[cedulamadre]','$_POST[nombremadre]','$_POST[apellidomadre]')");  
                      }
                      $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$codig'");
                      if($regpadper=mysqli_fetch_array($registrospadper))
                      {
                        mysqli_query($conexion,"UPDATE padrespersona SET cedula_pdr='$_POST[cedulapadre]',cedula_mdr='$_POST[cedulamadre]',filiacion='$_POST[filiacion]' WHERE codigo_per=$codig");
                      }
                      else
                      {
                        mysqli_query($conexion,"INSERT INTO padrespersona(codigo_per,cedula_pad,cedula_mad,filiacion) VALUES ('$codig','$_POST[cedulapadre]','$_POST[cedulamadre]','$_POST[filiacion]')");
                      }


                      $registrospadreesp=mysqli_query($conexion,"SELECT cedula_pad FROM padre WHERE cedula_pad='$_POST[cedulapadreesp]'");
                      @$num_filas_padreesp=mysqli_num_rows($registrospadreesp);
                      if($num_filas_padreesp==0)
                      {
                        mysqli_query($conexion,"INSERT INTO padre(cedula_pad,nombre_pad,apellido_pad) VALUES ('$_POST[cedulapadreesp]','$_POST[nombrepadreesp]','$_POST[apellidopadreesp]')");  
                      }
                      $registrosmadreesp=mysqli_query($conexion,"SELECT cedula_mad FROM madre WHERE cedula_mad=$_POST[cedulamadreesp]");
                      @$num_filas_madreesp=mysqli_num_rows($registrosmadreesp);
                      if($num_filas_madreesp==0)
                      {
                        mysqli_query($conexion,"INSERT INTO madre(cedula_mad,nombre_mad,apellido_mad) VALUES ('$_POST[cedulamadreesp]','$_POST[nombremadreesp]','$_POST[apellidomadreesp]')");  
                      }
                      $registrospadperesp=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$cod'");
                      if($regpadperesp=mysqli_fetch_array($registrospadperesp))
                      {
                        mysqli_query($conexion,"UPDATE padrespersona SET cedula_pdr='$_POST[cedulapadreesp]',cedula_mdr='$_POST[cedulamadreesp]',filiacion='$_POST[filiacionesp]' WHERE codigo_per=$cod");
                      }
                      else
                      {
                        mysqli_query($conexion,"INSERT INTO padrespersona(codigo_per,cedula_pad,cedula_mad,filiacion) VALUES ('$cod','$_POST[cedulapadreesp]','$_POST[cedulamadreesp]','$_POST[filiacionesp]')");
                      }

                      $registrospadrino=mysqli_query($conexion,"SELECT cedula_pdr FROM padrino WHERE cedula_pdr=$_POST[cedulapadrino]");
                      @$num_filas_padrino=mysqli_num_rows($registrospadrino);
                      if($num_filas_padrino==0)
                      {
                        mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");  
                      }
                      
                      $registrosmadrina=mysqli_query($conexion,"SELECT cedula_mdr FROM madre WHERE cedula_mdr=$_POST[cedulamadrina]");
                      @$num_filas_madrina=mysqli_num_rows($registrosmadrina);
                      if($num_filas_madrina==0)
                      {
                        mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulamadrina]','$_POST[nombremadrina]','$_POST[apellidomadrina]')");  
                      }
                      mysqli_query($conexion,"INSERT INTO padrinosboda(codigo_per,codigo_per2,cedula_pdr,cedula_mdr) VALUES ('$codig','$cod','$_POST[cedulapadrino]','$_POST[cedulamadrina]')");

                      if((isset($_POST['otroministro'])) and (trim($_POST['otroministro']!="")) and (trim($_POST['otroministro']!="Otro..."))) 
                      {
                        $registros=mysqli_query($conexion,"SELECT codigo_min FROM ministro ORDER BY codigo_min DESC LIMIT 1");
                        if($reg=mysqli_fetch_array($registros))
                        {
                          $maximoid=$reg['codigo_min'];
                          $id_ministro=$maximoid+1;
                          mysqli_query($conexion,"INSERT INTO ministro(ministro_min) VALUES ('$_POST[otroministro]')");
                        }
                      }
                      else
                      {
                        $id_ministro=$_POST['ministro'];
                      }
                      mysqli_query($conexion,"CALL sp_matrimonio('$codmatri','$id_ministro','$codig','$cod','$fmatri','$_POST[proclamas]','$_POST[dispensas]','$_POST[sacramentos]','$_POST[observaciones]')") or die(mysqli_error());
                    }
                  }
                  else
                  {
                    echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
                  }
                }
              }
            }
          } 
          else
          {
            echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
          }
        }
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*)</h6>';
    }
  }
}
function validarMatriCed()
{
  $flag=1;
  if(isset($_POST['MatriCed']))
  {
    if(isset($_POST['cedula']) and (trim($_POST['cedula'])!=""))
    {
      if(!(filter_var($_POST['cedula'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> el campo "Cédula" acepta solo números</h6>';
        $flag=0;
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ninguna "Cédula" </h6>';
      $flag=0;
    }
    buscarmatri($flag,'matriced');
  }
}
function validarMatriNom()
{
  $flag=1;
  if(isset($_POST['MatriNom']))
  {
    echo '<br>';
    if(!((isset($_POST['nom']) and (trim($_POST['nom'])!=""))))
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ningún "Nombre" </h6>';
      $flag=0;
    }
    if(!((isset($_POST['ap']) and (trim($_POST['ap'])!=""))))
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado ningún "Apellido" </h6>';
      $flag=0;
    }
    buscarmatri($flag,'matrinom');
  }
}
function validarMatriFecha()
{
  $flag=1;
  if(isset($_POST['MatriFecha']))
  {
    echo '<br>';
    if(!((isset($_POST['fechamatri']) and (trim($_POST['fechamatri'])!=""))))
    {
      echo '<h6 align="center" class="alerta"> No se ha ingresado "Fecha de Matrimonio" </h6>';
      $flag=0;
    }
    buscarmatri($flag,'matrifecha');
  }
}
function buscarmatri($bandera,$consulta)
{
  include("../php/conexion.php");
  if(($bandera==1) and $consulta=='matriced')
  {
    $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE cedula_per='$_POST[cedula]'");
    if($reg=mysqli_fetch_array($registros))
    {
      $codigoper=$reg['codigo_per'];
      $registrosmatrimonio=mysqli_query($conexion,"SELECT * FROM matrimonio WHERE codigo_per=$codigoper");
      if($regmatrimonio=mysqli_fetch_array($registrosmatrimonio))
      {
?>
        <br>
        <br>
        <div class="table-responsive" id="tablaced">
          <table class="table table-bordered" id="tabla_ced">
            <tr>
              <th class="text-center">N°</th>
              <th class="text-center">Esposo</th>
              <th class="text-center">Esposa</th>
              <th class="text-center">Fecha de Matrimonio</th>
              <th class="text-center">Testigos</th>
              <th class="text-center">Ministro</th>
            </tr>
            <tr>
              <td class="text-center"><?php echo 1; ?></td>
              <td class="text-center"><?php echo $reg['nombre_per'].' '.$reg['apellido_per']; ?></td> 
              <?php
                $registrosmatrimonio2=mysqli_query($conexion,"SELECT codigo_per2 FROM matrimonio WHERE codigo_per=$codigoper");
                $regmatrimonio2=mysqli_fetch_array($registrosmatrimonio2);
                $registrosesposa=mysqli_query($conexion,"SELECT nombre_per,apellido_per FROM personas WHERE codigo_per='$regmatrimonio2[codigo_per2]'");
                $regesposa=mysqli_fetch_array($registrosesposa);
              ?>
              <td class="text-center"><?php echo $regesposa['nombre_per'].' '.$regesposa['apellido_per']; ?></td>
              <?php
                $fmatri = date('d/m/Y', strtotime(str_replace('/', '-', $regmatrimonio['fecha_matri'])));
              ?>
              <td class="text-center"><?php echo $fmatri; ?></td>
              <?php
                $registrospadrinos=mysqli_query($conexion,"SELECT cedula_pdr,cedula_mdr FROM padrinosboda WHERE codigo_per='$codigoper' AND codigo_per2='$regmatrimonio2[codigo_per2]'");
                $regpadrinos=mysqli_fetch_array($registrospadrinos);
                $registrostestigos=mysqli_query($conexion,"SELECT * FROM padrino,madrina WHERE cedula_pdr='$regpadrinos[cedula_pdr]' AND cedula_mdr='$regpadrinos[cedula_mdr]'");
                $regtestigos=mysqli_fetch_array($registrostestigos);
              ?>
              <td class="text-center"><?php echo $regtestigos['nombre_pdr'].' '.$regtestigos['apellido_pdr'].' y '.$regtestigos['nombre_mdr'].' '.$regtestigos['apellido_mdr']; ?></td>
              <?php
                $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regmatrimonio[codigo_min]'");
                $regministro=mysqli_fetch_array($registrosministro);
              ?>
              <td class="text-center"><?php echo $regministro['ministro_min']; ?></td>             
            </tr>
          </table>
        </div>
        <div class="row">
          <div align="center" class="col-sm-12">
            <br>
            <a href="editar-matrimonio.php?cod=<?php echo $regmatrimonio['codigo_matri']; ?>"><input type="buttom" class="btn btn-primary" name="modificar" Value="Modificar"></a>
            <a href="constancia-matrimonio.php?cod=<?php echo $regmatrimonio['codigo_matri']; ?>"><input type="buttom" class="btn btn-primary" name="imprimir" Value="Imprimir"></a>
          </div>
        </div>
<?php
      }
      else
      {
        $registrosmatrimonio=mysqli_query($conexion,"SELECT * FROM matrimonio WHERE codigo_per2=$codigoper");
        if($regmatrimonio=mysqli_fetch_array($registrosmatrimonio))
        {
?>
          <br>
          <br>
          <div class="table-responsive" id="tablaced">
            <table class="table table-bordered" id="tabla_ced">
              <tr>
                <th class="text-center">N°</th>
                <th class="text-center">Esposo</th>
                <th class="text-center">Esposa</th>
                <th class="text-center">Fecha de Matrimonio</th>
                <th class="text-center">Testigos</th>
                <th class="text-center">Ministro</th>
              </tr>
              <tr>
                <td class="text-center"><?php echo 1; ?></td>
                <?php
                  $registrosmatrimonio2=mysqli_query($conexion,"SELECT codigo_per FROM matrimonio WHERE codigo_per2=$codigoper");
                  $regmatrimonio2=mysqli_fetch_array($registrosmatrimonio2);
                  $registrosesposo=mysqli_query($conexion,"SELECT nombre_per,apellido_per FROM personas WHERE codigo_per='$regmatrimonio2[codigo_per]'");
                  $regesposo=mysqli_fetch_array($registrosesposo);
                ?>
                <td class="text-center"><?php echo $regesposo['nombre_per'].' '.$regesposo['apellido_per']; ?></td>
                <td class="text-center"><?php echo $reg['nombre_per'].' '.$reg['apellido_per']; ?></td> 
                <?php
                  $fmatri = date('d/m/Y', strtotime(str_replace('/', '-', $regmatrimonio['fecha_matri'])));
                ?>       
                <td class="text-center"><?php echo $fmatri; ?></td>  
                <?php
                  $registrospadrinos=mysqli_query($conexion,"SELECT cedula_pdr,cedula_mdr FROM padrinosboda WHERE codigo_per2='$codigoper' AND codigo_per='$regmatrimonio2[codigo_per]'");
                  $regpadrinos=mysqli_fetch_array($registrospadrinos);
                  $registrostestigos=mysqli_query($conexion,"SELECT * FROM padrino,madrina WHERE cedula_pdr='$regpadrinos[cedula_pdr]' AND cedula_mdr='$regpadrinos[cedula_mdr]'");
                  $regtestigos=mysqli_fetch_array($registrostestigos);
                ?>    
                <td class="text-center"><?php echo $regtestigos['nombre_pdr'].' '.$regtestigos['apellido_pdr'].' y '.$regtestigos['nombre_mdr'].' '.$regtestigos['apellido_mdr']; ?></td>
                <?php
                  $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regmatrimonio[codigo_min]'");
                  $regministro=mysqli_fetch_array($registrosministro);
                ?>
                <td class="text-center"><?php echo $regministro['ministro_min']; ?></td>             
              </tr>
            </table>
          </div>
          <div class="row">
            <div align="center" class="col-sm-12">
              <br>
              <a href="editar-matrimonio.php?cod=<?php echo $regmatrimonio['codigo_matri']; ?>"><input type="buttom" class="btn btn-primary" name="modificar" Value="Modificar"></a>
              <a href="constancia-matrimonio.php?cod=<?php echo $regmatrimonio['codigo_matri']; ?>"><input type="buttom" class="btn btn-primary" name="imprimir" Value="Imprimir"></a>
            </div>
          </div>
<?php
        }
        else
        {
          echo '<h6 align="center" class="alerta"> No existe matrimonio correspondiente a la "Cédula" ingresada </h6>';
        }
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> La "Cédula" Ingresada no está registrada </h6>';
    }
  }
  if(($bandera==1) and ($consulta=='matrinom'))
  {
    $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE (nombre_per LIKE '%".$_POST['nom']."%') AND (apellido_per like '%".$_POST['ap']."%')");
    @$num_resultados=mysqli_num_rows($registros);
    if($num_resultados>0)
    {
      $inc=0;
      $incre=0;
      
      for($i=0;$i<$num_resultados;$i++)
      { 
        $reg=mysqli_fetch_array($registros);
        $registrosmatrimonio=mysqli_query($conexion,"SELECT * FROM matrimonio WHERE codigo_per='$reg[codigo_per]'");
        if($regmatrimonio=mysqli_fetch_array($registrosmatrimonio))
        {
          $matrimonios[$inc]=$regmatrimonio['codigo_per'];
          $inc++;
        }
        $registrosmatrimonio2=mysqli_query($conexion,"SELECT * FROM matrimonio WHERE codigo_per2='$reg[codigo_per]'");
        if($regmatrimonio2=mysqli_fetch_array($registrosmatrimonio2))
        {
          $matrimoniosesp[$incre]=$regmatrimonio2['codigo_per2'];
          $incre++;
        }
      }
      if(($inc>0) or ($incre>0))
      {
?>
        <br><br>
        <div class="table-responsive" id="tablanom">
          <table class="table table-bordered" id="tabla_nom">
            <tr>
              <th class="text-center">N°</th>
              <th class="text-center">Esposo</th>
              <th class="text-center">Esposa</th>
              <th class="text-center">Fecha de Matrimonio</th>
              <th class="text-center">Testigos</th>
              <th class="text-center">Ministro</th>
            </tr>
<?php
            for($i=0;$i<$inc;$i++)
            {
              $registrospersonas=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$matrimonios[$i]'");
              $regpersonas=mysqli_fetch_array($registrospersonas)or die(mysqli_error());    
?>
              <tr>
                <?php
                  $registrosmatri=mysqli_query($conexion,"SELECT * FROM matrimonio WHERE codigo_per='$matrimonios[$i]'");
                  $regmatri=mysqli_fetch_array($registrosmatri);
                ?>
                <td class="text-center"><?php echo $i+1; ?></td>
                <td class="text-center"><?php echo $regpersonas['nombre_per'].' '.$regpersonas['apellido_per']; ?></td>
                <?php
                  $registrosesposa=mysqli_query($conexion,"SELECT nombre_per,apellido_per FROM personas WHERE codigo_per='$regmatri[codigo_per2]'");
                  $regesposa=mysqli_fetch_array($registrosesposa);
                ?>
                <td class="text-center"><?php echo $regesposa['nombre_per'].' '.$regesposa['apellido_per']; ?></td>
                <?php 
                  $fmatri = date('d/m/Y', strtotime(str_replace('/', '-', $regmatri['fecha_matri'])));
                ?>
                <td class="text-center"><?php echo $fmatri; ?></td>
                <?php
                  $registrospadrinos=mysqli_query($conexion,"SELECT * FROM padrinosboda WHERE codigo_per='$matrimonios[$i]'");
                  $regpadrinos=mysqli_fetch_array($registrospadrinos);
                  $registrostestigos=mysqli_query($conexion,"SELECT * FROM padrino,madrina WHERE cedula_pdr='$regpadrinos[cedula_pdr]' AND cedula_mdr='$regpadrinos[cedula_mdr]'");
                  $regtestigos=mysqli_fetch_array($registrostestigos);
                ?>
                <td class="text-center"><?php echo $regtestigos['nombre_pdr'].' '.$regtestigos['apellido_pdr'].' y '.$regtestigos['nombre_mdr'].' '.$regtestigos['apellido_mdr']; ?></td>
                <?php
                  $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regmatri[codigo_min]'");
                  $regministro=mysqli_fetch_array($registrosministro);
                ?>
                <td class="text-center"><?php echo $regministro['ministro_min']; ?></td>
                <td class="text-center"><a href="editar-matrimonio.php?cod=<?php echo $regmatri['codigo_matri']; ?>">Modificar</a></td>
                <td class="text-center"><a href="constancia-matrimonio.php?cod=<?php echo $regmatri['codigo_matri']; ?>">Imprimir</a></td>
              </tr>
<?php
            }
            for($e=0;$e<$incre;$e++)
            {
              $registrospersonas2=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$matrimoniosesp[$e]'")or die(mysqli_error());
              $regpersonas2=mysqli_fetch_array($registrospersonas2)or die(mysqli_error());    
?>
              <tr>
                <?php
                  $registrosmatri2=mysqli_query($conexion,"SELECT * FROM matrimonio WHERE codigo_per2='$matrimoniosesp[$e]'");
                  $regmatri2=mysqli_fetch_array($registrosmatri2);
                ?>
                <td class="text-center"><?php echo $e+$i+1; ?></td>
                <?php
                  $registrosesposo=mysqli_query($conexion,"SELECT nombre_per,apellido_per FROM personas WHERE codigo_per='$regmatri2[codigo_per]'");
                  $regesposo=mysqli_fetch_array($registrosesposo);
                ?>
                <td class="text-center"><?php echo $regesposo['nombre_per'].' '.$regesposo['apellido_per']; ?></td>
                <td class="text-center"><?php echo $regpersonas2['nombre_per'].' '.$regpersonas2['apellido_per']; ?></td>
                <?php 
                  $fmatri = date('d/m/Y', strtotime(str_replace('/', '-', $regmatri2['fecha_matri'])));
                ?>
                <td class="text-center"><?php echo $fmatri; ?></td>
                <?php
                  $registrospadrinos2=mysqli_query($conexion,"SELECT * FROM padrinosboda WHERE codigo_per2='$matrimoniosesp[$e]'");
                  $regpadrinos2=mysqli_fetch_array($registrospadrinos2);
                  $registrostestigos2=mysqli_query($conexion,"SELECT * FROM padrino,madrina WHERE cedula_pdr='$regpadrinos2[cedula_pdr]' AND cedula_mdr='$regpadrinos2[cedula_mdr]'");
                  $regtestigos2=mysqli_fetch_array($registrostestigos2);
                ?>
                <td class="text-center"><?php echo $regtestigos2['nombre_pdr'].' '.$regtestigos2['apellido_pdr'].' y '.$regtestigos2['nombre_mdr'].' '.$regtestigos2['apellido_mdr']; ?></td>
                <?php
                  $registrosministro2=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regmatri2[codigo_min]'");
                  $regministro2=mysqli_fetch_array($registrosministro2);
                ?>
                <td class="text-center"><?php echo $regministro2['ministro_min']; ?></td>
                <td class="text-center"><a href="editar-matrimonio.php?cod=<?php echo $regmatri2['codigo_matri']; ?>">Modificar</a></td>
                <td class="text-center"><a href="constancia-matrimonio.php?cod=<?php echo $regmatri2['codigo_matri']; ?>">Imprimir</a></td>
              </tr>
<?php
            }
?>
          </table>
        </div>
<?php
      }
      else
      {
        echo '<h6 align="center" class="alerta"> No existen registros </h6>';
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No existen registros </h6>';
    } 
  }
  if(($bandera==1) and ($consulta=='matrifecha'))
  {

    $fmatri = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechamatri'])));

    $registrosmatrimonio=mysqli_query($conexion,"SELECT * FROM matrimonio WHERE fecha_matri='$fmatri'") or die(mysqli_error());
    @$num_resultados_matrimonio=mysqli_num_rows($registrosmatrimonio);
    if($num_resultados_matrimonio>0)
    {
      $inc=0;
      for($i=0;$i<$num_resultados_matrimonio;$i++)
      { 
        $regmatrimonio=mysqli_fetch_array($registrosmatrimonio);
        $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$regmatrimonio[codigo_per]'") or die(mysqli_error());
        if($reg=mysqli_fetch_array($registros))
        {
          $matrimonios[$inc]=$reg['codigo_per'];
          $inc++;
        }
      }
      if($inc>0)
      {
?>
        <br><br>
        <div class="table-responsive" id="tablafecha">
          <table class="table table-bordered" id="tabla_fecha">
            <tr>
              <th class="text-center">N°</th>
              <th class="text-center">Esposo</th>
              <th class="text-center">Esposa</th>
              <th class="text-center">Fecha de Matrimonio</th>
              <th class="text-center">Testigos</th>
              <th class="text-center">Ministro</th>
            </tr>
<?php
            for($i=0;$i<$inc;$i++)
            {
              $registrospersonas=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$matrimonios[$i]'");
              $regpersonas=mysqli_fetch_array($registrospersonas)or die(mysqli_error());    
?>
              <tr>
                <?php
                  $registrosmatri=mysqli_query($conexion,"SELECT * FROM matrimonio WHERE codigo_per='$matrimonios[$i]'");
                  $regmatri=mysqli_fetch_array($registrosmatri);
                  $fmatri = date('d/m/Y', strtotime(str_replace('/', '-', $regmatri['fecha_matri'])));
                ?>
                <td class="text-center"><?php echo $i+1; ?></td>
                <td class="text-center"><?php echo $regpersonas['nombre_per'].' '.$regpersonas['apellido_per']; ?></td>
                <?php
                  $registrosesposa=mysqli_query($conexion,"SELECT nombre_per,apellido_per FROM personas WHERE codigo_per='$regmatri[codigo_per2]'");
                  $regesposa=mysqli_fetch_array($registrosesposa);
                ?>
                <td class="text-center"><?php echo $regesposa['nombre_per'].' '.$regesposa['apellido_per']; ?></td>
                <td class="text-center"><?php echo $fmatri; ?></td>
                <?php
                  $registrospadrinos=mysqli_query($conexion,"SELECT * FROM padrinosboda WHERE codigo_per='$matrimonios[$i]'");
                  $regpadrinos=mysqli_fetch_array($registrospadrinos);
                  $registrostestigos=mysqli_query($conexion,"SELECT * FROM padrino,madrina WHERE cedula_pdr='$regpadrinos[cedula_pdr]' AND cedula_mdr='$regpadrinos[cedula_mdr]'");
                  $regtestigos=mysqli_fetch_array($registrostestigos);
                ?>
                <td class="text-center"><?php echo $regtestigos['nombre_pdr'].' '.$regtestigos['apellido_pdr'].' y '.$regtestigos['nombre_mdr'].' '.$regtestigos['apellido_mdr']; ?></td>
                <?php
                  $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regmatri[codigo_min]'");
                  $regministro=mysqli_fetch_array($registrosministro);
                ?>
                <td class="text-center"><?php echo $regministro['ministro_min']; ?></td>
                <td class="text-center"><a href="editar-matrimonio.php?cod=<?php echo $regmatri['codigo_matri']; ?>">Modificar</a></td>
                <td class="text-center"><a href="constancia-matrimonio.php?cod=<?php echo $regmatri['codigo_matri']; ?>">Imprimir</a></td>
              </tr>
<?php
            }
?>
          </table>
        </div>
<?php
      }
      else
      {
        echo '<h6 align="center" class="alerta"> No existen registros </h6>';
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> No existen registros </h6>';
    }
  }
}
function validaredicionmatri()
{
  if(isset($_POST['editmatri']))
  {
    $flag=1;
    if((isset($_POST['cedula'])) and (trim($_POST['cedula'])!=""))
    {
      if(!(filter_var($_POST['cedula'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
        $flag=0;
      }
    }
    if((isset($_POST['cedulapadre'])) and (trim($_POST['cedulapadre'])!=""))
    {
      if(!(filter_var($_POST['cedulapadre'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula del Padre" acepta solo números</h6>';
        $flag=0;
      }
    }
    if((isset($_POST['cedulamadre'])) and (trim($_POST['cedulamadre'])!=""))
    {
      if(!(filter_var($_POST['cedulamadre'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula de la Madre" acepta solo números</h6>';
        $flag=0;
      }
    }
    if((isset($_POST['cedulaesp'])) and (trim($_POST['cedulaesp'])!=""))
    {
      if(!(filter_var($_POST['cedulaesp'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula" acepta solo números</h6>';
        $flag=0;
      }
    }
    if((isset($_POST['cedulapadreesp'])) and (trim($_POST['cedulapadreesp'])!=""))
    {
      if(!(filter_var($_POST['cedulapadreesp'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula del Padre" acepta solo números</h6>';
        $flag=0;
      }
    }
    if((isset($_POST['cedulamadreesp'])) and (trim($_POST['cedulamadreesp'])!=""))
    {
      if(!(filter_var($_POST['cedulamadreesp'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula de la Madre" acepta solo números</h6>';
        $flag=0;
      }
    }
    if((isset($_POST['cedulapadrino'])) and (trim($_POST['cedulapadrino'])!=""))
    {
      if(!(filter_var($_POST['cedulapadrino'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula del Padrino" acepta solo números</h6>';
        $flag=0;
      }
    }
    if((isset($_POST['cedulamadrina'])) and (trim($_POST['cedulamadrina'])!=""))
    {
      if(!(filter_var($_POST['cedulapadrino'], FILTER_VALIDATE_INT)))
      {
        echo '<h6 align="center" class="alerta"> El campo "Cédula de la Madrina" acepta solo números</h6>';
        $flag=0;
      }
    }
    if(($_POST['ministro']=="") and (trim($_POST['otroministro'])=="Otro..."))
    {
      echo '<h6 align="center" class="alerta"> Debe seleccionar "Ministro" o ingresar uno nuevo </h6>';
      $flag= 0;
    }
    editarmatri($flag);
  } 
}

function editarmatri($bandera)
{
  include("../php/conexion.php");
  if($bandera==1)
  {
    if(isset($_POST['nombre']) and (trim($_POST['nombre'])!="") and (isset($_POST['apellido'])) and (trim($_POST['apellido'])!="") and (isset($_POST['fechanac'])) and (trim($_POST['fechanac'])!="") and (isset($_POST['edad'])) and (trim($_POST['edad'])!="") and (isset($_POST['lugarnac'])) and (trim($_POST['lugarnac'])!="") and (isset($_POST['estado'])) and (trim($_POST['estado'])!="") and (isset($_POST['domicilio'])) and (trim($_POST['domicilio'])!="") and (isset($_POST['cedulapadre'])) and (trim($_POST['cedulapadre'])!="") and (isset($_POST['nombrepadre'])) and (trim($_POST['nombrepadre'])!="") and (isset($_POST['apellidopadre'])) and (trim($_POST['apellidopadre'])!="") and (isset($_POST['cedulamadre'])) and (trim($_POST['cedulamadre'])!="") and (isset($_POST['nombremadre'])) and (trim($_POST['nombremadre'])!="") and (isset($_POST['apellidomadre'])) and (trim($_POST['apellidomadre'])!="") and (isset($_POST['filiacion'])) and (trim($_POST['filiacion'])!="") and (isset($_POST['nombreesp'])) and (trim($_POST['nombreesp'])!="") and (isset($_POST['apellidoesp'])) and (trim($_POST['apellidoesp'])!="") and (isset($_POST['fechanacesp'])) and (trim($_POST['fechanacesp'])!="") and (isset($_POST['edadesp'])) and (trim($_POST['edadesp'])!="") and (isset($_POST['lugarnacesp'])) and (trim($_POST['lugarnacesp'])!="") and (isset($_POST['estadoesp'])) and (trim($_POST['estadoesp'])!="") and (isset($_POST['domicilioesp'])) and (trim($_POST['domicilioesp'])!="") and (isset($_POST['cedulapadreesp'])) and (trim($_POST['cedulapadreesp'])!="") and (isset($_POST['nombrepadreesp'])) and (trim($_POST['nombrepadreesp'])!="") and (isset($_POST['apellidopadreesp'])) and (trim($_POST['apellidopadreesp'])!="") and (isset($_POST['cedulamadreesp'])) and (trim($_POST['cedulamadreesp'])!="") and (isset($_POST['nombremadreesp'])) and (trim($_POST['nombremadreesp'])!="") and (isset($_POST['apellidomadreesp'])) and (trim($_POST['apellidomadreesp'])!="") and (isset($_POST['filiacionesp'])) and (trim($_POST['filiacionesp'])!="") and (isset($_POST['cedulapadrino'])) and (trim($_POST['cedulapadrino'])!="") and (isset($_POST['nombrepadrino'])) and (trim($_POST['nombrepadrino'])!="") and (isset($_POST['apellidopadrino'])) and (trim($_POST['apellidopadrino'])!="") and (isset($_POST['cedulamadrina'])) and (trim($_POST['cedulamadrina'])!="") and (isset($_POST['nombremadrina'])) and (trim($_POST['nombremadrina'])!="") and (isset($_POST['apellidomadrina'])) and (trim($_POST['apellidomadrina'])!="") and (isset($_POST['fmatrimonio'])) and (trim($_POST['fmatrimonio'])!=""))
    {
      $fnac = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanac'])));
      $fnacesp = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanacesp'])));

      $control=1;
      $registrosmatrimonio=mysqli_query($conexion,"SELECT * FROM matrimonio WHERE codigo_matri=$_POST[codigo]");
      $regmatrimonio=mysqli_fetch_array($registrosmatrimonio);

      if(isset($_POST['cedula']) AND (trim($_POST['cedula'])!=""))
      {
        $registros=mysqli_query($conexion,"SELECT cedula_per FROM personas WHERE cedula_per=$_POST[cedula] AND codigo_per<>$regmatrimonio[codigo_per]");
        @$num_filas=mysqli_num_rows($registros);
        if($num_filas>0)
        {
          echo '<h6 align="center" class="alerta"> Ya existe un registro correspondiente a la "Cédula del Esposo" ingresada </h6>';
          $control=0;
        }
        else
        {
          if(isset($_POST['cedulaesp']) AND (trim($_POST['cedulaesp'])!=""))
          {
            $registros2=mysqli_query($conexion,"SELECT cedula_per FROM personas WHERE cedula_per=$_POST[cedulaesp] AND codigo_per<>$regmatrimonio[codigo_per2]");
            @$num_filas=mysqli_num_rows($registros);
            if($num_filas>0)
            {
              echo '<h6 align="center" class="alerta"> Ya existe un registro correspondiente a la "Cédula de la Esposa" ingresada </h6>';
              $control=0;
            }
            else
            {
              mysqli_query($conexion,"UPDATE personas SET cedula_per='$_POST[cedula]',nombre_per='$_POST[nombre]',apellido_per='$_POST[apellido]',fechanac_per='$fnac',edad_per='$_POST[edad]',lugarnac_per='$_POST[lugarnac]',estadodir_per='$_POST[estado]',direccion_per='$_POST[domicilio]' WHERE codigo_per='$regmatrimonio[codigo_per]'");
              mysqli_query($conexion,"UPDATE personas SET cedula_per='$_POST[cedulaesp]',nombre_per='$_POST[nombreesp]',apellido_per='$_POST[apellidoesp]',fechanac_per='$fnacesp',edad_per='$_POST[edadesp]',lugarnac_per='$_POST[lugarnacesp]',estadodir_per='$_POST[estadoesp]',direccion_per='$_POST[domicilioesp]' WHERE codigo_per='$regmatrimonio[codigo_per2]'");
            }
          }
          else
          {
            mysqli_query($conexion,"UPDATE personas SET cedula_per='$_POST[cedula]',nombre_per='$_POST[nombre]',apellido_per='$_POST[apellido]',fechanac_per='$fnac',edad_per='$_POST[edad]',lugarnac_per='$_POST[lugarnac]',estadodir_per='$_POST[estado]',direccion_per='$_POST[domicilio]' WHERE codigo_per='$regmatrimonio[codigo_per]'");
            mysqli_query($conexion,"UPDATE personas SET nombre_per='$_POST[nombreesp]',apellido_per='$_POST[apellidoesp]',fechanac_per='$fnacesp',edad_per='$_POST[edadesp]',lugarnac_per='$_POST[lugarnacesp]',estadodir_per='$_POST[estadoesp]',direccion_per='$_POST[domicilioesp]' WHERE codigo_per='$regmatrimonio[codigo_per2]'");
          }
        }
      }
      else
      {
        if(isset($_POST['cedulaesp']) AND (trim($_POST['cedulaesp'])!=""))
        {
          $registros2=mysqli_query($conexion,"SELECT cedula_per FROM personas WHERE cedula_per=$_POST[cedulaesp] AND codigo_per<>$regmatrimonio[codigo_per2]");
          @$num_filas=mysqli_num_rows($registros);
          if($num_filas>0)
          {
            echo '<h6 align="center" class="alerta"> Ya existe un registro correspondiente a la "Cédula de la Esposa" ingresada </h6>';
            $control=0;
          }
          else
          {
            mysqli_query($conexion,"UPDATE personas SET nombre_per='$_POST[nombre]',apellido_per='$_POST[apellido]',fechanac_per='$fnac',edad_per='$_POST[edad]',lugarnac_per='$_POST[lugarnac]',estadodir_per='$_POST[estado]',direccion_per='$_POST[domicilio]' WHERE codigo_per='$regmatrimonio[codigo_per]'");
            mysqli_query($conexion,"UPDATE personas SET cedula_per='$_POST[cedulaesp]',nombre_per='$_POST[nombreesp]',apellido_per='$_POST[apellidoesp]',fechanac_per='$fnacesp',edad_per='$_POST[edadesp]',lugarnac_per='$_POST[lugarnacesp]',estadodir_per='$_POST[estadoesp]',direccion_per='$_POST[domicilioesp]' WHERE codigo_per='$regmatrimonio[codigo_per2]'");
          }
        }
        else
        {
          mysqli_query($conexion,"UPDATE personas SET nombre_per='$_POST[nombre]',apellido_per='$_POST[apellido]',fechanac_per='$fnac',edad_per='$_POST[edad]',lugarnac_per='$_POST[lugarnac]',estadodir_per='$_POST[estado]',direccion_per='$_POST[domicilio]' WHERE codigo_per='$regmatrimonio[codigo_per]'");
          mysqli_query($conexion,"UPDATE personas SET nombre_per='$_POST[nombreesp]',apellido_per='$_POST[apellidoesp]',fechanac_per='$fnacesp',edad_per='$_POST[edadesp]',lugarnac_per='$_POST[lugarnacesp]',estadodir_per='$_POST[estadoesp]',direccion_per='$_POST[domicilioesp]' WHERE codigo_per='$regmatrimonio[codigo_per2]'");
        }
      }
      if($control==1)
      {
        $fmatri = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fmatrimonio'])));

        $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$regmatrimonio[codigo_per]'");
        @$num_resultados_padper=mysqli_num_rows($registrospadper);
        if($num_resultados_padper==0)
        {
          $registrospadre=mysqli_query($conexion,"SELECT * FROM padre WHERE cedula_pad='$_POST[cedulapadre]'");
          @$num_resultados_padre=mysqli_num_rows($registrospadre);
          if($num_resultados_padre==0)
          {
            mysqli_query($conexion,"INSERT INTO padre(cedula_pad,nombre_pad,apellido_pad) VALUES ('$_POST[cedulapadre]','$_POST[nombrepadre]','$_POST[apellidopadre]')");
          }
          else
          {
            mysqli_query($conexion,"UPDATE padre SET nombre_pad='$_POST[nombrepadre]',apellido_pad='$_POST[apellidopadre]' WHERE cedula_pad='$_POST[cedulapadre]'");
          }        

          $registrosmadre=mysqli_query($conexion,"SELECT * FROM madre WHERE cedula_mad='$_POST[cedulamadre]'");
          @$num_resultados_madre=mysqli_num_rows($registrosmadre);
          if($num_resultados_madre==0)
          {
            mysqli_query($conexion,"INSERT INTO madre(cedula_mad,nombre_mad,apellido_mad) VALUES ('$_POST[cedulamadre]','$_POST[nombremadre]','$_POST[apellidomadre]')");
          }    
          else
          {
            mysqli_query($conexion,"UPDATE madre SET nombre_mad='$_POST[nombremadre]',apellido_mad='$_POST[apellidomadre]' WHERE cedula_mad='$_POST[cedulamadre]'");
          }        
          mysqli_query($conexion,"INSERT INTO padrespersona(codigo_per,cedula_pad,cedula_mad) VALUES ('$regmatrimonio[codigo_per]','$_POST[cedulapadre]','$_POST[cedulamadre]')") or die(mysqli_error());
        }
        else
        {
          mysqli_query($conexion,"UPDATE padrespersona SET cedula_pad='$_POST[cedulapadre]',cedula_mad='$_POST[cedulamadre]',filiacion='$_POST[filiacion]' WHERE codigo_per='$regmatrimonio[codigo_per]'") or die(mysqli_error());
          mysqli_query($conexion,"UPDATE padre SET nombre_pad='$_POST[nombrepadre]',apellido_pad='$_POST[apellidopadre]' WHERE cedula_pad='$_POST[cedulapadre]'") or die(mysqli_error());
          mysqli_query($conexion,"UPDATE madre SET nombre_mad='$_POST[nombremadre]',apellido_mad='$_POST[apellidomadre]' WHERE cedula_mad='$_POST[cedulamadre]'") or die(mysqli_error());
        }

        $registrospadperesp=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$regmatrimonio[codigo_per2]'");
        @$num_resultados_padperesp=mysqli_num_rows($registrospadperesp);
        if($num_resultados_padperesp==0)
        {
          $registrospadreesp=mysqli_query($conexion,"SELECT * FROM padre WHERE cedula_pad='$_POST[cedulapadreesp]'");
          @$num_resultados_padreesp=mysqli_num_rows($registrospadreesp);
          if($num_resultados_padreesp==0)
          {
            mysqli_query($conexion,"INSERT INTO padre(cedula_pad,nombre_pad,apellido_pad) VALUES ('$_POST[cedulapadreesp]','$_POST[nombrepadreesp]','$_POST[apellidopadreesp]')");
          }
          else
          {
            mysqli_query($conexion,"UPDATE padre SET nombre_pad='$_POST[nombrepadreesp]',apellido_pad='$_POST[apellidopadreesp]' WHERE cedula_pad='$_POST[cedulapadreesp]'");
          }        

          $registrosmadreesp=mysqli_query($conexion,"SELECT * FROM madre WHERE cedula_mad='$_POST[cedulamadreesp]'");
          @$num_resultados_madreesp=mysqli_num_rows($registrosmadreesp);
          if($num_resultados_madreesp==0)
          {
            mysqli_query($conexion,"INSERT INTO madre(cedula_mad,nombre_mad,apellido_mad) VALUES ('$_POST[cedulamadreesp]','$_POST[nombremadreesp]','$_POST[apellidomadreesp]')");
          }    
          else
          {
            mysqli_query($conexion,"UPDATE madre SET nombre_mad='$_POST[nombremadreesp]',apellido_mad='$_POST[apellidomadreesp]' WHERE cedula_mad='$_POST[cedulamadreesp]'");
          }        
          mysqli_query($conexion,"INSERT INTO padrespersona(codigo_per,cedula_pad,cedula_mad) VALUES ('$regmatrimonio[codigo_per2]','$_POST[cedulapadreesp]','$_POST[cedulamadreesp]')") or die(mysqli_error());
        }
        else
        {
          mysqli_query($conexion,"UPDATE padrespersona SET cedula_pad='$_POST[cedulapadreesp]',cedula_mad='$_POST[cedulamadreesp]',filiacion='$_POST[filiacionesp]' WHERE codigo_per='$regmatrimonio[codigo_per2]'") or die(mysqli_error());
          mysqli_query($conexion,"UPDATE padre SET nombre_pad='$_POST[nombrepadreesp]',apellido_pad='$_POST[apellidopadreesp]' WHERE cedula_pad='$_POST[cedulapadreesp]'") or die(mysqli_error());
          mysqli_query($conexion,"UPDATE madre SET nombre_mad='$_POST[nombremadreesp]',apellido_mad='$_POST[apellidomadreesp]' WHERE cedula_mad='$_POST[cedulamadreesp]'") or die(mysqli_error());
        }
        $registrospdrmatri=mysqli_query($conexion,"SELECT * FROM padrinosboda WHERE codigo_per='$regmatrimonio[codigo_per]' OR codigo_per2='$regmatrimonio[codigo_per2]'");
        @$num_resultados_pdrmatri=mysqli_num_rows($registrospdrmatri);
        if($num_resultados_pdrmatri==0)
        {
          $registrospadrino=mysqli_query($conexion,"SELECT * FROM padrino WHERE cedula_pdr='$_POST[cedulapadrino]'");
          @$num_resultados_padrino=mysqli_num_rows($registrospadrino);
          if($num_resultados_padrino==0)
          {
            mysqli_query($conexion,"INSERT INTO padrino(cedula_pdr,nombre_pdr,apellido_pdr) VALUES ('$_POST[cedulapadrino]','$_POST[nombrepadrino]','$_POST[apellidopadrino]')");
          }
          else
          {
            mysqli_query($conexion,"UPDATE padrino SET nombre_pdr='$_POST[nombrepadrino]',apellido_pdr='$_POST[apellidopadrino]' WHERE cedula_pdr='$_POST[cedulapadrino]'") or die(mysqli_error());
          }
          $registrosmadrina=mysqli_query($conexion,"SELECT * FROM madrina WHERE cedula_mdr='$_POST[cedulamadrina]'");
          @$num_resultados_madrina=mysqli_num_rows($registrosmadrina);
          if($num_resultados_madrina==0)
          {
            mysqli_query($conexion,"INSERT INTO madrina(cedula_mdr,nombre_mdr,apellido_mdr) VALUES ('$_POST[cedulamadrina]','$_POST[nombremadrina]','$_POST[apellidomadrina]')");
          } 
          else
          {
            mysqli_query($conexion,"UPDATE madrina SET nombre_mdr='$_POST[nombremadrina]',apellido_mdr='$_POST[apellidomadrina]' WHERE cedula_mdr='$_POST[cedulamadrina]'") or die(mysqli_error());
          }           
          mysqli_query($conexion,"INSERT INTO padrinosboda(codigo_per,codigo_per2,cedula_pdr,cedula_mdr) VALUES ('$regmatrimonio[codigo_per]','$regmatrimonio[codigo_per2]','$_POST[cedulapadrino]','$_POST[cedulamadrina]')") or die(mysqli_error());
        }
        else
        {
          mysqli_query($conexion,"UPDATE padrinosboda SET cedula_pdr='$_POST[cedulapadrino]' WHERE codigo_per='$regmatrimonio[codigo_per]' OR codigo_per2='$regmatrimonio[codigo_per2]'") or die(mysqli_error());
          mysqli_query($conexion,"UPDATE padrino SET nombre_pdr='$_POST[nombrepadrino]',apellido_pdr='$_POST[apellidopadrino]' WHERE cedula_pdr='$_POST[cedulapadrino]'") or die(mysqli_error());
          mysqli_query($conexion,"UPDATE madrina SET nombre_mdr='$_POST[nombremadrina]',apellido_mdr='$_POST[apellidomadrina]' WHERE cedula_mdr='$_POST[cedulamadrina]'") or die(mysqli_error());        
        }
        if((isset($_POST['otroministro'])) and (trim($_POST['otroministro']!=""))) 
        {
          $registros=mysqli_query($conexion,"SELECT codigo_min FROM ministro ORDER BY codigo_min DESC LIMIT 1");
          if($reg=mysqli_fetch_array($registros))
          {
            $maximoid=$reg['codigo_min'];
            $id_ministro=$maximoid+1;
            mysqli_query($conexion,"INSERT INTO ministro(ministro_min) VALUES ('$_POST[otroministro]')");
          }
        }
        else
        {
          $id_ministro=$_POST['ministro'];
        }
        mysqli_query($conexion,"UPDATE matrimonio SET codigo_min=$id_ministro,codigo_per='$regmatrimonio[codigo_per]',codigo_per2='$regmatrimonio[codigo_per2]',proclamas='$_POST[proclamas]',dispensas='$_POST[dispensas]',fecha_matri='$fmatri',sacramentos='$_POST[sacramentos]',observacion_matri='$_POST[observaciones]' WHERE codigo_per='$regmatrimonio[codigo_per]' OR codigo_per2='$regmatrimonio[codigo_per2]'");
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*) </h6>';
    }
  }
}
function validacionimpbau()
{
  $flag=0;
  if(isset($_POST['FeImp']))
  {
    if(!(isset($_POST['fines']) and (trim($_POST['fines'])!="")))
    {
      $flag=1;
    }
    else
    {
      $flag=2;
    }
    return $flag;
  }
  if(isset($_POST['ConsImp']))
  {
    $flag=3;
    return $flag;
  }
  if(isset($_POST['CertiImp']))
  {
    $flag=4;
    return $flag;
  }
}

function registrarnoti()
{
  include("conexion.php");
  if(isset($_POST['regnoti']))
  {
    if(isset($_POST['titulo']) and (trim($_POST['titulo'])!="") and (isset($_POST['descripcion'])) and (trim($_POST['descripcion'])!="") and (isset($_POST['noticia'])) and ($_POST['noticia']!="") and (isset($_POST['autor'])) and (trim($_POST['autor'])!=""))
    {
      $fnoti = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fecha'])));
      if(is_uploaded_file($_FILES['imagen']['tmp_name']))
      {
        $imagen=$_FILES['imagen']['tmp_name'];
        $nombreimagen=$_FILES['imagen']['name'];
        $ruta="images/".$nombreimagen;
        if(($_FILES['imagen']['type'] == "image/jpeg" )or($_FILES['imagen']['type'] == "image/png" )or($_FILES['imagen']['type']== "image/gif" ))
        {
          if(move_uploaded_file($imagen, '../'.$ruta))
          {
            mysqli_query($conexion,"INSERT INTO noticias(nombre_noticia,descripcion,fecha_noticia,autor,contenido,rutaimagen) VALUES ('$_POST[titulo]','$_POST[descripcion]','$fnoti','$_POST[autor]','$_POST[noticia]','$ruta')") or die(mysqli_error());
          }
        }
      }
      else
      {
        mysqli_query($conexion,"INSERT INTO noticias(nombre_noticia,descripcion,fecha_noticia,autor,contenido) VALUES ('$_POST[titulo]','$_POST[descripcion]','$fnoti','$_POST[autor]','$_POST[noticia]')") or die(mysqli_error());
      }
    }
    else
    {
      echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*) </h6>';
    }
  }
}

function registrousuario()
{
  include("../php/conexion.php");
  if(isset($_POST['user']) and (trim($_POST['user'])!="") and (isset($_POST['password'])) and (trim($_POST['password'])!="") and (isset($_POST['password_conf'])) and ($_POST['password_conf']!="") and (isset($_POST['nombapell'])) and (trim($_POST['nombapell'])!="") and ($_POST['grado']>0))
  {
    if($_POST['password']!=$_POST['password_conf'])
    {
      echo '<h6 align="center" class="alerta"> Las contraseñas ingresadas no coinciden </h6>';
    }
    else
    {
      $registrosusuarios=mysqli_query($conexion,"SELECT usuario_nombre FROM usuarios WHERE usuario_nombre='$_POST[user]'");
      if(mysqli_num_rows($registrosusuarios)>0)
      {
        echo '<h6 align="center" class="alerta"> El nombre de usuario ya se ha registrado anteriormente </h6>';
      }
      else
      {
        $clave=md5($_POST['password']);
        mysqli_query($conexion,"INSERT INTO usuarios(usuario_nombre, usuario_clave, usuario_nombapell, usuario_grado, usuario_freg) VALUES ('$_POST[user]', '$clave', '$_POST[nombapell]', '$_POST[grado]', NOW())");
      }
    }
  }
  else
  {
    echo '<h6 align="center" class="alerta"> Debe llenar los campos obligatorios identificados con un asterisco (*) </h6>';
  }
}

function cambiocontrasena()
{
  include("../php/conexion.php");
  if(isset($_POST['password']) and (trim($_POST['password'])!="") and (isset($_POST['password_conf'])) and ($_POST['password_conf']!=""))
  {
    if($_POST['password']!=$_POST['password_conf'])
    {
      echo '<h6 align="center" class="alerta"> Las contraseñas ingresadas no coinciden </h6>';
    }
    else
    {
      $clave=md5($_POST['password']);
      mysqli_query($conexion,"UPDATE usuarios SET usuario_clave='$clave' WHERE usuario_nombre='$_SESSION[usuario_nombre]'");
    }
  }
  else
  {
    echo '<h6 align="center" class="alerta"> No se han ingresado datos </h6>';
  }
}

function indice()
{
  if(isset($_POST['indi']))
  {
    include("../php/conexion.php");
    $registros=mysqli_query($conexion,"SELECT personas.nombre_per,personas.apellido_per,bautizo.folio_bau FROM personas INNER JOIN bautizo ON bautizo.codigo_per=personas.codigo_per WHERE bautizo.libro_bau='$_GET[libro]' AND personas.apellido_per LIKE '$_POST[letra]%' ORDER BY apellido_per ASC") or die(mysqli_error());
    $flag=0;
    while($reg=mysqli_fetch_array($registros))
    {
      $flag=1;
?> 
      <div class="col-sm-1"></div>
      <div class="col-sm-5">
          <h5 class="glyphicon glyphicon-minus"><a href="boletasbautizo.php?libro=<?php echo $_GET['libro'].'&folio='.$reg['folio_bau']; ?>" target="_blank"><b><?php echo mb_strtoupper($reg['apellido_per'],'utf-8').' '.mb_strtoupper($reg['nombre_per'],'utf-8'); ?></b></a></h5>
      </div>
<?php
    }
    if($flag==0)
    {
?>
      <br>
      <h6 align="center" class="alerta">No hay registros con la letra <?php echo $_POST['letra']; ?></h6>
<?php
    }
  }
}
?>