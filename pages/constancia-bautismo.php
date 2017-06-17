<?php
require('../php/conexion.php');
require('../php/fpdf.php');
include('../php/libreria.php');
session_start();
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

            $pdf->SetFont('Times','B',18);
            $pdf->Cell(0,30,'CONSTANCIA',0,2,'C');

            $fecha = $regbautizo['fecha_bau']; 
            list( $ano, $mes, $dia ) = split( '[/.-]', $fecha);
            $me=mesescrito($mes);

            $diahoy=date('d');
            $meshoy=date('m');
            $aniohoy=date('Y');

            $mehoy=mesescrito($meshoy);

            $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regbautizo[codigo_min]'");
            $regministro=mysqli_fetch_array($registrosministro);

            $texto = utf8_decode('      El suscrito, Párroco de la Nuestra Señora de la Candelaria de la Beatriz Valera Edo. Trujillo, hace constar que el niño, '.strtoupper($reg['nombre_per'].' '.$reg['apellido_per']).', fue Bautizado en esta Parroquia el día '.$dia.' de '.$me.' de '.$ano.' por el '.$regministro['ministro_min'].'.');
            $texto1= utf8_decode('      Constancia que se expide a petición de parte interesada a los '.$diahoy.' días del mes de '.$mehoy.' del año '.$aniohoy.'.');

            $pdf->SetFont('Arial','',12);
            $pdf->MultiCell(0,5,$texto);
            $pdf->SetY(105);
            $pdf->MultiCell(0,5,$texto1);

            $pdf->SetY(120);
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(0,8,utf8_decode('Pbro. Francisco Linares'),0,2,'C');
            $pdf->Cell(0,5,utf8_decode('Párroco'),0,1,'C');

            $pdf->Output('constanciabautizo','I');
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