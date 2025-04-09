<!DOCTYPE html>
<html lang="en">
<head>
    <title>FRONT PARA API</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="src/views/general.css">
    <link rel="stylesheet" href="src/views/apiFront/apiFront.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium&family=Teko&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/595e5b2da4.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
    </style>
</head>
<body>

<div class="container">
    <main class="content">

        <div class="newPost-container">
             <!-- Cabecera -->
            <div class="post-header">
                <h1>Lista de usuarios</h1>
            </div>

            <button id="button-getUsuarios">Obtener Lista</button>

             <!-- Contenido -->
             <div class="post-content">
                <table>
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Tipo de usuario</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-lista">
                        <!-- Aquí se llenará la tabla con los datos de la API -->
                    </tbody>
                </table>
            </div>
            
        </div>
    </main>

</div>
</body>

<script src="src/views/apiFront/apiFront.js"></script>

</html>
