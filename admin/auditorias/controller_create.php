<?php
    include '../../app/config/config.php';
    include '../../app/config/conexion.php';

    $id_empleado = $_POST['id_empleado'];
    $objetivo = $_POST['objetivo'];
    $alcance = $_POST['alcance'];
    $abierto = "1";

    session_start();

    try {
        $sentencia = $PDO->prepare('INSERT INTO auditoria_interna 
                                    (id_empleado, objetivo, alcance, abierto) 
                                    VALUES (:id_empleado,:objetivo,:alcance,:abierto)');

        $sentencia->bindParam(':id_empleado',$id_empleado);
        $sentencia->bindParam(':objetivo',$objetivo);
        $sentencia->bindParam(':alcance',$alcance);
        $sentencia->bindParam(':abierto',$abierto);

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

    header("location:".$URL."/admin/auditorias/index.php");