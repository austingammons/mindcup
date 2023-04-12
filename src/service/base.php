<?php

class BaseService {

    public $database;

    function __construct() {
        $this->database = new Database();
    }

    function get_database() {
        return $this->database;
    }
}