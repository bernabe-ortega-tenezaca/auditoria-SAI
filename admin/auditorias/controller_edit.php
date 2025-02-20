<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');


    $id = $_POST['id'];
    $id_empleado = $_POST['id_empleado'];
    $objetivo = $_POST['objetivo'];
    $alcance = $_POST['alcance'];
    $estado = "1";

    session_start();

    try {
        $sentencia = $PDO->prepare("UPDATE auditoria_interna SET id_empleado = :id_empleado, objetivo = :objetivo, alcance = :alcance, estado = :estado WHERE id = :id");

        $sentencia->bindParam(':id', $id);
        $sentencia->bindParam(':id_empleado', $id_empleado);
        $sentencia->bindParam(':objetivo', $objetivo);
        $sentencia->bindParam(':alcance', $alcance);
        $sentencia->bindParam('estado', $estado);

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