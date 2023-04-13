<?php

class Database {

    // These credentials are for MY local machine
    // NEVER push your live credentials up to github
    
    public $host = "localhost"; // this is localhost on your pc
    public $dbname = "mindcup"; // this is whatever you name your database
    public $username = "root"; // this is typically root
    public $password = "Test123!"; // your password is probably an empty string

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