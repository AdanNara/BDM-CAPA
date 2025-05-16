<?php

require_once 'src/middlewares/authMiddleware.php';
require_once 'src/middlewares/adminMiddleware.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => ['view' => 'src/views/login/login.php'],
    '/signIn' => ['view' => 'src/views/signIn/signIn.php'],
    '/home' => ['view' => 'src/views/home/home.php', 'middleware' => ['authMiddleware']],
    '/perfil' => ['view' => 'src/views/userProfile/userProfile.php', 'middleware' => ['authMiddleware']],
    '/descubrir' => ['view' => 'src/views/descubrir/descubrir.php', 'middleware' => ['authMiddleware']],
    '/publicar' => ['view' => 'src/views/newPost/newPost.php', 'middleware' => ['authMiddleware']],
    '/chat'=> ['view' => 'src/views/chat/chat.php', 'middleware' => ['authMiddleware']],
    '/consultar' => ['view' => 'src/views/consultaInfo/consultaInfo.php', 'middleware' => ['authMiddleware','adminMiddleware']],
    '/buzon' => ['view' => 'src/views/buzon/buzon.php', 'middleware' => ['authMiddleware','adminMiddleware']],
    '/reportar' => ['view' => 'src/views/newReport/newReport.php', 'middleware' => ['authMiddleware']],
    '/api' => ['view' => 'src/views/apiFront/apiFront.php']
];


function routeToController($uri,$routes){
    if (array_key_exists($uri, $routes)) {

        $route = $routes[$uri];
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($route['middleware'])) {
            foreach ($route['middleware'] as $middleware) {
                if (function_exists($middleware)) {
                    $middleware();
                }
            }
        }

        require $route['view'];
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