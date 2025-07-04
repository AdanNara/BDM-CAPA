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
    //session_start();

    $usuarioLoggeado = $_SESSION['usuarioLoggeado'];

?>

<?php
    require 'src/views/partials/asidebar.php';
    //require 'src/controllers/functions.php';
    $listaPublicaciones = require 'src/controllers/mostrarPublicaciones.php';
    $filter = $_GET['ID'] ?? null;
    
?>

<?php
    $listaTopUsuarios = require 'src/controllers/rankingUsuarios.php';

?>

<div class="container">

    <main class="content">
        
        <div class="feed-container">

            <?php if($filter){ ?>

                <h1>Publicaciones de <?= htmlspecialchars($_GET['Nombre']) ?> </h1>
                
            <?php } ?>

            <?php foreach ($listaPublicaciones as $publicacion) { ?>
                <?php
                    $_GET['id'] = $publicacion['Usuario'];
                    $usuarioDiscord = require 'src/controllers/mostrarUsuarioDiscord.php';
                ?>
              
                <div class="post-container" data-ID="<?= htmlspecialchars($publicacion['ID']) ?>">
                <!-- Cabecera -->
                <div class="post-header">
                    <div class="user-data">
                        <img src="src/controllers/mostrarImagen.php?id=<?= $publicacion['Usuario'] ?> " alt="Avatar" onerror="this.onerror=null; this.src='resources/avatar.jpg';" class="user-avatar">
                        <p class="username"> <?= htmlspecialchars($publicacion['Usuario']) ?>
                            
                            <!-- Insignia si es usuario tipo "administrador" -->
                            <?php if($publicacion['TipoUsuario']=='1'){?>
                                <i class='bx bxs-wrench'></i>
                            <?php } ?>
                            <!-- Insignia si el usuario es parte del Ranking de  usuarios -->
                            <?php
                                switch($publicacion['Usuario']){
                                case $listaTopUsuarios[0]['Usuario']:
                            ?>
                                    <i class='bx bxs-trophy oro-trophy' ></i> 
                            <?php   break;
                                case $listaTopUsuarios[1]['Usuario']:
                            ?>
                                    <i class='bx bxs-trophy plata-trophy' ></i>
                            <?php   break;
                                case $listaTopUsuarios[2]['Usuario']:
                            ?>
                                    <i class='bx bxs-trophy bronce-trophy' ></i>
                            <?php   break;
                                default:
                                    break;
                                    }
                            ?>
                        </p>
                        <?php if($usuarioDiscord['usuarioDiscord'] != null){ ?>
                        <a href="https://discord.com/channels/@me" target="_blank" class="discord-link">
                        <p class="discord-username"><i class='bx bxl-discord' ></i><?= htmlspecialchars($usuarioDiscord['usuarioDiscord']) ?></p>
                        </a>
                        <?php } ?>
                    </div>
                    <div class="post-category">
                        <p class="category-name" data-categoria="<?=$publicacion['IdVideojuego']?>" data-nombre="<?=$publicacion['Videojuego']?>"> <?= htmlspecialchars($publicacion['Videojuego']) ?> </p>
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
                    <form class="formVotes" data-voted="NO" data-ID="<?= htmlspecialchars($publicacion['ID']) ?>">
                        <div id="calificacionNumero" class="rating">  <?= htmlspecialchars($publicacion['Calif']) ?> </div>
                        <button id="upvoteButton" class='bx bx-upvote bx-sm up-arrow' ></button>
                        <button id="downvoteButton" class='bx bx-downvote bx-sm down-arrow' ></button>
                    </form>
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
    <i class='bx bx-message-error' ></i>
</div>

</body>

<script src="src/views/home/home.js"></script>

</html>
