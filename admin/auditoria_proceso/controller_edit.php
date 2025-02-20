<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');


    $id = $_POST['id'];
    $id_empleado = $_POST['id_empleado'];
    $objetivo = $_POST['objetivo'];
    $alcance = $_POST['alcance'];
    $estado = "1";

    $sentencia = $PDO->prepare("UPDATE auditoria_interna SET id_empleado = :id_empleado, objetivo = :objetivo, alcance = :alcance, estado = :estado WHERE id = :id");

    $sentencia->bindParam(':id',$id);
    $sentencia->bindParam(':id_empleado',$id_empleado);
    $sentencia->bindParam(':objetivo',$objetivo);
    $sentencia->bindParam(':alcance',$alcance);
    $sentencia->bindParam('estado',$estado);

    if ($sentencia->execute()) {
        session_start();
        header("location: ".$URL."/admin/auditorias/");
        $_SESSION['msg'] = "Información actualizada exitosamente";
    }else{
        echo "<script>alert('Error al actualizar el usuario')</script>";
    }