<?php
    include '../../app/config/config.php';
    include '../../app/config/conexion.php';

    $codigo = $_POST['codigo'];
    $tipo = $_POST['tipo'];
    $linea = $_POST['linea'];
    $nombre = $_POST['nombre'];
    $area = $_POST['area'];
    $responsable = $_POST['responsable'];

    session_start();
    try {
        $sentencia = $PDO->prepare("INSERT INTO proceso (codigo,tipo,linea,nombre,area,responsable) VALUES (:codigo,:tipo,:linea,:nombre,:area,:responsable)");
        $sentencia->bindParam(':codigo',$codigo);
        $sentencia->bindParam(':tipo',$tipo);
        $sentencia->bindParam(':linea',$linea);
        $sentencia->bindParam(':nombre',$nombre);
        $sentencia->bindParam(':area',$area);
        $sentencia->bindParam(':responsable',$responsable);

        if ($sentencia->execute()) {
            $_SESSION['msg'] = "Información registrada exitosamente";
            $_SESSION['icon'] = "success";
        }else{
            $_SESSION['msg'] = "Se ha producido un error";
            $_SESSION['icon'] = "error";
        }
    } catch (PDOException $e) {
        $_SESSION['msg'] = "Error en la base de datos: ";
        $_SESSION['icon'] = "warning";
    }
    header("location: ".$URL."/admin/procesos/index.php");

