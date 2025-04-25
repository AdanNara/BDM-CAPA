<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/src/views/general.css">
    <link rel="stylesheet" href="/src/views/home/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium&family=Teko&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/595e5b2da4.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
 
    <style>
    </style>
</head>
<body>

<?php
    session_start();

    $usuarioLoggeado = $_SESSION['usuarioLoggeado'];

?>

<div class="container">
    
    <?php
    require 'src/views/partials/asidebar.php'
    ?>

    

    <main class="content">
        
        <div class="feed-container">
            <div class="post-container">
                <!-- Cabecera -->
                <div class="post-header">
                    <div class="user-data">
                        <img src="https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg" alt="Avatar" class="user-avatar">
                        <p class="username">Nombre de Usuario</p>
                    </div>
                    <div class="post-category">
                        <p class="category-name"> nombre del videojuego</p>
                    </div>
                </div>
        
                <!-- Contenido -->
                <div class="post-content">
                    <h2 class="post-title">Título de la Publicación</h2>
                    <p class="post-description">Descripción de la publicación este es un texto generico para comprobar el tamaño del contenedor de la publicacion y ver que no se este saliendo del margen o algo por el estilo, solo estoy probando cositas uwu</p>
                </div>
        
                <!-- Multimedia -->
                <div class="post-media">
                    
                </div>
        
                <!-- Acciones -->
                <div class="post-actions">
                    <p class="rating">999</p>
                    <i class='bx bx-upvote bx-sm up-arrow' ></i>
                    <i class='bx bx-downvote bx-sm down-arrow' ></i>
                </div>
            </div>
        </div>
        

    </main>

    <?php
    require 'src/views/partials/asideTopUsers.php'
    ?>

</div>


<div id="abrirBuzon" class="buttonBuzon">
    <i class='bx bx-message'></i>
</div>

</body>

<script src="src/views/home/home.js"></script>

</html>
