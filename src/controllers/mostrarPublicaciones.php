<?php

require 'src/classes/Database.php';
$config = require 'src/classes/configDB.php';
$dbConnection = new Database($config['database']);

$query = 'CALL sp_GestionPublicaciones(3, null , null, null, null, null, null, null)';

$listaPublicaciones = [];

$result = $dbConnection->query($query, []);

foreach($result as $value) {
    $listaPublicaciones [] = [
        'ID' => $value->ID,
        'Titulo' => $value->Titulo,
        'Descripcion' => $value->Descr,
        'Video' => $value->Video,
        'Calif' => $value->Calif,
        'Videojuego' => $value->Videojuego,
        'Usuario' => $value->Usuario,
 
    ];
}

return $listaPublicaciones;


