<?php

    require '../classes/Database.php';

    $config = require '../classes/configDB.php';

    $dbConnection = new Database($config['database']);
    
    
    $id = $_POST['id'];

    $query = 'CALL sp_GestionReportes(4, :id, NULL, NULL , NULL);';

    echo $query;

    $dbConnection->query($query,[
        ':id' => $id
    ]);

    header('Location: /buzon');
?>