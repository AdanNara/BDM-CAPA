<?php 
    
    require 'src/classes/Database.php';
    $config = require 'src/classes/configDB.php';
    
    $dbConnection = new Database($config['database']);

$accion = $_GET['accion'] ?? 1;

if($accion == 1){
    $query = 'CALL sp_GestionConsultas(1);';
}else{
    $query = 'CALL sp_GestionConsultas(2);';
}

$listaConsultas = [];
    
$result = $dbConnection->query($query, []);
    
    foreach($result as $value) {
        $listaConsultas [] = [
            'ID' => $value->ID,
            'Nombre' => $value->Nombre,
            'NumeroPublicaciones' => $value->NumeroPublicaciones
     
        ];
    }
    
return $listaConsultas;

?>