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
    $registros=mysqli_query($conexion,"SELECT * FROM matrimonio WHERE codigo_matri=$codigo");
    if($regmatrimonio=mysqli_fetch_array($registros))
    {
        $registrosnovio=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per=$regmatrimonio[codigo_per]");
        $regnovio=mysqli_fetch_array($registrosnovio);
        $registrosnovia=mysqli_query($conexion,"SELECT * FROM personas WHERE codigo_per=$regmatrimonio[codigo_per2]");
        $regnovia=mysqli_fetch_array($registrosnovia);

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
        $pdf->Cell(0,30,'CONSTANCIA',0,2,'C');

        $fecha = $regmatrimonio['fecha_matri']; 
        list( $ano, $mes, $dia ) = split( '[/.-]', $fecha);
        $me=mesescrito($mes);

        $diahoy=date('d');
        $meshoy=date('m');
        $aniohoy=date('Y');

        $mehoy=mesescrito($meshoy);

        $registrosministro=mysqli_query($conexion,"SELECT * FROM ministro WHERE codigo_min='$regmatrimonio[codigo_min]'");
        $regministro=mysqli_fetch_array($registrosministro);

        $texto = utf8_decode('      El suscrito, Párroco de la iglesia "Nuestra Señora de la Candelaria" de la Beatriz Valera Edo. Trujillo, hace constar que los ciudadanos, '.strtoupper($regnovio['nombre_per'].' '.$regnovio['apellido_per']).' y '.strtoupper($regnovia['nombre_per'].' '.$regnovia['apellido_per']).', han contraido Matrimonio Eclesiástico en esta Parroquia el día '.$dia.' de '.$me.' de '.$ano.', ceremonia Eclesiástica presidida por el '.$regministro['ministro_min'].', sacramento registrado en el Libro:  '.$regmatrimonio['libro_matri'].'  Folio:  '.$regmatrimonio['folio_matri'].'  N°:  '.$regmatrimonio['boleta_matri']);
        $texto1= utf8_decode('      Constancia que se expide a petición de parte interesada a los '.$diahoy.' días del mes de '.$mehoy.' del año '.$aniohoy.'.');

        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(0,5,$texto);
        $pdf->SetY(110);
        $pdf->MultiCell(0,5,$texto1);

        $pdf->SetY(120);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,8,utf8_decode('Pbro. Francisco Linares'),0,2,'C');
        $pdf->Cell(0,5,utf8_decode('Párroco'),0,1,'C');

        $pdf->Output('constanciamatrimonio','I');
    }
    else
    {
        header("location: consultar-matrimonio.php");
    }
}
else 
{
  header("Location: login.php");
}
?>