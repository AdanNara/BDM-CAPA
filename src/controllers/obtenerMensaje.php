<?php 

session_start();

require "../classes/Database.php";
$config = require "../classes/configDB.php";

$dbConn = new Database($config['database']);

$remitente = $_SESSION['usuarioLoggeado']['username'];
$destinatario = $_GET['destinatario'];

$query = "CALL sp_GestionMensaje(2, :remitente, :destinatario, null) ";

header('Content-Type: application/json');
$mensajes = $dbConn->query($query, [
    ":remitente" => $remitente,
    ":destinatario" => $destinatario
]);

echo json_encode($mensajes, JSON_PRETTY_PRINT);

