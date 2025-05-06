<!DOCTYPE html>
<html lang="en">
<head>
    <title>Perfil de usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/src/views//general.css">
    <link rel="stylesheet" href="/src/views/userProfile/userProfile.css">
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
        <div class="profile-container">
            <h1>Mi perfil</h1>
            <div class="imagen-container">
                <img id="avatar" src="src/controllers/mostrarImagen.php?id=<?= $usuarioLoggeado['username']?>" 
                alt="Avatar" class="user-avatar"
                onerror="this.onerror=null; this.src='resources/avatar.jpg';">
                
                <form id="imagen-form" enctype="multipart/form-data">
                    <input type="file" name="imagenPerfil" accept="image/jpg" id="input-image">

                    <div id="#profile-buttons">
                        <label for="input-image">
                            <i class='bx bxs-image-add icono-imagen'></i>
                        </label>

                        <button id="salvarCambios" id="save-image">
                            <i class='bx bxs-save icono-imagen'></i>
                        </button>
                    </div>
                </form>

            </div>
            <div class="api-seccion">
                <a href="https://discord.com/api/oauth2/authorize?client_id=1369418288832053288&redirect_uri=http%3A%2F%2Flocalhost%3A8000%2Fsrc%2Fapi%2FdiscordAPI.php&response_type=code&scope=identify">
                <button>Iniciar sesión con Discord</button>
                </a>
            </div>

            <form id="formulario-infousuario" method="post" action="/src/controllers/modificarUsuario.php">
                <label for="lb_username">Nombre de usuario</label>
                <input type="text" name="username" id="in_username" value="<?= htmlspecialchars($usuarioLoggeado['username']) ?>" disabled>
                
                <label for="lb_fullname">Nombre completo</label>
                <input type="text" name="nombre" id="in_fullname" value="<?= htmlspecialchars($usuarioLoggeado['nombre']) ?>" disabled>
                
                <label for="lb_email">Correo electrónico</label>
                <input type="text" name="email" id="in_email" value="<?= htmlspecialchars($usuarioLoggeado['correoE']) ?>" disabled>
                
                <label for="lb_password" >Contraseña</label>
                
                <div class="profile-password">
                    <input type="password" name="password" id="in_password" value="<?= htmlspecialchars($usuarioLoggeado['contrasena'])?>" disabled>
                </div>

                <div id="profile-buttons">
                    <button id="modify-profile" type="button" >Modificar</button>
                    <button id="save-profile" type="submit" style="display: none;">Guardar cambios</button>
                </div>
            </form>
           
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

<script src="src/views/userProfile/userProfile.js"></script>

</html>
