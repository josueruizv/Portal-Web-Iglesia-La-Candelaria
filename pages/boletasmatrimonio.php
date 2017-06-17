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
    $registrosboletas=mysqli_query($conexion,"SELECT * FROM matrimonio WHERE libro_matri='$libro' AND folio_matri='$folio'") or die(mysqli_error());
    if(mysqli_num_rows($registrosboletas)>0)
    {
        $pdf = new FPDF('P','mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial','',10);    
        $pdf->Cell(375,7,$folio,0,2,'C');
        while($reg=mysqli_fetch_array($registrosboletas))
        {
            $pdf->SetFont('Arial','B',12);
            $pdf->SetX(20);
            $pdf->Cell(10,4,utf8_decode('N°'),'B',0,'L');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(10,4,$reg['boleta_matri'],'B',0,'L');
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(160,4,'',0,1,'L');
            $pdf->SetX(40);
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(80,4,utf8_decode('ESPOSO'),1,0,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(80,4,utf8_decode('ESPOSA'),1,1,'C');

            $registrospersonas=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$reg[codigo_per]'");
            $regpersonas=mysqli_fetch_array($registrospersonas);

            $registrospersonas2=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per='$reg[codigo_per2]'");
            $regpersonas2=mysqli_fetch_array($registrospersonas2);

            
            $pdf->SetX(40);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,4,utf8_decode('Nombres:'),'T',0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(60,4,utf8_decode($regpersonas['nombre_per']),'BTR',0,'C');
            $pdf->SetFont('Arial','B',10);

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,4,utf8_decode('Nombres:'),'T',0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(60,4,utf8_decode($regpersonas2['nombre_per']),'BT',1,'C');
            $pdf->SetFont('Arial','B',10);


            $pdf->SetX(40);
            $pdf->Cell(20,4,utf8_decode('Apellidos:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(60,4,utf8_decode($regpersonas['apellido_per']),'BTR',0,'C');
            $pdf->SetFont('Arial','B',10);

            $pdf->Cell(20,4,utf8_decode('Apellidos:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(60,4,utf8_decode($regpersonas2['apellido_per']),'BT',1,'C');
            $pdf->SetFont('Arial','B',10);

            $pdf->SetX(40);
            $pdf->Cell(45,4,utf8_decode('Fecha de Nacimiento:'),0,0,'L');

            $fnac = date('d/m/Y', strtotime(str_replace('/', '-', $regpersonas['fechanac_per'])));

            $pdf->SetFont('Arial','',10);
            $pdf->Cell(35,4,$fnac,'BR',0,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(45,4,utf8_decode('Fecha de Nacimiento:'),0,0,'L');

            $fnacesp = date('d/m/Y', strtotime(str_replace('/', '-', $regpersonas2['fechanac_per'])));

            $pdf->SetFont('Arial','',10);
            $pdf->Cell(35,4,$fnacesp,'B',1,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->SetX(40);
            $pdf->Cell(45,4,utf8_decode('Lugar de Nacimiento:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(35,4,$regpersonas['lugarnac_per'],'BR',0,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(45,4,utf8_decode('Lugar de Nacimiento:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(35,4,$regpersonas2['lugarnac_per'],'B',1,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->SetX(40);
            $pdf->Cell(30,4,utf8_decode('Bautizado en:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(50,4,utf8_decode($regpersonas['lugarbautizo_per']),'BR',0,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(30,4,utf8_decode('Bautizada en:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(50,4,utf8_decode($regpersonas2['lugarbautizo_per']),'B',1,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->SetX(40);
            $pdf->Cell(15,4,utf8_decode('Edad:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(65,4,utf8_decode($regpersonas['edad_per'].' años'),'BR',0,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(15,4,utf8_decode('Edad:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(65,4,utf8_decode($regpersonas2['edad_per'].' años'),'B',1,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->SetX(40);
            $pdf->Cell(25,4,utf8_decode('Domicilio:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(55,4,utf8_decode($regpersonas['direccion_per']),'BR',0,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(25,4,utf8_decode('Domicilio:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(55,4,utf8_decode($regpersonas2['direccion_per']),'B',1,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->SetX(40);
            $pdf->Cell(20,4,utf8_decode('Estado:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(60,4,utf8_decode($regpersonas['estadodir_per']),'BR',0,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,4,utf8_decode('Estado:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(60,4,utf8_decode($regpersonas2['estadodir_per']),'B',1,'C');


            $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$reg[codigo_per]'");
            $regpadper=mysqli_fetch_array($registrospadper);
            $registrospadres=mysqli_query($conexion,"SELECT * FROM padre,madre WHERE cedula_pad='$regpadper[cedula_pad]' AND cedula_mad='$regpadper[cedula_mad]'");
            $regpadres=mysqli_fetch_array($registrospadres);

            $registrospadperesp=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$reg[codigo_per2]'");
            $regpadperesp=mysqli_fetch_array($registrospadperesp);
            $registrospadresesp=mysqli_query($conexion,"SELECT * FROM padre,madre WHERE cedula_pad='$regpadperesp[cedula_pad]' AND cedula_mad='$regpadperesp[cedula_mad]'");
            $regpadresesp=mysqli_fetch_array($registrospadresesp);


            $pdf->SetFont('Arial','B',10);
            $pdf->SetX(40);
            $pdf->Cell(15,4,utf8_decode('Padre:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(65,4,utf8_decode($regpadres['nombre_pad'].' '.$regpadres['apellido_pad']),'BR',0,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(15,4,utf8_decode('Padre:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(65,4,utf8_decode($regpadresesp['nombre_pad'].' '.$regpadresesp['apellido_pad']),'B',1,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->SetX(40);
            $pdf->Cell(15,4,utf8_decode('Madre:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(65,4,utf8_decode($regpadres['nombre_mad'].' '.$regpadres['apellido_mad']),'BR',0,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(15,4,utf8_decode('Madre:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(65,4,utf8_decode($regpadresesp['nombre_mad'].' '.$regpadresesp['apellido_mad']),'B',1,'C');

            $registrospadriper=mysqli_query($conexion,"SELECT * FROM padrinosboda WHERE codigo_per='$reg[codigo_per]' AND codigo_per2='$reg[codigo_per2]'");
            $regpadriper=mysqli_fetch_array($registrospadriper);
            $registrospadrinos=mysqli_query($conexion,"SELECT * FROM padrino,madrina WHERE cedula_pdr='$regpadriper[cedula_pdr]' AND cedula_mdr='$regpadriper[cedula_mdr]'");
            $regpadrinos=mysqli_fetch_array($registrospadrinos);

            $pdf->SetX(40);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,4,utf8_decode('Testigos:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(140,4,utf8_decode($regpadrinos['nombre_pdr'].' '.$regpadrinos['apellido_pdr'].' y '.$regpadrinos['nombre_mdr'].' '.$regpadrinos['apellido_mdr']),'B',1,'C');

            $pdf->SetX(40);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(30,4,utf8_decode('Sacramentos:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(130,4,utf8_decode($reg['sacramentos']),'B',1,'C');

            $pdf->SetX(40);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(30,4,utf8_decode('Proclamas:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(130,4,utf8_decode($reg['proclamas']),'B',1,'C');

            $pdf->SetX(40);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(30,4,utf8_decode('Dispensas:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(130,4,utf8_decode($reg['dispensas']),'B',1,'C');

            $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$reg[codigo_min]'");
            $regministro=mysqli_fetch_array($registrosministro);

            $pdf->SetX(40);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(40,4,utf8_decode('Ministro Asistente:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(120,4,utf8_decode($regministro['ministro_min']),'B',1,'C');

            $pdf->SetX(40);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(45,4,utf8_decode('Fecha de Matrimonio:'),0,0,'L');

            $fmatri = date('d/m/Y', strtotime(str_replace('/', '-', $reg['fecha_matri'])));

            $pdf->SetFont('Arial','',10);
            $pdf->Cell(115,4,$fmatri,'B',1,'C');

            $pdf->SetX(40);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(35,4,utf8_decode('Observaciones:'),0,0,'L');
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(125,4,utf8_decode($reg['observacion_matri']),'B',0,'C');

            $pdf->Cell(200,8,'',0,1);
        }
        $pdf->Output('matrimonio-libro'.$libro.'-folio'.$folio,'I');
    }
    else
    {
      header("Location: librosmatrimonio.php");
    }
  }
  else 
  {
    header("Location: login.php");
  }
?>  