<?php

class Database {

    public $host = "localhost";
    public $dbname = "users_db";
    public $username = "root";
    public $password = "";
    
    function get_connection_mysqli() {
        $connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($connection->connect_errno) {
            die("Connection error: " . $connection->connect_error);
        }
        return $mysqli;
    }

    function get_connection_pdo() {
        $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    }
}

?>