<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');

    $codigo = $_POST['id_post'];
    $tipo = $_POST['tipo'];
    $linea = $_POST['linea'];
    $nombre = $_POST['nombre'];
    $area = $_POST['area'];
    $responsable = $_POST['responsable'];

    session_start();
    try{
        $sentencia = $PDO->prepare("UPDATE proceso SET tipo=:tipo, linea =:linea, nombre =:nombre, area =:area, responsable =:responsable  WHERE codigo =:codigo");
        $sentencia->bindParam(':codigo', $codigo);
        $sentencia->bindParam(':tipo', $tipo);
        $sentencia->bindParam(':linea', $linea);
        $sentencia->bindParam(':nombre', $nombre);
        $sentencia->bindParam(':area', $area);
        $sentencia->bindParam(':responsable', $responsable);

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

    header("location: ".$URL."/admin/procesos/");