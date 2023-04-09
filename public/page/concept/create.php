<?php

include('../src/service/concept.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $service = new ConceptService();
    $result = $service->create_concept($_SESSION['user']['id'], $_POST['title'], $_POST['concept']);
    header("Location:index");
}

?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-center">
            <div class="page-center-contents">
            <h1>Create Concept</h1>
            <p>Build a nest for multiple thoughts.</p>
            <form class="form-inline" method="post">
                <div class="form-group mb-2">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" maxlength="100"></input>
                </div>
                <div class="form-group mb-2">
                    <label for="concept">Concept</label><span class="float-right" id="counter"></span>
                    <textarea type="text" id="concept" name="concept" class="form-control mindcup-textarea" maxlength="2000" rows="10" cols="50"></textarea>
                </div>
                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-outline-dark">create</button>
                    <a href="index" class="btn btn-outline-danger float-right">cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../../js/textcounter.js"></script>