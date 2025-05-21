<?php 

function adminMiddleware() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SESSION['usuarioLoggeado']['tipoUsuario'] != 1) {
        header('Location: /home');
        exit;
    }
}