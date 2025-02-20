<?php
    //variables de conexión local
    define('BD_SERVIDOR', 'localhost');
    define('BD_USUARIO', 'root');
    define('BD_PASSWORD', '');
    define('BD_SISTEMA', 'cacpeai');

//variables de conexión servidor
/*
    define('BD_SERVIDOR', 'localhost');
    define('BD_USUARIO', 'root');
    define('BD_PASSWORD', '');
    define('BD_SISTEMA', 'cacpeAI');
*/

//localmente
$URL = 'http://localhost/www.cacpepas.fin.ec';

//servidor
//$URL = 'http://www.cacpepas.fin.ec';

date_default_timezone_set('America/Guayaquil');
setlocale(LC_ALL, 'es_ES.UTF-8');
$fechaHora = date('Y-m-d H:i:s');
$estado = 1;