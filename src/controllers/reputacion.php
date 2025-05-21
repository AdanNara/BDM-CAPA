<?php

require_once 'src/classes/Database.php';
$config = require 'src/classes/configDB.php';

$dbConnection = new Database($config['database']);

 $usuario = $_SESSION['usuarioLoggeado']['username'];

 $query = 'CALL sp_GestionUsuarios(11,:usuario, null, null, null, null, null)';

 $result = $dbConnection->query($query, [
    'usuario' => $usuario]
 );

 $reputacion = $result[0]->Reputacion;

 return $reputacion;