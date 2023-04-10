<?php

include('base.php');

class ThoughtService extends BaseService {

    function get_all_thoughts_by_user_guid($user_guid) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_thoughts WHERE user_guid = :user_guid");
        $statement->execute(array(":user_guid" => $user_guid));
        return $statement->fetchAll();
    }

    function get_thought_by_thought_id($thought_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_thoughts WHERE id = :thought_id LIMIT 1");
        $statement->execute(array(":thought_id" => $thought_id));
        return $statement->fetch();
    }

    function update_thought_by_thought_id($thought_id, $title, $text) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("UPDATE tbl_thoughts SET text = :text, title = :title WHERE id = :thought_id");
        $statement->execute(array(":text" => $text, ":title" => $title, ":thought_id" => $thought_id));
        return $statement->rowCount();
    }

    function create_thought($user_guid, $title, $text) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("INSERT INTO tbl_thoughts (user_guid, title, text, date) VALUES (:user_guid, :title, :text, :date)");
        $statement->execute(array(":user_guid" => $user_guid, ":title" => $title, ":text" => $text, ':date' => date('Y/m/d')));
        return $statement->rowCount();
    }

    function delete_thought_by_thought_id($thought_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("DELETE FROM tbl_thoughts WHERE id = :id");
        $statement->execute(array(":id" => $thought_id));
        return $statement->rowCount();
    }
}