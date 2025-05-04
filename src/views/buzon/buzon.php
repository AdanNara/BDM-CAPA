<!DOCTYPE html>
<html lang="en">
<head>
    <title>Buzón</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="src/views/general.css">
    <link rel="stylesheet" href="src/views/buzon/buzon.css">
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

    <?php
        $listaBuzon = require 'src/controllers/mostrarBuzon.php';
    ?>

<div class="container">
    


    <main class="content">

        <div class="newPost-container">
             <!-- Cabecera -->
            <div class="post-header">
                <h1>Buzón</h1>
            </div>
             <!-- Contenido -->
             <div class="post-content">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo de Reporte</th>
                            <th>Descripción</th>
                            <th>Usuario</th>
                            <th>Fecha y hora</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listaBuzon as $buzon){ ?>
                        <tr>
                            <td><?=$buzon['ID'] ?></td>
                            <td><?=$buzon['Tipo'] ?></td>
                            <td><?=$buzon['Descripcion'] ?></td>
                            <td><?=$buzon['Usuario'] ?></td>
                            <td><?=$buzon['FechaHora'] ?></td>
                            <td><?php if($buzon['Estado']==1){ ?>
                                    Completado
                                <?php }else{ ?>
                                    Pendiente
                                <?php } ?>
                            </td>
                            <td><button onclick="cambiarEstado(this)">Revisar</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </main>
    
    <?php
    require 'src/views/partials/asideTopUsers.php'
    ?>

    <div id="abrirBuzon" class="buttonBuzon">
        <i class='bx bx-message-error' ></i>
    </div>
    

</div>
</body>

<script src="src/views/buzon/buzon.js"></script>

</html>
