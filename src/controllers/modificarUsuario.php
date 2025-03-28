<?php 

session_start();

require '../classes/Database.php';

$config = require '../classes/configDB.php';

$dbConnection = new Database($config['database']);

$username = $_POST['username'];
$nombreCompleto = $_POST['nombre'];
$correoE = $_POST['email'];
$password = $_POST['password'];

$query = 'CALL sp_GestionUsuarios(3,:username,:nombreCompleto,:correoE,:password, null, null)';

$dbConnection->queryInsert($query,[
    ':username' => $username,
    ':nombreCompleto' => $nombreCompleto,
    ':correoE' => $correoE,
    ':password' => $password
]);

$_SESSION['usuarioLoggeado']['username'] = $username;
$_SESSION['usuarioLoggeado']['nombre'] = $nombreCompleto;
$_SESSION['usuarioLoggeado']['correoE'] = $correoE;
$_SESSION['usuarioLoggeado']['contrasena'] = $password;

header('Location: /home');
exit();