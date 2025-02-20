<?php
    include '../../app/config/config.php';
    include '../../app/config/conexion.php';

    $fecha = "2025-01-01";
    $noAuditoria = $_POST['noAuditoria'];
    $nivelCriticidad = $_POST['nivelCriticidad'];
    $importancia = $_POST['importancia'];
    $expectativa = $_POST['expectativa'];
    $hallazgo = $_POST['hallazgo'];
    $fUltimaAuditoria = $_POST['fUltimaAuditoria'];
    $reqNormativos = $_POST['reqNormativos'];
    $nivelRiesgo = $_POST['nivelRiesgo'];
    $actividadControl = $_POST['actividadControl'];
    $fCorte = $_POST['fCorte'];
    $fInicio = $_POST['fInicio'];
    $fFin = $_POST['fFin'];
    $entregables = $_POST['entregables'];
    $recursos = $_POST['recursos'];

    session_start();
    try {
        $sentencia = $PDO->prepare("INSERT INTO auditoria_procesos 
                                      (noAuditoria, nivelCriticidad, importancia, expectativa, hallazgo, fUltimaAuditoria, reqNormativos, nivelRiesgo, actividadControl, fCorte, fInicio, fFin, entregables, recursos) 
                                      VALUES ( :noAuditoria,:nivelCriticidad,:importancia,:expectativa,:hallazgo,:fUltimaAuditoria,:reqNormativos,:nivelRiesgo,:actividadControl, :fCorte, :fInicio, :fFin, :entregables,:recursos)");

        $sentencia->bindParam(':noAuditoria',$noAuditoria);
        $sentencia->bindParam(':nivelCriticidad',$nivelCriticidad);
        $sentencia->bindParam(':importancia',$importancia);
        $sentencia->bindParam(':expectativa',$expectativa);
        $sentencia->bindParam(':hallazgo',$hallazgo);
        $sentencia->bindParam(':fUltimaAuditoria',$fUltimaAuditoria);
        $sentencia->bindParam(':reqNormativos',$reqNormativos);
        $sentencia->bindParam(':nivelRiesgo',$nivelRiesgo);
        $sentencia->bindParam(':actividadControl',$actividadControl);
        $sentencia->bindParam(':fCorte',$fCorte);
        $sentencia->bindParam(':fInicio',$fInicio);
        $sentencia->bindParam(':fFin',$fFin);
        $sentencia->bindParam(':entregables',$entregables);
        $sentencia->bindParam(':recursos',$recursos);
        $sentencia->execute();

        if ($sentencia->execute()) {
            $_SESSION['msg'] = "Información registrada exitosamente";
            $_SESSION['icon'] = "success";
        } else {
            $_SESSION['msg'] = "Se ha producido un error";
            $_SESSION['icon'] = "error";
        }
    } catch (PDOException $e) {
        $_SESSION['msg'] = "Error en la base de datos: " . $e->getMessage();
        $_SESSION['icon'] = "error";
    }

    header("location: " . $URL . "/admin/procesos/index.php");