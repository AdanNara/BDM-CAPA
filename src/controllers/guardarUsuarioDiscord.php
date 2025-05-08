<?php 
    
    function guardarUsuarioDiscord($userDiscord){
    

    require '../classes/Database.php';
    $config = require '../classes/configDB.php';
    $dbConnection = new Database($config['database']);

    $usuario = $_SESSION['usuarioLoggeado']['username'];

    $query = 'CALL sp_GestionUsuarios(7,:usuario,null,null,null,:usuarioDiscord,null);';
    $dbConnection->query($query,[
        
        ':usuario' => $usuario,
        'usuarioDiscord' => $userDiscord,
    ]);
    
};

header('Location: /perfil');
?>