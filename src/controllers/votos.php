<?php

require '../classes/Database.php';
$config = require '../classes/configDB.php';

$dbConn = new Database($config['database']);

$accion = $_GET['accion'];
$idPublicacion = $_GET['id'];


if($accion == 1){
    $query = "CALL sp_GestionPublicaciones(7, :id, null, null, null, null, null, null)";
}else if($accion == 2){
    $query = "CALL sp_GestionPublicaciones(8, :id, null, null, null, null, null, null)";
}

$dbConn->queryInsert($query, [
    ":id" => $idPublicacion
]);




