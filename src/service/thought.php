<?php

include('base.php');

class ThoughtService extends BaseService {

    function get_all_thoughts_by_user_id($user_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_thoughts WHERE user_id = :user_id");
        $statement->execute(array(":user_id" => $user_id));
        return $statement->fetchAll();
    }

    function get_thought_by_thought_id($thought_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_thoughts WHERE id = :thought_id LIMIT 1");
        $statement->execute(array(":thought_id" => $thought_id));
        return $statement->fetch();
    }

    function update_thought_by_thought_id($thought_id, $thought_title, $thought_text) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("UPDATE tbl_thoughts SET thought = :thought, title = :thought_title WHERE id = :thought_id");
        $statement->execute(array(":thought" => $thought_text, ":thought_title" => $thought_title, ":thought_id" => $thought_id));
        return $statement->rowCount();
    }

    function create_thought($user_id, $thought_title, $thought_text) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("INSERT INTO tbl_thoughts (user_id, title, thought) VALUES (:user_id, :thought_title, :thought)");
        $statement->execute(array(":user_id" => $user_id, ":thought_title" => $thought_title, ":thought" => $thought_text));
        return $statement->rowCount();
    }

    function delete_thought_by_thought_id($thought_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("DELETE FROM tbl_thoughts WHERE id = :id");
        $statement->execute(array(":id" => $thought_id));
        return $statement->rowCount();
    }
}