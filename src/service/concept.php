<?php

include('base.php');

class ConceptService extends BaseService {

    function get_all_concepts_by_user_id($user_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_concepts WHERE user_id = :user_id");
        $statement->execute(array(":user_id" => $user_id));
        return $statement->fetchAll();
    }

    function get_concept_by_concept_id($concept_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("SELECT * FROM tbl_concepts WHERE id = :concept_id LIMIT 1");
        $statement->execute(array(":concept_id" => $concept_id));
        return $statement->fetch();
    }

    function update_concept_by_concept_id($concept_id, $concept_title, $concept_text) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("UPDATE tbl_concepts SET concept = :concept_text, title = :concept_title WHERE id = :concept_id");
        $statement->execute(array(":concept_text" => $concept_text, ":concept_title" => $concept_title, ":concept_id" => $concept_id));
        return $statement->rowCount();
    }

    function create_concept($user_id, $concept_title, $concept_text) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("INSERT INTO tbl_concepts (user_id, title, concept) VALUES (:user_id, :concept_title, :concept_text)");
        $statement->execute(array(":user_id" => $user_id, ":concept_title" => $concept_title, ":concept_text" => $concept_text));
        return $statement->rowCount();
    }

    function delete_concept_by_concept_id($concept_id) {
        $connection = $this->database->get_connection_pdo();
        $statement = $connection->prepare("DELETE FROM tbl_concepts WHERE id = :id");
        $statement->execute(array(":id" => $concept_id));
        return $statement->rowCount();
    }
}