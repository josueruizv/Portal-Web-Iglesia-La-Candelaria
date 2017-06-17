<?php 
  session_start();
  require('../php/conexion.php');
  require('../php/fpdf.php');
  include('../php/libreria.php');
  if(isset($_SESSION['usuario_nombre'])) 
  {
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();
    
    $fcomunion=$_GET['fecha'];
    $registroscomuniones=mysqli_query($conexion,"SELECT * FROM comunion WHERE fecha_com='$fcomunion'") or die(mysqli_error());
    if(mysqli_num_rows($registroscomuniones)>0)
    {
        $pdf = new FPDF('P','mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial','',12);    

        $registroscom=mysqli_query($conexion,"SELECT codigo_min FROM comunion WHERE fecha_com='$fcomunion'");
        $regcomunion=mysqli_fetch_array($registroscom);
        $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regcomunion[codigo_min]'");
        $regmin=mysqli_fetch_array($registrosministro);

        $fecha= date('d/m/Y', strtotime(str_replace('/', '-', $fcomunion)));

        $pdf->SetY(20);
        $pdf->Cell(0,8,utf8_decode('PRIMERA COMUNION CELEBRADA EL: '.$fecha),0,1,'C');
        $pdf->Cell(0,8,utf8_decode(' EN LA PARROQUIA NTRA. SRA DE LA CANDELARIA'),0,1,'C');
        $pdf->Cell(0,8,utf8_decode('ASISTIDA POR EL: '.strtoupper($regmin['ministro_min'])),0,1,'C');

        $pdf->Cell(200,15,'',0,1);

        $pdf->SetX(35);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(30,7,utf8_decode('N°'),1,0,'C');
        $pdf->Cell(60,7,utf8_decode('Nombres'),1,0,'C');
        $pdf->Cell(60,7,utf8_decode('Apellidos'),1,1,'C');

        $i=0;
        while($regcom=mysqli_fetch_array($registroscomuniones))
        {    
            $i++;
            $pdf->SetFont('Arial','',12);
            $pdf->SetX(35);
            $pdf->Cell(30,7,$i,1,0,'C');

            $registrospersona=mysqli_query($conexion,"SELECT nombre_per,apellido_per FROM personas WHERE codigo_per='$regcom[codigo_per]'");
            $regper=mysqli_fetch_array($registrospersona);

            $pdf->Cell(60,7,utf8_decode($regper['nombre_per']),1,0,'C');
            $pdf->Cell(60,7,utf8_decode($regper['apellido_per']),1,1,'C');
        }
        $pdf->Output('listadocomunion-'.$fecha,'I');
    }
    else
    {
      header("Location: fechascomunion.php");
    }
  }
  else 
  {
    header("Location: login.php");
  }
?>  