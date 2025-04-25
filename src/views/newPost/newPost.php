<!DOCTYPE html>
<html lang="en">
<head>
    <title>Crear publicación</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="src/views/general.css">
    <link rel="stylesheet" href="src/views/newPost/newPost.css">
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
    <form id="form-Publicar" action="src/controllers/crearPublicacion.php" method="post" enctype="multipart/form-data">
        <div class="newPost-container">
 
             <!-- Cabecera -->
            <div class="post-header">
                <div class="user-data">
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg" alt="Avatar" class="user-avatar">
                    <p class="username"> <?= htmlspecialchars($usuarioLoggeado['username']) ?></p>
                </div>
                <div class="newPost-category">
                    <select name="categories" id="categories-newPost" required>
                    
                        <!-- Opciones de categorías -->

                      </select>
                </div>
            </div>


             <!-- Contenido -->
             <div class="post-content">
                <textarea name="title" id="in_title" placeholder="Titulo de la publicación" required ></textarea>
                <textarea name="description" id="in_description" placeholder="Descripción de la publicación" required></textarea>
            </div>
            <!-- Multimedia -->
            <div class="post-media">

                <img id="preview-image"></img>
                <video id="preview-video" controls></video>


                <div id="botones-subir-media"> 
                    <label for="input-image">
                        <i class='bx bxs-image-add icono-imagen'></i>
                    </label> 
                    <input type="file" name="media-File" accept=".jpg, .jpeg, .mp4" id="input-image" required>
                </div>

                <div id="botones-eliminar-media">     
                    <i class='bx bx-trash-alt'></i>
                </div>    

            </div>


            <div class="post-actions">
                <button id="publishPost">Publicar</button>
            </div>
        
        </div>
        <form id="form-Publicar" action="hola" method="post">
    </main>

    <?php
    require 'src/views/partials/asideTopUsers.php'
    ?>


</div>

<div id="abrirBuzon" class="buttonBuzon">
    <i class='bx bx-message'></i>
</div>


</body>

<script src="src/views/newPost/newPost.js"></script>

</html>
