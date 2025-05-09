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

    //session_start();

    $usuarioLoggeado = $_SESSION['usuarioLoggeado'];

    ?>

    <?php
    require 'src/views/partials/asidebar.php'
    ?>

    <?php
        $listaBuzon = require 'src/controllers/mostrarBuzon.php';
        $pendientes = $listaBuzon['pendientes'];
        $revisados = $listaBuzon['revisados'];
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
                <!-- TABLA REPORTES SIN REVISAR-->
                <p>Lista de reportes pendientes</p>
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
                        <?php foreach($pendientes as $listPendientes){ ?>
                        <tr class="lista-pendientes">
                            <form id="formBuzon" class="form-Buzon" action="src/controllers/revisarBuzon.php" method="post">
                                <td><?=$listPendientes['ID'] ?></td>
                                <input type="text" name="id" value="<?=$listPendientes['ID'] ?>" hidden>
                                <td><?=$listPendientes['Tipo'] ?></td>
                                <td><?=$listPendientes['Descripcion'] ?></td>
                                <td><?=$listPendientes['Usuario'] ?></td>
                                <td><?=$listPendientes['FechaHora'] ?></td>
                                <td><?php if($listPendientes['Estado']==1){ ?>
                                        Completado
                                    <?php }else{ ?>
                                        Pendiente
                                    <?php } ?>
                                </td>
                                <td><button type="submit">Revisar </button></td>
                            </form>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- TABLA REPORTES REVISADOS-->
                <p>Lista de reportes Completados</p>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tipo de Reporte</th>
                            <th>Descripción</th>
                            <th>Usuario</th>
                            <th>Fecha y hora</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($revisados as $listRevisados){ ?>
                        <tr class="lista-revisados">
                            <td><?=$listRevisados['ID'] ?></td>
                            <input type="text" name="id" value="<?=$listRevisados['ID'] ?>" hidden>
                            <td><?=$listRevisados['Tipo'] ?></td>
                            <td><?=$listRevisados['Descripcion'] ?></td>
                            <td><?=$listRevisados['Usuario'] ?></td>
                            <td><?=$listRevisados['FechaHora'] ?></td>
                            <td><?php if($listRevisados['Estado']==1){ ?>
                                Completado
                                <?php }else{ ?>
                                Pendiente
                                <?php } ?>
                            </td>
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
