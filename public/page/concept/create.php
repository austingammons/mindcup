<?php

$paradigm_service = new ParadigmService();
$paradigms = $paradigm_service->get_all_paradigms_by_user_guid($_SESSION['user']['user_guid']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $service = new ConceptService();
    $result = $service->create_concept($_SESSION['user']['user_guid'], $_POST['title'], $_POST['text'], $_POST['paradigm_id']);
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
                    <?php echo Helper::selector($paradigms, 'paradigm_selector', 'paradigm_id', 'Paradigm', '0'); ?>
                </div>
                <div class="form-group mb-2">
                    <?php echo Helper::input('text', 'title_input', 'title', '', 'Title'); ?>
                </div>
                <div class="form-group mb-2">
                    <label for="text">Concept</label><span class="float-right" id="counter"></span>
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