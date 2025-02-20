<?php
    include '../../app/config/config.php';
    include '../../app/config/conexion.php';

    $nombre = $_POST['nombres'];
    $apellido = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $verficar_password = $_POST['verficar_password'];
    $tipo = $_POST['tipo'];
    $habilitado = $estado;

    $password_encriptado = password_hash($contrasena, PASSWORD_DEFAULT);
    session_start();

    if ($contrasena == $verficar_password) {
        try {
            $sentencia = $PDO->prepare("INSERT INTO usuario (apellidos, nombres, correo, contrasena, tipo, habilitado) 
                                                           VALUES (:apellido, :nombre, :correo,:contrasena,:tipo, :habilitado)");
            $sentencia->bindParam(':apellido', $apellido);
            $sentencia->bindParam(':nombre', $nombre);
            $sentencia->bindParam(':correo', $correo);
            $sentencia->bindParam(':contrasena', $password_encriptado);
            $sentencia->bindParam(':tipo', $tipo);
            $sentencia->bindParam(':habilitado', $habilitado);

            if ($sentencia->execute()) {
                $_SESSION['msg'] = "Información registrada exitosamente";
                $_SESSION['icon'] = "success";
            }else{
                $_SESSION['msg'] = "Se ha producido un error";
                $_SESSION['icon'] = "error";
            }
        } catch (PDOException $e){
            $_SESSION['msg'] = "Error en el registro de datos el correo ya se encuentra registrado";
            $_SESSION['icon'] = "warning";
        }
    } else {
        $_SESSION['msg'] = "Error en credenciales";
        $_SESSION['icon'] = "warning";
    }
    header("location: ".$URL."/admin/usuarios/");