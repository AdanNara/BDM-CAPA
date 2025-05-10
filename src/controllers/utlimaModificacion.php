<?php

require 'src/classes/Database.php';
$config = require 'src/classes/configDB.php';

$dbConnection = new Database($config['database']);

 $usuario = $_SESSION['usuarioLoggeado']['username'];

 $query = 'CALL sp_GestionUsuarios(10,:usuario, null, null, null, null, null)';

 $result = $dbConnection->query($query, [
    'usuario' => $usuario]
 );

 $ultimaModificacion = $result[0]->Modificacion;

 return $ultimaModificacion;