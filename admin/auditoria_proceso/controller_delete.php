<?php
    include '../../app/config/config.php';
    include '../../app/config/conexion.php';

    $id = $_POST['id'];

    session_start();

    try {
        $sentencia = $PDO->prepare('DELETE FROM auditoria_interna WHERE id = :id');
        $sentencia->bindParam(':id', $id);

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

    header("location: ".$URL."/admin/auditorias/");