<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'src/views/login/login.php',
    '/signIn' => 'src/views/signIn/signIn.php',
    '/home' => 'src/views/home/home.php',
    '/perfil' => 'src/views/userProfile/userProfile.php',
    '/descubrir' => 'src/views/descubrir/descubrir.php',
    '/publicar' => 'src/views/newPost/newPost.php',
    '/chat'=> 'src/views/chat/chat.php',
    '/consultar' => 'src/views/consultaInfo/consultaInfo.php',
    '/buzon' => 'src/views/buzon/buzon.php',
    '/reportar' => 'src/views/newReport/newReport.php',
];


function routeToController($uri,$routes){
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404){
    http_response_code($code);
    require "views/$code.view.php";
    die();
}

routeToController($uri,$routes);