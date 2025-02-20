<?php
    include('../app/config/config.php');
    include('../app/config/conexion.php');

    $correo = $_POST["correo"];
    $password = $_POST["password"];

    $query_login = $PDO->prepare("SELECT * FROM usuario WHERE correo = '$correo'");
    $query_login->execute();

    $usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);

    $contador = 0;
    foreach ($usuarios as $usuario) {
        $contador = $contador + 1;
        $nombre = $usuario["nombres"];
        echo $password_db = $usuario['contrasena'];
    }

    if ($contador == 0) {
        // echo "Error en las credenciales";
        header("location: ".$URL."/login/error.php");
    } else {
        if ((password_verify($password, $password_db))) {
            session_start();
            $_SESSION["session_email"] = $correo;
            $_SESSION["session_nombre"] = $nombre;
            header("location: ".$URL."/admin");
        }else{
            header("location: ".$URL."/login/error.php");
        }
    }