<?php 

header("Content-Type: application/json");

require 'src/classes/Database.php';

$config = require 'src/classes/configDB.php';

$dbConn = new Database($config['database']);

$query = "SELECT * FROM vw_ListaUsuariosAPI";

$listaUsers = $dbConn->query($query,[]);

try{
    echo json_encode(["status" => "SUCCESS","data" => $listaUsers], JSON_PRETTY_PRINT); 
} catch (PDOException $e) {
    echo json_encode(["status" => "ERROR","message" => $e->getMessage()]);
}