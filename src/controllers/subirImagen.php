<?php

session_start();

require '../classes/Database.php';

$config = require '../classes/configDB.php';

$dbConnection = new Database($config['database']);

if(isset($_FILES['imagenPerfil']) && $_FILES['imagenPerfil']['error'] == UPLOAD_ERR_OK){

    $imagen = file_get_contents($_FILES['imagenPerfil']['tmp_name']);
    $username = $_SESSION['usuarioLoggeado']['username'];

    $query = 'CALL sp_GestionUsuarios(4, :username, null, null, null, null, :imagen)';

    $stmt = $dbConnection->connection->prepare($query);

    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':imagen', $imagen, PDO::PARAM_LOB);

    $stmt->execute();
}

