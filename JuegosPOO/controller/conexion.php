<?php
class conexion extends PDO {
    private $dsn="mysql:host=localhost;dbname=alquiler_juegos;charset=utf8mb4";
    private $username="dwes";
    private $pass="abc123.";
    
    public function __construct() { 
        parent::__construct($this->dsn, $this->username, $this->pass);
    }
}
