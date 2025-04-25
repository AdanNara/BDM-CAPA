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

<?php
    require 'src/views/partials/asidebar.php';
    $listaPublicaciones = require 'src/controllers/mostrarPublicaciones.php';
    //require 'src/controllers/functions.php';
    //dd($listaPublicaciones);
?>


<div class="container">

    <main class="content">
        
        <div class="feed-container">

            <?php foreach ($listaPublicaciones as $publicacion) { ?>
              
                <div class="post-container" data-ID="<?= htmlspecialchars($publicacion['ID']) ?>">
                <!-- Cabecera -->
                <div class="post-header">
                    <div class="user-data">
                        <img src="https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg" alt="Avatar" class="user-avatar">
                        <p class="username"> <?= htmlspecialchars($publicacion['Usuario']) ?></p>
                    </div>
                    <div class="post-category">
                        <p class="category-name"> <?= htmlspecialchars($publicacion['Videojuego']) ?> </p>
                    </div>
                </div>
        
                <!-- Contenido -->
                <div class="post-content">
                    <h2 class="post-title"> <?= htmlspecialchars($publicacion['Titulo']) ?></h2>
                    <p class="post-description">  <?= htmlspecialchars($publicacion['Descripcion']) ?></p>
                </div>
        
                <!-- Multimedia -->
                <div class="post-media">
                    
                    <?php if($publicacion['Video']==null){ ?>
                        <img id="post-image" src="src/controllers/imagenDePublicacion.php?id=<?= $publicacion['ID']?>" alt="Imagen de la publicación">
                    <?php }else{ ?>
                        <video id="post-video" controls>
                            <source src="<?= htmlspecialchars($publicacion['Video']) ?>" type="video/mp4">
                        </video>
                    <?php } ?>
                    
                </div>
        
                <!-- Acciones -->
                <div class="post-actions">
                    <p class="rating">  <?= htmlspecialchars($publicacion['Calif']) ?> </p>
                    <i class='bx bx-upvote bx-sm up-arrow' ></i>
                    <i class='bx bx-downvote bx-sm down-arrow' ></i>
                </div>
            </div>

            <?php } ?>
        

        </div>
        

    </main>



</div>

<?php
    require 'src/views/partials/asideTopUsers.php'
?>


<div id="abrirBuzon" class="buttonBuzon">
    <i class='bx bx-message'></i>
</div>

</body>

<script src="src/views/home/home.js"></script>

</html>
