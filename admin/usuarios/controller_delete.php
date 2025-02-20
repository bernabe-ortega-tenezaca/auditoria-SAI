<?php
    include '../../app/config/config.php';
    include '../../app/config/conexion.php';

    $id = $_POST['id'];

    $sentencia = $PDO->prepare('DELETE FROM usuario WHERE id = :id');
    $sentencia->bindParam(':id', $id);

    session_start();
    try {
        if ($sentencia->execute()) {
            $_SESSION['msg'] = "Usuario eliminado exitosamente";
            $_SESSION['icon'] = 'success';

        }else {
            $_SESSION['msg'] = "Error al eliminar el usuario";
            $_SESSION['msg'] = "error";
        }
    }catch (Exception $e) {
        $_SESSION['msg'] = "Error en la base de datos: " . $e->getMessage();
        $_SESSION['icon'] = "warning";
    }

    header("location: ".$URL."/admin/usuarios/");