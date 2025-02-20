<?php
    include '../../app/config/config.php';
    include '../../app/config/conexion.php';

    $nombre_resp = $_POST['nombre_res'];

    session_start();
    try {
        $sentencia = $PDO->prepare('INSERT INTO responsables(nombres) VALUES (:nombres)');
        $sentencia->bindParam(':nombres', $nombre_resp);

        if ($sentencia->execute()) {
            $_SESSION['msg'] = "Información registrada exitosamente";
            $_SESSION['icon'] = "success";
        } else {
            $_SESSION['msg'] = "Se ha producido un error";
            $_SESSION['icon'] = "error";
        }
    }catch (Exception $e) {
        $_SESSION['msg'] = "Error en la base de datos: " . $e->getMessage();
        $_SESSION['icon'] = "error";
    }

    header("location: ".$URL."/admin/procesos/create.php");