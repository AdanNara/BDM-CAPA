<?php

require_once 'src/classes/Database.php';
$config = require 'src/classes/configDB.php';

$dbConnection = new Database($config['database']);

// Llamada directa al SP sin parámetros
$query = 'CALL sp_GestionUsuarios(6, NULL, NULL, NULL, NULL, NULL, NULL)';

$listaUsuariosTop = [];

$result = $dbConnection->query($query, []);

foreach($result as $value) {
    $listaUsuariosTop[] = [
        'Usuario' => $value->NombreUsuario, 
        'TotalPublicaciones' => $value->TotalPublicaciones 
    ];
}

return $listaUsuariosTop;