<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'src/views/login/login.php',
    '/signIn' => 'src/views/signIn/signIn.php',
    '/home' => 'src/views/home/home.php'

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