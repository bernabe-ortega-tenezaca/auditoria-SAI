<?php
    include '../../app/config/config.php';
    include '../../app/config/conexion.php';

    $id = $_POST['id'];

    $sentencia = $PDO->prepare('DELETE FROM usuario WHERE id = :id');
    $sentencia->bindParam(':id', $id);

    if ($sentencia->execute()) {
        echo "<script>alert('Usuario eliminado exitosamente')</script>";
        header("location: ".$URL."/admin/usuarios/");
    }else {
        echo "<script>alert('Error al eliminar el usuario')</script>";
    }