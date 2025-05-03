<?php 
    session_start();

    require '../classes/Database.php';
    $config = require '../classes/configDB.php';
    $dbConnection = new Database($config['database']);

    $usuario = $_SESSION['usuarioLoggeado']['username'];
    $descripcion = $_POST['description'];
    $categoria = $_POST['categories'];


    $query = 'CALL sp_GestionReportes(1, null, :categoria, :descripcion, :usuario )';
    $dbConnection->query($query,[
        ':descripcion' => $descripcion,
        ':usuario' => $usuario,
        ':categoria' => $categoria
    ]);

    header('Location: /home');
?>