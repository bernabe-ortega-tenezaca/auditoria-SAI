<?php
    include '../../app/config/config.php';
    include '../../app/config/conexion.php';

    $query = $PDO->prepare('SELECT * FROM auditoria_interna');
    $query->execute();

    $registros = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_auditorias = $query->rowCount();