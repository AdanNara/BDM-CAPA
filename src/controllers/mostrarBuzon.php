<?php
    require 'src/classes/Database.php';
    $config = require 'src/classes/configDB.php';
    
    $dbConnection = new Database($config['database']);

    //OBTENEMOS LA LISTA DE REPORTES PENDIENTES

    $queryPendientes = 'CALL sp_GestionReportes(2, NULL, NULL, NULL, NULL)';

    $listaPendientes = [];

    $resultPendientes = $dbConnection->query($queryPendientes, []);

    foreach($resultPendientes as $value){
        $listaPendientes [] = [
            'ID' => $value->ID,
            'Tipo' => $value->Tipo,
            'Descripcion' => $value->Descripcion,
            'Usuario' => $value->Usuario,
            'FechaHora' => $value->FechaHora,
            'Estado' => $value->Estado
        ];
    }

    //LIMPIAMOS 
   
    $queryRevisados = 'CALL sp_GestionReportes(3, NULL, NULL, NULL, NULL)';

    $listaRevisados = [];

    $resultRevisados = $dbConnection->query($queryRevisados, []);

    foreach($resultRevisados as $value){
        $listaRevisados [] = [
            'ID' => $value->ID,
            'Tipo' => $value->Tipo,
            'Descripcion' => $value->Descripcion,
            'Usuario' => $value->Usuario,
            'FechaHora' => $value->FechaHora,
            'Estado' => $value->Estado
        ];
    }

    //RETORNAMOS UN ARREGLO CON LOS ARREGLOS DE CADA CONSULTA
    return [
        'pendientes'=>$listaPendientes,
        'revisados'=>$listaRevisados
    ];
?>