<?php

$paradigm_service = new ParadigmService();
$paradigms = $paradigm_service->get_all_paradigms_by_user_guid($_SESSION['user']['user_guid']);

$service = new ConceptService();
$concept_id = $_GET['concept_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $result = $service->update_concept_by_concept_id($concept_id, $_POST['title'], $_POST['text'], $_POST['paradigm_id']);
    header("Location:index");
}

$data = $service->get_concept_by_concept_id($concept_id);

?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-center">
            <div class="page-center-contents">
            <h1>Edit Concept</h1>
            <p>Redefine the way you think.</p>
            <form class="form-inline" method="post">
                <div class="form-group mb-2">
                    <?php echo Helper::selector($paradigms, 'paradigm_selector', 'paradigm_id', 'Paradigm', $data['paradigm_id']); ?>
                </div>
                <div class="form-group mb-2">
                    <?php echo Helper::input('text', 'title_input', 'title', htmlspecialchars(trim($data["title"]) ?? ""), 'Title'); ?>
                </div>
                <div class="form-group mb-2">
                    <label for="text">Concept</label><span class="float-right" id="counter"></span>
                    <textarea id="text" name="text" class="form-control mindcup-textarea" maxlength="2000"><?= htmlspecialchars($data["text"] ?? "")?></textarea>
                </div>
                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-outline-dark">save</button>
                    <a href="delete?concept_id=<?php echo $data['id']; ?>" class="btn btn-outline-danger float-right">delete</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../../js/textcounter.js"></script>