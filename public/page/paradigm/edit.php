<?php

include('../src/service/paradigm.php');
$service = new ParadigmService();

$paradigm_id = $_GET['paradigm_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $result = $service->update_paradigm_by_paradigm_id($paradigm_id, $_POST['title'], $_POST['paradigm']);
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
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="<?= htmlspecialchars(trim($data["title"]) ?? "")?>">
                </div>
                <div class="form-group mb-2">
                    <label for="paradigm">Paradigm</label><span class="float-right" id="counter"></span>
                    <textarea id="paradigm" name="paradigm" class="form-control mindcup-textarea" maxlength="2000"><?= htmlspecialchars($data["paradigm"] ?? "")?></textarea>
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