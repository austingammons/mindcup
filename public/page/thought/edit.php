<?php

include('../src/service/thought.php');

$service = new ThoughtService();
$thought_id = $_GET['thought_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $result = $service->update_thought_by_thought_id($thought_id, $_POST['title'], $_POST['text']);
    header("Location:index");
}

$data = $service->get_thought_by_thought_id($thought_id);

?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-center">
            <div class="page-center-contents">
            <h1>Edit Thought</h1>
            <p>Change your mind.</p>
            <form class="form-inline" method="post">
                <div class="form-group mb-2">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="<?= htmlspecialchars(trim($data["title"]) ?? "")?>">
                </div>
                <div class="form-group mb-2">
                    <label for="text">Thought</label><span class="float-right" id="counter"></span>
                    <textarea id="text" name="text" class="form-control mindcup-textarea" maxlength="2000"><?= htmlspecialchars($data["text"] ?? "")?></textarea>
                </div>
                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-outline-dark">save</button>
                    <a href="delete?thought_id=<?php echo $data['id']; ?>" class="btn btn-outline-danger float-right">delete</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../../js/textcounter.js"></script>