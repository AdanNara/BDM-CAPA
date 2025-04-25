<?php
session_start();

require '../classes/Database.php';

$config = require '../classes/configDB.php';

$dbConnection = new Database($config['database']);

$id = $_GET['id'];

$query = 'CALL sp_GestionUsuarios(5, :username , null, null, null, null, null)';

$foto = $dbConnection->queryTraerFoto($query,[
    'username' => $id
]);

if($foto!==null && $foto !== false){
    header('Content-Type: image/jpeg');
    echo $foto;
    exit;
} else {
    $default = 'src/resources/default-avatar.jpg';
    header('Content-Type: image/jpeg');
    readfile($default);
    echo $default;
}

exit;
?>
