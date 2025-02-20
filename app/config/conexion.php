<?php
    //include ('config.php');
    $servidor = "mysql:dbname=".BD_SISTEMA.";host=".BD_SERVIDOR;

    try {
        $PDO = new PDO($servidor, BD_USUARIO, BD_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        //echo "<script>alert('conexión exitosa a la base de datos')</script>";
    }catch (PDOException $e) {
        echo "<script>alert('cerror de conexión a la base de datos')</script>";
    }