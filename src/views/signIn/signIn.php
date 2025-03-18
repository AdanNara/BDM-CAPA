<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registrar usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/src/views/general.css">
    <link rel="stylesheet" href="/src/views/signIn/signIn.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira&family=Teko&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/595e5b2da4.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
    </style>
</head>
<body>
<div class="container">
    
        <div class="signIn-container">
                <a href="/" class="backTo-logIn"> <i class='bx bx-arrow-back'></i></a>
            <h1>NUEVO REGISTRO</h1>
            
                <form id="formSingIn" class="form-signIn" action="/src/controllers/registro.php" method="post" autocomplete="off">

                        <label for="in_username">Nombre de usuario</label>
                        <input type="text" name="username" id="in_username" required>
                        <label for="in_fullname">Nombre completo</label>
                        <input type="text" name="nombre" id="in_nombre" required>
                        <label for="in_email">Correo electronico</label>
                        <input type="text" name="email" id="in_email" required>
                        <label for="in_password">Contraseña</label>
                        <input type="text" name="password" id="in_password" required>
                       
                        <button id="btn_Registrar">Completar registro</button>
                </form>
                
        </div>
        
</div>
</body>

<script src="/src/views/signIn/signIn.js"></script>

</html>
