<?php
    include '../../app/config/config.php';
    include '../../app/config/conexion.php';

    $nombre_resp = $_POST['nombre_res'];

    $sentencia = $PDO->prepare('INSERT INTO responsables(nombres) VALUES (:nombres)');
    $sentencia->bindParam(':nombres', $nombre_resp);

    if ($sentencia->execute()) {
        header("location: ".$URL."/admin/procesos/create.php");
        session_start();
        $_SESSION['msg'] = "Información registrada exitosamente";
    }else{
        session_start();
        $_SESSION['msg'] = "Se ha producido un error";
    }