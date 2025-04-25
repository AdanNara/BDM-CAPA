<?php

session_start();

require '../classes/Database.php';
$config = require '../classes/configDB.php';
$dbConnection = new Database($config['database']);

$titulo = $_POST['title'];
$descripcion = $_POST['description'];
$archivo = $_FILES['media-File'];
$usuario = $_SESSION['usuarioLoggeado']['username'];
$videojuego = $_POST['categories'];

$extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);

if($extension == 'jpg' || $extension == 'jpeg'){ //SUBIR CON IMAGEN

    $imagen = file_get_contents($_FILES['media-File']['tmp_name']);
    $query = 'CALL sp_GestionPublicaciones(1, null, :titulo, :descripcion, :foto, null, :usuario, :videojuego)';

    $stmt = $dbConnection->connection->prepare($query);

    $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
    $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $stmt->bindParam(':foto', $imagen, PDO::PARAM_LOB);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->bindParam(':videojuego', $videojuego, PDO::PARAM_STR);
    $stmt->execute();
    header('Location: /');
    
}elseif( $extension == 'mp4'){ //SUBIR CON VIDEO

    $maxID = $dbConnection->query('SELECT MAX(idPublicacion) as max_id FROM publicaciones',[]);
    $idSiguiente = $maxID[0]->max_id + 1;

    $ruta = "../../data/videos/" . $usuario . "/";
    $rutaDB = "data/videos/" . $usuario . "/";

    if (!file_exists($ruta)) {
        mkdir($ruta, 0777, true);
    }

    $archivo['name'] = "video_" . $idSiguiente;
    $ruta_completa_video = $ruta . $archivo['name'] . "." . $extension;
    $ruta_completa_video_db = $rutaDB . $archivo['name'] . "." . $extension;
    move_uploaded_file($archivo['tmp_name'], $ruta_completa_video);

    $query = 'CALL sp_GestionPublicaciones(2, null, :titulo, :descripcion, null, :video, :usuario, :videojuego)';

    $dbConnection->queryInsert($query,[
        ':titulo' => $titulo,
        ':descripcion' => $descripcion,
        ':video' => $ruta_completa_video_db,
        ':usuario' => $usuario,
        ':videojuego' => $videojuego
    ]);

}else{
    echo 'No subiste nada correcto perrillo';
}

header('Location: /home');
