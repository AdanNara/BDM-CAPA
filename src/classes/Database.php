<?php 

class Database {
    public $connection;

    public function __construct($dsn){
        $stringDsn = 'mysql:'.http_build_query($dsn,'',';');
        $this->connection = new PDO($stringDsn);
    }

    public function query($query,$args){
        $statement = $this->connection->prepare($query);
        $statement->execute($args);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function queryInsert($query,$args){
        $statement = $this->connection->prepare($query);
        $statement->execute($args);
    }

    public function queryTraerFoto($query,$args){
        $statement = $this->connection->prepare($query);
        $statement->execute($args);
        $foto = $statement->fetchColumn();
        return $foto;
    }
    
}