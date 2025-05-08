
<?php
session_start();
// credenciales de Discord
$client_id = '1369418288832053288';
$client_secret = 'gMDUlpXPQW89ibbgaPVdJwWuWdgfuOBp';
$redirect_uri = 'http://localhost:8000/src/api/discordAPI.php';

// Verifica que viene el "code" de Discord
if (!isset($_GET['code'])) {
    exit('Error: No se recibió el código de autenticación.');
}

$code = $_GET['code'];

//Intercambiar el code por un access token
$token_url = 'https://discord.com/api/oauth2/token';
$data = [
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'grant_type' => 'authorization_code',
    'code' => $code,
    'redirect_uri' => $redirect_uri,
    //aqui declaramos el scope que queremos
    'scope' => 'identify'
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$token_data = json_decode($response, true);

if (!isset($token_data['access_token'])) {
    exit('Error al obtener el token de acceso.');
}

$access_token = $token_data['access_token'];

//Obtener datos del usuario desde Discord
$user_url = 'https://discord.com/api/users/@me';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $user_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $access_token
]);

$user_response = curl_exec($ch);
curl_close($ch);

$user_data = json_decode($user_response, true);

if (!isset($user_data['id'])) {
    exit('Error al obtener los datos del usuario.');
}else{



require '../controllers/guardarUsuarioDiscord.php';
guardarUsuarioDiscord($user_data['username']);



}
?>