<?php

include('base.php');

class ThoughtService extends BaseService {

    function get_all_thoughts_by_user_id($user_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM thoughts WHERE user_id = :user_id");
        $statement->execute(array(":user_id" => $user_id));
        return $statement->fetchAll();
    }

    function get_thought_by_thought_id($thought_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM thoughts WHERE id = :thought_id LIMIT 1");
        $statement->execute(array(":thought_id" => $thought_id));
        return $statement->fetch();
    }

    function update_thought_by_thought_id($thought_id, $thought_text) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("UPDATE thoughts SET thought = :thought WHERE id = :thought_id");
        $statement->execute(array(":thought" => $thought_text, ":thought_id" => $thought_id));
        return $statement->rowCount();
    }

    function create_thought($user_id, $thought_text) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("INSERT INTO thoughts (user_id, thought) VALUES (:user_id, :thought)");
        $statement->execute(array(":user_id" => $user_id, ":thought" => $thought_text));
        return $statement->rowCount();
    }

    function delete_thought_by_thought_id($thought_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("DELETE FROM thoughts WHERE id = :id");
        $statement->execute(array(":id" => $thought_id));
        return $statement->rowCount();
    }
}