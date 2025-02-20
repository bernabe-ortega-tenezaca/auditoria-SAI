<?php
    include '../../app/config/config.php';
    include '../../app/config/conexion.php';

    $id_post = $_POST['id_post'];

    $sentencia = $PDO->prepare('DELETE FROM auditoria_interna WHERE id =:id');
    $sentencia->bindParam(':id', $id_post);

    if ($sentencia->execute()) {
        echo "<script>alert('Usuario eliminado exitosamente')</script>";
        header("location: ".$URL."/admin/auditorias/");
    }else {
        echo "<script>alert('Error al eliminar la auditoria seleccionada')</script>";
    }