<?php 

header("Content-Type: application/json");

require '../classes/Database.php';

$config = require '../classes/configDB.php';

$accion = $_GET['accion'];

$dbConn = new Database($config['database']);

if($accion == '1'){
    $query = "CALL sp_GestionVideojuegos(1);";
}else{
    $query = "CALL sp_GestionVideojuegos(2);";
}

$listaUsers = $dbConn->query($query,[]);

try{
    echo json_encode(["status" => "SUCCESS","data" => $listaUsers], JSON_PRETTY_PRINT); 
} catch (PDOException $e) {
    echo json_encode(["status" => "ERROR","message" => $e->getMessage()]);
}