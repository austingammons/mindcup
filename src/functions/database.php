<?php

class Database {

    public $host = "localhost";
    public $dbname = "mindcup";
    public $username = "root";
    public $password = "";

        public static $columns = [
        'tbl_users_columns' => ['id', 'user_guid', 'username', 'email', 'password', 'date'],
        'tbl_thoughts_columns' => ['id', 'user_guid', 'title', 'text', 'concept_id', 'date'],
        'tbl_concepts_columns' => ['id', 'user_guid', 'title', 'text', 'paradigm_id', 'date'],
        'tbl_paradigms_columns' => ['id', 'user_guid', 'title', 'text', 'date']
    ];
    
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