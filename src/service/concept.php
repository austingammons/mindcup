<?php

class ConceptService extends BaseService {

    function get_all_concepts_by_user_guid($user_guid) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_concepts WHERE user_guid = :user_guid");
        $statement->execute(array(":user_guid" => $user_guid));
        return $statement->fetchAll();
    }

    function get_all_concepts_by_paradigm_id($paradigm_id, $user_guid) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_concepts WHERE paradigm_id = :paradigm_id AND user_guid = :user_guid");
        $statement->execute(array(":paradigm_id" => $paradigm_id, ":user_guid" => $user_guid));
        return $statement->fetchAll();
    }

    function get_concept_by_concept_id($concept_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_concepts WHERE id = :concept_id LIMIT 1");
        $statement->execute(array(":concept_id" => $concept_id));
        return $statement->fetch();
    }

    function update_concept_by_concept_id($concept_id, $title, $text, $paradigm_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("UPDATE tbl_concepts SET text = :text, title = :title, paradigm_id = :paradigm_id WHERE id = :concept_id");
        $statement->execute(array(":text" => $text, ":title" => $title, ":concept_id" => $concept_id, ':paradigm_id' => $paradigm_id));
        return $statement->rowCount();
    }

    function create_concept($user_guid, $title, $text, $paradigm_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("INSERT INTO tbl_concepts (user_guid, paradigm_id, title, text, date) VALUES (:user_guid, :paradigm_id, :title, :text, :date)");
        $statement->execute(array(":user_guid" => $user_guid, ':paradigm_id' => $paradigm_id, ":title" => $title, ":text" => $text, ':date' => date('Y/m/d')));
        return $statement->rowCount();
    }

    function delete_concept_by_concept_id($concept_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("DELETE FROM tbl_concepts WHERE id = :id");
        $statement->execute(array(":id" => $concept_id));
        return $statement->rowCount();
    }
}