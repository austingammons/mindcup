<?php

include('base.php');

class ParadigmService extends BaseService {

    function get_all_paradigms_by_user_guid($user_guid) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_paradigms WHERE user_guid = :user_guid");
        $statement->execute(array(":user_guid" => $user_guid));
        return $statement->fetchAll();
    }

    function get_paradigm_by_paradigm_id($paradigm_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_paradigms WHERE id = :paradigm_id LIMIT 1");
        $statement->execute(array(":paradigm_id" => $paradigm_id));
        return $statement->fetch();
    }

    function update_paradigm_by_paradigm_id($paradigm_id, $title, $text) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("UPDATE tbl_paradigms SET text = :text, title = :title WHERE id = :paradigm_id");
        $statement->execute(array(":text" => $text, ":title" => $title, ":paradigm_id" => $paradigm_id));
        return $statement->rowCount();
    }

    function create_paradigm($user_guid, $title, $text) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("INSERT INTO tbl_paradigms (user_guid, title, text, date) VALUES (:user_guid, :title, :text, :date)");
        $statement->execute(array(":user_guid" => $user_guid, ":title" => $title, ":text" => $text, ':date' => date('Y/m/d')));
        return $statement->rowCount();
    }

    function delete_paradigm_by_paradigm_id($paradigm_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("DELETE FROM tbl_paradigms WHERE id = :id");
        $statement->execute(array(":id" => $paradigm_id));
        return $statement->rowCount();
    }
}