<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');

    $id = $_POST['id_post'];
    $nombre = $_POST['nombres'];
    $apellido = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $tipo = $_POST['tipo'];

    session_start();
    try{
        $sentencia = $PDO->prepare("UPDATE usuario SET apellidos = :apellido, nombres = :nombre, correo = :correo, tipo = :tipo WHERE id = :id");
        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':apellido', $apellido);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':correo', $correo);
        $sentencia->bindParam(':tipo', $tipo);

        if ($sentencia->execute()) {
            $_SESSION['msg'] = "Información actualizada exitosamente";
            $_SESSION['icon'] = "success";
        }else{
            echo "<script>alert('Error al actualizar el usuario')</script>";
            $_SESSION['msg'] = "Error al actualizar el usuario";
            $_SESSION['icon'] = "error";
        }
    }catch (PDOException $e){
        error_log("Error en la base de datos: " . $e->getMessage());
        $_SESSION['msg'] = "Error en la base de datos";
        $_SESSION['icon'] = "error";
    }

    header("location: ".$URL."/admin/usuarios/");
