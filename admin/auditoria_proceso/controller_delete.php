<?php
    include '../../app/config/config.php';
    include '../../app/config/conexion.php';

    $id = $_POST['id'];

    $sentencia = $PDO->prepare('DELETE FROM auditoria_interna WHERE id = $id');
    $sentencia->bindParam(':id', $id);

    if ($sentencia->execute()) {
        echo "<script>alert('Usuario eliminado exitosamente')</script>";
        header("location: ".$URL."/admin/auditorias/");
    }else {
        echo "<script>alert('Error al eliminar la auditoria seleccionada')</script>";
    }