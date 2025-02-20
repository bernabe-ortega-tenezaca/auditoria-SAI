<?php
    if (isset($_SESSION["session_email"])) {
        $_SESSION["session_email"];
    } else {
        echo "No existe session, pase por login";
        header("location: ".$URL."/login/");
    }
    $email_sesion = $_SESSION["session_email"];
    $query = $PDO->prepare("SELECT * FROM usuario WHERE correo = '$email_sesion' AND habilitado = 1");
    $query->execute();

    $sesion_usuarios =$query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($sesion_usuarios as $sesion_usuario) {
        $sesion_usuario_id = $sesion_usuario['id'];
        $sesion_usuario_apellidos = $sesion_usuario['apellidos'];
        $sesion_usuario_nombres = $sesion_usuario['nombres'];
        $sesion_usuario_correo = $sesion_usuario['correo'];
        $sesion_usuario_tipo = $sesion_usuario['tipo'];
        $sesion_usuario_habilitado = $sesion_usuario['habilitado'];
        $sesion_usuario_created = $sesion_usuario['created_at'];
    }
?>