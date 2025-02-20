<?php
    $password = '123';
    $password_db = '$2y$10$U9sjZAKho2JfLeMV5LXmkeMFum9eOyxequ7.QcHg9MH5fjm2PBJQO';
    echo password_hash($password, PASSWORD_DEFAULT)."\n";

    if ((password_verify($password, $password_db))) {
        echo "Usuario correcto";
    }else{
        echo "Usuario incorrecto";
    }
?>


