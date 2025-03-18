<!DOCTYPE html>
<html lang="en">
<head>
    <title>Iniciar sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/src/views/general.css">
    <link rel="stylesheet" href="/src/views/login/logIn.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira:ital,wght@0,100..900;1,100..900&family=Smooch+Sans:wght@100..900&family=Teko:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/595e5b2da4.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
    </style>
</head>
<body>
<div class="container">
        <div class="logIn-container">
            <h1>INICIAR SESION</h1>
            <p>¡Bienvenido!</p>
                <form id="formularioLogin" class="form-logIn" action="/src/controllers/loggeo.php" method="post" autocomplete="off">

                    <label for="in_username">Nombre de usuario:</label>
                    <input type="text" name="username" id="id_username" required>

                    <label for="in_password">Contraseña:</label>
                    <input type="password" name="password" id="in_password" required>
                    
                    <button id="btn_Registrar">Iniciar sesion</button>

                </form>

                <p>¿No tienes cuenta? <a class="ir-registro" href="/signIn">Registrate</a></p>
        </div>
        
</div>
</body>

<script src="/src/views/login/login.js"></script>

</html>
