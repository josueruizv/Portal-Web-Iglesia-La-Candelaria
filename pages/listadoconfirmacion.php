<?php 
  session_start();
  require('../php/conexion.php');
  require('../php/fpdf.php');
  include('../php/libreria.php');
  if(isset($_SESSION['usuario_nombre'])) 
  {
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();
    
    $fconfirmacion=$_GET['fecha'];
    $registrosconfirmaciones=mysqli_query($conexion,"SELECT * FROM confirmacion WHERE fecha_conf='$fconfirmacion'") or die(mysqli_error());
    if(mysqli_num_rows($registrosconfirmaciones)>0)
    {
        $pdf = new FPDF('P','mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial','',12);    

        $registrosconf=mysqli_query($conexion,"SELECT codigo_min FROM confirmacion WHERE fecha_conf='$fconfirmacion'");
        $regconfirmacion=mysqli_fetch_array($registrosconf);
        $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regconfirmacion[codigo_min]'");
        $regmin=mysqli_fetch_array($registrosministro);

        $fecha= date('d/m/Y', strtotime(str_replace('/', '-', $fconfirmacion)));

        $pdf->SetY(20);
        $pdf->Cell(0,8,utf8_decode('CONFIRMACIONES CELEBRADAS EL: '.$fecha),0,1,'C');
        $pdf->Cell(0,8,utf8_decode(' EN LA PARROQUIA NTRA. SRA DE LA CANDELARIA'),0,1,'C');
        $pdf->Cell(0,8,utf8_decode('ASISTIDAS POR EL: '.strtoupper($regmin['ministro_min'])),0,1,'C');

        $pdf->Cell(200,15,'',0,1);

        

        $i=0;
        while($regconf=mysqli_fetch_array($registrosconfirmaciones))
        {   
            $pdf->SetX(15);
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(40,7,utf8_decode('N°'),1,0,'C'); 

            $i++;
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(140,7,$i,1,1,'C');

            $registrospersona=mysqli_query($conexion,"SELECT nombre_per,apellido_per FROM personas WHERE codigo_per='$regconf[codigo_per]'");
            $regper=mysqli_fetch_array($registrospersona);

            $pdf->SetX(15);
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(40,7,utf8_decode('Nombres'),1,0,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(140,7,utf8_decode($regper['nombre_per']),1,1,'C');

            $pdf->SetX(15);
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(40,7,utf8_decode('Apellidos'),1,0,'C');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(140,7,utf8_decode($regper['apellido_per']),1,1,'C');

            $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$regconf[codigo_per]'");
            $regpadper=mysqli_fetch_array($registrospadper);
            $registrospadres=mysqli_query($conexion,"SELECT * FROM padre,madre WHERE cedula_pad='$regpadper[cedula_pad]' AND cedula_mad='$regpadper[cedula_mad]'");
            $regpadres=mysqli_fetch_array($registrospadres);

            $pdf->SetX(15);
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(40,7,utf8_decode('Padres'),1,0,'C');
            $pdf->SetFont('Arial','',12);

            $pdf->Cell(140,7,utf8_decode($regpadres['nombre_pad'].' '.$regpadres['apellido_pad'].' y '.$regpadres['nombre_mad'].' '.$regpadres['apellido_mad']),1,1,'C');

            $registrospadriper=mysqli_query($conexion,"SELECT * FROM padrinosconfirmando WHERE codigo_per='$regconf[codigo_per]'");
            $regpadriper=mysqli_fetch_array($registrospadriper);
            $registrospadrinos=mysqli_query($conexion,"SELECT * FROM padrino WHERE cedula_pdr='$regpadriper[cedula_pdr]'");
            if($regpadrinos=mysqli_fetch_array($registrospadrinos))
            {
              $flag=1;
            }
            else
            {
              $registrosmadrinas=mysqli_query($conexion,"SELECT * FROM madrina WHERE cedula_mdr='$regpadriper[cedula_pdr]'");
              $regmadrinas=mysqli_fetch_array($registrosmadrinas);
              $flag=2;
            }

            $pdf->SetX(15);
            $pdf->SetFont('Arial','B',12);

            if($flag==1)
            {
              $pdf->Cell(40,7,utf8_decode('Padrino'),1,0,'C');
              $pdf->SetFont('Arial','',12);

              $pdf->Cell(140,7,utf8_decode($regpadrinos['nombre_pdr'].' '.$regpadrinos['apellido_pdr']),1,1,'C');
            }

            if($flag==2)
            {
              $pdf->Cell(40,7,utf8_decode('Madrina'),1,0,'C');
              $pdf->SetFont('Arial','',12);

              $pdf->Cell(140,7,utf8_decode($regmadrinas['nombre_mdr'].' '.$regmadrinas['apellido_mdr']),1,1,'C');
            }

            $pdf->Cell(200,10,'',0,1);
           
        }
        $pdf->Output('listadoconfirmacion-'.$fecha,'I');
    }
    else
    {
      header("Location: fechascconfirmacion.php");
    }
  }
  else 
  {
    header("Location: login.php");
  }
?>  