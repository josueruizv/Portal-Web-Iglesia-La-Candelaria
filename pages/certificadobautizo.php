<?php 
  session_start();
  require('../php/conexion.php');
  require('../php/fpdf.php');
  include('../php/libreria.php');
  if(isset($_SESSION['usuario_nombre'])) 
  {
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();

    $codigo=$_GET['cod'];
    $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per=$codigo");
    if($reg=mysqli_fetch_array($registros))
    {
    	$registrosbautizo=mysqli_query($conexion,"SELECT * FROM bautizo WHERE codigo_per=$codigo");
        if($regbautizo=mysqli_fetch_array($registrosbautizo))
        {

			// Creación del objeto de la clase heredada
		    $pdf = new FPDF('L','mm','Letter');
		    $pdf->AddPage();

		    $pdf->Image('../images/certif_bau.jpg',10,10,260,195);

		    $pdf->Image('../images/sello.jpg',205,35,35,45);

		    $pdf->SetY(40);
		    $pdf->SetFont('Arial','',14);    

		    $pdf->Cell(0,7,utf8_decode('DIÓCESIS DE TRUJILLO'),0,2,'C');
		    $pdf->SetFont('Times','I',16);
		    $pdf->Cell(0,7,utf8_decode('Parroquia "Nuestra Señora de la Candelaria"'),0,2,'C');
		    $pdf->SetFont('Courier','B',12);
		    $pdf->Cell(0,7,utf8_decode('LA BEATRIZ-VALERA-VENEZUELA'),0,2,'C');
		    $pdf->AddFont('calligra');
		    $pdf->SetFont('calligra','',36);
		    $pdf->Cell(0,20,utf8_decode('CERTIFICADO'),0,2,'C');

		    $pdf->SetFont('Arial','',14); 
		    $pdf->Cell(0,12,utf8_decode('QUE SE OTORGA'),0,1,'C'); 
		    $pdf->SetX(60);
		    $pdf->Cell(5,7,utf8_decode('A:'),0,0,'C');
		    $pdf->SetFont('calligra','',18);    

		    $bautizado=utf8_decode($reg['nombre_per'].' '.$reg['apellido_per']);

		    $pdf->Cell(150,7,$bautizado,'B',1,'C');
		    $pdf->Cell(20,4,'',0,1);
		    
		    $pdf->SetFont('Arial','',14);  
		    $pdf->Cell(0,10,utf8_decode('QUIEN RECIBIÓ EL SACRAMENTO DEL BAUTIZO EN ESTA PARROQUIA'),0,1,'C'); 
		    $pdf->SetX(40);
		    $pdf->Cell(10,7,utf8_decode('EL:'),0,0,'L');

		    $fecha = $regbautizo['fecha_bau']; 
            list( $ano, $mes, $dia ) = split( '[/.-]', $fecha);
            $me=mesescrito($mes);

		    $pdf->SetFont('calligra','',18);
		    $pdf->Cell(180,7,utf8_decode($dia.' de '.$me.' de '.$ano),'B',1,'C');
		    
		    $pdf->Cell(20,7,'',0,1);
		    $pdf->SetX(35);
		    $pdf->SetFont('Arial','',14); 
		    $pdf->Cell(25,7,utf8_decode('PADRES:'),0,0,'L');

		    $registrospadper=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$reg[codigo_per]'");
            $regpadper=mysqli_fetch_array($registrospadper);
            $registrospadres=mysqli_query($conexion,"SELECT * FROM padre,madre WHERE cedula_pad='$regpadper[cedula_pad]' AND cedula_mad='$regpadper[cedula_mad]'");
            $regpadres=mysqli_fetch_array($registrospadres);


            if(($regpadres['cedula_pad']==31)&&($regpadres['cedula_mad']==895))
            {
            	$padres='';
            }
            if(($regpadres['cedula_pad']!=31)&&($regpadres['cedula_mad']!=895))
            {
            	$padres=utf8_decode($regpadres['nombre_pad'].' '.$regpadres['apellido_pad'].' y '.$regpadres['nombre_mad'].' '.$regpadres['apellido_mad']);
            }
            if(($regpadres['cedula_pad']==31)&&($regpadres['cedula_mad']!=895))
            {
            	$padres=utf8_decode($regpadres['nombre_mad'].' '.$regpadres['apellido_mad']);
            }
            if(($regpadres['cedula_mad']==895)&&($regpadres['cedula_pad']!=31))
            {
            	$padres=utf8_decode($regpadres['nombre_pad'].' '.$regpadres['apellido_pad']);
            }

		    $pdf->SetFont('calligra','',18);    
		    $pdf->Cell(180,7,$padres,'B',1,'C');
		    $pdf->SetFont('Arial','',14); 

		    $pdf->Cell(20,4,'',0,1);
		    $pdf->SetX(35);
		    $pdf->Cell(30,7,utf8_decode('PADRINOS:'),0,0,'L');

		    $registrospadriper=mysqli_query($conexion,"SELECT * FROM padrinosbautizado WHERE codigo_per='$reg[codigo_per]'");
            $regpadriper=mysqli_fetch_array($registrospadriper);
            $registrospadrinos=mysqli_query($conexion,"SELECT * FROM padrino,madrina WHERE cedula_pdr='$regpadriper[cedula_pdr]' AND cedula_mdr='$regpadriper[cedula_mdr]'");
            $regpadrinos=mysqli_fetch_array($registrospadrinos);


            if(($regpadrinos['cedula_pdr']==1366)&&($regpadrinos['cedula_mdr']==1367))
            {
            	$padrinos='';
            }
            if(($regpadrinos['cedula_pdr']!=1366)&&($regpadrinos['cedula_mdr']!=1367))
            {
            	$padrinos=utf8_decode($regpadrinos['nombre_pdr'].' '.$regpadrinos['apellido_pdr'].' y '.$regpadrinos['nombre_mdr'].' '.$regpadrinos['apellido_mdr']);
            }
            if(($regpadrinos['cedula_pdr']==1366)&&($regpadrinos['cedula_mdr']!=1367))
            {
            	$padrinos=utf8_decode($regpadrinos['nombre_mdr'].' '.$regpadrinos['apellido_mdr']);
            }
            if(($regpadrinos['cedula_mdr']==1367)&&($regpadrinos['cedula_pdr']!=1366))
            {
            	$padrinos=utf8_decode($regpadrinos['nombre_pdr'].' '.$regpadrinos['apellido_pdr']);
            }


		    $pdf->SetFont('calligra','',18);  
		    $pdf->Cell(175,7,$padrinos,'B',1,'C');
		    $pdf->Cell(20,2,'',0,1);

		    $pdf->SetX(50);
		    $pdf->SetFont('Courier','B',12);
		    $pdf->Multicell(185,7,utf8_decode('"Desde ahora soy miembro del Pueblo de Dios, y siempre serviré a Cristo y a María Santísima NUESTRA SEÑORA DE LA CANDELARIA"'),0,'C');

		    $pdf->Cell(20,15,'',0,1);
		    $pdf->SetX(180);
		    $pdf->SetFont('Arial','',14); 
		    $pdf->Cell(60,7,utf8_decode('EL PÁRROCO'),'T',0,'C');

		    $pdf->Output('bautizo-certificado','I');
		}
	    else
	    {
	        header("location: consultar-bautizo.php");
	    }
	}
    else
    {
        header("location: consultar-bautizo.php");
    }
  }
  else 
  {
    header("Location: login.php");
  }
?>  