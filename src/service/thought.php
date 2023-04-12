<?php

class ThoughtService extends BaseService {

    function get_all_thoughts_by_user_guid($user_guid) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_thoughts WHERE user_guid = :user_guid");
        $statement->execute(array(":user_guid" => $user_guid));
        return $statement->fetchAll();
    }

    function get_all_thoughts_by_concept_id($concept_id, $user_guid) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_thoughts WHERE concept_id = :concept_id AND user_guid = :user_guid");
        $statement->execute(array(":concept_id" => $concept_id, ":user_guid" => $user_guid));
        return $statement->fetchAll();
    }

    function get_thought_by_thought_id($thought_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_thoughts WHERE id = :thought_id LIMIT 1");
        $statement->execute(array(":thought_id" => $thought_id));
        return $statement->fetch();
    }

    function update_thought_by_thought_id($thought_id, $title, $text, $concept_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("UPDATE tbl_thoughts SET text = :text, title = :title, concept_id = :concept_id WHERE id = :thought_id");
        $statement->execute(array(":text" => $text, ":title" => $title, ":thought_id" => $thought_id, ":concept_id" => $concept_id));
        return $statement->rowCount();
    }

    function create_thought($user_guid, $title, $text, $concept_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("INSERT INTO tbl_thoughts (user_guid, concept_id, title, text, date) VALUES (:user_guid, :concept_id, :title, :text, :date)");
        $statement->execute(array(":user_guid" => $user_guid, ':concept_id' => $concept_id, ":title" => $title, ":text" => $text, ':date' => date('Y/m/d')));
        return $statement->rowCount();
    }

    function delete_thought_by_thought_id($thought_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("DELETE FROM tbl_thoughts WHERE id = :id");
        $statement->execute(array(":id" => $thought_id));
        return $statement->rowCount();
    }
}