<?php

include('../src/service/thought.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $service = new ThoughtService();
    $result = $service->create_thought($_SESSION['user']['user_guid'], $_POST['title'], $_POST['thought']);
    header("Location:index");
}

?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-center">
            <div class="page-center-contents">
            <h1>Create Thought</h1>
            <p>What's on your mind?</p>
            <form class="form-inline" method="post">
                <div class="form-group mb-2">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" rows="10" cols="50"></input>
                </div>
                <div class="form-group mb-2">
                    <label for="thought">Thought</label><span class="float-right" id="counter"></span>
                    <textarea type="text" id="thought" name="thought" class="form-control mindcup-textarea" maxlength="2000" rows="10" cols="50"></textarea>
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