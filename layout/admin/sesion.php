<?php
    session_start();
    if (isset($_SESSION["session_email"])) {
        $_SESSION["session_email"];
    } else {
        echo "No existe session, pase por login";
        header("location: ".$URL."/login/");
    }
?>