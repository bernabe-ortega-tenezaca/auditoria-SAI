<?php
    //include '../../app/config/config.php';
    //include '../../app/config/conexion.php';

    $query = $PDO->prepare('SELECT * FROM usuario');
    $query->execute();

    $registros = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_usuarios = $query->rowCount();