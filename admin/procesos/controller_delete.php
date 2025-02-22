<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');

    $codigo = $_POST['id_post'];

session_start();
try{
    $sentencia = $PDO->prepare("DELETE FROM proceso WHERE codigo =:codigo");
    $sentencia->bindParam(':codigo', $codigo);

    if ($sentencia->execute()) {
        $_SESSION['msg'] = "Información eliminada exitosamente";
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
