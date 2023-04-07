<?php

include('../src/service/thought.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $service = new ThoughtService();
    $result = $service->create_thought($_SESSION['user']['id'], $_POST['title'], $_POST['thought']);
    header("Location:index");
}

?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-center">
            <div class="page-center-contents">
            <h1>Create</h1>
            <p>What's on your mind?</p>
            <form class="form-inline" method="post">
                <div class="form-group mb-2">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" rows="10" cols="50"></input>
                </div>
                <div class="form-group mb-2">
                    <label for="thought">Thought</label>
                    <textarea type="text" id="thought" name="thought" class="form-control" rows="10" cols="50"></textarea>
                </div>
                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-dark">create</button>
                </div>
            </form>
        </div>
    </div>
</div>

