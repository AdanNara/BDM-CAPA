<?php

require 'src/classes/Database.php';
$config = require 'src/classes/configDB.php';

$dbConnection = new Database($config['database']);

$IDVideojuego = $_GET['ID'] ?? null;

if($IDVideojuego){
    $query = 'CALL sp_GestionPublicaciones(5, null , null, null, null, null, null, :videojuego)';
    $params = [':videojuego' => $IDVideojuego];
}else{
    $query = 'CALL sp_GestionPublicaciones(3, null , null, null, null, null, null, null)';
    $params = [];
}

//$query = 'CALL sp_GestionPublicaciones(3, null , null, null, null, null, null, null)';

$listaPublicaciones = [];
    
$result = $dbConnection->query($query, $params);
    
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




