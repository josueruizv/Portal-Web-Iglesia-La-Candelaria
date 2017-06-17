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
    if(isset($_POST['fines']))
    {
        $fines=$_POST['fines'];
    }
    $registros=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per=$codigo");
    if($reg=mysqli_fetch_array($registros))
    {
        $registrosconfirmacion=mysqli_query($conexion,"SELECT * FROM confirmacion WHERE codigo_per=$codigo");
        if($regconfirmacion=mysqli_fetch_array($registrosconfirmacion))
        {
            // Creación del objeto de la clase heredada
            $pdf = new FPDF('P','mm','Letter');
            $pdf->AddPage();
            $pdf->SetFont('Times','',22);    

            $pdf->SetY(30);
            $pdf->Cell(0,8,'DIOCESIS DE TRUJILLO',0,2,'C');

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(0,5,'PARROQUIA NTRA. SRA. DE LA CANDELARIA',0,2,'C');

            $pdf->SetFont('Arial','',10);
            $pdf->Cell(0,5,'La Beatriz - Valera Edo. Trujillo.',0,2,'C');
            $pdf->Cell(0,5,utf8_decode('C.P. 3101 - Venezuela - Teléfono (0271) 235.6552'),0,2,'C');

            $pdf->SetFont('Times','B',20);
            $pdf->Cell(0,30,'CERTIFICADO DE CONFIRMACION',0,2,'C');

            $fechaconf = $regconfirmacion['fecha_conf']; 
            list( $ano, $mes, $dia ) = split( '[/.-]', $fechaconf);
            $me=mesescrito($mes);

            $fechanac = $reg['fechanac_per']; 
            list( $anonac, $mesnac, $dianac ) = split( '[/.-]', $fechanac);
            $menac=mesescrito($mesnac);

            $diahoy=date('d');
            $meshoy=date('m');
            $aniohoy=date('Y');

            $mehoy=mesescrito($meshoy);

            $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regconfirmacion[codigo_min]'");
            $regministro=mysqli_fetch_array($registrosministro);

            $pdf->SetFont('Arial','',12);
            $pdf->Cell(0,5,utf8_decode('El que suscribe Párroco de la iglesia "Nuestra Señora de la Candelaria" la Beatriz Valera Edo. Trujillo,'),0,2);
            $pdf->Cell(0,5,utf8_decode('certifica que en los archivo a su cargo se hallan los registros de  la confirmación de:'),0,2);
            $pdf->Cell(0,5,utf8_decode(strtoupper($reg['nombre_per'].' '.$reg['apellido_per'])),0,2);
            $pdf->Cell(0,5,'Confirmado (a) el  dia '.$dia.' de '.$me.' de '.$ano,0,2);
            
            $registrospadrespersona=mysqli_query($conexion,"SELECT * FROM padrespersona WHERE codigo_per='$reg[codigo_per]'");
            $regpadrespersona=mysqli_fetch_array($registrospadrespersona);

            $registrospadres=mysqli_query($conexion,"SELECT * FROM padre,madre WHERE cedula_pad='$regpadrespersona[cedula_pad]' AND cedula_mad='$regpadrespersona[cedula_mad]'");
            $regpadres=mysqli_fetch_array($registrospadres);

            $pdf->Cell(0,5,utf8_decode('PADRES: '.$regpadres['nombre_pad'].' '.$regpadres['apellido_pad'].' y '.$regpadres['nombre_mad'].' '.$regpadres['apellido_mad']),0,2);

            $registrospadrinos=mysqli_query($conexion,"SELECT * FROM padrinosconfirmando WHERE codigo_per='$reg[codigo_per]'");
            $regpadrinos=mysqli_fetch_array($registrospadrinos);

            $registrospdr=mysqli_query($conexion,"SELECT * FROM padrino WHERE cedula_pdr='$regpadrinos[cedula_pdr]'");
            if($regpdr=mysqli_fetch_array($registrospdr))
            {
                $flag=1;
            }
            else
            {
              $registrosmdr=mysqli_query($conexion,"SELECT * FROM madrina WHERE cedula_mdr='$regpadrinos[cedula_pdr]'");
              $regmdr=mysqli_fetch_array($registrosmdr);
              $flag=2;
            }
            if($flag==1)
            {
                $pdf->Cell(0,5,utf8_decode('PADRINO:  '.$regpdr['nombre_pdr'].' '.$regpdr['apellido_pdr']),0,2);
            }
            if($flag==2)
            {
                $pdf->Cell(0,5,utf8_decode('MADRINA:  '.$regmdr['nombre_mdr'].' '.$regmdr['apellido_mdr']),0,2);
            }
            $pdf->Cell(0,5,utf8_decode('MINISTRO:   '.$regministro['ministro_min']),0,2);
            $pdf->Cell(0,5,utf8_decode('Se expide el presente certificado, para fines '.$fines),0,2);
            $pdf->Cell(0,5,utf8_decode('Valera '.$diahoy.'  de '.$mehoy.' de '.$aniohoy.'.'),0,2);

            $pdf->SetY(180);
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(0,5,utf8_decode('Párroco'),0,1,'R');

            $pdf->Output('fe-confirmacion','I');
        }
        else
        {
            header("location: consultar-confirmacion.php");
        }
    }
    else
    {
        header("location: consultar-confirmacion.php");
    }
}
else 
{
  header("Location: login.php");
}
?>