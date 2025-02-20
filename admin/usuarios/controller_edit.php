<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');

    $id = $_POST['id'];
    $nombre = $_POST['nombres'];
    $apellido = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $tipo = $_POST['tipo'];
    $habilitado = $estado;

    $sentencia = $PDO->prepare("UPDATE usuario SET apellidos = :apellido, nombres = :nombre, correo = :correo, tipo = :tipo, habilitado = :habilitado WHERE id = :id");
    $sentencia->bindParam(':apellido', $apellido);
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':correo', $correo);
    $sentencia->bindParam(':tipo', $tipo);
    $sentencia->bindParam(':habilitado', $habilitado);
    $sentencia->bindParam(':id', $id);
    if ($sentencia->execute()) {
        session_start();
        header("location: ".$URL."/admin/usuarios/");
        $_SESSION['msg'] = "Información actualizada exitosamente";
    }else{
        echo "<script>alert('Error al actualizar el usuario')</script>";
    }