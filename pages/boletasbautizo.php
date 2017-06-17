<?php 
  session_start();
  require('../php/conexion.php');
  require('../php/fpdf.php');
  include('../php/libreria.php');
  if(isset($_SESSION['usuario_nombre'])) 
  {
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();
    
    $libro=$_GET['libro'];
    $folio=$_GET['folio'];
    $registrosboletas=mysqli_query($conexion,"SELECT * FROM bautizo WHERE libro_bau='$libro' AND folio_bau='$folio'") or die(mysqli_error());
    if(mysqli_num_rows($registrosboletas)>0)
    {
        $pdf = new FPDF('P','mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial','',10);    

        $pdf->SetY(10);
        $pdf->Cell(375,8,$folio,0,2,'C');
        $pdf->SetY(20);
        while($reg=mysqli_fetch_array($registrosboletas))
        {
            $pdf->SetFont('Arial','B',10);
            $pdf->SetX(10);
            $pdf->Cell(15,7,utf8_decode('N°'),'B',0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(20,7,utf8_decode($reg['boleta_bau']),'B',0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(160,7,'',0,1,'L');       

            $pdf->SetX(35);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(18,7,utf8_decode('Nombre:'),'T',0,'L');

            $registrospersonas=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$reg[codigo_per]'");
            $regpersonas=mysqli_fetch_array($registrospersonas);

            $pdf->SetFont('Arial','',10);
            $pdf->Cell(153,7,utf8_decode($regpersonas['nombre_per'].' '.$regpersonas['apellido_per']),'BT',1,'C');
            
            $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$reg[codigo_per]'");
            $regpadper=mysqli_fetch_array($registrospadper);
            $registrospadres=mysqli_query($conexion,"SELECT * FROM padre,madre WHERE cedula_pad='$regpadper[cedula_pad]' AND cedula_mad='$regpadper[cedula_mad]'");
            $regpadres=mysqli_fetch_array($registrospadres);

            $pdf->SetX(35);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(18,7,utf8_decode('Padres:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(153,7,utf8_decode($regpadres['nombre_pad'].' '.$regpadres['apellido_pad'].' y '.$regpadres['nombre_mad'].' '.$regpadres['apellido_mad']),'B',1,'C');
            
            $pdf->SetX(35);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(18,7,utf8_decode('Filiación:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(40,7,utf8_decode($regpadper['filiacion']),'B',0,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,7,utf8_decode('Nacido en:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(93,7,utf8_decode($regpersonas['lugarnac_per']),'B',1,'C');

            $pdf->SetX(35);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(8,7,utf8_decode('El:'),0,0,'L');

            $fecha = $regpersonas['fechanac_per']; 
            $ano = substr($fecha, -10, 4);
            $mes = substr($fecha, -5, 2);
            $dia = substr($fecha, -2, 2);
            $me=mesescrito($mes);

            $pdf->SetFont('Arial','',10);
            $pdf->Cell(30,7,utf8_decode($dia),'B',0,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(8,7,utf8_decode('de:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(60,7,utf8_decode($me),'B',0,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(8,7,utf8_decode('de:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(57,7,utf8_decode($ano),'B',1,'C');

            $pdf->SetX(35);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(25,7,utf8_decode('Bautizado el:'),0,0,'L');

            $fechab = $reg['fecha_bau']; 
            $anob = substr($fechab, -10, 4);
            $mesb = substr($fechab, -5, 2);
            $diab = substr($fechab, -2, 2);
            $meb=mesescrito($mesb);

            $pdf->SetFont('Arial','',10);
            $pdf->Cell(25,7,utf8_decode($diab),'B',0,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(8,7,utf8_decode('de:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(59,7,utf8_decode($meb),'B',0,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(8,7,utf8_decode('de:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(46,7,utf8_decode($anob),'B',1,'C');

            $registrospadriper=mysqli_query($conexion,"SELECT * FROM padrinosbautizado WHERE codigo_per='$reg[codigo_per]'");
            $regpadriper=mysqli_fetch_array($registrospadriper);
            $registrospadrinos=mysqli_query($conexion,"SELECT * FROM padrino,madrina WHERE cedula_pdr='$regpadriper[cedula_pdr]' AND cedula_mdr='$regpadriper[cedula_mdr]'");
            $regpadrinos=mysqli_fetch_array($registrospadrinos);

            $pdf->SetX(35);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(18,7,utf8_decode('Padrinos:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(153,7,utf8_decode($regpadrinos['nombre_pdr'].' '.$regpadrinos['apellido_pdr'].' y '.$regpadrinos['nombre_mdr'].' '.$regpadrinos['apellido_mdr']),'B',1,'C');

            $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$reg[codigo_min]'");
            $regministro=mysqli_fetch_array($registrosministro);

            $pdf->SetX(35);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(17,7,utf8_decode('Ministro:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(42,7,utf8_decode($regministro['ministro_min']),'B',0,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(26,7,utf8_decode('Registro Civil:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(86,7,utf8_decode($regpersonas['registrocivil_per']),'B',1,'C');

            $pdf->SetX(35);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(30,7,utf8_decode('Observaciones:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->MultiCell(0,7,utf8_decode($reg['observacion_bau']),'B');

            if(!($reg['boleta_bau']%3==0))
            {
                $pdf->Cell(195,10,'',0,1);
            }
        }
        $pdf->Output('bautizo-libro'.$libro.'-folio'.$folio,'I');
    }
    else
    {
      header("Location: librosbautizo.php");
    }
  }
  else 
  {
    header("Location: login.php");
  }
?>  