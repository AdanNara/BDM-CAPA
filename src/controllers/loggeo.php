<?php

session_start();

require '../classes/Database.php';
require 'functions.php';

$config = require '../classes/configDB.php';

$dbConnection = new Database($config['database']);

$username = $_POST['username'];
$password = $_POST['password'];

//$query = 'SELECT nombre, correoE, tipoUsuario, fotoPerfil FROM usuarios WHERE username = :username AND contrasena = :password';
$query = 'CALL sp_GestionUsuarios(2,:username,null,null, null, null, null)';

$result = $dbConnection->query($query,[
    ':username' => $username
]);

if ($result) {

    if($password == $result[0]->contrasena || password_verify($password,$result[0]->contrasena)){

        $_SESSION['usuarioLoggeado'] = [
            'username' => $username,
            'nombre' => $result[0]->nombre,
            'correoE' => $result[0]->correoE,
            'contrasena' => $password,
            'tipoUsuario' => $result[0]->tipoUsuario
        ];
        header('Location: /home'); 
        exit();

    }else{
        $_SESSION['error'] = 'Contraseña incorrecta';
    }

} else {
    $_SESSION['error'] = 'Usuario no encontrado';
}

header('Location: /');
