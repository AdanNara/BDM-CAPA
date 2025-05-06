<?php

require 'src/classes/Database.php';
$config = require 'src/classes/configDB.php';

$dbConnection = new Database($config['database']);

$ID = $_GET['ID'] ?? null;
$ACCION = $_GET['ACCION'] ?? null;


if($ACCION == 2){//MOSTRAR PUBLICACIONES POR USUARIO
    $query = 'CALL sp_GestionPublicaciones(6, null , null, null, null, null, :usuario, null)';
    $params = [':usuario' => $ID];
}
else if($ID){//MOSTRAR PUBLICACIONES POR JUEGO
    $query = 'CALL sp_GestionPublicaciones(5, null , null, null, null, null, null, :videojuego)';
    $params = [':videojuego' => $ID];
}else{//MOSTRAR PUBLICACIONES SIN FILTROS
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




