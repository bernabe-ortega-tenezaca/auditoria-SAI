<?php
    include('../app/config/config.php');
    include('../app/config/conexion.php');

    session_start();
    if (isset($_SESSION["session_email"])) {
        session_destroy();
        header("location: ".$URL."/login/");
    } else{
        header("location: ".$URL."/login/");
    }