<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $service = new ConceptService();
    $result = $service->delete_concept_by_concept_id($_GET['concept_id']);
    header('Location:index');
    exit;
}
