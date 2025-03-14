<?php
// Include the main TCPDF library (search for installation path).
require_once('../../app/templates/TCPDF/tcpdf.php');
include '../../app/config/config.php';
include '../../app/config/conexion.php';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$PDF_CREATOR = 'CACPE - SAI';
// set document information
$pdf->SetCreator($PDF_CREATOR);
$pdf->SetAuthor('Marco Calle');
$pdf->SetTitle('CACPE SAI - Reporte de procesos');
$pdf->SetSubject('REPORTES');
$pdf->SetKeywords('CACPE, PDF, SAI, Auditoria, Gerencia');

// set default header data
$PDF_HEADER_LOGO = 'logo.png';
$PDF_HEADER_LOGO_WIDTH = 10;
$PDF_HEADER_TITLE = "Sistema de Auditoria - SAI";
$PDF_HEADER_STRING = "Cooperativa de Ahorro y Crédito de la Pequeña Empresa.";

$pdf->SetHeaderData($PDF_HEADER_LOGO, $PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/spa.php')) {
    require_once(dirname(__FILE__).'/lang/spa.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 11);

// add a page
$pdf->AddPage();

$html = '
    <p><b>LISTADO DE PROCESOS</b><br><b>Fecha de corte: </b>'.date("D Y-m-d H:i:s").'<br>
    </p>
    <table border="1" colspan="6" width="100%">
        <tr>
            <td style="background-color: #a0cfee; text-align: center"> Código</td>
            <td style="background-color: #a0cfee; text-align: center"> Tipo</td>
            <td style="background-color: #a0cfee; text-align: center"> Línea</td>
            <td style="background-color: #a0cfee; text-align: center"> Nombre</td>
            <td style="background-color: #a0cfee; text-align: center"> Área</td>
            <td style="background-color: #a0cfee; text-align: center"> Responsable</td>
            <td style="background-color: #a0cfee; text-align: center"> Registro</td>
        </tr>';

$query = $PDO->prepare('SELECT * FROM proceso');
$query->execute();

$registros = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($registros as $key => $value) {
    $codigo = $value['codigo'];
    $tipo = $value['tipo'];
    $linea = $value['linea'];
    $nombre = $value['nombre'];
    $area = $value['area'];
    $responsable = $value['responsable'];
    $registro = $value['created_at'];
    $html .= '
        <tr>
            <td style="text-align: center">'.$codigo.'</td>
            <td>'.$tipo.'</td>
            <td>'.$linea.'</td>
            <td>'.$nombre.'</td>
            <td>'.$area.'</td>
            <td>'.$responsable.'</td>
            <td>'.substr($registro, 0, 10).'</td>
        </tr>
    ';
}


$html .= '
        
    </table>
';

$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('Reporte_de_procesos'.date("YmdHi").'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
