<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $service = new ThoughtService();
    $result = $service->delete_thought_by_thought_id($_GET['thought_id']);
    header('Location:index');
    exit;
}
