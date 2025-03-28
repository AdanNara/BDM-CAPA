<!DOCTYPE html>
<html lang="en">
<head>
    <title>Consulta de información </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="src/views/general.css">
    <link rel="stylesheet" href="src/views/consultaInfo/consultaInfo.css">
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

        <h1>Seleccione la información que desee consultar</h1>

        <div class="newPost-container">
             <!-- Cabecera -->
            <div class="post-header">
                <button>N° de publicaciones por videojuego</button>
                <button>N° de posts por usuario</button>
            </div>
             <!-- Contenido -->
             <div class="post-content">
                <table>
                    <thead>
                        <tr>
                            <th>Videojuego</th>
                            <th>Número de publicaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="rowTabla">
                            <td class="nombreVideojuego">Marvel Rivals</td>
                            <td class="numeroPublicaciones">10</td>
                        </tr>
                        <tr class="rowTabla">
                            <td class="nombreVideojuego">Overwatch</td>
                            <td class="numeroPublicaciones">5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </main>
</div>


<div id="abrirBuzon" class="buttonBuzon">
    <i class='bx bx-message'></i>
</div>


</body>

<script src="src/views/consultaInfo/consultaInfo.js"></script>

</html>
