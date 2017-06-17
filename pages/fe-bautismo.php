<?php
require('../php/conexion.php');
session_start();
if(isset($_SESSION['usuario_nombre'])) 
{
    include('../php/inactividad.php');
    $tiempoinactividad=calcularInactividad();
    
    require('../php/fpdf.php');
    include('../php/libreria.php');

    $codigo=$_GET['cod'];
    $fines=$_GET['fines'];
    $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per=$codigo");
    if($reg=mysqli_fetch_array($registros))
    {
        $registrosbautizo=mysqli_query($conexion,"SELECT * FROM bautizo WHERE codigo_per=$codigo");
        if($regbautizo=mysqli_fetch_array($registrosbautizo))
        {
            // Creación del objeto de la clase heredada
            $pdf = new FPDF('P','mm','Letter');
            $pdf->AddPage();
            $pdf->SetFont('Times','B',12);    

            $pdf->SetY(30);
            $pdf->Cell(0,5,utf8_decode('DIÓCESIS DE TRUJILLO'),0,2,'C');
            $pdf->Cell(0,5,'PARROQUIA "NTRA. SRA. DE LA CANDELARIA"',0,2,'C');

            $pdf->SetFont('Times','',11);
            $pdf->Cell(0,5,'La Beatriz - Valera Edo. Trujillo.',0,2,'C');
            $pdf->Cell(0,5,utf8_decode('C.P. 3101 - Venezuela - Teléfono (0271) 235.6552'),0,2,'C');

            $pdf->SetFont('Times','B',16);
            $pdf->Cell(0,25,'CERTIFICADO DE BAUTISMO Y NACIMIENTO',0,2,'C');

            $fechanac = $reg['fechanac_per']; 
            $ano = substr($fechanac, -10, 4);
            $mes = substr($fechanac, -5, 2);
            $dia = substr($fechanac, -2, 2);
            $me=mesescrito($mes);

            $fechabau = $regbautizo['fecha_bau']; 
            $anobau = substr($fechabau, -10, 4);
            $mesbau = substr($fechabau, -5, 2);
            $diabau = substr($fechabau, -2, 2);
            $mebau=mesescrito($mesbau);

            $diahoy=date('d');
            $meshoy=date('m');
            $aniohoy=date('Y');
            $mehoy=mesescrito($meshoy);

            $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regbautizo[codigo_min]'");
            $regministro=mysqli_fetch_array($registrosministro);

            $pdf->SetFont('Times','',13);
            $pdf->SetX(42);
            $pdf->Cell(0,10,utf8_decode('El que suscribe, Párroco de Ntra. Sra. de la Candelaria La Beatriz, certifica que'),0,2); 
            
            $pdf->SetX(28);
            $pdf->Cell(23,10,utf8_decode('En el Libro'),0,0); 
            $pdf->SetFont('Times','',14);
            $pdf->Cell(30,8,$regbautizo['libro_bau'],'B',0,'C'); 
            $pdf->SetFont('Times','',13);
            $pdf->Cell(39,10,utf8_decode('de Bautismos, Folio'),0,0);
            $pdf->SetFont('Times','',14);
            $pdf->Cell(30,8,$regbautizo['folio_bau'],'B',0,'C'); 
            $pdf->SetFont('Times','',13);
            $pdf->Cell(8,10,utf8_decode('N°'),0,0);
            $pdf->SetFont('Times','',14);
            $pdf->Cell(30,8,$regbautizo['boleta_bau'],'B',1,'C'); 

            $pdf->SetX(28);
            $pdf->SetFont('Times','',13);
            $pdf->Cell(106,15,utf8_decode('Del archivo a su cargo se halla la partida de Bautismo de'),0,0);
            $pdf->Cell(54,10,'','B',1);

            $pdf->SetX(28);
            $pdf->SetFont('Times','B',14);
            $pdf->Cell(0,4,'',0,1);
            $pdf->SetX(28);
            $pdf->Cell(160,6,utf8_decode(mb_strtoupper($reg['nombre_per'].' '.$reg['apellido_per'],'utf-8')),'B',2,'C');
            $pdf->Cell(0,4,'',0,1);

            $pdf->SetX(28);
            $pdf->SetFont('Times','',13);
            $pdf->Cell(31,10,'Bautizado (a) el',0,0);
            $pdf->SetFont('Times','',14);
            $pdf->Cell(30,8,$diabau,'B',0,'C');
            $pdf->SetFont('Times','',13);
            $pdf->Cell(7,10,'de',0,0);
            $pdf->SetFont('Times','',14);
            $pdf->Cell(45,8,$mebau,'B',0,'C');
            $pdf->SetFont('Times','',13);
            $pdf->Cell(7,10,'de',0,0);
            $pdf->SetFont('Times','',14);
            $pdf->Cell(40,8,$anobau,'B',1,'C');
            $pdf->Cell(0,4,'',0,1);

            $pdf->SetX(28);
            $pdf->SetFont('Times','',13);
            $pdf->Cell(24,10,utf8_decode('Nació el día'),0,0);
            $pdf->SetFont('Times','',14);
            $pdf->Cell(37,8,$dia,'B',0,'C');
            $pdf->SetFont('Times','',13);
            $pdf->Cell(7,10,'de',0,0);
            $pdf->SetFont('Times','',14);
            $pdf->Cell(45,8,$me,'B',0,'C');
            $pdf->SetFont('Times','',13);
            $pdf->Cell(7,10,'de',0,0);
            $pdf->SetFont('Times','',14);
            $pdf->Cell(40,8,$ano,'B',1,'C');
            $pdf->Cell(0,4,'',0,1);
            
            $registrospadrespersona=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$reg[codigo_per]'");
            $regpadrespersona=mysqli_fetch_array($registrospadrespersona);

            $registrospadres=mysqli_query($conexion,"SELECT * FROM padre,madre WHERE cedula_pad='$regpadrespersona[cedula_pad]' AND cedula_mad='$regpadrespersona[cedula_mad]'");
            $regpadres=mysqli_fetch_array($registrospadres);

            $pdf->SetX(28);
            $pdf->SetFont('Times','',13);
            $pdf->Cell(19,8,utf8_decode('PADRES'),0,0);
            $pdf->SetFont('Times','B',12);
            $pdf->Cell(141,8,utf8_decode($regpadres['nombre_pad'].' '.$regpadres['apellido_pad'].' y '.$regpadres['nombre_mad'].' '.$regpadres['apellido_mad']),'B',1,'C');
            $pdf->SetX(28);
            $pdf->Cell(160,7,'','B',1,'C');
            $pdf->Cell(0,4,'',0,1);

            $registrospadrinos=mysqli_query($conexion,"SELECT * FROM padrinosbautizado WHERE codigo_per='$reg[codigo_per]'");
            $regpadrinos=mysqli_fetch_array($registrospadrinos);

            $registrospdr=mysqli_query($conexion,"SELECT * FROM padrino,madrina WHERE cedula_pdr='$regpadrinos[cedula_pdr]' AND cedula_mdr='$regpadrinos[cedula_mdr]'");
            $regpdr=mysqli_fetch_array($registrospdr);

            $pdf->SetX(28);
            $pdf->SetFont('Times','',13);
            $pdf->Cell(25,8,utf8_decode('PADRINOS'),0,0);
            $pdf->SetFont('Times','B',12);
            $pdf->Cell(135,8,utf8_decode($regpdr['nombre_pdr'].' '.$regpdr['apellido_pdr'].' y '.$regpdr['nombre_mdr'].' '.$regpdr['apellido_mdr']),'B',1,'C');
            $pdf->SetX(28);
            $pdf->Cell(160,7,'','B',1,'C');
            $pdf->Cell(0,4,'',0,1);

            $pdf->SetX(28);
            $pdf->SetFont('Times','',13);
            $pdf->Cell(25,8,utf8_decode('MINISTRO'),0,0);
            $pdf->SetFont('Times','B',12);
            $pdf->Cell(135,8,utf8_decode($regministro['ministro_min']),'B',1,'C');
            $pdf->SetX(28);
            $pdf->Cell(0,4,'',0,1);

            $pdf->SetX(28);
            $pdf->SetFont('Times','',13);
            $pdf->Cell(82,10,utf8_decode('Se expide el presente certificado, para fines'),0,0);
            $pdf->SetFont('Times','B',12);
            $pdf->Cell(78,8,$_GET['fines'],'B',1,'C');
            $pdf->Cell(0,4,'',0,1);

            $pdf->SetX(28);
            $pdf->SetFont('Times','',13);
            $pdf->Cell(44,10,utf8_decode('REGISTRO CIVIL N°'),0,0);
            $pdf->SetFont('Times','BI',10);
            $pdf->Cell(116,8,$reg['registrocivil_per'],'B',1,'C');
            $pdf->Cell(0,4,'',0,1);

            $pdf->SetX(28);
            $pdf->SetFont('Times','',14);
            $pdf->Cell(16,10,utf8_decode('Valera'),0,0);
            $pdf->SetFont('Times','',14);
            $pdf->Cell(45,8,$diahoy,'B',0,'C');
            $pdf->Cell(7,10,'de',0,0);
            $pdf->SetFont('Times','',14);
            $pdf->Cell(45,8,$mehoy,'B',0,'C');
            $pdf->SetFont('Times','',13);
            $pdf->Cell(7,10,'de',0,0);
            $pdf->SetFont('Times','',14);
            $pdf->Cell(40,8,$aniohoy,'B',1,'C');
            $pdf->Cell(0,25,'',0,1);

            $pdf->SetFont('Times','',13);
            $pdf->Cell(95,7,'',0,0);
            $pdf->Cell(65,7,utf8_decode('Párroco'),'T',1,'C');

            $pdf->Output('fe-bautismo','I');
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