<?php 

session_start();

require '../classes/Database.php';
$config = require '../classes/configDB.php';

$dbConn = new Database($config['database']);

$remitente = $_SESSION['usuarioLoggeado']['username'];

$destinatario = $_POST['destinatario'];
$mensaje = $_POST['mensaje'];

$query = "CALL sp_GestionMensaje(1, :remitente, :destinatario, :mensaje) ";

$result = $dbConn->query($query, [
    ":remitente" => $remitente,
    ":destinatario" => $destinatario,
    ":mensaje" => $mensaje
]);

header('Content-Type: application/json');

echo json_encode(["success"=>true]);

