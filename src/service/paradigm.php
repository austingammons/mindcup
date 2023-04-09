<?php

include('base.php');

class ParadigmService extends BaseService {

    function get_all_paradigms_by_user_id($user_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_paradigms WHERE user_id = :user_id");
        $statement->execute(array(":user_id" => $user_id));
        return $statement->fetchAll();
    }

    function get_paradigm_by_paradigm_id($paradigm_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_paradigms WHERE id = :paradigm_id LIMIT 1");
        $statement->execute(array(":paradigm_id" => $paradigm_id));
        return $statement->fetch();
    }

    function update_paradigm_by_paradigm_id($paradigm_id, $paradigm_title, $paradigm_text) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("UPDATE tbl_paradigms SET paradigm = :paradigm_text, title = :paradigm_title WHERE id = :paradigm_id");
        $statement->execute(array(":paradigm_text" => $paradigm_text, ":paradigm_title" => $paradigm_title, ":paradigm_id" => $paradigm_id));
        return $statement->rowCount();
    }

    function create_paradigm($user_id, $paradigm_title, $paradigm_text) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("INSERT INTO tbl_paradigms (user_id, title, paradigm) VALUES (:user_id, :paradigm_title, :paradigm_text)");
        $statement->execute(array(":user_id" => $user_id, ":paradigm_title" => $paradigm_title, ":paradigm_text" => $paradigm_text));
        return $statement->rowCount();
    }

    function delete_paradigm_by_paradigm_id($paradigm_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("DELETE FROM tbl_paradigms WHERE id = :id");
        $statement->execute(array(":id" => $paradigm_id));
        return $statement->rowCount();
    }
}