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

        //session_start();

        $usuarioLoggeado = $_SESSION['usuarioLoggeado'];

        ?>

<?php
    require 'src/views/partials/asidebar.php'
    ?>

<?php
$listaConsultas = [];

//valida si existe el parametro accion en la URL
if (isset($_GET['accion'])) {
    
    $listaConsultas = require 'src/controllers/mostrarConsulta.php';
}


?>


<div class="container">
    
    <main class="content">

        <h1>Seleccione la información que desee consultar</h1>

        <div class="newPost-container">
             <!-- Cabecera -->
            <div class="post-header">
                
                <form method="GET">
                    <input type="hidden" name="accion" value="1">
                    <button type="submit">N° de publicaciones por videojuego</button>
                </form>

                <form method="GET">
                    <input type="hidden" name="accion" value="2">
                    <button type="submit">N° de publicaciones por usuario</button>
                </form>

            </div>
             <!-- Contenido -->
             <div class="post-content">
             <?php if (!empty($listaConsultas)) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Número de publicaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listaConsultas as $consulta) { ?>
                            <tr class="fila-reporte" data-id="<?= $consulta['ID'] ?>" data-accion="<?= $accion ?>">
                                <td><?= $consulta['ID'] ?></td>
                                <td><?= $consulta['Nombre'] ?></td>
                                <td><?= $consulta['NumeroPublicaciones'] ?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            <?php } ?>
            </div>
            
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

<script src="src/views/consultaInfo/consultaInfo.js"></script>

</html>
