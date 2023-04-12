<?php

$concept_service = new ConceptService();
$concepts = $concept_service->get_all_concepts_by_user_guid($_SESSION['user']['user_guid']);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $thought_service = new ThoughtService();
    $result = $thought_service->create_thought($_SESSION['user']['user_guid'], $_POST['title'], $_POST['thought'], $_POST['concept_id']);
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
                    <?php echo Helper::selector($concepts, 'concept_selector', 'concept_id', 'Concept', '0'); ?>
                </div>
                <div class="form-group mb-2">
                    <?php echo Helper::input('text', 'title_input', 'title', '', 'Title'); ?>
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