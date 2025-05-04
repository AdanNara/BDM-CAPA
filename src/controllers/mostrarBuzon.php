<?php
    require 'src/classes/Database.php';
    $config = require 'src/classes/configDB.php';
    
    $dbConnection = new Database($config['database']);

    $query = 'CALL sp_GestionReportes(2, NULL, NULL, NULL, NULL)';

    $listaBuzon = [];

    $result = $dbConnection->query($query, []);

    foreach($result as $value){
        $listaBuzon [] = [
            'ID' => $value->ID,
            'Tipo' => $value->Tipo,
            'Descripcion' => $value->Descripcion,
            'Usuario' => $value->Usuario,
            'FechaHora' => $value->FechaHora,
            'Estado' => $value->Estado
        ];
    }

    return $listaBuzon;
?>