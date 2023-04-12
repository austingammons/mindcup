<?php

$service = new ParadigmService();

$paradigm_id = $_GET['paradigm_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $result = $service->update_paradigm_by_paradigm_id($paradigm_id, $_POST['title'], $_POST['text']);
    header("Location:index");
}

$data = $service->get_paradigm_by_paradigm_id($paradigm_id);

?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-center">
            <div class="page-center-contents">
            <h1>Edit Paradigm</h1>
            <p>A new way of thinking is coming.</p>
            <form class="form-inline" method="post">
                <div class="form-group mb-2">
                    <?php echo Helper::input('text', 'title_input', 'title', htmlspecialchars(trim($data["title"]) ?? ""), 'Title'); ?>
                </div>
                <div class="form-group mb-2">
                    <label for="text">Paradigm</label><span class="float-right" id="counter"></span>
                    <textarea id="text" name="text" class="form-control mindcup-textarea" maxlength="2000"><?= htmlspecialchars($data["text"] ?? "")?></textarea>
                </div>
                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-outline-dark">save</button>
                    <a href="delete?paradigm_id=<?php echo $data['id']; ?>" class="btn btn-outline-danger float-right">delete</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../../js/textcounter.js"></script>