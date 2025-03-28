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


<div class="container">
    
    <aside class="sidevar">
        <div class="parteSuperior">
            <div class="inicio">
                <i class='bx bxs-home' ></i>
                <a href="../home/home.html"> INICIO</a>
            </div>
            <div class="descubrir">
                <i class='bx bxs-compass'></i>
                <a  href="../descubrir/descubrir.html"> DESCUBRIR</a>
            </div>
            <div class="nuevaPublicacion">
                <i class='bx bx-plus-circle' ></i>
                <a  href="../newPost/newPost.html"> Crear publicacion</a>
            </div>
            <div class="Chat">
                <i class='bx bx-conversation' ></i>
                <a  href="../chat/chat.html"> Chat</a>
            </div>
            <div class="reporte">
                <i class='bx bxs-report' ></i>
                <a  href="../consultaInfo/consultaInfo.html"> Consultar</a>
            </div>
            <div class="buzon">
                <i class='bx bx-envelope'></i>
                <a  href="../buzon/buzon.html"> Buzón</a>
            </div>
        </div>
        <div class="parteInferior">
            <div class="miPerfil">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg" alt="Avatar" class="user-avatar">
                <a href="/perfil"> Mi perfil</a>
            </div>
            <div class="logOut"> 
                <a href="../login/logIn.html"><i class='bx bx-log-out icon-logOut'></i> Cerrar sesion</a>
            </div>
            
        </div>
    </aside>


    <main class="content">
        <div class="profile-container">
            <h1>Mi perfil</h1>
            <div class="imagen-container">
                
                <img src="https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg" alt="Avatar" class="user-avatar">
                <label for="input-image">
                    <i class='bx bxs-image-add icono-imagen'></i>
                </label>
                <input type="file" accept="image/jpeg, image/png, image/jpg" id="input-image">
            </div>
            <div class="api-seccion">
                <p>*EN ESTE APARTADO SE MANEJARA LA CONEXION CON LA API</p>
            </div>
            <label for="in_username">Nombre de usuario</label>
            <input type="text" name="username" id="in_username" value="<?= htmlspecialchars($usuarioLoggeado['username']) ?>" disabled>
            
            <label for="in_fullname">Nombre completo</label>
            <input type="text" name="fullname" id="in_fullname" value="<?= htmlspecialchars($usuarioLoggeado['nombre']) ?>" disabled>
            
            <label for="in_email">Correo electrónico</label>
            <input type="text" name="email" id="in_email" value="<?= htmlspecialchars($usuarioLoggeado['correoE']) ?>" disabled>
            
            <label for="in_password" >Contraseña</label>
            
            <div class="profile-password">
                <input type="text" name="password" id="in_password" value="<?= htmlspecialchars($usuarioLoggeado['contrasena'])?>" disabled>
                
            </div>

            <button id="save-profile">Guardar cambios</button>
            
        </div>
    </main>
</div>

<div id="abrirBuzon" class="buttonBuzon">
    <i class='bx bx-message'></i>
</div>

</body>

<script src="userProfile.js"></script>

</html>
