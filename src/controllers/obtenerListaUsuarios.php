<?php 

require 'src/classes/Database.php';
$config = require 'src/classes/configDB.php';

$dbConn = new Database($config['database']);

$query = "CALL sp_GestionUsuarios(9, :username, null, null, null, null, null)";

$result = $dbConn->query($query, [
    'username' => $_SESSION['usuarioLoggeado']['username']
]);

foreach ($result as $value) {
    $usuarios[] = [
        'username' => $value->username,
        'nombre' => $value->nombre
    ];
}

return $usuarios;