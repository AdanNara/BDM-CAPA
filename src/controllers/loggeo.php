<?php

session_start();

require '../classes/Database.php';
require '../models/m_usuario.php';
require 'functions.php';

$config = require '../classes/configDB.php';

$dbConnection = new Database($config['database']);

$username = $_POST['username'];
$password = $_POST['password'];

//$query = 'SELECT username, nombre, correoE, tipoUsuario FROM usuarios WHERE username = :username AND contrasena = :password';
$query = 'CALL sp_GestionUsuarios(2,:username,null,null,:password, null, null)';

$result = $dbConnection->query($query,[
    ':username' => $username,
    ':password'=> $password
]);

if ($result) {
    $_SESSION['usuarioLoggeado'] = [
        'username' => $result[0]->username,
        'nombre' => $result[0]->nombre,
        'correoE' => $result[0]->correoE,
        'tipoUsuario' => $result[0]->tipoUsuario
    ];

    header('Location: /home'); // Redirigir a home
    exit();
} else {
    echo "Usuario o contraseña incorrectos.";
}
