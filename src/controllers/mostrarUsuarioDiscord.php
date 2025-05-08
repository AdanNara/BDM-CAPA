<?php
require_once 'src/classes/Database.php';
$config = require 'src/classes/configDB.php';

$dbConnection = new Database($config['database']);

$id = $_GET['id'];

$query = 'CALL sp_GestionUsuarios(8,:usuario,null,null,null,null,null);';
    

$usuarioDiscord = [];
    
$result = $dbConnection->query($query,[':usuario' => $id]);
    
if (!empty($result)) {
    return ['usuarioDiscord' => $result[0]->usuarioDiscord];
}
else {
    return null;
}


?>