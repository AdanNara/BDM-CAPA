<?php

class Usuario{
    public $username;
    public $nombre;
    public $email;
    public $tipoUsuario;

    public function __construct($username, $nombre, $email, $tipoUsuario){
        $this->username = $username;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->tipoUsuario = $tipoUsuario;
        
    }


}