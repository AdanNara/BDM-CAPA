<!DOCTYPE html>
<html lang="en">
<head>
    <title>Crear reporte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="src/views/general.css">
    <link rel="stylesheet" href="src/views/newReport/newReport.css">
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
    require 'src/views/partials/asidebar.php'
    ?>

<div class="container">
    

    <main class="content">
        <form id="form-Reporte" action="src/controllers/crearReporte.php" method="POST" enctype="multipart/form-data">
            <div class="newPost-container">
                <!-- Cabecera -->
                <div class="post-header">
                    <div class="user-data">
                        <img id="avatar" src="src/controllers/mostrarImagen.php?id=<?= $usuarioLoggeado['username']?>" 
                        alt="Avatar" class="user-avatar"
                        onerror="this.onerror=null; this.src='resources/avatar.jpg';">
                        <p class="username"> <?= htmlspecialchars($usuarioLoggeado['username']) ?></p>
                    </div>
                    <div class="newPost-category">
                    
                        <select name="categories" id="categories-newPost" required>
                            <option value="" disabled selected>Selecciona una categoria</option>
                            <option value="sugerencia">SUGERENCIA</option>
                            <option value="bug">BUG</option>
                            <option value="queja">QUEJA</option>
                            <option value="otro">OTRO</option>
                        </select>
                    </div>
                </div>
                <!-- Contenido -->
                <div class="post-content">
                    <h1>Reporte</h1>
                    <textarea name="description" id="in_description" placeholder="Escriba su reporte aquí..."></textarea>
                </div>
                
                <div class="post-actions">
                    <button type="submit" id="publishReport">Enviar reporte</button>
                </div>
            </div>
        </form>
    </main>

</div>

    <?php
    require 'src/views/partials/asideTopUsers.php'
    ?>

<div id="abrirBuzon" class="buttonBuzon">
    <i class='bx bx-message-error' ></i>
</div>


</body>


<script src="src/views/newReport/newReport.js"></script>

</html>
