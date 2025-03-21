<?php

require '../classes/Database.php';

$config = require '../classes/configDB.php';

$dbConnection = new Database($config['database']);

$username = $_POST['username'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$password = $_POST['password'];

//$query = 'INSERT INTO usuarios (usuario,nombre,correoE,contrasena) VALUES (:username, :nombre, :email, :password)';

$query = 'CALL sp_GestionUsuarios(1,:username,:nombre,:email,:password, null, null)';

$dbConnection->query($query,[
    ':username' => $username,
    ':nombre' => $nombre,
    ':email' => $email,
    ':password' => $password
]);



header("Location: /");
exit(); 
