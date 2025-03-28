<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="src/views/general.css">
    <link rel="stylesheet" href="src/views/chat/chat.css">
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
  
        <div id="contenedor-chat">

            <div id="cont-Usuarios">

                <h3>Lista de usuarios:</h3>
                
                <div class="contacto">
                    <h4 class="nomUsuarios">Usuario 1</h4>
                </div>

                <div class="contacto">
                    <h4 class="nomUsuarios">Usuario 2</h4>
                </div>

                <div class="contacto">
                    <h4 class="nomUsuarios">Usuario 3</h4>
                </div>

            </div>

            <div id="cont-mensajes">
                
                <div class="defaultCont" id="cont-usuario"><h2 id="nom-usu-Chat">Usuario</h2></div>

                <div class="defaultCont" id="cont-chat">

                    <div class="msj-Yo">
                        <p class="Yo">Yo:</p> 
                        <p class="texto-msj" >Ola perro infiel</p>
                    </div>

                    <div class="msj-Otro">
                        <p class="Otro">Usuario:</p> 
                        <p class="texto-msj" >Pero si tu fuiste quien me engaño con mi ermano baboso</p>
                    </div>

                </div>

                <div id="cont-input">
                    <input id="in-texto" type="text" placeholder="Escribe tu mensaje aqui...">
                    <button id="in-enviar">Enviar</button>
                </div>

            </div>


        </div>

    </main>
</div>

<div id="abrirBuzon" class="buttonBuzon">
    <i class='bx bx-message'></i>
</div>


</body>

<script src="src/views//chat/chat.js"></script>

</html>
