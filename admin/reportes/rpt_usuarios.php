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
$pdf->SetTitle('CACPE SAI - Reporte de usuarios');
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
    <p><b>LISTADO DE USUARIOS</b><br><b>Fecha de corte: </b>'.date("D Y-m-d H:i:s").'<br>
    </p>
    <table border="1" colspan="6" width="100%">
        <tr>
            <td style="background-color: #c0c0c0; text-align: center" width="30"> Nro</td>
            <td style="background-color: #c0c0c0; text-align: center"> Apellidos</td>
            <td style="background-color: #c0c0c0; text-align: center"> Nombres</td>
            <td style="background-color: #c0c0c0; text-align: center"> Correo</td>
            <td style="background-color: #c0c0c0; text-align: center"> Rol</td>
            <td style="background-color: #c0c0c0; text-align: center"> Registro</td>
        </tr>';

$query = $PDO->prepare('SELECT * FROM usuario');
$query->execute();

$contador = 0;
$registros = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($registros as $key => $value) {
    $apellidos = $value['apellidos'];
    $nombres = $value['nombres'];
    $correo = $value['correo'];
    $rol = $value['tipo'];
    $registro = $value['created_at'];
    $contador++;
    $html .= '
        <tr>
            <td style="text-align: center" width="30">'.$contador.'</td>
            <td>'.$apellidos.'</td>
            <td>'.$nombres.'</td>
            <td>'.$correo.'</td>
            <td>'.$rol.'</td>
            <td>'.substr($registro, 0, 10).'</td>
        </tr>
    ';
}


$html .= '
        
    </table>
';

$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('Reporte_de_usuarios'.date("YmdHi").'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+