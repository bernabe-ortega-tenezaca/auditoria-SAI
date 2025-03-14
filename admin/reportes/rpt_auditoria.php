<?php
// Include the main TCPDF library (search for installation path).
require_once('../../app/templates/TCPDF/tcpdf.php');
include '../../app/config/config.php';
include '../../app/config/conexion.php';

$id = isset($_GET['id']) ? $_GET['id'] : 1;
// create new PDF document
$PDF_PAGE_ORIENTATION = 'L';
$pdf = new TCPDF($PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$PDF_CREATOR = 'CACPE - SAI';
// set document information
$pdf->SetCreator($PDF_CREATOR);
$pdf->SetAuthor('Marco Calle');
$pdf->SetTitle('CACPE SAI - Reporte');
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
$nombre_auditor = "";
$nombre_gerente = "Dr. Edgar Acuña Carrasco";
try {
    $queryA = $PDO->prepare('SELECT
                                        auditoria_interna.objetivo, 
                                        auditoria_interna.alcance, 
                                        auditoria_interna.created_at, 
                                        Usuario.apellidos, 
                                        Usuario.nombres
                                    FROM
                                        auditoria_interna INNER JOIN Usuario
                                        ON auditoria_interna.id_empleado = Usuario.id
                                    WHERE
                                        auditoria_interna.id = :id');

    $queryA->bindParam(':id', $id, PDO::PARAM_INT);
    $queryA->execute();
    $registrosA = $queryA->fetchAll(PDO::FETCH_ASSOC);

    if (count($registrosA) > 0) {
        foreach ($registrosA as $value) {
            $objetivo = $value['objetivo'];
            $alcance = $value['alcance'];
            $fecha_inicio = $value['created_at'];
            $fecha_fin = $value['created_at'];
            $nombre_auditor = $value['apellidos'].' '.$value['nombres'];
        }
        $html = '
            <h3 style="text-align: center">PRIORIZACIÓN DEL PLAN DE AUDITORIA INTERNA</h3>
            <h4 style="text-align: center">Cooperativa de Ahorro y Crédito y de la Pequeña Empresa - CACPE Pastaza</h4>
            <table border="1" width="100%" style="padding: 5px; vert-align: middle">
               <tr>
                  <td width="25%">FECHA DE INICIO</td>
                  <td width="75%">'.$fecha_inicio.'</td>
               </tr>
               <tr>
                  <td>FECHA DE FIN</td>
                  <td width="75%">'.$fecha_fin.'</td>
               </tr>
               <tr>
                  <td>OBJETIVO</td>
                  <td width="75%">'.$objetivo.'</td>
                </tr>
               <tr>
                  <td>ALCANCE</td>
                  <td width="75%">'.$alcance.'</td>
               </tr>
               <tr>
                  <td>NOMBRE DEL AUDITOR</td>
                  <td width="75%">'.$nombre_auditor.'</td>
               </tr>
            </table>
        ';

        $pdf->writeHTML($html, true, false, true, false, '');
    } else {
        echo "No se encontraron registros.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdf->SetFont('times', '', 8);

$html = '
    <h3 style="text-align: center">CRITERIOS DE PRIORIZACIÓN</h3>
    <table border="1" width="100%" style="padding: 5px;">
        <tr style="background-color: #a0cfee; text-align:center;">
            <td width="3%">No</td>
            <!--<td>Código de proceso</td>
            <td>Tipo de Proceso</td>
            <td>Línea</td>
            <td>Nombre del proceso</td>
            <td>Área</td>
            <td>Responsable</td> -->
            <td width="6%">Nivel de criticidad de riesgos asociados al proceso<br>30%</td>
            <td width="7%">Importancia estratégica del proceso<br>20%</td>
            <td width="7%">Expectativas de la alta Gerencia / Órganos de Gobierno<br>20%</td>
            <td width="8%">Hallazgo y/o oportunidades (alto y media) de AI Y AEXT SEPS<br>15%</td>
            <td width="8%">Fecha de Última Auditoría y/o inicio del ciclo de rotación<br>15%</td>
            <td width="8%">Requerimientos Normativos Para la Auditoria Interna<br>50%</td>
            <td width="6%" style="text-align: center">Nivel de riesgos AI</td>
            <td width="10%" style="vertical-align: center">Actividad de Control propuesta</td>
            <td width="6%">Fecha corte</td>
            <td width="6%">Fecha inicio</td>
            <td width="6%">Fecha fin</td>
            <td width="11%">Entregable</td>
            <td width="11%">Recursos</td>
        </tr>';

try {
    $consulta = $PDO->prepare('SELECT
                                        auditoria_procesos.id, 
                                        auditoria_procesos.noAuditoria, 
                                        auditoria_procesos.nivelCriticidad, 
                                        auditoria_procesos.importancia, 
                                        auditoria_procesos.expectativa, 
                                        auditoria_procesos.hallazgo, 
                                        auditoria_procesos.fUltimaAuditoria, 
                                        auditoria_procesos.reqNormativos, 
                                        auditoria_procesos.nivelRiesgo, 
                                        auditoria_procesos.actividadControl, 
                                        auditoria_procesos.fCorte, 
                                        auditoria_procesos.fInicio, 
                                        auditoria_procesos.fFin, 
                                        auditoria_procesos.entregables, 
                                        auditoria_procesos.recursos, 
                                        auditoria_procesos.created_at
                                    FROM
                                        auditoria_procesos
                                    WHERE
                                        auditoria_procesos.noAuditoria = :id');

    $consulta->bindParam(':id', $id, PDO::PARAM_INT);
    $consulta->execute();

    $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $contador = 0;
    $criticidad = "Riesgo bajo";
    $importante = "De apoyo";
    $expectante = "No se presentan expectativas";
    $hallazgos = "Hallazgo bajo";
    $nivel = "Muy bajo";
    $colornivel = "#abebc6";
    foreach ($registros as $value) {
        $contador++;
        $codigo = $value['id'];
        $noAuditoria = $value['noAuditoria'];
        $nivelCriticidad = $value['nivelCriticidad'];
        $importancia = $value['importancia'];
        $expectativa = $value['expectativa'];
        $hallazgo = $value['hallazgo'];
        $fUltimaAuditoria = $value['fUltimaAuditoria'];
        $reqNormativos = $value['reqNormativos'];
        $nivelRiesgo = $value['nivelRiesgo'];
        $actividadControl = $value['actividadControl'];
        $fCorte = $value['fCorte'];
        $fInicio = $value['fInicio'];
        $fFin = $value['fFin'];
        $entregables = $value['entregables'];
        $recursos = $value['recursos'];
        $registro = $value['created_at'];

        switch ($nivelCriticidad) {
            case 2:
                $criticidad = "Riesgo moderado";
                break;
            case 3:
                $criticidad = "Riesgo alto";
                break;
            case 4:
                $criticidad = "Riesgo extremo";
                break;
        }

        switch ($importancia) {
            case 2:
                $importante = "Riesgo operativo";
                break;
            case 3:
                $importante = "Estratégicos";
                break;
        }

        switch ($expectativa) {
            case 2:
                $expectante = "Gerente de área";
                break;
            case 3:
                $expectante = "Gerencia";
                break;
            case 4:
                $expectante = "Órganos de Gobierno";
                break;
        }

        switch ($hallazgo) {
            case 2:
                $hallazgos = "Hallazgo medio";
                break;
            case 3:
                $hallazgos = "Hallazgo alto";
                break;
            case 4:
                $hallazgos = "Hallazgo extremo";
                break;
        }

        switch ($nivelRiesgo) {
            case 2:
                $nivel = "Bajo";
                $colornivel = "#52be80";
                break;
            case 3:
                $nivel = "Medio";
                $colornivel = "#f9e79f";
                break;
            case 4:
                $nivel = "Alto";
                $colornivel = "#e74c3c";
                break;
        }


        $pdf->SetFont('times', '', 8);
        $html .= '
        <tr>
            <td style="text-align: center">' . $contador . '</td>
            <!--<td>' . $codigo . '</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td> . $noAuditoria . </td>-->
            <td>' . $criticidad . '</td>
            <td>' . $importante . '</td>
            <td>' . $expectante . '</td>
            <td>' . $hallazgos . '</td>
            <td>' . $fUltimaAuditoria . '</td>
            <td style="text-align: center">' . $reqNormativos . '</td>
            <td style="background-color: '. $colornivel .'">' . $nivel . '</td>
            <td>' . $actividadControl . '</td>
            <td style="text-align: center">' . $fCorte . '</td>
            <td style="text-align: center">' . $fInicio . '</td>
            <td style="text-align: center">' . $fFin . '</td>
            <td>' . $entregables . '</td>
            <td>' . $recursos . '</td>
        </tr>
    ';
    }
    $html .= '</table>';
    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 11);
    $html ='
        <!--<h3 style="text-align: center">VALIDACIÓN</h3>-->
        <table border="1" width="100%" style="text-align: center;">
            <tbody>
                <tr>
                    <td colspan="3"><h3>VALIDACIÓN</h3></td>
                </tr>
                <tr style="text-align:center;">
                    <td width="35%"><p></p><p></p><p></p><p></p><p></p></td>
                    <td width="35%"></td>
                    <td width="30%" rowspan="3"></td>
                </tr>
                <tr>
                    <td><b>'.$nombre_auditor.'</b></td>
                    <td><b>'.$nombre_gerente.'</b></td>
                </tr>
                <tr>
                    <td>Firmado por</td>
                    <td>Aprobado por</td>
                </tr>
            </tbody>
        </table>
    ';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->write2DBarcode('http://www.cacpepas.fin.ec/', 'QRCODE,H', 230, 36, 28, 28, $style, 'N');
    $pdf->Text(210, 65, 'CACPE SAI-Documento electrónico');

} catch (PDOException $e) {
    echo $e->getMessage();
}

//Close and output PDF document
$pdf->Output('Auditoria'.date("YmdHi").'.pdf', 'I');