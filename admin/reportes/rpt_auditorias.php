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
$pdf->SetTitle('CACPE SAI - Reporte de auditorias');
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
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

$html = '
    <p><b>LISTADO DE AUDITORIAS</b><br><b>Fecha de corte: </b>'.date("D Y-m-d H:i:s").'<br>
    </p>
    <table cellspacing="0" cellpadding="1" border="1" width="100%">
        <tr>
            <td style="background-color: #a6e1ec; text-align: center" width="4%"> Nro</td>
            <td style="background-color: #a6e1ec; text-align: center" width="23%"> Objetivo</td>
            <td style="background-color: #a6e1ec; text-align: center" width="23%"> Alcance</td>
            <td style="background-color: #a6e1ec; text-align: center" width="15%"> Iniciado por</td>
            <td style="background-color: #a6e1ec; text-align: center" width="16%"> Correo</td>
            <td style="background-color: #a6e1ec; text-align: center" width="7%"> Estado</td>
            <td style="background-color: #a6e1ec; text-align: center" width="12%"> Inicio</td>
        </tr>';

$query = $PDO->prepare('SELECT
                                    auditoria_interna.objetivo, 
                                    auditoria_interna.alcance, 
                                    auditoria_interna.abierto, 
                                    auditoria_interna.created_at, 
                                    Usuario.apellidos, 
                                    Usuario.nombres, 
                                    Usuario.correo
                                FROM
                                    auditoria_interna
                                    INNER JOIN
                                    Usuario
                                    ON 
                                        auditoria_interna.id_empleado = Usuario.id');
$query->execute();

$contador = 0;
$registros = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($registros as $key => $value) {
    $empleado = $value['nombres'] . ' ' . $value['apellidos'];
    $objetivo = $value['objetivo'];
    $alcance = $value['alcance'];
    $estado ='Cerrado'; if($value['abierto']) $estado = 'Abierto';
    $correo = $value['correo'];
    $registro = $value['created_at'];
    $contador++;
    $html .= '
        <tr>
            <td style="text-align: center" width="4%">'.$contador.'</td>
            <td width="23%">'.$objetivo.'</td>
            <td width="23%">'.$alcance.'</td>
            <td width="15%">'.$empleado.'</td>
            <td width="16%">'.$correo.'</td>
            <td style="text-align: center" width="7%">'.$estado.'</td>
            <td style="text-align: center" width="12%">'.substr($registro, 0, 10).'</td>
        </tr>
    ';
}


$html .= '
        
    </table>
';

$pdf->writeHTML($html, true, false, true, false, '');

//Close and output PDF document
$pdf->Output('Reporte_de_auditorias'.date("YmdHi").'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+