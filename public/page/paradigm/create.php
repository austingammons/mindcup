<?php

include('../src/service/paradigm.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $service = new ParadigmService();
    $result = $service->create_paradigm($_SESSION['user']['user_guid'], $_POST['title'], $_POST['text']);
    header("Location:index");
}

?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-center">
            <div class="page-center-contents">
            <h1>Create Paradigm</h1>
            <p>Pull yourself together.</p>
            <form class="form-inline" method="post">
                <div class="form-group mb-2">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" maxlength="100"></input>
                </div>
                <div class="form-group mb-2">
                    <label for="text">Paradigm</label><span class="float-right" id="counter"></span>
                    <textarea type="text" id="text" name="text" class="form-control mindcup-textarea" maxlength="2000" rows="10" cols="50"></textarea>
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