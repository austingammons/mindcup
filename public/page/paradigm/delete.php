<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $service = new ParadigmService();
    $result = $service->delete_paradigm_by_paradigm_id($_GET['paradigm_id']);
    header('Location:index');
    exit;
}
