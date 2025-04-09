<!DOCTYPE html>
<html lang="en">
<head>
    <title>Descubrir</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="src/views/general.css">
    <link rel="stylesheet" href="src/views/descubrir/descubrir.css">
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
        
        <div class="categories">
            
            <div class="game-card"> 
    
                <img src="https://static-cdn.jtvnw.net/ttv-boxart/1264310518_IGDB-285x380.jpg" alt="imagen juego 1">
                
                    <p>GAME-NAME</p>
                
                
            </div>
            <div class="game-card"> 
                
                <img src="https://static-cdn.jtvnw.net/ttv-boxart/27471_IGDB-285x380.jpg" alt="imagen juego 2">
                <p>GAME-NAME</p>
            </div>
            <div class="game-card"> 
                
                <img src="https://static-cdn.jtvnw.net/ttv-boxart/493959_IGDB-285x380.jpg" alt="imagen juego 2">
                <p>GAME-NAME</p>
            </div>
            <div class="game-card"> 
                
                <img src="https://static-cdn.jtvnw.net/ttv-boxart/322503446_IGDB-285x380.jpg" alt="imagen juego 2">
                <p>GAME-NAME</p>
            </div>
            <div class="game-card"> 
                
                <img src="https://static-cdn.jtvnw.net/ttv-boxart/32399-285x380.jpg" alt="imagen juego 2">
                <p>GAME-NAME</p>
            </div>

            <div class="game-card"> 
                
                <img src="https://static-cdn.jtvnw.net/ttv-boxart/32399-285x380.jpg" alt="imagen juego 2">
                <p>GAME-NAME</p>
            </div>
            <div class="game-card"> 
                
                <img src="https://static-cdn.jtvnw.net/ttv-boxart/512953_IGDB-285x380.jpg" alt="imagen juego 2">
                <p>GAME-NAME</p>
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

<script src="src/views/descubrir/descubrir.js"></script>

</html>
