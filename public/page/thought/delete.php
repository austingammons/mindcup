<?php

include('../src/service/thought.php');

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $service = new ThoughtService();
    $thought = $service->delete_thought_by_thought_id($_GET['thought_id']);
    header('Location:thought/index');
    exit;
}

